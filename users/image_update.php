<?php
session_start();
require '../db_connect.php';
$id=$_SESSION['user_id'];
$image=$_FILES['image'];
$after_expolod=explode('.',$image['name']);
$extention=end($after_expolod);
$allowed_extrention=['jpg','png'];
if(in_array($extention, $allowed_extrention)){
    if($image['size']<=512000){
        $filename=$id.'.'.$extention;
        $new_location='../addphoto/malpo'.$filename;
        move_uploaded_file($image['tmp_name'], $new_location);
        $update="UPDATE masum SET image='$filename' WHERE id=$id";
        mysqli_query($db_connect,$update);
        $_SESSION['update-imag']='image update successfully';
        header('location:profile.php');
    }else{
        $_SESSION['exten']='maximum image size 512kb';
        header('location:profile.php');
    }
   
}

else{
    $_SESSION['exten']='image must be type jpg or png';
    header('location:profile.php');
}
 
?>