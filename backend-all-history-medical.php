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
       $sql = "SELECT * FROM (( `diagnosis` INNER JOIN `patient_info` ON diagnosis.Info_id = patient_info.Info_id) INNER JOIN `defence` ON diagnosis.de_id = defence.de_id) 
       JOIN type_service ON type_service.type_id = defence.type_id Group by Info_name,Info_surename";
    //$sql = "SELECT * FROM `defence`";
    $sum=0;
    $query = $con->query($sql);
    $tt =  
    "<div class='mb-3 col-lg-12' id='demo'>
    <table class='table table-striped table-bordered table-hover table-responsive-sm' style='width:100%'>
        <thead align='center' class='table-primary'>
            <tr>
            <th>ลำดับ</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
                
                <th>การทำงาน</th>
            </tr>
        </thead>
        <tbody>
        <div class='float-right'>
        <a  class='btn btn-Primary' class='float-right' href=formdefence.php>ดาวน์โหลดแบบฟอร์มบันทึกการรักษา</a>
        
    </div> <br>
    <br>
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
   $sql2 = "SELECT * from defence ";
   $query2 = mysqli_query($con, $sql2);
   $total_record = mysqli_num_rows($query2);
   $total_page = ceil($total_record / $perpage);
   echo $tt;
 
// close connection
mysqli_close($link);
?>