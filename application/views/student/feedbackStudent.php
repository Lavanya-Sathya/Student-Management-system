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
            <div class="card-primary">
                <div class="card-header">
                    <div class="card-title m-2"> <h5>Feedback Section</h5> </div>
                </div>
            </div>
            <div class="card-header">
              <div class="card-title">
                <h5><strong> Department : </strong> <?php echo $dept['d_name']; ?></h5>
                <h5><strong> Semester : </strong> <?php echo $sem['section']; ?></h5>
              </div>
              
            </div>
            <form id="createForm" action="<?php echo base_url().'student/homestudent/feedback/'.$stud['USN']; ?>" method="post">

            <div class="card-body" id="cardHeight">
              <table class="table ">
                <tr>
                  <th width="50">#</th>
                  <th>Subject Code</th>
                  <th>Subject Name</th>
                  <th>Feedback Course wise</th>
                </tr>
                <?php 
                  $count = 1;
                  if(!empty($sub)){
                    foreach($sub as $subjectRow){ 
                ?>
                      <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $subjectRow['subject_code']; ?>
                            <input type="text" value="<?php echo $subjectRow['subject_code']; ?>" name="sub_id[]" style="display:none">  </td>
                        <td><?php echo $subjectRow['subject_name']; ?></td>
                        <td >
                            <select name="points[]" id="points" class="form-control <?php echo (form_error('points[]') !='') ? 'is-invalid' : ''; ?>">
                                <option value=" ">Select Points</option>
                                <option  <?php echo set_select('points','1'); ?> value="1">1(Poor)</option>
                                <option <?php echo set_select('points','2'); ?> value="2">2(Below Average)</option>
                                <option <?php echo set_select('points','3'); ?> value="3">3(Average)</option>
                                <option <?php echo set_select('points','4'); ?> value="4">4(Good)</option>
                                <option <?php echo set_select('points','5'); ?> value="5">5(Excellent)</option>
                            </select>
                        </td>
                      </tr>
                      <?php   
                      $count++;
                      }
                      } else{ ?>
                      <tr>
                        <td colspan="4">No Course Assigned yet</td>
                      </tr>
                   <?php } ?>
              </table>
            </div>
            <div class="card-footer">
              <button class="btn btn-primary mr-5" id="submitDisable" type="submit" name="submit" style="float:right">Submit your feedback</button>
            </div>
            </form>
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
  var blocks='<?php echo $block; ?>';
  if(blocks==1){
    document.getElementById("submitDisable").disabled = true;

  }

</script>

<?php $this->load->view('student/studentFooter'); ?>