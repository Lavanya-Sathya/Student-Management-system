<?php $this->load->view('student/studentHeader'); 
$student=$_SESSION['student']; ?>
<aside class="main-sidebar sidebar-light-primary elevation-4 " id="sideImage">
        <div class="sidebar">
            <nav class="mt-2 " id="sideColor" style="height:110vh" >
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item text-center"  >
                    <?php if($stud['image'] != "" && file_exists('./public/images/student_images/'.$stud['image'])){ ?>
                            <img id="output" class="mt-3"  width="200px" height="200px" src="<?php echo base_url().'public/images/student_images/'.$stud['image']; ?>">
                    <?php  } else {  ?>
                         
                        <img  id="output" class="mt-3" width="200px" height="200px" src="<?php echo base_url().'public/images/images.jpg'; ?>">
                    <?php } ?>
                    </li>

                    
                    <div id="list">
                    <form  enctype= "multipart/form-data"
 action="<?php echo base_url().'student/homestudent/imageupload/'.$stud['USN']; ?>" method="post">
 <div class="form-group">
                        <input type="file" accept="image/*" onchange="loadFile(event)" name="image" id="image" style="display: none;" class="<?php echo (!empty($errorImageUpload)) ? 'is-invalid' : ''; ?>">
                        <?php echo (!empty($errorImageUpload)) ?  $errorImageUpload : ''; ?>
                        <p><label for="image" style="cursor: pointer;">  Upload Image</label>
                        <button class="btn btn-primary p-1" name="submit" type="submit">
                            submit
                        </button></p>
                    </form>
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
                            <h5 style="color:red">Your profile is Not Approved yet.</h5>
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
                               <h6>Profile</h6> 
                            </div>
                        </div>
                        <div class="card" >
                            <div class="card-primary">
                                <div class="card-header">
                                    <div class="card-title">Student Details</div>
                                </div>
                            </div>
                            
                            <div class="card-body">
                            <form id="categoryForm" name="categoryForm" enctype= "multipart/form-data"
                                        action="<?php echo base_url().'student/homestudent/profile/'.$stud['USN']; ?>" method="post">

                                <div class="card-body">
                                <div class='parent'>
                                    <div class='child1'>
                                    <div class="form-group">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" name="dob" id="dob" value="<?php echo set_value('dob',$stud['dob']); ?>" class="form-control <?php echo (form_error('dob') != "") ? 'is-invalid' : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Select Gender</label> <br>
                                        <input type="radio" name="gender" id="gender" value="female"  <?php echo ($stud['gender']=='female') ? 'checked' : ''; ?>>Female
                                        <input type="radio" name="gender" id="gender" value="male" <?php echo ($stud['gender']=='male') ? 'checked' : ''; ?>>Male
                                        <input type="radio" name="gender" id="gender" value="other" <?php echo ($stud['gender']=='other') ? 'checked' : ''; ?>>Other

                                    </div>
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <select name="country" id="country" class="form-control">
                                            <option value="">Select Country</option>
                                            <?php if(!empty($country)){
                                                foreach($country as $country){ ?>
                                                    <option <?php echo ($stud['country']==$country['id'] ? 'selected' : ''); ?> value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <div id="stateBox">
                                            <select name="state" id="state" class="form-control">
                                                <option value="">Select State</option>
                                                <?php if(!empty($state)){
                                                foreach($state as $state){ ?>
                                                    <option <?php echo ($stud['state']==$state['id'] ? 'selected' : ''); ?> value="<?php echo $state['id']; ?>"><?php echo $state['name']; ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <div id="cityBox">
                                            <select name="city" id="city" class="form-control">
                                                <option value="">Select City</option>
                                                <?php if(!empty($city)){
                                                foreach($city as $city){ ?>
                                                    <option <?php echo ($stud['city']==$city['id'] ? 'selected' : ''); ?> value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    </div>
                                    <div class='child2'>
                                    <div class="form-group">
                                        <label for="blood_group">Blood Group</label>
                                        <input placeholder="Enter Your Blood Group" type="text" name="blood_group" id="blood_group" value="<?php echo set_value('blood_group',$stud['blood_group']); ?>" class="form-control <?php echo (form_error('blood_group') != "") ? 'is-invalid' : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="ph_no">Phone Number</label>
                                        <input placeholder="Enter Your Phone No." type="text" name="ph_no" id="ph_no" value="<?php echo set_value('ph_no',$stud['phone_no']); ?>" class="form-control <?php echo (form_error('phone_no') != "") ? 'is-invalid' : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email_id">Email Id</label>
                                        <input placeholder="Enter Your Email Id" type="email" name="email_id" id="email_id" value="<?php echo set_value('email_id',$stud['email_id']); ?>" class="form-control <?php echo (form_error('email_id') != "") ? 'is-invalid' : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Permanent Address</label>
                                        <textarea placeholder="Enter Your Permanent Address" name="address" id="address" cols="" rows="" class="form-control <?php echo (form_error('address') != "") ? 'is-invalid' : ''; ?>"><?php echo set_value('address',$stud['address']); ?></textarea>
                                    </div>
                                    </div>
                                </div>
                            </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" name="submit" type="submit">
                                        Submit
                                    </button>
                                </div>

                            </form>
                            </div>
                        </div>
                        <div class="card" >
                            <div class="card-primary">
                                <div class="card-header">
                                    <div class="card-title">Family Paticulars</div>
                                </div>
                            </div>
                            
                            <div class="card-body">
                            <form id="categoryForm" name="categoryForm"
                                        action="<?php echo base_url().'student/homestudent/family/'.$stud['USN'] ?>" method="post">

                                <div class="card-body">
                                   
                                <div class='parent'>
                                    <div class="part">
                                        <div class="form-group">
                                            <label for="p_name">Name</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="p_occupation">Occupation</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="p_qualification">Qualification</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="p_mobile">Mobile Number</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="p_email">Email</label>
                                        </div>
                                    </div>
                                    <div class='part1'>
                                    <div class="form-group">
                                        <input placeholder="Father Name" type="text" name="f_name" id="f_name" value="<?php echo set_value('f_name',$fam['f_name']); ?>" class="form-control <?php echo (form_error('f_name') != "") ? 'is-invalid' : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="Father Occupation"  type="text" name="f_occupation" id="f_occupation" value="<?php echo set_value('f_occupation',$fam['f_occupation']); ?>" class="form-control <?php echo (form_error('f_occupation') != "") ? 'is-invalid' : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="Father Qualification" type="text" name="f_qualification" id="f_qualification" value="<?php echo set_value('f_qualification',$fam['f_qualification']); ?>" class="form-control <?php echo (form_error('f_qualification') != "") ? 'is-invalid' : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="Father Mobile Number"  type="text" name="f_mobile" id="f_mobile" value="<?php echo set_value('f_mobile',$fam['f_mobile']); ?>" class="form-control <?php echo (form_error('f_mobile') != "") ? 'is-invalid' : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="Father Email Id"  type="text" name="f_email" id="f_email" value="<?php echo set_value('f_email',$fam['f_email']); ?>" class="form-control <?php echo (form_error('f_email') != "") ? 'is-invalid' : ''; ?>">
                                    </div>
                                    
                                    </div>
                                    <div class='part2'>
                                    <div class="form-group">
                                        <input placeholder="Mother Name" type="text" name="m_name" id="m_name" value="<?php echo set_value('m_name',$fam['m_name']); ?>" class="form-control <?php echo (form_error('m_name') != "") ? 'is-invalid' : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="Mother Occupation" type="text" name="m_occupation" id="m_occupation" value="<?php echo set_value('m_occupation',$fam['m_occupation']); ?>" class="form-control <?php echo (form_error('m_occupation') != "") ? 'is-invalid' : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="Mother Qualification" type="text" name="m_qualification" id="m_qualification" value="<?php echo set_value('m_qualification',$fam['m_qualification']); ?>" class="form-control <?php echo (form_error('m_qualification') != "") ? 'is-invalid' : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="Mother Mobile Number" type="text" name="m_mobile" id="m_mobile" value="<?php echo set_value('m_mobile',$fam['m_mobile']); ?>" class="form-control <?php echo (form_error('m_mobile') != "") ? 'is-invalid' : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="Mother Email Id" type="text" name="m_email" id="m_email" value="<?php echo set_value('m_email',$fam['m_email']); ?>" class="form-control <?php echo (form_error('m_email') != "") ? 'is-invalid' : ''; ?>">
                                    </div>
                                    
                                    </div>
                                </div>
                                   

                            </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" name="submit" type="submit">
                                        Update
                                    </button>
                                </div>

                            </form>
                            </div>
                        </div>
                        <div class="card" >
                            <div class="card-primary">
                                <div class="card-header">
                                    <div class="card-title">Education Details</div>
                                    <div class="card-tools">
                                        <button id="create" class="btn btn-secondary"><i class="fas fa-plus"></i> Create</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="edits" class="ml-5 mt-3"></div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th width="50">#</th>
                                        <th>Qualification</th>
                                        <th>Institute</th>
                                        <th>Year Of Passing</th>
                                        <th>Secured % / Grade</th>
                                        <th width="150" class="text-center">Action</th>
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
                                                <td width="150" class="text-center">
                                                    <button id="editButton" onclick="editEducation(<?php echo $eduRow['id'];  ?>)" class="btn btn-primary">
                                                        <i class="far fa-edit"></i>
                                                    </button>
                                            </tr>
                                            <?php  
                                            $count++;  
                                            }
                                            } else{ ?>
                                            <tr>
                                                <td colspan="6">No Records found</td>
                                            </tr>
                                            <?php } ?>
                                </table>
                            </div>
                            <form id="createForm" action="<?php echo base_url().'student/homestudent/educationList/'.$stud['USN']; ?>" method="post">
                                <div class="card-body bg-light">
                                    
                                    <div class="educlass">
                                        <label for="name">Qualification</label>
                                        <select name="qualification" id="qualification" class="form-control <?php echo  (form_error('qualification') !='') ? 'is-invalid' : ''; ?>">
                                            <option value="">Select qualification</option>
                                            <option value="X">Class X</option>
                                            <option value="XII">Class XII</option>
                                            <option value="UG">UG</option>  
                                        </select>
                                    </div>
                                    <div class="educlass">
                                        <label for="institute">Institute</label>
                                        <input type="text" value="<?php echo set_value('institute'); ?>" class="form-control <?php echo (form_error('institute') !='') ? 'is-invalid' : ''; ?>" name="institute" id="institute" placeholder="Enter Your Institute">
                                        <?php echo form_error('name'); ?>
                                    </div>
                                    <div class="educlass">
                                        <label for="year_of_passing">Year of Passing</label>
                                        <input type="text" value="<?php echo set_value('year_of_passing'); ?>" class="form-control <?php echo (form_error('year_of_passing') !='') ? 'is-invalid' : ''; ?>" name="year_of_passing" id="year_of_passing" placeholder="Enter year of passing">
                                        <?php echo form_error('name'); ?>
                                    </div>
                                    <div class="educlass">
                                        <label for="percentage">Secured % / Grade</label>
                                        <input type="text" value="<?php echo set_value('percentage'); ?>" class="form-control <?php echo (form_error('percentage') !='') ? 'is-invalid' : ''; ?>" name="percentage" id="percentage" placeholder="Enter Percentage/Grade">
                                        <?php echo form_error('name'); ?>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" name="submit" type="submit">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $this->load->view('student/studentFooter'); ?>
<script>
     $(document).ready(function(){
        $("#country").change(function(){
            var country_id=$(this).val();
            $.ajax({
                url:"<?php echo base_url('student/homestudent/getState');?>",
                type:'POST',
                data:{country_id:country_id},
                dataType:'json',
                success:function(response){
                    console.log(response);
                    if(response['states']){
                        $('#stateBox').html(response['states']);
                    }
                }
            });
            $('#cityBox').html('<select name="city" id="city" class="form-control">\
                                        <option value="">Select City</option>\
                                    </select>');

        });

        $(document).on('change','#state',function(){
            var state_id=$(this).val();
            $.ajax({
                url:"<?php echo base_url('student/homestudent/getCity');?>",
                type:'POST',
                data:{state_id:state_id},
                dataType:'json',
                success:function(response){
                    console.log(response);
                    if(response['city']){
                        $('#cityBox').html(response['city']);
                    }
                }
            });          
        });
    });
    var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
    };
    var count='<?php echo $count; ?>'
    console.log('count value: '+count);
    var createButton = document.getElementById("create");
    if(count>=4){
        createButton.style.visibility = "hidden";
    }
    var FormCreate = document.getElementById("createForm");
    console.log("create button: "+ createButton);
    console.log("create from: "+ FormCreate);

    function toggle(){
        FormCreate.style.visibility = FormCreate.style.visibility==="hidden" ? "visible" : "hidden";
        console.log("Toggle called: "+ FormCreate.style.visibility);
    }
    toggle();
    createButton.addEventListener("click",toggle,false);

    function editEducation(id){
        var a = new XMLHttpRequest();
        a.onreadystatechange=function(){
            if(this.readyState==4 && this.status==200){
                document.getElementById("edits").innerHTML=this.responseText;
            }
        };
        a.open("GET","<?php echo base_url().'student/homestudent/educationEdit/' ?>"+id,true);
        a.send();
    }
</script>