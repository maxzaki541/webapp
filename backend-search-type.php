<?php
 session_start();
 include 'assets/php/connect.php';
 if(!isset($_SESSION['staff_id'])) header("location:index.php");
 
if(isset($_REQUEST["term"])){
    
    $sql = "SELECT * FROM `type_service` WHERE `type_id` LIKE '%{$_REQUEST['term']}%' OR `type_name` LIKE '%{$_REQUEST['term']}%'";
    $query = $con->query($sql);
    $tt = "
    <div class='mb-3 col-lg-12' id='demo'>
    <table class='table table-striped table-bordered table-hover table-responsive-sm' style='width:100%'>
        <thead align='center'>
            <tr class='table-primary'>
                <th>รหัสการรักษา</th>
                <th>ชื่อการรักษา</th>
                <th>การทำงาน</th>
            </tr>
        </thead>
        <tbody>
        <div class='float-right'>
        <a class='btn btn-success' href=add_type.php><i class='fas fa-plus'></i>เพิ่ม</a>
    </div><div> 
        <div class='container'>
          <div class='row hidden-md-up'>";
          $sum=0;
        while ($result =$query->fetch_assoc()) { 
            $sum++;
            $tt .= "<tr><td>".$result['type_id'];
            $tt .= "</td><td>".$result['type_name'];
            $tt .=  "</td> 
            <td><center><a  class='btn btn-warning' onClick=update('".$result['type_id']."')><i class='fas fa-edit'> </i></a>
            <a  class='btn btn-danger' onClick=remove('".$result['type_id']."')><i class='fas fa-trash'> </i></a></td>
            </tr>";
         } ;

         $tt .= "</div>
         </div>
       </div>
       </tbody>
       <tfoot>
                            <tr align='center'>
                            <td colspan='2'>
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
}
 
// close connection
mysqli_close($link);
?>