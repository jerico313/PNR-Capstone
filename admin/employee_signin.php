<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Manrope" rel="stylesheet">
  <style>
    body {
      background-color: #FCD20F;
      font-family: Manrope;
    }
    .login-box {
      max-width: 400px;
      margin: auto;
      padding: 20px;
      background-color: white;
      border-radius: 15px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
      margin-top: 5%;
      border-top: 15px solid #174793
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
    background-color: #174793;
    border-color: #174793;
    padding: 5px 15px; 
    font-size: 14px; 
    border-radius: 15px;
    max-width: 100px;
    color: white
   
  }
  .btn-submit:hover {
    background-color: #174793; 
    border-color: #174793;
  }
    
  </style>
  <title>Employee Sign In</title>
</head>
<class="nav-item">
          <a class="nav-link active"  style="color:black"  aria-current="page"  href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-circle"  viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
</svg> BACK</a> 
          
<body>
<div class="container">
  <div class="row">
    <div class="col-md-6 col-sm-12 mx-auto login-box">
    <center>
    <img src="images/PNR.png" alt="PNR LOGO" width=80 height= 80><br><br>
    <h4 style="font-weight: 900"> EMPLOYEE SIGN IN </h4>
    </center>
    <?php
    if (isset($error)) {
        echo '<div class="alert alert-danger" role="alert">';
        echo "Email Address does not match " ;
        echo '</div>';
    }
    ?>
      <form>
        <br><div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" class="form-control" id="email" placeholder="Enter email">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>
            <input type="password" class="form-control" id="password" placeholder="Enter password">
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fas fa-eye" id="togglePassword"></i>
              </span>
            </div>
          </div>
        </div>
        <center>
          <br><button type="submit" class="btn btn-primary btn-block btn-submit">Sign In</button>
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

</body>
</html>