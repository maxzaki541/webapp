<?php
 session_start();
 include 'assets/php/connect.php';
 if(!isset($_SESSION['staff_id'])) header("location:index.php");
 
if(isset($_REQUEST["term"])){
    
   /* $sql = "SELECT * FROM `queue_emp` WHERE eguest_id LIKE '%{$_REQUEST['term']}%' OR eguest_date LIKE '%{$_REQUEST['term']}%'
    OR `eguest_time` LIKE '%{$_REQUEST['term']}%'  OR `type_id` LIKE '%{$_REQUEST['term']}%' OR `emp_id` LIKE '%{$_REQUEST['term']}%'";*/
    $sql = "SELECT queue_emp.eguest_id,queue_emp.namepub,queue_emp.lastnamepub,queue_emp.eguest_date,queue_emp.eguest_time,type_service.type_name,employees.emp_name,employees.emp_surname FROM ((`queue_emp`
                              INNER JOIN type_service ON queue_emp.type_id = type_service.type_id)
                              INNER JOIN employees ON queue_emp.emp_id = employees.emp_id) WHERE eguest_id LIKE '%{$_REQUEST['term']}%' OR eguest_date LIKE '%{$_REQUEST['term']}%'
    OR `eguest_time` LIKE '%{$_REQUEST['term']}%'  OR `type_name` LIKE '%{$_REQUEST['term']}%' OR `emp_name` LIKE '%{$_REQUEST['term']}%' OR `namepub` LIKE '%{$_REQUEST['term']}%' 
    OR `lastnamepub` LIKE '%{$_REQUEST['term']}%'";
     $sum=0;
    $query = $con->query($sql);
    $tt = "
    <div class='mb-3 col-lg-12' id='demo'>
    <table class='table table-striped table-bordered table-hover table-responsive-sm' style='width:100%'>
        <thead align='center'>
            <tr class='table-primary'>
            <th>รหัสการจองคิว</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>วันที่จอง</th>
            <th>เวลาที่จอง</th>
            <th>ประเภทการรักษา</th>
            <th>ชื่อพนักงานที่จองคิว</th>
            <th>การทำงาน</th>
            </tr>
        </thead>
        <tbody>
        <div class='float-right '>
                       
        <form method ='post'action='./index_queue_emp.php' >
                เลือกวัน : <input type='date'  id='start' name='trip-start'  class='form-control-sm' >
                  <input type='submit' class='btn btn-primary' value='ตกลง' >
                  
                </form>
                
                <button  class='btn btn-success' class='float-right' onclick=b()>แสดงข้อมูลทั้งหมด</button>
                </div>

                    <br>
                    <script>
                    function b(){
                      window.location = 'index_queue_emp.php'
                      }
                    </script>
        <div> 
        <div class='container'>
          <div class='row hidden-md-up'>";

          if(isset($_POST['trip-start'])){
            $a = $_POST['trip-start'];
            
            $sql = "SELECT queue_emp.eguest_id,queue_emp.namepub,queue_emp.lastnamepub,queue_emp.eguest_date,queue_emp.eguest_time,type_service.type_name,employees.emp_name,employees.emp_surname FROM ((`queue_emp`
            INNER JOIN type_service ON queue_emp.type_id = type_service.type_id)
            INNER JOIN employees ON queue_emp.emp_id = employees.emp_id) where queue_emp.eguest_date = '$a' limit {$start} , {$perpage}";
            
          }
          if(isset($_REQUEST['b'])){
            
            unset($_POST);
            echo "<script>window.location = 'index_queue_emp.php'</script>";
          }
        while ($result =$query->fetch_assoc()) { 
            $sum++;
            $d = explode("-",$result['eguest_date']);

             $date=$d[2]."-".$d[1]."-".($d[0]+543);
            $tt .= "<tr><td>".$result['eguest_id'];
            $tt .= "</td><td>".$result['namepub'];
            $tt .= "</td><td>".$result['lastnamepub'];
            $tt .= "</td><td>".$date;
            $tt .= "</td><td>".$result['eguest_time'];
            $tt .=  "</td><td>".$result['type_name'];
            $tt .=  "</td><td>".$result['emp_name']." ".$result['emp_surname'];
            $tt .=  "</td> 
            <td><center><a  class='btn btn-warning' onClick=update('".$result['eguest_id']."')><i class='fas fa-edit'> </i></a>
            <a  class='btn btn-danger' onClick=remove('".$result['eguest_id']."')><i class='fas fa-trash'> </i></a></td>
            </tr>";
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
}
 
// close connection
mysqli_close($link);
?>