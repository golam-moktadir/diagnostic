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
                    <?php echo form_open_multipart('Insert/purchase_medicine'); ?>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-sm-6 col-xs-12" style="width: 400px;">
                                <p style="font-size: 20px;">Return Product To Manufacturer</p>
                            </div>
                        </div>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-6 col-xs-12" style="width: 400px;">
                                <label for="date_from">Date From</label>
                                <input type="text" class="form-control new_datepicker" id="date_from" placeholder="" name="date_from">
                            </div>
                            <div class="form-group col-sm-6 col-xs-12" style="width: 400px;">
                                <label for="date_to">Date to</label>
                                <input type="text" class="form-control new_datepicker" id="date_to" placeholder="" name="date_to">
                            </div>
                        </div>
                        <div class="box-footer clearfix">
                            <button type="button" class="pull-left btn btn-success" id="search_purchase">Search <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                        <div id="show_purchase"></div>
                        <div class="box box-info">
                            <div class="row">
                                <div class="form-group col-sm-6 col-xs-12" style="width: 400px;">
                                    <label for="invoice">Select Voucher No.</label>
                                    <select id="invoice" name="invoice" class="form-control selectpicker"
                                            data-live-search="true">
                                        <option value="">--Select--</option>
                                        <?php foreach ($purchased_medicine as $info) { ?>
                                            <option value="<?php echo $info->invoice_no ?>"><?php
                                                echo $info->invoice_no;
                                                ?></option>
                                        <?php } ?>

                                        <?php foreach ($purchased_product as $info) { ?>
                                            <option value="<?php echo $info->invoice_no ?>"><?php
                                                echo $info->invoice_no;
                                                ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div id="purchased_product" style="overflow: scroll;">

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="box-footer clearfix">

                    </div>
                    </form>
                </div>

            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">

    $("#invoice").on("change paste keyup", function () {
        var invoice = $('#invoice').val();
        var post_data = {
            'invoice_no': invoice,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        console.log(post_data);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/purchased_product_info",
            data: post_data,
            success: function (data) {
                console.log(data);
                $('#purchased_product').html(data);
            }
        });
    });

    $("#search_purchase").click(function () {
        var date_from = $('#date_from').val();
        var date_to = $('#date_to').val();
        var invoice = $('#invoice').val();
        var manufacturer = $('#manufacturer').val();
        var category = $('#category').val();
        var post_data = {
            'date_from': date_from, 'date_to': date_to,
            'invoice': invoice, 'manufacturer': manufacturer, 'category': category,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_purchase_for_manufacture_return",
            data: post_data,
            success: function (data) {
                $('#show_purchase').html(data);
            }
        });
    });

</script>