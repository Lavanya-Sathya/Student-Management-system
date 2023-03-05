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
            <h1 class="m-0">Articles</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Articles</li>
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
                    <a href="<?php echo base_url().'admin/article/createArticle'; ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
                </div>
             </div>
             <div class="card-body">
                <table class="table">
                    <tr>
                        <th width="50">#</th>
                        <th width="100">Image</th>
                        <th>Title</th>

                        <th>Author</th>
                        <th width="100">Created at</th>
                        <!-- <th width="100">Description</th> -->
                        <th width="70">Status</th>
                        <th width="150" class="text-center">Action</th>

                    </tr>
                    <?php if(!empty($article)){
                        foreach($article as $articleRow){ ?>
                        <tr>
                            <td width="50"><?php echo $articleRow['id']; ?></td>
                            <td width="70"><?php  
                              $path='./public/uploads/articles/thumb_front/'.$articleRow['image'];
                              if($articleRow['image'] != "" && file_exists($path)){ ?>
                              <img height="70px" class="w-100" src="<?php echo base_url().'/public/uploads/articles/thumb_front/'.$articleRow['image'] ?>" alt="Image not available">   
                            <?php } ?></td>
                            <td><?php echo $articleRow['title']; ?></td>

                            <td><?php echo $articleRow['author']; ?></td>
                            <td width="100"><?php echo $articleRow['created_at']; ?></td>
                            <td width="70">
                                <?php if($articleRow['status']==1){ ?>
                                    <span class="badge badge-success">Active</span>
                                <?php } else { ?>
                                    <span class="badge badge-danger">Block</span>
                                <?php } ?>
                            </td>
                            <td width="150" class="text-center">
                                <a href="<?php echo base_url().'admin/article/editArticle/'.$articleRow['id'] ?>" class="btn btn-primary">
                                <i class="far fa-edit"></i>
                                </a>
                                <a href="javascript:void(0);" onclick="deleteArticle(<?php echo $articleRow['id']; ?>)" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                                </a>

                            </td>
                        </tr>


                    <?php    }
                    } else{ ?>
                        <tr>
                            <td colspan="7">No Records found</td>
                        </tr>
                   <?php } ?>
          
                    
                </table>
                <div>
                  <?php echo $pagination_links; ?>
                </div>
             </div>

            </div>

          </div>
          <!-- /.col-md-6 -->
        
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php
$this->load->view('admin/footer');
?>
<script type="text/javascript">
  function deleteArticle(id){
      if(confirm("Are you sure. You want to delete Article?")){
        window.location.href="<?php echo base_url().'/admin/article/deleteArticle/'; ?>"+id;
      }
  }
</script>