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
                                <p style="font-size: 20px;">Return Product</p>
                            </div>

                        </div>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-6 col-xs-12" style="width: 400px;">
                                <label for="date">Date</label>
                                <input type="text" class="form-control" id="date" placeholder="" name="date"
                                       value="<?php echo date("d-m-Y"); ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6 col-xs-12" style="width: 400px;">
                                <label for="invoice">Select Invoice No.</label>
                                <select id="invoice" name="invoice" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">--Select--</option>
                                    <?php foreach ($sold_product as $info) { ?>
                                        <option value="<?php echo $info->invoice_no ?>"><?php
                                            echo $info->invoice_no;
                                            ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div id="sold_product" style="overflow: scroll;">

                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">

                    </div>
                    </form>
                </div>
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info.</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Date</th>
                                <th style="text-align: center;">Invoice No.</th>
                                <th style="text-align: center;">Product Name</th>
                                <th style="text-align: center;">Product Type</th>
                                <th style="text-align: center;">Returned Quantity</th>
                                <th style="text-align: center;">Returned Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tbody>
                            <?php
                            $count = 0;
                            foreach ($all_value as $single_value) {
                                $count++;
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $count; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->date; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->invoice_no; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->product_name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->type; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->returned_qty; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->returned_amount; ?></td>
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

    $("#invoice").on("change paste keyup", function () {
        var invoice = $('#invoice').val();
        var post_data = {
            'invoice_no': invoice,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        console.log(post_data);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/sold_product_info",
            data: post_data,
            success: function (data) {
                console.log(data);
                $('#sold_product').html(data);
            }
        });
    });


</script>