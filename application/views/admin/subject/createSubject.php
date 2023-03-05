<?php
$this->load->view('admin/header');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Subject</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/subject/index">Subject</a></li>
              <li class="breadcrumb-item active">Create New Subject</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
          <?php if($this->session->flashdata('success')!="") {?>
              <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>

              <?php } ?>
              
            <div class="card-primary">
             <div class="card-header">
                <div class="card-title">
                    Create New Subject

                </div>
                
             </div>
             <form action="<?php echo base_url(); ?>admin/subject/create" method="post">

             <div class="card-body">
             <div class="form-group">
                    <label for="code"> Subject Code</label>
                    <input type="text" value="<?php echo set_value('code'); ?>" class="form-control <?php echo (form_error('code') !='') ? 'is-invalid' : ''; ?>" name="code" id="code"  >
                    <?php echo form_error('code'); ?>
                </div>
                <div class="form-group">
                    <label for="name"> Subject Name</label>
                    <input type="text" value="<?php echo set_value('name'); ?>" class="form-control <?php echo (form_error('name') !='') ? 'is-invalid' : ''; ?>" name="name" id="name"  >
                    <?php echo form_error('name'); ?>
                </div>
                
                <div class="form-group">
                    <label for="semester">Semester Name</label>
                    <select name="semester" id="semester" class="form-control <?php echo  (form_error('semester') !='') ? 'is-invalid' : ''; ?>">
                        <option value="">Select Semester</option>
                        <?php  if(!empty($sem)){
                             foreach($sem as $semRow){ ?>
                                <option <?php echo set_select('semester',$semRow['sem_id'],false); ?> value="<?php echo $semRow['sem_id']; ?>"><?php echo $semRow['section']; ?></option>
                         <?php }} ?>   
                    </select>
                    <?php echo form_error('semester'); ?>
                    
                </div>
                <div class="form-group">
                    <label for="dept_id">Department Name</label>
                    <select name="dept_id" id="dept_id" class="form-control <?php echo  (form_error('dept_id') !='') ? 'is-invalid' : ''; ?>">
                        <option value="">Select Department</option>
                        <?php  if(!empty($dept)){
                             foreach($dept as $deptRow){ ?>
                                <option <?php echo set_select('dept_id',$deptRow['d_id'],false); ?> value="<?php echo $deptRow['d_id']; ?>"><?php echo $deptRow['d_name']; ?></option>
                         <?php }} ?>   
                    </select>
                    <?php echo form_error('dept_id'); ?>
                    
                </div>


             </div>
                <div class="card-footer">
                    <button class="btn btn-primary" name="submit" type="submit">
                        Submit
                    </button>
                    <a href="<?php echo base_url(); ?>admin/subject/index" class="btn btn-secondary">Back</a>
                </div>

             </form>
            </div>

          </div>
          <!-- /.col-md-6 -->
        
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
$this->load->view('admin/footer');
?>