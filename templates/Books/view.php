<?php
$this->assign('title', 'Book Details');
?>

<div class="book-detail-page">
    <div class="container">

        <div class="book-detail-hero">

            <div class="book-detail-cover">
                <i class="fa-solid fa-book-open"></i>
            </div>

            <div class="book-detail-info">
                <span class="book-detail-badge">
                    <?= !empty($book->available) ? 'Available' : 'Not Available' ?>
                </span>

                <h1><?= h($book->title ?? '-') ?></h1>

                <p class="book-author">
                    by <?= h($book->author ?? '-') ?>
                </p>

                <div class="book-meta">
                    <span><i class="fa-solid fa-bookmark"></i> <?= h($book->genre ?? '-') ?></span>
                    <span><i class="fa-solid fa-language"></i> <?= h($book->language ?? '-') ?></span>
                    <span><i class="fa-solid fa-calendar-days"></i> <?= h($book->date_published ?? '-') ?></span>
                </div>

                <div class="mt-4 d-flex gap-2 flex-wrap">
                    <a href="<?= $this->Url->build(['controller' => 'Books', 'action' => 'index']) ?>"
                       class="btn btn-light rounded-pill px-4">
                        <i class="fa-solid fa-arrow-left me-2"></i>Back
                    </a>

                    <?php if (!empty($book->available)): ?>
                        <a href="<?= $this->Url->build(['controller' => 'Books', 'action' => 'borrow', $book->id]) ?>"
                           class="btn btn-warning rounded-pill px-4 fw-bold">
                            <i class="fa-solid fa-book-open-reader me-2"></i>Borrow Book
                        </a>
                    <?php else: ?>
                        <button class="btn btn-secondary rounded-pill px-4" disabled>
                            <i class="fa-solid fa-lock me-2"></i>Currently Borrowed
                        </button>
                    <?php endif; ?>
                </div>
            </div>

        </div>

        <div class="row g-4 mt-4">

            <div class="col-lg-8">
                <div class="book-detail-card">
                    <h3>
                        <i class="fa-solid fa-align-left text-primary me-2"></i>
                        Synopsis
                    </h3>

                    <p class="book-description">
                        <?= nl2br(h($book->description ?? 'No description available.')) ?>
                    </p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="book-detail-card">
                    <h3>
                        <i class="fa-solid fa-circle-info text-warning me-2"></i>
                        Book Information
                    </h3>

                    <div class="book-info-list">
                        <div>
                            <span>Publisher</span>
                            <strong><?= h($book->publisher ?? '-') ?></strong>
                        </div>

                        <div>
                            <span>Date Published</span>
                            <strong><?= h($book->date_published ?? '-') ?></strong>
                        </div>

                        <div>
                            <span>Language</span>
                            <strong><?= h($book->language ?? '-') ?></strong>
                        </div>

                        <div>
                            <span>Book ID</span>
                            <strong>#<?= h($book->id ?? '-') ?></strong>
                        </div>

                        <div>
                            <span>Status</span>
                            <?php if (!empty($book->available)): ?>
                                <strong class="text-success">Available</strong>
                            <?php else: ?>
                                <strong class="text-warning">Not Available</strong>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>