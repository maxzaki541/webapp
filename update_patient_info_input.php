<?php
session_start();
include 'assets/php/connect.php';
if(!isset($_SESSION['staff_id'])) header("location:index.php");
if(isset($_REQUEST['t']) ) {
    $i = $_REQUEST['t'];
}else{
    header("location:index_patient_info.php");
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/console.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <title>ยินดีต้อนรับ</title>
</head>
<body>


<div class="wrapper">
    <!-- Sidebar -->
    <!-- <?php include 'assets/object/sidebar2.php'?> -->
    <!-- Page Content -->
    <div id="content">
        <?php include 'assets/object/navBar.php'?>

        <div class="container my-4">
            <div class="row">
                <div class="mb-3 col-lg-12">
                    <div class="header">
                        แก้ไขข้อมูลผู้ใช้งานระบบ
                    </div>
                </div>
                <?php include 'assets/php/log.php'?>
            </div>
            <?php 
                $sql = "SELECT * FROM `patient_info` WHERE `Info_id`='$i' ";
                $load = $con->query($sql);
                $data = $load->fetch_assoc();
                
                
            ?>
           
             <?php 
                        $sql3 = "SELECT * FROM `service` WHERE `Info_id`='$i' ";
                        $load3 = $con->query($sql3);
                        $data3 = $load3->fetch_assoc();

                        
                       
                         //echo "dfdsgggsdgsdgdsgsdgsdgdsg".$sql2;
                
            ?>
            
            <form action="assets/php/update_patient_info.php" method="post" enctype="multipart/form-data">
                <div class="row my-4" style="padding: 50px">
                    <div class="mb-3 col-lg-2">
                        <label for="p_detail" class="form-label">รหัสผู้ใช้งาน</label>
                        <input type="text" name="1" disabled="disabled" value=<?php echo $data['Info_id'];?> required class="form-control">
                    </div>
                    <div class="mb-3 col-lg-5">
                        <label for="p_detail" class="form-label">เลขประจำตัวประชาชน</label>
                        <input type="text" name="0" placeholder="เลขประจำตัวประชาชน"   value=<?php echo $data3['se_idcard'];?>  required class="form-control">
                    </div>
                    <div class="mb-3 col-lg-5">
                        <label for="p_detail" class="form-label">ชื่อ</label>
                        <input type="text" name="2" placeholder="example" value=<?php echo $data['Info_name'];?> required class="form-control">
                    </div>
                    <div class="mb-3 col-lg-5">
                        <label for="p_detail" class="form-label">นามสกุล</label>
                        <input type="text" name="3" placeholder="example" value=<?php echo $data['Info_surename'];?> required class="form-control">
                    </div>

                    <div class="mb-3 col-lg-2">
                        <label for="p_price" class="form-label">อายุ</label>
                        <input type="number" min=1 max=99 name="4" value=<?php echo $data['Info_age'];?> placeholder="30" required class="form-control">
                    </div>
                    <div class="mb-3 col-lg-5">
                        <label for="stock_in" class="form-label">เบอร์โทรศัพท์</label>
                        <input type="tel" name="5" placeholder="0888888888" value=<?php echo $data['Info_cardnum'];?> pattern="0[0-9]{9}" required class="form-control">
                    </div>
                    
                   <!-- <div class="mb-3 col-lg-5">
                        <label for="stock_in" class="form-label">คำนำหน้า</label>
                        <input type="text" name="6" placeholder="นาย" value=<?php echo $data['Info_pre'];?> required class="form-control">
                    </div>-->

                    <div class="mb-3 col-lg-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="form-label">คำนำหน้า</label>
                            <select class="form-control" id="exampleFormControlSelect1" value=<?php echo $data['Info_pre'];?> name="6">
                            <option  value="----เลือกคำนำหน้า----">----เลือกคำนำหน้า----</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>

                            </select>
                        </div>
                    </div>

                    <!-- <div class="mb-3 col-lg-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">เพศ</label>
                            <select class="form-control" id="exampleFormControlSelect1" value=<?php echo $data['Info_sex'];?> name="7">
                            <option value="ชาย">ชาย</option>
                            <option value="หญิง">หญิง</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="mb-3 col-lg-3">
                    <label for="stock_in" class="form-label">เพศ</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="7" id="exampleRadios1" value="ชาย" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            ชาย
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="7" id="exampleRadios2" value="หญิง">
                        <label class="form-check-label" for="exampleRadios2">
                            หญิง
                        </label>
                    </div>
                    </div>

                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">อาชีพ</label>
                        <input type="text" name="8" placeholder="รับจ้าง" value=<?php echo $data['Info_career'];?> required class="form-control">
                    </div>

                    <div class="mb-3 col-lg-3">
                        <label for="stock_in" class="form-label">วันเกิด</label>
                        <input type="date" name="9" placeholder="22/07/1998" value=<?php echo $data['Info_birthday'];?> required class="form-control">
                    </div>

                    <!--<div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">ศาสนา</label>
                        <input type="text" name="10" placeholder="พุทธ" value=<?php echo $data['Info_religion'];?> required class="form-control">
                    </div>-->

                    <div class="mb-3 col-lg-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">ศาสนา</label>
                            <select class="form-control" id="exampleFormControlSelect1" value=<?php echo $data['Info_religion'];?> name="10">
                            <option  value="------เลือกศาสนา------">------เลือกศาสนา------</option>
                            <option value="พุทธ">พุทธ</option>
                            <option value="คริสต์">คริสต์</option>
                            <option value="อิสลาม">อิสลาม</option>
                            <option value="ฮินดู">ฮินดู</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">เชื้อชาติ</label>
                        <input type="text" name="11" placeholder="ไทย" value=<?php echo $data['Info_race'];?> required class="form-control">
                    </div>

                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">สัญชาติ</label>
                        <input type="text" name="12" placeholder="ไทย" value=<?php echo $data['Info_national'];?> required class="form-control">
                    </div>

                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">ชื่อผู้เเจ้ง</label>
                        <input type="text" name="13" placeholder="ตัวอย่าง" value=<?php echo $data['Info_infoname'];?> required class="form-control">
                    </div>

                    <!--<div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">เกี่ยวข้องเป็น</label>
                        <input type="text" name="14" placeholder="บิดา" value=<?php echo $data['Info_about'];?> required class="form-control">
                    </div>-->

                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">ชื่อผู้ปกครอง</label>
                        <input type="text" name="15" placeholder="นายมะเขือ" value=<?php echo $data['Info_nameadult'];?> required class="form-control">
                    </div>
                    
                    <div class="mb-3 col-lg-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">เกี่ยวข้องเป็น</label>
                            <select class="form-control" id="exampleFormControlSelect1" value=<?php echo $data['Info_about'];?> name="14">
                            <option value="บิดา">บิดา</option>
                            <option value="มารดา">มารดา</option>
                            </select>
                        </div>
                    </div>
                    

                    <div class="mb-3 col-lg-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">สถานะ</label>
                            <select class="form-control" id="exampleFormControlSelect2" value=<?php echo $data['Info_status'];?> name="16">
                            <option value="------เลือกสถานะ------">------เลือกสถานะ------</option>
                            <option value="โสด">โสด</option>
                            <option value="สมรส">สมรส</option>
                            <option value="อย่าร้าง">อย่าร้าง</option>
                            <option value="หม้าย">หม้าย</option>
                            <option value="สมณะ">สมณะ</option>
                            </select>
                        </div>
                    </div>

                    <?php 
                        $sql2 = "SELECT * FROM `address_p` WHERE `Info_id`='$i' ";
                        $load2 = $con->query($sql2);
                        $data2 = $load2->fetch_assoc();

                        
                       
                         //echo "dfdsgggsdgsdgdsgsdgsdgdsg".$sql2;
                
                    ?>

                    
                   
                        <input type="hidden" name="17" value=<?php echo $data2['ad_id'];?>  placeholder="ตัวอย่าง"  required class="form-control">
                    

                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">เลขที่บ้าน</label>
                        <input type="text" name="18"  placeholder="เลขที่บ้าน" value=<?php echo $data2['ad_idhome'];?> required class="form-control">
                    </div>

                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">ซอย</label>
                        <input type="text" name="19" value=<?php echo $data2['ad_alley'];?>  required class="form-control">
                    </div>

                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">ถนน</label>
                        <input type="text" name="20" value=<?php echo $data2['ad_road'];?> placeholder="ถนน" required  class="form-control">
                    </div>

                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">หมู่ที่</label>
                        <input type="text" name="21" value=<?php echo $data2['ad_moo'];?> placeholder="หมู่ที่" required class="form-control">
                    </div>

                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">ตำบล</label>
                        <input type="text" name="22" value=<?php echo $data2['ad_tumbol'];?> placeholder="ตำบล" required class="form-control">
                    </div>

                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">อำเภอ</label>
                        <input type="text" name="23" value=<?php echo $data2['ad_amper'];?> placeholder="อำเภอ" required class="form-control">
                    </div>

                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">จังหวัด</label>
                        <input type="text" name="24" value=<?php echo $data2['ad_province'];?> placeholder="จังหวัด" required class="form-control">
                    </div>

                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">ที่เกิด</label>
                        <input type="text" name="25" value=<?php echo $data2['ad_atbirth'];?> placeholder="ที่เกิด" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="stock_in"  >ที่อยู่สามารถติดต่อได้</label>
                        <textarea class="form-control" value=<?php echo $data2['ad_contact'];?> rows="6" cols="40" name="26" placeholder="ที่อยู่สามารถติดต่อได้"  class="form-control"></textarea>
                    </div>

                    <input type="hidden"  name="27"  value=<?php echo $data2['Info_id'];?> placeholder="รหัสข้อมูลผู้รักษา"  class="form-control">



                    <?php 
                        $sql3 = "SELECT * FROM `service` WHERE `Info_id`='$i' ";
                        $load3 = $con->query($sql3);
                        $data3 = $load3->fetch_assoc();

                        
                       
                         //echo "dfdsgggsdgsdgdsgsdgsdgdsg".$sql2;
                
                    ?>
                    <input type="hidden" name="28" value=<?php echo $data3['se_id'];?>placeholder="idser" pattern="SE[0-9]{4}"required class="form-control">
                    

                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">เลขบัตรสิทธิ</label>
                        <input type="text" name="29" placeholder="เลขบัตรสิทธิ" value=<?php echo $data3['se_idlicense'];?>  class="form-control">
                    </div>

                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">เลขทั่วไป</label>
                        <input type="text" name="30" placeholder="เลขทั่วไป" value=<?php echo $data3['se_idpublic'];?>  class="form-control">
                    </div>

                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">เลขที่ภายใน</label>
                        <input type="text" name="31" placeholder="เลขที่ภายใน" value=<?php echo $data3['se_idhn'];?>  class="form-control">
                    </div>

                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">เลขที่บัตรครอบครัว</label>
                        <input type="text" name="32" placeholder="เลขที่บัตรครอบครัว" value=<?php echo $data3['se_idfamily'];?>  class="form-control">
                    </div>

                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">เลขที่เอ็กซเรย์</label>
                        <input type="text" name="33" placeholder="เลขที่เอ็กซเรย์" value=<?php echo $data3['se_idXray'];?>  class="form-control">
                    </div>

                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">สิทธิการรักษา</label>
                        <input type="text" name="34" placeholder="สิทธิการรักษา" value=<?php echo $data3['se_roft'];?> require class="form-control">
                    </div>

                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">ความดัน (mmhg)</label>
                        <input type="text" name="35" placeholder="ความดัน" value=<?php echo $data3['se_pressure'];?>  class="form-control">
                    </div>

                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">น้ำหนัก (kg.)</label>
                        <input type="text" name="36" placeholder="น้ำหนัก" value=<?php echo $data3['se_weight'];?>  class="form-control">
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">ส่วนสูง (cm.)</label>
                        <input type="text" name="37" placeholder="ส่วนสูง" value=<?php echo $data3['se_height'];?>  class="form-control">
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">รอบเอว (cm.)</label>
                        <input type="text" name="38" placeholder="รอบเอว" value=<?php echo $data3['se_waist'];?>  class="form-control">
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">temp</label>
                        <input type="text" name="39" placeholder="temp" value=<?php echo $data3['se_temp'];?>  class="form-control">
                    </div>

                    <?php 
                        $sql4 = "SELECT * FROM `history_drug` WHERE `Info_id`='$i' ";
                        $load4 = $con->query($sql4);
                        $data4 = $load4->fetch_assoc();

                        
                       
                         //echo "dfdsgggsdgsdgdsgsdgsdgdsg".$sql2;
                
                    ?>

                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">ชื่อยาที่แพ้</label>
                        <input type="text" name="42" placeholder="ชื่อยาที่แพ้" value=<?php echo $data4['hd_namedrug'];?>  class="form-control">
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="stock_in" class="form-label">โรคประจำตัวที่สำคัญ</label>
                        <input type="text" name="45" placeholder="โรคประจำตัวที่สำคัญ" value=<?php echo $data4['hd_condis'];?>  class="form-control">
                    </div>
                    
                        <input type="hidden" name="40" value="<?php echo $_SESSION['id'];?>" placeholder="รหัสเจ้าหน้าที่" required class="form-control">
                    
                    
                        <input type="hidden" name="41" placeholder="รหัสข้อมูลผู้รักษา" required class="form-control">

                    <input type="hidden" name="id" value=<?php echo $i;?> required class="form-control">
                    
                    <div class="mb-3 col-lg-12">
                        <button class="btn btn-primary" style="float:right">บันทึกข้อมูล</button>
                    </div>
                </div>
            </form>
            
        </div>


    </div>
</div>
<?php include 'assets/object/footer.php'?> 
<!-- script -->
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS --><!-- Bootstrap JS -->
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {

        

        $('#sidebarCollapse').on('click', function () {
            // open or close navbar
            $('#sidebar').toggleClass('active');
            // close dropdowns
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });

        $('#a').on('click', function () {
            window.location  = "index_member.php"
        })
        $('#b').on('click', function () {})
        $('#c').on('click', function () {})
        $('#d').on('click', function () {})
        $('#e').on('click', function () {})
        $('#f').on('click', function () {})

    });
</script>
</body>
</html>
