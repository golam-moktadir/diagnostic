<?php
if ($msg == "main") {
    $msg = "";
} elseif ($msg == "empty") {
    $msg = "Please fill out all required fields";
}
foreach ($one_value as $one_info) {
    $record_id = $one_info->record_id;
    $one_date = $one_info->date;
    $one_product_name = $one_info->product_name;
    $one_types_of_product = $one_info->types_of_product;
    $one_manufacture_company = $one_info->manufacture_company;
    $one_product_indication = $one_info->product_indication;
    $one_purchase_price = $one_info->purchase_price;
    $one_selling_price = $one_info->selling_price;
    $one_total_qty = $one_info->total_qty;
    $one_unit_type = $one_info->unit_type;
    $one_reminder_level = $one_info->reminder_level;
    $product_shelf = $one_info->product_shelf;
    $shelf_details = $one_info->shelf_details;
}
?>
<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable"> 
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Edit/insert_product_info/'.$record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Product Info.</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="types_of_product">Types of Product<b style="color: red;">*</b></label>
                                <select name="types_of_product" id="types_of_product" class="form-control">
                                    <option value="<?php echo $one_types_of_product; ?>"><?php echo $one_types_of_product; ?></option>
                                    <?php foreach ($types_of_product as $info) { ?>
                                        <option value="<?php echo $info->types_of_product; ?>">
                                            <?php echo $info->types_of_product; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="manufacture_company">Manufacture Company<b style="color: red;">*</b></label>
                                <select name="manufacture_company" id="manufacture_company" class="form-control">
                                    <option value="<?php echo $one_manufacture_company; ?>"><?php echo $one_manufacture_company; ?></option>
                                    <?php foreach ($manufacture_company as $info) { ?>
                                        <option value="<?php echo $info->manufacture_company; ?>">
                                            <?php echo $info->manufacture_company; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="product_name">Product Name<b style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="product_name" 
                                       value="<?php echo $one_product_name; ?>" placeholder="" name="product_name">
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="total_qty">Total Quantity<b style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="total_qty" 
                                       value="<?php echo $one_total_qty; ?>" placeholder="" name="total_qty">
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="unit">Unit<b style="color: red;">*</b></label>
                                <select name="unit" id="unit" class="form-control">
                                    <option value="<?php echo $one_unit_type; ?>"><?php echo $one_unit_type; ?></option>
                                     <option value="Piece (Pcs)">Piece (Pcs)</option>
                                     <option value="Milli Gram (mg)">Milli Gram (mg)</option>
                                     <option value="Milli Liter (ml)">Milli Liter (ml)</option>
                                     <option value="Gram (g)">Gram (g)</option>
                                     <option value="meter (m)">Meter (m)</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="image">Image<b style="color: red;">*</b></label>
                                <input type="file" class="form-control" id="image" placeholder="" name="image">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="purchase_price">Purchase Price (Unit Price)<b style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="purchase_price" 
                                       value="<?php echo $one_purchase_price; ?>" placeholder="" name="purchase_price">
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="selling_price">Selling Price (Unit Price)<b style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="selling_price" 
                                       value="<?php echo $one_selling_price; ?>" placeholder="" name="selling_price">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="reminder_level">Reminder Level<b style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="reminder_level" 
                                       value="<?php echo $one_reminder_level; ?>" placeholder="" name="reminder_level">
                            </div>
                             <div class="form-group col-sm-6 col-xs-12">
                                <label for="shelf">Product Shelf<b style="color: red;">*</b></label>
                                <input type="text" class="form-control" value="<?php echo $product_shelf; ?>" id="shelf" placeholder="" name="shelf">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="product_indication">Product Indication<b style="color: red;">*</b></label>
                                <textarea type="text" class="form-control" id="product_indication" rows="5"
                                          placeholder="" name="product_indication"><?php echo $one_product_indication; ?></textarea>
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="shelf_details">Shelf Details<b style="color: red;">*</b></label>
                                <textarea type="text" class="form-control" id="shelf_details" rows="5"
                                          placeholder="" name="shelf_details"><?php echo $shelf_details; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Edit <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>
            </section>
        </div>
    </section>
</aside>