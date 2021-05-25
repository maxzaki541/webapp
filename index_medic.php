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

    <!-- <?php include 'assets/object/sidebar2.php'?> -->

    <div id="content">
        <?php include 'assets/object/navBar.php'?>

    
        <div class="container my-4">
            <div class="row">
            <div class="col-md-10">
                    <h4>
                        จัดการข้อมูลแพทย์
                        
                    </h4>
                </div>
               
            <div class="search-box " >
              <input type="text" id="t" placeholder="พิมพ์เพื่อค้นหา" autocomplete="off" >
              

              
            <div class="result">
                <div  id="demo">
                    <table id="myTable" class="table table-striped table-bordered table-hover table-responsive-sm" style="width:100%">
                        <thead align="center" class="table-primary">
                          <th>ลำดับที่</th>
                          <th>รหัส</th>
                          <th>หมายเลขทะเบียนวิชาชีพ</th>
                          <th>คำนำหน้าชื่อ</th>
                          <th>ชื่อ</th>
                          <th>นามสกุล</th>
                          <th>วันที่เริ่มปฏิบัติงาน</th>
                          <th>การทำงาน</th>
                        </thead>
                        <div class="float-right">
                        <a class='btn btn-success' class="float-right" href=add_medic.php>
                        <i class="fas fa-plus"></i>เพิ่ม</a>
                    </div>
                    
                        <tbody>

                        <div> 
                          <div class="container">
                            <div class="row hidden-md-up">
                          

                              <?php $sql = "SELECT * FROM `medic`  ";
                                    $load = $con->query($sql);
                                    $n=1;
                                    $sum=0;
                                    while($data = $load->fetch_assoc()):
                                      $sum++;
                                    ?>
                                    <tr>
                                      <td><?php echo $n; ?></td>
                                      <td><?php echo $data['medic_id']; ?></td>
                                      <td><?php echo $data['medic_regis']; ?></td>
                                      <td><?php echo $data['medic_pre']; ?></td>
                                      <td><?php echo $data['medic_name']; ?></td>
                                      <td><?php echo $data['medic_surname']; ?></td>
                                      <td><?php  
                                            $d = explode("-",$data['startdate']);

                                            echo $d[2]."-".$d[1]."-".($d[0]+543); 
                                            ?></td>

                                      <td><center>
                                      <a  class='btn btn-info'  onClick=watch(<?php echo "'".$data['medic_id']."'";?>)>
                                      <i class="fas fa-eye"> </i></a>
                                      <!-- <a  class='btn btn-info' href="detail_medic.php?medic_id=<?php echo $data["medic_id"]; ?>">
                                      <i class="fas fa-eye"> </i></a> -->
                                      <a  class='btn btn-warning' onClick=update(<?php echo "'".$data['medic_id']."'";?>)>
                                      <i class="fas fa-edit"> </i></a>
                                      <a  class='btn btn-danger' onClick=remove(<?php echo "'".$data['medic_id']."'";?>)>
                                      <i class="fas fa-trash"> </i></a></td>
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
                            <td colspan="7">
                                รวม
                            </td>
                            <td >
                              <?php echo $sum." รายการ"?>
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
            $.get("backend-search-medic.php", {term: inputVal}).done(function(data){
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
            $.get("backend-all-medic.php", {}).done(function(data){
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
  var conf = confirm("ยืนยันการลบแพทย์หรือไม่");
  if(conf == true){
     $.post("index_medic.php", { t:params } ).done(function( data ){
        location.reload()
        })
  }
     
}
function update(params) {
  window.location.href = "update_medic_input.php?t="+params 
}
function watch(params) {
  window.location.href = "detail_medic.php?t="+params 
}
</script>
<?php
  
 
  if(isset($_REQUEST['t']) ) {
      $i = $_REQUEST['t'];
          $sql = "DELETE FROM `medic` WHERE medic_id = '$i'";
          if($con->query($sql)){
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