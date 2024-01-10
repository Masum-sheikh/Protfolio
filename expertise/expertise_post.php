<?php
require '../db.php';
session_start();
$topic_name=$_POST['topic_name'];
$persentage=$_POST['persentage'];
$insert="INSERT INTO expertise(topic_name, persentage) VALUES('$topic_name', '$persentage')";
mysqli_query($db_connect, $insert);
$_SESSION['success']='New skil add';
header('location:expertise.php');




?>