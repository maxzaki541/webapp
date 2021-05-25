<?php
    session_start();
    include 'assets/php/connect.php';

    if(isset($_SESSION['staff_id'])) header("location:index_member.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ลงทะเบียน</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/logo1.png);">
					<span class="login100-form-title-1">
						ลงทะเบียน
					</span>
				</div>
                <?php 
                
                $row = 1;
                $id = "";
                do{

                    
                    $id = "E";
                    for($i=0;$i<4;$i++){
                        $id .= rand(0,9);
                    }
                    $sql1 = "SELECT * FROM `employees` Where `emp_id`=$id";
                    $load1 = $con->query($sql1);
                    $row = mysqli_num_rows($load1);

                }while($row != 0);
                // $sql1 = mysqli_result(mysqli_query($con,"SELECT Max(substr(`di_id`,-3))+1 as MaxID from `diagnosis`"),0,"MaxID");
                
            ?>
               
				
				<form class="login100-form validate-form" action="assets/php/regis.php" method="post">
              
                <input type="hidden" name="id" value="<?php echo $id; ?>"   required class="form-control">

					<div class="wrap-input100 validate-input m-b-26" data-validate="กรุณากรอกชื่อผู้ใช้">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="กรอกชื่อผู้ใช้">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "กรุณากรอกรหัสผ่าน">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="กรอกรหัสผ่าน">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "ยืนยันรหัสผ่าน">
						<span class="label-input100">Confirm Password</span>
						<input class="input100" type="password" name="conpass" placeholder="กรอกรหัสผ่าน">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-18" data-validate = "กรุณากรอกรหัสผ่าน">
						<span class="label-input100">คำนำหน้า</span>
                        <select class="form-control" id="exampleFormControlSelect1" name="preregis">
						<option disabled="disabled" selected="selected">--เลือกคำนำหน้า--</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                            </select>
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-18" data-validate = "กรุณากรอกชื่อจริง">
						<span class="label-input100">ชื่อ</span>
						<input class="input100" type="text" name="fname" placeholder="กรอกชื่อจริง">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-18" data-validate = "กรุณากรอกนามสกุลจริง">
						<span class="label-input100">นามสกุล</span>
						<input class="input100" type="text" name="lname" placeholder="กรอกนามสกุลจริง">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-18" data-validate = "กรุณากรอกเพศ">
						<span class="label-input100">เพศ</span>
						<select class="form-control" id="exampleFormControlSelect1" name="genderregis">
						<option disabled="disabled" selected="selected">--เลือกเพศ--</option>
                            <option value="ชาย">ชาย</option>
                            <option value="หญิง">หญิง</option>
                            
                            </select>
						<span class="focus-input100"></span>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn form-control">
							ลงทะเบียน
						</button>
						
					</div>

					

				</form>
			
			
		</div>
		
					
					
	</div>
	<?php include 'assets/object/footer.php'?> 
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	
</body>
</html>