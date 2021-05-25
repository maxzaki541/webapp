<?php
  session_start();
  include 'assets/php/connect.php';
  if(!isset($_SESSION['staff_id'])) header("location:index.php");
  if(isset($_REQUEST['t']) ) {
    $i = $_REQUEST['t'];
}else{
    header("location:index_medic.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ยินดีต้อนรับ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/console.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">

</head>

<body>

<div class="wrapper">
    <!-- การนำเข้า Navbar -->
    <div id="content">
        <?php include 'assets/object/navBar.php'?>

    <div class="container my-5">

        <?php

                //นำเข้าไฟล์ การเชื่อมต่อฐานข้อมูล
                

                $sql = "SELECT * FROM medic WHERE medic_id='$i'";
                $result = mysqli_query($con, $sql);


                // เเสดงข้อมูลจากฐานข้อมูล
                while ($item = mysqli_fetch_assoc($result)) { ?>

        <!-- เเสดงข้อมูลจากฐานข้อมูล -->
        <div class="col-md-10">
                    <h4>
                        ข้อมูล <?php echo $item["medic_pre"] ."".$item["medic_name"]." ".$item["medic_surname"]; ?>
                        
                    </h4>
                </div>
        <!-- Card -->
        <div class="card card-cascade wider reverse">

            <!-- Card image -->
            <div class="view view-cascade overlay">
                <img class="img-thumbnail" src="images/medic.png" alt="Card image cap" height="70" width="210" >
              
            </div>
            <div class="card-header">
                ข้อมูลแพทย์
            </div>
            <!-- Card content -->
            <div class="card-body card-body-cascade text-left">
                <h6 class="card-title">รหัส : <?php echo $item["medic_id"]; ?></h6>
                <!-- Title -->
                <h6 class="card-title">คำนำหน้าชื่อ : <?php echo $item["medic_pre"]; ?></h6>
                <h6 class="card-title">ชื่อ : <?php echo $item["medic_name"]; ?></h6>
                <!-- Subtitle -->
                <h6 class="card-title">นามสกุล : <?php echo $item["medic_surname"]; ?></h4>
                <h6 class="card-title">หมายเลขทะเบียนวิชาชีพ : <?php echo $item["medic_regis"]; ?></h6>
                <h6 class="card-title">วันที่เริ่มปฏิบัติงาน : <?php echo $item["startdate"]; ?></h6>
                <h6 class="card-title">วันที่สิ้นสุดปฏิบัติงาน : <?php echo $item["outdate"]; ?></h6>
                <!-- Text -->
            </div>

        </div>
        <!-- Card -->

        
        <?php
                }
                ?>

    </div>
    
</div>
</div>
<?php include 'assets/object/footer.php'?> 
   
</body>

</html>

