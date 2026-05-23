<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loan $loan
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Loan'), ['action' => 'edit', $loan->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Loan'), ['action' => 'delete', $loan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loan->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Loans'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Loan'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="loans view content">
            <h3><?= h($loan->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $loan->hasValue('user') ? $this->Html->link($loan->user->name, ['controller' => 'Users', 'action' => 'view', $loan->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Book') ?></th>
                    <td><?= $loan->hasValue('book') ? $this->Html->link($loan->book->title, ['controller' => 'Books', 'action' => 'view', $loan->book->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($loan->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($loan->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Loan Date') ?></th>
                    <td><?= h($loan->loan_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Return Date') ?></th>
                    <td><?= h($loan->return_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>