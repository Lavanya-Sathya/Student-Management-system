<?php $this->load->view('admin/header'); 
$student=$_SESSION['student']; ?>
    <div class="content-wrapper">
        <div class="content" >
            <div class="container-fluid" >
                <div class="row">
                <?php if(!empty($this->session->flashdata('error'))){ ?>
                                <div class="alert alert-danger">
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div> 
                            <?php } ?>
                            <?php if($this->session->flashdata('success')!="") {?>
              <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
              <?php } ?>
                    <div class="col-lg-12">
                        <div class="card" >
                            <div class="card-body">

                               <h5><?php echo $stud['name']."  [ ".$stud['USN']. " ] <br>"; ?></h5> 
                               <h6><?php echo "Department: ".$dept['d_name']; ?></h6>
                               <h6><?php echo "Class: ".$sem['section']; ?></h6>

                            </div>
                        </div>
                        <div class="card" >
                            <div class="card-primary">
                                <div class="card-header">
                                    <div class="card-title">Student Details</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <td><strong>Date of Birth</strong></td>
                                        <td><?php echo $stud['dob']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Gender</strong></td>
                                        <td><?php echo $stud['gender']; ?></td>
                                    </tr>                                    
                                    <tr>
                                        <td><strong>Blood Group</strong></td>
                                        <td><?php echo $stud['blood_group']; ?></td>
                                    </tr>                                    
                                    <tr>
                                        <td><strong>Phone Number</strong></td>
                                        <td><?php echo $stud['phone_no']; ?></td>
                                    </tr>                                    
                                    <tr>
                                        <td><strong>Email Id</strong></td>
                                        <td><?php echo $stud['email_id']; ?></td>
                                    </tr>                                    
                                    <tr>
                                        <td><strong>Country</strong></td>
                                        <td><?php echo $stud['country']; ?></td>
                                    </tr>                                    
                                    <tr>
                                        <td><strong>State</strong></td>
                                        <td><?php echo $stud['state']; ?></td>
                                    </tr>                                    
                                    <tr>
                                        <td><strong>City</strong></td>
                                        <td><?php echo $stud['city']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Permanent Address</strong></td>
                                        <td><?php echo $stud['address']; ?></td>
                                    </tr>
                                </table>
                              
                           
                            </div>
                        </div>
                        <div class="card" >
                            <div class="card-primary">
                                <div class="card-header">
                                    <div class="card-title">Family Paticulars</div>
                                </div>
                            </div>
                            
                            <div class="card-body">
                         
                                   <table class="table">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Occupation</th>
                                            <th>Qualification</th>
                                            <th>Mobile Number</th>
                                            <th>Email Id</th>
                                        </tr>
                                        <tr>
                                            <td>Father</td>
                                            <td><?php echo $fam['f_name']; ?></td>
                                            <td><?php echo $fam['f_occupation']; ?></td>
                                            <td><?php echo $fam['f_qualification']; ?></td>
                                            <td><?php echo $fam['f_mobile']; ?></td>
                                            <td><?php echo $fam['f_email']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Mother</td>
                                            <td><?php echo $fam['m_name']; ?></td>
                                            <td><?php echo $fam['m_occupation']; ?></td>
                                            <td><?php echo $fam['m_qualification']; ?></td>
                                            <td><?php echo $fam['m_mobile']; ?></td>
                                            <td><?php echo $fam['m_email']; ?></td>
                                        </tr>
                                   </table>
                                </div>
                        </div>
                        <div class="card" >
                            <div class="card-primary">
                                <div class="card-header">
                                    <div class="card-title">Education Details</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th width="50">#</th>
                                        <th>Qualification</th>
                                        <th>Institute</th>
                                        <th>Year Of Passing</th>
                                        <th>Secured % / Grade</th>
                                    </tr>
                                    <?php 
                                    $count=1;
                                    $qual;
                                    if(!empty($edu)){
                                        foreach($edu as $eduRow){ ?>
                                            <tr>
                                                <td width="50"><?php echo $count; ?></td>
                                                <td><?php echo $eduRow['qualification']; ?></td>
                                                <td><?php echo $eduRow['institute']; ?></td>
                                                <td><?php echo $eduRow['year_of_passing']; ?></td>
                                                <td><?php echo $eduRow['percentage']; ?></td>
                                            </tr>
                                            <?php  
                                            $count++;  
                                            }
                                            } else{ ?>
                                            <tr>
                                                <td colspan="5">No Records found</td>
                                            </tr>
                                            <?php } ?>
                                </table>
                            </div>
                           
                        </div>
                        <?php if($stud['status']==0){ ?>
                        <div class="card" >
                            <div class="card-body">
                            <form id="approval" action="<?php echo base_url().'admin/studentprofile/profile/'.$stud['USN']; ?>" method="post">
                                <div class="form-group">
                                    <label for="comment">Comment</label>
                                    <textarea class="form-control <?php  ?>" name="comment" id="comment" placeholder="Please give comment if any particular coreection is required else not required"></textarea>
                                    <input type="text" value="0" id="statusVal"  name="statusVal">
                                </div>
                               
                                <button class="btn btn-primary pl-3 mr-2" onclick=" approve()" type="button" name="status" id="status">Approve</button>
                                <button class="btn btn-primary" name="submit" type="submit">
                                    Submit
                                </button>
                                
                            </form>
                            <?php  } else { ?>

                                <div class="card p-4">
                                    <h5 style="color:green">This profile is Approved</h5>
                                </div>
                            <?php } ?>
                            <div class="form-group mt-3">
                                <a href="<?php echo base_url().'admin/studentprofile/index?dept='.$dept['d_id'].'&sem_id='.$sem['sem_id']; ?>" class="btn btn-secondary">Back</a>
                            </div>
                            </div>
                        </div>
                    </div>
           
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">

    document.getElementById('statusVal').style.visibility="hidden";
    function approve(){
        var usn='<?php echo $stud['USN']; ?>';
        if(confirm("Are you sure you want to approve the profile for "+usn +". If there is any queries, You can comment it will be notified to the student.")){
            document.getElementById("status").classList.remove("btn-primary");
            document.getElementById("status").classList.add("btn-success");
            document.getElementById('statusVal').value=1;
            var status=document.getElementById('status').innerHTML="Approved";
            console.log('status: '+status);
        }else{
            document.getElementById("status").classList.remove("btn-primary");
            document.getElementById("status").classList.add("btn-danger");
            document.getElementById('statusVal').value=0;

            var status=document.getElementById('status').innerHTML="Not Approved";
            console.log('status should be zero: '+status);
        }
    }
</script>
<?php $this->load->view('admin/footer'); ?>
