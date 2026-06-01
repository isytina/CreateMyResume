<?php include 'include/session.php'; ?>

<?php
$username = $_SESSION["username"];

$fullname = $_SESSION["fullname"] ?? "";
$email = $_SESSION["email"] ?? "";
$phone = $_SESSION["phone"] ?? "";
$education = $_SESSION["education"] ?? "";
$skills = $_SESSION["skills"] ?? "";
$experience = $_SESSION["experience"] ?? "";
$aboutMe = $_SESSION["about_me"] ?? "";
$language = $_SESSION["language"] ?? "";
$references = $_SESSION["references"] ?? "";

$completed = 0;
$fields = [$fullname, $email, $phone, $education, $skills, $experience, $aboutMe, $language, $references];

foreach ($fields as $field) {
    if (!empty($field)) {
        $completed++;
    }
}

$resumeCompletion = round(($completed / count($fields)) * 100);

$skillsCount = !empty($skills) ? count(array_filter(explode("\n", $skills))) : 0;
$educationCount = !empty($education) ? count(array_filter(explode("\n", $education))) : 0;
$experienceCount = !empty($experience) ? count(array_filter(explode("\n", $experience))) : 0;
$languageCount = !empty($language) ? count(array_filter(explode("\n", $language))) : 0;

$applications = $_SESSION["applications"] ?? [];
$totalApplications = count($applications);
$recommendedJobs = 5;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - CreateMyResume</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

<link rel="preconnect"
      href="https://fonts.googleapis.com">

<link rel="preconnect"
      href="https://fonts.gstatic.com"
      crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet">

<link rel="stylesheet"
      href="assets/css/style.css?v=2">
  <script src="https://cdn.jsdelivr.net/npm/chart.js">


  </script>
</head>

<body class="bg-light">

<?php include 'include/navbar.php'; ?>

<div class="container py-5">
  <div class="row g-4">

    <div class="col-lg-3">
      <?php include 'include/sidebar.php'; ?>
    </div>

    <div class="col-lg-9">

      <div class="mb-4">
        <h2 class="fw-bold">Welcome back, <?php echo $username; ?> 👋</h2>
        <p class="text-muted">Your personal career dashboard overview.</p>
      </div>

      <!-- 2 Main Cards -->
      <div class="row g-4 mb-4">

        <div class="col-md-6">
          <div class="card border-0 shadow-sm rounded-4 p-4">
            <span class="badge bg-primary-subtle text-primary mb-2">Resume Status</span>
            <h3 class="fw-bold"><?php echo $resumeCompletion; ?>%</h3>
            <p class="text-muted mb-2">Profile completion based on your resume details.</p>
            <div class="progress">
              <div class="progress-bar" style="width: <?php echo $resumeCompletion; ?>%"></div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card border-0 shadow-sm rounded-4 p-4">
            <span class="badge bg-success-subtle text-success mb-2">Career Activity</span>
            <h3 class="fw-bold"><?php echo $totalApplications; ?> Applications</h3>
            <p class="text-muted mb-0">
              <?php echo $recommendedJobs; ?> recommended jobs available.
            </p>
          </div>
        </div>

      </div>

      <!-- Charts -->
      <div class="row g-4">

        <div class="col-lg-6">
          <div class="card border-0 shadow-sm rounded-4 p-4">
            <h5 class="fw-bold mb-3">Profile Completion</h5>
            <canvas id="completionChart"></canvas>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card border-0 shadow-sm rounded-4 p-4">
            <h5 class="fw-bold mb-3">Resume Content Analysis</h5>
            <canvas id="contentChart"></canvas>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card border-0 shadow-sm rounded-4 p-4">
            <h5 class="fw-bold mb-3">Skills & Career Readiness</h5>
            <canvas id="skillChart"></canvas>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card border-0 shadow-sm rounded-4 p-4">
            <h5 class="fw-bold mb-3">Education, Experience & Language</h5>
            <canvas id="profileRadar"></canvas>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="card border-0 shadow-sm rounded-4 p-4">
            <h5 class="fw-bold mb-3">Application Overview</h5>
            <canvas id="applicationChart"></canvas>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

<?php include 'include/footer.php'; ?>

<script>
new Chart(document.getElementById('completionChart'), {
  type: 'doughnut',
  data: {
    labels: ['Completed', 'Incomplete'],
    datasets: [{
      data: [<?php echo $resumeCompletion; ?>, <?php echo 100 - $resumeCompletion; ?>]
    }]
  }
});

new Chart(document.getElementById('contentChart'), {
  type: 'bar',
  data: {
    labels: ['Education', 'Skills', 'Experience', 'Language'],
    datasets: [{
      label: 'Number of Entries',
      data: [
        <?php echo $educationCount; ?>,
        <?php echo $skillsCount; ?>,
        <?php echo $experienceCount; ?>,
        <?php echo $languageCount; ?>
      ]
    }]
  }
});

new Chart(document.getElementById('skillChart'), {
  type: 'polarArea',
  data: {
    labels: ['Skills', 'Experience', 'Education', 'About Me'],
    datasets: [{
      data: [
        <?php echo $skillsCount; ?>,
        <?php echo $experienceCount; ?>,
        <?php echo $educationCount; ?>,
        <?php echo !empty($aboutMe) ? 1 : 0; ?>
      ]
    }]
  }
});

new Chart(document.getElementById('profileRadar'), {
  type: 'radar',
  data: {
    labels: ['Education', 'Experience', 'Skills', 'Language', 'References'],
    datasets: [{
      label: 'Profile Strength',
      data: [
        <?php echo !empty($education) ? 80 : 10; ?>,
        <?php echo !empty($experience) ? 80 : 10; ?>,
        <?php echo !empty($skills) ? 80 : 10; ?>,
        <?php echo !empty($language) ? 80 : 10; ?>,
        <?php echo !empty($references) ? 80 : 10; ?>
      ]
    }]
  }
});

new Chart(document.getElementById('applicationChart'), {
  type: 'line',
  data: {
    labels: ['Applied', 'Shortlisted', 'Interview', 'Rejected'],
    datasets: [{
      label: 'Applications',
      data: [<?php echo $totalApplications; ?>, 1, 1, 0],
      tension: 0.4
    }]
  }
});
</script>

</body>
</html>