<?php
session_start();
include "connect.php";

$name = $_POST['name'];
$last = $_POST['lastname'];
$pre = $_POST['pre'];
$id = $_POST['id'];
$registerno = $_POST['registerno'];
$sdate = $_POST['sdate'];

            if($pre == "---เลือกคำนำหน้า---"){
                echo "<script>alert('$pre')</script>";
                $_SESSION['error'] = "เลือกคำนำหน้า " ;
                header("location:../../add_medic.php");
            }else{

               $sql = "INSERT INTO `medic`(medic_id,medic_name,  medic_surname,medic_regis,medic_pre,startdate) VALUES('$id','$name','$last','$registerno','$pre','$sdate')";
               if($con->query($sql)){
                   $_SESSION['suc'] = "เพิ่มข้อมูลสำเร็จ";
                   header("location:../../add_medic.php");
               }
               else{
                   $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ " . $con->error;
                   header("location:../../add_medic.php");
               }
            }



  


         





    
    