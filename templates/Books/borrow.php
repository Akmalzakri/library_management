<section class="page-hero">
    <div class="container">
        <h1 class="page-title">Loan Book</h1>
        <p class="page-desc">Complete borrower information for this book.</p>
    </div>
</section>

<div class="section">
    <div class="container">
        <div class="row justify-content-center g-4">
            <div class="col-lg-4">
                <div class="book-card">
                    <div class="book-cover"><i class="bi bi-book-half"></i></div>
                    <h4 class="fw-bold"><?= h($book->title) ?></h4>
                    <p class="text-muted mb-1">Author: <?= h($book->author ?? '-') ?></p>
                    <p class="text-muted mb-0">Genre: <?= h($book->genre ?? '-') ?></p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-card">
                    <?= $this->Form->create() ?>
                    <?= $this->Form->control('borrower_name', [
                        'class' => 'form-control mb-3',
                        'label' => 'Full Name',
                        'required' => true
                    ]) ?>
                    <?= $this->Form->control('borrower_email', [
                        'type' => 'email',
                        'class' => 'form-control mb-3',
                        'label' => 'Email',
                        'required' => true
                    ]) ?>
                    <?= $this->Form->control('contact_number', [
                        'class' => 'form-control mb-3',
                        'label' => 'Contact Number',
                        'required' => true
                    ]) ?>
                    <?= $this->Form->control('duration', [
                        'type' => 'select',
                        'class' => 'form-select mb-4',
                        'label' => 'Borrow Duration',
                        'options' => [1 => '1 Day', 7 => '7 Days', 14 => '2 Weeks']
                    ]) ?>
                    <div class="d-flex gap-2">
                        <?= $this->Form->button('<i class="bi bi-check-circle me-2"></i>Confirm Loan', ['class' => 'btn btn-primary', 'escapeTitle' => false]) ?>
                        <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-outline-primary">Cancel</a>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
