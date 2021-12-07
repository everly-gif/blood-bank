<?php
require 'includes/db.php';
require 'includes/session.php';
if(isset($_GET['type']) && isset($_GET['units']) && $_GET['sign']){
$hospital_id=$_SESSION['user_id'];
$users_blood_type=$_GET['type'];
$units=$_GET['units'];
$sign=$_GET['sign'];
$receiver_id=$_GET['id'];
if($sign==1){
    $users_blood_type=$users_blood_type."+";
}
else{
    $users_blood_type=$users_blood_type."-";
}

$total_units=$conn->query("SELECT `number_of_units` FROM `blood_samples` WHERE `blood_group`='$users_blood_type' AND `hospital_id`='$hospital_id'");
$data=mysqli_fetch_assoc($total_units);
$updated_units=$data['number_of_units']-$units;
$update=$conn->query("UPDATE `blood_samples` SET `number_of_units`='$updated_units' WHERE `hospital_id`='$hospital_id' AND `blood_group`='$users_blood_type'");
if($update){
    $result=$conn->query("UPDATE `requests` SET `status`='approved' WHERE `hospital_id`='$hospital_id' AND `receiver_id`='$receiver_id'");
    header('location:view_requests.php');
  }
}
else{
    header('location:index.php');
}
?>