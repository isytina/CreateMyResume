<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CreateMyResume | Build Your Professional Resume</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        body {
            font-family: "Poppins", sans-serif;
            color: #18152d;
            background: #ffffff;
        }

        .public-navbar {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(14px);
        }

        .brand-text {
            color: #6f42c1;
            font-weight: 700;
        }

        .hero-section {
            min-height: 88vh;
            display: flex;
            align-items: center;
            overflow: hidden;
            background:
                radial-gradient(
                    circle at 85% 20%,
                    rgba(139, 92, 246, 0.26),
                    transparent 35%
                ),
                radial-gradient(
                    circle at 10% 80%,
                    rgba(59, 130, 246, 0.17),
                    transparent 32%
                ),
                linear-gradient(135deg, #faf8ff, #f4f7ff);
        }

        .hero-title {
            font-size: clamp(2.4rem, 5vw, 4.5rem);
            line-height: 1.1;
            font-weight: 700;
        }

        .hero-title span {
            color: #6f42c1;
        }

        .hero-description {
            max-width: 620px;
            font-size: 1.08rem;
            line-height: 1.8;
            color: #666273;
        }

        .btn-main {
            background: #6f42c1;
            border: 1px solid #6f42c1;
            color: #ffffff;
            padding: 13px 26px;
            border-radius: 12px;
            font-weight: 600;
        }

        .btn-main:hover {
            background: #59359c;
            border-color: #59359c;
            color: #ffffff;
        }

        .btn-secondary-action {
            border: 1px solid #6f42c1;
            color: #6f42c1;
            padding: 13px 26px;
            border-radius: 12px;
            font-weight: 600;
        }

        .btn-secondary-action:hover {
            background: #6f42c1;
            color: #ffffff;
        }

        .hero-visual {
            position: relative;
            min-height: 520px;
        }

        .dashboard-preview {
            position: absolute;
            width: 88%;
            top: 40px;
            right: 0;
            padding: 20px;
            background: rgba(255, 255, 255, 0.88);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 26px;
            box-shadow: 0 30px 80px rgba(68, 45, 115, 0.2);
            backdrop-filter: blur(18px);
            transform: rotate(2deg);
        }

        .preview-topbar {
            display: flex;
            gap: 7px;
            margin-bottom: 20px;
        }

        .preview-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #d9d6df;
        }

        .preview-sidebar {
            min-height: 360px;
            border-radius: 18px;
            background: linear-gradient(180deg, #25203c, #403362);
        }

        .preview-content-card {
            padding: 18px;
            margin-bottom: 14px;
            border-radius: 17px;
            background: #f7f4fc;
        }

        .preview-line {
            height: 9px;
            margin-bottom: 9px;
            border-radius: 10px;
            background: #ddd7e9;
        }

        .preview-line.short {
            width: 55%;
        }

        .preview-progress {
            height: 8px;
            margin-top: 16px;
            overflow: hidden;
            border-radius: 8px;
            background: #e7e2ed;
        }

        .preview-progress span {
            display: block;
            width: 72%;
            height: 100%;
            background: #6f42c1;
        }

        .floating-card {
            position: absolute;
            left: 5px;
            bottom: 42px;
            width: 220px;
            padding: 18px;
            border-radius: 18px;
            background: #ffffff;
            box-shadow: 0 18px 45px rgba(68, 45, 115, 0.17);
        }

        .section-padding {
            padding: 90px 0;
        }

        .section-label {
            color: #6f42c1;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 0.85rem;
        }

        .section-title {
            max-width: 680px;
            margin: 10px auto 18px;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
        }

        .feature-card {
            height: 100%;
            padding: 30px;
            border: 1px solid #eeeaf5;
            border-radius: 22px;
            background: #ffffff;
            box-shadow: 0 10px 35px rgba(29, 22, 48, 0.06);
            transition: 0.25s ease;
        }

        .feature-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 18px 50px rgba(29, 22, 48, 0.11);
        }

        .feature-icon {
            width: 58px;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 22px;
            border-radius: 17px;
            font-size: 1.6rem;
            background: #f1eafd;
        }

        .step-number {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 50%;
            background: #6f42c1;
            color: #ffffff;
            font-weight: 700;
        }

        .cta-section {
            margin-bottom: 70px;
            padding: 70px 30px;
            border-radius: 30px;
            color: #ffffff;
            background:
                radial-gradient(
                    circle at 90% 10%,
                    rgba(255, 255, 255, 0.19),
                    transparent 30%
                ),
                linear-gradient(135deg, #42266f, #7650c4);
        }

        footer {
            background: #171426;
            color: #c8c4d0;
        }

        @media (max-width: 991.98px) {
            .hero-section {
                padding: 80px 0;
            }

            .hero-visual {
                min-height: 480px;
                margin-top: 30px;
            }

            .dashboard-preview {
                width: 95%;
                right: 2.5%;
            }
        }

        @media (max-width: 575.98px) {
            .hero-visual {
                min-height: 390px;
            }

            .dashboard-preview {
                padding: 13px;
            }

            .preview-sidebar {
                min-height: 260px;
            }

            .floating-card {
                width: 180px;
                left: 0;
                bottom: 12px;
            }

            .section-padding {
                padding: 65px 0;
            }
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg public-navbar sticky-top shadow-sm py-3">
    <div class="container">

        <a class="navbar-brand brand-text" href="index.php">
            CreateMyResume
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#publicNavbar"
            aria-controls="publicNavbar"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div
            class="collapse navbar-collapse"
            id="publicNavbar"
        >
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link" href="#features">
                        Features
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#how-it-works">
                        How It Works
                    </a>
                </li>

                <li class="nav-item mt-2 mt-lg-0">
                    <a
                        class="btn btn-secondary-action"
                        href="login.php"
                    >
                        Login
                    </a>
                </li>

                <li class="nav-item mt-2 mt-lg-0">
                    <a
                        class="btn btn-main"
                        href="register.php"
                    >
                        Get Started
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>

<main>

    <!-- Hero section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-5">

                <div class="col-lg-6">

                    <span class="section-label">
                        Your career starts here
                    </span>

                    <h1 class="hero-title mt-3">
                        Build a resume that helps you
                        <span>stand out.</span>
                    </h1>

                    <p class="hero-description mt-4">
                        CreateMyResume helps you build a professional career
                        profile, organise your resume content, discover job
                        opportunities and track your applications from one
                        simple platform.
                    </p>

                    <div class="d-flex flex-wrap gap-3 mt-4">
                        <a
                            href="register.php"
                            class="btn btn-main"
                        >
                            Create My Resume
                        </a>

                        <a
                            href="login.php"
                            class="btn btn-secondary-action"
                        >
                            I Already Have an Account
                        </a>
                    </div>

                    <div class="d-flex flex-wrap gap-4 mt-4 text-muted small">
                        <span>✓ Easy to use</span>
                        <span>✓ Career-focused profile</span>
                        <span>✓ Application tracking</span>
                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="hero-visual">

                        <div class="dashboard-preview">

                            <div class="preview-topbar">
                                <span class="preview-dot"></span>
                                <span class="preview-dot"></span>
                                <span class="preview-dot"></span>
                            </div>

                            <div class="row g-3">

                                <div class="col-4">
                                    <div class="preview-sidebar"></div>
                                </div>

                                <div class="col-8">

                                    <div class="preview-content-card">
                                        <div class="preview-line short"></div>
                                        <div class="preview-line"></div>

                                        <div class="preview-progress">
                                            <span></span>
                                        </div>
                                    </div>

                                    <div class="row g-3">

                                        <div class="col-6">
                                            <div class="preview-content-card">
                                                <div class="preview-line"></div>
                                                <div class="preview-line short"></div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="preview-content-card">
                                                <div class="preview-line"></div>
                                                <div class="preview-line short"></div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="preview-content-card">
                                        <div class="preview-line short"></div>
                                        <div class="preview-line"></div>
                                        <div class="preview-line"></div>
                                        <div class="preview-line short"></div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="floating-card">
                            <div class="small text-muted mb-2">
                                Profile Completion
                            </div>

                            <div class="d-flex align-items-end gap-2">
                                <h3 class="fw-bold mb-0">72%</h3>
                                <span class="text-success small mb-1">
                                    Ready to grow
                                </span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section
        class="section-padding"
        id="features"
    >
        <div class="container">

            <div class="text-center mb-5">
                <span class="section-label">
                    Platform features
                </span>

                <h2 class="section-title">
                    Everything you need to prepare for your next opportunity
                </h2>

                <p class="text-muted mx-auto" style="max-width: 650px;">
                    Build your information once and manage your career
                    activities in one organised workspace.
                </p>
            </div>

            <div class="row g-4">

                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">👤</div>

                        <h5 class="fw-semibold">
                            Career Profile
                        </h5>

                        <p class="text-muted mb-0">
                            Store your personal information, education,
                            experience and professional strengths.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">📄</div>

                        <h5 class="fw-semibold">
                            Resume Builder
                        </h5>

                        <p class="text-muted mb-0">
                            Organise your resume content and create a clear
                            professional summary.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">💼</div>

                        <h5 class="fw-semibold">
                            Job Discovery
                        </h5>

                        <p class="text-muted mb-0">
                            Explore available job opportunities that support
                            your career goals.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">📊</div>

                        <h5 class="fw-semibold">
                            Application Tracking
                        </h5>

                        <p class="text-muted mb-0">
                            Monitor submitted applications and keep track of
                            your job-search activities.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- How it works -->
    <section
        class="section-padding bg-light"
        id="how-it-works"
    >
        <div class="container">

            <div class="row align-items-center g-5">

                <div class="col-lg-5">
                    <span class="section-label">
                        How it works
                    </span>

                    <h2 class="fw-bold display-6 mt-3">
                        From an empty profile to your next application
                    </h2>

                    <p class="text-muted mt-3">
                        CreateMyResume guides you through the important steps
                        instead of leaving you wondering what to do next.
                    </p>
                </div>

                <div class="col-lg-7">

                    <div class="d-flex gap-3 mb-4">
                        <div class="step-number">1</div>

                        <div>
                            <h5 class="fw-semibold">
                                Create your account
                            </h5>

                            <p class="text-muted mb-0">
                                Register and access your personal career
                                dashboard.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mb-4">
                        <div class="step-number">2</div>

                        <div>
                            <h5 class="fw-semibold">
                                Complete your profile
                            </h5>

                            <p class="text-muted mb-0">
                                Add your education, experience, skills,
                                languages and references.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mb-4">
                        <div class="step-number">3</div>

                        <div>
                            <h5 class="fw-semibold">
                                Build your resume
                            </h5>

                            <p class="text-muted mb-0">
                                Organise your information into a professional
                                resume.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-3">
                        <div class="step-number">4</div>

                        <div>
                            <h5 class="fw-semibold">
                                Explore and apply
                            </h5>

                            <p class="text-muted mb-0">
                                Find suitable jobs and monitor your submitted
                                applications.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Call to action -->
    <section class="container mt-5">
        <div class="cta-section text-center">

            <h2 class="fw-bold display-6">
                Ready to build your professional future?
            </h2>

            <p class="mt-3 mb-4 mx-auto" style="max-width: 650px;">
                Create your profile, strengthen your resume and take the next
                step towards your career goals.
            </p>

            <a
                href="register.php"
                class="btn btn-light btn-lg px-4 fw-semibold"
            >
                Get Started Now
            </a>

        </div>
    </section>

</main>

<footer class="py-4">
    <div class="container">
        <div
            class="d-flex flex-column flex-md-row
                   justify-content-between align-items-center gap-2"
        >
            <strong class="text-white">
                CreateMyResume
            </strong>

            <span class="small">
                Build your profile. Create your resume. Start your career.
            </span>
        </div>
    </div>
</footer>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>

</body>
</html>
