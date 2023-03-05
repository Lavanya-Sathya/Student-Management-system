<?php $this->load->view('student/studentHeader');  ?>

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
          <div class="card m-5">
            <div class="card-header">
              <div class="card-title">
                <h5><strong> Department : </strong> <?php echo $dept['d_name']; ?></h5>
                <h5><strong> Semester : </strong> <?php echo $sem['section']; ?></h5>
              </div>
              
            </div>
            <div class="card-body" id="cardHeight">
              <table class="table ">
                <tr>
                  <th width="50">#</th>
                  <th>Subject Code</th>
                  <th>Subject Name</th>
                </tr>
                <?php 
                  $count = 1;
                  if(!empty($sub)){
                    foreach($sub as $subjectRow){ 
                ?>
                      <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $subjectRow['subject_code']; ?></td>
                        <td><?php echo $subjectRow['subject_name']; ?></td>
                      </tr>
                      <?php   
                      $count++;
                      }
                      } else{ ?>
                      <tr>
                        <td colspan="3">No Course Assigned yet</td>
                      </tr>
                   <?php } ?>
              </table>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  var count='<?php echo $count; ?>'
  if(count<=3){
    var cardHeight = document.getElementById("cardHeight");
    cardHeight.style.height="50vh";
  }
</script>

<?php $this->load->view('student/studentFooter'); ?>