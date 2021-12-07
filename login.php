<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Blood Bank System</title>
    <link rel="stylesheet" href="./css/navbar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/login.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/footer.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php require 'includes/header.php';?>
    <div class="parent-cont">
    <div class="container-1">
        <img src="images/drop.png">
    </div>
    <div class="container-2">
    <form method="post" action="login_submit.php" class="login-form">
    <h1>Login</h1>
    <label>Email: </label><input type="email"  name="email" >
    <label>Password: </label><input type="password" name="password">
    <button type="submit" name="login">Login</button>
    <div class="form-footer"><p>Don't have an account?</p><br><a href="receiver_registration.php">Register as Receiver</a>
    <a href="hospital_registration.php">Register as Hospital</a></div>
    </form>
    </div>
    </div>
    <?php require 'includes/footer.php';?>
</body>
</html>