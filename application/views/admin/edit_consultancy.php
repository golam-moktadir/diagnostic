<?php
if ($msg == "main") {
    $msg = "";
}
?>
<aside >
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable" id="full_page">
                <div class="box box-info" style="color: black;">
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Consultation Invoice</p>
                        <p style="font-size: 20px; color: #066;" id="message"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="patient_id">Patient Name</label>
                                <select name="patient_id" id="patient_id" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="<?php echo $one_value[0]->patient_id . "###" . $one_value[0]->patient_name; ?>">
                                        <?php echo $one_value[0]->patient_name . " [ID: " . $one_value[0]->patient_id . "]"; ?>
                                    </option>
                                    <?php foreach ($all_patient as $info) { ?>
                                        <option value="<?php echo $info->record_id . "###" . $info->name; ?>">
                                            <?php echo "$info->name [ID: $info->record_id]"; ?>
                                        </option>
                                    <?php } ?>
                                </select> 
                            </div> 
                            <!--Patient Name Add and Insert New-->

                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="mobile">Mobile No.</label>
                                <input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo $one_value[0]->mobile; ?>">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" id="age" name="age" value="<?php echo $one_value[0]->age; ?>">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address"
                                       value="" placeholder="" name="address" value="<?php echo $one_value[0]->address; ?>">
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="doctor_name">Doctor Name</label>
                                <select name="doctor_name" id="doctor_name" class="form-control selectpicker" data-container="body">
                                    <option value="<?php echo $one_value[0]->doctor_name . "###" . $one_value[0]->designation ?>"><?php
                                        echo $one_value[0]->doctor_name .
                                        " [" . $one_value[0]->designation . "]";
                                        ?></option>
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
                                <input type="text" class="form-control" id="doctor_fee" placeholder="" readonly="" value="<?php echo $one_value[0]->doctor_fee; ?>"
                                       name="doctor_fee">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="discount">Discount</label>
                                <input type="text" class="form-control" id="discount" placeholder="" value="<?php echo $one_value[0]->discount; ?>"
                                       name="discount">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="sub_total">Sub-total</label>
                                <input type="text" class="form-control" id="sub_total" placeholder="" readonly="" value="<?php echo $one_value[0]->sub_total; ?>"
                                       name="sub_total">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="doctor_commission">Doctor Commission</label>
                                <input type="text" class="form-control" id="doctor_commission" placeholder="" value="<?php echo $one_value[0]->doctor_commission; ?>"
                                       name="doctor_commission">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="company_commission">Company Amount</label>
                                <input type="text" class="form-control" id="company_commission" placeholder="" readonly=""  value="<?php echo $one_value[0]->company_commission; ?>"
                                       name="company_commission">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="date">Appointment Date</label>
                                <input type="text" class="form-control new_datepicker" id="date" value="<?php echo $one_value[0]->date; ?>"
                                       placeholder="Date" name="date">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="appointment_time">Appointment Time</label>
                                <input type="time" class="form-control" id="appointment_time" placeholder="" value="<?php echo $one_value[0]->appointment_time; ?>"
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

            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
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

    $("#submit").click(function () {
        var date = $('#date').val();
        var patient = $('#patient_id').val().split("###");
        var patient_id = patient[0];
        var patient_name = patient[1];

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
            'address': address, 'doctor_fee': doctor_fee, 'appointment_time': appointment_time, 'mobile': mobile,
            'discount': discount, 'sub_total': sub_total, 'doctor_commission': doctor_commission, 
            'company_commission': company_commission, 'record_id': <?php echo $one_value[0]->record_id; ?>,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/consultancy_confirm_edit",
            data: post_data,
            success: function (data) {
                window.location.replace("<?php echo base_url(); ?>Show_edit_form/invoice_app/" + data);
            }
        });
    });


</script>