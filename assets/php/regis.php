<meta charset="utf-8">
<?php
    include 'connect.php';
	$username = $_POST["username"];
    $pass = ($_POST["pass"]);
    $conpass = ($_POST["conpass"]);
    $preregis = $_POST["preregis"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $genderregis = $_POST["genderregis"];
    $id = $_POST["id"];

    if($preregis == null && $genderregis==null ){
        echo "<script>alert('เลือกคำนำหน้า');
        window.history.back();</script>";
        $_SESSION['error'] = "เลือกคำนำหน้า " ;
    }
     if($genderregis==null ){
        echo "<script>alert('เลือกเพศ');
        window.history.back();</script>";
        $_SESSION['error'] = "เลือกคำนำหน้า " ;
    }
else{
	$check = " SELECT  username FROM employees  WHERE username = '$username' ";
    $result1 = mysqli_query($con, $check) or die(mysqli_error());
    $num=mysqli_num_rows($result1);

    if($pass != $conpass){
        //echo "รหัสผ่านไม่ตรงกัน";
        echo "<script>";
        echo "alert(' รหัสผ่านไม่ตรงกัน !');";
        echo "window.history.back();";
        echo "</script>";
    } 
    else if($num > 0)
    {
    echo "<script>";
    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
    echo "window.history.back();";
    echo "</script>";
    }
     
    else{
	
	$sql = "INSERT INTO `employees`(emp_id,emp_name,emp_surname,emp_gender,username,`password`,emp_pre) VALUES ('$id','$fname','$lname','$genderregis','$username','$pass','$preregis')";
    //print($sql);
    $result = mysqli_query($con, $sql) ;
}

    /*if($pass != $conpass){
    echo "รหัสผ่านไม่ตรงกัน";
    } else{
    echo "รหัสผ่านตรงกัน";
    }*/
mysqli_close($con);
//

  
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location = '../../index.php' ";
    echo "</script>";
    //echo "success";
	}else{
        //echo "notttsuccess";
	echo "<script type='text/javascript'>";
	echo "window.location = '../../index.php' ";
	echo "</script>";
}
}
?>