<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3">
  <div class="container">

    <a class="navbar-brand fw-bold text-primary" href="index.php">
      CreateMyResume
    </a>

    <button class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNavbar">

      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">

      <ul class="navbar-nav ms-auto align-items-center">

        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">Dashboard</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="profile.php">Profile</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="resume.php">Resume</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="jobs.php">Jobs</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="applications.php">Applications</a>
        </li>

        <li class="nav-item ms-lg-3">
          <span class="nav-link text-muted">
            Hi, <?php echo $_SESSION["username"]; ?>
          </span>
        </li>

        <li class="nav-item">
          <a href="logout.php"
             class="btn btn-outline-danger rounded-pill px-4">
             Logout
          </a>
        </li>

      </ul>

    </div>
  </div>
</nav>