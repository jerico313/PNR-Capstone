<?php
session_start();

include("inc/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['adm_email'];
    $password = $_POST['password'];

    $sql = "SELECT admin_id, adm_firstname, adm_lastname, password FROM admin WHERE adm_email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin_id'] = $row['admin_id'];
            $_SESSION['email'] = $row['adm_email'];
            $_SESSION['adm_firstname'] = $row['adm_firstname'];
            $_SESSION['adm_lastname'] = $row['adm_lastname'];
            $_SESSION['profile_picture'] = $row['profile_picture'];            
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Incorrect password";
        }
    } else {
        $error = "Email not found";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/PNR.png" type="image/x-icon" />
    <title>PNR</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Manrope" rel="stylesheet">
  <script src="https://kit.fontawesome.com/d36de8f7e2.js" crossorigin="anonymous"></script>
  <style>
    body {
      background-image: url("images/train3.jpg");
  background-color: #cccccc;
  background-position: center;
  background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
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
  background: rgba(0, 0, 0, 0.6); /* Adjust alpha value for darkness */
  background-attachment: fixed; /* Ensure the dark overlay doesn't move */
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
  <title>Admin Sign In</title>
</head>
<class="nav-item">
<a class="nav-link active"  style="color:#fff;font-weight: 600;background-color: #174793;box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;font-size:20px;"  aria-current="page"  href="../admin/index.php"><i class="fa-solid fa-arrow-left fa-lg"></i></a>  
<body>
<div class="container">
  <div class="row">
    <div class="col-md-6 col-sm-12 mx-auto login-box">
    <center>
    <img src="images/PNR.png" alt="PNR LOGO" width=80 height= 80><br><br>
    <h4 style="font-weight: 900"> ADMIN SIGN IN </h4>
    </center>
    <?php
    if (isset($error)) {
        echo '<div class="alert alert-danger" role="alert">';
        echo "Email Address does not match " ;
        echo '</div>';
    }
    ?>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <br><div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" class="form-control" name="adm_email" id="email" placeholder="Enter email">
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
        <center>
          <br><button type="submit" name="signin" class="btn btn-primary btn-block btn-submit">Sign In</button>
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