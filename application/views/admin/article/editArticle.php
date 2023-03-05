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
            <h1 class="m-0">Article</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/article/index">Article</a></li>
              <li class="breadcrumb-item active">Edit Article</li>
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
              
            <div class="card-primary">
             <div class="card-header">
                <div class="card-title">
                Edit Article "<?php echo $articles['title']; ?>"

                </div>
                
             </div>
             <form id="categoryForm" name="categoryForm" enctype= "multipart/form-data" action="<?php echo base_url().'admin/article/editArticle/'.$articles['id']; ?>" method="post">

             <div class="card-body">
                <div class="form-group">
                    <label for="name">Category</label>
                    <select name="category_id" id="category_id" class="form-control <?php echo  (form_error('category_id') !='') ? 'is-invalid' : ''; ?>">
                        <option value="">Select Category</option>
                        <?php  if(!empty($category)){
                             foreach($category as $categoryRow){ 
                              $selected=($articles['category']==$categoryRow['id']) ? true : false; ?>
                                <option <?php echo set_select('category_id',$categoryRow['id'],$selected); ?> value="<?php echo $categoryRow['id']; ?>"><?php echo $categoryRow['name']; ?></option>
                         <?php }} ?>   
                    </select>
                    <?php echo form_error('category_id'); ?>
                    
                </div>
                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" value="<?php echo set_value('title',$articles['title']); ?>" class="form-control <?php echo (form_error('title') !='') ? 'is-invalid' : ''; ?>" name="title" id="title"  >
                    <?php echo form_error('title'); ?>
                </div>
                <div class="form-group">
                    <label for="name">Description</label>
                    <textarea name="description" id="description" class="textarea" value="<?php echo set_value('description',$articles['description']);  ?>" ><?php echo set_value('description',$articles['description']);  ?></textarea>
                    
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <br>
                    <input type="file" name="image" id="image" class="<?php echo (!empty($ImageErrors)) ? 'is-invalid' : ''; ?>">
                    <?php if(!empty($ImageErrors)) echo $ImageErrors; ?>
                    <br>
                    <?php if($articles['image']!="" && file_exists('./public/uploads/articles/thumb_admin/'.$articles['image'])){ ?>
                        <img class="mt-3" src="<?php echo base_url().'/public/uploads/articles/thumb_admin/'.$articles['image'] ?>" alt="">
                    <?php }
                    ?>

                </div>
                <div class="form-group">
                    <label for="name">Author</label>
                    <input type="text"  class="form-control <?php echo (form_error('author') !='') ? 'is-invalid' : ''; ?>" value="<?php echo set_value('author',$articles['author']); ?>" name="author" id="author" >
                    <?php echo form_error('author'); ?>

                </div>
                

                <div class="custom-control custom-radio float-left">
                    <input class="custom-control-input" value="1"  type="radio" name="status" id="statusActive" <?php echo ($articles['status']==1) ? 'checked' : '' ;?>>
                    <label for="statusActive" class="custom-control-label">Active</label>
                   
                </div>
                <div class="custom-control custom-radio float-left ml-3">
                    <input class="custom-control-input" value="0"  type="radio" name="status" id="statusBlock" <?php echo ($articles['status']==0) ? 'checked' : '' ;?>>
                    <label for="statusBlock" class="custom-control-label">Block</label>
                   
                </div>

             </div>
                <div class="card-footer">
                    <button class="btn btn-primary" name="submit" type="submit">
                        Update
                    </button>
                    <a href="<?php echo base_url(); ?>admin/article/index" class="btn btn-secondary">Back</a>
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
  </div>
  <!-- /.content-wrapper -->


<?php
$this->load->view('admin/footer');
?>