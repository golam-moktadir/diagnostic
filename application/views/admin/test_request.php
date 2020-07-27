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
                    <div class="form-group col-sm-3 col-xs-12">
                                <label for="date_from">Date From</label>
                                <input type="text" class="form-control new_datepicker"
                                       placeholder="Insert Date" name="date_from" id="date_from"
                                       autocomplete="off">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="date_to">Date To</label>
                                <input type="text" class="form-control new_datepicker"
                                       placeholder="Insert Date" name="date_to" id="date_to"
                                       autocomplete="off">
                            </div>
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
                        <div class="form-group col-sm-3 col-xs-12">
                            <button type="button" class="pull-left btn btn-info" style="margin-top: 24px; width: 150px;"
                                    id="search_btn">Search <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                </div>
        </div>
                   <div id="show_info"><?php
                        for ($i = 1; $i <= 100; $i++) {
                            echo "<br>";
                        }?>
                    </div>
    </section>
</div>
</section>
</aside>

<script type="text/javascript">
    $('#search_btn').on('click', function (e) {
        var date_from = $('#date_from').val();
        var date_to = $('#date_to').val();
        var patient = $('#patient_id').val().split("###");
        var patient_id = patient[0];
        var patient_name = patient[1];
        var post_data = {
            'patient_id': patient_id, 'patient_name': patient_name,'date_from': date_from, 'date_to': date_to,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_test_request",
            data: post_data,
            success: function (data) {
                $('#show_info').html(data);
            }
        });
    });
</script>