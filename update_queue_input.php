<?php
session_start();
include 'assets/php/connect.php';
if(!isset($_SESSION['staff_id'])) header("location:index.php");
if(isset($_REQUEST['t']) ) {
    $i = $_REQUEST['t'];
}else{
    header("location:index_queue.php");
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
                        แก้ไขข้อมูลการจองคิว
                    </div>
                </div>
                <?php include 'assets/php/log.php'?>
            </div>
            <?php 
                $sql = "SELECT * FROM `queue` WHERE `queue_id`='$i' ";
                $load = $con->query($sql);
                $data = $load->fetch_assoc();

                
            ?>
           
            <form action="assets/php/update_queue.php" method="post" enctype="multipart/form-data">
                <div class="row my-4" style="padding: 50px">
                <div class="mb-3 col-lg-2">
                        <label for="p_detail" class="form-label">รหัส</label>
                        <input type="text" name="dates" disabled="disabled" value=<?php echo $data['queue_id'];?> required class="form-control">
                    </div>
                    <div class="mb-3 col-lg-4">
                        <label for="p_detail" class="form-label">วันที่จอง</label>
                        <input type="text" name="dates" placeholder="22/12/2020" value=<?php echo $data['queue_date'];?> required class="form-control">
                    </div>
                    <!--<div class="mb-3 col-lg-4">
                        <label for="p_detail" class="form-label">เวลาที่จอง</label>
                        <input type="text" name="times" placeholder="10:00-11:00" value=<?php /*echo $data['queue_time'];*/?> required class="form-control">
                    </div>-->
                    <div class="mb-3 col-lg-2">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">เวลาที่จอง</label>
                            <select class="form-control" id="exampleFormControlSelect2" value=<?php echo $data['queue_time'];?> name="times">
                            <option disabled="disabled" selected="selected">---เลือกเวลา---</option> 
                            <option value="09:00-10:30">09:00-10:30</option>
                            <option value="10:30-12:00">10:30-12:00</option>
                            <option value="13:00-14:30">13:00-14:30</option>
                            <option value="14:30-16:00">14:30-16:00</option>
                            <option value="17:00-18:30">17:00-18:30</option>
                            <option value="18:30-20:00">18:30-20:00</option>
                            
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3 col-lg-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">ประเภทการรักษา</label>
                            <select class="form-control" id="exampleFormControlSelect2" value=<?php echo $data['type_id'];?> name="type">
                            <!--<option value="T001">ประคบร้อน</option>
                            <option value="T002">นวดแผนไทย</option>-->
                            <option disabled="disabled" selected="selected">---เลือกประเภท---</option> 
                            <?php
                                $sql = "SELECT * FROM `type_service`";
                                $load = $con->query($sql);
                                while($data = $load->fetch_array()):
                                ?>
                                <option value="<?php echo $data['type_id'];?>"><?php echo $data['type_name'];?></option>
                                <?php
                                endwhile;
                                ?>   
                            </select>
                        </div>
                    </div>

                    </div>
               

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
