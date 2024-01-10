<?php
session_start();
require 'db_connect.php';
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$password_hass=password_hash($password,PASSWORD_DEFAULT);
$gender=$_POST['gender'];
$flag=false;
if(!$name){
    $flag=true;
    $_SESSION['name_err']='your name empty';
}
if(!$email){
    $flag=true;
    $_SESSION['eml-err']='your email empty';
}
if(!$password){
    $flag=true;
    $_SESSION['pass-err']='your password empty';
}else{
    $upper=preg_match('@[A-Z]@',$password);
    $lower=preg_match('@[a-z]@',$password);
    $number=preg_match('@[0-9]@',$password);
    $specaill=preg_match('@[#,%,&,*,$]@',$password);
    if(!$upper || !$lower || !$number || !$specaill){
        $flag=true;
        $_SESSION['pass-err']='please set a strong password';
    }
}if(!$gender){
    $flag=true;
    $_SESSION['gnd-err']='select your gender';
}

if($flag){
    
    header('location:register.php');
}
else{
    $select= "SELECT COUNT(*) as paisi FROM masum WHERE email='$email'";
    $select_quiry=mysqli_query($db_connect,$select);
   $after_asssoc=mysqli_fetch_assoc( $select_quiry);
   if($after_asssoc['paisi']==0){
    $insert="INSERT INTO masum( name,email, password, gender)VALUES('$name','$email','$password_hass','$gender')";
    mysqli_query($db_connect ,$insert);
    $_SESSION['success']='your register succesfull';
    header("location:register.php");
   }
else{
    $_SESSION['exit']='your email alredy has been acount';
    header("location:register.php");
}
}
?>