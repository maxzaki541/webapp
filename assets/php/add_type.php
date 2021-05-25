<?php
session_start();
include "connect.php";

$name = $_POST['name'];
$id = $_POST['id'];
    
               $sql = "INSERT INTO `type_service`(`type_id`,`type_name`) VALUES('$id','$name')";
               if($con->query($sql)){
                   $_SESSION['suc'] = "เพิ่มข้อมูลสำเร็จ";
                   header("location:../../add_type.php");
               }
               else{
                   $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ " . $con->error;
                   header("location:../../add_type.php");
               }
           



  


         





    
    