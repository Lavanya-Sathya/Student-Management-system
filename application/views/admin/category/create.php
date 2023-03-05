<?php
$this->load->view('admin/header');
?>
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/category/index">Categories</a></li>
              <li class="breadcrumb-item active">Create New Category</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

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
                    Create New Category

                </div>
                
             </div>
             <form id="categoryForm" name="categoryForm" enctype= "multipart/form-data"
 action="<?php echo base_url(); ?>admin/category/create" method="post">

             <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="<?php echo set_value('name'); ?>" class="form-control <?php echo (form_error('name') != "") ? 'is-invalid' : ''; ?>">
                    <?php echo form_error('name'); ?>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <br>
                    <input type="file" name="image" id="image" class="<?php echo (!empty($errorImageUpload)) ? 'is-invalid' : ''; ?>">
                    <?php echo (!empty($errorImageUpload)) ?  $errorImageUpload : ''; ?>
                </div>
                

                <div class="custom-control custom-radio float-left">
                    <input class="custom-control-input" value="1"  type="radio" name="status" id="statusActive" checked="">
                    <label for="statusActive" class="custom-control-label">Active</label>
                   
                </div>
                <div class="custom-control custom-radio float-left ml-3">
                    <input class="custom-control-input" value="0"  type="radio" name="status" id="statusBlock" >
                    <label for="statusBlock" class="custom-control-label">Block</label>
                   
                </div>

             </div>
                <div class="card-footer">
                    <button class="btn btn-primary" name="submit" type="submit">
                        Submit
                    </button>
                    <a href="<?php echo base_url(); ?>admin/category/index" class="btn btn-secondary">Back</a>
                </div>

             </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>


<?php
$this->load->view('admin/footer');
?>