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
                <div class="box box-info" style="color: black;" id="no_print1">
                    <div class="box-body">
                        <p style="font-size: 20px;">Balance Sheet</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>

                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="date_from">Date From</label>
                                <input type="text" class="form-control new_datepicker" name="date_from" id="date_from"  autocomplete="off">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="date_to">Date To</label>
                                <input type="text" class="form-control new_datepicker" name="date_to" id="date_to" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="button" id="search_ledger" class="pull-left btn btn-success">Search <i
                                class="fa fa-search"></i></button>
                    </div>
                </div>
                <div id="show_ledger"></div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
    
    $("#search_ledger").click(function () {
        var date_from = $('#date_from').val();
        var date_to = $('#date_to').val();
        var post_data = {
            'date_from': date_from, 'date_to': date_to,
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_ledger_info",
            data: post_data,
            success: function (data) {
                $('#show_ledger').html(data);
            }
        });
    });
</script>