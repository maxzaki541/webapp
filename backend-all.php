<?php
 session_start();
 include 'assets/php/connect.php';
 if(!isset($_SESSION['staff_id'])) header("location:index.php");
 
      
        $perpage = 5;
        if (isset($_GET['page'])) {
        $page = $_GET['page'];
        } else {
        $page = 1;
         }                           
       $start = ($page - 1) * $perpage;
        $sql = "SELECT * FROM `member` limit {$start} , {$perpage}";
    $query = $con->query($sql);
    $tt =  
    "<div class='mb-3 col-lg-12' id='demo'>
    <table class='table table-striped table-bordered table-hover table-responsive-sm' style='width:100%'>
        <thead align='center'>
            <tr class='table-primary'>
            <th>รหัสผู้ใช้</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>อีเมล</th>
            <th>เบอร์โทรศัพท์</th>
            
            <th>ชื่อผู้ใช้งาน</th>
            <th>การทำงาน</th>
            </tr>
        </thead>
        <tbody>
        <br>
       <div> 
        <div class='container'>
          <div class='row hidden-md-up'>";
         $sum=0;
        while ($result =$query->fetch_assoc()) { 
          $sum++;
          $tt .= "<tr><td>".$result['mem_id'];
         
          $tt .= "</td><td>".$result['f_name'];
          $tt .= "</td><td>".$result['l_name'];
          $tt .= "</td><td>".$result['email'];
          $tt .= "</td><td>".$result['cardnumber'];
          // $tt .=  "</td><td>".$result['password'];
          $tt .=  "</td><td>".$result['username'];
          $tt .=  "</td> 
            <td><center><a  class='btn btn-warning' onClick=update(".$result['mem_id'].")><i class='fas fa-edit'> </i></a>
            <a  class='btn btn-danger' onClick=remove(".$result['mem_id'].")><i class='fas fa-trash'> </i></a></td>
            </tr>";

         } ;

         $tt .= "</div>
         </div>
       </div>
       </tbody>

       <tfoot>
                <tr align='center'>
                <td colspan='6'>
                    รวม
                </td>
                <td >
                    $sum รายการ
                </td>
                </tr>
       
   </tfoot>
   </table>
  
   

   </div>";
   $sql2 = "SELECT * from member ";
   $query2 = mysqli_query($con, $sql2);
   $total_record = mysqli_num_rows($query2);
   $total_page = ceil($total_record / $perpage);
   echo $tt;
 
// close connection
mysqli_close($link);
?>