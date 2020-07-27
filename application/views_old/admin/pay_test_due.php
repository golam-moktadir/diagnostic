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
<style>
    .content {
        padding-top: 0px;
        margin-top: 0px;
    }

    .form-group {
        margin-bottom: 5px;
    }

    .col-sm-2 {
        padding: 0px 2px 0px 2px;
    }

    .table tbody tr:hover td {
        background-color: #76e094;
    }
</style>
<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable" id="full_page">
                <div style="color: black; margin-bottom: 5px;">
                    <?php echo form_open_multipart('Insert/pay_test_due'); ?>
                    <div class="box-body">
                        <p id="empty_msg" style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="date">Date</label>
                            <input type="text" class="form-control new_datepicker" id="date" required=""
                                   value="<?php echo date('Y-m-d'); ?>" placeholder="Date" name="date">
                        </div>

                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="patient_id">Patient Name</label>
                            <select id="patient_id" name="patient_id" class="form-control"
                                    data-live-search ="true" required="">
                                <option value="">--Select--</option>
                                <?php foreach ($all_patient as $info) { ?>
                                    <option value="<?php echo $info->record_id . "###" . $info->name; ?>">
                                        <?php echo $info->record_id . ' - ' . $info->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="previous_due">Previous Due</label>
                            <input type="text" class="form-control" id="previous_due"
                                   readonly=" " placeholder="" name="previous_due">
                        </div>
                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="pay">Pay</label>
                            <input type="text" class="form-control" id="pay" placeholder="" name="pay" required="">
                        </div>
                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="due">Due</label>
                            <input type="text" class="form-control" id="due" placeholder="" name="due" required="">
                        </div>
                        <div class="form-group col-sm-2 col-xs-12">
                            <button  type="submit" style="margin-top: 27px;"
                                     class="btn btn-success">
                                Confirm <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
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
            url: "<?php echo base_url(); ?>Get_ajax_value/get_test_due",
            data: post_data,
            success: function (data) {
//                alert(data);
                $('#previous_due').val(data);
                $('#pay').val(0);
                $('#due').val(0);
            }
        });
    });

    $("#pay").on("change paste keyup", function () {
        var previous_due = $('#previous_due').val();
        if (previous_due == "") {
            previous_due = 0;
        }
        var pay = $('#pay').val();
        $('#due').val(Number(previous_due - pay));
    });
</script>