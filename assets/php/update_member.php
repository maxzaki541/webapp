<?php
session_start();
include "connect.php";

$email_m = $_POST['email_m'];
$username_m = $_POST['username_m'];
$password_m = $_POST['password_m'];
$tel_m = $_POST['tel_m'];
$f_name = $_POST['fname'];
$l_name = $_POST['lname'];
$id = $_POST['id'];

$sql = "UPDATE `member` SET `f_name`='$f_name',`l_name`='$l_name',`email`='$email_m',`cardnumber`='$tel_m',`password`='$password_m',`username`='$username_m' WHERE `mem_id`='$id'";
if($con->query($sql)){
    echo "<script type='text/javascript'>alert('แก้ไขข้อมูลสำเส็จ'); 
    window.location.href='../../index_member.php';</script>";
    // $_SESSION['suc'] = "อัพเดตข้อมูลสำเร็จ";
    // header("location:../../update_member_input.php");
    
}
else{
    $_SESSION['error'] = "อัพเดตข้อมูลไม่สำเร็จ " . $con->error;
    header("location:../../update_member_input.php");
}