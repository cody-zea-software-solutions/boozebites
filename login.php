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
    <!-- Nice Select -->
    <link rel="stylesheet" href="assets/css/nice-select.min.css">
    <!-- Animate -->
    <link rel="stylesheet" href="assets/css/aos.css">
    <!-- Slick -->
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="assets/css/style.css">
  <style>
    .hidden { display: none; }
  </style>
</head>
<body>
<?php  
require "connection.php";
require_once("header.php");
headerContent(0); 
?>
  <div class="container-fluid m-0 p-0">
    <div class="row">
      <!-- Left Column (Background Image) -->
      <div
        class="col-6 d-none d-lg-block vh-100"
        style="
          background-image: url('./assets/images/background/cover.png');
          background-size: cover;
          background-position: center;
          background-repeat: no-repeat;
        "
      ></div>

      <!-- Right Column (Forms) -->
      <div class="col-lg-6 col-12">
        <!-- Create Account Form -->
        <div id="signup-form" class="form-container mt-95">
          <form class="min-vh-80 m-10 w-100 rounded-1">
            <div class="d-flex flex-column gap-3 mx-auto p-4 min-w-540 sm:min-w-96 border rounded rounded-3 text-muted text-sm shadow-lg">
              <p class="h2 fw-semibold text-center">Create Account</p>
              <p class="lead text-body text-center">
                Elevate Your Dining & Experience with Booze Bites
              </p>
              <div class="row">
                <div class="col-12 col-lg-6">
                <p class="text-body">First Name</p>
                <input id="fname" class="form-control mt-1" type="text" placeholder="Full Name" required />
              </div>
              <div class="col-12 col-lg-6">
                <p class="text-body">Last Name</p>
                <input id="lname" class="form-control mt-1" type="text" placeholder="Full Name" required />
              </div>
              <div class="col-12 col-lg-12">
                <p class="text-body">Email</p>
                <input id="email" class="form-control mt-1" type="email" placeholder="Enter Email Address" required />
              </div>
              <div class="col-12 col-lg-12">
                <p class="text-body">Password</p>
                <input id="password" class="form-control mt-1" type="password" placeholder="Enter Password" required />
              </div>
              </div>
            
              <p class="theme-btn style-two" onclick="signup();">Create Account</p>
              <p class="text-center text-body">
                Already have an account? 
                <span onclick="toggleForms()" class="font-primary cursor-pointer">Login here</span>
              </p>
            </div>
          </form>
        </div>

        <!-- Login Form -->
        <div id="login-form" class="form-container hidden mt-100">
          <form class="min-vh-80 m-10 w-100 rounded-1">
            <div class="d-flex flex-column gap-3 mx-auto p-4 min-w-540 sm:min-w-96 border rounded rounded-3 text-muted text-sm shadow-lg">
              <p class="h2 fw-semibold text-center">Login</p>
              <p class="lead text-body text-center">
                Welcome back to Booze Bites
              </p>
              <div class="w-100">
                <p class="text-body">Email</p>
                <input class="form-control mt-1" id="email1" type="email" placeholder="Enter Email Address" required />
              </div>
              <div class="w-100">
                <p class="text-body">Password</p>
                <input class="form-control mt-1" id="password1" type="password" placeholder="Enter Password" required />
                <a class="link-primary fw-bold" onclick="forgot();">Forgot password ?</a>
              </div>
              <p class="theme-btn style-two" onclick="login();">login</p>
              <p class="text-center text-body">
                Don't have an account? 
                <span onclick="toggleForms()" class="font-primary cursor-pointer">Create one</span>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Forgot Password Modal -->
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form for Forgot Password -->
        <div class="mb-3">
          <label for="verificationCode" class="form-label">Verification Code</label>
          <input type="text" class="form-control" id="verificationCode" placeholder="Enter your verification code" required>
        </div>
        <div class="mb-3">
          <label for="newPassword" class="form-label">New Password</label>
          <input type="password" class="form-control" id="newPassword" placeholder="Enter your new password" required>
        </div>
        <div class="mb-3">
          <label for="confirmPassword" class="form-label">Re-enter Password</label>
          <input type="password" class="form-control" id="confirmPassword" placeholder="Re-enter your new password" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="confirmPasswordDetails()">Confirm Details</button>
      </div>
    </div>
  </div>
</div>



  <?php  
  require "footer.php"
  ?>

  <script>
    // JavaScript to toggle between sign-up and login forms
    function toggleForms() {
      var signupForm = document.getElementById("signup-form");
      var loginForm = document.getElementById("login-form");

      // Toggle the visibility of the forms
      signupForm.classList.toggle("hidden");
      loginForm.classList.toggle("hidden");
    }
  </script>
      
    <!-- Jquery -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Appear Js -->
    <script src="assets/js/appear.min.js"></script>
    <!-- Slick -->
    <script src="assets/js/slick.min.js"></script>
    <!-- Magnific Popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Nice Select -->
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <!-- Image Loader -->
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- Circle Progress -->
    <script src="assets/js/circle-progress.min.js"></script>
    <!-- Skillbar -->
    <script src="assets/js/skill.bars.jquery.min.js"></script>
    <!-- Isotope -->
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!--  AOS Animation -->
    <script src="assets/js/aos.js"></script>
    <!-- Custom script -->
    <script src="assets/js/script.js"></script>
    <!-- -->
    <script src="sahan.js"></script>
</body>
</html>
