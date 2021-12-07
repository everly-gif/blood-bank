<?php
require 'includes/db.php';
if(isset($_POST['login'])){
$email=mysqli_real_escape_string($conn,$_POST['email']);
$password=mysqli_real_escape_string($conn,$_POST['password']);
$is_hospital=$conn->query("SELECT `id`, `email` ,`password` FROM `hospitals` WHERE `email`='$email' ");
$is_receiver=$conn->query("SELECT `id`, `email` ,`password` FROM `receivers` WHERE `email`='$email' ");
if(mysqli_num_rows($is_hospital)==1){
    $data=mysqli_fetch_array($is_hospital);
    $verify=password_verify($password,$data['password']);
    if($verify){
    require 'includes/session.php';
    $_SESSION['loggedin']=true;
    $_SESSION['email']=$data['email'];
    $_SESSION['user_id']=$data['id'];
    $_SESSION['user_type']="hospital";
    header('location:add_blood_info.php');
    }
    else{
    echo "<script>alert('Wrong Credentials, try again!');</script>";
    // header('location:login.php');
    }
}
elseif (mysqli_num_rows($is_receiver)==1){
    $data=mysqli_fetch_array($is_receiver);
    $verify=false;
    $verify=password_verify($password,$data['password']);
    if($verify){
    require 'includes/session.php';
    $_SESSION['loggedin']=true;
    $_SESSION['email']=$data['email'];
    $_SESSION['user_id']=$data['id'];
    $_SESSION['user_type']="receiver";
    echo "<script>alert('Logged In !');</script>";
    echo $_SESSION['user_type'];
    header('location:blood_availability.php');
    }
    else{
    echo "<script>if(confirm('Wrong Credentials, try again!'))
    {
        window.location.href='login.php';
    }
    else{
        window.location.href='login.php';
    }
    </script>";
    
    
    }
}
else{
    echo "<script>if(confirm('No such account exists! Please sign up !'))
    {
        window.location.href='index.php';
    }
    else{
        window.location.href='index.php';
    }
    </script>";
    
}
}

?>