<?php include 'include/session.php'; ?>

<?php

$applications = $_SESSION["applications"] ?? [];

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Applications - CreateMyResume</title>

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

  <div class="row g-4">

    <!-- Sidebar -->
    <div class="col-lg-3 d-none d-lg-block">

      <?php include 'include/sidebar.php'; ?>

    </div>

    <!-- Main Content -->
    <div class="col-lg-9">

      <h2 class="fw-bold">
        My Applications
      </h2>

      <p class="text-muted">
        List of jobs you have applied for.
      </p>

      <?php if (empty($applications)) { ?>

        <div class="alert alert-info">

          No job applications submitted yet.

        </div>

      <?php } ?>

      <div class="row g-4">

        <?php foreach ($applications as $job) { ?>

          <div class="col-md-6">

            <div class="card border-0 shadow-sm rounded-4 p-4 h-100">

              <span class="badge bg-success-subtle text-success mb-3">
                Applied
              </span>

              <h5 class="fw-bold">

                <?php echo $job["title"]; ?>

              </h5>

              <p class="text-muted mb-1">

                <?php echo $job["company"]; ?>

              </p>

              <p class="mb-1">

                <strong>Location:</strong>

                <?php echo $job["location"]; ?>

              </p>

              <p>

                <strong>Required Skills:</strong>

                <?php echo $job["skill"]; ?>

              </p>

            </div>

          </div>

        <?php } ?>

      </div>

    </div>

  </div>

</div>

<?php include 'include/footer.php'; ?>

</body>
</html>
