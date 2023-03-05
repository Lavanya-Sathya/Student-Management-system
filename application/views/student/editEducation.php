<div class="content " id="editContent">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <?php if($this->session->flashdata('success')!="") {?>
          <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php } ?>
              <h6>Edit for Class <?php echo $edu['qualification']; ?></h6>
        <form action="<?php echo base_url().'student/homestudent/educationEdit/'.$edu['id']; ?>" method="post">
            <div class="educlass">
                <label for="institute">Institute</label>
                <input type="text" value="<?php echo set_value('institute',$edu['institute']); ?>" class="form-control <?php echo (form_error('institute') !='') ? 'is-invalid' : ''; ?>" name="institute" id="institute" placeholder="Enter Your Institute">
                <?php echo form_error('name'); ?>
            </div>
            <div class="educlass">
                <label for="year_of_passing">Year of Passing</label>
                <input type="text" value="<?php echo set_value('year_of_passing',$edu['year_of_passing']); ?>" class="form-control <?php echo (form_error('year_of_passing') !='') ? 'is-invalid' : ''; ?>" name="year_of_passing" id="year_of_passing" placeholder="Enter year of passing">
                <?php echo form_error('name'); ?>
            </div>
            <div class="educlass">
                <label for="percentage">Secured % / Grade</label>
                <input type="text" value="<?php echo set_value('percentage',$edu['percentage']); ?>" class="form-control <?php echo (form_error('percentage') !='') ? 'is-invalid' : ''; ?>" name="percentage" id="percentage" placeholder="Enter Percentage/Grade">
                <?php echo form_error('name'); ?>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" name="submit" type="submit">
                    Submit
                </button>
                <a href="<?php echo base_url().'student/homestudent/profile/'.$edu['USN']; ?>" class="btn btn-secondary">Back</a>
            </div>
            
        </form>
      </div>
    </div>
  </div>
</div>
