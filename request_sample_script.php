<?php
require 'includes/db.php';
require 'includes/session.php';
$users_blood_type=false;
$units=false;
$hospital_id=false;
if (isset($_FILES['file']))
{
$filename=$_FILES['file']['name'];
$filetmp=$_FILES['file']['tmp_name'];
$filename= rand(1,100).'-'.time().'-'.$filename;

foreach($_POST as $key => $value){
    if($key=='blood_type')
    $users_blood_type=$value ;
    if($key=='hospital_id')
    $hospital_id=$value;
    if($key=='number_of_units')
    $units=$value;
}
    $receiver_id=$_SESSION['user_id'];
    $unique=$conn->query("SELECT `hospital_id`,`receiver_id`,`status` FROM `requests` WHERE `receiver_id`='$receiver_id' AND `status`='waitlist'");
    if(mysqli_num_rows($unique)==0){
    move_uploaded_file($filetmp,"doctor_recommendation_letter/".$filename); 
    $query=$conn->query("INSERT INTO `requests` VALUES (NULL,'$receiver_id','$users_blood_type','$units','$hospital_id',CONCAT('doctor_recommendation_letter/','$filename'),'waitlist')");
    if($query){
    $total_units=$conn->query("SELECT `number_of_units` FROM `blood_samples` WHERE `blood_group`='$users_blood_type' AND `hospital_id`='$hospital_id'");
    $data=mysqli_fetch_assoc($total_units);
    $updated_units=$data['number_of_units']-$units;
     echo "Request sent successfully";   
     header('location:user_profile.php');
    }
    else{
     echo "Request Failed";
    }
   }
   else{
    echo "<script>
    if(confirm('Previous request status is still pending ! check your dashboard'))
    {
        window.location.href='user_profile.php';
    }
    else{
        window.location.href='user_profile.php';
    }
    </script>";
   }
}
else{
    header('location:index.php');
}
?>