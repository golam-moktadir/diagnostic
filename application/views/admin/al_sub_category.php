<label  for="user_name" class="col-lg-3 control-label ">Sub Category</label>
<div class="col-lg-6">
    <select name="fa_product_name" id="fa_product_name" class="form-control">
        <option value="">Select </option>
        <?php

        //$designation =  $this->session->userdata('designation');
        $designationList = base_info_lists($baseId); //5=repair Type
        foreach ($designationList as $list) {
            echo "<option  value= '" . $list->name . "'> " . $list->name . "</option>";
        }
        ?>
    </select>
</div>