<div class="content" id="editContent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <?php if($this->session->flashdata('success')!="") {?>
          <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php } ?>
              
        <form action="<?php echo base_url().'admin/department/edit/'.$dept['d_id']; ?>" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="name">Edit Department</label>
              <input type="text" value="<?php echo set_value('name',$dept['d_name']); ?>" class="form-control <?php echo (form_error('name') !='') ? 'is-invalid' : ''; ?>" name="name" id="name"  >
              <?php echo form_error('name'); ?>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-primary" name="submit" type="submit">
              Update
            </button>
            <a href="<?php echo base_url(); ?>admin/department/index" class="btn btn-secondary">Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
