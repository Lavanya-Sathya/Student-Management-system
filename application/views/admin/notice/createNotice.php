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
          <h1 class="m-0">Notice</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Notice</li>
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
          <?php if($this->session->flashdata('error')!="") {?>
              <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
          <?php } ?>
          <div class="card">
           
            <div class="card-body">
            
            <form action="<?php echo base_url().'admin/notice/create'; ?>" method="post">
              <div class="card-body">
                <div class="form-group">
                <label for="dept_id">Department</label>
                  <select name="dept_id" id="dept_id" class="form-control <?php echo  (form_error('dept_id') !='') ? 'is-invalid' : ''; ?>">
                    <option value="">Select Department</option>
                    <?php  if(!empty($dept)){
                      foreach($dept as $deptRow){ ?>
                        <option <?php echo set_select('dept_id'); ?> value="<?php echo $deptRow['d_id']; ?>"><?php echo $deptRow['d_name']; ?></option>
                      <?php }} ?>   
                  </select>
                  </div>
                  <div class="form-group">
                  <label for="institute">Class</label>
                  <div id="semBox">
                    <select name="sem_id" id="sem_id" class="form-control">
                      <option value="">Select Semester</option>
                    </select>
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="usn">USN</label>
                  <div id="usnBox">
                    <select name="usn" id="usn" class="form-control">
                      <option value="">Select USN</option>
                    </select>
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="comment">Notice</label>
                  <textarea name="comment"  id="comment" class="form-control <?php echo (form_error('comment') !='') ? 'is-invalid' : ''; ?>" cols="" rows="" placeholder="Enter Notice" ><?php echo set_value('comment'); ?></textarea>
                  <?php echo form_error('comment'); ?>
                </div>
                </div>
              </div>
              <div class="card-footer">
                <button class="btn btn-primary" name="submit" type="submit">
                 Submit
                </button>
                <a href="<?php echo base_url().'admin/notice/index'; ?>" class="btn btn-secondary">Back</a>
              </div>
            </form>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
$this->load->view('admin/footer');
?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#dept_id").change(function(){
            var dept_id=$(this).val();
            $.ajax({
                url:"<?php echo base_url('student/loginstudent/getSemester');?>",
                type:'POST',
                data:{dept_id:dept_id},
                dataType:'json',
                success:function(response){
                    console.log(response);
                    if(response['sem']){
                        $('#semBox').html(response['sem']);
                    }
                }
            });
           $('#usnBox').html('<select name="usn" id="usn" class="form-control">\
                      <option value="">Select USN</option>\
                    </select>');
          });
          $(document).on('change','#sem_id',function(){
            var sem_id=$(this).val();
            $.ajax({
                url:"<?php echo base_url('admin/notice/getUSN');?>",
                type:'POST',
                data:{sem_id:sem_id},
                dataType:'json',
                success:function(response){
                    console.log(response);
                    if(response['usn']){
                        $('#usnBox').html(response['usn']);
                    }
                }
            });          
        });
        });

 
</script>