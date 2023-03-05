<select name="usn" id="usn" class="form-control">
    <option value="">Select USN</option>
    <?php if(!empty($usn)){
        foreach($usn as $usnRow){ ?>
            <option value="<?php echo $usnRow['USN'] ?>"><?php echo $usnRow['name']." [ ".$usnRow['USN']." ] "; ?></option>
     <?php   }
        }?>
</select>