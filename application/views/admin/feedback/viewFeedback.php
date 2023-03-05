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
          <h1 class="m-0">Feedback</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Feedback</li>
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
            <div id="edits"></div>
            <div class="card-body">
              <table class="table">
                <tr>
                  <th width="50">#</th>
                  <th>Subject code</th>
                  <th>Subject Name</th>
                  <th>Average Points</th>
                  <th>No. of Students</th>
                  <th>Details</th>
                  <th class="text-center">Actions</th>

                </tr>
                <?php 
                $count=1;
                if(!empty($feed)){
                  foreach($feed as $feedRow){ ?>
                    <tr>
                      <td width="50"><?php echo $count; ?></td>
                      <td><?php echo $feedRow['sub_id']; ?></td>
                      <td><?php if(!empty($sub)){
                                    foreach($sub as $subRow){
                                        if($subRow['subject_code']==$feedRow['sub_id']){
                                            echo $subRow['subject_name'];
                                        }
                                    }
                                } ?>
                      </td>
                      <td><?php echo $feedRow['points_avg']; ?></td>
                      <td><?php echo $feedRow['countPoints']; ?></td>
                      <td>
                        <?php $feedbackSub= $feedRow['sub_id']; ?>
                        <a href="<?php echo base_url().'admin/feedback/studentFeed/'.$feedRow['sub_id']; ?>" class="btn btn-primary">
                          <i class="far fa-edit"></i>
                        </a>
                      </td>
                      <td>
                        <?php $feedbackSub= $feedRow['sub_id']; ?>
                        <a href="javascript:void(0);" onclick="deleteFeedback('<?php echo $feedbackSub; ?>')" class="btn btn-danger">
                          <i class="far fa-trash-alt"></i>
                        </a>
                      </td>
                    </tr>
                    <?php  
                      $count++;  
                    }
                    } else{ ?>
                    <tr>
                      <td colspan="7">Please Select Department and section to see the Feedback section wise</td>
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
  function deleteFeedback(id){
      if(confirm("Are you sure. You want to delete the feedback for this course? ")){
        window.location.href="<?php echo base_url().'admin/feedback/delete/'; ?>"+id;
      }
  }
</script>