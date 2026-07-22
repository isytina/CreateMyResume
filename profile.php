<?php include 'include/session.php'; ?>

<?php
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_SESSION["fullname"] = trim($_POST["fullname"]);
    $_SESSION["job_title"] = trim($_POST["job_title"]);
    $_SESSION["email"] = trim($_POST["email"]);
    $_SESSION["phone"] = trim($_POST["phone"]);
    $_SESSION["website"] = trim($_POST["website"]);
    $_SESSION["address"] = trim($_POST["address"]);
    $_SESSION["about_me"] = trim($_POST["about_me"]);
    $_SESSION["education"] = trim($_POST["education"]);
    $_SESSION["experience"] = trim($_POST["experience"]);
    $_SESSION["skills"] = trim($_POST["skills"]);
    $_SESSION["language"] = trim($_POST["language"]);
    $_SESSION["references"] = trim($_POST["references"]);

    if (isset($_FILES["profile_image"]) && $_FILES["profile_image"]["error"] == 0) {
        $imageName = time() . "_" . $_FILES["profile_image"]["name"];
        $tempName = $_FILES["profile_image"]["tmp_name"];

        move_uploaded_file($tempName, "assets/images/" . $imageName);

        $_SESSION["profile_image"] = $imageName;
    }

    $success = "Profile saved successfully. You can now preview your resume.";
}

$fullname = $_SESSION["fullname"] ?? "";
$jobTitle = $_SESSION["job_title"] ?? "";
$email = $_SESSION["email"] ?? "";
$phone = $_SESSION["phone"] ?? "";
$website = $_SESSION["website"] ?? "";
$address = $_SESSION["address"] ?? "";
$aboutMe = $_SESSION["about_me"] ?? "";
$education = $_SESSION["education"] ?? "";
$experience = $_SESSION["experience"] ?? "";
$skills = $_SESSION["skills"] ?? "";
$language = $_SESSION["language"] ?? "";
$references = $_SESSION["references"] ?? "";
$profileImage = $_SESSION["profile_image"] ?? "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Profile - CreateMyResume</title>

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

    <div class="col-lg-3 d-none d-lg-block">
      <?php include 'include/sidebar.php'; ?>
    </div>

    <div class="col-lg-9">

      <h2 class="fw-bold">My Resume Profile</h2>
      <p class="text-muted">Enter your details to generate a professional resume.</p>

      <?php if (!empty($success)) { ?>
        <div class="alert alert-success">
          <?php echo $success; ?>
        </div>
      <?php } ?>

      <div class="card border-0 shadow-sm rounded-4 p-4">

        <form method="POST" action="profile.php" enctype="multipart/form-data">

          <div class="mb-4 text-center">
            <?php if (!empty($profileImage)) { ?>
              <img src="assets/images/<?php echo $profileImage; ?>"
                   class="rounded-circle shadow-sm mb-3"
                   width="130"
                   height="130"
                   style="object-fit: cover;">
            <?php } ?>

            <label class="form-label d-block">Profile Picture</label>
            <input type="file" name="profile_image" class="form-control">
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Full Name</label>
              <input type="text" name="fullname" class="form-control" value="<?php echo $fullname; ?>">
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Job Title</label>
              <input type="text" name="job_title" class="form-control" value="<?php echo $jobTitle; ?>" placeholder="Example: Marketing Manager">
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Phone Number</label>
              <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Website / Portfolio</label>
              <input type="text" name="website" class="form-control" value="<?php echo $website; ?>">
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Address</label>
              <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">About Me</label>
            <textarea name="about_me" class="form-control" rows="4"><?php echo $aboutMe; ?></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Education</label>
            <textarea name="education" class="form-control" rows="5" placeholder="Example:
Bachelor of Business Management
Wardiere University
2016 - 2020"><?php echo $education; ?></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Experience</label>
            <textarea name="experience" class="form-control" rows="6" placeholder="Example:
Marketing Manager
Arrowai Industries
2019 - 2023
Managed marketing campaign and customer engagement."><?php echo $experience; ?></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Skills</label>
            <textarea name="skills" class="form-control" rows="4" placeholder="Example:
Management Skills
Creativity
Digital Marketing"><?php echo $skills; ?></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Language</label>
            <textarea name="language" class="form-control" rows="3" placeholder="Example:
English
Malay"><?php echo $language; ?></textarea>
          </div>

          <div class="mb-4">
            <label class="form-label">References</label>
            <textarea name="references" class="form-control" rows="4" placeholder="Example:
Harumi Kobayashi
Wardiere Inc. / CEO
Phone: 123-456-7890
Email: hello@example.com"><?php echo $references; ?></textarea>
          </div>

          <button type="submit" class="btn btn-primary rounded-pill px-4">
            Save Profile
          </button>

          <a href="resume.php" class="btn btn-outline-primary rounded-pill px-4 ms-2">
            View Resume
          </a>

        </form>

      </div>

    </div>

  </div>
</div>

<?php include 'include/footer.php'; ?>

</body>
</html>
