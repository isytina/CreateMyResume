<?php

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = trim($_POST["fullname"]);
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirmPassword = trim($_POST["confirm_password"]);

    if (
        empty($fullname) ||
        empty($username) ||
        empty($email) ||
        empty($password) ||
        empty($confirmPassword)
    ) {

        $error = "Please fill in all fields.";

    }

    elseif ($password != $confirmPassword) {

        $error = "Passwords do not match.";

    }

    else {

        $success = "Registration successful! You can now login.";

    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

  <title>Register - CreateMyResume</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet"
        href="assets/css/style.css">

</head>

<body class="bg-light">

<!-- PUBLIC NAVBAR -->
<?php include 'include/public_navbar.php'; ?>

<div class="container py-5">

  <div class="row justify-content-center">

    <div class="col-lg-6">

      <div class="card border-0 shadow-sm rounded-4 p-5">

        <!-- Heading -->
        <div class="text-center mb-4">

          <h2 class="fw-bold">
            Create Account
          </h2>

          <p class="text-muted">
            Register your CreateMyResume account
          </p>

        </div>

        <!-- Error -->
        <?php if (!empty($error)) { ?>

          <div class="alert alert-danger">

            <?php echo $error; ?>

          </div>

        <?php } ?>

        <!-- Success -->
        <?php if (!empty($success)) { ?>

          <div class="alert alert-success">

            <?php echo $success; ?>

          </div>

        <?php } ?>

        <!-- FORM -->
        <form method="POST"
              action="register.php">

          <!-- Full Name -->
          <div class="mb-3">

            <label class="form-label">
              Full Name
            </label>

            <input type="text"
                   name="fullname"
                   class="form-control"
                   placeholder="Enter full name">

          </div>

          <!-- Username -->
          <div class="mb-3">

            <label class="form-label">
              Username
            </label>

            <input type="text"
                   name="username"
                   class="form-control"
                   placeholder="Enter username">

          </div>

          <!-- Email -->
          <div class="mb-3">

            <label class="form-label">
              Email
            </label>

            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="Enter email">

          </div>

          <!-- Password -->
          <div class="mb-3">

            <label class="form-label">
              Password
            </label>

            <input type="password"
                   name="password"
                   class="form-control"
                   placeholder="Enter password">

          </div>

          <!-- Confirm Password -->
          <div class="mb-4">

            <label class="form-label">
              Confirm Password
            </label>

            <input type="password"
                   name="confirm_password"
                   class="form-control"
                   placeholder="Confirm password">

          </div>

          <!-- Submit -->
          <button type="submit"
                  class="btn btn-primary w-100 rounded-pill py-2">

            Register Account

          </button>

        </form>

        <!-- Login -->
        <div class="text-center mt-4">

          <p class="mb-0">

            Already have an account?

            <a href="login.php">
              Login here
            </a>

          </p>

        </div>

      </div>

    </div>

  </div>

</div>

<!-- FOOTER -->
<?php include 'include/footer.php'; ?>

</body>
</html>