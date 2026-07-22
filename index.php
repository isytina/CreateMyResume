<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CreateMyResume helps students and job seekers build a professional resume, organise their career profile and track job applications in one place.">

    <title>CreateMyResume | Build Your Career With Confidence</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #6f42c1;
            --primary-dark: #56319c;
            --primary-soft: #f2ecff;
            --ink: #1d1933;
            --muted: #6f6b7d;
            --line: #ece7f5;
            --surface: #ffffff;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: "Poppins", sans-serif;
            color: var(--ink);
            background: #ffffff;
        }

        a {
            text-decoration: none;
        }

        .landing-navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 17px 0;
            background: rgba(255, 255, 255, 0.92);
            border-bottom: 1px solid rgba(111, 66, 193, 0.08);
            backdrop-filter: blur(16px);
        }

        .navbar-brand {
            color: var(--primary) !important;
            font-size: 1.3rem;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .nav-link {
            color: #5f5a6a;
            font-weight: 500;
        }

        .nav-link:hover {
            color: var(--primary);
        }

        .btn-primary-custom,
        .btn-outline-custom {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 50px;
            padding: 0 24px;
            border-radius: 12px;
            font-weight: 600;
            transition: 0.22s ease;
        }

        .btn-primary-custom {
            color: #ffffff;
            background: linear-gradient(135deg, #7b4fd4, #6337b3);
            border: 1px solid transparent;
            box-shadow: 0 12px 28px rgba(111, 66, 193, 0.24);
        }

        .btn-primary-custom:hover {
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 17px 35px rgba(111, 66, 193, 0.31);
        }

        .btn-outline-custom {
            color: var(--primary);
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(111, 66, 193, 0.45);
        }

        .btn-outline-custom:hover {
            color: #ffffff;
            background: var(--primary);
            border-color: var(--primary);
        }

        .hero-section {
            position: relative;
            min-height: 720px;
            display: flex;
            align-items: center;
            overflow: hidden;
            background:
                radial-gradient(circle at 13% 20%, rgba(141, 92, 246, 0.16), transparent 33%),
                radial-gradient(circle at 87% 14%, rgba(119, 71, 210, 0.22), transparent 35%),
                linear-gradient(135deg, #fbfaff 0%, #f4f1ff 50%, #f7f9ff 100%);
        }

        .hero-section::before,
        .hero-section::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            filter: blur(4px);
            pointer-events: none;
        }

        .hero-section::before {
            width: 230px;
            height: 230px;
            top: -90px;
            left: 42%;
            background: rgba(255, 255, 255, 0.66);
        }

        .hero-section::after {
            width: 310px;
            height: 310px;
            right: -110px;
            bottom: -150px;
            background: rgba(111, 66, 193, 0.12);
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 13px;
            color: var(--primary);
            background: rgba(255, 255, 255, 0.78);
            border: 1px solid rgba(111, 66, 193, 0.12);
            border-radius: 999px;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            box-shadow: 0 8px 22px rgba(75, 52, 111, 0.07);
        }

        .hero-title {
            max-width: 720px;
            margin-top: 20px;
            font-size: clamp(2.6rem, 5vw, 4.65rem);
            line-height: 1.07;
            font-weight: 800;
            letter-spacing: -2.8px;
        }

        .hero-title span {
            color: var(--primary);
        }

        .hero-copy {
            max-width: 640px;
            margin-top: 24px;
            color: var(--muted);
            font-size: 1.08rem;
            line-height: 1.8;
        }

        .hero-benefits {
            display: flex;
            flex-wrap: wrap;
            gap: 10px 22px;
            margin-top: 25px;
            color: #514c5e;
            font-size: 0.91rem;
            font-weight: 500;
        }

        .hero-benefits span {
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .hero-benefits i {
            color: #149966;
        }

        .hero-visual {
            position: relative;
            min-height: 590px;
        }

        .photo-shell {
            position: absolute;
            top: 30px;
            right: 2%;
            width: 88%;
            height: 525px;
            overflow: hidden;
            border: 10px solid rgba(255, 255, 255, 0.82);
            border-radius: 34px;
            box-shadow: 0 35px 90px rgba(65, 42, 105, 0.23);
            transform: rotate(1.5deg);
        }

        .photo-shell::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, transparent 50%, rgba(35, 23, 58, 0.2));
        }

        .photo-shell img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .floating-card {
            position: absolute;
            z-index: 5;
            padding: 17px 19px;
            background: rgba(255, 255, 255, 0.94);
            border: 1px solid rgba(255, 255, 255, 0.9);
            border-radius: 17px;
            box-shadow: 0 18px 42px rgba(44, 29, 72, 0.17);
            backdrop-filter: blur(12px);
        }

        .floating-card small {
            color: #7c7687;
            font-size: 0.76rem;
        }

        .floating-card strong {
            display: block;
            margin-top: 4px;
            font-size: 1.16rem;
        }

        .success-card{
    top:25px;
    right:5px;
}

.score-card{
    left:-15px;
    bottom:40px;
}

.resume-card{
    right:0;
    bottom:15px;
}

        .card-icon {
            width: 42px;
            height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: var(--primary);
            background: var(--primary-soft);
            border-radius: 12px;
            font-size: 1.15rem;
        }

        .progress-thin {
            height: 7px;
            overflow: hidden;
            margin-top: 11px;
            background: #eae5f4;
            border-radius: 999px;
        }

        .progress-thin span {
            display: block;
            width: 92%;
            height: 100%;
            background: linear-gradient(90deg, #7a4bd2, #9c72eb);
        }

        .section-padding {
            padding: 95px 0;
        }

        .section-tag {
            color: var(--primary);
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 1.25px;
            text-transform: uppercase;
        }

        .section-heading {
            max-width: 770px;
            margin: 12px auto 18px;
            font-size: clamp(2rem, 4vw, 3.15rem);
            line-height: 1.2;
            font-weight: 800;
            letter-spacing: -1.5px;
        }

        .section-copy {
            max-width: 690px;
            margin-inline: auto;
            color: var(--muted);
            line-height: 1.75;
        }

        .feature-card {
            height: 100%;
            padding: 30px;
            background: #ffffff;
            border: 1px solid var(--line);
            border-radius: 22px;
            box-shadow: 0 12px 35px rgba(34, 27, 52, 0.055);
            transition: 0.25s ease;
        }

        .feature-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 50px rgba(52, 38, 78, 0.1);
        }

        .feature-icon {
            width: 57px;
            height: 57px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 22px;
            color: var(--primary);
            background: var(--primary-soft);
            border-radius: 17px;
            font-size: 1.45rem;
        }

        .feature-card h3 {
            font-size: 1.06rem;
            font-weight: 700;
        }

        .feature-card p {
            margin: 10px 0 0;
            color: var(--muted);
            font-size: 0.91rem;
            line-height: 1.7;
        }

        .steps-section {
            background: #faf9fd;
        }

        .step-card {
            position: relative;
            height: 100%;
            padding: 28px;
            background: #ffffff;
            border: 1px solid var(--line);
            border-radius: 20px;
        }

        .step-number {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            color: #ffffff;
            background: var(--primary);
            border-radius: 13px;
            font-weight: 700;
        }

        .step-card h3 {
            font-size: 1.04rem;
            font-weight: 700;
        }

        .step-card p {
            margin: 9px 0 0;
            color: var(--muted);
            font-size: 0.9rem;
            line-height: 1.65;
        }

        .product-showcase {
            position: relative;
            padding: 42px;
            overflow: hidden;
            background:
                radial-gradient(circle at 90% 10%, rgba(255,255,255,.16), transparent 28%),
                linear-gradient(135deg, #211837, #6540a9);
            border-radius: 30px;
            box-shadow: 0 28px 70px rgba(54, 32, 91, 0.22);
        }

        .product-showcase h2,
        .product-showcase p {
            color: #ffffff;
        }

        .showcase-panel {
            min-height: 330px;
            padding: 22px;
            background: rgba(255,255,255,.95);
            border-radius: 22px;
            box-shadow: 0 20px 50px rgba(15, 7, 29, .22);
        }

        .mini-sidebar {
            min-height: 285px;
            padding: 16px 10px;
            color: #ffffff;
            background: #292039;
            border-radius: 16px;
        }

        .mini-sidebar span {
            display: block;
            height: 9px;
            margin: 14px 5px;
            background: rgba(255,255,255,.19);
            border-radius: 10px;
        }

        .mini-card {
            min-height: 85px;
            padding: 16px;
            background: #f5f2fa;
            border-radius: 14px;
        }

        .mini-line {
            height: 8px;
            margin-bottom: 9px;
            background: #ddd6e8;
            border-radius: 999px;
        }

        .mini-line.short {
            width: 55%;
        }

        .cta-wrap {
            padding: 72px 25px;
            color: #ffffff;
            text-align: center;
            background:
                radial-gradient(circle at 12% 0%, rgba(255,255,255,.14), transparent 28%),
                linear-gradient(135deg, #4e2c84, #7b50c9);
            border-radius: 30px;
        }

        .cta-wrap h2 {
            font-size: clamp(2rem, 4vw, 3.15rem);
            font-weight: 800;
            letter-spacing: -1.3px;
        }

        .cta-wrap p {
            max-width: 650px;
            margin: 17px auto 28px;
            color: rgba(255,255,255,.82);
            line-height: 1.75;
        }

        footer {
            margin-top: 75px;
            padding: 28px 0;
            color: #cfc9dc;
            background: #171326;
        }

        @media (max-width: 991.98px) {
            .landing-navbar {
                padding: 12px 0;
            }

            .hero-section {
                min-height: auto;
                padding: 82px 0 65px;
            }

            .hero-title {
                letter-spacing: -1.8px;
            }

            .hero-visual {
                min-height: 540px;
                margin-top: 25px;
            }

            .photo-shell{
    position:absolute;
    top:35px;
    right:20px;
    width:82%;
    height:500px;
    overflow:hidden;
    border-radius:32px;
}

            .score-card {
                left: 3%;
            }
        }

        @media (max-width: 575.98px) {
            .hero-section {
                padding-top: 60px;
            }

            .hero-title {
                font-size: 2.65rem;
                letter-spacing: -1.5px;
            }

            .hero-copy {
                font-size: 0.98rem;
            }

            .hero-actions a {
                width: 100%;
            }

            .hero-visual {
                min-height: 470px;
            }

            .photo-shell {
                width: 100%;
                right: 0;
                height: 410px;
                border-width: 7px;
                border-radius: 26px;
            }

            .floating-card {
                padding: 13px 14px;
            }

            .success-card {
                top: 44px;
                right: -2px;
                width: 180px;
            }

            .score-card {
                left: -3px;
                bottom: 40px;
                width: 185px;
            }

            .resume-card {
                display: none;
            }

            .section-padding {
                padding: 72px 0;
            }

            .product-showcase {
                padding: 28px 18px;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg landing-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php">CreateMyResume</a>

        <button
            class="navbar-toggler border-0 shadow-none"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#landingNavbar"
            aria-controls="landingNavbar"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="landingNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2 mt-3 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link px-lg-3" href="#features">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-lg-3" href="#how-it-works">How It Works</a>
                </li>
                <li class="nav-item mt-2 mt-lg-0">
                    <a class="btn-outline-custom" href="login.php">Login</a>
                </li>
                <li class="nav-item mt-2 mt-lg-0">
                    <a class="btn-primary-custom" href="register.php">Get Started</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main>
    <section class="hero-section">
        <div class="container position-relative">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="eyebrow">
                        <i class="bi bi-stars"></i>
                        Build your future with confidence
                    </span>

                    <h1 class="hero-title">
                        From a blank page to a resume that <span>gets noticed.</span>
                    </h1>

                    <p class="hero-copy">
                        Not sure what to write or where to begin? CreateMyResume guides you step by step to organise your experience, create a professional resume and manage your job applications—all in one simple platform.
                    </p>

                    <div class="hero-actions d-flex flex-wrap gap-3 mt-4">
                        <a href="register.php" class="btn-primary-custom">
                            Build My Resume
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                        <a href="#how-it-works" class="btn-outline-custom">
                            See How It Works
                        </a>
                    </div>

                    <div class="hero-benefits">
                        <span><i class="bi bi-check-circle-fill"></i>No design skills needed</span>
                        <span><i class="bi bi-check-circle-fill"></i>Easy step-by-step process</span>
                        <span><i class="bi bi-check-circle-fill"></i>Application tracking</span>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-visual">
                        <div class="photo-shell">
 <img
    src="assets/images/hero-graduate.jpg"
    class="img-fluid hero-image"
    alt="Fresh graduate building resume"
>
                            >
                        </div>

                        <div class="floating-card success-card">
                            <div class="d-flex align-items-center gap-3">
                                <span class="card-icon">
                                    <i class="bi bi-patch-check-fill"></i>
                                </span>
                                <div>
                                    <small>Career profile</small>
                                    <strong>Ready to apply</strong>
                                </div>
                            </div>
                        </div>

                        <div class="floating-card score-card">
                            <div class="d-flex justify-content-between align-items-end">
                                <div>
                                    <small>Resume score</small>
                                    <strong class="fs-3">92%</strong>
                                </div>
                                <span class="text-success small fw-semibold">Excellent</span>
                            </div>
                            <div class="progress-thin"><span></span></div>
                        </div>

                        <div class="floating-card resume-card">
                            <div class="d-flex align-items-center gap-3">
                                <span class="card-icon">
                                    <i class="bi bi-file-earmark-text-fill"></i>
                                </span>
                                <div>
                                    <small>Professional resume</small>
                                    <strong>Completed successfully</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding" id="features">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-tag">One platform, every career step</span>
                <h2 class="section-heading">Everything you need to move from preparation to application</h2>
                <p class="section-copy">
                    CreateMyResume does more than create a document. It helps you build your career profile, prepare a clear resume and stay organised while searching for your next opportunity.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <article class="feature-card">
                        <div class="feature-icon"><i class="bi bi-person-vcard"></i></div>
                        <h3>Career Profile</h3>
                        <p>Keep your education, skills, experience and professional details organised in one place.</p>
                    </article>
                </div>

                <div class="col-md-6 col-lg-3">
                    <article class="feature-card">
                        <div class="feature-icon"><i class="bi bi-file-earmark-richtext"></i></div>
                        <h3>Resume Builder</h3>
                        <p>Turn your information into a clean, structured resume that is easy for employers to read.</p>
                    </article>
                </div>

                <div class="col-md-6 col-lg-3">
                    <article class="feature-card">
                        <div class="feature-icon"><i class="bi bi-briefcase"></i></div>
                        <h3>Job Opportunities</h3>
                        <p>Browse available roles and move directly from resume preparation to job application.</p>
                    </article>
                </div>

                <div class="col-md-6 col-lg-3">
                    <article class="feature-card">
                        <div class="feature-icon"><i class="bi bi-graph-up-arrow"></i></div>
                        <h3>Application Tracker</h3>
                        <p>Monitor the jobs you have applied for and view your career progress from one dashboard.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding steps-section" id="how-it-works">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-tag">Simple by design</span>
                <h2 class="section-heading">Build your resume in four clear steps</h2>
                <p class="section-copy">No complicated tools and no confusing setup. Follow the guided process and focus on presenting your best experience.</p>
            </div>

            <div class="row g-4">
                <div class="col-sm-6 col-lg-3">
                    <article class="step-card">
                        <div class="step-number">01</div>
                        <h3>Create an account</h3>
                        <p>Register and access your personal career workspace.</p>
                    </article>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <article class="step-card">
                        <div class="step-number">02</div>
                        <h3>Complete your profile</h3>
                        <p>Add your education, experience, skills and professional information.</p>
                    </article>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <article class="step-card">
                        <div class="step-number">03</div>
                        <h3>Build your resume</h3>
                        <p>Review your information and generate a clear professional resume.</p>
                    </article>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <article class="step-card">
                        <div class="step-number">04</div>
                        <h3>Apply with confidence</h3>
                        <p>Explore job opportunities and track your applications in one place.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="product-showcase">
                <div class="row align-items-center g-5">
                    <div class="col-lg-5">
                        <span class="section-tag text-white-50">Your career workspace</span>
                        <h2 class="fw-bold display-6 mt-3">Know what to do next, every time you log in.</h2>
                        <p class="mt-3 mb-0 opacity-75 lh-lg">
                            Your dashboard highlights profile completion, resume progress and submitted applications so you are never left wondering what step comes next.
                        </p>
                    </div>

                    <div class="col-lg-7">
                        <div class="showcase-panel">
                            <div class="row g-3">
                                <div class="col-4">
                                    <div class="mini-sidebar">
                                        <span></span><span></span><span></span><span></span><span></span>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="mini-card mb-3">
                                        <div class="mini-line short"></div>
                                        <div class="mini-line"></div>
                                        <div class="progress-thin"><span></span></div>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col-6"><div class="mini-card"><div class="mini-line"></div><div class="mini-line short"></div></div></div>
                                        <div class="col-6"><div class="mini-card"><div class="mini-line"></div><div class="mini-line short"></div></div></div>
                                    </div>
                                    <div class="mini-card">
                                        <div class="mini-line short"></div>
                                        <div class="mini-line"></div>
                                        <div class="mini-line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="cta-wrap">
            <h2>Ready to build your professional future?</h2>
            <p>Create your profile, organise your experience and take the next step towards your career goals with confidence.</p>
            <a href="register.php" class="btn btn-light btn-lg px-4 py-3 fw-semibold rounded-3 text-primary">
                Start Building My Resume
                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </section>
</main>

<footer>
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
        <strong class="text-white">CreateMyResume</strong>
        <span class="small">Build your profile. Create your resume. Start your career.</span>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
