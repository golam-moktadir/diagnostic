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
                    <?php echo form_open_multipart('Insert/purchase_medicine'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Purchase Statement</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>

                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="date_from">Date From</label>
                                <input type="text" class="form-control new_datepicker" name="date_from" id="date_from">
                               
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="date_to">Date To</label>
                                <input type="text" class="form-control new_datepicker" name="date_to" id="date_to">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="category">Select Category</label>
                                <select id="category" name="category" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">--Select--</option>
                                    <option value="medicine">Medicine</option>
                                    <option value="product">Product</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="invoice">Select Voucher No.</label>
                                <select id="invoice" name="invoice" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">--Select--</option>
                                    <?php foreach ($invoice_medicine as $info) { ?>
                                        <option value="<?php echo $info->invoice_no; ?>">
                                            <?php echo $info->invoice_no; ?>
                                        </option>
                                    <?php } ?>
                                        <?php foreach ($invoice_product as $info) { ?>
                                        <option value="<?php echo $info->invoice_no; ?>">
                                            <?php echo $info->invoice_no; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="manufacturer">Select Supplier</label>
                                <select id="manufacturer" name="manufacturer" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">--Select--</option>
                                    <?php foreach ($company as $info) { ?>
                                        <option value="<?php echo $info->manufacture_company; ?>">
                                            <?php echo $info->manufacture_company; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                               <button type="button" class="pull-left btn btn-success" style="margin-top:22px" id="search_purchase">Search <i class="fa fa-arrow-circle-right"></i></button>
                            </div>
                            
                        </div>
                    </div>
                    </form>
                </div>
                <div id="show_purchase"></div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
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
            url: "<?php echo base_url(); ?>Get_ajax_value/get_purchase_statement",
            data: post_data,
            
            success: function (data) {
                $('#show_purchase').html(data);
            }
        });
    });
</script>