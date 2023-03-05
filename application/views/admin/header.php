<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome to Student Management</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/studentstyle.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/admin/plugins/summernote/summernote-bs4.css">
  


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      

            <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          Welcome,<strong> Admin</strong>
        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url().'admin/login/logout' ?>" class="dropdown-item">
            Logout
          </a>
         
        </div>
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link bg-white">
      
      <span class="brand-text ml-4"><strong>Student Management</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="<?php echo base_url().'admin/home/index'; ?>" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
              DashBoard
            </a>
          </li>
          <li class="nav-item">
          <a href="<?php echo base_url().'admin/studentprofile/index'; ?>" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
              Student
            </a>
          </li>
          <li class="nav-item <?php echo (!empty($mainModule) && $mainModule=='department') ? 'active' : ''; ?>">
            <a href="<?php echo base_url().'admin/department/index'; ?>" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
              Department
            </a>
          </li>
          <li class="nav-item ">
            <a href="<?php echo base_url().'admin/notice/index'; ?>" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
               Notice
            </a>
          </li>
          <li class="nav-item has-treeview <?php echo (!empty($mainModule) && $mainModule=='feedback') ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Feedback
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'admin/feedback/index'; ?>" class="nav-link  <?php echo (!empty($mainModule) && $mainModule=='feedback' && $subModule == 'viewFeedback') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Feedback</p>
                </a>
              </li>              
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'admin/feedback/studentFeed'; ?>" class="nav-link <?php echo (!empty($mainModule) && $mainModule=='feedback' && $subModule == 'enableFeedback') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Feedback Details</p>
                </a>
              </li>              
            </ul>
          </li>
          <li class="nav-item has-treeview <?php echo (!empty($mainModule) && $mainModule=='category') ? 'menu-open' : ''; ?>">
            <a href="<?php echo base_url().'admin/category/create'; ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'admin/category/create'; ?>" class="nav-link <?php echo (!empty($mainModule) && $mainModule=='category' && $subModule == 'createCategory') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'admin/category/index'; ?>" class="nav-link <?php echo (!empty($mainModule) && $mainModule=='category' && $subModule == 'viewCategory') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Category</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php echo (!empty($mainModule) && $mainModule=='article') ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Article
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'admin/article/createArticle' ?>" class="nav-link <?php echo (!empty($mainModule) && $mainModule=='article' && $subModule == 'createArticle') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Article</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'admin/article/index' ?>" class="nav-link <?php echo (!empty($mainModule) && $mainModule=='article' && $subModule == 'viewArticle') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Article</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 