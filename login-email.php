<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/PNR.png" type="image/x-icon" />
    <title>PNR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@600&display=swap" rel="stylesheet">
  <style>
        body {
      background-image: url("images/pnrtrain.jpg");
  background-color: #cccccc;
  background-position: center;
  background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
      background-color: #174793;
      font-family: Manrope;
    }

    body::before {
  content: "";
  position: absolute;
  top: 0;
  z-index: -1; /* Move the pseudo-element to the background */
  left: 0;
  width: 100%;
  height: 100%;  
  background: rgba(0, 0, 0, 0.5); /* Adjust alpha value for darkness */
  background-attachment: fixed; /* Ensure the dark overlay doesn't move */
}

    .navbar {
      background-color: #FFC30B;
    }
    .login-box {
      max-width: 400px;
      margin: auto;
      padding: 20px;
      background-color: white;
      border-radius: 15px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
      margin-top: 100px;
      border-top: 15px solid #FFC30B
    }
    .or-line {
      display: flex;
      align-items: center;
      text-align: center;
      margin-top: 10px;
      margin-bottom: 10px;
    }
    .or-line hr {
      flex-grow: 1;
      border: none;
      height: 1px;
      background-color: #d4d4d4;
    }
    .or-line p {
      margin: 0 10px;
      color: #333;
    }
    .btn-submit {
    background-color: #FFC30B;
    border-color: #FFC30B;
    padding: 5px 15px; 
    font-size: 14px; 
    border-radius: 15px;
    max-width: 100px;
    color: black
   
  }
  .btn-submit:hover {
    background-color: #F0B90B; 
    border-color: #F0B90B;
  }
    
  </style>
  <title>Login Page</title>
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
  </div>
  </div>
</nav>
<div class="container">
  <div class="row">
    <div class="col-md-6 col-sm-12 mx-auto login-box">
    <center>
    <img src="images/PNR.png" alt="PNR LOGO" width=80 height= 80>
    </center>
      <form action="process.php" method="post">
        <br><div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fas fa-eye" id="togglePassword"></i>
              </span>
            </div>
          </div>
        </div>
        
        <div class="form-group">
            <div class="input-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="rememberMe">
                <label class="custom-control-label" for="rememberMe">Remember Me</label>
              </div>
              <div class="ml-auto"> 
                <a href="forgot_pass.php">Forgot password?</a>
              </div>
            </div>
          </div>
          <div class="or-line">
            <hr>
            <p>Or</p>
            <hr>
          </div>
          <center> <a class="nav-link" href="login.php">Log In with Phone Number</a> 
          <button type="submit" name="signin" class="btn btn-primary btn-block btn-submit">Log In</button>
          </center>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  const togglePassword = document.getElementById('togglePassword');
  const passwordInput = document.getElementById('password');

  togglePassword.addEventListener('click', function () {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    togglePassword.classList.toggle('fa-eye-slash');
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>