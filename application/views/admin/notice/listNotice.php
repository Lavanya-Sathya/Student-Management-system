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
              <a href="<?php echo base_url(); ?>admin/notice/create" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
              </div>
            </div>
            
            <div class="card-body">
              <table class="table">
                <tr>
                  <th width="50">#</th>
                  <th>USN</th>
                  <th>Department</th>
                  <th>Class</th>
                  <th>Notice</th>
                  <th>Created at</th>
                  <th width="150" class="text-center">Action</th>
                </tr>
                <?php 
                $count=1;
                if(!empty($notice)){
                  foreach($notice as $noticeRow){ ?>
                    <tr>
                      <td width="50"><?php echo $count; ?></td>
                      <td><?php echo $noticeRow['USN']; ?></td>
                      <td><?php echo $noticeRow['dept_id']; ?></td>
                      <td><?php echo $noticeRow['sem_id']; ?></td>
                      <td><?php echo $noticeRow['comment']; ?></td>
                      <td><?php echo $noticeRow['created_at']; ?></td>

                      <td width="150" class="text-center">
                        <a href="javascript:void(0);" onclick="deleteNotice(<?php echo $noticeRow['id']; ?>)" class="btn btn-danger">
                          <i class="far fa-trash-alt"></i>
                        </a>
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

  function deleteNotice(id){
      if(confirm("Are you sure. You want to delete Notice? ")){
        window.location.href="<?php echo base_url().'admin/notice/delete/'; ?>"+id;
      }
  }
  
</script>