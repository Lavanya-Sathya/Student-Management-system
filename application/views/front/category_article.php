<?php $this->load->view('front/header'); ?>

<div class="container">
    <h3 class="pt-4 pb-4">Events / <?php echo $categories['name']; ?></h3>
    <?php if(!empty($articles)){ 
        foreach($articles as $articleRow){ ?>
    <div class="row mb-5">
        <div class="col-md-4">
            <?php if(!empty($articleRow['image'])){  ?>
                <img class="w-100 rounded" src="<?php echo base_url().'public/uploads/articles/thumb_admin/'.$articleRow['image']; ?>" alt="">
            <?php } ?>
        </div>
        <div class="col-md-8">
            <p class="bg-light pt-2 pb-2 pl-3 ">
                <a href="<?php echo base_url().'event/category/'.$categories['id']; ?>" class="text-muted text-uppercase"><?php echo $articleRow['category_name']; ?></a>
            </p>
            <h3><a class="text-justify" href="<?php echo base_url().'event/detail/'.$articleRow['id']; ?>"><?php echo $articleRow['title']; ?></a></h3>
            <p class="text-justify"><?php echo word_limiter(strip_tags($articleRow['description']),20); ?>
                <a href="<?php echo base_url().'event/detail/'.$articleRow['id']; ?>">Read more</a>
            </p>
            <p class="text-muted ">Posted By <strong><?php echo $articleRow['author']; ?></strong> on <strong><?php echo date('d M Y',strtotime($articleRow['created_at'])); ?></strong></p>
            
        </div>
    </div>
    <?php } } ?>
    <div class="row">
        <div class="col-md-12">
            <?php echo $pagination_links; ?>
        </div>
    </div>
</div>

<?php $this->load->view('front/footer'); ?>
