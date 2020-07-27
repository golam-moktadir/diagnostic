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
                    <?php echo form_open_multipart('Insert/lab_product_use_out'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px; color: green; font-weight: bold; text-align: center;">Lab Stock(OUT)</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="date">Date</label>
                                <input type="text" class="form-control new_datepicker" id="date"
                                       value="<?php echo date('Y-m-d'); ?>" placeholder="Date" name="date">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <!--                            <label for="product_name">Product Name<b style="color: red;">*</b></label>
                                                            <select name="product_name" id="product_name" class="form-control">
                                                                <option value="">-- Select --</option>
                                <?php foreach ($all_product as $info) { ?>
                                                                        <option value="<?php echo $info->product_name . "###" . $info->product_category; ?>">
                                    <?php echo $info->product_category; ?> [<?php echo $info->product_category; ?>]
                                                                        </option>
                                <?php } ?>
                                                            </select>-->
                                <label for="product_name">Product Name</label>
                                <select id="product_name" name="product_name" class="form-control selectpicker"
                                        data-live-search ="true">
                                    <option value="">--Select--</option>
                                    <?php foreach ($all_product as $info) { ?>
                                        <option value="<?php echo $info->product_name; ?>">
                                            <?php echo $info->product_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div> 
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="total_qty">Total Quantity<b style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="total_qty" placeholder="" name="total_qty">
                            </div>
                           
<!--                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="unit_price">Unit  Price<b style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="unit_price" placeholder="" name="unit_price">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="total_price">Total  Price<b style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="total_price" placeholder="" name="total_price">
                            </div>-->
                           
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Insert <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>

                <div>
                    <div>
                        <h4 style="color: blue; text-align: center;">Lab Stock(OUT) Info.</h4>                               
                    </div>

                    <div class="box-body table-responsive" style="width: 100%; overflow-x: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Serial.</th>
                                    <th style="text-align: center;">Product Name</th>
                                    <th style="text-align: center;">Qty</th>
<!--                                    <th style="text-align: center;">Unit Price</th>
                                    <th style="text-align: center;">Total Price</th>-->
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
                                        <td style="text-align: center;"><?php echo $single_value->product_name; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->qty; ?> Pcs</td>
<!--                                        <td style="text-align: center;"><?php echo $single_value->unit_price; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->total_price; ?> /-</td>-->
                                        <td style="text-align: center;">

                                            <a style="margin: 5px;" class="btn btn-danger"
                                               href="<?php echo base_url(); ?>Delete/lab_product_use_out/<?php echo $single_value->record_id; ?>">Delete
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

