<?php

require 'includes/db.php';
require 'includes/session.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Requests - Blood Bank System</title>
    <title>Add Blood Info - Blood Bank System</title>
    <link rel="stylesheet" href="./css/navbar.css?v=<?php echo time()?>">
    <link rel="stylesheet" href="./css/view_requests.css?v=<?php echo time()?>">
    <link rel="stylesheet" href="./css/footer.css?v=<?php echo time()?>">
</head>
<body>
    
    <?php require 'includes/header.php';?>
    <h1>Requests</h1>
    <div class="container-1">
    <table>
    <tr>
        <th>Receiver's Name</th>
        <th>Blood Group</th>
        <th>Number of Units Requested</th>
        <th>Doctor Recommendation Letter</th>
        <th>Receiver's Contact</th>
        <th>Status</th>
    </tr>
    <?php
    $hospital_id=$_SESSION['user_id'];
    $sign=false;
    $users_blood_type=false;
    $query=$conn->query("SELECT requests.blood_group,requests.number_of_units,requests.status,requests.recommendation_letter,requests.hospital_id,requests.receiver_id,receivers.name,receivers.contact,receivers.email FROM `requests` INNER JOIN receivers ON receivers.id=requests.receiver_id WHERE `hospital_id`='$hospital_id' AND `status`='waitlist'");
    while($result=mysqli_fetch_assoc($query)){
        if(substr($result['blood_group'], -1)=='+'){
            $sign=1;
        }
        else{
            $sign=0;
        }
       
        if(strlen($result['blood_group'])==2){
            $users_blood_type=substr($result['blood_group'],0,1);
        }
        else{
            $users_blood_type=substr($result['blood_group'],0,2);
        }
        echo "<tr><td>".$result['name']."</td><td>".$result['blood_group']."</td><td>".$result['number_of_units']."</td><td><a href='".$result['recommendation_letter']."'>Doctor Recommendation Letter</a></td><td>ph: ".$result['contact']."<br>email: ".$result['email']."</td><td><a href='accept_request.php?id=".$result['receiver_id']."&type=".$users_blood_type."&sign=".$sign."&units=".$result['number_of_units']."'>Accept</a> <a href='deny_request.php?id=".$result['receiver_id']."'>Deny</a></td></tr>";
        
    }
    ?>
    </table>
    </div>
    <?php require 'includes/footer.php';?>
</body>
</html>