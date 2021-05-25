<?php
 session_start();
 include 'assets/php/connect.php';
 if(!isset($_SESSION['staff_id'])) header("location:index.php");
 
    $sql = "SELECT * FROM `medic`";
    
     $sum=0;
    $query = $con->query($sql);
    
    $tt =  
    "<div class='mb-3 col-lg-12' id='demo'>
    <table class='table table-striped table-bordered table-hover table-responsive-sm' style='width:100%'>
        <thead align='center' class='table-primary'>
            
            <th>ลำดับที่</th>
            <th>รหัส</th>
            <th>หมายเลขทะเบียนวิชาชีพ</th>
            <th>คำนำหน้าชื่อ</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>วันที่เริ่มปฏิบัติงาน</th>
            <th>การทำงาน</th>
               
                
           
        </thead>
        <tbody>
        <div class='float-right'>
        <a class='btn btn-success' href=add_medic.php>
        <i class='fas fa-plus'></i>เพิ่ม</a>
    </div><div> 
        <div class='container'>
          <div class='row hidden-md-up'>";
          $n=1;
        while ($result =$query->fetch_assoc()) { 
            $sum++;
            $tt .= "<tr><td>".$n;
            $tt .= "</td><td>".$result['medic_id'];
            $tt .=  "</td><td>".$result['medic_regis'];

            $tt .= "</td><td>".$result['medic_pre'];
            $tt .= "</td><td>".$result['medic_name'];
            $tt .= "</td><td>".$result['medic_surname'];
            $tt .= "</td><td>".$result['startdate'];
            
            
            $tt .=  "</td> 
            <td><center>
            <a  class='btn btn-info' onClick=watch('".$result['medic_id']."')><i class='fas fa-eye'> </i></a>
            <a  class='btn btn-warning' onClick=update('".$result['medic_id']."')><i class='fas fa-edit'> </i></a>
            <a  class='btn btn-danger' onClick=remove('".$result['medic_id']."')><i class='fas fa-trash'> </i></a></td>
            </tr>";
            $n++;
         } ;

         $tt .= "</div>
         </div>
       </div>
       </tbody>
       <tfoot>
                            <tr align='center'>
                            <td colspan='7'>
                                รวม
                            </td>
                            <td >
                                $sum รายการ 
                            </td>
                            </tr>
                            
                        </tfoot>
   </table>
  

   </div>";

   echo $tt;
 
// close connection
mysqli_close($link);
?>