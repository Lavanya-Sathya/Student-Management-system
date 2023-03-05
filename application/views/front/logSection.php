<?php $this->load->view('front/header'); ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-body " id="divClass">
                <div id="sections">
                    <h4>Sign In</h4>
                    <h6>If you have any problem, while sign in please contact your admin</h6>
                    <div class="card-body mt-3">
                        <a href="<?php echo base_url().'student/loginstudent/index'; ?>" id="studentLogIn">
                             Log in As Student
                        </a> <br>
                    </div>
                    <div class="card-body mt-3 mb-3">
                        <a href="<?php echo base_url().'admin/login/index'; ?>" id="adminLogIn">
                            Log in As Admin
                        </a>
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div>

 
<?php $this->load->view('front/footer'); ?>
