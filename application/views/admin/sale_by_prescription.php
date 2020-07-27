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
<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-sm-6 col-xs-12" style="width: 400px;">
                                <p style="font-size: 20px;">Sale By Prescription</p>
                            </div>
                        </div>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-6 col-xs-12" style="width: 400px;">
                                <label for="invoice">Select Prescription No.</label>
                                <select id="invoice" name="invoice" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">--Select--</option>
                                    <?php foreach ($prescription as $info) { ?>
                                        <option value="<?php echo $info->prescription_id; ?>"><?php
                                            echo $info->prescription_id;
                                            ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="box-footer clearfix">
                                <button type="button" class="pull-left btn btn-success" id="search_prescription">Search
                                    <i class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>

                        <div class="row">
                            <div id="prescription" style="overflow: scroll;">

                            </div>
                        </div>

                        <div class="row">
                            <div id="sale_prescription" style="overflow: scroll;">

                            </div>
                        </div>


                    </div>
                    <div class="box-footer clearfix">

                    </div>
                </div>

            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">


    $("#search_prescription").click(function () {
        var invoice = $('#invoice').val();
        var post_data = {
            'prescription_id': invoice,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/show_prescription_byid",
            data: post_data,
            success: function (data) {
                $('#prescription').html(data);
            }
        });
    });

</script>