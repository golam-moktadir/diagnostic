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
                                <label for="manufacture_company">Supplier<b style="color: red;">*</b></label>
                                <select name="manufacture_company" id="manufacture_company" class="form-control">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($manufacture_company as $info) { ?>
                                        <option value="<?php echo $info->manufacture_company; ?>">
                                            <?php echo $info->manufacture_company; ?>
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
                                <label for="total_qty">Total Quantity<b style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="total_qty" placeholder="" name="total_qty">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="total_purchase_price">Total Purchase Price<b style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="total_purchase_price" placeholder="" name="total_purchase_price">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="unit_purchase_price">Unit Purchase Price<b style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="unit_purchase_price" placeholder="" name="unit_purchase_price">
                            </div>
                             <div class="form-group col-sm-3 col-xs-12">
                                <label for="unit_sales_price">Unit Sales Price<b style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="unit_sales_price" placeholder="" name="unit_sales_price">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="total_sales_price">Total Sales Price<b style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="total_sales_price" placeholder="" name="total_sales_price">
                            </div>
                           
<!--                            <div class="form-group col-sm-3 col-xs-12" style="display: none;">
                                <label for="average_sales_price">Average Sales Price<b style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="average_sales_price" placeholder="" name="average_sales_price">
                            </div>-->
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="reminder_level">Re-order Qty<b style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="reminder_level" placeholder="" name="reminder_level">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="expired_date">Expired Date<b style="color: red;">*</b></label>
                                <input type="text" class="form-control new_datepicker" id="expired_date" placeholder="" name="expired_date">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Insert <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>

                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info.</h3>                               
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No.</th>
<!--                                    <th style="text-align: center;">Types of Medicine</th>
                                    <th style="text-align: center;">Image</th>-->
                                    <th style="text-align: center;">Medicine Presentation</th>
                                    <th style="text-align: center;">Medicine Name</th>
                                    <th style="text-align: center;">Generic Name</th>
                                    <th style="text-align: center;">Manufacture Company</th>
                                    <!--<th style="text-align: center;">Storage Type</th>-->
                                    <th style="text-align: center;">Unit</th>
                                    <th style="text-align: center;">Total Quantity</th>
                                    <th style="text-align: center;">Total Purchase Price</th>
                                    <th style="text-align: center;">Unit Purchase Price</th>
                                    <th style="text-align: center;">Total Sales Price</th>
                                    <th style="text-align: center;">Unit Sales Price<th>
                                    <th style="text-align: center;">Re-order Qty</th>
                                    <th style="text-align: center;">Expired Product</th>
<!--                                    <th style="text-align: center;">Drug Indication</th>
                                    <th style="text-align: center;">Medicine Shelf</th>
                                    <th style="text-align: center;">Shelf Details</th>-->
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
    <!--                                        <td style="text-align: center;"><?php echo $single_value->types_of_medicine; ?></td>
                                        <td style="text-align: center;">
                                            <img src="<?php echo base_url(); ?>assets/img/medicine/<?php echo $single_value->image; ?>" width="50" height="50">
                                        </td>-->
                                        <td style="text-align: center;"><?php echo $single_value->medicine_presentation; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->medicine_name; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->generic_name; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->manufacture_company; ?></td>
                                        <!--<td style="text-align: center;"><?php echo $single_value->store_type; ?></td>-->
                                        <td style="text-align: center;"><?php echo $single_value->unit_type; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->total_qty; ?> Pcs</td>
                                        <td style="text-align: center;"><?php echo $single_value->total_purchase_price; ?> /-</td>
                                        <td style="text-align: center;"><?php echo $single_value->purchase_price; ?> /-</td>
                                        <td style="text-align: center;"><?php echo $single_value->total_sales_price; ?> /-</td>
                                        <td style="text-align: center;"><?php echo $single_value->selling_price; ?> /-</td>
                                        <td style="text-align: center;"><?php echo $single_value->reminder_level; ?> Pcs</td>
                                        <td style="text-align: center;"><?php echo $single_value->expired_date; ?></td>
    
                                        <td style="text-align: center;">
                                            <!--                                            <a style="margin: 5px;" class="btn btn-info"
                                                                                           href="<?php echo base_url(); ?>Show_edit_form/insert_medicine_info/<?php echo $single_value->record_id; ?>/main">Edit
                                                                                        </a>-->
                                            <a style="margin: 5px;" class="btn btn-danger"
                                               href="<?php echo base_url(); ?>Delete/insert_medicine_info/<?php echo $single_value->record_id; ?>">Delete
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

<script type="text/javascript">
    window.onload = function () {
        $("#total_qty, #total_purchase_price,#unit_sales_price").on("change paste keyup", function () {
            var total_qty = $("#total_qty").val();
            if (total_qty == "" || total_qty == 0) {
                total_qty = 1;
            }
            var total_purchase_price = $("#total_purchase_price").val();
            var unit_purchase = Number(total_purchase_price / total_qty).toFixed(2);
            $("#unit_purchase_price").val(unit_purchase);
            
             var unit_sales_price = $("#unit_sales_price").val();
             var total_sales_price = Number(total_qty * unit_sales_price).toFixed(2);
            $("#total_sales_price").val(total_sales_price);
        });
    };
</script>