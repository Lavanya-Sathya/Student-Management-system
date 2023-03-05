<aside class="main-sidebar sidebar-light-primary elevation-4 " id="sideImage">
        <div class="sidebar">
            <nav class="mt-2 " id="sideColor">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item text-center">
                        <img src="<?php echo base_url().'public/images/images.jpg' ?>" height="200px" width="200px" alt="">
                    </li>
                    <div id="list">
                    <li class="nav-item text-center">
                        <h6><Strong class="text-center"><?php echo $student['USN']; ?></Strong></h6>
                    </li>
                    <li class="nav-item">
                        <h6><Strong class="text-center"><?php echo $student['name']; ?></Strong></h6>
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
          </div>
                 </ul>
            </nav>
        </div>
    </aside>
    <div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
        <div class="row" id="centerPart">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" style="height:450px">
                        <h3>Welcome &nbsp; </h3>
                        <h3><strong><?php echo $student['name']; ?></strong></h3>
                        <h4>[<?php echo "  ".$student['USN']; ?>]</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>