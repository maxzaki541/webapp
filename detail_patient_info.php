<?php
  session_start();
  include 'assets/php/connect.php';
  if(!isset($_SESSION['staff_id'])) header("location:index.php");
  if(isset($_REQUEST['t']) ) {
    $i = $_REQUEST['t'];
}else{
    header("location:index_patient_info.php");
}
// if(isset($_REQUEST['s']) ) {
//     $s = $_REQUEST['s'];
// }else{
//     header("location:index_patient_info.php");
// }
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



    <style>
    .collapsible {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    }

    /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
    .active, .collapsible:hover {
    background-color: #ccc;
    }

    /* Style the collapsible content. Note: hidden by default */
    .content {
    padding: 0 18px;
    display: none;
    overflow: hidden;
    background-color: #f1f1f1;
    }

    .collapsible:after {
    content: '\02795'; /* Unicode character for "plus" sign (+) */
    font-size: 13px;
    color: white;
    float: right;
    margin-left: 5px;
    }

    .active:after {
    content: "\2796"; /* Unicode character for "minus" sign (-) */
    }
    </style>
</head>

<body>

<div class="wrapper">
    <!-- การนำเข้า Navbar -->
    <div id="content">
        <?php include 'assets/object/navBar.php'?>

    <div class="container my-5">
    <div class="col-md-10">
                    <h4>
                        ข้อมูลทะเบียน
                        
                    </h4>
                </div>
        <?php

                //นำเข้าไฟล์ การเชื่อมต่อฐานข้อมูล
                

                $sql = "SELECT * FROM ((`patient_info` INNER JOIN `address_p` ON `address_p`.Info_id =`patient_info`.Info_id ) INNER JOIN `service` ON `patient_info`.Info_id = `service`.Info_id) INNER JOIN `history_drug` ON `patient_info`.Info_id=`history_drug`.Info_id 
                WHERE patient_info.Info_id='$i' ";
                $result = mysqli_query($con, $sql);

                $n=1;
                // เเสดงข้อมูลจากฐานข้อมูล
                while ($item = mysqli_fetch_assoc($result)) { ?>
<!-- 
                <button type="button" class="collapsible">บันทึกข้อมูล <?php //echo $n; ?> </button>
                <div class="content"> -->

        <!-- เเสดงข้อมูลจากฐานข้อมูล -->
        <div class="col-md-10">
                    <!-- <h3>
                        ข้อมูล <?php echo $item["Info_pre"]."".$item["Info_name"]." ".$item["Info_surename"]; ?>
                        
                    </h3> -->
        </div>
        <!-- Card -->
        
        <div class="card " style="width: 80rem;">

            <!-- Card image -->
            <div class="view view-cascade overlay">
                <img class="img-thumbnail" src="images/person.png" alt="Card image cap" height="60" width="200" >
              
            </div>
            
        <div class="card-header">
                ข้อมูลทั่วไป
            </div>
            <!-- Card content -->
            <div class="card-body card-body-cascade text-left">
                <!-- <h6 class="card-title">รหัส : <?php echo $item["Info_id"]; ?></h6> -->
                <!-- Title -->
                <h6 class="card-title">เลขประชาชน : <?php echo $item["se_idcard"]; ?></h6>

                <h6 class="card-title">คำนำหน้าชื่อ : <?php echo $item["Info_pre"]; ?></h6>
                <h6 class="card-title">ชื่อ : <?php echo $item["Info_name"]." ".$item["Info_surename"]; ?></h4>
                <!-- Subtitle -->
                <!-- <h6 class="card-title">นามสกุล : <?php echo $item["Info_surename"]; ?></h6> -->
                <h6 class="card-title">วันเกิด : <?php echo $item["Info_birthday"]; ?></h6>
                <h6 class="card-title">ศาสนา : <?php echo $item["Info_religion"];?></h6>
                <h6 class="card-title">เชื้อชาติ : <?php echo $item["Info_race"]; ?></h6>
                <h6 class="card-title">สัญชาติ : <?php echo $item["Info_national"]; ?></h6>
                <h6 class="card-title">เบอร์โทรศัพท์ : <?php echo $item["Info_cardnum"]; ?></h6>
                <h6 class="card-title">อาชีพ : <?php echo $item["Info_career"]; ?></h6>
                <h6 class="card-title">ชื่อผู้แจ้ง : <?php echo $item["Info_infoname"]; ?></h6>
                <h6 class="card-title">เกี่ยวข้องเป็น : <?php echo $item["Info_about"]; ?></h6>
                <h6 class="card-title">ชื่อผู้ปกครอง : <?php echo $item["Info_nameadult"]; ?></h6>
                <h6 class="card-title">สถานะ : <?php echo $item["Info_status"]; ?></h6>
            </div>
        </div>

        <div class="card card-cascade wider reverse" style="width: 80rem;">
        <div class="card-header">
                ข้อมูลที่อยู่
            </div>
            <div class="card-body card-body-cascade text-left">
                <h6 class="card-title">บ้านเลขที่ : <?php echo $item["ad_idhome"]; ?></h4>
                <h6 class="card-title">ซอย : <?php echo $item["ad_alley"]; ?></h4>
                <h6 class="card-title">ถนน : <?php echo $item["	ad_road"]; ?></h4>
                <h6 class="card-title">หมู่ที่ : <?php echo $item["ad_moo"]; ?></h4>
                <h6 class="card-title">ตำบล : <?php echo $item["ad_tumbol"]; ?></h4>
                <h6 class="card-title">อำเภอ : <?php echo $item["ad_amper"]; ?></h4>
                <h6 class="card-title">จังหวัด : <?php echo $item["ad_province"]; ?></h4>
                <h6 class="card-title">ที่เกิด : <?php echo $item["ad_atbirth"]; ?></h4>
                <h6 class="card-title">ที่อยู่ที่ติดต่อได้ : <?php echo $item["ad_contact"]; ?></h4>
            </div>
        </div>

        <div class="card card-cascade wider reverse" style="width:80rem;">
        <div class="card-header">
                ข้อมูลบริการ
            </div>
            <div class="card-body card-body-cascade text-left">
                <h6 class="card-title">เลขบัตรสิทธิ : <?php echo $item["se_idlicense"]; ?></h4>
                <h6 class="card-title">เลขทั่วไป : <?php echo $item["se_idpublic"]; ?></h4>
                <h6 class="card-title">เลขที่ภายใน : <?php echo $item["se_idhn"]; ?></h4>
                <h6 class="card-title">เลขที่บัตรครอบครัว : <?php echo $item["se_idfamily"]; ?></h4>
                <h6 class="card-title">เลขที่เอ็กซเรย์ : <?php echo $item["se_idXray"]; ?></h4>
                <h6 class="card-title">สิทธิการรักษา : <?php echo $item["	se_roft"]; ?></h4>
                <h6 class="card-title">ความดัน : <?php echo $item["se_pressure"]; ?>(mmhg) </h4>
                <h6 class="card-title">น้ำหนัก  : <?php echo $item["se_weight"]; ?>(kg.)</h4>
                <h6 class="card-title">ส่วนสูง  : <?php echo $item["se_height"]; ?>(cm.)</h4>
                <h6 class="card-title">รอบเอว  : <?php echo $item["se_waist"]; ?> (cm.)</h4>
                <h6 class="card-title">temp : <?php echo $item["se_temp"]; ?></h4>

                <h6 class="card-title">ชื่อยาที่แพ้ : <?php echo $item["hd_namedrug"]; ?></h4>
                <h6 class="card-title">โรคประจำตัวที่สำคัญ : <?php echo $item["hd_condis"]; ?></h4>
            </div>
         </div>
         
                <!-- Text -->
                


            </div>

        </div>
        </div>
        <!-- Card -->
        <!-- </div> -->
        <?php
               $n++; }
                ?>

    </div>
    </div>
</div>
</div>

<?php include 'assets/object/footer.php'?> 
<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
</script>
</body>


</html>

