<?php 
require 'includes/db.php';
require 'includes/session.php';
if(isset($_SESSION['loggedin'])==true){
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receiver Registration</title>
    <link rel="stylesheet" href="./css/navbar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/register.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/footer.css?v=<?php echo time(); ?>">
</head>
<body>
<?php

require 'includes/header.php';

?>
 <div class="container-1">
    <form method="post" action="register_script.php" class="receiver-form" enctype="multipart/form-data">
        <div class="content">
        <label>Name: </label><input type="text" name="name" required>
        <label>Email: </label><input type="email"  name="email" required>
        <label>Password: </label><input type="password" name="password" required>
        <label>Aadhar Card Number: </label><input type="text" name="aadhar_number" required>
        <label>Aadhar Scanned copy: </label><input type="file" name="aadhar" id="file" required>
        <label>Blood Group: </label><input type="text" name="blood_group"required>
        <label>Contact Number: </label><input type="tel" name="contact" pattern="[0-9]{10}"required>
        <label>City: </label><input type="text" name="city"required>
        <label>State: </label><input type="text" name="state"required>
        <label>Country:</label><input type="text" value="India" name="country" disabled>
        <button type="submit" name="receiver_registration">Register Now</button>
        </div>
    </form>
 </div>
    <?php require 'includes/footer.php';?>
</body>
</html>


