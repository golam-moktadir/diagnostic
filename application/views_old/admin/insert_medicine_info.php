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
} elseif ($msg == "add") {
    $msg = "Product Added Successfully";
}
?>
<style>
    .content{ padding-top: 0px; margin-top: 0px;}
    .form-group{ margin-bottom: 0px;}
</style>
<aside>
    <section class="content" style="padding-top: 0px; margin-top: 0px;">
        <div class="row">
            <section class="col-xs-12 connectedSortable"> 
                <div style="color: black;">
                    <?php echo form_open_multipart('Insert/insert_medicine_info'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Insert Medicine Info.</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="medicine_presentation">Medicine Presentation<b style="color: red;">*</b></label>
                                <select name="medicine_presentation" id="medicine_presentation" class="form-control">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($medicine_presentation as $info) { ?>
                                        <option value="<?php echo $info->medicine_presentation; ?>">
                                            <?php echo $info->medicine_presentation; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="medicine_name">Medicine Name<b style="color: red;">*</b></label>
                                <select name="medicine_name" id="medicine_name" class="form-control">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($types_of_medicine as $info) { ?>
                                        <option value="<?php echo $info->medicine_name . "###" . $info->generic_name; ?>">
                                            <?php echo $info->medicine_name; ?> [<?php echo $info->generic_name; ?>]
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="unit">Unit<b style="color: red;">*</b></label>
                                <select name="unit" id="unit" class="form-control">
                                    <option value="">-- Select --</option>
                                    <option value="Box">Box</option>
                                    <option value="Bottle">Bottle</option>
                                    <option value="Container">Container</option>
                                    <option value="Gram (g)">Gram (g)</option>
                                    <option value="Kg">Kg</option>
                                    <option value="Inch">Inch</option>
                                    <option value="Liter (l)">Liter (L)</option>
                                    <option value="meter (m)">Meter (m)</option>
                                    <option value="meter (m)">Pcs</option>
                                </select>
                            </div>
                            
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="reminder_level">Reminder Level</label>
                                <input type="text" class="form-control" id="reminder_level" placeholder="" name="reminder_level">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12" style="margin-top: 27px;">
                                <button type="submit" class="pull-left btn btn-success">Insert <i class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

                <div>
                    <div class="box-body table-responsive" style="width: 98%; overflow-x: scroll; color: black;">
                        <table id="pagination_search" class="table table-bordered table-hover">
                            <p style="font-size: 20px; text-align: center;"><u><b>All Medicine Info.</b></u></p>
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Add Product</th>
                                    <th style="text-align: center;">Details</th>
<!--                                    <th style="text-align: center;">Vendor</th>-->
                                    <th style="text-align: center;">Unit</th>
                                    <th style="text-align: center;">Qty</th>
                                     <th style="text-align: center;">U.P Price</th>
                                    <th style="text-align: center;">T.P</th>
                                    <th style="text-align: center;">T. Sales Price</th>
                                    <th style="text-align: center;">U. Sales Price</th>
<!--                                    <th style="text-align: center;">U. Sales Price</th>
                                    <th style="text-align: center;">Total Wholesale</th>
                                    <th style="text-align: center;">Retail U.Price</th>
                                    <th style="text-align: center;">Total Retail</th>
                                    <th style="text-align: center;">Description</th>
                                    <th style="text-align: center;">Image</th>
                                    <th style="text-align: center;">Barcode</th>
                                    <th style="text-align: center;">Shelf Details</th>-->
                                    <th style="text-align: center;">Reminder Level</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                $total_qty = 0;
                                $total_p = 0;
                                $total_w = 0;
                                $total_r = 0;

                                foreach ($all_value as $single_value) {
                                    $count++;
//                                    $total_qty += $single_value->total_qty;
//                                    $total_p += $single_value->purchase_price * $single_value->total_qty;
//                                    $total_w += $single_value->wholesale_price * $single_value->total_qty;
//                                    $total_r += $single_value->retail_price * $single_value->total_qty;
                                    ?>
                                    <tr>
                                        <td style="text-align: center;">
                                            <a style="margin: 5px;" class="btn btn-success fa fa-plus-square" title="Add Product"
                                               href="<?php echo base_url(); ?>Show_form/purchase_medicine/<?php echo $single_value->record_id; ?>/main">
                                            </a>
                                        </td>
                                        <td style="text-align: left;">
                                            <?php echo $single_value->medicine_name; ?>
                                            [<b>ID: </b><?php echo ''.sprintf('%04d', $single_value->record_id); ?>]<br>
                                            <b>Presentation: </b><?php echo $single_value->medicine_presentation; ?><br>
                                        </td>
                                        <td style="text-align: center;">
                                            <?php echo $single_value->unit_type; ?>
                                        </td>
                                          <td style="text-align: center;"><?php echo $single_value->total_qty; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->purchase_price; ?> /-</td>
                                        <td style="text-align: center;"><?php echo $single_value->total_purchase_price; ?> /-</td>
                                        <td style="text-align: center;"><?php echo $single_value->total_sales_price; ?> /-</td>
                                        <td style="text-align: center;"><?php echo $single_value->selling_price; ?> /-</td>
                                        <td style="text-align: center;"><?php echo $single_value->reminder_level; ?> Pcs</td>
                                        <td style="text-align: center;">
<!--                                            <a style="margin: 5px;" class="btn btn-primary fa fa-print" title="Print Barcode"
                                               href="<?php echo base_url(); ?>Show_form/print_barcode/<?php echo $single_value->record_id; ?>/main">
                                            </a>-->
<!--                                            <a style="margin: 5px;" class="btn btn-info fa fa-edit" title="Edit"
                                               href="<?php echo base_url(); ?>Show_edit_form/insert_product_info/<?php echo $single_value->record_id; ?>/main">
                                            </a>-->
                                            <a style="margin: 5px;" class="btn btn-danger fa fa-trash-o" title="Delete"
                                               href="<?php echo base_url(); ?>Delete/insert_medicine_info/<?php echo $single_value->record_id; ?>">
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

<style>
    .zoom {
        width: 80px;
        height: 80px;
    }
    #pagination_search_paginate {
        float: left !important;
    }
</style>
<script type="text/javascript">
    window.onload = function () {
        $('#pagination_search').dataTable({
            "ordering": false,
            "lengthMenu": [[25, 50, -1], [25, 50, "All"]],
            fixedHeader: {
                header: true,
                footer: true,
                headerOffset: 40
            }
        });
    };
</script>