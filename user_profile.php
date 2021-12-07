<?php
require 'includes/db.php';
require 'includes/session.php';

if(!isset($_SESSION['logged_in']) && isset($_SESSION['loggedin'])==false){
    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Blood Bank System</title>
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/user_profile.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>
<body>
<?php require 'includes/header.php';?>
<h1>My Requests</h1>
<div class="container-1">
<table>
<tr>
    <th>Hospital Name</th>
    <th>Blood Type</th>
    <th>Number of Units</th>
    <th>Status</th>
<tr>
<?php $user_id=$_SESSION['user_id'];
$query=$conn->query("SELECT requests.blood_group, requests.number_of_units,requests.receiver_id,requests.status,hospitals.name,hospitals.address,hospitals.city,hospitals.state FROM requests INNER JOIN hospitals ON requests.hospital_id = hospitals.id  WHERE `receiver_id`='$user_id'");
while($data=mysqli_fetch_assoc($query)){
    echo "<tr><td>".$data['name']."<br>".$data['address']."<br>".$data['city']." ".$data['state']."</td><td>".$data['blood_group']."</td><td>".$data['number_of_units']."</td><td>".$data['status']."</td></tr>";
}?>
</table>
</div>
<?php require 'includes/footer.php';?>
</body>
</html>