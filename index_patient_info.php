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
    <style>
    /* table {
      border-collapse: collapse;
      border-spacing: 0;
      border: 1px solid #ddd;
    }

    th, td {
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2} */
    </style>
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
                        ทะเบียนผู้เข้ารับบริการ
                        
                    </h4>
                </div>
            <div class="search-box">
              <input type="text" id="t" placeholder="พิมพ์เพื่อค้นหา" autocomplete="off">
            <div class="result">
            <div class="float-right">
                <a class='btn btn-success' class="float-right" href=add_patient_info.php><i class="fas fa-plus"></i>เพิ่มข้อมูล</a>
            </div>
                <div  id="demo">
                
                    <table id="example" class="table table-striped table-bordered table-hover table-responsive-sm" style="width:100%">
                    
                        <thead class="table-primary" align="center">
                          <th><center>รหัสHn.</th>
                          <th><center>คำนำหน้า</th>
                          <th><center>ชื่อ</th>
                          <th><center>นามสกุล</th>
                          <th><center>อายุ</th>
                          <th><center>เบอร์โทรศัพท์</th>
                          
                          <th><center>อาชีพ</th>
                          <!-- <th><center>ชื่อผู้เเจ้ง</th> -->
                          <th><center>เกี่ยวข้องเป็น</th>
                          <th><center>ชื่อผู้ปกครอง</th>
                          <th><center>สถานะ</th>
                          <th><center>การทำงาน</th>
                        </thead>
                        
                        <tbody>
                        
                       
                        <div> 
                          <div class="container">
                            <div class="row hidden-md-up">
                       

                              <?php 
                              $perpage = 5;
                              if (isset($_GET['page'])) {
                              $page = $_GET['page'];
                              } else {
                              $page = 1;
                              }
                              
                              $start = ($page - 1) * $perpage;
                              
                             // $sql = "SELECT * FROM `patient_info` order by Info_name limit {$start} , {$perpage} ";
                             $sql ="SELECT * FROM ((`patient_info` INNER JOIN `address_p` ON `address_p`.Info_id =`patient_info`.Info_id ) INNER JOIN `service` ON `patient_info`.Info_id = `service`.Info_id) 
                             INNER JOIN `history_drug` ON `patient_info`.Info_id=`history_drug`.Info_id Group by Info_name,Info_surename";
                                    $load = $con->query($sql);
                                    $per_page = 2;   // Per Page
                                    $sum=0;
                                    while($data = $load->fetch_assoc()):
                                      $sum++;
                                    ?>
                                    <tr>
                                    
                                      <td><?php echo $data['Info_id']; ?></td>
                                      <td><?php echo $data['Info_pre']; ?></td>
                                      <td><?php echo $data['Info_name']; ?></td>
                                      <td><?php echo $data['Info_surename']; ?></td>
                                      <td><?php echo $data['Info_age']; ?></td>
                                      <td><?php echo $data['Info_cardnum']; ?></td>                                    
                                      <!--<td><?php echo $data['Info_sex']; ?></td>-->
                                      <td><?php echo $data['Info_career']; ?></td>
                                      <!-- <td><?php echo $data['Info_infoname']; ?></td> -->
                                      <td><?php echo $data['Info_about']; ?></td>
                                      <td><?php echo $data['Info_nameadult']; ?></td>
                                      <td><?php echo $data['Info_status']; ?></td>
                                      
                                      <td><center>
                                      <!-- <a  class='btn btn-success' onClick=add(<?php echo "'".$data['Info_id']."'";?>)>
                                      <i class="fas fa-plus"> </i></a>  -->
                                       <!-- <a  class='btn btn-info' onClick=watch(<?php echo "'".$data['Info_name']."'";?>,<?php echo "'".$data['Info_surename']."'";?>)>
                                      <i class="fas fa-eye"> </i></a> -->
                                      <a  class='btn btn-info' onClick=watch(<?php echo "'".$data['Info_id']."'";?>)>
                                      <i class="fas fa-eye"> </i></a>
                                     
                                      <a  class='btn btn-warning' onClick=update(<?php echo "'".$data['Info_id']."'";?>)>
                                      <i class="fas fa-edit"> </i></a>
                                      <a  class='btn btn-danger' onClick=remove(<?php echo "'".$data['Info_id']."'";?>)>
                                      <i class="fas fa-trash"> </i></a>
                                      <a  class='btn btn-success' onClick=addde(<?php echo "'".$data['Info_id']."'";?>)>
                                      <i class="fas fa-plus"> </i>เพิ่มประวัติการรักษา</a></td>
                                    </tr>
                              <?php
                            endwhile;
                            ?>
                            </div>
                          </div>
                        </div>
                        </tbody>
                        <tfoot>
                            <tr align="center" >
                            <td colspan="10">
                                รวม
                            </td>
                            <td >
                              <?php echo $sum." รายการ"?>
                            </td>
                            </tr>
                            
                        </tfoot>
                    </table>
                    <?php
                    $sql2 = "select * from patient_info ";
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
                    <a class="page-link"  href="index_patient_info.php?page=1" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    </a>
                    </li>
                    <?php for($i=1;$i<=$total_page;$i++){ ?>
                    <li><a class="page-link" href="index_patient_info.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php } ?>
                    <li>
                    <a class="page-link" href="index_patient_info.php?page=<?php echo $total_page;?>" aria-label="Next">
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
        if(inputVal.length){
            $.get("backend-search-patient-info.php", {term: inputVal}).done(function(data){
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
            $.get("backend-all-patient-info.php", {}).done(function(data){
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
  //alert(params)
  var conf = confirm("ยืนยันการลบผู้รักษาหรือไม่");
  if(conf == true){
     $.post("index_patient_info.php", { t:params} ).done(function( data ){
        location.reload()
        })
  }
}
function update(params) {
  
  window.location.href = "update_patient_info_input.php?t="+params 
}
function addde(params) {
  
  window.location.href = "add_history_medical.php?t="+params 
}
// function watch(params,params2) {
  
//   window.location.href = "detail_patient_info.php?t="+params+"&s="+params2 
// }
function watch(params) {
  
  window.location.href = "detail_patient_info.php?t="+params
}
function add(params) {
  window.location.href = "add_patient_2.php?t="+params 
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

      //echo print_r($a);
      $boolean= true;
          $sql = "DELETE FROM   `patient_info`WHERE Info_id  = '$i'";
          $sql2 = "DELETE FROM `address_p` WHERE Info_id = '$i'";
          $sql3 = "DELETE FROM `history_drug` WHERE Info_id = '$i'";
          $sql4 = "DELETE FROM `service` WHERE Info_id = '$i'";
          if($con->query($sql)){
    
          }else{
              $boolean = false;
          }
          if($con->query($sql2)){
              
              
          }else{
              $boolean = false;
          }
          if($con->query($sql3)){
           
          }
          else{
              $boolean = false;
          }
          if($con->query($sql4)){
              
          }else{
              $boolean = false;
          }
          foreach($a as $value){
            $sql5 = "DELETE  FROM `nexttime`WHERE de_id ='$a'";
            if($con->query($sql5)){
              
            }else{
                $boolean = false;
            }
          }
         
          $sql6 = "DELETE FROM `defence` WHERE Info_id = '$i'";
          $sql7 = "DELETE FROM `diagnosis` WHERE Info_id = '$i'";
          
          
          // if($con->query($sql)){
    
          // }else{
          //     $boolean = false;
          // }
          // if($con->query($sql2)){
              
              
          // }else{
          //     $boolean = false;
          // }
          // if($con->query($sql3)){
           
          // }
          // else{
          //     $boolean = false;
          // }
          // if($con->query($sql4)){
              
          // }else{
          //     $boolean = false;
          // }
         
          if($con->query($sql6)){
              
          }else{
              $boolean = false;
          }
          if($con->query($sql7)){
              
          }else{
              $boolean = false;
          }
          if($boolean){
              echo "<script>alert('Delete Successful')</script>";
          }
          /*if($con->query($sql)){
              echo "<script>alert('Delete Successful')</script>";
          }*/
    
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