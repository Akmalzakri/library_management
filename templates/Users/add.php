<?php $this->assign('title', 'Sign Up'); ?>

<div class="auth-wrapper">

    <div class="auth-card auth-card-wide">

        <div class="text-center mb-4">

            <div class="auth-icon mx-auto">
                <i class="fa-solid fa-user-plus"></i>
            </div>

            <h2>Create Account</h2>

            <p class="auth-subtitle">
                Register your account to access the smart library system.
            </p>

        </div>

        <?= $this->Form->create($user) ?>

            <div class="row g-4">

                <div class="col-md-6">
                    <div class="form-group-modern">

                        <?= $this->Form->label('name', 'Full Name') ?>

                        <?= $this->Form->control('name', [
                            'label' => false,
                            'class' => 'form-control modern-input',
                            'placeholder' => 'Enter your full name'
                        ]) ?>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group-modern">

                        <?= $this->Form->label('username', 'Username') ?>

                        <?= $this->Form->control('username', [
                            'label' => false,
                            'class' => 'form-control modern-input',
                            'placeholder' => 'Create your username'
                        ]) ?>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group-modern">

                        <?= $this->Form->label('email', 'Email Address') ?>

                        <?= $this->Form->control('email', [
                            'label' => false,
                            'class' => 'form-control modern-input',
                            'placeholder' => 'Enter your email'
                        ]) ?>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group-modern">

                        <?= $this->Form->label('contact_number', 'Contact Number') ?>

                        <?= $this->Form->control('contact_number', [
                            'label' => false,
                            'class' => 'form-control modern-input',
                            'placeholder' => 'Enter contact number'
                        ]) ?>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group-modern">

                        <?= $this->Form->label('password', 'Password') ?>

                        <?= $this->Form->control('password', [
                            'label' => false,
                            'class' => 'form-control modern-input',
                            'placeholder' => 'Create password'
                        ]) ?>

                    </div>
                </div>

            </div>

            <div class="mt-5">

                <button type="submit" class="btn btn-primary w-100 rounded-pill py-3 fw-bold">
                    <i class="fa-solid fa-user-plus me-2"></i>
                    Create Account
                </button>

            </div>

        <?= $this->Form->end() ?>

        <div class="auth-link mt-4">
            Already have an account?
            <?= $this->Html->link('Login Here', ['action' => 'login']) ?>
        </div>

    </div>

</div>