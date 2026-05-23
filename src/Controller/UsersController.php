<?php
declare(strict_types=1);

namespace App\Controller;

class UsersController extends AppController
{
    public function index()
    {
        $query = $this->Users->find();
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    public function view($id = null)
    {
        $user = $this->Users->get($id, contain: ['Loans']);
        $this->set(compact('user'));
    }

    public function login()
    {
        $session = $this->request->getSession();

        if ($this->isLoggedIn()) {
            return $this->redirect([
                'controller' => 'Users',
                'action' => 'dashboard'
            ]);
        }

        if ($this->request->is('post')) {
           $username = trim((string)$this->request->getData('username'));
            $password = (string)$this->request->getData('password');

            $user = $this->Users->find()
                ->where(['username' => $username])
                ->first();

            if ($user && password_verify($password, $user->password)) {
                $this->writeLoginSession($session, $user);

                $this->Flash->success('Login successful.');

                return $this->redirect([
                    'controller' => 'Users',
                    'action' => 'dashboard'
                ]);
            }

            $this->Flash->error('Wrong email or password.');
        }
    }

    public function dashboard()
    {
        $userId = $this->getLoggedInUserId();

        if (!$userId) {
            $this->Flash->error('Please login first.');

            return $this->redirect([
                'controller' => 'Users',
                'action' => 'login'
            ]);
        }

        $user = $this->Users->get($userId);

        $Books = $this->fetchTable('Books');
        $Loans = $this->fetchTable('Loans');

        $totalBooks = $Books->find()->count();

        $borrowedBooks = $Loans->find()
            ->where(['status' => 'Borrowed'])
            ->count();

        $availableBooks = $totalBooks - $borrowedBooks;

        $totalUsers = $this->Users->find()->count();

        $recentLoans = $Loans->find()
            ->contain(['Books'])
            ->where(['Loans.user_id' => $userId])
            ->order(['Loans.loan_date' => 'DESC', 'Loans.id' => 'DESC'])
            ->limit(3)
            ->all();

        $chartQuery = $Loans->find();

        $chartQuery
            ->select([
                'loan_day' => 'DATE(loan_date)',
                'total' => $chartQuery->func()->count('*')
            ])
            ->group('DATE(loan_date)')
            ->order(['loan_day' => 'ASC']);

        $chartLabels = [];
        $chartData = [];

        foreach ($chartQuery as $row) {
            $chartLabels[] = date('d M', strtotime($row->loan_day));
            $chartData[] = (int)$row->total;
        }

        $this->set(compact(
            'user',
            'totalBooks',
            'borrowedBooks',
            'availableBooks',
            'totalUsers',
            'recentLoans',
            'chartLabels',
            'chartData'
        ));
    }

    public function profile()
    {
        $userId = $this->getLoggedInUserId();

        if (!$userId) {
            $this->Flash->error('Please login first.');

            return $this->redirect([
                'controller' => 'Users',
                'action' => 'login'
            ]);
        }

        $user = $this->Users->get($userId);

        $this->set(compact('user'));
    }

    public function add()
    {
        if ($this->isLoggedIn()) {
            return $this->redirect([
                'controller' => 'Users',
                'action' => 'dashboard'
            ]);
        }

        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['role'] = 'student';

            $user = $this->Users->patchEntity($user, $data);

            if ($this->Users->save($user)) {
                $this->Flash->success('Account created successfully. Please login.');

                return $this->redirect([
                    'controller' => 'Users',
                    'action' => 'login'
                ]);
            }

            $this->Flash->error('Unable to register. Please check your information.');
        }

        $this->set(compact('user'));
    }

    public function editProfile()
    {
        $userId = $this->getLoggedInUserId();

        if (!$userId) {
            $this->Flash->error('Please login first.');

            return $this->redirect([
                'controller' => 'Users',
                'action' => 'login'
            ]);
        }

        $user = $this->Users->get($userId);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            unset($data['role']);

            if (!empty($data['new_password'])) {
                $data['password'] = $data['new_password'];
            } else {
                unset($data['password']);
            }

            unset($data['new_password'], $data['confirm_password']);

            $profilePicture = $this->request->getData('profile_picture');

            if ($profilePicture && $profilePicture->getError() === UPLOAD_ERR_OK) {
                $uploadPath = WWW_ROOT . 'img' . DS . 'profiles';

                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }

                $originalName = $profilePicture->getClientFilename();
                $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

                if (!in_array($extension, $allowedExtensions, true)) {
                    $this->Flash->error('Please upload a valid image file.');

                    return $this->redirect([
                        'controller' => 'Users',
                        'action' => 'editProfile'
                    ]);
                }

                $fileName = 'profile_' . $userId . '_' . time() . '.' . $extension;
                $targetPath = $uploadPath . DS . $fileName;

                $profilePicture->moveTo($targetPath);

                $data['profile_picture'] = $fileName;
            } else {
                unset($data['profile_picture']);
            }

            $user = $this->Users->patchEntity($user, $data);

            if ($this->Users->save($user)) {
                $session = $this->request->getSession();
                $this->writeLoginSession($session, $user);

                $this->Flash->success('Profile updated successfully.');

                return $this->redirect([
                    'controller' => 'Users',
                    'action' => 'profile'
                ]);
            }

            $this->Flash->error('Unable to update profile.');
        }

        $this->set(compact('user'));
    }

    public function delete()
    {
        $userId = $this->getLoggedInUserId();

        if (!$userId) {
            $this->Flash->error('Please login first.');

            return $this->redirect([
                'controller' => 'Users',
                'action' => 'login'
            ]);
        }

        $user = $this->Users->get($userId);

        if ($this->Users->delete($user)) {
            $this->request->getSession()->destroy();

            $this->Flash->success('Account deleted successfully.');

            return $this->redirect([
                'controller' => 'Pages',
                'action' => 'display',
                'home'
            ]);
        }

        $this->Flash->error('Unable to delete account.');

        return $this->redirect([
            'controller' => 'Users',
            'action' => 'profile'
        ]);
    }

    public function logout()
    {
        $this->request->getSession()->destroy();

        $this->Flash->success('Logged out successfully.');

        return $this->redirect([
            'controller' => 'Pages',
            'action' => 'display',
            'home'
        ]);
    }

    private function writeLoginSession($session, $user): void
    {
        $session->write('Auth.id', $user->id);
        $session->write('Auth.name', $user->name);
        $session->write('Auth.username', $user->username);
        $session->write('Auth.email', $user->email);
        $session->write('Auth.role', $user->role ?? 'student');
        $session->write('Auth.profile_picture', $user->profile_picture ?? null);

        $session->write('Auth.User.id', $user->id);
        $session->write('Auth.User.name', $user->name);
        $session->write('Auth.User.username', $user->username);
        $session->write('Auth.User.email', $user->email);
        $session->write('Auth.User.role', $user->role ?? 'student');
        $session->write('Auth.User.profile_picture', $user->profile_picture ?? null);
    }

    private function getLoggedInUserId(): ?int
    {
        $session = $this->request->getSession();

        $userId =
            $session->read('Auth.id') ??
            $session->read('Auth.User.id');

        if (!$userId) {
            return null;
        }

        return (int)$userId;
    }

    private function isLoggedIn(): bool
    {
        $session = $this->request->getSession();

        return
            $session->check('Auth.id') ||
            $session->check('Auth.User.id');
    }
}