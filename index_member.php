<?php
  session_start();
  include 'assets/php/connect.php';
  if(!isset($_SESSION['staff_id'])) header("location:index.php");
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
        <?php include 'assets/object/navbarAd.php'?>

    
        <div class="container my-4">
            <div class="row">
            <div class="col-md-10">
                    <h4>
                        ผู้ใช้ผ่านแอปพลิเคชั่น
                        
                    </h4>
                </div>
            <div class="search-box">
              <input type="text" id="t" placeholder="พิมพ์เพื่อค้นหา" autocomplete="off">
            <div class="result">
                <div  id="demo">
                
                    <table id="example" class="table table-striped table-bordered table-hover table-responsive-sm" style="width:100%">
                        <thead align="center" class="table-primary">
                          <th>รหัสผู้ใช้</th>
                          <th>ชื่อ</th>
                          <th>นามสกุล</th>
                          <th>อีเมล</th>
                          <th>เบอร์โทรศัพท์</th>
                          
                          <th>ชื่อผู้ใช้งาน</th>
                          <th>การทำงาน</th>
                        </thead>
          
                        <tbody>
                        <!--div class="float-right">
                        <a class='btn btn-success' class="float-right" href=add_member.php>เพิ่ม</a>
                    </div-->
                    <br>
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
                              
                                  $sql = "SELECT * FROM `member` limit {$start} , {$perpage}";
                                  $sum=0;
                                    $load = $con->query($sql);
                                    while($data = $load->fetch_assoc()):
                                      $sum++;
                                    ?>
                                    <tr>
                                      <td><?php echo $data['mem_id']; ?></td>
                                      <td><?php echo $data['f_name']; ?></td>
                                      <td><?php echo $data['l_name']; ?></td>
                                      <td><?php echo $data['email']; ?></td>
                                      <td><?php echo $data['cardnumber']; ?></td>
                                      
                                      <td><?php echo $data['username']; ?></td>
                                      
                                      <td><center><a  class='btn btn-warning' onClick=update(<?php echo $data['mem_id'];?>)>
                                      <i class="fas fa-edit"> </i></a>
                                      <a  class='btn btn-danger' onClick=remove(<?php echo $data['mem_id'];?>)>
                                      <i class="fas fa-trash"> </i></a></td>
                                    </tr>
                              <?php
                            endwhile;
                            ?>

                            </div>
                          </div>
                        </div>
                        </tbody>
                        <tfoot>
                            <tr align="center">
                            <td colspan="6">
                                รวม
                            </td>
                            <td >
                              <?php echo $sum." รายการ"?>
                            </td>
                            </tr>
                            
                        </tfoot>
                    </table>
                    <?php
                    $sql2 = "select * from `member` ";
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
                    <a class="page-link"  href="index_member.php?page=1" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    </a>
                    </li>
                    <?php for($i=1;$i<=$total_page;$i++){ ?>
                    <li><a class="page-link" href="index_member.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php } ?>
                    <li>
                    <a class="page-link" href="index_member.php?page=<?php echo $total_page;?>" aria-label="Next">
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
            $.get("backend-search.php", {term: inputVal}).done(function(data){
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
            $.get("backend-all.php", {}).done(function(data){
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
  var conf = confirm("ยืนยันการลบผู้ใช้งานหรือไม่");
  if(conf == true){
     $.post("index_member.php", { t:params } ).done(function( data ){
        location.reload()
        })
  }
     
}
function update(params) {
  window.location.href = "update_member_input.php?t="+params 
}
</script>
<?php
  
 
  if(isset($_REQUEST['t']) ) {
      $i = $_REQUEST['t'];
          $sql = "DELETE FROM `member` WHERE mem_id = '$i'";
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