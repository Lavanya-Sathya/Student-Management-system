
    <select name="sem_id" id="sem_id" class="form-control">
      <option value="">Select Semester</option>
        <?php  if(!empty($sem)){
          foreach($sem as $semRow){ ?>
            <option value="<?php echo $semRow['sem_id']; ?>"><?php echo $semRow['section']; ?></option>
          <?php }} ?>   
    </select>
   