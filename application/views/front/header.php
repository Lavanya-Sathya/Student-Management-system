<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/style.css'); ?>">
    <link rel="stylesheet" media="screen and (max-width:980px)" href="<?php echo base_url('public/css/phone.css'); ?>">

    <script src="https://kit.fontawesome.com/e744fd3660.js" crossorigin="anonymous"></script>
    <title>Student Management System</title>
  </head>
  <body>
    <header class="bg-light">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light pt-3 pb-3 ">
            <a class="navbar-brand" href="#">Student Management System</a>
            
            <div class="collapse navbar-collapse right-align" id="navbarSupportedContent">
                <ul class="navbar-nav  ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url(); ?>">HOME <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url().'page/about'; ?>">ABOUT US <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url().'page/academic'; ?>">ACADEMICS <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url().'event/index'; ?>">EVENTS <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url().'event/categories'; ?>">CATEGORIES <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url().'page/contact'; ?>">CONTACT US <span class="sr-only">(current)</span>
                    </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url().'student/loginstudent/logSection'; ?>">SIGN IN<span class="sr-only">(current)</span>
                    </a>
                    </li>
            </div>
        </nav>
    </div>
    </header>