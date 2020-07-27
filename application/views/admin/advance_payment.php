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
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Insert/advance_payment'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Patient Admission </p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" placeholder="" name="date"
                                       value="<?php echo date("Y-m-d"); ?>">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="patient_id">Patient Name</label>
                                <select id="patient_id" name="patient_id" class="form-control"
                                        data-live-search ="true">
                                    <option value="">--Select--</option>
                                    <?php foreach ($all_patient as $info) { ?>
                                        <option value="<?php echo $info->record_id . "###" . $info->name; ?>">
                                            <?php echo $info->record_id . ' - ' . $info->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
<div class="form-group col-sm-3 col-xs-12">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" id="age" placeholder="" name="age">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="mobile">Mobile Number</label>
                                <input type="text" class="form-control" id="mobile" placeholder="" name="mobile">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="doctor">Ref. Doctor</label>
                                <select id="doctor" name="doctor" class="form-control selectpicker"
                                        data-live-search ="true">
                                    <option value="">--Select--</option>
                                    <?php foreach ($doctor as $info) { ?>
                                        <option value="<?php echo $info->name; ?>"><?php
                                            echo $info->name;
                                            ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="department">Department</label>
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
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="room_no">Bed/Cabin Room No.</label>
                                <select name="room_no" id="room_no" class="form-control selectpicker"
                                        data-container="body">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_room as $single_room) { ?>
                                        <option value="<?php echo $single_room->room_no; ?>">
                                            <?php echo $single_room->room_no; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="amount">Advance Paymentt</label>
                                <input type="text" class="form-control" id="amount" placeholder="" value="0" name="amount">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Insert <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>

                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info.</h3>                               
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">SL</th>
                                    <th style="text-align: center;">Date</th>
                                    <!--<th style="text-align: center;">Invoice No</th>-->
<!--                             <th style="text-align: center;">Patient ID</th>-->
                                    <th style="text-align: center;">Patient Name</th>
                                    <th style="text-align: center;">Age</th>
                                    <th style="text-align: center;">Mobile No.</th>
                                    <th style="text-align: center;">Ref. Doctor</th>
                                    <th style="text-align: center;">Department</th>
                                    <th style="text-align: center;">Room/Cabin No.</th>
                                    <th style="text-align: center;">Advance Payment</th>
                                    <!--<th style="text-align: center;">Rest Amount</th>-->
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
                                        <td style="text-align: center;">
                                            <?php
                                            if ($single_value->date != "0000-00-00") {
                                                echo date('d F, Y', strtotime($single_value->date));
                                            }
                                            ?>
                                        </td>
                                        <!--<td style="text-align: center;"><?php echo $single_value->invoice_no; ?></td>-->
<!--                                        <td style="text-align: center;"><?php echo $single_value->patient_id; ?></td>-->
                                        <td style="text-align: center;"><?php echo $single_value->patient_name."[ID- " . $single_value->patient_id."]"; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->age; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->mobile; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->doctor; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->department; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->room_no; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->payment_amount; ?></td>
                                        <!--<td style="text-align: center;"><?php echo $single_value->rest_amount; ?></td>-->
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
            url: "<?php echo base_url(); ?>Get_ajax_value/get_patient_age_mobile",
            data: post_data,
            dataType: 'json',
            success: function (data) {
                $('#age').val(data[0]);
                $('#mobile').val(data[1]);
            }
        });
    });
    
    
    
    $("#invoice_no").on("change paste keyup", function () {
        var input_data = $('#invoice_no').val();
        var post_data = {
            'invoice_no': input_data,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_admission_invoice_data",
            data: post_data,
            dataType: 'JSON',
            success: function (data) {
                $('#patient_id').val(data[0]);
                $('#patient_name').val(data[1]);
                $('#due').val(data[2]);
                $('#rest_amount').val(data[2]);
            }
        });
    });

    $("#amount").on("change paste keyup", function () {
        var amount = parseFloat($('#amount').val());
        var due = parseFloat($('#due').val());
        $('#rest_amount').val(due - amount);
    });
</script>