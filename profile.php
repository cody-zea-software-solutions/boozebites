<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booze Bites - Profile</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="assets/images/logos/favicon.png" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

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
        .theme-btn.style-two {
            background-color: #ff4500;
            color: white;
        }

        .theme-btn.style-two:hover {
            background-color: #e03e00;
        }

        .p-25 {
            padding: 25px;
        }

        .shadow-lg {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .lead {
            font-size: 1.2rem;
        }

        .hidden {
            display: none !important;
        }
    </style>
</head>

<body>
<?php  
    require "header.php";
    headerContent(0);
    ?>
    <div class="container-fluid vh-100 d-flex align-items-center">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-lg-4 bg-white shadow-lg rounded-3 p-25">
                <div class="row d-flex justify-content-center">
                    <img src="./assets/images/profile-icon.png" class="img-fluid w-50 col-12" alt="Profile Icon" />
                    <div class="d-flex justify-content-center flex-column">
                        <p class="text-body lead text-center mt-10">Your Name: John Doe</p>
                        <div class="col-12 d-flex justify-content-center">
                            <button class="theme-btn style-two col-10">Shop <i
                                    class="far fa-arrow-alt-right"></i></button>
                        </div>
                        <div class="col-12 d-flex justify-content-center mt-10">
                            <button class="theme-btn style-two col-10" onclick="toggleForms()">
                                Personal Information <i class="far fa-arrow-alt-right"></i>
                            </button>
                        </div>
                        <div class="col-12 d-flex justify-content-center mt-10">
                            <button class="theme-btn style-two col-10" onclick="toggleForms()">
                                My Orders <i class="far fa-arrow-alt-right"></i>
                            </button>
                        </div>
                        <p class="text-danger lead mt-10 text-center">
                            <i class="fas fa-sign-out"></i> Log Out
                        </p>
                    </div>
                </div>
            </div>

            <div id="personal-info" class="col-12 col-lg-8 d-flex justify-content-center mt-5 mt-lg-0">
                <div class="header bg-white shadow-lg rounded-3 p-25 col-12">
                    <p class="h2 fw-semibold text-center">Personal Information</p>
                    <p class="lead text-center">Bite Into Booze</p>
                    <div>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <p class="text-body">First Name</p>
                                <input class="form-control mt-1" type="text" placeholder="Full Name" required />
                            </div>
                            <div class="col-12 col-lg-6">
                                <p class="text-body">Last Name</p>
                                <input class="form-control mt-1" type="text" placeholder="Full Name" required />
                            </div>
                            <div class="col-12 col-lg-6">
                                <p class="text-body">Email</p>
                                <input class="form-control mt-1" type="email" placeholder="Email Address" required />
                            </div>
                            <div class="col-12 col-lg-6">
                                <p class="text-body">Mobile Number</p>
                                <input class="form-control mt-1" type="text" placeholder="Mobile Number" required />
                            </div>
                            <div class="col-12 col-lg-6">
                                <p class="text-body">Address Line 1</p>
                                <input class="form-control mt-1" type="text" placeholder="Address Line 01" required />
                            </div>
                            <div class="col-12 col-lg-6">
                                <p class="text-body">Address Line 2</p>
                                <input class="form-control mt-1" type="text" placeholder="Address Line 02" required />
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <div class="col-12 col-lg-10 mt-10">
                                    <button class="theme-btn style-two col-12">Update Your Profile <i
                                            class="far fa-arrow-alt-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="my-orders" class="col-12 col-lg-8 d-flex justify-content-center mt-5 mt-lg-0 hidden">
                <div class="header bg-white shadow-lg rounded-3 p-25 col-12">
                    <p class="h2 fw-semibold text-center">My Orders</p>
                    <div class="row">
                        <div class="col-12 col-lg-6 shadow-sm rounded-3 p-10">
                            <img src="./assets/images/profile-icon.png" class="img-fluid w-50 col-12"
                                alt="Profile Icon" />
                            <p>Black Chicken Curry</p>
                        </div>
                        <div class="col-12 col-lg-6 shadow-sm rounded-3 p-10">
                            <img src="./assets/images/profile-icon.png" class="img-fluid w-50 col-12"
                                alt="Profile Icon" />
                            <p>Black Chicken Curry</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php  
    require "footer.php"
    ?>

    <script>
        function toggleForms() {
            const pi = document.getElementById('personal-info');
            const mo = document.getElementById('my-orders');
            // Toggle the visibility of the forms
            pi.classList.toggle("hidden");
            mo.classList.toggle("hidden");
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
</body>

</html>