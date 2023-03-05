<?php $this->load->view('front/header'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center pt-4">Contact Us</h3>
            <div class="container mt-5">                    
                <div class="row">
                    <div class="col-md-8 m-auto w-50">
                        <div class="card mb-5">
                            <div class="card-header bg-secondary text-white">
                                Have questions or Comments?
                            </div>
                            <div class="card-body">
                            <?php if(!empty($this->session->flashdata('msg'))){ ?>
                                <div class="alert alert-success">
                                    <?php echo $this->session->flashdata('msg'); ?>
                                </div> 
                            <?php } ?>
                                <form action="<?php echo base_url().'page/contact'; ?>" method="post" id="contact-form" name="contact-form">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" value="<?php echo set_value('name'); ?>" class="form-control <?php echo (!empty(form_error('name'))) ?'is-invalid' :''; ?>">
                                        <?php echo form_error('name'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>" class="form-control <?php echo (!empty(form_error('email'))) ?'is-invalid' :''; ?>">
                                        <?php echo form_error('email'); ?>
                                    </div> 
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea name="message" id="message" rows="5" class="form-control"><?php echo set_value('message'); ?></textarea>
                                    </div>
                                    <button type="submit" id="submit" class="btn btn-primary">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('front/footer'); ?>
