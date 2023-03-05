<select name="state" id="state" class="form-control">
    <option value="">Select State</option>
    <?php if(!empty($state)){
        foreach($state as $stateRow){ ?>
            <option value="<?php echo $stateRow['id'] ?>"><?php echo $stateRow['name']; ?></option>
     <?php   }
        }?>
</select>