<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/PNR.png" type="image/x-icon" />
    <title>PNR</title>
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
      font-family: Manrope;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
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

.verification-container {
    max-width: 400px;
    margin: 20px;
    padding: 20px;
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

h3 {
    color: #174793;
}

p {
    color: #555;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.btn-submit {
    background-color: #174793;
    color: #fff;
    padding: 5px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-bottom:10px;
    width: 100%;
}

.btn-submit:hover {
    background-color: #0d315c;
}

    </style>
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
    <div class="verification-container">
        <h3>Forget Password</h3>
        <p>Enter the verification code sent to your email address.</p>
        <form action="change_pass.php" method="post">
            <div class="form-group">
                <label for="verification_code">Verification Code:</label>
                <input type="text" name="verification_code" required>
            </div>
            <button type="submit" name="verify" class="btn-submit">Verify</button>
        </form>
    </div>
</body>
</html>
