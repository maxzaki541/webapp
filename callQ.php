<?php
  session_start();
  include 'assets/php/connect.php';
  if(!isset($_SESSION['staff_id'])) header("location:index.php");



?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/console.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
   
    

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <title>ยินดีต้อนรับ</title>
</head>
<body>





<div class="wrapper">

    <!-- <?php include 'assets/object/sidebar2.php'?> -->

    <div id="content">
        <?php include 'assets/object/navBar.php'?>

    
        <div class="container my-4">
            <div class="row">
            <div class="col-md-10">
                    <h4>
                        เรียกคิว
                        
                    </h4>
                </div>

               
            <!-- <div class="search-box">
              <input type="text" id="t" placeholder="พิมพ์เพื่อค้นหา" autocomplete="off"> -->
            <div class="result">
                <div  id="demo">
                    <table id="example" class="table table-striped table-bordered table-hover table-responsive-sm" style="width:100%">
                        <thead align="center" class="table-primary">
                            <th>ลำดับที่</th>
                          <th>รหัสการจองคิว</th>
                          <th>ชื่อ</th>
                          <th>นามสกุล</th>
                          <th>วันที่จอง</th>
                          <th>เวลาที่จอง</th>
                          <th>ประเภทการรักษา</th>
                          <th>สถานะ</th>
                          
                          <th>การทำงาน</th>
                        </thead>
          
                        <tbody>
                        <!-- <div class="float-right">
                        <a class='btn btn-success' class="float-right" Onclick=selectDate()>เลือกวัน</a>
                    </div> -->
                    
                    <br>
                    
                    
                  
                    
                    
                        <div> 
                          <div class="container">
                            <div class="row hidden-md-up">
                          

                              <?php 

                              $array=[];

                            
                              
                                $sql = "SELECT queue_emp.eguest_id,queue_emp.namepub,queue_emp.lastnamepub,queue_emp.eguest_date,queue_emp.eguest_time,type_service.type_name,employees.emp_name,queue_emp.eguest_status FROM ((`queue_emp`
                                INNER JOIN type_service ON queue_emp.type_id = type_service.type_id)
                                INNER JOIN employees ON queue_emp.emp_id = employees.emp_id) where eguest_date='".date('Y-m-d')."' ";
                               
                            
                                    $load = $con->query($sql);
                                    $sum=0;
                                    while($data = $load->fetch_assoc()):
                                        $sum++;
                                        $a =[];
                                        array_push($a,$data['eguest_id']);
                                        array_push($a,$data['namepub']);
                                        array_push($a,$data['lastnamepub']);
                                        $date = explode("-",$data['eguest_date']);
                                        $dd = $date[2]."-".$date[1]."-".$date[0];
                                        array_push($a,$dd);
                                        array_push($a,$data['eguest_time']);
                                        array_push($a,$data['type_name']);
                                        array_push($a,$data['eguest_status']);

                                        $time = explode("-",$data['eguest_time']);
                                        $time2 = explode(":",$time[0]);
                                        $tt = $time2[0]+($time2[1]/100);
                                       

                                        array_push($a,$tt);
                                        array_push($array,$a);
                                    ?>
                                    
                              <?php
                            endwhile;



                            $sql2 = "SELECT queue.queue_id,queue.queue_date,queue.queue_time,queue.queue_status,type_service.type_name,member.f_name,member.l_name FROM ((`queue` 
                            INNER JOIN `type_service` ON queue.type_id=type_service.type_id) 
                            INNER JOIN `member` ON queue.mem_id=member.mem_id) where queue_date='".date('d-m-Y')."'";

                            $load2 = $con->query($sql2);
                            $n=1;
                            $su=0;
                            while($data2 = $load2->fetch_assoc()){
                                $su++;
                                $a2 =[];
                                        array_push($a2,$data2['queue_id']);

                                        array_push($a2,$data2['f_name']);
                                        array_push($a2,$data2['l_name']);

                
                                        array_push($a2,$data2['queue_date']);
                                        array_push($a2,$data2['queue_time']);
                                        array_push($a2,$data2['type_name']);
                                        array_push($a2,$data2['queue_status']);

                                        $time = explode("-",$data2['queue_time']);
                                        $time2 = explode(":",$time[0]);
                                        $tt = $time2[0]+($time2[1]/100);
                                       

                                        array_push($a2,$tt);

                                        array_push($array,$a2);
                            }

                            
                           

                            function mysort1 ($x, $y) {
                                return ($x[7] > $y[7]);
                             }
                             
                             
                             
                             usort ($array, 'mysort1');
//print_r($array);
                            for($i=0;$i<count($array);$i++){


                            
                            ?>
                            <tr>
                                <td><?php echo $n ;?></td>
                                <?php
                                
                                    for($j=0;$j<count($array[$i])-1;$j++){

                                        
                                        if($array[$i][$j] == "" && $j==6){
                                ?>
                                      

                                      <td><?php echo "<font color='blue' >รอเรียกคิว </font>" ;?></td>
                                      <?php
                                        }else{
                                            $t="a";
                                            if($array[$i][$j] == "กำลังรักษา" && $j==6){
                                                //echo $array[$i][$j];
                                                 $t="<font color='green' >";

                                            }else if($array[$i][$j] == "รักษาเสร็จแล้ว" && $j==6){
                                                $t= "<font color='red' >";
                                            }else{
                                                $t= "<font color='black' >";
                                            }

                                            echo $t;
                                            ?>
                                            
                                            <td><?php echo $t.$array[$i][$j]; ?></td>
                                            
                                            <?php
                                        echo "</font>";
                                        }

                                        }
                                      ?>
                                      
                                      <td><center>
                                      <?php
                                        if($array[$i][6] == "รักษาเสร็จแล้ว" ){
                                            
                                      ?><?php
                                    }
                                      else if($array[$i][6] != "กำลังรักษา"){
                                      ?>
                                      <a  class='btn btn-info' onClick=update(<?php echo "'".$array[$i][0]."'";?>)>
                                      <i class="fas fa-edit"> </i>เรียกคิว</a>
                                      <?php
                                        }
                                            if($array[$i][6] == "กำลังรักษา" ){
                                       ?>
                                       
                                      <a  class='btn btn-danger' onClick=success(<?php echo "'".$array[$i][0]."'";?>)>
                                      <i class="fas fa-check-square"> </i>เสร็จสิ้น</a>
                                      
                                      <?php
                              }
                                      ?>
                                      </td>

                                    </tr>

                                    <?php $n++;
                                    }
                                    ?>
                            </div>
                          </div>
                        </div>
                        </tbody>
                        <tfoot>
                            <tr align="center">
                            <td colspan="8">
                                รวม
                            </td>
                            <td >
                              <?php echo $sum+$su." รายการ"?>
                            </td>
                            </tr>
                            
                        </tfoot>
                    </table>
                   
                    </div>  <!-- demo -->
                  </div> <!-- result -->
                  </div>
                  

                </div>
              </div>
          </div>
      </div>
                      
      <?php include 'assets/object/footer.php'?> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>



<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        var inputVal = document.getElementById("t").value;
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search-queue-emp.php", {term: inputVal}).done(function(data){
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
            $.get("backend-all-queue-emp.php", {}).done(function(data){
                resultDropdown.html(data);
            });
        }
    });
    
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});




function remove(params) {
  var conf = confirm("ยืนยันการลบการจองคิวหรือไม่");
  if(conf == true){
     $.post("index_queue_emp.php", { t:params } ).done(function( data ){
        location.reload()
        })
  }
     
}


function a() {
                  
  window.location = "index_queue_emp.php?a=5"

}


function update(params) {
    alert('ยืนยัน '+params)
  window.location = "updateQ.php?t="+params 
}


function success(params) {
    alert('ยืนยัน '+ params)
  window.location = "sucQ.php?t="+params 
}
</script>
<?php
  
 
  if(isset($_REQUEST['t']) ) {
      $i = $_REQUEST['t'];
          $sql = "DELETE FROM `queue_emp` WHERE eguest_id = '$i'";
          if($con->query($sql)){
              echo "<script>alert('Delete Successful')</script>";
          }
      
    }
  
    
?>

<script>
    $(document).ready(function() {
        //$('#example').DataTable();
    });
    </script>
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