<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/studentstyle.css'); ?>">

    <script src="https://kit.fontawesome.com/e744fd3660.js" crossorigin="anonymous"></script>
   
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/studentstyle.css">
  
    <title>Student | Campus</title>
</head>
<body>
    <?php $student=$_SESSION['student']; ?>
    <header class="bg-light">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light pt-3 pb-3 ">
            <a class="navbar-brand" href="#"><h3 style="color:#03037c">Campus</h3> </a>
            
            <div class="collapse navbar-collapse right-align" >
                <ul class="navbar-nav  ml-auto" id="navbarSupportedContent">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url().'student/homestudent/index'; ?>">DashBoard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url().'student/homestudent/course/'.$student['USN']; ?>">Course <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url().'student/homestudent/changePassword/'.$student['USN']; ?>">Change Password <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url().'student/homestudent/profile/'.$student['USN']; ?>">Profile <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" <?php if($stud['status']==0){ ?> style=" pointer-events: none; color:red" <?php } ?> href="<?php echo base_url().'student/homestudent/feedback/'.$student['USN']; ?>">Feedback 
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                        <?php if($stud['image'] != "" && file_exists('./public/images/student_images/'.$stud['image'])){ ?>
                            <img id="headerImg" src="<?php echo base_url().'public/images/student_images/'.$stud['image']; ?>" height="35px" width="35px" style="border-radius:20px">
                        <?php  } else {  ?>
                         
                        <img  id="headerImg"  src="<?php echo base_url().'public/images/images.jpg'; ?>" height="35px" width="35px" style="border-radius:20px">
                        <?php } ?>
                            <span class="sr-only">(current)</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                <?php if($stud['image'] != "" && file_exists('./public/images/student_images/'.$stud['image'])){ ?>
                                    <img id="headerImg" src="<?php echo base_url().'public/images/student_images/'.$stud['image']; ?>" height="120px" width="120px" style="border-radius:70px">
                                <?php  } else {  ?>
                         
                                <img  id="headerImg"  src="<?php echo base_url().'public/images/images.jpg'; ?>" height="120px" width="120px" style="border-radius:70px">
                                <?php } ?>
                                </a>
                                <a href="#" class="dropdown-item">
                                     <h4 style="color:blue";><?php echo $student['USN']; ?></h4>
                                     <h5><?php echo $student['name']; ?></h5>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="<?php echo base_url().'student/homestudent/changePassword/'.$student['USN']; ?>" class="dropdown-item dropdown-footer">Change password</a>
                                <div class="dropdown-divider"></div>
                                <a href="<?php echo base_url().'student/loginstudent/logout'; ?>" class="dropdown-item dropdown-footer">
                                    Sign Out  <i class="fa-solid fa-right-from-bracket"></i> </a>

                            </div>
                    </li>
            </div>
        </nav>
    </div>
    </header>