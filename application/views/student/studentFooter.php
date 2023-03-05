<footer class="bg-light pt-1 mt-1">
        <div class="container  pb-4">
            <div class="row">
               

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
    <script src="<?php echo base_url(); ?>/public/admin/dist/js/adminlte.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/admin/plugins/jquery/jquery.min.js"></script>

    <script>
        var status='<?php echo $stud['status'];  ?>'
     if (status==0) {
        document.getElementById("feedbackLink").disabled = true;
     }
    </script>
  </body>
</html>