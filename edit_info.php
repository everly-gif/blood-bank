<?php
require 'includes/db.php';
require 'includes/session.php';
if(isset($_POST['edit_sample'])){
    $hospital_id=$_SESSION['user_id'];
    $blood_group=$_POST['blood_group'];
    $units=$_POST['number_of_units'];
    $query=$conn->query("UPDATE `blood_samples` SET `number_of_units`='$units' WHERE `blood_group`='$blood_group' AND `hospital_id`='$hospital_id'");
    if($query){
        header('location:add_blood_info.php');
    }
}

?>