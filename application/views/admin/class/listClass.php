<?php
$this->load->view('admin/header');
?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Class</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Class</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

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
                <h5><strong> Department : </strong> <?php echo $dept['d_name']; ?></h5>
              </div>
              <div class="card-tools" id="create">
                <button class="btn btn-primary"><i class="fas fa-plus"></i> Create</button>
              </div>
            </div>
            <div id="edits"></div>
            <div class="card-body">
              <table class="table">
                <tr>
                  <th width="50">#</th>
                  <th>Class Name</th>
                  <th>Class wise Subjects</th>

                  <th width="150" class="text-center">Action</th>
                </tr>
                <?php 
                  $count=1;
                  if(!empty($sem)){
                    foreach($sem as $semRow){ ?>
                      <tr>
                        <td width="50"><?php echo $count; ?></td>
                        <td><?php echo $semRow['section']; ?></td>
                       
                        <td>
                          <div class="card-tools">
                            <a href="<?php echo base_url().'admin/subject/index/'.$semRow['sem_id']; ?>" class="btn btn-primary"> Subject</a>
                          </div>
                        </td>
                        <td width="150" class="text-center">
                          <button onclick="editContent(<?php echo $semRow['sem_id']; ?>)" class="btn btn-primary">
                            <i class="far fa-edit"></i>
                          </button>
                          <a href="javascript:void(0);" onclick="deleteSem(<?php echo $semRow['sem_id']; ?>)" class="btn btn-danger">
                            <i class="far fa-trash-alt"></i>
                          </a>
                        </td>
                      </tr>
                    <?php   
                    $count++;
                    }
                  } else{ ?>
                      <tr>
                        <td colspan="3">No Records found</td>
                      </tr>
                   <?php } ?>
              </table>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url(); ?>admin/department/index" class="btn btn-secondary">Back</a>
            </div>
            <form id="createForm" action="<?php echo base_url().'admin/semclass/index/'.$dept['d_id']; ?>" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="name"> Class Name</label>
                  <input type="text" value="<?php echo set_value('name'); ?>" class="form-control <?php echo (form_error('name') !='') ? 'is-invalid' : ''; ?>" name="name" id="name"  >
                  <?php echo form_error('name'); ?>
                </div>
              </div>
              <div class="card-footer">
                <button class="btn btn-primary" name="submit" type="submit">
                  Submit
                </button>
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
<script type="text/javascript">
  var createButton = document.getElementById("create");
  var FormCreate = document.getElementById("createForm");
  function toggle(){
    FormCreate.style.visibility = FormCreate.style.visibility==="hidden" ? "visible" : "hidden";
    console.log("Toggle called: "+ FormCreate.style.visibility);

  }
  toggle();
  createButton.addEventListener("click",toggle,false);

  function editContent(id){
      var a = new XMLHttpRequest();
      a.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
          document.getElementById("edits").innerHTML=this.responseText;
        }
      };
      a.open("GET","<?php echo base_url().'admin/SemClass/edit/' ?>"+id,true);
      a.send();
  }
  function deleteSem(id){
      if(confirm("Are you sure. You want to delete Class?  If You delete the Class all the Subject associated with it will be deleted")){
        window.location.href="<?php echo base_url().'/admin/semclass/delete/'; ?>"+id;
      }
  }
</script>