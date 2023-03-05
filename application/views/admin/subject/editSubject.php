
    <div class="content" id="editContent">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
          <?php if($this->session->flashdata('success')!="") {?>
              <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>

              <?php } ?>
              
            <div class="card-primary">
             <div class="card-header">
                <div class="card-title">
                    Edit Subject

                </div>
                
             </div>
             <form action="<?php echo base_url().'admin/subject/edit/'.$subject['subject_id']; ?>" method="post">

             <div class="card-body">
             <div class="form-group">
                    <label for="code"> Subject Code</label>
                    <input type="text" value="<?php echo set_value('code',$subject['subject_code']); ?>" class="form-control <?php echo (form_error('code') !='') ? 'is-invalid' : ''; ?>" name="code" id="code"  >
                    <?php echo form_error('code'); ?>
                </div>
                
                <div class="form-group">
                    <label for="name"> Subject Name</label>
                    <input type="text" value="<?php echo set_value('name',$subject['subject_name']); ?>" class="form-control <?php echo (form_error('name') !='') ? 'is-invalid' : ''; ?>" name="name" id="name"  >
                    <?php echo form_error('name'); ?>
                </div>
               
         
             </div>
                <div class="card-footer">
                    <button class="btn btn-primary" name="submit" type="submit">
                        Submit
                    </button>
                    <a href="<?php echo base_url().'admin/subject/index/'.$subject['sem_id']; ?>" class="btn btn-secondary">Back</a>
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


