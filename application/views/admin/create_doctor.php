<style>
    table.table-bordered{
        border: grey 1px solid !important;
        font-weight: bold !important;
        color: black !important;
        font-size: 13px !important;
    }
    table.table-bordered > thead > tr > th{
        border: grey 1px solid !important;
        font-weight: bold !important;
        color: white !important;
        font-size: 13px !important;
        background: #0aad87 !important;
    }
    table.table-bordered > tbody > tr > td{
        border: grey 1px solid !important;
        font-weight: bold !important;
        color: black !important;
        font-size: 13px !important;
    }
</style>

<?php
if ($msg == "main") {
    $msg = "";
} elseif ($msg == "empty") {
    $msg = "Please fill out all required fields";
} elseif ($msg == "created") {
    $msg = "Created Successfully";
} elseif ($msg == "edit") {
    $msg = "Edited Successfully";
} elseif ($msg == "delete") {
    $msg = "Deleted Successfully";
}
?>
<aside >
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable"> 
                <div style="color: black; background: #a6d7ff; padding: 8px; border: 2px solid #055d9c; margin-bottom:5px;" class="no_print">
                    <?php echo form_open_multipart('Insert/create_doctor'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px; color: green; font-weight: bold; text-align: center;">Add Doctor Info</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="name">Doctor Name</label>
                                <input type="text" class="form-control" id="name" 
                                       placeholder="" name="name">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="designation">Select Designation</label>
                                <select name="designation" id="designation" class="form-control selectpicker"
                                        data-container="body">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_designation as $single_designation) { ?>
                                        <option value="<?php echo $single_designation->designation; ?>">
                                            <?php echo $single_designation->designation; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="mobile">Mobile No</label>
                                <input type="text" class="form-control" id="mobile" placeholder="" name="mobile">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="" name="address">
                            </div>
                            <div class="form-group col-sm-4" style="display: none;">
                                <label for="department">Select Department</label>
                                <select name="department" id="department" class="form-control selectpicker"
                                        data-container="body">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_dept as $single_department) { ?>
                                        <option value="<?php echo $single_department->department; ?>">
                                            <?php echo $single_department->department; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="frees">Fee</label>
                                <input type="text" class="form-control" id="frees" placeholder="" name="frees">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="class_time">Duty Time</label>
                                <input type="time" value="" class="form-control"
                                       id="doctors_time" name="doctors_time">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Submit <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>

                <div>
                    <div>
                        <h3 style="color: blue; text-align: center;">All Doctor Info.</h3>                              
                    </div>

                    <div class="box-body table-responsive" style="width: 100%; overflow-x: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">SL</th>
                                    <!--<th style="text-align: center;">ID_No</th>-->
                                    <th style="text-align: center;">Doctor_Name[ID]</th>
                                    <th style="text-align: center;">Designation</th>
                                    <th style="text-align: center;">Mobile_No.</th>
                                    <th style="text-align: center;">Address</th>
                                    <!--<th style="text-align: center;">Department</th>-->
                                    <th style="text-align: center;">Fee</th>
                                    <th style="text-align: center;">Duty_Time</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                foreach ($all_value as $single_value) {
                                    $count++;
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $count; ?></td>
                                        <!--<td style="text-align: center;"><?php echo "ID- " . $single_value->record_id; ?></td>-->
                                        <td style="text-align: center;"><?php echo $single_value->name. "[".$single_value->record_id."]"; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->designation; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->mobile; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                                        <!--<td style="text-align: center;"><?php echo $single_value->department; ?></td>-->
                                        <td style="text-align: center;"><?php echo $single_value->frees; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->doctors_time; ?></td>
                                        <td style="text-align: center;">
                                            <a style="margin: 5px;" class="btn btn-info"
                                               href="<?php echo base_url(); ?>Show_edit_form/create_doctor/<?php echo $single_value->record_id; ?>/main">Edit
                                            </a>
                                            <a style="margin: 5px;" class="btn btn-danger"
                                               href="<?php echo base_url(); ?>Delete/create_doctor/<?php echo $single_value->record_id; ?>">Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>