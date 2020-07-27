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
                <div id="invoice" style="padding-top: 0px; margin-top: 0px;"></div>
                <div class="box box-info no_print" style="color: black;">
                    <div class="box-body">
                        <!--<p style="font-size: 20px;">Patient Appointment Info</p>-->
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="patient_id">Patient Name</label>
                                <select name="patient_id" id="patient_id" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">--Select--</option>
                                    <?php foreach ($all_patient as $info) { ?>
                                        <option value="<?php echo $info->record_id; ?>">
                                            <?php echo "$info->name [ID: $info->record_id]"; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div> 
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="date">Appointment Date</label>
                                <input type="text" class="form-control new_datepicker" id="date"
                                       value="<?php echo date('Y-m-d'); ?>" placeholder="Date" name="date">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12" style="padding-top: 26px;">
                                <button type="button" class="pull-left btn btn-success" id="submit">Search <i
                                        class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

                <div class="box box-info no_print" id="app_info"></div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">

//    var c_status = 0;
//
//    $('#c_plus').on('click', function () {
//        $('#patient_id').selectpicker('hide');
//        $('#new_patient').show();
//        $('#c_back').show();
//        $('#patient_id').hide();
//        $('#c_plus').hide();
//        c_status = 1;
//    });
//
//
//    $('#c_back').on('click', function () {
//        $('#patient_id').selectpicker('show');
//        $('#new_patient').hide();
//        $('#c_back').hide();
//        $('#patient_id').show();
//        $('#c_plus').show();
//        $('#new_patient').val('');
//        c_status = 0;
//    });
////    Add and Insert Patient End
//    $("#patient_id").on("change paste keyup", function () {
//        var patient = $('#patient_id').val().split("###");
//        var patient_id = patient[0];
//        var patient_name = patient[1];
//        var post_data = {
//            'patient_id': patient_id,
//            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
//        };
//
//        $.ajax({
//            type: "POST",
//            url: "<?php echo base_url(); ?>Get_ajax_value/get_patient_age_mobile",
//            data: post_data,
//            dataType: 'json',
//            success: function (data) {
//                $('#age').val(data[0]);
//                $('#mobile').val(data[1]);
//            }
//        });
//    });
//
//    $("#doctor_name").on("change paste keyup", function () {
//        var doctor = $('#doctor_name').val().split("###");
//        var doctor_name = doctor[0];
//        var post_data = {
//            'doctor_name': doctor_name,
//            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
//        };
//
//        $.ajax({
//            type: "POST",
//            url: "<?php echo base_url(); ?>Get_ajax_value/get_doctor_fee",
//            data: post_data,
//            success: function (data) {
//                $('#doctor_fee').val(data);
//            }
//        });
//    });

    $('#submit').on('click', function () {
        view();
    });

    function close_invoice() {
        $('#invoice').hide();
    }

    function edit_app(id) {
        var url = "<?php echo base_url() ?>Edit/appointment_status/" + id;
        $.ajax({
            url: url,
            success: function (data) {
                view();
            }
        });
    }

    function invoice_app(id) {
        var url = "<?php echo base_url() ?>Show_edit_form/invoice_app/" + id;
        $.ajax({
            url: url,
            success: function (data) {
                $('#invoice').show();
                $('#invoice').html(data);
            }
        });
    }
    
    function pad(id) {
        var url = "<?php echo base_url() ?>Show_edit_form/pad/" + id;
        $.ajax({
            url: url,
            success: function (data) {
                $('#invoice').show();
                $('#invoice').html(data);
            }
        });
    }

    function view() {
        var date = $('#date').val();
        var patient_id = $('#patient_id').val();
//        alert(date + patient_id);
        var post_data = {
            'date': date, 'patient_id': patient_id,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/appointment_by_date",
            data: post_data,
            success: function (data) {
                $('#app_info').html(data);
            }
        });
    }
</script>