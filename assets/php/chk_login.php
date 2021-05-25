<?php
    session_start();
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['pass'];

    // LOGIN
    $sql = "SELECT * FROM `employees` WHERE `username` = '".$username."' AND `password` = '".$password."'";
    $result = mysqli_query($con,$sql); 
    // $load = $con->query($sql);
    // $data = $load->fetch_assoc();
    $data = mysqli_fetch_assoc($result);
    //$rowlogin=mysqli_fetch_array($result);  
    $num_rows = mysqli_num_rows($result);
    if($num_rows == 1) {  // ถ้าไม่เจอ record เลย
        $_SESSION['staff_id']= $data['emp_name'];
        $_SESSION['id']= $data['emp_id'];
        header("location:../../index_patient_info.php");
    
    } 
    else if($username == "admin" && $password == "admin"){
        $_SESSION['staff_id'] = "admin";

        header("location:../../index_type.php");
    }
    else {  
        $_SESSION['error'] = "รหัสผ่านไม่ถูกต้อง";  
        header("location:../../index.php");  
        
    }  

    // if($username == "admin" && $password == "admin"){
    //     $_SESSION['staff_id'] = "admin";

    //     header("location:../../index_member.php");
    // }
    // else{
    //     $_SESSION['error'] = "รหัสผ่านไม่ถูกต้อง";
    //     header("location:../../index.php");
    // }
    
