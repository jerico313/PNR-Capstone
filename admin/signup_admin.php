<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@600&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #174793;
      font-family: Manrope;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .navbar {
      background-color: #FFC30B;
    }
    .signup-box {
      border-top-color: #FFC30B;
      max-width: 400px;
      margin: auto;
      margin-top: 60px;
      padding: 20px;
      background-color: white;
      border-radius: 15px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
      border-top: 15px solid #FFC30B
    }
    .form-group {
      position: relative;
    }
    .form-control {
      padding-left: 40px;
    }
    .form-control i {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      left: 10px;
      color: #ccc;
    }
    .form-control:focus {
      border-color: #174793;
      box-shadow: none;
    }
    .btn-primary {
      background-color: #174793;
      border-color: #174793;
    }
    .btn-primary:hover {
      background-color: #0d315c;
      border-color: #0d315c;
    }
    .btn-submit {
      background-color: #174793;
      border-color: #174793;
      padding: 5px 15px; 
      font-size: 14px; 
      border-radius: 15px;
      max-width: 100px;
      color: white;
    }
    .btn-submit:hover {
      background-color: #174793; 
      border-color: #174793;
    }
    .custom-button {
  border-radius: 15px;
}
.verification-image {
  width: 160px;
  height: 100px;
  background-image: url("images/verification.png");
  background-size: cover;
  background-position: center;
}

.container{
  margin-top: 15px;
  margin-bottom: 15px;
}


  </style>
  
  <title>Sign Up</title>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-light fixed-top mainnav">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PNR</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup.php">Sign Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Log In</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col-md-12 mx-auto signup-box">
    <center>
    <img src="images/PNR.png" alt="PNR LOGO" width=80 height= 80>
    </center>
      <br><h2 class="text-center mb-2" style="font-size:15px;"> Passenger Registration Form </h2>
      
      <form action="process.php" method="post">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="adm_firstname" required placeholder="First Name" class="form-control">
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="adm_lastname" required placeholder="Last Name" class="form-control">
          </div>
        </div>


        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="text" name="adm_email" required placeholder="Email" class="form-control">
          </div>
        </div>


          <!-- First Password Field -->
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
          </div>
          <input type="password" class="form-control" name="password" id="password" required placeholder="Password">
          <div class="input-group-append">
            <span class="input-group-text">
              <i class="fas fa-eye" id="togglePassword"></i>
            </span>
          </div>
        </div>
      </div>

      <!-- Second Password Field -->
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
          </div>
          <input type="password" class="form-control" name="confirm_password" id="confirm_password" required placeholder="Confirm Password">
          <div class="input-group-append">
            <span class="input-group-text">
              <i class="fas fa-eye" id="toggleConfirmPassword"></i>
            </span>
          </div>
        </div>
      </div>
          
          <center>
            <button type="submit"  name="signup" class="btn btn-primary btn-block btn-submit" id="submitBtn">Submit</button>
          </center>
        </form>

        <script>
  // JavaScript code for password toggle functionality
  document.getElementById("togglePassword").addEventListener("click", function () {
    var passwordInput = document.getElementById("password");
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
    } else {
      passwordInput.type = "password";
    }
  });

  document.getElementById("toggleConfirmPassword").addEventListener("click", function () {
    var confirmPasswordInput = document.getElementById("confirm_password");
    if (confirmPasswordInput.type === "password") {
      confirmPasswordInput.type = "text";
    } else {
      confirmPasswordInput.type = "password";
    }
  });
</script>

    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</body>
</html>