<?php
$this->load->view('admin/header');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Student</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Student</li>
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
            <div class="card-header">
              <div class="card-title">
                <form id="searchFrm" name="searchFrm" action="" method="get">
                  <div class="input-group mb-0">
                  <select name="dept" id="dept" class="form-control">
                        <option value="">Select Department</option>
                        <?php  if(!empty($dept)){
                             foreach($dept as $deptRow){ 
                                 $selected=($queryString==$deptRow['d_id']) ? true : false; ?>
                                <option <?php echo set_select('dept',$deptRow['d_id'],$selected); ?> value="<?php echo $deptRow['d_id']; ?>"><?php echo $deptRow['d_name']; ?></option>
                         <?php }} ?>   
                    </select>                    
                    <div class="input-group-append">
                      <button class="input-group-text" id="basic-addon1" type="submit" >
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                  <div class="input-group mt-3">
                    <div id="semBox">
                      <select name="sem_id" id="sem_id" class="form-control <?php echo  (form_error('sem_id') !='') ? 'is-invalid' : ''; ?>">
                        <option value="">Select Semester</option>
                        <?php if(!empty($sem)){
                                                foreach($sem as $sem){ ?>
                                                    <option <?php echo ($sem_ids==$sem['sem_id'] ? 'selected' : ''); ?> value="<?php echo $sem['sem_id']; ?>"><?php echo $sem['section']; ?></option>
                                                <?php }
                                                } ?>
                      </select>
                    </div>                 
                    <div class="input-group-append">
                      <button class="input-group-text" id="basic-addon1" type="submit" >
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body">
              <table class="table">
                <tr>
                  <th width="50">#</th>
                  <th>Image</th>
                  <th>USN</th>
                  <th>Name</th>
                  <th>Email Id</th>
                  <th>Status</th>
                  <th width="150" class="text-center">Action</th>
                </tr>
                <?php 
                $count=1;
                if(!empty($stud)){
                  foreach($stud as $studRow){ ?>
                    <tr>
                      <td width="50"><?php echo $count; ?></td>
                      <td> <?php if($studRow['image'] != "" && file_exists('./public/images/student_images/'.$studRow['image'])){ ?>
                            <img  class="mt-3" width="50px" height="50px" src="<?php echo base_url().'public/images/student_images/'.$studRow['image']; ?>">
                    <?php  } else {  ?>
                         
                        <img  class="mt-3" width="50px" height="50px" src="<?php echo base_url().'public/images/images.jpg'; ?>">
                    <?php } ?></td>
                      <td><?php echo $studRow['USN']; ?></td>
                      <td><?php echo $studRow['name']; ?></td>
                      <td><?php echo $studRow['email_id']; ?></td>
                      <td>
                        <?php if($studRow['status']==1){ ?>
                          <span class="badge badge-success pl-3 pr-3">Approved</span>
                        <?php } else { ?>
                          <span class="badge badge-danger">Not Approved</span>
                        <?php } ?>
                      </td>


                     
                      <td width="150" class="text-center">
                      <a href="<?php echo base_url().'admin/studentprofile/profile/'.$studRow['USN'];  ?>"class="btn btn-primary">
                          <i class="far fa-edit"></i>Select
                        </button>
                        
                      </td>
                    </tr>
                    <?php  
                      $count++;  
                    }
                    } else{ ?>
                    <tr>
                      <td colspan="7">No Records found</td>
                    </tr>
                    <?php } ?>
              </table>
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
    $(document).on('change','#dept',function(){
      var dept=$(this).val();
      $.ajax({
        url:"<?php echo base_url('student/loginstudent/getSemester');?>",
        type:'POST',
        data:{dept_id:dept},
        dataType:'json',
        success:function(response){
            console.log(response);
            if(response['sem']){
              $('#semBox').html(response['sem']);
            }
          }
      });
           
    });
  });
</script>