<?php 
if(isset($_SESSION['logged_in']) && isset($_SESSION['loggedin'])!=false){
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Registration</title>
    <link rel="stylesheet" href="./css/navbar.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/register.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/footer.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php require 'includes/header.php';?>
    <div class="container-1">
    <form method="post" action="register_script.php" class="hospital-form" enctype="multipart/form-data">
        <div class="content">
        <label>Hospital Name: </label><input type="text" name="name" required>
        <input type="radio" name="type" value="govt"required><label>Govt</label>
        <input type="radio" name="type" value="private"><label>Private</label><br>
        <label>Sector of Service</label><input type="text"  name="services"required >
        <label>Hospital Registration Number: </label><input type="text" name="registration_number"required >
        <label>Registration Scanned copy: </label><input type="file" name="file" id="file" required>
        <label>Contact Email: </label><input type="email" name="email"required>
        <label>Password: </label><input type="password" name="password"required>
        <label>Contact Number: </label><input type="tel" name="contact" pattern="[0-9]{10}"required>
        <label>Address: </label><input type="text" name="address"required >
        <label>City: </label><input type="text" name="city"required>
        <label>State:</label><input type="text" name="state"required>
        <label>Country:</label><input type="text" value="India" name="country" disabled >
        <button type="submit" name="hospital_registration">Register Now</button>
        </div>
    </form>
    </div> 
    <?php require 'includes/footer.php';?>
</body>
</html>


