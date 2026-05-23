<div class="auth-wrapper">
    <div class="auth-card">

        <div class="auth-icon">
            <i class="fa-solid fa-right-to-bracket"></i>
        </div>

        <h2>Welcome Back</h2>
        <p>Login to continue to your library dashboard.</p>

        <?= $this->Form->create() ?>

            <div class="mb-3">
                <?= $this->Form->control('username', [
                'class' => 'form-control',
                'label' => 'Username',
                'placeholder' => 'Enter your username'
            ]) ?>
            </div>

            <div class="mb-4">
                <?= $this->Form->control('password', [
                    'class' => 'form-control',
                    'label' => 'Password',
                    'placeholder' => 'Enter your password'
                ]) ?>
            </div>

            <button type="submit" class="btn btn-primary w-100 rounded-pill py-2">
                Login
            </button>

        <?= $this->Form->end() ?>

        <div class="auth-link">
            Don’t have an account?
            <?= $this->Html->link('Create Account', ['action' => 'add']) ?>
        </div>

    </div>
</div>