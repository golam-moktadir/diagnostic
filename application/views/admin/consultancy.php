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
<aside >
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable" id="full_page">
                <div style="color: black; background: #a6d7ff; padding: 8px; border: 2px solid #055d9c; margin-bottom:5px;" class="no_print">
                    <div class="box-body">
                        <p style="font-size: 20px; color: green; font-weight: bold; text-align: center;">Doctor Consultation</p>
                        <p style="font-size: 20px; color: #066;" id="message"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="patient_id">Patient Name</label>
                                <div class="input-group">
                                    <select name="patient_id" id="patient_id" class="form-control selectpicker"
                                            data-live-search="true">
                                        <option value="">--Select--</option>
                                        <?php foreach ($all_patient as $info) { ?>
                                            <option value="<?php echo $info->record_id . "###" . $info->name; ?>">
                                                <?php echo "$info->name [ID: $info->record_id]"; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <input type="text" class="form-control" id="new_patient"
                                           placeholder="New Patient Name"
                                           name="new_patient" style="display: none">
                                    <span class="input-group-addon">
                                        <button type="button" id="c_plus" style="height: 20px;"
                                                class="btn btn-success fa fa-plus-square btn-sm"></button>
                                        <button type="button" id="c_back" style="height: 20px; display:none;"
                                                class="btn btn-info fa fa-backward btn-sm"></button>
                                    </span>
                                </div>
                            </div> 
                            <!--Patient Name Add and Insert New-->

                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="mobile">Mobile No.</label>
                                <input type="text" name="mobile" id="mobile" class="form-control">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" id="age" name="age">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address"
                                       value="" placeholder="" name="address">
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="doctor_name">Doctor Name</label>
                                <select name="doctor_name" id="doctor_name" class="form-control selectpicker" data-container="body">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_doctor as $info) { ?>
                                        <option value="<?php echo $info->name . "###" . $info->designation ?>">
                                            <?php
                                            echo $info->name .
                                            " [" . $info->designation . "]";
                                            ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="doctor_fee">Doctor Fee</label>
                                <input type="text" class="form-control" id="doctor_fee" placeholder="" readonly=""
                                       name="doctor_fee">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="discount">Discount</label>
                                <input type="text" class="form-control" id="discount" placeholder=""
                                       name="discount">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="sub_total">Sub-total</label>
                                <input type="text" class="form-control" id="sub_total" placeholder="" readonly=""
                                       name="sub_total">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="doctor_commission">Doctor Commission</label>
                                <input type="text" class="form-control" id="doctor_commission" placeholder=""
                                       name="doctor_commission">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="company_commission">Company Amount</label>
                                <input type="text" class="form-control" id="company_commission" placeholder="" readonly=""
                                       name="company_commission">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="date">Appointment Date</label>
                                <input type="text" class="form-control new_datepicker" id="date"
                                       value="<?php echo date('Y-m-d'); ?>" placeholder="Date" name="date">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="appointment_time">Appointment Time</label>
                                <input type="time" class="form-control" id="appointment_time" placeholder=""
                                       name="appointment_time">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="button" class="pull-left btn btn-success" id="submit">Submit <i
                                class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>

                <div>
                    <div>
                        <h3 style="color: blue; text-align: center;">All Consultation Info.</h3>
                    </div>

                    <!--                    <div class="row">
                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label for="s_date">Search By Date</label>
                                                <input type="text" name="s_date" id="s_date" class="form-control new_datepicker">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-4 col-xs-12">
                                                <button type="button" class="pull-left btn btn-success" id="search_appointment">Search &nbsp<i
                                                        class="fa fa-search"></i></button>
                                            </div>
                                        </div>-->

                    <div class="box-body table-responsive" style="width: 100%; overflow-x: scroll; color: black;"
                         id="appointment">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">SL</th>
                                    <th style="text-align: center;">Patient[ID]</th>
                                    <th style="text-align: center;">Mobile</th>
                                    <th style="text-align: center;">Address</th>
                                    <th style="text-align: center;">Age</th>
                                    <th style="text-align: center;">Doctor</th>
                                    <th style="text-align: center;">Fee</th>
                                    <th style="text-align: center;">Discount</th>
                                    <th style="text-align: center;">S.Total</th>
                                    <th style="text-align: center;">Commission</th>
                                    <th style="text-align: center;">Hospital</th>
                                    <th style="text-align: center;">Appt_Date</th>
                                    <th style="text-align: center;">Appt_Time</th>
                                    <!--<th style="text-align: center;">Status</th>-->
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
                                        <td style="text-align: center;"><?php echo $single_value->patient_name. "[".$single_value->patient_id."]"; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->mobile; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->age; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->doctor_name . " [" . $single_value->designation . "]"; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->doctor_fee; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->discount; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->sub_total; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->doctor_commission; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->company_commission; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->date; ?></td>
                                        <td style="text-align: center;"><?php echo date("h:i A", strtotime($single_value->appointment_time)); ?></td>
    <!--                                        <td style="text-align: center;">
                                        <?php
                                        if ($single_value->status == 0) {
                                            echo "Due";
                                        } else {
                                            echo "Paid";
                                        }
                                        ?>
                                        </td>-->
                                        <td style="text-align: center;">
                                            <a style="margin: 5px;"
                                               href="<?php echo base_url(); ?>Show_edit_form/invoice_app/<?php echo $single_value->record_id; ?>"
                                               class="btn btn-success">Invoice
                                            </a>
                                            <a style="margin: 5px;" class="btn btn-info"
                                               href="<?php echo base_url(); ?>Show_edit_form/consultancy/<?php echo $single_value->record_id; ?>/main">Edit
                                            </a>
                                            <a style="margin: 5px;"
                                               href="<?php echo base_url(); ?>Delete/consultancy/<?php echo $single_value->record_id; ?>"
                                               class="btn btn-danger">Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div><!-- /.box-body -->
                </div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">

    var c_status = 0;

    $('#c_plus').on('click', function () {
        $('#patient_id').selectpicker('hide');
        $('#new_patient').show();
        $('#c_back').show();
        $('#patient_id').hide();
        $('#c_plus').hide();
        $('#mobile').val('');
        $('#age').val('');
        $('#address').val('');
        c_status = 1;
    });


    $('#c_back').on('click', function () {
        $('#patient_id').selectpicker('show');
        $('#new_patient').hide();
        $('#c_back').hide();
        $('#patient_id').show();
        $('#c_plus').show();
        $('#new_patient').val('');
        c_status = 0;
    });
//    Add and Insert Patient End
    $("#patient_id").on("change paste keyup", function () {
        var patient = $('#patient_id').val().split("###");
        var patient_id = patient[0];
        var patient_name = patient[1];
        var post_data = {
            'patient_id': patient_id,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_patient_age_mobile_address",
            data: post_data,
            dataType: 'json',
            success: function (data) {
                $('#age').val(data[0]);
                $('#mobile').val(data[1]);
                $('#address').val(data[2]);
            }
        });
    });

    $("#discount, #doctor_commission").on("change paste keyup", function () {
        var discount = $('#discount').val();
        var doctor_commission = $('#doctor_commission').val();
        if (discount == "") {
            discount = 0;
        }

        if (doctor_commission == "") {
            doctor_commission = 0;
        }
        var doctor_fee = $('#doctor_fee').val();
        var sub_total = parseFloat(doctor_fee) - parseFloat(discount);
        var company_commission = parseFloat(sub_total) - parseFloat(doctor_commission);
        $('#sub_total').val(sub_total);
        $('#company_commission').val(company_commission);
    });

    $("#doctor_name").on("change paste keyup", function () {
        var doctor = $('#doctor_name').val().split("###");
        var doctor_name = doctor[0];
        var post_data = {
            'doctor_name': doctor_name,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_doctor_fee",
            data: post_data,
            dataType: 'json',
            success: function (data) {
//                alert(data[0]);
                $('#doctor_fee').val(data[0]);
                $('#discount').val(0);
                $('#sub_total').val(data[0]);
                $('#doctor_commission').val(data[1]);
                $('#company_commission').val(data[2]);
            }
        });
    });

    $('#search_appointment').on('click', function () {
        var date = $('#s_date').val();
        var post_data = {
            'date': date,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/appointment_by_date",
            data: post_data,
            success: function (data) {
                $('#appointment').html(data);
            }
        });
    });

    $("#submit").click(function () {

        var date = $('#date').val();
        if (c_status == 1) {
            var patient_id = "";
            var patient_name = $('#new_patient').val();
        } else {
            var patient = $('#patient_id').val().split("###");
            var patient_id = patient[0];
            var patient_name = patient[1];
        }
        var doctor = $('#doctor_name').val().split("###");
        var doctor_name = doctor[0];
        var doctor_designation = doctor[1];

        var age = $('#age').val();
        var mobile = $('#mobile').val();
        var address = $('#address').val();
        var doctor_fee = $('#doctor_fee').val();
        var discount = $('#discount').val();
        var sub_total = $('#sub_total').val();
        var doctor_commission = $('#doctor_commission').val();
        var company_commission = $('#company_commission').val();
        var appointment_time = $('#appointment_time').val();

        var post_data = {
            'date': date, 'patient_id': patient_id, 'patient_name': patient_name, 'doctor_designation': doctor_designation, 'doctor_name': doctor_name, 'age': age,
            'address': address, 'doctor_fee': doctor_fee, 'appointment_time': appointment_time, 'mobile': mobile, 'c_status': c_status,
            'discount': discount, 'sub_total': sub_total, 'doctor_commission': doctor_commission, 'company_commission': company_commission,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/consultancy_confirm",
            data: post_data,
            success: function (data) {
                window.location.replace("<?php echo base_url(); ?>Show_edit_form/invoice_app/" + data);
            }
        });
    });


</script>