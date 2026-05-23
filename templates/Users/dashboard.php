<?php
$userName = $user->username ?? 'User';
?>

<div class="page-wrapper">
    <div class="container">

        <div class="dashboard-hero">
            <div>
                <span class="page-badge">
                    <i class="fa-solid fa-wave-square me-2"></i>
                    Smart Dashboard
                </span>

                <h1>
                    Welcome back,
                    <?= h($userName) ?> 👋
                </h1>

                <p>
                    Monitor your books, loan activity and library statistics in one modern dashboard.
                </p>
            </div>

            <div class="dashboard-hero-icon">
                <i class="fa-solid fa-book-open-reader"></i>
            </div>
        </div>

        <div class="row g-4 mt-2">

            <div class="col-md-3">
                <div class="stats-card stats-blue">
                    <i class="fa-solid fa-book"></i>
                    <h3><?= h($totalBooks ?? 0) ?></h3>
                    <p>Total Books</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stats-card stats-purple">
                    <i class="fa-solid fa-book-open-reader"></i>
                    <h3><?= h($borrowedBooks ?? 0) ?></h3>
                    <p>Loaned Books</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stats-card stats-green">
                    <i class="fa-solid fa-circle-check"></i>
                    <h3><?= h($availableBooks ?? 0) ?></h3>
                    <p>Available Books</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stats-card stats-orange">
                    <i class="fa-solid fa-users"></i>
                    <h3><?= h($totalUsers ?? 0) ?></h3>
                    <p>Total Users</p>
                </div>
            </div>

        </div>

        <div class="content-card mt-4">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold mb-1">
                        Books Loaned Per Day
                    </h4>

                    <p class="text-muted mb-0">
                        Daily loaning activity overview
                    </p>
                </div>

                <div class="chart-badge">
                    <i class="fa-solid fa-chart-column"></i>
                </div>
            </div>

            <div style="height: 380px;">
                <canvas id="loanChart"></canvas>
            </div>

        </div>

        <div class="content-card mt-4">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold mb-1">
                        My Loan Activity
                    </h4>

                    <p class="text-muted mb-0">
                        Your latest loaned books
                    </p>
                </div>

                <div class="chart-badge">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                </div>
            </div>

            <div class="table-responsive">

                <table class="table modern-table align-middle">
                    <thead>
                        <tr>
                            <th>Book</th>
                            <th>Name</th>
                            <th>Loan Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if (!empty($recentLoans)): ?>
                            <?php foreach ($recentLoans as $loan): ?>

                                <tr>
                                    <td>
                                        <strong><?= h($loan->book->title ?? '-') ?></strong>
                                    </td>

                                    <td>
                                        <?= h($loan->borrower_name ?? '-') ?>
                                    </td>

                                    <td>
                                        <?= h($loan->loan_date ?? '-') ?>
                                    </td>

                                    <td>
                                        <?php if (($loan->status ?? '') === 'Borrowed'): ?>
                                            <span class="status-pill unavailable">
                                                Loaned
                                            </span>
                                        <?php else: ?>
                                            <span class="status-pill available">
                                                Returned
                                            </span>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php if (($loan->status ?? '') === 'Borrowed'): ?>

                                            <?= $this->Form->postLink(
                                                'Return',
                                                [
                                                    'controller' => 'Loans',
                                                    'action' => 'returnBook',
                                                    $loan->id
                                                ],
                                                [
                                                    'class' => 'btn btn-success btn-sm rounded-pill dashboard-return-btn',
                                                    'confirm' => 'Return this book?'
                                                ]
                                            ) ?>

                                        <?php else: ?>

                                            <button class="btn btn-secondary btn-sm rounded-pill" disabled>
                                                Completed
                                            </button>

                                        <?php endif; ?>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        <?php else: ?>

                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div class="empty-table">
                                        <i class="fa-solid fa-folder-open"></i>
                                        <h5>No loan activity yet</h5>
                                        <p>You have not loan any books yet.</p>
                                    </div>
                                </td>
                            </tr>

                        <?php endif; ?>

                    </tbody>
                </table>

            </div>

        </div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('loanChart');

    if (ctx) {
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($chartLabels ?? []) ?>,
                datasets: [{
                    label: 'Borrowed Books',
                    data: <?= json_encode($chartData ?? []) ?>,
                    backgroundColor: [
                        '#2563eb',
                        '#7c3aed',
                        '#06b6d4',
                        '#f97316',
                        '#ec4899'
                    ],
                    borderRadius: 14,
                    borderSkipped: false,
                    maxBarThickness: 55
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    }
});
</script>