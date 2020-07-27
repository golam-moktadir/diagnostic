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
} elseif ($msg == "active") {
    $msg = "ID is active Now";
} elseif ($msg == "inactive") {
    $msg = "ID is inactive Now";
}
?>
<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div style="color: black; background: #a6d7ff; padding: 8px; border: 2px solid #055d9c; margin-bottom:5px;" class="no_print">
                    <?php echo form_open_multipart('Insert/create_user'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px; color: green; font-weight: bold; text-align: center;">Staff Info.</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12" style="display: none;">
                                <label for="staff_type">Select Administration/ Staff</label>
                                <select name="staff_type" id="staff_type" class="form-control">
                                    <!--                                    <option value="">-- Select --</option>
                                                                        <option value="administration">Administration</option>
                                                                        <option value="Doctor">Doctor</option>
                                                                        <option value="Nurse">Nurse</option>-->
                                    <option value="Staff">Staff</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <!-- <div class="row" id="all_staff" style="display: none;"> -->
                            <!--    Extra for Doctor-->
                            <div class="row" id="doctor_extra" style="display: none;">
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="name">Doctors Name</label>
                                    <select name="doctor_name" id="doctor_name" class="form-control selectpicker"
                                            data-live-search="true">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($all_doc as $info) { ?>
                                            <option value="<?php echo $info->name; ?>"><?php echo $info->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="visiting_hour">Visiting Hour</label>
                                    <input type="text" class="form-control" id="visiting_hour" placeholder=""
                                           name="visiting_hour">
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label for="doctor_fee">Doctor Fee</label>
                                    <input type="text" class="form-control" id="doctor_fee" placeholder=""
                                           name="doctor_fee">
                                </div>
                                <div class="form-group col-sm-3 col-xs-12">
                                    <label>Available Days</label>
                                    <select name="available_days[]" id="available_days" class="form-control selectpicker"
                                            multiple>
                                        <option value="Saturday">Saturday</option>
                                        <option value="Sunday">Sunday</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                    </select>
                                </div>
                            </div>
                            <!--    End for Doctor-->

                            <!-- All staff part-->
                            <div class="form-group col-sm-4 col-xs-12" id="all_staff" >
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="designation">Designation</label>
<!--                                <input type="text" class="form-control" id="designation" placeholder=""
                                       name="designation">-->
                                <select name="designation" id="designation" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_desig as $info) { ?>
                                        <option value="<?php echo $info->designation; ?>"><?php echo $info->designation; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="joining_date">Joining Date</label>
                                <input type="text" class="form-control new_datepicker" id="joining_date" placeholder=""
                                       name="joining_date">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" style="display: none;">
                                <label for="department">Department</label>
                                <select name="department" id="department" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_dept as $info) { ?>
                                        <option value="<?php echo $info->department; ?>"><?php echo $info->department; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="mobile">Mobile No.</label>
                                <input type="text" name="mobile" id="mobile" class="form-control">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address"
                                       value="" placeholder="" name="address">
                            </div>
                        </div>

                        <!--    Extra for Doctor-->
                        <!--                        <div class="row" id="doctor_extra" style="display: none;">
                                                 <div class="form-group col-sm-3 col-xs-12">
                                                        <label for="doctor_name">Doctors Name</label>
                                                        <select name="doctor_name" id="doctor_name" class="form-control selectpicker"
                                                                data-live-search="true">
                                                            <option value="">-- Select --</option>
                        <?php foreach ($all_doc as $info) { ?>
                                                                            <option value="<?php echo $info->name; ?>"><?php echo $info->name; ?></option>
                        <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-3 col-xs-12">
                                                        <label for="visiting_hour">Visiting Hour</label>
                                                        <input type="text" class="form-control" id="visiting_hour" placeholder=""
                                                               name="visiting_hour">
                                                    </div>
                                                    <div class="form-group col-sm-3 col-xs-12">
                                                        <label for="doctor_fee">Doctor Fee</label>
                                                        <input type="text" class="form-control" id="doctor_fee" placeholder=""
                                                               name="doctor_fee">
                                                    </div>
                                                    <div class="form-group col-sm-3 col-xs-12">
                                                        <label>Available Days</label>
                                                        <select name="available_days[]" id="available_days" class="form-control selectpicker"
                                                                multiple>
                                                            <option value="Saturday">Saturday</option>
                                                            <option value="Sunday">Sunday</option>
                                                            <option value="Monday">Monday</option>
                                                            <option value="Tuesday">Tuesday</option>
                                                            <option value="Wednesday">Wednesday</option>
                                                            <option value="Thursday">Thursday</option>
                                                            <option value="Friday">Friday</option>
                                                        </select>
                                                    </div>
                                                </div>-->
                        <!--    End for Doctor-->
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="bank_name">Bank Name</label>
                                <input type="text" class="form-control" id="bank_name" placeholder="" name="bank_name">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="account_no">A/C No.</label>
                                <input type="text" class="form-control" id="account_no" placeholder=""
                                       name="account_no">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="total_salary">Total Salary</label>
                                <input type="text" class="form-control" id="total_salary" placeholder=""
                                       name="total_salary">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="" name="username">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder=""
                                       name="password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-xs-12">
                                <p style="font-weight: bolder; color: red; font-size: 20px;">Permission:</p>
                            </div>
                        </div>
                        <div class="container" style="font-size: 18px; color: blue; font-weight: bold;">
                            <div class="row">
                                <label class="checkbox-inline col-sm-2">
                                    <input type="hidden" name="hr" value="0">
                                    <input type="checkbox" name="hr" value="1"> &nbsp HR Part
                                </label>
                                <!--<label class="checkbox-inline col-sm-2">
                                    <input type="hidden" name="inventory" value="0">
                                    <input type="checkbox" name="inventory" value="1"> &nbsp Inventory
                                </label>-->
                                <label class="checkbox-inline col-sm-2">
                                    <input type="hidden" name="create_option" value="0">
                                    <input type="checkbox" name="create_option" value="1"> &nbsp Create Option
                                </label>
                                <label class="checkbox-inline col-sm-2">
                                    <input type="hidden" name="billing" value="0">
                                    <input type="checkbox" name="billing" value="1"> &nbsp Billing Part
                                </label>
                                <label class="checkbox-inline col-sm-2">
                                    <input type="hidden" name="laboratory" value="0">
                                    <input type="checkbox" name="laboratory" value="1"> &nbsp Pathology 
                                </label>
                            </div>
                            <div class="row">
                                <label class="checkbox-inline col-sm-2">
                                    <input type="hidden" name="accounting" value="0">
                                    <input type="checkbox" name="accounting" value="1"> &nbsp Accounts Part
                                </label>
                                <!--<label class="checkbox-inline col-sm-2">
                                    <input type="hidden" name="information" value="0">
                                    <input type="checkbox" name="information" value="1"> &nbsp Information
                                </label>-->
                                <label class="checkbox-inline col-sm-2">
                                    <input type="hidden" name="sales" value="0">
                                    <input type="checkbox" name="sales" value="1"> &nbsp Input Data
                                </label>
                                <label class="checkbox-inline col-sm-2">
                                    <input type="hidden" name="web" value="0">
                                    <input type="checkbox" name="web" value="1"> &nbsp Web Part
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Submit <i
                                class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>

                <div>
                    <div class="box-header">
                        <h3 class="box-title" style="font-size: 20px; color: green; font-weight: bold;">All Staff</h3>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-4 col-xs-12">
                            <label for="staff_type2">Select Administration/ Staff</label>
                            <select name="staff_type2" id="staff_type2" class="form-control selectpicker">
                                <option value="All">All</option>
                                <option value="administration">Administration</option>
                                <!--<option value="Doctor">Doctor</option>-->
                                <!--<option value="Nurse">Nurse</option>-->
                                <option value="Staff">Staff</option>
                            </select>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="button" class="pull-left btn btn-success" id="search_staff">Search <i
                                class="fa fa-search"></i></button>
                    </div>

                    <div class="box-body table-responsive" style="width: 100%; overflow: scroll; color: black;"
                         id="staff_by_type">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">SL</th>
                                    <th style="text-align: center;">Image</th>
                                    <th style="text-align: center;">Name</th>
                                    <!--<th style="text-align: center;">Doctor Name</th>-->
                                    <th style="text-align: center;">Username</th>
                                    <th style="text-align: center;">Designation</th>
                                    <th style="text-align: center;">Joining Date</th>
                                    <!--<th style="text-align: center;">Department</th>-->
    <!--                                <th style="text-align: center;">Visiting Hour</th>
                                    <th style="text-align: center;">Doctor Fee</th>
                                    <th style="text-align: center;">Available Days</th>-->
                                    <th style="text-align: center;">Mobile</th>
                                    <th style="text-align: center;">Address</th>
                                    <th style="text-align: center;">Bank Name</th>
                                    <th style="text-align: center;">A/C</th>
                                    <th style="text-align: center;">Total Salary</th>
                                    <th style="text-align: center;">Permission</th>
                                    <th style="text-align: center;">Action</th>
                                    <!--<th style="text-align: center;">Status</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                foreach ($all_staff as $single_value) {
                                    $count++;
                                    ?>
                                    <tr>
    <!--                                    <td style="text-align: center;"><?php echo $count; ?></td>-->
                                        <td style="text-align: center;"><?php echo $single_value->record_id; ?></td>
                                        <td style="text-align: center;">
                                            <img src="<?php echo base_url(); ?>assets/img/staff/<?php echo "$single_value->image"; ?>"
                                                 width="50" height="50"><?php echo "</br>[ID: $single_value->record_id]"; ?>
                                        </td>
    <!--                                    <td style="text-align: center;"><?php echo $single_value->name; ?></td>-->
                                        <td style="text-align: center;"><?php echo "$single_value->name"; ?></td>
    <!--                                    <td style="text-align: center;"><?php echo "$single_value->doctor_name";
                                    ?></td>-->
                                        <td style="text-align: center;"><?php echo $single_value->username; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->designation; ?></td>
                                        <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->joining_date)); ?></td>
                                        <!--<td style="text-align: center;"><?php echo $single_value->department; ?></td>-->
    <!--                                    <td style="text-align: center;"><?php echo $single_value->visiting_hour; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->doctor_fee; ?></td>
                                        <td style="text-align: center;">
                                        <?php
                                        $each_day = explode('#', $single_value->available_days);
                                        foreach ($each_day as $day) {
                                            echo $day . "<br>";
                                        }
                                        ?>
                                        </td>-->
                                        <td style="text-align: center;"><?php echo $single_value->mobile; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->bank_name; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->account_no; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->total_salary; ?></td>
                                        <td style="text-align: center;">
                                            <?php
                                            if ($single_value->hr_access == 1) {
                                                echo "HR Part,<br>";
                                            }
                                            ?>
                                            <?php
                                            if ($single_value->inventory_access == 1) {
                                                echo "Inventory Part,<br>";
                                            }
                                            ?>

                                            <?php
                                            if ($single_value->billing_access == 1) {
                                                echo "Billing Part,<br>";
                                            }
                                            ?>

                                            <?php
                                            if ($single_value->accounting_access == 1) {
                                                echo "Accounting Part,<br>";
                                            }
                                            ?>

                                            <?php
                                            if ($single_value->sales_access == 1) {
                                                echo "Input Data,<br>";
                                            }
                                            ?>
                                            <?php
                                            if ($single_value->webpart_access == 1) {
                                                echo "Web Part,<br>";
                                            }
                                            ?>
                                            <?php
                                            if ($single_value->laboratory_access == 1) {
                                                echo "Pathology,<br>";
                                            }
                                            ?>
                                            <?php
                                            if ($single_value->information_access == 1) {
                                                echo "Information,<br>";
                                            }
                                            ?>
                                            <?php
                                            if ($single_value->createOption_access == 1) {
                                                echo "Create Option,<br>";
                                            }
                                            ?>

                                        </td>

                                        <td style="text-align: center;">
                                            <a style="margin: 5px;"
                                               href="<?php echo base_url(); ?>Show_edit_form/create_user/<?php echo $single_value->record_id; ?>/main"
                                               class="btn btn-info fa fa-edit" title="Edit">
                                            </a>
                                            <a style="margin: 5px;"
                                               href="<?php echo base_url(); ?>Delete/create_user/<?php echo $single_value->record_id; ?>/main"
                                               class="btn btn-danger fa fa-cut" title="Delete">
                                            </a>
                                            <?php if ($single_value->block_status == 1) { ?>
                                                <!--                                            <a style="margin: 5px;"
                                                                                               href="<?php echo base_url(); ?>Edit/staff_active/<?php echo $single_value->record_id; ?>"
                                                                                               class="btn btn-success">Active
                                                                                            </a>-->
                                            <?php } else { ?>
                                                <!--                                            <a style="margin: 5px;"
                                                                                               href="<?php echo base_url(); ?>Edit/staff_inactive/<?php echo $single_value->record_id; ?>"
                                                                                               class="btn btn-danger">Inactive
                                                                                            </a>-->
                                            <?php } ?>
                                        </td>
    <!--                                    <td style="text-align: center;">
                                        <?php
                                        if ($single_value->block_status == 0) {
                                            echo "Active";
                                        } else {
                                            echo "Inactive";
                                        }
                                        ?>
                                        </td>-->
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

<script type="text/javascript">
    $("#staff_type").on("change paste keyup", function () {
        var input_data = $('#staff_type').val();
        if (input_data == "Doctor") {
            $('#doctor_extra').show();
            $('#all_staff').hide();
        } else {
            $('#doctor_extra').hide();

        }
    });

    $('#search_staff').on('click', function () {
        var staff = $('#staff_type2').val();
        var post_data = {
            'staff': staff,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        console.log(post_data);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_staff",
            data: post_data,
            success: function (data) {
                console.log(data);
                $('#staff_by_type').html(data);
            }
        });
    });
</script>