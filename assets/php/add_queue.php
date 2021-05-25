<?php
session_start();
include "connect.php";

$dates = $_POST['dates'];
$times = $_POST['times'];
$type = $_POST['type'];
$mem = $_POST['mem'];
$id = $_POST['id'];
    
               $sql = "INSERT INTO `queue`(mem_id,queue_date, queue_time, `type_id`) VALUES('$mem','$dates','$times','$type')";
               if($con->query($sql)){
                   $_SESSION['suc'] = "เพิ่มข้อมูลสำเร็จ";
                   header("location:../../add_queue.php");
               }
               else{
                   $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ " . $con->error;
                   header("location:../../add_queue.php");
               }
           



  


         





    
    