<?php
if ($msg == "main") {
    $msg = "";
}

foreach ($one_value as $one_info) {
    $record_id = $one_info->record_id;

    $staff_type = $one_info->staff_type;
    $department = $one_info->department;
    $visiting_hour = $one_info->visiting_hour;
    $doctor_fee = $one_info->doctor_fee;
    $temp_available_days = $one_info->available_days;
    $available_days = explode('#', $temp_available_days);
    $name = $one_info->name;
    $joining_date = $one_info->joining_date;
    $username = $one_info->username;
    $password = $one_info->password;
    $mobile = $one_info->mobile;
    $address = $one_info->address;
    $designation = $one_info->designation;
    $bank_name = $one_info->bank_name;
    $account_no = $one_info->account_no;
    $total_salary = $one_info->total_salary;
    //  $purchase = $one_info->purchase_access;
    $sales = $one_info->sales_access;
    //  $in_out = $one_info->product_in_out_access;
    //   $income = $one_info->income_access;
    //  $expense = $one_info->expense_access;
    //  $prescription = $one_info->prescription_access;
    $hr = $one_info->hr_access;
    $inventory = $one_info->inventory_access;
    $createOption = $one_info->createOption_access;
    $billing = $one_info->billing_access;
    $laboratory = $one_info->laboratory_access;
    $accounting = $one_info->accounting_access;
    $information = $one_info->information_access;
    $web = $one_info->webpart_access;
}
?>
<aside >
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Edit/create_user/' . $record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Staff Info.</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="<?php echo $name; ?>" id="name"
                                       class="form-control">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="designation">Designation</label>
                                <input type="text" class="form-control" id="designation"
                                       value="<?php echo $designation; ?>"
                                       placeholder="" name="designation">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="joining_date">Joining Date</label>
                                <input type="date" class="form-control" id="joining_date" placeholder=""
                                       value="<?php echo $joining_date; ?>"
                                       name="joining_date">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="department">Department</label>
                                <select name="department" id="department" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_dept as $info) { ?>
                                        <option value="<?php echo $info->department; ?>"
                                        <?php
                                        if ($department == $info->department) {
                                            echo "selected";
                                        }
                                        ?>><?php echo $info->department; ?></option>
                                            <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="mobile">Mobile No.</label>
                                <input type="text" name="mobile" id="mobile" value="<?php echo $mobile; ?>"
                                       class="form-control">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address"
                                       value="<?php echo $address; ?>" placeholder="" name="address">
                            </div>
                        </div>


                        <div class="row" <?php
                        if ($staff_type == "Staff") {
                            echo "style='display: none;'";
                        }
                        ?>>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="visiting_hour">Visiting Hour</label>
                                <input type="text" class="form-control" id="visiting_hour" placeholder=""
                                       value="<?php echo $visiting_hour; ?>" name="visiting_hour">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="doctor_fee">Doctor Fee</label>
                                <input type="text" class="form-control" id="doctor_fee" placeholder=""
                                       value="<?php echo $doctor_fee; ?>" name="doctor_fee">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label>Available Days</label>
                                <select name="available_days[]" id="available_days" class="form-control selectpicker"
                                        multiple>
                                    <option value="Saturday"
                                    <?php
                                    if (in_array("Saturday", $available_days)) {
                                        echo "selected";
                                    }
                                    ?>>Saturday
                                    </option>
                                    <option value="Sunday"
                                    <?php
                                    if (in_array("Sunday", $available_days)) {
                                        echo "selected";
                                    }
                                    ?>>Sunday
                                    </option>
                                    <option value="Monday"
                                    <?php
                                    if (in_array("Monday", $available_days)) {
                                        echo "selected";
                                    }
                                    ?>>Monday
                                    </option>
                                    <option value="Tuesday"
                                    <?php
                                    if (in_array("Tuesday", $available_days)) {
                                        echo "selected";
                                    }
                                    ?>>Tuesday
                                    </option>
                                    <option value="Wednesday"
                                    <?php
                                    if (in_array("Wednesday", $available_days)) {
                                        echo "selected";
                                    }
                                    ?>>Wednesday
                                    </option>
                                    <option value="Thursday"
                                    <?php
                                    if (in_array("Thursday", $available_days)) {
                                        echo "selected";
                                    }
                                    ?>>Thursday
                                    </option>
                                    <option value="Friday"
                                    <?php
                                    if (in_array("Friday", $available_days)) {
                                        echo "selected";
                                    }
                                    ?>>Friday
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="bank_name">Bank Name</label>
                                <input type="text" class="form-control" id="bank_name" placeholder=""
                                       value="<?php echo $bank_name; ?>" name="bank_name">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="account_no">A/C No.</label>
                                <input type="text" class="form-control" id="account_no" placeholder=""
                                       value="<?php echo $account_no; ?>"
                                       name="account_no">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="total_salary">Total Salary</label>
                                <input type="text" class="form-control" id="total_salary" placeholder=""
                                       value="<?php echo $total_salary; ?>"
                                       name="total_salary">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder=""
                                       value="<?php echo $username; ?>"
                                       name="username">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-xs-12">
                                <p style="font-weight: bolder; color: red; font-size: 20px;">Permission:</p>
                            </div>
                        </div>
                        <div class="container"  style="font-size: 18px; color: blue; font-weight: bold;">
                            <div class="row" >
                                <label class="checkbox-inline col-sm-2">
                                    <input type="hidden" name="hr" value="0">
                                    <input type="checkbox" name="hr" value="1" <?php
                                    if ($hr == 1) {
                                        echo "checked";
                                    }
                                    ?>> &nbsp HR Part
                                </label>
                                <!--                                <label class="checkbox-inline col-sm-2">
                                                                    <input type="hidden" name="inventory" value="0">
                                                                    <input type="checkbox" name="inventory" value="1" <?php
                                if ($inventory == 1) {
                                    echo "checked";
                                }
                                ?>> &nbsp Inventory Part
                                                                </label>-->
                                <label class="checkbox-inline col-sm-2">
                                    <input type="hidden" name="create_option" value="0">
                                    <input type="checkbox" name="create_option" value="1" <?php
                                    if ($createOption == 1) {
                                        echo "checked";
                                    }
                                    ?>> &nbsp Create Option
                                </label>
                                <label class="checkbox-inline col-sm-2">
                                    <input type="hidden" name="billing" value="0">
                                    <input type="checkbox" name="billing" value="1" <?php
                                    if ($billing == 1) {
                                        echo "checked";
                                    }
                                    ?>> &nbsp Billing Part
                                </label>
                                <label class="checkbox-inline col-sm-2">
                                    <input type="hidden" name="laboratory" value="0">
                                    <input type="checkbox" name="laboratory" value="1" <?php
                                    if ($laboratory == 1) {
                                        echo "checked";
                                    }
                                    ?>> &nbsp Pathology 
                                </label>
                            </div>
                            <div class="row">
                                <label class="checkbox-inline col-sm-2">
                                    <input type="hidden" name="accounting" value="0">
                                    <input type="checkbox" name="accounting" value="1" <?php
                                    if ($accounting == 1) {
                                        echo "checked";
                                    }
                                    ?>> &nbsp Accounting Part
                                </label>
                                <!--                                <label class="checkbox-inline col-sm-2">
                                                                    <input type="hidden" name="information" value="0">
                                                                    <input type="checkbox" name="information" value="1" <?php
                                if ($information == 1) {
                                    echo "checked";
                                }
                                ?>> &nbsp Information
                                                                </label>-->
                                <label class="checkbox-inline col-sm-2">
                                    <input type="hidden" name="web" value="0">
                                    <input type="checkbox" name="web" value="1" <?php
                                    if ($web == 1) {
                                        echo "checked";
                                    }
                                    ?>> &nbsp Web Part
                                </label>
                                <label class="checkbox-inline col-sm-2">
                                    <input type="hidden" name="sales" value="0">
                                    <input type="checkbox" name="sales" value="1" <?php
                                    if ($sales == 1) {
                                        echo "checked";
                                    }
                                    ?>> &nbsp Input Data
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Edit <i
                                class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>
            </section>
        </div>
    </section>
</aside>