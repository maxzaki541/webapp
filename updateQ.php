<?php
session_start();
include 'assets/php/connect.php';

$sqlss="SELECT *FROM `queue_emp` where `eguest_status`='กำลังรักษา'";

$sqlss1 ="SELECT *FROM `queue` where `queue_status`='กำลังรักษา'";


$result1 = mysqli_query($con, $sqlss) or die(mysqli_error());
$num=mysqli_num_rows($result1);

$result2 = mysqli_query($con, $sqlss1) or die(mysqli_error());
$num2=mysqli_num_rows($result2);

if($num+$num2 < 3){


    $i = $_GET['t'];

    $sql = "UPDATE `queue_emp` SET `eguest_status`='กำลังรักษา' WHERE `eguest_id`='$i'";
    
$sql2 ="UPDATE `queue` SET `queue_status`='กำลังรักษา' WHERE `queue_id`='$i'";

if($con->query($sql)){
    echo "<script type='text/javascript'>
    window.location.href='callQ.php';</script>";

}
else{
    $_SESSION['error'] = "ไม่สำเร็จ " . $con->error;
    echo "<script type='text/javascript'>
    window.location.href='callQ.php';</script>";
    
}


if($con->query($sql2)){
    echo "<script type='text/javascript'> 
    window.location.href='callQ.php';</script>";
   
}

else{
    $_SESSION['error'] = "ไม่สำเร็จ " . $con->error;
    echo "<script type='text/javascript'>
    window.location.href='callQ.php';</script>";
}

}else{
    echo "<script>alert('คิวการรักษาเต็มแล้ว')</script>";
    echo "<script type='text/javascript'>
    window.location.href='callQ.php';</script>";
}




?>