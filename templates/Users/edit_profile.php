<?php $this->assign('title', 'Edit Profile'); ?>

<div class="page-wrapper">
    <div class="container">

        <div class="edit-profile-card">

            <div class="edit-profile-header">
                <div>
                    <span class="page-badge">
                        <i class="fa-solid fa-user-pen me-2"></i>
                        Edit Profile
                    </span>

                    <h1>Update Your Profile</h1>

                    <p>
                        Change your username, full name, personal information, password and profile picture.
                    </p>
                </div>
            </div>

            <?= $this->Form->create($user, ['type' => 'file']) ?>

                <div class="row g-4">

                    <div class="col-lg-4">
                        <div class="profile-upload-box">

                            <?php if (!empty($user->profile_picture)): ?>

                                <img src="<?= $this->Url->build('/img/profiles/' . $user->profile_picture) ?>" alt="Profile Picture">

                            <?php else: ?>

                                <div class="profile-placeholder large">
                                    <i class="fa-solid fa-user"></i>
                                </div>

                            <?php endif; ?>

                            <label class="mt-4 fw-bold">
                                Profile Picture
                            </label>

                            <?= $this->Form->control('profile_picture', [
                                'type' => 'file',
                                'label' => false,
                                'class' => 'form-control mt-2'
                            ]) ?>

                        </div>
                    </div>

                    <div class="col-lg-8">

                        <div class="row g-4">

                            <div class="col-md-6">
                                <?= $this->Form->control('username', [
                                    'class' => 'form-control',
                                    'label' => 'Username',
                                    'placeholder' => 'Enter username'
                                ]) ?>
                            </div>

                            <div class="col-md-6">
                                <?= $this->Form->control('name', [
                                    'class' => 'form-control',
                                    'label' => 'Full Name',
                                    'placeholder' => 'Enter full name'
                                ]) ?>
                            </div>

                            <div class="col-md-6">
                                <?= $this->Form->control('email', [
                                    'class' => 'form-control',
                                    'label' => 'Email Address',
                                    'placeholder' => 'Enter email address'
                                ]) ?>
                            </div>

                            <div class="col-md-6">
                                <?= $this->Form->control('contact_number', [
                                    'class' => 'form-control',
                                    'label' => 'Contact Number',
                                    'placeholder' => 'Enter contact number'
                                ]) ?>
                            </div>

                            <div class="col-md-12">
                                <?= $this->Form->control('new_password', [
                                    'type' => 'password',
                                    'class' => 'form-control',
                                    'label' => 'New Password',
                                    'placeholder' => 'Leave blank if unchanged'
                                ]) ?>
                            </div>

                        </div>

                        <div class="mt-5 d-flex gap-2 flex-wrap">

                            <button type="submit" class="btn btn-primary rounded-pill px-4">
                                <i class="fa-solid fa-floppy-disk me-2"></i>
                                Save Changes
                            </button>

                            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'profile']) ?>"
                               class="btn btn-outline-secondary rounded-pill px-4">
                                Cancel
                            </a>

                        </div>

                    </div>

                </div>

            <?= $this->Form->end() ?>

        </div>

    </div>
</div>