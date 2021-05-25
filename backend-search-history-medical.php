<?php
 session_start();
 include 'assets/php/connect.php';
 if(!isset($_SESSION['staff_id'])) header("location:index.php");
 //echo "<script>alert('asds')</script>";
if(isset($_REQUEST["term"])){
    

    // $sql = "SELECT defence.de_id,patient_info.Info_name,type_service.type_name FROM ((`defence`
    // INNER JOIN `patient_info` on defence.Info_id = patient_info.Info_id)
    // INNER JOIN type_service ON defence.type_id=type_service.type_id) WHERE de_id LIKE '%{$_REQUEST['term']}%' OR `type_name` LIKE '%{$_REQUEST['term']}%'
    // OR Info_name LIKE '%{$_REQUEST['term']}%'";
    
    /*$sql = "SELECT * FROM `defence` WHERE de_id LIKE '%{$_REQUEST['term']}%' OR `type_id` LIKE '%{$_REQUEST['term']}%'
    OR Info_id LIKE '%{$_REQUEST['term']}%' ";*/

    // $sql = "SELECT * FROM (( `diagnosis` INNER JOIN `patient_info` ON diagnosis.Info_id = patient_info.Info_id) INNER JOIN `defence` ON diagnosis.de_id = defence.de_id) 
    // INNER JOIN type_service ON type_service.type_id = defence.type_id  WHERE `type_name` LIKE '%{$_REQUEST['term']}%'
    //  OR Info_name LIKE '%{$_REQUEST['term']}%' OR Info_surename LIKE '%{$_REQUEST['term']}%' OR di_NameSymptom LIKE '%{$_REQUEST['term']}%' Group by Info_name,Info_surename ";
    $sql = "SELECT * FROM (( `diagnosis` INNER JOIN `patient_info` ON diagnosis.Info_id = patient_info.Info_id) INNER JOIN `defence` ON diagnosis.de_id = defence.de_id) 
    INNER JOIN type_service ON type_service.type_id = defence.type_id  WHERE  Info_name LIKE '%{$_REQUEST['term']}%' 
    OR Info_surename LIKE '%{$_REQUEST['term']}%' Group by Info_name,Info_surename ";

    $sum=0;
    $query = $con->query($sql);
    $tt = "
    <div class='mb-3 col-lg-12' id='demo'>
    <table class='table table-striped table-bordered table-hover table-responsive-sm' style='width:100%'>
        <thead align='center'>
            <tr class='table-primary'>
            <th>ลำดับ</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            
            
            <th>การทำงาน</th>
            </tr>
        </thead>
        <tbody>
        <div class='float-right'>
        <a  class='btn btn-Primary' class='float-right' href=formdefence.php>ดาวน์โหลดแบบฟอร์มบันทึกการรักษา</a>
        
    </div>
    <br>
    <br><div> 
        <div class='container'>
          <div class='row hidden-md-up'>";
          $n=1;
        while ($result =$query->fetch_assoc()) { 
            $sum++;
            $tt .= "<tr><td>".$n;
            $tt .= "</td><td>".$result['Info_name'];
            $tt .= "</td><td>".$result['Info_surename'];
            // $tt .= "</td><td>".$result['type_name'];
            // $tt .= "</td><td>".$result['di_NameSymptom'];
            // $tt .= "</td><td>".$result['di_date'];
            // $tt .= "</td><td>".$result['di_time'];
            $tt .=  "</td> 
            <td><center>
            <a  class='btn btn-success' onClick=add('".$result['de_id']."')><i class='fas fa-plus'> </i></a>
            <a  class='btn btn-info' onClick=\"watch('".$result['Info_name']."', '".$result['Info_surename']."')\"><i class='fas fa-eye'> </i></a>
            
            <a  class='btn btn-danger' onClick=remove('".$result['de_id']."')><i class='fas fa-trash'> </i></a></td>
            </tr>";
            $n++;
         } ;

         $tt .= "</div>
         </div>
       </div>
       </tbody>
       <tfoot>
                            <tr align='center'>
                            <td colspan='3'>
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