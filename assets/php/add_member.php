<?php
session_start();
include "connect.php";

$email_m = $_POST['email_m'];
$username_m = $_POST['username_m'];
$password_m = $_POST['password_m'];
$tel_m = $_POST['tel_m'];

    
               $sql = "INSERT INTO `member`(email, cardnumber, `password`,username) VALUES('$email_m','$tel_m','$password_m','$username_m')";
               if($con->query($sql)){
                   $_SESSION['suc'] = "เพิ่มข้อมูลสำเร็จ";
                   header("location:../../add_member.php");
               }
               else{
                   $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ " . $con->error;
                   header("location:../../add_member.php");
               }
           



  


         





    
    