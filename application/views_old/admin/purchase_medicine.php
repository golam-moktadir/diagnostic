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
foreach ($all_medicine as $info) {
    $product_id = $info->record_id;
    $product_name = $info->medicine_presentation.': '.$info->medicine_name ." [" .sprintf('%04d', $info->record_id). "]";
}

?>

    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <div class="box-body">
                        <p style="font-size: 20px;">Purchase Medicine</p>
                        <p id="empty_msg" style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-2 col-xs-12" style="display: none;">
                                <label for="medicine_id">Product ID</label>
                                <input type="hidden" class="form-control" id="medicine_id" placeholder=""
                                       name="medicine_id" readonly value="<?php echo $product_name; ?>">
                            </div>
<!--                            <div class="form-group col-sm-2 col-xs-12" style="display: none">
                                <label for="medicine_name">Product</label>
                                <input type="text" class="form-control" id="medicine_id" placeholder=""
                                       name="medicine_id" readonly value="<?php echo $product_name; ?>">
                            </div>-->
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" placeholder="" name="date"
                                       value="<?php echo date("Y-m-d"); ?>" >
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="invoice_no">Voucher No. </label>
                                <input type="text" class="form-control" id="invoice_no" placeholder="" name="invoice_no">
                            </div>
<!--                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="medicine_id">Medicine Name </label>
                                <select id="medicine_id" name="medicine_id" class="form-control selectpicker"
                                        data-live-search ="true">
                                    <option value="">--Select--</option>
                                    <?php foreach ($all_medicine as $info) { ?>
                                        <option value="<?php echo $info->medicine_name; ?>"><?php
                                            echo $info->medicine_name .
                                            " [" . $info->medicine_presentation . "]";
                                            ?></option>
                                    <?php } ?>
                                </select>
                            </div>-->
<!--                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="manufacturer">Manufacturer Company</label>
                                <input type="text" class="form-control" id="manufacturer" placeholder="" name="manufacturer" readonly>
                            </div>-->
                              <div class="form-group col-sm-3 col-xs-12">
                                <label for="manufacturer">Supplier<b style="color: red;">*</b></label>
                                <select name="manufacturer" id="manufacturer" class="form-control">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($manufacture_company as $info) { ?>
                                        <option value="<?php echo $info->manufacture_company; ?>">
                                            <?php echo $info->manufacture_company; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="purchase_price">Purchase Unit Price<b style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="purchase_price" placeholder="" name="purchase_price">
                            </div>
                            
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="medicine_qty">Quantity </label>
                                <input type="text" class="form-control" id="medicine_qty" placeholder="" name="medicine_qty">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="total_price">Total Price</label>
                                <input type="text" class="form-control" id="total_price" placeholder="" name="total_price" readonly>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="average_price">Average Unit Price</label>
                                <input type="text" class="form-control" id="average_price"
                                       placeholder="Average Purchase Unit"
                                       name="average_price" readonly>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="selling_price">Selling Unit Price<b style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="selling_price" placeholder="" name="selling_price">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="expiry_date">Expiry Date </label>
                                <input type="date" class="form-control" id="expiry_date" placeholder="" name="expiry_date">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="button" class="pull-left btn btn-success" id="save_btn">Add <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </div>
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">Purchase Info.</h3>
                    </div>
                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="purchaseList" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No.</th>
                                    <th style="text-align: center;">Medicine Name</th>
                                    <th style="text-align: center;">Manufacture Company</th>
                                    <th style="text-align: center;">Purchase Price</th>
                                    <th style="text-align: center;">Selling Price</th>
                                    <th style="text-align: center;">Medicine Quantity</th>
                                    <th style="text-align: center;">Total Price</th>
                                    <th style="text-align: center;">Average Price</th>
                                    <th style="text-align: center;">Expiry Date</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="show_all_purchase">

                            </tbody>
                        </table>
                        <div class="box-footer clearfix">
                            <button type="button" class="pull-left btn btn-success"
                                    id="purchase_btn">Purchase <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
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
                                    <th style="text-align: center;">Voucher No.</th>
                                    <th style="text-align: center;">Medicine Name</th>
                                    <th style="text-align: center;">Manufacture Company</th>
                                    <th style="text-align: center;">Purchase Price</th>
                                    <th style="text-align: center;">Selling Price</th>
                                    <th style="text-align: center;">Medicine Quantity</th>
                                    <th style="text-align: center;">Total Price</th>
                                    <th style="text-align: center;">Average Price</th>
                                    <th style="text-align: center;">Expiry Date</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 1; $i <= $count_it; $i++) {
                                    $one_time = 0;
                                    foreach (${"med_result" . $i} as $single_value) {
                                        $one_time++;
                                        ?>
                                        <tr>
                                            <?php if ($one_time == 1) { ?>
                                                <td style="text-align: center;"><?php echo $i; ?></td>
                                                <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->date)); ?></td>
                                                <td style="text-align: center;"><?php echo $single_value->invoice_no; ?></td>
                                            <?php } else { ?>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                            <?php } ?>
                                            <td style="text-align: center;"><?php echo $single_value->medicine_name; ?></td>
                                            <td style="text-align: center;"><?php echo $single_value->manufacture_company; ?></td>
                                            <td style="text-align: center;"><?php echo $single_value->purchase_price; ?> /-</td>
                                            <td style="text-align: center;"><?php echo $single_value->selling_price; ?> /-</td>
                                            <td style="text-align: center;"><?php echo $single_value->medicine_qty; ?> Pcs</td>
                                            <td style="text-align: center;"><?php echo $single_value->total_price; ?></td>
                                            <td style="text-align: center;"><?php echo $single_value->average_price; ?></td>
                                            <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->expiry_date)); ?></td>
                                            <?php if ($one_time == 1) { ?>
                                                <td style="text-align: center;">
                                                    <a style="margin: 5px;" class="btn btn-danger"
                                                       href="<?php echo base_url(); ?>Delete/purchase_medicine/<?php echo $single_value->invoice_no; ?>">Delete
                                                    </a>
                                                </td>
                                            <?php } else { ?>
                                                <td style="text-align: center;"></td>
                                            <?php } ?>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </section>

<script type="text/javascript">
    $("#medicine_id").on("change paste keyup", function () {
        var medicine_id = $('#medicine_id').val();
        var medicine_name = $('#medicine_id').val();
        if (medicine_id == "") {
            $('#total_price').val("");
            $('#medicine_qty').val("");
            $('#purchase_price').val("");
            $('#average_price').val("");
        } else {
        var post_data = {
            'medicine_id': medicine_id,
            'medicine_name': medicine_name,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/medicine_info",
            data: post_data,
            dataType: 'json',
            success: function (data) {
                $('#manufacturer').val(data[0]);
                $('#purchase_price').val(data[1]);
                $('#selling_price').val(data[2]);
                $('#medicine_qty').val(data[3]);
                $('#total_price').val(data[4]);
                $('#average_price').val(parseFloat((Number(data[5]) + Number(purchase_price * medicine_qty)) / (Number(data[6])
                           + Number(medicine_qty))).toFixed(2));
            }
        });
        }
    });

    $("#purchase_price, #medicine_qty").on("change paste keyup", function () {
        var purchase_price = $('#purchase_price').val();
        var medicine_qty = $('#medicine_qty').val();
        var total = parseFloat(purchase_price) * parseFloat(medicine_qty);
        $('#total_price').val(total);
       $('#average_price').val(parseFloat((+ Number(purchase_price * medicine_qty)) / (
                           + Number(medicine_qty))).toFixed(2));
    
    });

    var all_purchase = new Array();
    var medicine_count = 0;
    $("#save_btn").click(function () {
        var invoice_no = $('#invoice_no').val();
        if (invoice_no == "") {
            $('#empty_msg').text("Please provide invoice number");
        } else {
           // var medicine_id = $("#medicine_id option:selected").text();
            var medicine_id = $('#medicine_id').val();
            var medicine_name = $('#medicine_name').val();
            var manufacturer = $('#manufacturer').val();
            var purchase_price = $('#purchase_price').val();
            var selling_price = $('#selling_price').val();
            var medicine_qty = $('#medicine_qty').val();
            var total_price = $('#total_price').val();
            var average_price = $('#average_price').val(); //
            var expiry_date = $('#expiry_date').val();
            var record_id = $('#medicine_id').val();
            all_purchase[medicine_count] = new Array((medicine_count + 1), medicine_id, manufacturer, purchase_price,
                    selling_price, medicine_qty, total_price,average_price, expiry_date, record_id);
            var full_table = "";
            for (var i = 0; i < all_purchase.length; i++) {
                full_table += "<tr>";
                for (var j = 0; j < all_purchase[i].length-1; j++) {
                    full_table += "<td style='text-align: center;'>" + all_purchase[i][j] + "</td>";
                }
                full_table += "<td><button class='btn btn-danger' onclick='delete_data(" + i + ")'>Delete</button></td></tr>";
            }
            $('#show_all_purchase').html(full_table);
            medicine_count++;
        }
    });
    $("#purchase_btn").click(function () {
        var date = $('#date').val();
        var invoice_no = $('#invoice_no').val();
        var post_data = {
            'date': date, 'invoice_no': invoice_no,
            'all_purchase': all_purchase,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/purchase_success_msg",
            data: post_data,
            success: function () {
                alert("Entry Successfully");
                location.reload();
            }
        });
    });
    function delete_data(arr_no) {
        all_purchase.splice(arr_no, 1);
        var full_table = "";
        for (var i = 0; i < all_purchase.length; i++) {
            full_table += "<tr>";
            for (var j = 0; j < all_purchase[i].length; j++) {
                full_table += "<td style='text-align: center;'>" + all_purchase[i][j] + "</td>";
            }
            full_table += "<td><button class='btn btn-danger' onclick='delete_data(" + i + ")'>Delete</button></td></tr>";
        }
        $('#show_all_purchase').html(full_table);
        medicine_count--;
        console.log(all_purchase);
    }
</script>