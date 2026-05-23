<?php
declare(strict_types=1);

namespace App\Controller;

class BooksController extends AppController
{
    public function index()
{
    $Loans = $this->fetchTable('Loans');

    $selectedGenre = $this->request->getQuery('genre');

    $query = $this->Books->find();

    if (!empty($selectedGenre)) {
        $query->where(['genre' => $selectedGenre]);
    }

    $books = $query->all();

    foreach ($books as $book) {
        $activeLoan = $Loans->find()
            ->where([
                'book_id' => $book->id,
                'status' => 'Borrowed'
            ])
            ->first();

        $book->available = $activeLoan ? false : true;
    }

    $genres = $this->Books->find()
        ->select(['genre'])
        ->distinct(['genre'])
        ->where(['genre IS NOT' => null])
        ->order(['genre' => 'ASC'])
        ->all();

    $this->set(compact('books', 'genres', 'selectedGenre'));
}

    public function view($id = null)
    {
        $Loans = $this->fetchTable('Loans');

        $book = $this->Books->get($id);

        $activeLoan = $Loans->find()
            ->where([
                'book_id' => $book->id,
                'status' => 'Borrowed'
            ])
            ->first();

        $book->available = $activeLoan ? false : true;

        $this->set(compact('book'));
    }

    public function add()
    {
        $book = $this->Books->newEmptyEntity();

        if ($this->request->is('post')) {
            $book = $this->Books->patchEntity(
                $book,
                $this->request->getData()
            );

            if ($this->Books->save($book)) {
                $this->Flash->success('Book saved successfully.');

                return $this->redirect([
                    'controller' => 'Books',
                    'action' => 'index'
                ]);
            }

            $this->Flash->error('Unable to save book. Please try again.');
        }

        $this->set(compact('book'));
    }

    public function edit($id = null)
    {
        $book = $this->Books->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $book = $this->Books->patchEntity(
                $book,
                $this->request->getData()
            );

            if ($this->Books->save($book)) {
                $this->Flash->success('Book updated successfully.');

                return $this->redirect([
                    'controller' => 'Books',
                    'action' => 'index'
                ]);
            }

            $this->Flash->error('Unable to update book. Please try again.');
        }

        $this->set(compact('book'));
    }

    public function borrow($id = null)
    {
        $Loans = $this->fetchTable('Loans');

        $book = $this->Books->get($id);

        $userId =
            $this->request->getSession()->read('Auth.id') ??
            $this->request->getSession()->read('Auth.User.id');

        $activeLoan = $Loans->find()
            ->where([
                'book_id' => $id,
                'status' => 'Borrowed'
            ])
            ->first();

        if ($activeLoan) {
            $this->Flash->error('This book is currently not available.');

            return $this->redirect([
                'controller' => 'Books',
                'action' => 'index'
            ]);
        }

        $loan = $Loans->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $duration = (int)($data['duration'] ?? 7);

            if ($duration <= 0) {
                $duration = 7;
            }

            $today = new \DateTime(
                'now',
                new \DateTimeZone('Asia/Kuala_Lumpur')
            );

            $expectedReturnDate = clone $today;
            $expectedReturnDate->modify('+' . $duration . ' days');

            $loan = $Loans->patchEntity($loan, [
                'user_id' => $userId,
                'book_id' => $id,
                'borrower_name' => $data['borrower_name'] ?? null,
                'borrower_email' => $data['borrower_email'] ?? null,
                'contact_number' => $data['contact_number'] ?? null,
                'loan_date' => $today->format('Y-m-d'),
                'return_date' => $expectedReturnDate->format('Y-m-d'),
                'actual_return_date' => null,
                'status' => 'Borrowed'
            ]);

            if ($Loans->save($loan)) {
                $this->Flash->success('Book loan recorded successfully.');

                return $this->redirect([
                    'controller' => 'Loans',
                    'action' => 'index'
                ]);
            }

            $this->Flash->error('Unable to record loan. Please try again.');
        }

        $this->set(compact('loan', 'book'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod([
            'post',
            'delete'
        ]);

        $book = $this->Books->get($id);

        if ($this->Books->delete($book)) {
            $this->Flash->success('Book deleted successfully.');
        } else {
            $this->Flash->error('Unable to delete book.');
        }

        return $this->redirect([
            'controller' => 'Books',
            'action' => 'index'
        ]);
    }
}