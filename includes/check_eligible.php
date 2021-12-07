<?php

function check_if_eligible($user_id,$requested_sample){
    require 'db.php';
    echo "<script>console.log('".$requested_sample."')</script>";
    $query=$conn->query("SELECT `blood_type`,`city` FROM `receivers` WHERE `id`='$user_id'");
    $data=mysqli_fetch_assoc($query);
    $receiver_blood_group=$data['blood_type'];
    $receiver_city=$data['city'];
    if($receiver_blood_group==$requested_sample){
       return true;
    }
    else{
        return false;
    }
}


?>