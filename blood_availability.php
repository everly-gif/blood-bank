<?php

require 'includes/db.php';
require 'includes/session.php';
require 'includes/check_eligible.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Availabiliy - Blood Bank</title>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/blood_availability.css">
</head>
<body>
  <?php require 'includes/header.php';?>
  <h1>Available Blood Samples</h1>
    <div class="container-1">
      <?php
      $query=mysqli_query($conn,"SELECT DISTINCT `blood_group` FROM `blood_samples`");
      while($data=mysqli_fetch_array($query)){
        $blood_type=$data['blood_group'];
        $blood_count=mysqli_query($conn,"SELECT SUM(number_of_units) AS blood_count FROM `blood_samples` WHERE `blood_group`='$blood_type'");
        $row = mysqli_fetch_assoc($blood_count); 
        $total_count = $row['blood_count'];
        echo "<div class='center-flex'>
               <div class='total-blood-count'>
                <div>".$data['blood_group']."</div>
                <div>".$total_count." units</div>
               </div>
              </div>";
      }
      ?>
    </div>
    <div class="data">
      <table>
      <tr>
        <th>Hospital</th>
        <th>Type</th>
        <th>Blood Type</th>
        <th>Available Units</th>
        <th>Number of units Required</th>
        <th>Doctor Recommendation Letter</th>
        <th>Request</th>
      </tr>
      <?php
        $query=$conn->query("SELECT blood_samples.hospital_id,blood_samples.blood_group,blood_samples.number_of_units, hospitals.name, hospitals.address, hospitals.city,hospitals.state, hospitals.type
        FROM blood_samples
        INNER JOIN hospitals ON hospitals.id =blood_samples.hospital_id WHERE blood_samples.number_of_units>0");
        while($data=mysqli_fetch_assoc($query)){
          echo "<tr>
          <td>".$data['name']."<br>".$data['address']."<br>".$data['city']." ".$data['address']."</td>
          <td>".$data['type']."</td>
          <td>".$data['blood_group']."</td>
          <td>".$data['number_of_units']."</td>
          <td><form method='post' action='request_sample_script.php' enctype='multipart/form-data'>
            <div class='quantity'>
            <div class='decrease'>-</div>
            <input name='hospital_id'  type='text' value='".$data['hospital_id']."' hidden>
            <input name='blood_type'  type='text' value='".$data['blood_group']."' hidden>
            <input type='number' id='".$data['blood_group']."'  min=0 name='number_of_units' max='".$data['number_of_units']."'value=0 readonly>
            <div class='increase'>+</div>
            </div>
          </td>
          <td><input type='file' name='file'><br><br></td><td>";
           if(isset($_SESSION['loggedin'])!=false)
          { 
            if($_SESSION['user_type']=="receiver" && check_if_eligible($_SESSION['user_id'],$data['blood_group']))
            echo "<button name='submit_request' class='rq_sample'  type='submit'> + Request Sample </button></form></td>";
            else {
              echo "<button type='button' class='rq_sample' > + Request Sample </button><small style='text-align:center;color:red;margin-left:34px;'>(Not Eligible)</small></form></td>";
            }
          }
          else{
            echo "<a  href='login.php' class='rq_sample' > + Request Sample </button></form></td>";
          }
          "</tr>";
        }

        ?>
        </table>
    </div>
  </div>
  <?php require 'includes/footer.php';?>
  <script src="js/count.js"></script>
</body>
</html>