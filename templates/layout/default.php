<?php
$session = $this->request->getSession();

$isLoggedIn =
    $session->check('Auth.id') ||
    $session->check('Auth.User.id');

$userName =
    $session->read('Auth.username') ??
    $session->read('Auth.User.username') ??
    'User';

$profilePicture =
    $session->read('Auth.profile_picture') ??
    $session->read('Auth.User.profile_picture') ??
    null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LibraFlow</title>

    <?= $this->Html->meta('icon') ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= $this->Url->build('/css/home.css') ?>?v=<?= time() ?>">

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>

<body>

<nav class="navbar navbar-expand-lg app-navbar sticky-top">
    <div class="container">

        <a class="navbar-brand d-flex align-items-center gap-3"
           href="<?= $isLoggedIn
                ? $this->Url->build(['controller' => 'Users', 'action' => 'dashboard'])
                : $this->Url->build('/') ?>">

            <span class="brand-logo">
                <i class="fa-solid fa-book-open-reader"></i>
            </span>

            <div class="brand-text-group">
                <span class="brand-text">LibraFlow</span>
                <small class="brand-subtext">Smart Library System</small>
            </div>
        </a>

        <button class="navbar-toggler custom-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar">
            <i class="fa-solid fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">

            <ul class="navbar-nav mx-auto nav-pill-box">

                <li class="nav-item">
                    <a class="nav-link"
                       href="<?= $isLoggedIn
                            ? $this->Url->build(['controller' => 'Books', 'action' => 'index'])
                            : $this->Url->build(['controller' => 'Users', 'action' => 'login']) ?>">
                        <i class="fa-solid fa-book-open me-2"></i>
                        Books
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       href="<?= $isLoggedIn
                            ? $this->Url->build(['controller' => 'Loans', 'action' => 'index'])
                            : $this->Url->build(['controller' => 'Users', 'action' => 'login']) ?>">
                        <i class="fa-solid fa-arrow-right-arrow-left me-2"></i>
                        Loans
                    </a>
                </li>

                <?php if ($isLoggedIn): ?>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'dashboard']) ?>">
                            <i class="fa-solid fa-chart-line me-2"></i>
                            Dashboard
                        </a>
                    </li>
                <?php endif; ?>

            </ul>

            <div class="d-flex align-items-center gap-3 nav-action-group">

                <?php if (!$isLoggedIn): ?>

                    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login']) ?>"
                       class="btn btn-login-modern">
                        Login
                    </a>

                    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'add']) ?>"
                       class="btn btn-signup-modern">
                        Sign Up
                    </a>

                <?php else: ?>

                    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'profile']) ?>"
                       class="modern-user-chip text-decoration-none">

                        <span class="user-avatar">
                            <?php if (!empty($profilePicture)): ?>
                                <img src="<?= $this->Url->build('/img/profiles/' . $profilePicture) ?>" alt="Profile Picture">
                            <?php else: ?>
                                <i class="fa-solid fa-user"></i>
                            <?php endif; ?>
                        </span>

                        <div class="user-meta">
                            <strong><?= h($userName) ?></strong>
                            <small>Library User</small>
                        </div>

                    </a>

                    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>"
                       class="btn btn-logout-modern">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>

                <?php endif; ?>

            </div>

        </div>
    </div>
</nav>

<main class="app-main">

    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <?= $this->Flash->render() ?>
    </div>

    <?= $this->fetch('content') ?>

</main>

<footer class="modern-footer">
    <div class="container">

        <div class="footer-grid">

            <div>
                <div class="footer-brand">
                    <span class="footer-logo">
                        <i class="fa-solid fa-book-open-reader"></i>
                    </span>

                    <div>
                        <h4>LibraFlow</h4>
                        <p>Modern Digital Library</p>
                    </div>
                </div>

                <p class="footer-description">
                    A modern and colourful library management platform
                    designed for books, loans and user management.
                </p>
            </div>

            <div class="footer-links">
                <h5>Navigation</h5>

                <a href="<?= $isLoggedIn
                    ? $this->Url->build(['controller' => 'Books', 'action' => 'index'])
                    : $this->Url->build(['controller' => 'Users', 'action' => 'login']) ?>">
                    Books
                </a>

                <a href="<?= $isLoggedIn
                    ? $this->Url->build(['controller' => 'Loans', 'action' => 'index'])
                    : $this->Url->build(['controller' => 'Users', 'action' => 'login']) ?>">
                    Loans
                </a>

                <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login']) ?>">
                    Login
                </a>
            </div>

            <div class="footer-links">
                <h5>Features</h5>

                <span>Book Catalogue</span>
                <span>Borrow & Return</span>
                <span>User Management</span>
                <span>Loan Tracking</span>
            </div>

        </div>

        <div class="footer-bottom-modern">
            <span>© 2026 LibraFlow. All rights reserved.</span>
            <span>Built with Bootstrap, Font Awesome & Vanta.js</span>
        </div>

    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.waves.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    if (document.querySelector("#vanta-bg")) {
        VANTA.WAVES({
            el: "#vanta-bg",
            mouseControls: true,
            touchControls: true,
            gyroControls: false,
            color: 0x2563eb,
            shininess: 45,
            waveHeight: 18,
            waveSpeed: 0.8,
            zoom: 0.9
        });
    }

    setTimeout(function () {
        document.querySelectorAll('.toast-container .message').forEach(function (toast) {
            toast.remove();
        });
    }, 4500);
});
</script>

<?= $this->fetch('script') ?>

</body>
</html>