<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Cancellation</title>
  <!-- Google Fonts - Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    /* Custom styles */
    body {
      font-family: 'Poppins', sans-serif; /* Applying Google Font */
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }
    .illustration {
      position: absolute;
      left: 0;
      top: 0;
      width: 50%;
      height: 100%;
      background: url('https://static.vecteezy.com/system/resources/previews/024/667/420/non_2x/payment-error-cashless-nfc-payment-failed-online-transaction-canceled-try-again-web-site-with-cross-checkmark-modern-flat-cartoon-style-illustration-on-white-background-vector.jpg') center/cover no-repeat; /* Placeholder illustration URL */
    }
    .container {
      max-width: 50%;
      background-color: #fff;
      border-radius: 8px;
      padding: 30px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      z-index: 1;
    }
    .fa-times-circle {
      color: #dc3545;
    }
    .back-to-home {
      text-decoration: none;
      color: #007bff;
    }
    .brand-name {
      font-size: 24px;
      font-weight: 600;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="illustration"></div> <!-- Illustration -->
  <div class="container text-center">
    <div class="col-12 d-flex justify-content-center">
          <img src="assets/img/logo.png" class="img-fluid w-50 " alt="">
    </div>

    <div class="brand-name text-center">Ceynap</div> <!-- Adding brand name -->
    <h2>Payment Cancellation</h2>
    <p>Your payment has been cancelled.</p>
    <div class="text-center">
      <i class="fas fa-times-circle fa-5x"></i>
    </div>
    <div class="text-center mt-3">
      <a href="index.php" class="back-to-home">Back to Home</a>
    </div>
  </div>
  
  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
