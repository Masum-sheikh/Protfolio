<?php
session_start();
require '../db.php';
$header_logo=$_FILES['header_logo'];
$after_expolod=explode('.',$header_logo['name']);
$extention=end($after_expolod);
$allowed_extrention=['jpg','png'];

$selsct_logo="SELECT * FROM logos WHERE id=1";
$selec_logo_res=mysqli_query($db_connect, $selsct_logo);
$after_assoc=mysqli_fetch_assoc($selec_logo_res);


if(in_array($extention, $allowed_extrention)){
    if($header_logo['size']<=512000){
        $delete_from='../uploads/logo/'. $after_assoc['header_logo'];
        unlink($delete_from);
        $filename='header_logo'.'.'.$extention;
        $new_location='../uploads/logo/'.$filename;
        move_uploaded_file($header_logo['tmp_name'], $new_location);
        $update="UPDATE logos SET header_logo='$filename' WHERE id=1";
        mysqli_query($db_connect,$update);
        $_SESSION['header_logo']='header logo update successfully';
        header('location:logo.php');
    }else{
        $_SESSION['exten']='maximum image size 512kb';
        header('location:logo.php');
    }
   
}

else{
    $_SESSION['exten']='image must be type jpg or png';
    header('location:logo.php');
}


?>