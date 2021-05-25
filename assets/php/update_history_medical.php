<?php
session_start();
include "connect.php";

$type = $_POST['type'];
$id = $_POST['id'];
$patient = $_POST['patient'];
$other_de = $_POST['other_de'];

$diagid = $_POST['diagid'];
$nowdate = $_POST['nowdate'];
$nowtime = $_POST['nowtime'];
$namemed = $_POST['namemed'];
$name = $_POST['name'];
$id1 = $_POST['id1'];
$nextdate = $_POST['nextdate'];
$nexttime = $_POST['nexttime'];
$ntid = $_POST['ntid'];


if($namemed == null){
    echo "<script>window.history.back();</script>";
    $_SESSION['error'] = "เลือกแพทย์ " ;
    //header("location:../../add_queue_emp.php");
  }
  if($type == null){
    echo "<script>window.history.back();</script>";
    $_SESSION['error'] = "เลือกการรักษา " ;
    //header("location:../../add_queue_emp.php");
  }else{
$boolean= true;


$sql = "UPDATE `defence` SET `type_id`='$type',`Info_id`='$patient',`other_de`='$other_de' WHERE `de_id`='$id'";

$sql2 = "UPDATE `diagnosis` SET `di_NameSymptom`='$name',`medic_id`='$namemed',`Info_id`='$patient',`di_date`='$nowdate',`di_time`='$nowtime' WHERE `de_id`='$id'";

$sql3 = "UPDATE `nexttime` SET `nt_date`='$nextdate',`nt_time`='$nexttime' WHERE `de_id`='$id'";

if($con->query($sql)){
    
}else{
    $boolean = false;
}
if($con->query($sql2)){
    
    
}else{
    $boolean = false;
}
if($con->query($sql3)){
 
}
else{
    $boolean = false;
}

if($boolean){
    echo "<script type='text/javascript'>alert('แก้ไขข้อมูลสำเส็จ'); 
    window.location.href='../../index_history_medical.php';</script>";
    // $_SESSION['suc'] = "อัพเดตข้อมูลสำเร็จ";
    // header("location:../../update_history_medical_input.php");
}
else{
    $_SESSION['error'] = "อัพเดตข้อมูลไม่สำเร็จ " . $con->error;
    header("location:../../update_history_medical_input.php");
}
}