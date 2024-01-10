<?php
session_start();
require '../db.php';
$id=$_GET['id'];
$delete="DELETE FROM expertise WHERE id=$id";
mysqli_query($db_connect, $delete);
$_SESSION['delete']='expertise delete successfull';
header('location:expertise.php');

?>