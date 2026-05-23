<?php $this->assign('title', 'Books'); ?>

<div class="page-wrapper">
    <div class="container">

        <div class="page-header">
            <div>
                <span class="page-badge">
                    <i class="fa-solid fa-book me-2"></i>
                    Book Catalogue
                </span>

                <h1>Books Collection</h1>
                <p>Browse library books, filter by genre, and search by title or author.</p>
            </div>
        </div>

        <div class="content-card mb-4">
            <form method="get" class="row g-3 align-items-end">

                <div class="col-md-12">
                    <label class="fw-bold mb-2">
                        <i class="fa-solid fa-magnifying-glass me-2 text-primary"></i>
                        Search Book or Author
                    </label>

                    <input type="text"
                           id="bookSearch"
                           class="form-control"
                           placeholder="Type book title or author name...">
                </div>

                <div class="col-md-8">
                    <label class="fw-bold mb-2">
                        <i class="fa-solid fa-filter me-2 text-primary"></i>
                        Filter by Genre
                    </label>

                    <select name="genre" class="form-select">
                        <option value="">All Genres</option>

                        <?php foreach ($genres as $genre): ?>
                            <option value="<?= h($genre->genre) ?>"
                                <?= ($selectedGenre === $genre->genre) ? 'selected' : '' ?>>
                                <?= h($genre->genre) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary rounded-pill px-4">
                        <i class="fa-solid fa-filter me-2"></i>
                        Filter
                    </button>

                    <a href="<?= $this->Url->build(['controller' => 'Books', 'action' => 'index']) ?>"
                       class="btn btn-outline-secondary rounded-pill px-4">
                        Reset
                    </a>
                </div>

            </form>
        </div>

        <div class="row g-4" id="booksGrid">

            <?php if (!empty($books)): ?>
                <?php foreach ($books as $book): ?>

                    <?php $isAvailable = !empty($book->available); ?>

                    <div class="col-md-6 col-lg-4 book-item"
                         data-title="<?= h(strtolower($book->title ?? '')) ?>"
                         data-author="<?= h(strtolower($book->author ?? '')) ?>">

                        <div class="book-card-modern">

                            <div class="book-cover-icon">
                                <i class="fa-solid fa-book-open"></i>
                            </div>

                            <h4><?= h($book->title) ?></h4>

                            <p class="text-muted mb-2">
                                <i class="fa-solid fa-user-pen me-2 text-primary"></i>
                                <?= h($book->author ?? '-') ?>
                            </p>

                            <p class="text-muted mb-3">
                                <i class="fa-solid fa-bookmark me-2 text-warning"></i>
                                <?= h($book->genre ?? '-') ?>
                            </p>

                            <?php if ($isAvailable): ?>
                                <span class="status-pill available">
                                    <i class="fa-solid fa-circle-check me-1"></i>
                                    Available
                                </span>
                            <?php else: ?>
                                <span class="status-pill unavailable">
                                    <i class="fa-solid fa-clock me-1"></i>
                                    Not Available
                                </span>
                            <?php endif; ?>

                            <div class="d-flex flex-wrap gap-2 mt-4">

                                <a href="<?= $this->Url->build(['action' => 'view', $book->id]) ?>"
                                   class="btn btn-outline-primary btn-sm rounded-pill">
                                    <i class="fa-solid fa-eye me-1"></i>
                                    View
                                </a>

                                <?php if ($isAvailable): ?>
                                    <a href="<?= $this->Url->build(['action' => 'borrow', $book->id]) ?>"
                                       class="btn btn-primary btn-sm rounded-pill">
                                        <i class="fa-solid fa-book-open-reader me-1"></i>
                                        Loan
                                    </a>
                                <?php else: ?>
                                    <button class="btn btn-secondary btn-sm rounded-pill" disabled>
                                        <i class="fa-solid fa-lock me-1"></i>
                                        Loaned
                                    </button>
                                <?php endif; ?>

                            </div>

                        </div>
                    </div>

                <?php endforeach; ?>

                <div class="col-12 d-none" id="noSearchResult">
                    <div class="content-card text-center py-5">
                        <i class="fa-solid fa-magnifying-glass fa-3x text-primary mb-3"></i>

                        <h3 class="fw-bold">No Matching Books</h3>

                        <p class="text-muted mb-0">
                            No book title or author matches your search.
                        </p>
                    </div>
                </div>

            <?php else: ?>

                <div class="col-12">
                    <div class="content-card text-center py-5">
                        <i class="fa-solid fa-book-open fa-3x text-primary mb-3"></i>

                        <h3 class="fw-bold">No Books Found</h3>

                        <p class="text-muted mb-4">
                            No books match the selected genre.
                        </p>

                        <a href="<?= $this->Url->build(['controller' => 'Books', 'action' => 'index']) ?>"
                           class="btn btn-primary rounded-pill px-4">
                            Show All Books
                        </a>
                    </div>
                </div>

            <?php endif; ?>

        </div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('bookSearch');
    const bookItems = document.querySelectorAll('.book-item');
    const noSearchResult = document.getElementById('noSearchResult');

    if (!searchInput) {
        return;
    }

    searchInput.addEventListener('keyup', function () {
        const keyword = searchInput.value.toLowerCase().trim();
        let visibleCount = 0;

        bookItems.forEach(function (item) {
            const title = item.dataset.title || '';
            const author = item.dataset.author || '';

            if (title.includes(keyword) || author.includes(keyword)) {
                item.style.display = '';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        if (noSearchResult) {
            if (visibleCount === 0) {
                noSearchResult.classList.remove('d-none');
            } else {
                noSearchResult.classList.add('d-none');
            }
        }
    });
});
</script>