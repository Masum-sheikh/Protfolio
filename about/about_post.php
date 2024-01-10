<?php
require '../db.php';
session_start();
$nick_name=$_POST['nick_name'];
$name=$_POST['name'];
$designaton=$_POST['designaton'];
$short_desp=$_POST['short_desp'];
$image=$_FILES['image'];

if($image['name']==''){
   
    $update="UPDATE mabouts SET nick_name='$nick_name',name='$name',designaton='$designaton',short_desp='$short_desp' WHERE id=1";
    $update_res=mysqli_query($db_connect, $update);

}else{

$after_expolod=explode('.',$image['name']);
$extention=end($after_expolod);
$allowed_extrention=['jpg','png'];

$selsct_image="SELECT * FROM mabouts WHERE id=1";
$selsct_image_res=mysqli_query($db_connect, $selsct_image);
$after_assoc=mysqli_fetch_assoc($selsct_image_res);



if(in_array($extention, $allowed_extrention)){
    if($image['size']<=512000){
        $delete_from='../uploads/about/'. $after_assoc['image'];
        unlink($delete_from);
        $filename='masum'.'.'.$extention;
        $new_location='../uploads/about/'.$filename;
        move_uploaded_file($image['tmp_name'], $new_location);
       
        $update="UPDATE mabouts SET nick_name='$nick_name',name='$name',designaton='$designaton',short_desp='$short_desp', image='$filename' WHERE id=1";
        $update_res=mysqli_query($db_connect, $update);

        $_SESSION['about']=' about update successfully';
        header('location:about.php');
    }else{
        $_SESSION['exten2']='maximum image size 512kb';
        header('location:about.php');
    }
   
}

else{
    $_SESSION['exten2']='image must be type jpg or png';
    header('location:about.php');
}



}

?>