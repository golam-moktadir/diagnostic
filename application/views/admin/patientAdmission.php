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
<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable"> 
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Insert/patient_admission'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Discharge Info.</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="patient_id">Patient Name</label>
                                <select id="patient_id" name="patient_id" class="form-control selectpicker"
                                        data-live-search ="true">
                                    <option value="">--Select--</option>
                                    <?php foreach ($all_patient as $info) { ?>
                                        <option value="<?php echo $info->record_id . "###" . $info->name; ?>"><?php echo $info->record_id . ' - ' . $info->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
<!--                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" id="age" placeholder="" name="age">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="mobile">Mobile Number</label>
                                <input type="text" class="form-control" id="mobile" placeholder="" name="mobile">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="doctor">Doctor Name </label>
                                <select id="doctor" name="doctor" class="form-control selectpicker"
                                        data-live-search ="true">
                                    <option value="">--Select--</option>
                                    <?php foreach ($doctor as $info) { ?>
                                        <option value="<?php echo $info->name; ?>"><?php
                                            echo $info->name .
                                            " [" . $info->department . "]";
                                            ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
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
                            </div>-->
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="date_from">Date From</label>
                                <input type="text" class="form-control new_datepicker" name="date_from" id="date_from">

                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="date_to">Date To</label>
                                <input type="text" class="form-control new_datepicker" name="date_to" id="date_to" >
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
                            <div class="form-group col-sm-1 col-xs-12">
                                <label for="total_day">Total Day</label>
                                <input type="text" class="form-control" name="total_day" id="total_day" readonly="" value="0">
                            </div>
                            <div class="form-group col-sm-1 col-xs-12">
                                <label for="single_day_price">Daily Price</label>
                                <input type="text" class="form-control" id="single_day_price" 
                                       value="0" placeholder="" name="single_day_price" readonly="">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="amount">Amount</label>
                                <input type="text" class="form-control" id="amount" placeholder="" name="amount" readonly="">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="discount">Discount</label>
                                <input type="text" class="form-control" id="discount" placeholder="" name="discount">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="sub_total">Sub Total</label>
                                <input type="text" class="form-control" id="sub_total" placeholder="" name="sub_total" readonly="">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="pay">Pay</label>
                                <input type="text" class="form-control" id="pay" placeholder="" name="pay">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="due">Due</label>
                                <input type="text" class="form-control" id="due" placeholder="" name="due" readonly="">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Submit <i class="fa fa-arrow-circle-right"></i></button>
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
                                    <th style="text-align: center;">Patient Name</th>
                                    <!--<th style="text-align: center;">Reference Doctor</th>-->
                                    <!--<th style="text-align: center;">Department</th>-->
                                    <th style="text-align: center;"> Bed/Cabin No.</th>
                                    <th style="text-align: center;">Total Day</th>
                                    <th style="text-align: center;">Amount</th>
                                    <th style="text-align: center;">Discount</th>
                                    <th style="text-align: center;">Sub-total</th>
                                    <th style="text-align: center;">Paid</th>
                                    <th style="text-align: center;">Due</th>
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
                                        <td style="text-align: center;"><?php echo $single_value->patient_name."[ID- " . $single_value->patient_id."]"; ?></td>
<!--                                        <td style="text-align: center;"><?php // echo $single_value->doctor; ?></td>-->
<!--                                        <td style="text-align: center;"><?php // echo $single_value->department; ?></td>-->
                                        <td style="text-align: center;"><?php echo $single_value->room_no; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->total_day; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->amount; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->discount; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->sub_total; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->pay; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->due; ?></td>
                                        <td style="text-align: center;">
                                            <a style="margin: 5px;" class="btn btn-danger"
                                               href="<?php echo base_url(); ?>Delete/patientAdmission/<?php echo $single_value->record_id; ?>">Delete
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

<script>
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
    $("#room_no, #discount, #pay").on("change paste keyup", function () {
        calculation();
    });
    function calculation() {
        var room_no = $('#room_no').val();
        var date_from = $('#date_from').val();
        var date_to = $('#date_to').val();

        var post_data = {
            'room_no': room_no,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            async: false,
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_room_price",
            data: post_data,
            success: function (data) {
                $('#single_day_price').val(data);
            }
        });

        var post_data = {
            'date_from': date_from, 'date_to': date_to,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            async: false,
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_total_day",
            data: post_data,
            success: function (data) {
                $('#total_day').val(data);
            }
        });
        var total_day = $('#total_day').val();
        var single_day_price = $('#single_day_price').val();
        var complete_total = total_day * single_day_price;
        $('#amount').val(complete_total);
        var discount = $('#discount').val();
        if (discount == "") {
            discount = 0;
        }
        $('#sub_total').val(Number(complete_total - discount));
        var pay = $('#pay').val();
        if (pay == "") {
            pay = 0;
        }
        var after_pay = Number(complete_total - discount - pay);
        if (after_pay >= 0) {
            $('#due').val(after_pay);
            $('#advance').val(0);
        } else {
            $('#due').val(0);
            $('#advance').val(after_pay * (-1));
        }
    }
</script>