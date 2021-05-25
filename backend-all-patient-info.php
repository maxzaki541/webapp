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
    $sql = "SELECT * FROM ((`patient_info` INNER JOIN `address_p` ON `address_p`.Info_id =`patient_info`.Info_id ) INNER JOIN `service` ON `patient_info`.Info_id = `service`.Info_id) 
    INNER JOIN `history_drug` ON `patient_info`.Info_id=`history_drug`.Info_id Group by Info_name,Info_surename";
    $sum=0;
    $query = $con->query($sql);
    $per_page = 2;
    $tt =  
    "<div class='mb-3 col-lg-12' id='demo'>
    <table class='table table-striped table-bordered table-hover table-responsive-sm' style='width:100%'>
        <thead align='center'>
            <tr class='table-primary'>
                <th><center>รหัสHn.</th>
                <th><center>คำนำหน้า</th>
                <th><center>ชื่อ</th>
                <th><center>นามสกุล</th>
                <th><center>อายุ</th>
                <th><center>เบอร์โทรศัพท์</th>
               
                <th><center>อาชีพ</th>
                
                
                <th><center>เกี่ยวข้องเป็น</th>
                <th><center>ชื่อผู้ปกครอง</th>
                <th><center>สถานะ</th>
                <th><center>การทำงาน</th>
            </tr>
        </thead>
        <tbody>
        <div class='float-right'>
        <a class='btn btn-success' href=add_patient_info.php><i class='fas fa-plus'></i>เพิ่มข้อมูล</a>
    </div><div> 
        <div class='container'>
          <div class='row hidden-md-up'>";

        while ($result =$query->fetch_assoc()) { 
            $sum++;
            $tt .= "<tr><td>".$result['Info_id'];
            $tt .=  "</td><td>".$result['Info_pre'];
            $tt .= "</td><td>".$result['Info_name'];
            $tt .= "</td><td>".$result['Info_surename'];
            $tt .=  "</td><td>".$result['Info_age'];
            $tt .=  "</td><td>".$result['Info_cardnum'];
            
            //$tt .=  "</td><td>".$result['Info_sex'];
            $tt .=  "</td><td>".$result['Info_career'];
            // $tt .=  "</td><td>".$result['Info_birthday'];
            
            // $tt .=  "</td><td>".$result['Info_infoname'];
            $tt .=  "</td><td>".$result['Info_about'];
            $tt .=  "</td><td>".$result['Info_nameadult'];
            $tt .=  "</td><td>".$result['Info_status'];
            $tt .=  "</td> 
            <td><center>
            <a  class='btn btn-info' onClick=watch('".$result['Info_id']."')><i class='fas fa-eye'> </i></a>
            <a  class='btn btn-warning' onClick=update('".$result['Info_id']."')><i class='fas fa-edit'> </i></a>
            <a  class='btn btn-danger' onClick=remove('".$result['Info_id']."')><i class='fas fa-trash'> </i></a>
            <a  class='btn btn-success' onClick=addde('".$result['Info_id']."')><i class='fas fa-plus'> </i>เพิ่มประวัติการรักษา</a></td>
            </tr>";
         } ;

         $tt .= "</div>
         </div>
       </div>
       </tbody>
       <tfoot>
       <tr align='center'>
       <td colspan='10'>
           รวม
       </td>
       <td >
          $sum รายการ
       </td>
       </tr>
       
   </tfoot>
   </table>


   </div>
   ";
   
   $sql2 = "SELECT * from patient_info ";
   $query2 = mysqli_query($con, $sql2);
   $total_record = mysqli_num_rows($query2);
   $total_page = ceil($total_record / $perpage);
   
   echo $tt;
   
// close connection
mysqli_close($link);
?>
 <!-- <script>
 function watch() {
  
    window.location.href = "detail_patient_info.php?Info_id=<?php echo $result['Info_id']; ?>";
   }
  </script> -->