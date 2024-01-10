<?php
session_start();
require '../db_connect.php';
$id=$_GET['id'];
$delet="DELETE FROM masum WHERE id= $id";
mysqli_query($db_connect,$delet);
$_SESSION['delet']='user delete successfully';
header('location:user_list.php');


?>