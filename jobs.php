<?php include 'include/session.php'; ?>

<?php

$jobs = [

    [
        "id" => 1,
        "title" => "Admin Assistant",
        "company" => "Bright Career Sdn Bhd",
        "location" => "Kuala Lumpur",
        "skill" => "Microsoft Office, Communication"
    ],

    [
        "id" => 2,
        "title" => "Junior Web Assistant",
        "company" => "Digital Talent Hub",
        "location" => "Selangor",
        "skill" => "HTML, CSS, PHP"
    ],

    [
        "id" => 3,
        "title" => "Data Entry Clerk",
        "company" => "Mega Data Services",
        "location" => "Putrajaya",
        "skill" => "Typing, Data Entry, Excel"
    ],

    [
        "id" => 4,
        "title" => "Customer Service Executive",
        "company" => "CareerLink Solutions",
        "location" => "Penang",
        "skill" => "Communication, Problem Solving"
    ]

];

if (isset($_GET["apply"])) {

    $jobId = $_GET["apply"];

    foreach ($jobs as $job) {

        if ($job["id"] == $jobId) {

            $_SESSION["applications"][] = $job;

            break;
        }
    }

    header("Location: applications.php");

    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">

  <title>Jobs - CreateMyResume</title>

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

</head>

<body class="bg-light">

<?php include 'include/navbar.php'; ?>

<div class="container py-5">

<div class="mb-4">

  <input type="text"
         id="jobSearch"
         class="form-control"
         placeholder="Search jobs...">

</div>
  <div class="row g-4">

    <!-- Sidebar -->
    <div class="col-lg-3">

      <?php include 'include/sidebar.php'; ?>

    </div>

    <!-- Main Content -->
    <div class="col-lg-9">

      <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

          <h2 class="fw-bold">
            Recommended Jobs
          </h2>

          <p class="text-muted">
            Jobs that may match your profile and skills.
          </p>

        </div>

        <span class="badge bg-primary-subtle text-primary px-3 py-2">

          <?php echo count($jobs); ?> Jobs Available

        </span>

      </div>

      <div class="row g-4">

        <?php foreach ($jobs as $job) { ?>

          <div class="col-md-6 job-card">

            <div class="card border-0 shadow-sm rounded-4 p-4 h-100">

              <span class="badge bg-success-subtle text-success mb-3">
                Open Position
              </span>

              <h5 class="fw-bold">

                <?php echo $job["title"]; ?>

              </h5>

              <p class="text-muted mb-2">

                <?php echo $job["company"]; ?>

              </p>

              <p class="mb-2">

                <strong>Location:</strong>

                <?php echo $job["location"]; ?>

              </p>

              <p class="mb-4">

                <strong>Required Skills:</strong><br>

                <?php echo $job["skill"]; ?>

              </p>

              <a href="jobs.php?apply=<?php echo $job["id"]; ?>"
                 class="btn btn-primary rounded-pill">

                 Apply Job

              </a>

            </div>

          </div>

        <?php } ?>

      </div>

    </div>

  </div>

</div>

<?php include 'include/footer.php'; ?>
<script src="assets/js/script.js"></script>
</body>
</html>