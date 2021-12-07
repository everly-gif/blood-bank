<?php

require 'includes/db.php';
require 'includes/session.php';


if(isset($_POST['add_sample'])){
    $hospital_id=$_SESSION['user_id'];
    $blood_group=$_POST['blood_group'];
    $number_of_units=$_POST['number_of_units'];
    $query=$conn->query("SELECT `blood_group` FROM `blood_samples` WHERE `blood_group`='$blood_group' AND `hospital_id`='$hospital_id' ");
    if(mysqli_num_rows($query)==0){
      $query=$conn->query("INSERT INTO `blood_samples` VALUES (NULL,'$blood_group','$number_of_units','$hospital_id')");
      if($query){
          echo "<script>alert('New Blood sample added');</script>";
          header('location:add_blood_info.php');
      }
      else{
          echo "<script>alert('Something went wrong :(');window.location.href='add_blood_info.php';</script>";
      }
    }
    else{
        echo "<script>alert('blood group already exists please update the sample instead of adding a new sample');window.location.href='add_blood_info.php';</script>";
    }
}
else{
    header('location:index.php');
}

?>