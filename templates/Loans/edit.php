<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loan $loan
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $books
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $loan->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $loan->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Loans'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="loans form content">
            <?= $this->Form->create($loan) ?>
            <fieldset>
                <legend><?= __('Edit Loan') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('book_id', ['options' => $books, 'empty' => true]);
                    echo $this->Form->control('loan_date', ['empty' => true]);
                    echo $this->Form->control('return_date', ['empty' => true]);
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
