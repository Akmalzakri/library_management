<section class="page-hero">
    <div class="container">
        <h1 class="page-title">Add Book</h1>
        <p class="page-desc">Insert a new book into the library catalogue.</p>
    </div>
</section>

<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="form-card">
                    <?= $this->Form->create($book) ?>
                    <?= $this->Form->control('title', ['class' => 'form-control mb-3', 'label' => 'Book Title']) ?>
                    <?= $this->Form->control('author', ['class' => 'form-control mb-3', 'label' => 'Author']) ?>
                    <?= $this->Form->control('genre', ['class' => 'form-control mb-3', 'label' => 'Genre']) ?>
                    <?= $this->Form->control('quantity', ['class' => 'form-control mb-4', 'label' => 'Quantity']) ?>
                    <div class="d-flex gap-2">
                        <?= $this->Form->button('<i class="bi bi-save me-2"></i>Save Book', ['class' => 'btn btn-primary', 'escapeTitle' => false]) ?>
                        <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-outline-primary">Cancel</a>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
