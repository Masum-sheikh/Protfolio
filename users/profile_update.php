

<?php

session_start();
require '../db_connect.php';
$name=$_POST['name'];
$id=$_POST['user_id'];
$password=$_POST['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);

if(empty($password)){
    $update = "UPDATE masum SET name='$name' WHERE id='$id'";
    mysqli_query($db_connect, $update);
    $_SESSION['update']='profile update complete';
    header('location:profile.php');
}
else{
    $update = "UPDATE masum SET name='$name', password='$hash' WHERE id='$id'";
    mysqli_query($db_connect, $update);
    $_SESSION['update']='profile update complete';
    header('location:profile.php'); 
   
}

?>