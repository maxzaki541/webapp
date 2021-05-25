<?php
session_start();
include "connect.php";

$dates = $_POST['dates'];
$times = $_POST['times'];
$type = $_POST['type'];
$id = $_POST['id'];
if($type == "---เลือก---"){
    echo "<script>;window.history.back();</script>";
    $_SESSION['error'] = "เลือกประเภทการรักษา " ;
    //header("location:../../update_queue_emp_input.php");
}
if($times == "---เลือก---"){
    echo "<script>;window.history.back();</script>";
    $_SESSION['error'] = "เลือกเวลา " ;
    //header("location:../../update_queue_emp_input.php");
}else{
$sql = "UPDATE `queue` SET `queue_date`='$dates',`queue_time`='$times',`type_id`='$type' WHERE `queue_id`='$id'";
if($con->query($sql)){

    echo "<script type='text/javascript'>alert('แก้ไขข้อมูลสำเส็จ'); 
    window.location.href='../../index_queue.php';</script>";
    // $_SESSION['suc'] = "อัพเดตข้อมูลสำเร็จ";
    // header("location:../../update_queue_input.php");
}
else{
    $_SESSION['error'] = "อัพเดตข้อมูลไม่สำเร็จ " . $con->error;
    header("location:../../update_queue_input.php");
}
}