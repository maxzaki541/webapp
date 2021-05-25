<?php
session_start();
include "connect.php";

$pi1 = $_POST['1'];
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

$pi17 = $_POST['17'];
$pi18 = $_POST['18'];
$pi19 = $_POST['19'];
$pi20 = $_POST['20'];
$pi21 = $_POST['21'];
$pi22 = $_POST['22'];
$pi23 = $_POST['23'];
$pi24 = $_POST['24'];
$pi25 = $_POST['25'];
$pi26 = $_POST['26'];

$pi27 = $_POST['27'];
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
$pi43 = $_POST['43'];
$pi44 = $_POST['44'];

$pi0 = $_POST['0'];
$pi45 = $_POST['45'];




$check = " SELECT  se_idcard FROM `service`  WHERE se_idcard = '$pi0'  ";
$result1 = mysqli_query($con, $check) or die(mysqli_error());
$num=mysqli_num_rows($result1);


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
}

 else if(!($num > 0)){
  $sql = "INSERT INTO `patient_info` (`Info_id`, `Info_name`, `Info_surename`, `Info_age`, `Info_cardnum`, `Info_pre`, `Info_sex`, `Info_career`, `Info_birthday`, `Info_religion`, `Info_race`, `Info_national`, `Info_infoname`, `Info_about`, `Info_nameadult`, `Info_status`)  VALUES('$pi1','$pi2','$pi3','$pi4','$pi5','$pi6','$pi7','$pi8','$pi9','$pi10','$pi11','$pi12','$pi13','$pi14','$pi15','$pi16')";
  
 if($con->query($sql)){

  $sqladd = "INSERT INTO `address_p` (ad_id,ad_idhome,ad_alley,ad_road,ad_moo,ad_tumbol,ad_amper,ad_province,ad_atbirth,ad_contact,Info_id)  VALUES('$pi17','$pi18','$pi19','$pi20','$pi21','$pi22','$pi23','$pi24','$pi25','$pi26','$pi1')";
  
  if($con->query($sqladd)){
      $sqlser = "INSERT INTO `service` (se_id,se_idcard,se_idlicense,se_idpublic,se_idhn,se_idfamily,se_idXray,se_roft,se_pressure,se_weight,se_height,se_waist,se_temp,emp_id,Info_id)  VALUES('$pi28','$pi0','$pi29','$pi30','$pi31','$pi32','$pi33','$pi34','$pi35','$pi36','$pi37','$pi38','$pi39','$pi40','$pi1')";
      if($con->query($sqlser)){
          $sqldrug = "INSERT INTO `history_drug` (hd_id,hd_namedrug,hd_condis,Info_id)  VALUES('$pi42','$pi43','$pi45','$pi1')";

            if($con->query($sqldrug)){
              $_SESSION['suc'] = "เพิ่มข้อมูลสำเร็จ";
              header("location:../../add_patient_info.php");
            }else{
              $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จเนื่องจากข้อมูลบริการผิดพลาด " . $con->error;

              $deladd = "DELETE from `patient_info` where `Info_id` = '$pi1'";
              $con->query($deladd);


              $deladd2 = "DELETE from `address_p` where Ad_id = '$pi17'";
              $con->query($deladd2);

              $delser = "DELETE from `service` where se_id = '$pi28'";
              $con->query($delser);
              header("location:../../add_patient_info.php");
            }
      }else{
          $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จเนื่องจากข้อมูลบริการผิดพลาด " . $con->error;

          $deladd = "DELETE from `patient_info` where `Info_id` = '$pi1'";
          $con->query($deladd);


          $deladd2 = "DELETE from `address_p` where Ad_id = '$pi17'";
          $con->query($deladd2);
          header("location:../../add_patient_info.php");
      }
  }
  else{
      $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จเนื่องจากข้อมูลที่อยู่ผิดพลาด " . $con->error;
      $deladd = "DELETE from `patient_info` where `Info_id` = '$pi1'";
      $con->query($deladd);
      header("location:../../add_patient_info.php");
  }
 }

 else{
     $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จเนื่องจากข้อมูลผิดพลาด " . $con->error;

     header("location:../../add_patient_info.php");
 }

}else{
    echo "<script>";
    echo "alert(' เลขบัตรประชาชนซ้ำ !');";
    echo "window.history.back();";
    echo "</script>";
}
                



  


         





    
    