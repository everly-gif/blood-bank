<?php 

require 'includes/db.php';
require 'includes/session.php';
$hospital_id=$_SESSION['user_id'];
$receiver_id=$_GET['id'];
$query=$conn->query("UPDATE `requests` SET `status`='denied' WHERE (`receiver_id`='$receiver_id' AND `status`='waitlist') AND `hospital_id`='$hospital_id'");
if($query){
    echo "successful";
    header('location:view_requests.php');
}
?>