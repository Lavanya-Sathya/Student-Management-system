<?php $this->load->view('student/studentHeader'); 
$student=$_SESSION['student']; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            
            <div class="container mt-5 h-100vh">                    
                <div class="row">
                    <div class="col-md-8 m-auto w-50 ">
                        <div class="card mb-5">
                        
                            <?php if(!empty($this->session->flashdata('error'))){ ?>
                                <div class="alert alert-danger">
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div> 
                            <?php } ?>
                            <div class="card-header bg-primary text-white">
                            <h3>Change Password</h3>
                            </div>
                            <div class="card-body">
                            
                                <form action="<?php echo base_url().'student/homestudent/changePassword/'.$student['USN']; ?>" method="post">
                                    <div class="form-group">
                                        <label for="pass">Old Password</label>
                                        <input type="text" name="pass" id="pass" value="<?php echo set_value('pass'); ?>" class="form-control <?php echo (!empty(form_error('pass'))) ?'is-invalid' :''; ?>" placeholder="Enter Old Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="newPass">New Password</label>
                                        <input type="text" name="newPass" id="newPass" value="<?php echo set_value('newPass'); ?>" class="form-control <?php echo (!empty(form_error('newPass'))) ?'is-invalid' :''; ?>" placeholder="Enter New Password">
                                    </div> 
                                    <div class="form-group">
                                        <label for="rePass">Re-Enter New Password</label>
                                        <input type="text" name="rePass" id="rePass" value="<?php echo set_value('rePass'); ?>" class="form-control <?php echo (!empty(form_error('rePass'))) ?'is-invalid' :''; ?>" placeholder="Re-Enter New Password">
                                        
                                    </div> 
                                    <div class="registrationFormAlert" style="color:green;" id="CheckPasswordMatch"></div>
                                    <div class="registrationFormAlert" style="color:green;" id="CheckPassword"></div>

                                    <button type="submit" id="submit" class="btn btn-primary">Change Password</button>
                                    <div class="mt-2">
                                    <a href="<?php echo base_url(); ?>student/homestudent/index" class="btn btn-secondary">Back</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('student/studentFooter'); ?>
<script type="text/javascript">
function checkPasswordMatch() {
    var password = $("#newPass").val();
    var confirmPassword = $("#rePass").val();
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
    $("#rePass").keyup(checkPasswordMatch);
  });
  // function checkPassword() {
  //   var password = $("#newPass").val();
  //   var confirmPassword = $("#pass").val();
  //   if (password != confirmPassword){
  //     $("#submit").prop('disabled', false);
  //   }
  //   else{
  //     $("#checkPassword").html("New Passwords should be different.");
  //     $("#submit").prop('disabled', true);
  //   }
  // }
  // $(document).ready(function () {
  //   $("#newPass").keyup(checkPassword);
  // });
</script>