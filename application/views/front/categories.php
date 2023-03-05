<?php $this->load->view('/front/header'); ?>

<div class="container">
    <h3 class="pt-4 pb-4">Categories</h3>
    <div class="row">
        <?php if(!empty($categories)){
            foreach($categories as $categoryRow){  ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <a href="#">
                    <?php if(!empty($categoryRow['image'])){ ?>
                        <img src="<?php echo base_url().'public/uploads/category/thumb/'.$categoryRow['image']; ?>" alt="">

                    <?php } ?>
                </a>
                <div class="card-body pb-0 pt-3">                    
                    <a href="<?php echo base_url().'event/category/'.$categoryRow['id']; ?>">
                        <h5 class="card-title"><?php echo $categoryRow['name']; ?></h5>
                    </a>
                </div>
            </div>
        </div>
        <?php } } ?>
    </div>
</div>
<?php $this->load->view('/front/footer'); ?>
