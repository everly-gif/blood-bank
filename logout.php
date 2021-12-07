<?php
 require 'includes/session.php';
 if(!isset($_SESSION['loggedin'])){
    header('location:index.php');
}
else{
    session_destroy();
    header('Location: login.php');
}
exit;

?>