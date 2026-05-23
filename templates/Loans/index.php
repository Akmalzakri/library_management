<?php
$currentUserId =
    $this->request->getSession()->read('Auth.id') ??
    $this->request->getSession()->read('Auth.User.id');
?>

<div class="page-wrapper">
    <div class="container">

        <div class="page-header">
            <div>
                <span class="page-badge">
                    <i class="fa-solid fa-arrow-right-arrow-left me-2"></i>
                    Loan Records
                </span>

                <h1>Borrowing History</h1>
                <p>View and manage all book borrowing records.</p>
            </div>
        </div>

        <div class="content-card">

            <div class="table-responsive">
                <table class="table modern-table align-middle">
                    <thead>
                        <tr>
                            <th>Book</th>
                            <th>Borrower</th>
                            <th>Contact Number</th>
                            <th>Loan Date</th>
                            <th>Return Date</th>
                            <th>Actual Return</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($loans)): ?>
                            <?php foreach ($loans as $loan): ?>

                                <tr>
                                    <td>
                                        <strong>
                                            <?= h($loan->book->title ?? 'Unknown Book') ?>
                                        </strong>
                                    </td>

                                    <td>
                                        <?= h($loan->borrower_name ?? '-') ?>
                                    </td>

                                    <td>
                                        <?php
                                            $contact = $loan->contact_number ?? $loan->borrower_contact ?? '';

                                            if (!empty($contact)) {
                                                echo h(substr($contact, 0, 3) . '****' . substr($contact, -3));
                                            } else {
                                                echo '-';
                                            }
                                        ?>
                                    </td>

                                    <td>
                                        <?= h($loan->loan_date ?? '-') ?>
                                    </td>

                                    <td>
                                        <?= h($loan->return_date ?? '-') ?>
                                    </td>

                                    <td>
                                        <?php if (!empty($loan->actual_return_date)): ?>

                                            <span class="status-pill available">
                                                <?= h($loan->actual_return_date) ?>
                                            </span>

                                        <?php else: ?>

                                            <span class="text-muted">
                                                Not Returned Yet
                                            </span>

                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php if (($loan->status ?? '') === 'Returned'): ?>

                                            <span class="status-pill available">
                                                <i class="fa-solid fa-circle-check me-1"></i>
                                                Returned
                                            </span>

                                        <?php else: ?>

                                            <span class="status-pill unavailable">
                                                <i class="fa-solid fa-clock me-1"></i>
                                                Borrowed
                                            </span>

                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php if (($loan->status ?? '') === 'Returned'): ?>

                                            <button class="btn btn-secondary btn-sm rounded-pill" disabled>
                                                Completed
                                            </button>

                                        <?php elseif ((int)($loan->user_id ?? 0) === (int)$currentUserId): ?>

                                            <?= $this->Form->postLink(
                                                'Return Book',
                                                [
                                                    'controller' => 'Loans',
                                                    'action' => 'returnBook',
                                                    $loan->id
                                                ],
                                                [
                                                    'class' => 'btn btn-success btn-sm rounded-pill',
                                                    'confirm' => 'Are you sure this book has been returned?'
                                                ]
                                            ) ?>

                                        <?php else: ?>

                                            <span class="status-pill unavailable">
                                                Loaned
                                            </span>

                                        <?php endif; ?>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        <?php else: ?>

                            <tr>
                                <td colspan="8" class="text-center py-5">
                                    <div class="empty-table">
                                        <i class="fa-solid fa-folder-open"></i>
                                        <h5>No loan records found</h5>
                                        <p>No book has been borrowed yet.</p>
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