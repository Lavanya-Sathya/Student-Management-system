<select name="city" id="city" class="form-control">
    <option value="">Select City</option>
    <?php if(!empty($city)){
        foreach($city as $cityRow){ ?>
            <option value="<?php echo $cityRow['id'] ?>"><?php echo $cityRow['name']; ?></option>
     <?php   }
        }?>
</select>