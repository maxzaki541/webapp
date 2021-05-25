<?php
  session_start();
  include 'assets/php/connect.php';
  if(!isset($_SESSION['staff_id'])) header("location:index.php");
  if(isset($_REQUEST['t']) ) {
    $i = $_REQUEST['t'];
}else{
    header("location:index_history_medical.php");
}

if(isset($_REQUEST['s']) ) {
    $s = $_REQUEST['s'];
}else{
    header("location:index_history_medical.php");
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
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

    <!-- การนำเข้า Navbar -->
    <div id="content">
        <?php include 'assets/object/navBar.php'?>

    <div class="container my-5">
    <div class="col-md-10">
    
                    <h4>
                        ข้อมูลการรักษา <?php echo $item["Info_name"]." ".$item["Info_surename"]; ?>
                        
                    </h4>
                </div>
        <?php

                //นำเข้าไฟล์ การเชื่อมต่อฐานข้อมูล
                

                $sql = "SELECT * FROM (((( `diagnosis` INNER JOIN `patient_info` ON diagnosis.Info_id = patient_info.Info_id) 
                INNER JOIN `defence` ON diagnosis.de_id = defence.de_id) JOIN type_service ON type_service.type_id = defence.type_id)
                INNER JOIN medic ON diagnosis.medic_id = medic.medic_id)JOIN nexttime ON nexttime.de_id = defence.de_id
                WHERE patient_info.Info_name='$i' and patient_info.Info_surename='$s'";
                $result = $con->query($sql);
                $n=1;

                

                // เเสดงข้อมูลจากฐานข้อมูล
                
                while ($item = mysqli_fetch_assoc($result)) { 
                ?>



                <button type="button" class="collapsible">ข้อมูลการรักษาครั้งที่ <?php echo $n; ?> เมื่อวันที่ <?php echo $item["di_date"]; ?></button>
                <div class="content">
                <!-- <a class='btn btn-info'  href='#' id='download_link' onClick='ExcelReport();'>Download</a> -->
                
                

        <!-- เเสดงข้อมูลจากฐานข้อมูล -->
        <table style="width:100% "  id="tblCustomers" class="table table-striped table-bordered table-hover table-responsive-sm">
        <!-- Card -->
        <div class="card card-cascade wider reverse" style="width:50%">

            <!-- Card image -->
            <div class="view view-cascade overlay">
                <!-- <img class="img-thumbnail" src="images/logo1.png" alt="Card image cap" height="100" width="250">
                <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                </a> -->
            </div>
            
            <!-- Card content -->
            
            
            
            <tr><th><h6 >รหัส : </th><td><?php echo $item["de_id"]; ?></h6></td></tr>
                <!-- Title -->
                <tr><th><h6 >มาเมื่อวันที่-เวลา : </th><td><?php echo $item["di_date"]." เวลา : ".$item["di_time"]; ?></h6></td></tr>
                <tr><th><h6 >ชื่อ : </th><td><?php echo $item["Info_name"]; ?></h6></td></tr>
                <!-- Subtitle -->
                <tr><th><h6 >นามสกุล : </th><td><?php echo $item["Info_surename"]; ?></h6></td></tr>
                <tr><th><h6 >ประเภทการรักษา : </th><td><?php echo $item["type_name"]; ?></h6></td></tr>
                <tr><th><h6 >การรักษาอื่นๆ : </th><td><?php echo $item["other_de"]; ?></h6></td></tr>
                <tr><th> <h6>วินิจฉัยอาการ : </th><td><?php echo $item["di_NameSymptom"]; ?></h6></td></tr>
                <tr><th><h6 >แพทย์ที่รักษา: </th><td><?php echo $item["medic_name"]." ".$item["medic_surname"]; ?></h6></td></tr>
                <tr><th><h6 >วัน-เวลานัดถัดไป: </th><td><?php echo "วันที่ : ".$item["nt_date"]." เวลา : ".$item["nt_time"]; ?></h6></td></tr>

                <tr><th><h6 >การทำงาน: <h6 ></th>
                <th><center><a  class='btn btn-warning'  onClick=update(<?php echo "'".$item['de_id']."'";?>)>
                                      <i class="fas fa-edit"> </i>แก้ไข</a></h6>
                                      <a class='btn btn-danger' onClick=remove(<?php echo "'".$item['de_id']."'";?>)>
                                      <i class="fas fa-trash"> </i>ลบ</a></h6>
                                      <a id="btnExport" class='btn btn-info'  onClick=ExcelReport(<?php echo "'".$item['de_id']."'";?>)>
                                      <i class="fa fa-file-pdf"> </i>Export</a></h6></center></th>
                </tr> 
               
               
            </div>
        </div>
        
        </table>

        </div>
       
        <!-- Card -->
        <!-- <a class='btn btn-info'  href='#' id='download_link' onClick='ExcelReport();'>Download</a>  -->
        <?php
        $n++;
                }
                ?>

    </div>

    </div>
</div>
</div>
<?php include 'assets/object/footer.php'?> 


<!-- <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"  ></script>
<script src="https://unpkg.com/file-saver@1.3.3/FileSaver.js"  ></script>
<script>
function ExcelReport(params)//function สำหรับสร้าง ไฟล์ excel จากตาราง
    {
        alert(params);
        var sheet_name="excel_sheet";/* กำหหนดชื่อ sheet ให้กับ excel โดยต้องไม่เกิน 31 ตัวอักษร */
        var elt = document.getElementById('myTable');/*กำหนดสร้างไฟล์ excel จาก table element ที่มี id ชื่อว่า myTable*/

        /*------สร้างไฟล์ excel------*/
        var wb = XLSX.utils.table_to_book(elt, {sheet: sheet_name});
        XLSX.writeFile(wb,'report.xlsx');//Download ไฟล์ excel จากตาราง html โดยใช้ชื่อว่า report.xlsx
    }   
</script> -->


<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script type="text/javascript">
        $("body").on("click", "#btnExport", function  () {
            html2canvas($('#tblCustomers')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{     
                                    
                            image: data,
                            width: 500,
                            height:250
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("report.pdf");
                }
            });
        });
    </script> -->



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
<script>
function update(params) {
    //alert(params);
  window.location.href = "update_history_medical_input.php?t="+params 
}
function ExcelReport(params) {
    //alert(params);
  window.location.href = "exportpdf.php?t="+params 
}

function remove(params) {
    alert(params);
  var conf = confirm("ยืนยันการลบข้อมูลการรักษาหรือไม่");
  if(conf == true){
     $.post("detail_history_medical.php", { t:params } ).done(function( data ){
        location.reload()
        })
  }
     
}
</script>
<?php
  
 
  if(isset($_REQUEST['t']) ) {
      $i = $_REQUEST['t'];


      $de = "select * from defence";
      $q = $con->query($de);
      $a = [];
      while($data = $q->fetch_assoc()){
        
        array_push($a,$data['de_id']);
      }

      $boolean= true;

      foreach($a as $value){
        $sql3 = "DELETE  FROM `nexttime`WHERE de_id ='$a'";
        if($con->query($sql3)){
          
        }else{
            $boolean = false;
        }
      }
          $sql = "DELETE FROM `defence` WHERE de_id = '$i'";
          $sql2 = "DELETE FROM `diagnosis` WHERE de_id = '$i'";
          
          if($con->query($sql)){
    
          }else{
              $boolean = false;
          }
          if($con->query($sql2)){
              
              
          }else{
              $boolean = false;
          }
          
         
          if($boolean){
              // echo "<script>alert('Delete Successful')</script>";
              //echo "('Delete Successful')";
          }
      
    }
    
?>
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


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
  <script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>
