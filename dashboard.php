<?php include 'include/session.php'; ?>

<?php
$username = $_SESSION["username"] ?? "User";

$fullname   = $_SESSION["fullname"] ?? "";
$email      = $_SESSION["email"] ?? "";
$phone      = $_SESSION["phone"] ?? "";
$education  = $_SESSION["education"] ?? "";
$skills     = $_SESSION["skills"] ?? "";
$experience = $_SESSION["experience"] ?? "";
$aboutMe    = $_SESSION["about_me"] ?? "";
$language   = $_SESSION["language"] ?? "";
$references = $_SESSION["references"] ?? "";

/* Calculate profile completion */
$fields = [
    $fullname,
    $email,
    $phone,
    $education,
    $skills,
    $experience,
    $aboutMe,
    $language,
    $references
];

$completed = 0;

foreach ($fields as $field) {
    if (!empty(trim((string) $field))) {
        $completed++;
    }
}

$resumeCompletion = count($fields) > 0
    ? round(($completed / count($fields)) * 100)
    : 0;

/* Count resume content */
$skillsCount = !empty(trim($skills))
    ? count(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $skills))))
    : 0;

$educationCount = !empty(trim($education))
    ? count(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $education))))
    : 0;

$experienceCount = !empty(trim($experience))
    ? count(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $experience))))
    : 0;

$languageCount = !empty(trim($language))
    ? count(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $language))))
    : 0;

/* Application data */
$applications = $_SESSION["applications"] ?? [];

if (!is_array($applications)) {
    $applications = [];
}

$totalApplications = count($applications);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- Important for responsive mobile layout -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - CreateMyResume</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="assets/css/style.css?v=3"
    >

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            font-family: "Poppins", sans-serif;
        }

        .dashboard-card {
            height: 100%;
            border-radius: 22px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.09) !important;
        }

        .dashboard-card .card-body {
            display: flex;
            flex-direction: column;
        }

        .dashboard-action {
            margin-top: auto;
            padding-top: 18px;
        }

        .chart-container {
            position: relative;
            width: 100%;
            min-height: 280px;
        }

        .chart-container canvas {
            max-height: 320px;
        }

        .status-icon {
            width: 46px;
            height: 46px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            font-size: 22px;
            background: rgba(13, 110, 253, 0.1);
        }

        .empty-message {
            border-radius: 14px;
            background: #f8f9fa;
            padding: 12px 14px;
            font-size: 14px;
            color: #6c757d;
        }

        @media (max-width: 767.98px) {
            .container {
                padding-left: 16px;
                padding-right: 16px;
            }

            .chart-container {
                min-height: 240px;
            }

            .chart-container canvas {
                max-height: 270px;
            }

            .dashboard-heading {
                font-size: 1.65rem;
            }
        }
    </style>
</head>

<body class="bg-light">

<?php include 'include/navbar.php'; ?>

<main class="container py-4 py-lg-5">

    <div class="row g-4">

        <!-- Sidebar -->
        <aside class="col-lg-3 d-none d-lg-block">
            <?php include 'include/sidebar.php'; ?>
        </aside>

        <!-- Main dashboard -->
        <section class="col-lg-9">

            <div class="mb-4">
                <h2 class="fw-bold dashboard-heading">
                    Welcome back,
                    <?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?> 👋
                </h2>

                <p class="text-muted mb-0">
                    View your career progress and continue building your profile.
                </p>
            </div>

            <!-- Main status cards -->
            <div class="row g-4 mb-4">

                <!-- Resume completion -->
                <div class="col-md-6">
                    <div class="card dashboard-card border-0 shadow-sm">
                        <div class="card-body p-4">

                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h6 class="text-muted mb-2">
                                        Resume Completion
                                    </h6>

                                    <h2 class="fw-bold mb-0">
                                        <?php echo $resumeCompletion; ?>%
                                    </h2>
                                </div>

                                <span class="status-icon">📝</span>
                            </div>

                            <div
                                class="progress mb-3"
                                role="progressbar"
                                aria-label="Resume completion"
                                aria-valuenow="<?php echo $resumeCompletion; ?>"
                                aria-valuemin="0"
                                aria-valuemax="100"
                            >
                                <div
                                    class="progress-bar"
                                    style="width: <?php echo $resumeCompletion; ?>%"
                                ></div>
                            </div>

                            <?php if ($resumeCompletion < 100): ?>
                                <p class="text-muted small mb-0">
                                    Your profile is incomplete. Add your personal
                                    information to improve your resume.
                                </p>

                                <div class="dashboard-action">
                                    <a
                                        href="profile.php"
                                        class="btn btn-primary w-100"
                                    >
                                        Complete Your Profile
                                    </a>
                                </div>
                            <?php else: ?>
                                <p class="text-success small mb-0">
                                    Your profile information is complete.
                                </p>

                                <div class="dashboard-action">
                                    <a
                                        href="profile.php"
                                        class="btn btn-outline-primary w-100"
                                    >
                                        Review Profile
                                    </a>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

                <!-- Applications -->
                <div class="col-md-6">
                    <div class="card dashboard-card border-0 shadow-sm">
                        <div class="card-body p-4">

                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h6 class="text-muted mb-2">
                                        Applications Submitted
                                    </h6>

                                    <h2 class="fw-bold mb-0">
                                        <?php echo $totalApplications; ?>
                                    </h2>
                                </div>

                                <span class="status-icon">💼</span>
                            </div>

                            <?php if ($totalApplications === 0): ?>
                                <div class="empty-message">
                                    You have not submitted any job applications yet.
                                </div>

                                <div class="dashboard-action">
                                    <a
                                        href="jobs.php"
                                        class="btn btn-primary w-100"
                                    >
                                        Browse Available Jobs
                                    </a>
                                </div>
                            <?php else: ?>
                                <p class="text-muted small mb-0">
                                    Track the jobs that you have applied for.
                                </p>

                                <div class="dashboard-action">
                                    <a
                                        href="applications.php"
                                        class="btn btn-outline-primary w-100"
                                    >
                                        View My Applications
                                    </a>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

            </div>

            <!-- Charts and actionable sections -->
            <div class="row g-4">

                <!-- Profile completion chart -->
                <div class="col-md-6">
                    <div class="card dashboard-card border-0 shadow-sm">
                        <div class="card-body p-4">

                            <h5 class="fw-semibold mb-2">
                                Profile Completion
                            </h5>

                            <p class="text-muted small">
                                Monitor how much of your career profile has been completed.
                            </p>

                            <div class="chart-container">
                                <canvas id="completionChart"></canvas>
                            </div>

                            <div class="dashboard-action">
                                <a
                                    href="profile.php"
                                    class="btn btn-outline-primary w-100"
                                >
                                    <?php echo $resumeCompletion < 100
                                        ? 'Complete Your Profile'
                                        : 'Update Profile'; ?>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Resume content -->
                <div class="col-md-6">
                    <div class="card dashboard-card border-0 shadow-sm">
                        <div class="card-body p-4">

                            <h5 class="fw-semibold mb-2">
                                Resume Content
                            </h5>

                            <p class="text-muted small">
                                Review the amount of information included in your resume.
                            </p>

                            <?php if (
                                $educationCount === 0 &&
                                $skillsCount === 0 &&
                                $experienceCount === 0 &&
                                $languageCount === 0
                            ): ?>
                                <div class="empty-message mb-3">
                                    Your resume does not have enough content yet.
                                    Add education, skills, experience and languages.
                                </div>
                            <?php endif; ?>

                            <div class="chart-container">
                                <canvas id="contentChart"></canvas>
                            </div>

                            <div class="dashboard-action">
                                <a
                                    href="resume.php"
                                    class="btn btn-outline-primary w-100"
                                >
                                    Add or Update Resume
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Skills overview -->
                <div class="col-md-6">
                    <div class="card dashboard-card border-0 shadow-sm">
                        <div class="card-body p-4">

                            <h5 class="fw-semibold mb-2">
                                Skills & Career Readiness
                            </h5>

                            <p class="text-muted small">
                                Compare the main sections that support your career profile.
                            </p>

                            <div class="chart-container">
                                <canvas id="skillChart"></canvas>
                            </div>

                            <div class="dashboard-action">
                                <a
                                    href="resume.php"
                                    class="btn btn-outline-primary w-100"
                                >
                                    Improve Resume Content
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Profile strength -->
                <div class="col-md-6">
                    <div class="card dashboard-card border-0 shadow-sm">
                        <div class="card-body p-4">

                            <h5 class="fw-semibold mb-2">
                                Profile Strength
                            </h5>

                            <p class="text-muted small">
                                Identify sections that still require more information.
                            </p>

                            <div class="chart-container">
                                <canvas id="profileRadar"></canvas>
                            </div>

                            <div class="dashboard-action">
                                <a
                                    href="profile.php"
                                    class="btn btn-outline-primary w-100"
                                >
                                    Strengthen My Profile
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Application overview -->
                <div class="col-12">
                    <div class="card dashboard-card border-0 shadow-sm">
                        <div class="card-body p-4">

                            <h5 class="fw-semibold mb-2">
                                Application Overview
                            </h5>

                            <p class="text-muted small">
                                Track your current job application activity.
                            </p>

                            <?php if ($totalApplications === 0): ?>
                                <div class="empty-message mb-3">
                                    No application data is available yet.
                                    Start by browsing and applying for a job.
                                </div>
                            <?php endif; ?>

                            <div class="chart-container">
                                <canvas id="applicationChart"></canvas>
                            </div>

                            <div class="dashboard-action">
                                <?php if ($totalApplications === 0): ?>
                                    <a
                                        href="jobs.php"
                                        class="btn btn-primary"
                                    >
                                        Browse Jobs
                                    </a>
                                <?php else: ?>
                                    <a
                                        href="applications.php"
                                        class="btn btn-outline-primary"
                                    >
                                        View Application History
                                    </a>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </section>
    </div>
</main>

<?php include 'include/footer.php'; ?>

<!-- Required for Bootstrap hamburger menu -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const resumeCompletion = <?php echo (int) $resumeCompletion; ?>;
    const incompletePercentage = 100 - resumeCompletion;

    const educationCount = <?php echo (int) $educationCount; ?>;
    const skillsCount = <?php echo (int) $skillsCount; ?>;
    const experienceCount = <?php echo (int) $experienceCount; ?>;
    const languageCount = <?php echo (int) $languageCount; ?>;
    const totalApplications = <?php echo (int) $totalApplications; ?>;

    Chart.defaults.font.family = "Poppins";
    Chart.defaults.responsive = true;
    Chart.defaults.maintainAspectRatio = false;

    /* Profile completion */
    new Chart(document.getElementById("completionChart"), {
        type: "doughnut",
        data: {
            labels: ["Completed", "Incomplete"],
            datasets: [{
                data: [
                    resumeCompletion,
                    incompletePercentage
                ],
                backgroundColor: [
                    "#0d6efd",
                    "#e9ecef"
                ],
                borderWidth: 0
            }]
        },
        options: {
            cutout: "65%",
            plugins: {
                legend: {
                    position: "top"
                }
            }
        }
    });

    /* Resume content */
    new Chart(document.getElementById("contentChart"), {
        type: "bar",
        data: {
            labels: [
                "Education",
                "Skills",
                "Experience",
                "Language"
            ],
            datasets: [{
                label: "Number of Entries",
                data: [
                    educationCount,
                    skillsCount,
                    experienceCount,
                    languageCount
                ],
                backgroundColor: "#0d6efd",
                borderRadius: 7
            }]
        },
        options: {
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

    /* Skills overview */
    new Chart(document.getElementById("skillChart"), {
        type: "polarArea",
        data: {
            labels: [
                "Skills",
                "Experience",
                "Education",
                "About Me"
            ],
            datasets: [{
                data: [
                    skillsCount,
                    experienceCount,
                    educationCount,
                    <?php echo !empty(trim($aboutMe)) ? 1 : 0; ?>
                ],
                backgroundColor: [
                    "rgba(13, 110, 253, 0.65)",
                    "rgba(111, 66, 193, 0.65)",
                    "rgba(25, 135, 84, 0.65)",
                    "rgba(255, 193, 7, 0.65)"
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: "top"
                }
            }
        }
    });

    /* Profile radar */
    new Chart(document.getElementById("profileRadar"), {
        type: "radar",
        data: {
            labels: [
                "Education",
                "Experience",
                "Skills",
                "Language",
                "References"
            ],
            datasets: [{
                label: "Profile Strength",
                data: [
                    <?php echo !empty(trim($education)) ? 80 : 10; ?>,
                    <?php echo !empty(trim($experience)) ? 80 : 10; ?>,
                    <?php echo !empty(trim($skills)) ? 80 : 10; ?>,
                    <?php echo !empty(trim($language)) ? 80 : 10; ?>,
                    <?php echo !empty(trim($references)) ? 80 : 10; ?>
                ],
                backgroundColor: "rgba(13, 110, 253, 0.2)",
                borderColor: "#0d6efd",
                pointBackgroundColor: "#0d6efd",
                pointBorderColor: "#ffffff",
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                r: {
                    beginAtZero: true,
                    suggestedMax: 100
                }
            }
        }
    });

    /* Application overview */
    new Chart(document.getElementById("applicationChart"), {
        type: "line",
        data: {
            labels: [
                "Applied",
                "Shortlisted",
                "Interview",
                "Rejected"
            ],
            datasets: [{
                label: "Applications",
                data: [
                    totalApplications,
                    0,
                    0,
                    0
                ],
                borderColor: "#0d6efd",
                backgroundColor: "rgba(13, 110, 253, 0.12)",
                fill: true,
                tension: 0.35,
                pointRadius: 5,
                pointHoverRadius: 7
            }]
        },
        options: {
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

});
</script>

</body>
</html>
