 
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
 <!--Navbar-->
 <nav class="navbar navbar-expand-lg bg-success text-white navbar-dark" style="font-size:18px">
 <a href="#" class="brand-link">
        <img class="img-thumbnail" src="images/logo1.png" alt="CoolBrand" height="50px" width="120px">
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
            

            

                 <!-- <li class="nav-item">
                     <a class="nav-link" href="index_queue_emp.php">จองคิวเจ้าหน้าที่</a>
                 </li> -->
                 <li class="nav-item">
                     <a class="nav-link" href="index_type.php">ประเภทบริการ</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="index_member.php">ผู้ใช้บริการผ่านแอปพลิเคชัน</a>
                 </li>
                 
                 <!-- <li class="nav-item">
                     <a class="nav-link" href="index_history_medical.php">ประวัติการรักษา</a>
                 </li> -->
                 <li class="nav-item">
                     <a class="nav-link" href="index_emp.php">เจ้าหน้าที่</a>
                 </li>
             </ul>

             <!-- Right -->
             <ul class="navbar-nav nav-flex-icons">
                 
                 <li class="nav-item">
                    <a class="nav-link " class="nav-link waves-effect"><?php echo "ชื่อแอดมิน : ".$_SESSION['staff_id'];?></a>
                     
                 </li>
            
            
                 <li class="nav-item">
                     <a href="assets/php/logout.php" class="nav-link waves-effect">
                         <i class="fas fa-sign-in-alt fa-lg" ></i>
                     </a>
                 </li>
            </ul>
         </div>

     </div>

 </nav>
 <!--/.Navbar--> 