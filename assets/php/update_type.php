<?php
session_start();
include "connect.php";

$name = $_POST['name'];
$id = $_POST['id'];

$sql = "UPDATE `type_service` SET `type_name`='$name' WHERE `type_id`='$id'";
if($con->query($sql)){
    echo "<script type='text/javascript'>alert('แก้ไขข้อมูลสำเส็จ'); 
    window.location.href='../../index_type.php';</script>";
    // $_SESSION['suc'] = "อัพเดตข้อมูลสำเร็จ";
    // header("location:../../update_type_input.php");
}
else{
    $_SESSION['error'] = "อัพเดตข้อมูลไม่สำเร็จ " . $con->error;
    header("location:../../update_type_input.php");
}