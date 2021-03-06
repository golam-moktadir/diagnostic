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
        color: black !important;
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
$yearArray = range(2020, 2025);
$monthArray = array("January", "February", "March", "April",
    "May", "June", "July", "August", "September",
    "October", "November", "December",
);
?>
<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable"> 
                <div style="color: black; background: #a6d7ff; padding: 8px; border: 2px solid #055d9c; margin-bottom:5px;" class="no_print">
                    <?php echo form_open_multipart('Insert/create_salary_sheet'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px; color: green; font-weight: bold; text-align: center;">Salary Payment</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            
                       <div class="form-group col-sm-4 col-xs-12">
                             <label for="month">Select Month</label>
                             <select name="month_list" id="month_list" class="form-control"
                                     data-live-search="true" required>
                                 <option value="">-- Select --</option>
                                 <?php
                                foreach ($yearArray as $single_year) {
                                    foreach ($monthArray as $single_month) {
                                        ?>
                                        <option value="<?php echo $single_month . " " . $single_year; ?>">
                                            <?php echo $single_month . " " . $single_year; ?>
                                        </option>
                                        <?php
                                    }
                                }
                                ?>
                             </select>
                         </div>
                        
                       
                                  <div class="form-group col-sm-4 col-xs-12">
                                <label for="date_from">Date</label>
                                <input type="text" class="form-control new_datepicker" name="month" id="month">
                            </div>
                         <div class="form-group col-sm-4 col-xs-12">
                            <label for="employee_id">Staff Name</label>
                            <select name="employee_id" id="employee_id" class="form-control selectpicker"
                                    data-live-search="true">
                                <option value="">-- Select --</option>
                                <?php foreach ($all_employee as $info) { ?>
                                    <option value="<?php echo $info->record_id; ?>">
                                        <?php echo $info->name . " [ ID-" . $info->record_id . " ]"; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                            <label for="designation">Designation</label>
                                <select name="designation" id="designation" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_desig as $info) { ?>
                                        <option value="<?php echo $info->designation; ?>"><?php echo $info->designation; ?></option>
                                    <?php } ?>
                                </select>
                        </div>
                         <div class="form-group col-sm-4 col-xs-12">
                            <label for="account_no">Account No.</label>
                            <input type="text" class="form-control" id="account_no" placeholder="" name="account_no" readonly>
                        </div>
                     <div class="form-group col-sm-4 col-xs-12">
                            <label for="salary_scale">Salary Amount</label>
                            <input type="text" class="form-control" id="salary_scale" placeholder="" name="salary_scale">
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Pay <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>
                </div>

                <div style="color: black; text-align: center; color: green;">
                    <div class="box-body" id="no_print2">
                        <div class="form-group" style="width: 300px;">
                            <p style="font-size: 18px;">Search >> Salary Sheet</p>
                            <label for="select_month">Select Month</label>
                            <select name="select_month" id="select_month" class="form-control"
                                    data-live-search="true">
                                <option value="">-- Select --</option>
                                <?php
                                foreach ($yearArray as $single_year) {
                                    foreach ($monthArray as $single_month) {
                                        ?>
                                        <option value="<?php echo $single_month . " " . $single_year; ?>">
                                            <?php echo $single_month . " " . $single_year; ?>
                                        </option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="box-footer clearfix" id="no_print3">
                        <button id="search_month" type="button" class="pull-left btn btn-success">Search <i class="fa fa-search"></i></button>
                    </div>
                    <div id="show_info"></div>
                </div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
    $("#employee_id").on("change paste keyup", function () {
        var input_data = $('#employee_id').val();
        var post_data = {
            'employee_id': input_data,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_des_acc_salary",
            data: post_data,
            dataType: 'JSON',
            success: function (data) {
                $('#designation').val(data[0]);
                $('#account_no').val(data[1]);
                $('#salary_scale').val(data[2]);
            }
        });
    });
    $("#search_month").on("click", function () {
        var month = $('#select_month').val();
        var post_data = {
            'month': month,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        console.log(post_data);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_salary_sheet",
            data: post_data,
            success: function (data) {
                $('#show_info').html(data);
            }
        });
    });
</script>

<style>
    @media print {
        a[href]:after {
            content: none !important;
        }
        #space_id{
            display:none;
        }
        #print_button {
            display: none;
        }
        #no_print1 {
            display: none;
        }
        #no_print2 {
            display: none;
        }
        #no_print3 {
            display: none;
        }
        .no_print{
            display: none;
        }
    }
</style>

