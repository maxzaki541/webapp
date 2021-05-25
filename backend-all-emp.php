<?php
 session_start();
 include 'assets/php/connect.php';
 if(!isset($_SESSION['staff_id'])) header("location:index.php");
 

    
    $sql = "SELECT * FROM `employees` ";
    $query = $con->query($sql);
    $tt = "
    <div class='mb-3 col-lg-12' id='demo'>
    <table class='table table-striped table-bordered table-hover table-responsive-sm' style='width:100%'>
        <thead align='center'>
            <tr class='table-primary'>
            <th>รหัสเจ้าหน้าที่</th>
            <th>คำนำหน้า</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>เพศ</th>
            <th>username</th>
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
            $tt .= "<tr><td>".$result['emp_id'];
            
            $tt .= "</td><td>".$result['emp_pre'];
            $tt .= "</td><td>".$result['emp_name'];
            $tt .= "</td><td>".$result['emp_surname'];
            $tt .= "</td><td>".$result['emp_gender'];
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

   echo $tt;

 
// close connection
mysqli_close($link);
?>