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
          <h1 class="m-0">Department</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Department</li>
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
                    <input type="text" value="<?php echo $queryString; ?>" class="form-control" placeholder="search" name="q">
                    <div class="input-group-append">
                      <button class="input-group-text" id="basic-addon1">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-tools">
                <button id="create" class="btn btn-primary"><i class="fas fa-plus"></i> Create</button>
              </div>
            </div>
            <div id="edits"></div>
            <div class="card-body">
              <table class="table">
                <tr>
                  <th width="50">#</th>
                  <th>Department Name</th>
                  <th>Classes Associated With Dept</th>
                  <th width="150" class="text-center">Action</th>
                </tr>
                <?php 
                $count=1;
                if(!empty($department)){
                  foreach($department as $deptRow){ ?>
                    <tr>
                      <td width="50"><?php echo $count; ?></td>
                      <td><?php echo $deptRow['d_name']; ?></td>
                      <td>
                        <div class="card-tools">
                          <a href="<?php echo base_url().'admin/semclass/index/'.$deptRow['d_id']; ?>" class="btn btn-primary"> Class</a>
                        </div>
                      </td>
                      <td width="150" class="text-center">
                        <button id="editButton" onclick="editDepartment(<?php echo $deptRow['d_id']; ?>)" class="btn btn-primary">
                          <i class="far fa-edit"></i>
                        </button>
                        <a href="javascript:void(0);" onclick="deleteDepartment(<?php echo $deptRow['d_id']; ?>)" class="btn btn-danger">
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
            <form id="createForm" action="<?php echo base_url().'admin/department/index'; ?>" method="post">
              <div class="card-body bg-light">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" value="<?php echo set_value('name'); ?>" class="form-control <?php echo (form_error('name') !='') ? 'is-invalid' : ''; ?>" name="name" id="name" placeholder="Create New Department">
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
  console.log("create button: "+ createButton);
  console.log("create from: "+ FormCreate);

  function toggle(){
    FormCreate.style.visibility = FormCreate.style.visibility==="hidden" ? "visible" : "hidden";
    console.log("Toggle called: "+ FormCreate.style.visibility);

  }
  toggle();
  createButton.addEventListener("click",toggle,false);

  function editDepartment(id){
      var a = new XMLHttpRequest();
      a.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
          document.getElementById("edits").innerHTML=this.responseText;
        }
      };
      a.open("GET","<?php echo base_url().'admin/department/edit/' ?>"+id,true);
      a.send();
  }
  function deleteDepartment(id){
      if(confirm("Are you sure. You want to delete Department? If You delete the department all the Class and Subject associated with it will be deleted")){
        window.location.href="<?php echo base_url().'admin/department/delete/'; ?>"+id;
      }
  }
  
</script>