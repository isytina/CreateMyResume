<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (empty($username)) {
        $error = "Username is required";
    } elseif (empty($password)) {
        $error = "Password is required";
    } elseif ($username == "demo" && $password == "12345") {
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - CreateMyResume</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center min-vh-100">
  <div class="card shadow border-0 rounded-4 p-4" style="width: 400px;">

    <h3 class="text-center fw-bold mb-2">Login</h3>
    <p class="text-center text-muted mb-4">Access your CreateMyResume account</p>

    <?php if (!empty($error)) { ?>
      <div class="alert alert-danger">
        <?php echo $error; ?>
      </div>
    <?php } ?>

    <form method="POST" action="login.php">

      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Enter username">
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter password">
      </div>

      <button type="submit" class="btn btn-primary w-100 rounded-pill">
        Login
      </button>

    </form>

    <p class="text-center mt-3 mb-0">
      Don't have an account?
      <a href="register.php">Create Account</a>
    </p>

  </div>
</div>

</body>
</html>