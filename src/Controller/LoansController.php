<?php
declare(strict_types=1);

namespace App\Controller;

class LoansController extends AppController
{
    public function index()
    {
        $loans = $this->Loans->find()
            ->contain(['Books'])
            ->orderBy(['Loans.id' => 'DESC'])
            ->all();

        $this->set(compact('loans'));
    }

    public function returnBook($id = null)
{
    $userId = $this->request->getSession()->read('Auth.id');

    $loan = $this->Loans->get($id);

    if ((int)$loan->user_id !== (int)$userId) {
        $this->Flash->error('You can only return books that you borrowed.');

        return $this->redirect([
            'controller' => 'Loans',
            'action' => 'index'
        ]);
    }

    $today = new \DateTime('now', new \DateTimeZone('Asia/Kuala_Lumpur'));

    $loan->status = 'Returned';
    $loan->actual_return_date = $today->format('Y-m-d');

    if ($this->Loans->save($loan)) {
        $this->Flash->success('Book returned successfully.');
    } else {
        $this->Flash->error('Unable to return book.');
    }

    return $this->redirect([
        'controller' => 'Loans',
        'action' => 'index'
    ]);
}
}