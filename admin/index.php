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
      margin-top: 100px;
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
    border-radius: 10px;
    max-width: 200px;
    height: 50px;
    color: white
   
  }
  .btn-submit:hover {
    background-color: #174793; 
    border-color: #174793;
  }
    
  </style>
  <title>PNR</title>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-6 col-sm-12 mx-auto login-box">
    <center>
    <img src="images/PNR.png" alt="PNR LOGO" width=80 height= 80><br><br>
    <h4 style="font-weight: 1000"> SIGN IN AS </h4>
    <form >
         	<br><button type="button" style="font-weight: 900;" class="btn btn-primary btn-block btn-submit" onclick="redirectToAdmin()">ADMIN</button><br>
                <button type="button" style="font-weight: 900;" class="btn btn-primary btn-block btn-submit" onclick="redirectToEmployee()">EMPLOYEE</button>
    </form><br>
    </center>
      
    </div>
  </div>
</div>

<script>
    function redirectToAdmin() {
      // Redirect to the admin_signin.php page
      window.location.href = 'admin_signin.php';
    }

    function redirectToEmployee() {
      // Redirect to the employee_signin.php page
      window.location.href = '../employee/employee_signin.php';
    }
  </script>

</body>
</html>