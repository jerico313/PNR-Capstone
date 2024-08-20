<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/PNR.png" type="image/x-icon" />
    <title>Password Sent</title>
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
            z-index: -1;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            background-attachment: fixed;
        }

        .message-container {
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

        .btn-primary {
    background-color: #174793;
    color: #fff;
    padding: 5px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-bottom:10px;
    width: 100%;
}

    </style>
</head>
<body>
    <div class="message-container">
        <h3>Password Sent</h3>
        <p>Please check your email for the temporary password. Use the provided temporary password to log in and update your password.</p>
        <a href="login.php" class="btn btn-primary">Login</a>
    </div>
</body>
</html>
