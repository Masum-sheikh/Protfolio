<?php
session_start();
require '../db.php';
$footer_logo=$_FILES['footer_logo'];
$after_expolod=explode('.',$footer_logo['name']);
$extention=end($after_expolod);
$allowed_extrention=['jpg','png'];

$selsct_logo="SELECT * FROM logos WHERE id=1";
$selec_logo_res=mysqli_query($db_connect, $selsct_logo);
$after_assoc=mysqli_fetch_assoc($selec_logo_res);


if(in_array($extention, $allowed_extrention)){
    if($footer_logo['size']<=512000){
        $delete_from='../uploads/logo/'. $after_assoc['footer_logo'];
        unlink($delete_from);
        $filename='footer_logo'.'.'.$extention;
        $new_location='../uploads/logo/'.$filename;
        move_uploaded_file($footer_logo['tmp_name'], $new_location);
        $update="UPDATE logos SET footer_logo='$filename' WHERE id=1";
        mysqli_query($db_connect,$update);
        $_SESSION['footer_logo']='footer logo update successfully';
        header('location:logo.php');
    }else{
        $_SESSION['exten2']='maximum image size 512kb';
        header('location:logo.php');
    }
   
}

else{
    $_SESSION['exten2']='image must be type jpg or png';
    header('location:logo.php');
}


?>