<?php
session_start();
include "connect.php";

$date = $_POST['date'];
$time = $_POST['time'];
$name = $_POST['name'];
$infon = $_POST['infon'];
$me = $_POST['me'];
$id = $_POST['id'];

$sql = "UPDATE `diagnosis` SET `di_NameSymptom`='$name',`Info_id`='$infon',`medic_id`=$me,`di_date`='$date',`di_time`='$time' WHERE `di_id`='$id'";
if($con->query($sql)){
    //$_SESSION['suc'] = "อัพเดตข้อมูลสำเร็จ";
    echo "<script type='text/javascript'>alert('แก้ไขข้อมูลสำเส็จ'); 
    window.location.href='../../index_diag.php';</script>";
    //header("location:../../update_diag_input.php");
}
else{
    $_SESSION['error'] = "อัพเดตข้อมูลไม่สำเร็จ " . $con->error;
    header("location:../../update_diag_input.php");
}