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

$fields = [$fullname, $email, $phone, $education, $skills, $experience, $aboutMe, $language, $references];
$completed = 0;

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

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-light">

<?php include 'include/navbar.php'; ?>

<div class="container py-5">
  <div class="row g-4">

    <div class="col-lg-3">
      <?php include 'include/sidebar.php'; ?>
    </div>

    <div class="col-lg-9">

      <h2 class="fw-bold">Welcome back, <?php echo $username; ?> 👋</h2>
      <p class="text-muted">Your career profile dashboard.</p>

      <div class="row g-4 mb-4">
        <div class="col-md-6">
          <div class="card border-0 shadow-sm p-4">
            <h6 class="text-muted">Resume Completion</h6>
            <h2 class="fw-bold"><?php echo $resumeCompletion; ?>%</h2>
            <div class="progress">
              <div class="progress-bar" style="width: <?php echo $resumeCompletion; ?>%"></div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card border-0 shadow-sm p-4">
            <h6 class="text-muted">Applications Submitted</h6>
            <h2 class="fw-bold"><?php echo $totalApplications; ?></h2>
            <p class="mb-0 text-muted">Based on jobs you applied.</p>
          </div>
        </div>
      </div>

      <div class="row g-4">

        <div class="col-md-6">
          <div class="card border-0 shadow-sm p-4">
            <h5>Profile Completion</h5>
            <canvas id="completionChart"></canvas>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card border-0 shadow-sm p-4">
            <h5>Resume Content</h5>
            <canvas id="contentChart"></canvas>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card border-0 shadow-sm p-4">
            <h5>Skills Overview</h5>
            <canvas id="skillChart"></canvas>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card border-0 shadow-sm p-4">
            <h5>Profile Strength</h5>
            <canvas id="profileRadar"></canvas>
          </div>
        </div>

        <div class="col-12">
          <div class="card border-0 shadow-sm p-4">
            <h5>Application Overview</h5>
            <canvas id="applicationChart"></canvas>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

<?php include 'include/footer.php'; ?>

<script>
document.addEventListener("DOMContentLoaded", function () {

  new Chart(document.getElementById('completionChart'), {
    type: 'doughnut',
    data: {
      labels: ['Completed', 'Incomplete'],
      datasets: [{
        data: [<?php echo $resumeCompletion; ?>, <?php echo 100 - $resumeCompletion; ?>],
        backgroundColor: ['#0d6efd', '#e9ecef']
      }]
    }
  });

  new Chart(document.getElementById('contentChart'), {
    type: 'bar',
    data: {
      labels: ['Education', 'Skills', 'Experience', 'Language'],
      datasets: [{
        label: 'Entries',
        data: [
          <?php echo $educationCount; ?>,
          <?php echo $skillsCount; ?>,
          <?php echo $experienceCount; ?>,
          <?php echo $languageCount; ?>
        ],
        backgroundColor: '#0d6efd'
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
        ],
        backgroundColor: 'rgba(13,110,253,0.2)',
        borderColor: '#0d6efd'
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
        borderColor: '#0d6efd',
        tension: 0.4
      }]
    }
  });

});
</script>

</body>
</html>