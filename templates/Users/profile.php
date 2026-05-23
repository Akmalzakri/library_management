<?php $this->assign('title', 'My Profile'); ?>

<div class="page-wrapper">
    <div class="container">

        <div class="profile-modern-card">

            <div class="profile-cover"></div>

            <div class="profile-content">

                <div class="profile-image-box">

                    <?php if (!empty($user->profile_picture)): ?>
                        <img src="<?= $this->Url->build('/img/profiles/' . $user->profile_picture) ?>" alt="Profile Picture">
                    <?php else: ?>
                        <div class="profile-placeholder">
                            <i class="fa-solid fa-user"></i>
                        </div>
                    <?php endif; ?>

                </div>

                <h2><?= h($user->username ?? 'User') ?></h2>

                <p class="text-muted">
                    <?= h($user->email ?? '-') ?>
                </p>

                <div class="row g-4 mt-4">

                    <div class="col-md-3">
                        <div class="profile-mini-info">
                            <i class="fa-solid fa-at"></i>
                            <span>Username</span>
                            <strong><?= h($user->username ?? '-') ?></strong>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="profile-mini-info">
                            <i class="fa-solid fa-id-card"></i>
                            <span>Full Name</span>
                            <strong><?= h($user->name ?? '-') ?></strong>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="profile-mini-info">
                            <i class="fa-solid fa-envelope"></i>
                            <span>Email</span>
                            <strong><?= h($user->email ?? '-') ?></strong>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="profile-mini-info">
                            <i class="fa-solid fa-phone"></i>
                            <span>Contact</span>
                            <strong><?= h($user->contact_number ?? '-') ?></strong>
                        </div>
                    </div>

                </div>

                <div class="mt-5 d-flex justify-content-center gap-2 flex-wrap">

                    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'editProfile']) ?>"
                       class="btn btn-primary rounded-pill px-4">
                        <i class="fa-solid fa-user-pen me-2"></i>
                        Edit Profile
                    </a>

                    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'dashboard']) ?>"
                       class="btn btn-outline-secondary rounded-pill px-4">
                        <i class="fa-solid fa-arrow-left me-2"></i>
                        Back to Dashboard
                    </a>

                </div>

            </div>

        </div>

    </div>
</div>