<footer class="bg-light pt-4 mt-5">
        <div class="container  pb-4">
            <div class="row">
                <div class="col-md-3">
                    <i class="fa-sharp fa-solid fa-graduation-cap"></i>
                    <h5><a href="<?php echo base_url(); ?>" class="text-muted">Student Management System</a></h5>
                    
                </div>
                <div class="col-md-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled text-small">
                        <li><a href="<?php echo base_url(); ?>" class="text-muted">Home</a></li>
                        <li><a href="<?php echo base_url().'page/about'; ?>" class="text-muted">About Us</a></li>
                        <li><a href="<?php echo base_url().'page/academic'; ?>" class="text-muted">Academics</a></li>
                        <li><a href="<?php echo base_url().'event/index'; ?>" class="text-muted">Events</a></li>

                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>My Account</h5>
                    <ul class="list-unstyled text-small">
                        <li><a href="<?php echo base_url().'student/loginstudent/register'; ?>" class="text-muted">Register</a></li>
                        <li><a href="<?php echo base_url().'student/loginstudent/index'; ?>" class="text-muted">Log in</a></li>

                    </ul>
                    
                </div>
                <div class="col-md-3">
                    <h5>Support</h5>
                    <ul class="list-unstyled text-small">
                        <li><a href="<?php echo base_url().'page/contact'; ?>" class="text-muted">Contact us</a></li>
                        <small class="text-muted">
                            <strong>Institute Inc</strong><br>                        
                            <i class="fa-solid fa-location-dot"></i> 1/11 Avenue Road Bengaluru <br>
                            <i class="fa-solid fa-phone"></i> 98XXXXXXXX <br>
                            <i class="fa-solid fa-envelope"></i> sathyalavanya5@gmail.com                        
                        </small>
                    </ul>
                    
                </div>

            </div>
        </div>
    </footer>
    <div class="bg-secondary text-white">
        <div class="container p-3">
             &copy; Copyright 2022. All Rights Reserved.
        </div>
        
    </div>
   
    <script src="<?php echo base_url('public/js/jquery-3.2.1.slim.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>

  </body>
</html>