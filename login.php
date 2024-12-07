<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css"> <!-- Add your CSS file -->
  <title>Booze Bites</title>
      <!-- Favicon Icon -->
      <link rel="shortcut icon" href="assets/images/logos/favicon.png" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- Flaticon -->
    <link rel="stylesheet" href="assets/css/flaticon.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/fontawesome-5.14.0.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <!-- jQuery UI -->
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="assets/css/nice-select.min.css">
    <!-- Animate -->
    <link rel="stylesheet" href="assets/css/aos.css">
    <!-- Slick -->
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <div class="container-fluid m-0 p-0">
    <div class="row">
      <!-- Left Column -->
      <div
        class="col-6 d-none d-lg-block vh-100"
        style="
          background-image: url('/assets/images/background/cover.png');
          background-size: cover;
          background-position: center;
          background-repeat: no-repeat;
        "
      ></div>

      <!-- Right Column -->
      <div class="col-lg-6 col-12">
        <form class="min-vh-80 m-10 w-100 rounded-1">
          <div class="d-flex flex-column gap-3 mx-auto p-4 min-w-540 sm:min-w-96 border rounded rounded-3 text-muted text-sm shadow-lg">
            <!-- Heading -->
            <p class="h2 fw-semibold text-center">Create Account</p>
            <p class="lead text-body text-center">
              Elevate Your Dining & Experience with Booze Bites
            </p>

            <!-- Full Name -->
            <div class="w-100">
              <p class="text-body">Full Name</p>
              <input
                class="form-control mt-1"
                type="text"
                placeholder="Full Name"
                required
              />
            </div>

            <!-- Email -->
            <div class="w-100">
              <p class="text-body">Email</p>
              <input
                class="form-control mt-1"
                type="email"
                placeholder="Enter Email Address"
                required
              />
            </div>

            <!-- Password -->
            <div class="w-100">
              <p class="text-body">Password</p>
              <input
                class="form-control mt-1"
                type="password"
                placeholder="Enter Password"
                required
              />
            </div>

            <!-- Submit Button -->
            <button class="theme-btn style-two" type="submit">Create Account</button>

            <!-- Toggle to Login -->
            <p class="text-center text-body">
              Already have an account? 
              <a href="login.html" class="font-primary cursor-pointer">Login here</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
