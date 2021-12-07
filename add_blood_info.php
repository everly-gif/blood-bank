<?php

require 'includes/db.php';
require  'includes/session.php';

 if(!isset($_SESSION) || $_SESSION['user_type']!="hospital"){
     header('location:index.php');
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blood Info - Blood Bank System</title>
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/modal.css">
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>
<body>
    <?php require 'includes/header.php';?>
    <h1>Add Blood Samples </h1>
    <div class="btn-cont"><button  type="button" id="add_blood_sample">+ Add New Blood sample</button></div>
    <div class="container-1">
    <table>
        <tr>
            <th>Blood Type</th>
            <th>Units</th>
        </tr>
    <?php

    $hospital_id=$_SESSION['user_id'];
    $query=$conn->query("SELECT `id`,`blood_group`,`number_of_units`FROM `blood_samples` WHERE `hospital_id`='$hospital_id'");
    if(mysqli_num_rows($query)>0){
     while($data=mysqli_fetch_array($query)){
         echo '<tr><td>'.$data['blood_group'].'</td><td><span>'.
          $data['number_of_units'].'</span>   ✎<a class="edit_btn">Edit</a></td></tr>';
      }
    }
    
    ?>
    </table>
    </div>

    <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h4><b>New Sample</b></h4>
      <div class="sample-form">
          <form class="modal-form" method="post" action="add_sample_script.php">
              <label>Blood Group</label><input type="text" name="blood_group">
              <label>Number of Units</label><input type="number" name="number_of_units">
              <button type="submit" name="add_sample">Add Sample</button>
          </form>
     </div>
    </div>
  </div>
  <div id="editModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h4><b>Edit Sample</b></h4>
      <div class="sample-form">
          <form class="modal-form" method="post" action="edit_info.php">
              <label>Blood Group</label><input type="text" id="blood_group" name="blood_group">
              <label>Number of Units</label><input type="number" id="units" name="number_of_units">
              <button type="submit" name="edit_sample">Update Units</button>
          </form>
     </div>
    </div>
  </div>

  <?php require 'includes/footer.php';?>
  
</body>
<script src="js/add_blood_sample.js"></script>
</html>