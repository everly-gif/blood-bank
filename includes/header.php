

<?php

require 'includes/db.php';
require 'includes/session.php';

?>

<nav class="navbar" >
        <div><a href="index.php"><img src="images/logo.png" class="logo"width=64px height=52px ></a></div>
        
        <a href ="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
     
        <div class="r-nav" >
            
            <ul >
                <li><a href="blood_availability.php">Available Blood samples</a></li>
                <?php if(!isset($_SESSION['email'])){
                echo '<li><a href="hospital_registration.php">Register as hospital</a></li>';
                }?>
                 <?php if(!isset($_SESSION['email'])){
                echo '<li><a href="receiver_registration.php">Register as receiver</a></li>';
                }?>
                <?php if(isset($_SESSION['email']) && $_SESSION['user_type']=="receiver"){
                echo '<li><div class="dropdown"><button class="dropbtn">&#128101;'.$_SESSION['email'].'▼</button>
                <div class="dropdown-content"><a  href="user_profile.php">My Requests</a><a href="logout.php">Logout</a></div>
                </div></li>';
                }
                elseif(isset($_SESSION['email']) && $_SESSION['user_type']=="hospital"){
                    echo '<li><div class="dropdown"><button class="dropbtn">&#128101;'.$_SESSION['email'].'▼</button>
                    <div class="dropdown-content"><a  href="add_blood_info.php">Add Blood Info</a><a  href="view_requests.php">View Requests</a><a href="logout.php">Logout</a></div>
                    </div></li>';
                    }
                else{
                    echo '<li><a  href="login.php">Login</a></li>';
                }
                 ?>
            </ul>
       
        </div>
    </nav>
    