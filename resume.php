<?php include 'include/session.php'; ?>

<?php
$fullname = $_SESSION["fullname"] ?? "Your Name";
$jobTitle = $_SESSION["job_title"] ?? "Job Title";
$email = $_SESSION["email"] ?? "email@example.com";
$phone = $_SESSION["phone"] ?? "012-3456789";
$website = $_SESSION["website"] ?? "www.example.com";
$address = $_SESSION["address"] ?? "Your address";
$aboutMe = $_SESSION["about_me"] ?? "Write a short professional summary about yourself.";
$education = $_SESSION["education"] ?? "Education details not provided.";
$experience = $_SESSION["experience"] ?? "Experience details not provided.";
$skills = $_SESSION["skills"] ?? "Skills not provided.";
$language = $_SESSION["language"] ?? "Language not provided.";
$references = $_SESSION["references"] ?? "References not provided.";
$profileImage = $_SESSION["profile_image"] ?? "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Resume - CreateMyResume</title>

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

  <style>
    .resume-wrapper {
      background: #ffffff;
      max-width: 900px;
      margin: auto;
      box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    .resume-header {
      background: #20232a;
      color: white;
      padding: 35px;
      padding-left: 300px;
      position: relative;
      min-height: 150px;
    }

    .resume-photo {
      position: absolute;
      left: 70px;
      top: 30px;
      width: 160px;
      height: 160px;
      border-radius: 50%;
      object-fit: cover;
      border: 10px solid white;
      background: #ddd;
    }

    .resume-name {
      letter-spacing: 8px;
      font-weight: 700;
      text-transform: uppercase;
    }

    .resume-title {
      letter-spacing: 5px;
      font-size: 20px;
    }

    .resume-body {
      display: grid;
      grid-template-columns: 32% 68%;
    }

    .resume-left {
      background: #e9e9e9;
      padding: 90px 35px 35px;
    }

    .resume-right {
      padding: 35px;
    }

    .resume-section-title {
      font-weight: 800;
      letter-spacing: 5px;
      text-transform: uppercase;
      margin-bottom: 15px;
      border-bottom: 1px solid #555;
      padding-bottom: 8px;
    }

    .resume-text {
      font-size: 14px;
      line-height: 1.7;
      white-space: pre-line;
    }

    .contact-box {
      font-size: 14px;
      line-height: 1.8;
      white-space: pre-line;
    }

    @media print {
      body * {
        visibility: hidden;
      }

      #resumeArea, #resumeArea * {
        visibility: visible;
      }

      #resumeArea {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        box-shadow: none;
      }

      .no-print {
        display: none !important;
      }
    }
  </style>
</head>

<body class="bg-light">

<?php include 'include/navbar.php'; ?>

<div class="container py-5">

  <div class="row g-4">

    <div class="col-lg-3 no-print">
      <?php include 'include/sidebar.php'; ?>
    </div>

    <div class="col-lg-9">

      <div class="d-flex justify-content-between align-items-center mb-4 no-print">
        <div>
          <h2 class="fw-bold">Resume Preview</h2>
          <p class="text-muted">Generated from your profile information.</p>
        </div>

        <button onclick="window.print()" class="btn btn-primary rounded-pill px-4">
          Export / Print PDF
        </button>
      </div>

      <div class="resume-wrapper" id="resumeArea">

        <div class="resume-header">

          <?php if (!empty($profileImage)) { ?>
            <img src="assets/images/<?php echo $profileImage; ?>" class="resume-photo">
          <?php } else { ?>
            <div class="resume-photo d-flex align-items-center justify-content-center text-dark">
              Photo
            </div>
          <?php } ?>

          <h1 class="resume-name"><?php echo $fullname; ?></h1>
          <div class="resume-title"><?php echo $jobTitle; ?></div>

        </div>

        <div class="resume-body">

          <div class="resume-left">

            <div class="mb-5">
              <h5 class="resume-section-title">About Me</h5>
              <div class="resume-text"><?php echo $aboutMe; ?></div>
            </div>

            <div class="mb-5">
              <h5 class="resume-section-title">Education</h5>
              <div class="resume-text"><?php echo $education; ?></div>
            </div>

            <div class="mb-5">
              <h5 class="resume-section-title">Skills</h5>
              <div class="resume-text"><?php echo $skills; ?></div>
            </div>

            <div class="mb-5">
              <h5 class="resume-section-title">Language</h5>
              <div class="resume-text"><?php echo $language; ?></div>
            </div>

          </div>

          <div class="resume-right">

            <div class="row mb-4 contact-box">
              <div class="col-md-6">
                📞 <?php echo $phone; ?><br>
                ✉️ <?php echo $email; ?>
              </div>

              <div class="col-md-6">
                🌐 <?php echo $website; ?><br>
                📍 <?php echo $address; ?>
              </div>
            </div>

            <div class="mb-5">
              <h5 class="resume-section-title">Experience</h5>
              <div class="resume-text"><?php echo $experience; ?></div>
            </div>

            <div class="mb-5">
              <h5 class="resume-section-title">References</h5>
              <div class="resume-text"><?php echo $references; ?></div>
            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>

<?php include 'include/footer.php'; ?>

</body>
</html>