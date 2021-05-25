<?php
session_start();
include 'assets/php/connect.php';

if(!isset($_SESSION['staff_id'])) header("location:index.php");
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/console.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <title>ยินดีต้อนรับ</title>
</head>
<body>


<div class="wrapper">
    <!-- Sidebar -->
    <?php include 'assets/object/sidebar2.php'?>
    <!-- Page Content -->
    <div id="content">
        <?php include 'assets/object/navbar2.php'?>

        <div class="container my-4">
            <div class="row">
                <div class="mb-3 col-lg-12">
                    <div class="header">
                        เพิ่มข้อมูลวินิจฉัย
                    </div>
                </div>
                <?php include 'assets/php/log.php'?>
            </div>
            <?php 
                
                $row = 1;
                $id = "";
                do{

                    
                    $id = "DI";
                    for($i=0;$i<4;$i++){
                        $id .= rand(0,9);
                    }
                    $sql1 = "SELECT * FROM `diagnosis` Where `di_id`=$id";
                    $load1 = $con->query($sql1);
                    $row = mysqli_num_rows($load1);

                }while($row != 0);
                //$sql1 = mysqli_result(mysqli_query($con,"SELECT MAX(substr(`di_id`,-3))+1 as MaxID from `diagnosis`"),0,"MaxID");
                
                
            ?>
            
            <form action="assets/php/add_diag.php" method="post" enctype="multipart/form-data">
                <div class="row my-4" style="padding: 50px">
                    
                        
                    <input type="hidden" name="id" value="<?php echo $id; ?>" pattern="DI[0-9]{4}" required class="form-control">

                    <div class="mb-3 col-lg-3">
                        <label for="stock_in" class="form-label">วัน</label>
                        <input type="date" name="date" placeholder="22/12/2020" required class="form-control">
                    </div> 
                    <div class="mb-3 col-lg-3">
                        <label for="p_detail" class="form-label">เวลา</label>
                        <input type="time" name="time" placeholder="example" required class="form-control">
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label for="p_detail" class="form-label">ชื่อที่วินิจฉัย</label>
                        <input type="text" name="name" placeholder="example" required class="form-control">
                    </div>
                    <!--<div class="mb-3 col-lg-6">
                        <label for="p_detail" class="form-label">รหัสผู้รักษา</label>
                        <input type="text" name="infoname" placeholder="example" required class="form-control">
                    </div>-->

                    <div class="mb-3 col-lg-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">ผู้รักษา</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="infoname">
                            <?php
                                $sql = "SELECT * FROM `patient_info`";
                                $load = $con->query($sql);
                                while($data = $load->fetch_assoc()):
                                ?>
                                <option value="<?php echo $data['Info_id'];?>"><?php echo $data['Info_name'];?></option>
                                <?php
                                endwhile;
                                ?>   
                            </select>
                        </div>
                    </div>
                    <!--<div class="mb-3 col-lg-6">
                        <label for="p_detail" class="form-label">รหัสแพทย์</label>
                        <input type="text" name="namemed" placeholder="example" required class="form-control">
                    </div>-->

                    <div class="mb-3 col-lg-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">แพทย์</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="namemed">
                            <?php
                                $sql = "SELECT * FROM `medic`";
                                $load = $con->query($sql);
                                while($data = $load->fetch_assoc()):

                                ?>
                                <option value="<?php echo $data['medic_id'];?>"><?php echo $data['medic_name'];?></option>

                                <?php
                                endwhile;
                                ?>   
                            </select>
                        </div>
                    </div>

                   

                    <div class="mb-3 col-lg-12">
                        <button class="btn btn-success" style="float:right">บันทึกข้อมูล</button>
                    </div>
                </div>
            </form>
        </div>


    </div>
</div>

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

    });
</script>
</body>
</html>
