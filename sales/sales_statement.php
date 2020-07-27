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
                        <p style="font-size: 20px;">Sales Statement</p>
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
                           <div class="form-group col-sm-3 col-xs-12">
                                <label for="client_id">Client ID</label>
                                <select name="client_id" id="client_id" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_client as $info) { ?>
                                        <option value="<?php echo $info->record_id; ?>">
                                            <?php echo "$info->name [ID: $info->record_id]"; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="category">Select Type</label>
                                <select id="category" name="category" class="form-control selectpicker">
                                    <option value="">--Select--</option>
                                    <option value="medicine">Medicine</option>
                                    <option value="product">Product</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="invoice">Select Invoice No.</label>
                                <select id="invoice" name="invoice" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">--Select--</option>

                                    <?php foreach ($invoice as $info) { ?>
                                        <option value="<?php echo $info->invoice_no; ?>">
                                            <?php echo $info->invoice_no; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="user">Select User</label>
                                <select id="user" name="user" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">--Select--</option>
                                    <?php foreach ($admin as $info) { ?>
                                        <option value="<?php echo $info->name; ?>">
                                            <?php echo $info->name; ?>
                                        </option>
                                    <?php } ?>
                                    <?php foreach ($staff as $info) { ?>
                                        <option value="<?php echo $info->name; ?>">
                                            <?php echo $info->name; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="box-footer clearfix">
                        <div class="col-sm-2 col-sm-offset-5">
                            <button type="button" class="pull-left btn btn-success" id="search_sales">Search &nbsp<i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                    </form>
                </div>
                <div id="show_sales"></div>
            </section>
        </div>
    </section>
</aside>


<script type="text/javascript">
    $("#search_sales").click(function () {
        var date_from = $('#date_from').val();
        var date_to = $('#date_to').val();
        var invoice = $('#invoice').val();
        var category = $('#category').val();
        var user = $('#user').val();
        var post_data = {
            'date_from': date_from, 'date_to': date_to,
            'invoice': invoice, 'category': category, 'user': user,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_sales_statement",
            data: post_data,
            success: function (data) {
                $('#show_sales').html(data);
            }
        });
    });
</script>