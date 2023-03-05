<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student | Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Student Registration</b></a>
  </div>
  <!-- /.login-logo -->
  <?php
    
     if($this->session->flashdata('success')!="") {
      echo "<div class='alert alert-success'>". $this->session->flashdata('success')."</div>";
     } 
     if($this->session->flashdata('error')!="") {
      echo "<div class='alert alert-danger'>". $this->session->flashdata('error')."</div>";
    } 

  ?>
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register</p>
      
      <form action="<?php echo base_url().'student/loginstudent/register' ?>" method="post">
      <div class="input-group mb-3">
          <label for="USN"></label>
          <input type="text" id="usn" name="usn" value="<?php echo set_value('usn'); ?>" class="form-control <?php echo (form_error('usn') !='') ? 'is-invalid' : ''; ?>" placeholder=" Enter USN">
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <label for="name"></label>
          <input type="text" id="name" name="name" value="<?php echo set_value('name'); ?>" class="form-control <?php echo (form_error('name') !='') ? 'is-invalid' : ''; ?>" placeholder="Enter your Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>

        </div>
        <div class="input-group mb-3">
          <label for="email"></label>
          <input type="email" id="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control <?php echo (form_error('email') !='') ? 'is-invalid' : ''; ?>" placeholder="Enter your Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <label for="dept_id"></label>
            <select name="dept_id" id="dept_id" class="form-control <?php echo  (form_error('dept_id') !='') ? 'is-invalid' : ''; ?>">
              <option value="">Select Department</option>
              <?php  if(!empty($dept)){
              foreach($dept as $deptRow){ ?>
                <option <?php echo set_select('dept_id'); ?> value="<?php echo $deptRow['d_id']; ?>"><?php echo $deptRow['d_name']; ?></option>
              <?php }} ?>   
            </select>
            <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>    
        </div>
        
        <div class="input-group mb-3">
          <label for="sem_id"></label>
          <div id="semBox">
            <select name="sem_id" id="sem_id" class="form-control <?php echo  (form_error('sem_id') !='') ? 'is-invalid' : ''; ?>">
              <option value="">Select Semester</option>
            </select>
          </div> 
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div> 
          <?php echo form_error('sem_id'); ?>  
        </div>
        <div class="input-group mb-3">
          <label for="password"></label>
          <input  id="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control <?php echo (form_error('password') !='') ? 'is-invalid' : ''; ?>" placeholder="Enter Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <label for="repassword"></label>
          <input type="password" id="repassword" name="repassword" value="<?php echo set_value('repassword'); ?>" class="form-control <?php echo (form_error('repassword') !='') ? 'is-invalid' : ''; ?>" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="registrationFormAlert" style="color:green;" id="CheckPasswordMatch">
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="check">
              <label for="check">
               Show Password
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" id="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <a href="<?php echo base_url().'student/loginstudent/index'; ?>" class="text-center">I have already registered  </a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>/public/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>/public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/public/admin/dist/js/adminlte.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
        $("#dept_id").change(function(){
            var dept_id=$(this).val();
            $.ajax({
                url:"<?php echo base_url('student/loginstudent/getSemester');?>",
                type:'POST',
                data:{dept_id:dept_id},
                dataType:'json',
                success:function(response){
                    console.log(response);
                    if(response['sem']){
                        $('#semBox').html(response['sem']);
                    }
                }
            });
           
          });
        });
  var pass = document.getElementById('password');
  var checkBox = document.getElementById('check');

  function toggle(){
    pass.type= pass.type === "password" ? "text" : "password";
  }
  toggle();
  checkBox.addEventListener("click",toggle,true);

  function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#repassword").val();
    if (password != confirmPassword){
      $("#CheckPasswordMatch").html("Passwords does not match!");
      $("#submit").prop('disabled', true);
    }
    else{
      $("#CheckPasswordMatch").html("Passwords match.");
      $("#submit").prop('disabled', false);
    }
  }
  $(document).ready(function () {
    $("#repassword").keyup(checkPasswordMatch);
  });

</script>
</body>
</html>
