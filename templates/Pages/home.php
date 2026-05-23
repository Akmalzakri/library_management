<section id="vanta-bg" class="home-hero">
    <div class="hero-overlay"></div>

    <div class="container position-relative">
        <div class="row align-items-center min-vh-100">

            <div class="col-lg-7 text-white">

                <div class="hero-badge mb-4">
                    <i class="fa-solid fa-book-open-reader me-2"></i>
                    Smart Digital Library System
                </div>

                <h1 class="hero-title">
                    Manage Your Library With Style
                </h1>

                <p class="hero-text">
                    A colourful and modern library management system for books,
                    loans, users and loaning records.
                </p>

                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login']) ?>"
                       class="btn btn-warning btn-lg rounded-pill px-5">
                        <i class="fa-solid fa-right-to-bracket me-2"></i>
                        Login
                    </a>

                    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'add']) ?>"
                       class="btn btn-outline-light btn-lg rounded-pill px-5">
                        <i class="fa-solid fa-user-plus me-2"></i>
                        Create Account
                    </a>
                </div>

            </div>

            <div class="col-lg-5 mt-5 mt-lg-0">

                <div class="glass-card">

                    <div class="icon-circle">
                        <i class="fa-solid fa-book"></i>
                    </div>

                    <h3 class="fw-bold text-white mt-3">
                        Library Dashboard
                    </h3>

                    <p class="text-white-50">
                        Fast, simple and beautifully organized.
                    </p>

                    <div class="row g-3 mt-3">

                        <div class="col-6">
                            <div class="mini-card">
                                <i class="fa-solid fa-book-open"></i>
                                <span>Books</span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mini-card">
                                <i class="fa-solid fa-users"></i>
                                <span>Users</span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mini-card">
                                <i class="fa-solid fa-hand-holding"></i>
                                <span>Loans</span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mini-card">
                                <i class="fa-solid fa-chart-line"></i>
                                <span>Reports</span>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</section>

<section class="features-section py-5">
    <div class="container">

        <div class="text-center mb-5">
            <span class="section-badge">
                <i class="fa-solid fa-wand-magic-sparkles me-2"></i>
                Main Features
            </span>

            <h2 class="fw-bold mt-3">
                Everything You Need In One System
            </h2>

            <p class="text-muted">
                Designed to make library management easier, cleaner and more efficient.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="feature-card color-one">
                    <i class="fa-solid fa-book-open"></i>
                    <h4>Book Catalogue</h4>
                    <p>Manage book title, author, category and availability status.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card color-two">
                    <i class="fa-solid fa-arrow-right-arrow-left"></i>
                    <h4>Loan & Return</h4>
                    <p>Track loan records, loan details and return status easily.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-card color-three">
                    <i class="fa-solid fa-user-shield"></i>
                    <h4>User Profile</h4>
                    <p>Users can login, view dashboard and update profile information.</p>
                </div>
            </div>

        </div>

    </div>
</section>