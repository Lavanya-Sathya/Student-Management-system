<?php $this->load->view('student/studentHeader'); ?>
    <aside class="main-sidebar sidebar-light-primary elevation-4 " id="sideImage">
        <div class="sidebar">
            <nav class="mt-2 " id="sideColor" style="height:110vh" >
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item text-center">
                    <?php if($stud['image'] != "" && file_exists('./public/images/student_images/'.$stud['image'])){ ?>
                        <img id="headerImg" src="<?php echo base_url().'public/images/student_images/'.$stud['image']; ?>" height="200px" width="200px">
                    <?php  } else {  ?>
                         
                        <img  id="headerImg"  src="<?php echo base_url().'public/images/images.jpg'; ?>" height="200px" width="200px">
                    <?php } ?>
                    </li>
                    <div id="list">
                    <li class="nav-item">
                        <h6><Strong class="text-center"><?php echo $stud['USN']; ?></Strong></h6>
                    </li>
                    <li class="nav-item">
                        <h6><Strong class="text-center"><?php echo $stud['name']; ?></Strong></h6>
                    </li>
                    <li class="nav-item">
                        <h6><Strong class="text-center"><?php echo $stud['email_id']; ?></Strong></h6>
                    </li>
                    <li class="nav-item">
                        <h6><Strong class="text-center"><?php echo $dept['d_name']; ?></Strong></h6>
                    </li>
                    <li class="nav-item">
                        <h6><Strong class="text-center"><?php echo $sem['section']; ?></Strong></h6>
                    </li>
                    <li class="nav-item">
                        <?php if($stud['status']==1){ ?>
                          <h4 style="color:green">Your profile is Approved</h4>
                        <?php } else { ?>
                            <h5 style="color:red">Your profile is Not Approved yet. Fill the details in the profile section and inform your co-ordinator or admin and get your profile approved. To get any further Notifications and also to participate in Feedback</h5>
                        <?php } ?>
                    </li>
          </div>
                 </ul>
            </nav>
        </div>
    </aside>
   
    <div class="content-wrapper">
        <div class="content" >
            <div class="container-fluid" >
                <div class="row">
                <?php if(!empty($this->session->flashdata('success'))){ ?>
                                <div class="alert alert-success">
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div> 
                            <?php } ?>
                <?php if(!empty($this->session->flashdata('error'))){ ?>
                                <div class="alert alert-danger">
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div> 
                            <?php } ?>
                    <div class="col-lg-12">
                        <div class="card" >
                            <div class="card-body">
                                <h3>Welcome &nbsp; <strong><?php echo $stud['name']; ?></strong>[<?php echo "  ".$stud['USN']; ?>]</h3>
                            </div>
                        </div>
                        <div class="card" >
                            <div class="card-primary">
                                <div class="card-header">
                                    <div class="card-title">Notification</div>
                                </div>
                            </div>
                            
                            <div class="card-body">
                            
                                <table class="table">
                                    <?php if(!empty($notice)) { ?>
                                    <tr>
                                        <td>Date</td>
                                        <td>Notification</td>
                                    </tr>
                                    <?php foreach($notice as $notice){ ?>
                                    <tr>
                                        <td> <?php echo date('d M Y',strtotime($notice['created_at'])); ?></td>   
                                        <td> <strong class="text-justify"><?php echo $notice['comment']; ?></strong></td>
                                    </tr>
                                    <?php } } else{ ?>
                                        No notification. please get Approval for your profile if not approved yet. 
                                    <?php } ?>
                                </table>
                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <?php $this->load->view('student/studentFooter'); ?>
