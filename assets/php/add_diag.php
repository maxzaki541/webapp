<?php
session_start();
include "connect.php";

$id = $_POST['id'];
$date = $_POST['date'];
$time = $_POST['time'];
$name = $_POST['name'];
$info = $_POST['infoname'];
$nmed = $_POST['namemed'];
            
            /*$sql1 = mysqli_result(mysqli_query("SELECT Max(substr(di_id,-3))+1 as MaxID from `diagnosis`"),0,"MaxID");
                if($sql1==""){
                    $id = "DI008";

                }else{
                    $id = "DI".sprintf("%04d",$sql1);
                }*/
            
           
               $sql = "INSERT INTO `diagnosis`(di_id,di_NameSymptom,medic_id,Info_id,di_date,di_time) VALUES('$id','$name','$nmed','$info','$date','$time')";
               if($con->query($sql)){
                   $_SESSION['suc'] = "เพิ่มข้อมูลสำเร็จ";
                   header("location:../../add_diag.php");
               }
               else{
                   $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ " . $con->error;
                   header("location:../../add_diag.php");
               }
            
           



  


         





    
    