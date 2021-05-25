<?php
session_start();
include "connect.php";

$dates = $_POST['dates'];
$times = $_POST['times'];
$type = $_POST['type'];
$emp = $_POST['emp'];
$id = $_POST['id'];
$name = $_POST['fname'];
$last = $_POST['lname'];




$date = $_POST['date'];
            if($type == "---เลือก---"){
                echo "<script>window.history.back();</script>";
                $_SESSION['error'] = "เลือกประเภท " ;
                //header("location:../../add_queue_emp.php");
            }
            else if($times == "คิวเต็มแล้ว"){
                echo "<script>window.history.back();</script>";
                $_SESSION['error'] = "คิวเต็มแล้ว " ;
                //header("location:../../add_queue_emp.php");
            }
            
            else{

                $sql = "INSERT INTO `queue_emp`(eguest_id,eguest_date,eguest_time,`type_id`,emp_id,namepub,lastnamepub) VALUES('$id','$dates','$times','$type','$emp','$name','$last')";
                $query_sql1 = mysqli_query($con,$sql);
               
               
                if($query_sql1){
                        
                        $a=explode("-",$times);
                        $a[0]=$a[0].":00";

                        $d = explode("-",$dates);

                        $datepp=$d[2]."-".$d[1]."-".$d[0];

                        $sqldate = "SELECT * FROM `queue_date`where date ='$datepp' and ontime='$a[0]'";
                        $query_date = mysqli_query($con,$sqldate);
                        $datezz = mysqli_num_rows($query_date);
                        //echo "<script>alert($datezz)</script>";
                       if($datezz == 0){
                        $sqlind = "INSERT INTO `queue_date` (date,ontime,hasq) VALUES ('$datepp','$a[0]',1)";
                        $query_sqldate = mysqli_query($con,$sqlind);
                
                       }else{
                           //$datezz = $datezz+1;

                           $sqlhas = "SELECT * FROM `queue_date`where date ='$datepp' and ontime='$a[0]'";
                           $query_date = mysqli_query($con,$sqldate);
                           $timezzx = mysqli_fetch_array($query_date);
                           print_r ($timezzx);
                           echo "<script>alert(".$timezzx['hasq'].")</script>";
                           $timezzx['hasq']++;
                        $sqlup = "UPDATE `queue_date` SET `hasq`= ".$timezzx['hasq']." WHERE `date`='$datepp' and `ontime`='$a[0]'";
                        $query_time = mysqli_query($con,$sqlup);

                       }

                       $_SESSION['suc'] = "เพิ่มข้อมูลสำเร็จ";
                        header("location:../../add_queue_emp.php");

                    }
                    else{
                        $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ " . $con->error;
                        header("location:../../add_queue_emp.php");
                    }

                            // if($con->query($sql)){
                            //     $_SESSION['suc'] = "เพิ่มข้อมูลสำเร็จ";
                            //     header("location:../../add_queue_emp.php");
                            // }
                            // else{
                            //     $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ " . $con->error;
                            //     header("location:../../add_queue_emp.php");
                            // }
                        }
                            

            
    
               
           



  


         





    
    