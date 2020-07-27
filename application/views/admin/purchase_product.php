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
<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Insert/purchase_product'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Purchase Product</p>
                        <p id="empty_msg" style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" placeholder="" name="date">
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="invoice_no">Voucher No.</label>
                                <input type="text" class="form-control" id="invoice_no" placeholder=""
                                       name="invoice_no">
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="product_id">Product Name</label>
                                <select id="product_id" name="product_id" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">--Select--</option>
                                    <?php foreach ($all_product as $info) { ?>
                                        <option value="<?php echo $info->record_id; ?>"><?php
                                            echo $info->product_name .
                                                " [" . $info->types_of_product . "]";
                                            ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="manufacturer">Manufacturer Company</label>
                                <input type="text" class="form-control" id="manufacturer" placeholder=""
                                       name="manufacturer" readonly>
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="purchase_price">Purchase Price (Unit Price)<b
                                            style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="purchase_price" placeholder=""
                                       name="purchase_price">
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="selling_price">Selling Price (Unit Price)<b
                                            style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="selling_price" placeholder=""
                                       name="selling_price">
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="product_qty">Product Quantity </label>
                                <input type="text" class="form-control" id="product_qty" placeholder=""
                                       name="product_qty">
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="total_price">Total Price</label>
                                <input type="text" class="form-control" id="total_price" placeholder=""
                                       name="total_price" readonly>
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="expiry_date">Expiry Date </label>
                                <input type="date" class="form-control" id="expiry_date" placeholder=""
                                       name="expiry_date">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="button" class="pull-left btn btn-success" id="save_btn">Add <i
                                    class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </div>

                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info.</h3>
                    </div>
                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="purchaseList" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Product Name</th>
                                <th style="text-align: center;">Manufacture Company</th>
                                <th style="text-align: center;">Purchase Price</th>
                                <th style="text-align: center;">Selling Price</th>
                                <th style="text-align: center;">Product Quantity</th>
                                <th style="text-align: center;">Total Price</th>
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
                                <th style="text-align: center;">Product Name</th>
                                <th style="text-align: center;">Manufacture Company</th>
                                <th style="text-align: center;">Purchase Price</th>
                                <th style="text-align: center;">Selling Price</th>
                                <th style="text-align: center;">Product Quantity</th>
                                <th style="text-align: center;">Total Price</th>
                                <th style="text-align: center;">Expiry Date</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            for ($i = 1; $i <= $count_it; $i++) {
                                $one_time = 0;
                                foreach (${"pro_result" . $i} as $single_value) {
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
                                        <td style="text-align: center;"><?php echo $single_value->product_name; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->manufacture_company; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->purchase_price; ?>/-
                                        </td>
                                        <td style="text-align: center;"><?php echo $single_value->selling_price; ?>/-
                                        </td>
                                        <td style="text-align: center;"><?php echo $single_value->product_qty; ?>Pcs
                                        </td>
                                        <td style="text-align: center;"><?php echo $single_value->total_price; ?>
                                        </td>
                                        <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->expiry_date)); ?></td>
                                        <?php if ($one_time == 1) { ?>
                                            <td style="text-align: center;">
                                                <a style="margin: 5px;" class="btn btn-danger"
                                                   href="<?php echo base_url(); ?>Delete/purchase_product/<?php echo $single_value->invoice_no; ?>">Delete
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
</aside>


<script type="text/javascript">
    $("#product_id").on("change paste keyup", function () {
        var product_id = $('#product_id').val();
        var post_data = {
            'product_id': product_id,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/product_info",
            data: post_data,
            dataType: 'json',
            success: function (data) {
                $('#manufacturer').val(data[0]);
                $('#purchase_price').val(data[1]);
                $('#selling_price').val(data[2]);
                $('#product_qty').val(data[3]);
                $('#total_price').val(data[4]);
            }
        });
    });

    $("#purchase_price, #product_qty").on("change paste keyup", function () {
        var purchase_price = $('#purchase_price').val();
        var product_qty = $('#product_qty').val();
        var total = parseFloat(purchase_price) * parseFloat(product_qty);
        $('#total_price').val(total);
    });

    var all_purchase = new Array();
    var product_count = 0;
    $("#save_btn").click(function () {
        var invoice_no = $('#invoice_no').val();
        if (invoice_no == "") {
            $('#empty_msg').text("Please provide invoice number");
        } else {
            var product_id = $("#product_id option:selected").text();
            var manufacturer = $('#manufacturer').val();
            var purchase_price = $('#purchase_price').val();
            var selling_price = $('#selling_price').val();
            var product_qty = $('#product_qty').val();
            var total_price = $('#total_price').val();
            var expiry_date = $('#expiry_date').val();
            var record_id = $('#product_id').val();
            all_purchase[product_count] = new Array((product_count + 1), product_id, manufacturer, purchase_price,
                selling_price, product_qty, total_price, expiry_date, record_id);
            var full_table = "";
            for (var i = 0; i < all_purchase.length; i++) {
                full_table += "<tr>";
                for (var j = 0; j < all_purchase[i].length-1; j++) {
                    full_table += "<td style='text-align: center;'>" + all_purchase[i][j] + "</td>";
                }
                full_table += "<td><button class='btn btn-danger' onclick='delete_data(" + i + ")'>Delete</button></td></tr>";
            }
            $('#show_all_purchase').html(full_table);
            product_count++;
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
            url: "<?php echo base_url(); ?>Get_ajax_value/purchase_success_msg2",
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
        product_count--;
        console.log(all_purchase);
    }
</script>