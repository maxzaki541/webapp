<?php
session_start();
include "connect.php";


$pi2 = $_POST['2'];
$pi3 = $_POST['3'];
$pi4 = $_POST['4'];
$pi5 = $_POST['5'];
$pi6 = $_POST['6'];
$pi7 = $_POST['7'];
$pi8 = $_POST['8'];
$pi9 = $_POST['9'];
$pi10 = $_POST['10'];
$pi11 = $_POST['11'];
$pi12 = $_POST['12'];
$pi13 = $_POST['13'];
$pi14 = $_POST['14'];
$pi15 = $_POST['15'];
$pi16 = $_POST['16'];
$id = $_POST['id'];


$idadd = $_POST['idadd'];
$pi18 = $_POST['18'];
$pi19 = $_POST['19'];
$pi20 = $_POST['20'];
$pi21 = $_POST['21'];
$pi22 = $_POST['22'];
$pi23 = $_POST['23'];
$pi24 = $_POST['24'];
$pi25 = $_POST['25'];
$pi26 = $_POST['26'];


$idse = $_POST['idse'];
$pi28 = $_POST['28'];
$pi29 = $_POST['29'];
$pi30 = $_POST['30'];
$pi31 = $_POST['31'];
$pi32 = $_POST['32'];
$pi33 = $_POST['33'];
$pi34 = $_POST['34'];
$pi35 = $_POST['35'];
$pi36 = $_POST['36'];
$pi37 = $_POST['37'];
$pi38 = $_POST['38'];
$pi39 = $_POST['39'];
$pi40 = $_POST['40'];
$pi41 = $_POST['41'];

$pi42 = $_POST['42'];

$boolean= true;

if($pi6 == "----เลือกคำนำหน้า----"){
    echo "<script>window.history.back();</script>";
    $_SESSION['error'] = "เลือกคำนำหน้า " ;
    //header("location:../../add_queue_emp.php");
}
else if($pi10 == "------เลือกศาสนา------"){
    echo "<script>window.history.back();</script>";
    $_SESSION['error'] = "เลือกศาสนา " ;
    //header("location:../../add_queue_emp.php");
}
else if($pi16 == "------เลือกสถานะ------"){
    echo "<script>window.history.back();</script>";
    $_SESSION['error'] = "เลือกสถานะ " ;
    //header("location:../../add_queue_emp.php");
}else{

$sql2 = "UPDATE `address_p` SET `ad_idhome`='$pi18',`ad_alley`='$pi19',`ad_road`='$pi20',`ad_moo`='$pi21',`ad_tumbol`='$pi22',`ad_amper`='$pi23',`ad_province`='$pi24',`ad_atbirth`='$pi25',`ad_contact`='$pi26' WHERE `Info_id`='$id'";

$sql3 = "UPDATE `service` SET `se_idlicense`='$pi29',`se_idpublic`='$pi30',`se_idhn`='$pi31',`se_idfamily`='$pi32',`se_idXray`='$pi33',`se_roft`='$pi34',`se_pressure`='$pi35',`se_weight`='$pi36',`se_height`='$pi37',`se_waist`='$pi38',`se_temp`='$pi39',`emp_id`='$pi40' WHERE `Info_id`='$id'";

$sql = "UPDATE `patient_info` SET `Info_name`='$pi2',`Info_surename`='$pi3',`Info_age`='$pi4',`Info_cardnum`='$pi5',`Info_pre`='$pi6',`Info_sex`='$pi7',`Info_career`='$pi8',`Info_birthday`='$pi9',`Info_religion`='$pi10',`Info_race`='$pi11',`Info_national`='$pi12',`Info_infoname`='$pi13',`Info_about`='$pi14',`Info_nameadult`='$pi15',`Info_status`='$pi16' WHERE `Info_id`='$id'";

$sql4 = "UPDATE `history_drug` SET `hd_namedrug`='$pi42' WHERE `Info_id`='$id'";

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
if($con->query($sql4)){
    
}else{
    $boolean = false;
}

if($boolean){
    // $_SESSION['suc'] = "แก้ไขข้อมูลสำเร็จ";
    echo "<script type='text/javascript'>alert('แก้ไขข้อมูลสำเส็จ'); 
     window.location.href='../../index_patient_info.php';</script>";
    
     
}else{
    
        $_SESSION['error'] = "อัพเดตข้อมูลไม่สำเร็จ " . $con->error;
        header("location:../../update_patient_info_input.php");
}
}
// echo "<script type='text/javascript'>alert('แก้ไขข้อมูลสำเส็จ'); 
//     window.location.href='../../index_patient_info.php';</script>";

// $_SESSION['error'] = "อัพเดตข้อมูลไม่สำเร็จ " . $con->error;
// header("location:../../update_patient_info_input.php");