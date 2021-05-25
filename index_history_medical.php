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

<body >





<div class="wrapper">

    <!-- <?php include 'assets/object/sidebar2.php'?> -->

    <div id="content">
        <?php include 'assets/object/navBar.php'?>

        
        <div class="container my-4">
            <div class="row">
            <div class="col-md-10">
                    <h4>
                        ประวัติการรักษาการรักษา
                        
                    </h4>
                </div>
            <div class="search-box">
              <input type="text" id="t" placeholder="พิมพ์เพื่อค้นหา" autocomplete="off">
            <div class="result">
           
           


            <div  id="demo">
     
                <div class="float-right">
                <a  class='btn btn-Primary' class="float-right" href=formdefence.php>ดาวน์โหลดแบบฟอร์มบันทึกการรักษา</a>
                <!-- <a class='btn btn-success' class="float-right" href=add_history_medical.php><i class="fas fa-plus"></i> เพิ่มใหม่</a> -->
            </div>
            <br>
            <br>
            
            <table id="example" class="table table-striped table-bordered table-hover table-responsive-sm" style="width:100%" >
                <thead  align="center" class="table-primary">
                
                  <!-- <th>รหัสประวัติการรักษา</th> -->
                  
                  
                  <th>ลำดับ</th>
                  <th>ชื่อ</th>
                  <th>นามสกุล</th>
                  <!-- <th>ประเภทการรักษา</th> 
                  <th>อาการวินิจฉัย</th>
                  <th>วันที่มา</th>
                  <th>เวลา</th> -->
                  
                  <th>การทำงาน</th>
                </thead>


                <tbody>

                <div> 
                  <div class="container">
                    <div class="row hidden-md-up">
                  

                      <?php
                        $perpage = 7;
                        if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                        } else {
                        $page = 1;
                        }
                        
                        $start = ($page - 1) * $perpage; 
                        
                      // $sql = "SELECT a.de_id,patient_info.Info_name,type_service.type_name FROM (SELECT * FROM `defence` LIMIT $start,$perpage) a JOIN `patient_info` on a.Info_id = patient_info.Info_id JOIN type_service ON a.type_id=type_service.type_id ORDER BY de_id";
                            /*$sql = "SELECT defence.de_id,patient_info.Info_name,type_service.type_name,diagnosis.di_NameSymptom,diagnosis.di_date,diagnosis.di_time,medic.medic_name FROM (((( `defence`
                            INNER JOIN `patient_info` ON defence.Info_id = patient_info.Info_id)
                            INNER JOIN `medic` ON diagnosis.medic_id = medic.medic_id)  
                            INNER JOIN `diagnosis` ON defence.di_id = diagnosis.di_id) 
                            INNER JOIN `type_service` ON defence.type_id = type_service.type_id) ORDER BY de_id ASC limit {$start} , {$perpage}";*/
                            $sql = "SELECT * FROM ((( `diagnosis` INNER JOIN `patient_info` ON diagnosis.Info_id = patient_info.Info_id) INNER JOIN `defence` ON diagnosis.de_id = defence.de_id) JOIN type_service ON type_service.type_id = defence.type_id)
                            INNER JOIN medic ON diagnosis.medic_id = medic.medic_id Group by Info_name,Info_surename ";
                            $load = $con->query($sql);
                            $n=1;
                            $sum=0;
                            while($data = $load->fetch_assoc()):
                              $sum++;
                            ?>
                          
                            <tr>
                              <!-- <td><?php echo $data['de_id']; ?></td> -->
                              
                              
                              <td><?php echo $n; ?></td> 
                              <td><?php echo $data['Info_name']; ?></td>
                              <td><?php echo $data['Info_surename']; ?></td> 
                              <!-- <td><?php echo $data['type_name']; ?></td> 
                              <td><?php echo $data['di_NameSymptom']; ?></td>
                              <td><?php echo $data['di_date']; ?></td>
                              <td><?php echo $data['di_time']; ?></td> -->
                              
                              <td><center>
                              <a  class='btn btn-success' onClick=add(<?php echo "'".$data['de_id']."'";?>)>
                              <i class="fas fa-plus"> </i></a>
                              <a  class='btn btn-info' onClick=watch(<?php echo "'".$data['Info_name']."'";?>,<?php echo "'".$data['Info_surename']."'";?>)>
                              <i class="fas fa-eye"> </i></a>
                              <!-- <a  class='btn btn-info' href="detail_history_medical.php?de_id=<?php echo $data["de_id"]; ?>">
                              <i class="fas fa-eye"> </i></a> -->
                              <!-- <a  class='btn btn-warning' onClick=update(<?php echo "'".$data['de_id']."'";?>)>
                              <i class="fas fa-edit"> </i></a> -->
                              <a  class='btn btn-danger' onClick=remove(<?php echo "'".$data['Info_id']."'";?>)>
                              <i class="fas fa-trash"></i></a></td>
                            </tr>
                      <?php
                      $n++;
                    endwhile;
                    
                    ?>

                    </div>
                  </div>
                </div>
                </tbody>
                <tfoot>
                    <tr align="center">
                    <td colspan="3"  >
                        รวม
                    </td>
                    <td >
                      <?php echo $sum." รายการ"?>
                    </td>
                    </tr>
                    
                </tfoot>
            </table>
            <?php
            $sql2 = "select * from defence ";
            $query2 = mysqli_query($con, $sql2);
            $total_record = mysqli_num_rows($query2);
            $total_page = ceil($total_record / $perpage);
            ?>

            </div>  <!-- demo -->




                  </div> <!-- result -->
                  </div>
                  <nav  >
                    <ul class="pagination">
                    <li>
                    <a class="page-link"  href="index_history_medical.php?page=1" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    </a>
                    </li>
                    <?php for($i=1;$i<=$total_page;$i++){ ?>
                    <li><a class="page-link" href="index_history_medical.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php } ?>
                    <li>
                    <a class="page-link" href="index_history_medical.php?page=<?php echo $total_page;?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li>
                    </ul>
                  </nav>

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
       
        if(inputVal.length != 0){
        
            $.get("backend-search-history-medical.php", {term: inputVal}).done(function(data){
               //alert(inputVal.length)
               console.log(data)
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
            $.get("backend-all-history-medical.php", {}).done(function(data){
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
  var conf = confirm("ยืนยันการลบข้อมูลการรักษาหรือไม่");
  if(conf == true){
     $.post("index_history_medical.php", { t:params } ).done(function( data ){
        location.reload()
        })
  }
     
}
function update(params) {
  window.location.href = "update_history_medical_input.php?t="+params 
}
function watch(params,params2) {
  //alert(params+params2)
  window.location.href = "detail_history_medical.php?t="+params+"&s="+params2
}
function add(params) {
  window.location.href = "add_history_2.php?t="+params 
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
          $sql = "DELETE FROM `defence` WHERE Info_id = '$i'";
          $sql2 = "DELETE FROM `diagnosis` WHERE Info_id = '$i'";
          
          if($con->query($sql)){
    
          }else{
              $boolean = false;
          }
          if($con->query($sql2)){
              
              
          }else{
              $boolean = false;
          }
          
         
          if($boolean){
              echo "<script>alert('Delete Successful')</script>";
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