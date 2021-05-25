<?php
session_start();
include "connect.php";

$dates = $_POST['dates'];
$times = $_POST['times'];
$type = $_POST['type'];
$namep = $_POST['namep'];
$lastp = $_POST['lastp'];
//$emp = $_POST['emp'];
$id = $_POST['id'];
if($type == "---เลือก---"){
    echo "<script>;window.history.back();</script>";
    $_SESSION['error'] = "เลือกประเภทการรักษา " ;
    //header("location:../../update_queue_emp_input.php");
}else{
$sql = "UPDATE `queue_emp` SET `eguest_date`='$dates',`eguest_time`='$times',`type_id`='$type',`namepub`='$namep',`lastnamepub`='$lastp' WHERE `eguest_id`='$id'";
if($con->query($sql)){
    echo "<script type='text/javascript'>alert('แก้ไขข้อมูลสำเส็จ'); 
    window.location.href='../../index_queue_emp.php';</script>";
    // $_SESSION['suc'] = "อัพเดตข้อมูลสำเร็จ";
    // header("location:../../update_queue_emp_input.php");
}
else{
    $_SESSION['error'] = "อัพเดตข้อมูลไม่สำเร็จ " . $con->error;
    header("location:../../update_queue_emp_input.php");
}
}