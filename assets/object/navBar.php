 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>



 <!--Navbar-->
 <nav class="navbar navbar-expand-lg bg-success text-white navbar-dark" style="font-size:18px">
    <a href="#" class="navbar-brand">
        <img class="img-thumbnail " src="images/logo1.png" alt="Thumbnail image" height="50px" width="120px">
    </a>
    
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
    </button>
     <div class="container">

    
        

         <!-- Links -->
         <div class="collapse navbar-collapse" id="navbarCollapse">

             <!-- Left -->
             <ul class="navbar-nav mr-auto">
             <!-- <li class="nav-item">
                     <a class="nav-link" href="index_member.php">ผู้ใช้แอพ</a>
            </li> -->
            

             <li class="nav-item dropdown">
                    <a class="nav-link dropdown" href="#" id="navbarDropdown"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    จองคิว
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="add_queue_emp.php">เพิ่มคิว</a>
                    <a class="dropdown-item" href="index_queue_emp.php">ประวัติจองคิว</a> 
                    <a class="dropdown-item" href="callQ.php">เรียกคิว</a> 
                    <a class="dropdown-item" href="index_history_medical.php">บันทึกการรักษา</a>
                    </div>
             </li>

                 <!-- <li class="nav-item">
                     <a class="nav-link" href="index_queue_emp.php">จองคิวเจ้าหน้าที่</a>
                 </li> -->
                 <li class="nav-item">
                     <a class="nav-link" href="index_queue.php">จองคิวผ่านแอพ</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="index_medic.php">แพทย์</a>
                 </li>
                 
                 <!-- <li class="nav-item">
                     <a class="nav-link" href="index_history_medical.php">ประวัติการรักษา</a>
                 </li> -->
                 <li class="nav-item">
                     <a class="nav-link" href="index_patient_info.php">บันทึกข้อมูลผู้เข้าบริการ</a>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link" href="report.php">รายงาน</a>
                 </li>
             </ul>

             <!-- Right -->
             <ul class="navbar-nav nav-flex-icons">
                 
                 <li class="nav-item">
                 <a class="nav-link " class="nav-link waves-effect"><?php echo "ชื่อเจ้าหน้าที่ : ".$_SESSION['staff_id'];?></a>
                     
                 </li>
                 <li class="nav-item">
                     <a href="assets/php/logout.php" class="nav-link waves-effect">
                         <i class="fas fa-sign-out-alt fa-lg"></i>
                     </a>
                 </li>

         </div>

     </div>

 </nav>
 <!--/.Navbar-->
 </html>