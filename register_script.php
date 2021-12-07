<?php
require 'includes/db.php';
if(isset($_POST['hospital_registration'])&& isset($_FILES['file']) && isset($_POST['type'])){
$name=mysqli_real_escape_string($conn,$_POST['name']);
$type=mysqli_real_escape_string($conn,$_POST['type']);
$services=mysqli_real_escape_string($conn,$_POST['services']);
$registration_number=mysqli_real_escape_string($conn,$_POST['registration_number']);
$filename=$_FILES['file']['name'];
$filetmp=$_FILES['file']['tmp_name'];
$filename= rand(1,100).'-'.time().'-'.$filename;
move_uploaded_file($filetmp,"registration_uploads/".$filename);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$password=mysqli_real_escape_string($conn,$_POST['password']);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$contact=mysqli_real_escape_string($conn,$_POST['contact']);
$address=mysqli_real_escape_string($conn,$_POST['address']);
$city=mysqli_real_escape_string($conn,$_POST['city']);
$state=mysqli_real_escape_string($conn,$_POST['state']);
$unique=$conn->query("SELECT * FROM `hospitals` WHERE `registration_no`='$registration_number' or email = '$email'");
if(mysqli_num_rows($unique) == 0){
    $result=$conn->query("INSERT INTO `hospitals` VALUES (NULL, '$name', '$type', '$services', '$registration_number', CONCAT('registration_uploads/','$filename'), '$email', '$hashed_password','$contact','$address','$city','$state')");
    if($result){
        echo "<script>alert('Successful');window.location.href='login.php';</script>";
    }
    else{
        echo "<script>alert('Something Went Wrong :(');window.location.href='hospital_registration.php';</script>";
        
    }
    }
    else{
        $erroralert="";
        echo "<script>alert('This Hospital registration number is already registered');window.location.href='hospital_registration.php';</script>";
    }
    
    
    }

 



if(isset($_POST['receiver_registration']) && isset($_FILES['aadhar'])){
$name=mysqli_real_escape_string($conn,$_POST['name']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$password=mysqli_real_escape_string($conn,$_POST['password']);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$aadhar_number=mysqli_real_escape_string($conn,$_POST['aadhar_number']);
$filename=$_FILES['aadhar']['name'];
$filetmp=$_FILES['aadhar']['tmp_name'];
$filename= rand(1,100).'-'.time().'-'.$filename;
move_uploaded_file($filetmp,"receiver_aadhar_copy/".$filename);
$blood_group=mysqli_real_escape_string($conn,$_POST['blood_group']);
$contact=mysqli_real_escape_string($conn,$_POST['contact']);
$city=mysqli_real_escape_string($conn,$_POST['city']);
$state=mysqli_real_escape_string($conn,$_POST['state']);
$unique=$conn->query("SELECT * FROM `receivers` WHERE `aadhar`='$aadhar_number' or email = '$email'");
if(mysqli_num_rows($unique) == 0){
    $result=$conn->query("INSERT INTO `receivers` VALUES (NULL, '$name', '$email', '$hashed_password', '$aadhar_number', CONCAT('registration_uploads/','$filename'),'$blood_group', '$contact', '$city','$state')");
    if($result){
        echo "<script>alert('Successful');window.location.href='index.php';</script>";
    }
    else{
        echo "<script>alert('Something Went Wrong :(');window.location.href='receiver_registration.php';</script>";
        
    }
    }
    else{
        $erroralert="";
        echo "<script>alert('This aadhar number or email is already registered');window.location.href='receiver_registration.php';</script>";
    }
    }
?>
