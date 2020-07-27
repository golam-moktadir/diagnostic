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
<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div style="color: black; background: #a6d7ff; padding: 8px; border: 2px solid #055d9c; margin-bottom:5px;" class="no_print">
                    <div class="box-body">
                        <p style="font-size: 20px; color: green; font-weight: bold; text-align: center">Test Honorarium Report</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>

                        <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="date_from">Date From</label>
                                <input type="text" class="form-control new_datepicker" id="date_from"
                                       value="<?php echo date('Y-m-d'); ?>" placeholder="Date" name="date_from">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="date_to">Date To</label>
                                <input type="text" class="form-control new_datepicker" id="date_to"
                                       value="<?php echo date('Y-m-d'); ?>" placeholder="Date" name="date_to">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="doctor">Ref. Doctor</label>
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
                            <div class="form-group col-sm-1 col-xs-12" style="margin-top: 26px;">
                                <button type="button" id="search_report" class="pull-left btn btn-success">Search <i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="show_report"></div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">

    $("#search_report").click(function () {
        var date_from = $('#date_from').val();
        var date_to = $('#date_to').val();
        var doctor = $('#doctor').val();
        var post_data = {
            'date_from': date_from, 'date_to': date_to,  'doctor': doctor,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_honorarium_report_info",
            data: post_data,
            success: function (data) {
                $('#show_report').html(data);
            }
        });
    });
</script>