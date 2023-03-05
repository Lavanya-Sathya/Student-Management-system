<div class="content" id="editContent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <?php if($this->session->flashdata('success')!="") {?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php } ?>
        <div class="card-primary">
          <form action="<?php echo base_url().'admin/semclass/edit/'.$sem['sem_id']; ?>" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="name"> Class Name</label>
                <input type="text" value="<?php echo set_value('name',$sem['section']); ?>" class="form-control <?php echo (form_error('name') !='') ? 'is-invalid' : ''; ?>" name="name" id="name"  >
                <?php echo form_error('name'); ?>
              </div>
            </div>
            <div class="card-footer">
              <button class="btn btn-primary" name="submit" type="submit">
                Submit
              </button>
              <a href="<?php echo base_url().'admin/semclass/index/'.$sem['d_no']; ?>" class="btn btn-secondary">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
  
