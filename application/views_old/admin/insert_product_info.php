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
                    <?php echo form_open_multipart('Insert/insert_product_info'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Insert Product Info.</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
<!--                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="medicine_presentation">Medicine Presentation<b style="color: red;">*</b></label>
                                <select name="medicine_presentation" id="medicine_presentation" class="form-control">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($medicine_presentation as $info) { ?>
                                        <option value="<?php echo $info->medicine_presentation; ?>">
                                            <?php echo $info->medicine_presentation; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>-->
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="product_name">Product Name<b style="color: red;">*</b></label>
                            <select name="product_name" id="product_name" class="form-control">
                                <option value="">-- Select --</option>
                                <?php foreach ($all_product as $info) { ?>
                                    <option value="<?php echo $info->product_name."###".$info->product_category; ?>">
                                        <?php echo $info->product_category; ?> [<?php echo $info->product_category; ?>]
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
                                    <option value="packet">Packet</option>
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
                                <label for="total_sales_price">Total Sales Price<b style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="total_sales_price" placeholder="" name="total_sales_price">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="unit_sales_price">Unit Sales Price<b style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="unit_sales_price" placeholder="" name="unit_sales_price">
                            </div>
                        
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
                                    <th style="text-align: center;">Product Category</th>
                                    <th style="text-align: center;">Product Name</th>
                                    <th style="text-align: center;">Supplier</th>
                                    <!--<th style="text-align: center;">Storage Type</th>-->
                                    <th style="text-align: center;">Unit</th>
                                    <th style="text-align: center;">Total Quantity</th>
                                    <th style="text-align: center;">Total Purchase Price</th>
                                    <th style="text-align: center;">Unit Purchase Price</th>
                                    <th style="text-align: center;">Total Sales Price</th>
                                    <th style="text-align: center;">Unit Sales Price</th>
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
                                        <td style="text-align: center;"><?php echo $single_value->product_category; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->product_name; ?></td>
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
<!--                                        <td style="text-align: center;"><?php echo $single_value->drug_indication; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->medicine_shelf; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->shelf_details; ?></td>-->
                                        <td style="text-align: center;">
<!--                                            <a style="margin: 5px;" class="btn btn-info"
                                               href="<?php echo base_url(); ?>Show_edit_form/insert_medicine_info/<?php echo $single_value->record_id; ?>/main">Edit
                                            </a>-->
                                            <a style="margin: 5px;" class="btn btn-danger"
                                               href="<?php echo base_url(); ?>Delete/insert_product_info/<?php echo $single_value->record_id; ?>">Delete
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

<!--<script type="text/javascript">
    window.onload = function () {
        $("#class_name").on("change paste keyup", function () {
            var input_data = $('#class_name').val();
            var post_data = {
                'class_name': input_data,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Get_ajax_value/get_day_time_subject",
                data: post_data,
                success: function (data) {
                    $('#show_day_time_subject').html(data);
                }
            });
        });
        
        $("#show_day_time_subject").on("change paste keyup", function () {
            var input_data = $('#subject_name').val();
            var post_data = {
                'subject_name': input_data,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Get_ajax_value/get_teacher_id",
                data: post_data,
                success: function (data) {
                    $('#show_teacher').html(data);
                }
            });
        });
    };
</script>-->