<?php
session_start();
include "connect.php";

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$surname = $_POST['surname'];
$pre = $_POST['pre'];
$sex = $_POST['sex'];
$id = $_POST['id'];


if($pre == "---เลือกคำนำหน้า---"){
    echo "<script>window.history.back();</script>";
    $_SESSION['error'] = "เลือกคำนำหน้า " ;
    //header("location:../../add_queue_emp.php");
}
else if($sex == "---เลือกเพศ---"){
    echo "<script>window.history.back();</script>";
    $_SESSION['error'] = "เลือกเพศ " ;
    //header("location:../../add_queue_emp.php");
}
else{
$sql = "UPDATE `employees` SET `emp_name`='$name',`emp_surname`='$surname',`password`='$password',`username`='$username',`emp_gender`='$sex',`emp_pre`='$pre' WHERE `emp_id`='$id'";
if($con->query($sql)){
    echo "<script type='text/javascript'>alert('แก้ไขข้อมูลสำเส็จ'); 
    window.location.href='../../index_emp.php';</script>";
    // $_SESSION['suc'] = "อัพเดตข้อมูลสำเร็จ";
    // header("location:../../update_member_input.php");
    
}
else{
    $_SESSION['error'] = "อัพเดตข้อมูลไม่สำเร็จ " . $con->error;
    header("location:../../update_emp_input.php");
}
}