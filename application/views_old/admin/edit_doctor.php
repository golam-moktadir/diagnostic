<?php
if ($msg == "main") {
    $msg = "";
}
?>
<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Edit/create_doctor/' . $one_value[0]->record_id); ?>
                     <div class="box-body">
                        <p style="font-size: 20px;">Add Doctor Info</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="name">Doctor Name</label>
                                <input type="text" class="form-control" id="name" value="<?php echo $one_value[0]->name; ?>" 
                                       placeholder="" name="name">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="designation">Select Designation</label>
                                <select name="designation" id="designation" class="form-control selectpicker"
                                        data-container="body">
                                    <option value="<?php echo $one_value[0]->designation; ?>"><?php echo $one_value[0]->designation; ?></option>
                                    <?php foreach ($all_designation as $single_designation) { ?>
                                        <option value="<?php echo $single_designation->designation; ?>">
                                            <?php echo $single_designation->designation; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="mobile">Mobile No</label>
                                <input type="text" class="form-control" id="mobile" placeholder="" name="mobile" value="<?php echo $one_value[0]->mobile; ?>">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="" name="address" value="<?php echo $one_value[0]->address; ?>">
                            </div>
                            <div class="form-group col-sm-4" style="display: none;">
                                <label for="department">Select Department</label>
                                <select name="department" id="department" class="form-control selectpicker"
                                        data-container="body">
                                    <option value="<?php echo $one_value[0]->department; ?>"><?php echo $one_value[0]->department; ?></option>
                                    <?php foreach ($all_dept as $single_department) { ?>
                                        <option value="<?php echo $single_department->department; ?>">
                                            <?php echo $single_department->department; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="frees">Fee</label>
                                <input type="text" class="form-control" id="frees" placeholder="" name="frees" value="<?php echo $one_value[0]->frees; ?>">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="class_time">Duty Time</label>
                                <input type="time" class="form-control"
                                       id="doctors_time" name="doctors_time" value="<?php echo $one_value[0]->doctors_time; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Edit &nbsp<i
                                class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>
            </section>
        </div>
    </section>
</aside>
