<?php
session_start();
include "connect.php";

$name = $_POST['name'];
$lastname = $_POST['lastname'];

$pre = $_POST['pre'];
$id = $_POST['id'];

$regis = $_POST['regis'];
$sdate = $_POST['sdate'];
$odate = $_POST['odate'];

if($pre == "---เลือกคำนำหน้า---"){
    echo "<script>
    
    window.history.back();</script>";
    $_SESSION['error'] = "เลือกคำนำหน้า " ;
    //header("location:../../update_medic_input.php");
}else{
$sql = "UPDATE `medic` SET `medic_name`='$name',`medic_surname`='$lastname',`medic_pre`='$pre',`medic_regis`='$regis',`startdate`='$sdate',`outdate`='$odate' WHERE `medic_id`='$id'";
if($con->query($sql)){

    echo "<script type='text/javascript'>alert('แก้ไขข้อมูลสำเส็จ'); 
    window.location.href='../../index_medic.php';</script>";
    // $_SESSION['suc'] = "อัพเดตข้อมูลสำเร็จ";
    // header("location:../../update_medic_input.php");
}
else{
    $_SESSION['error'] = "อัพเดตข้อมูลไม่สำเร็จ " . $con->error;
    header("location:../../update_medic_input.php");
}
}