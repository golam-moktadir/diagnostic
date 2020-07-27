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
                    <?php echo form_open_multipart('Insert/sell_product'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Sell Product</p>
                        <p id="empty_msg" style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>

                        <!--     Row Number 1-->
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="salesType">Sales Type</label>
                                <select name="salesType" id="salesType" class="form-control selectpicker" data-container="body">
                                    <option selected value="medicine">Medicine</option>
                                    <option value="product">Product</option>
                                </select>
                            </div>
                            <div class="col-sm-3"><label for="date">Date</label>
                                <input type="text" class="form-control" id="date" placeholder="" name="date"
                                       value="<?php echo date("Y-m-d"); ?>" readonly>
                            </div>
                            <div class="col-sm-3" > <label for="customer">Customer Name</label>
                                <!--<input type="text" class="form-control" id="customer" placeholder="" name="customer" list="customer"/>-->
                                <input type="text"  class="form-control" id="customer" placeholder="" name="customer" list="cars" />
                                <!--<datalist id="cars">
                                 <option>Ashik Mahmud</option>
                                 </datalist>-->
                            </div>
                            <div class="col-sm-3">
                                <label for="product_id">Product Name</label>
                                <select id="product_id" name="product_id" class="form-control ">
                                    <option value="">--Select--</option>
                                    <?php foreach ($all_medicine as $info) { ?>
                                        <option value="m<?php echo $info->record_id; ?>"><?php
                                            echo $info->medicine_name .
                                            " [" . $info->medicine_presentation . "]";
                                            ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <!--     Row Number 2-->
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="price">Unit Price </label>
                                <input type="text" class="form-control" id="price" placeholder="" name="price" readonly>
                            </div>
                            <div class="col-sm-3" > 
                                <label for="qty">Quantity </label>
                                <input type="text" class="form-control" id="qty" placeholder="" name="qty">
                            </div>
                            <div class="col-sm-3"><label for="discount">Discount </label>
                                <input type="text" class="form-control" id="discount" placeholder="" name="discount">
                            </div>
                            <div class="col-sm-3">  <label for="sub_total">Sub Total</label>
                                <input type="text" class="form-control" id="sub_total" placeholder="" name="sub_total"
                                       readonly>
                            </div>
                        </div>
                        <!--     Row Number 3-->
                        <div class="row">

                            <!--                            <div class="col-sm-4"><label for="payment">Payment</label>
                                                            <input type="text" class="form-control" id="payment" placeholder="" name="payment">
                                                        </div>-->
                        </div>

                        <!--     Row Number 3-->
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <button type="button" class=" btn btn-success" id="save_btn">Add <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="box-footer clearfix">

                </div>
        </div>

        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title" style="color: black;">All Info.</h3>
            </div>
            <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                <table id="salesList" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No.</th>
                            <th style="text-align: center;">Product Name</th>
                            <th style="text-align: center;">Unit Price</th>
                            <th style="text-align: center;">Product Quantity</th>
                            <th style="text-align: center;">Discount</th>
                            <th style="text-align: center;">Total Price</th>
<!--                                    <th style="text-align: center;">Payment</th>-->
                            <th style="text-align: center;">Due</th>
                            <th style="text-align: center;">Customer Name</th>
<!--                                    <th style="text-align: center;">Mobile No.</th>
                            <th style="text-align: center;">Address</th>-->
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="show_all_sales">

                    </tbody>
                </table>
                <div class="box-footer clearfix">
                    <button type="button" class="pull-left btn btn-success"
                            id="sell_btn">Sell <i class="fa fa-arrow-circle-right"></i></button>
                </div>
            </div>
        </div>

        <!--        Final Calculation-->
        <div class="box box-info">
            <div class="box-body table-responsive" style="width: 98%; color: black;">
                <table id="salesList" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <!--                                    <th style="text-align: center;">Type</th>-->
                            <th style="text-align: center;">Product</th>
                            <!--                                    <th style="text-align: center;">Id</th>-->
                            <!--                                    <th style="text-align: center;">Category</th>-->
                            <!--                                <th style="text-align: center;">S.Category</th>-->
                            <!--                                <th style="text-align: center;">Brand</th>-->
                            <!--                                    <th style="text-align: center;">Name</th>-->
                            <!--                                <th style="text-align: center;">Model</th>-->
                            <!--                                    <th style="text-align: center;">Vendor</th>-->
                            <th style="text-align: center;">Serial</th>
                            <th style="text-align: center;">Unit Price</th>
                            <th style="text-align: center;">Product Qty</th>
                            <!--                                    <th style="text-align: center;">Bonus Qty</th>-->
                            <th style="text-align: center;">Amount</th>
                            <th style="text-align: center;">Discount</th>
                            <th style="text-align: center;">Total Price</th>
                            <th style="text-align: center;">Warranty</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                    </thead>
<!--        <tbody id="show_all_sales">

                    </tbody>-->
                    <tr>
                        <td colspan="">
                            P.Due<input type="text" class="form-control" id="previous_due"
                                        style="color: black; border: black 2px solid;"
                                        value="0" name="previous_due" readonly>
                        </td>
                        <td colspan="">
                            S.Total Discount<input type="text" class="form-control" id="discount"
                                                   style="color: black; border: black 2px solid;"
                                                   value="0" placeholder="Discount" name="discount">
                        </td>
                        <td colspan="2">
                            Sub Total<input type="text" class="form-control" id="complete_total"
                                            value="0" style="color: black; border: black 2px solid;"
                                            name="complete_total" readonly>
                        </td>
                        <td colspan="2">
                            Pay<input type="text" class="form-control" id="pay"
                                      value="0" style="color: black; border: black 2px solid;" name="pay">
                        </td>
                        <td colspan="">
                            Due<input type="text" class="form-control" id="due"
                                      value="0" style="color: black; border: black 2px solid;" name="due"
                                      readonly>
                        </td>
                        <td colspan="2">
                            P.Type
                            <select id="payment_type" name="payment_type" class="form-control"
                                    style="color: black; border: black 2px solid;">
                                <option value="Cash">Cash</option>
                                <option value="Machine">Machine</option>
                                <option value="Cheque">Cheque</option>
                            </select>
                        </td>
                    </tr>
                    <tr id="cheque" style="display: none;">
                        <td colspan="2">
                            Bank Name<input type="text" class="form-control" id="bank_name"
                                            value="" style="color: black; border: black 2px solid;"
                                            name="bank_name">
                        </td>
                        <td colspan="4">
                            Account No.<input type="text" class="form-control" id="account_no"
                                              value="" style="color: black; border: black 2px solid;"
                                              name="account_no">
                        </td>
                        <td colspan="3">
                            Cheque No.<input type="text" class="form-control" id="cheque_no"
                                             value="" style="color: black; border: black 2px solid;"
                                             name="cheque_no">
                        </td>
                    </tr>
                </table>
                <div class="box-footer clearfix">
                    <button style="margin-top: -10px;" type="button" class="pull-right btn btn-success btn-xs"
                            id="sell_btn">Confirm <i class="fa fa-arrow-circle-right"></i></button>
                </div>
            </div>
            <!--END-->

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
                                <th style="text-align: center;">Sales Date</th>
                                <th style="text-align: center;">Product Name</th>
                                <th style="text-align: center;">Unit Price</th>
                                <th style="text-align: center;">Product Quantity</th>
                                <th style="text-align: center;">Discount</th>
                                <th style="text-align: center;">Total Price</th>
                                <th style="text-align: center;">Payment</th>
                                <th style="text-align: center;">Due</th>
                                <th style="text-align: center;">Customer Name</th>
                                <!-- <th style="text-align: center;">Mobile No.</th>
                                <th style="text-align: center;">Address</th> -->
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
                                            <!-- <td style="text-align: center;"><?php echo $single_value->invoice_no; ?></td> -->
                                        <?php } else { ?>
                                            <td style="text-align: center;"></td>
                                            <td style="text-align: center;"></td>
                                            <td style="text-align: center;"></td>
                                        <?php } ?>
                                        <td style="text-align: center;"><?php echo $single_value->product_name; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->price_per_unit; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->product_qty; ?>Pcs
                                        </td>
                                        <td style="text-align: center;"><?php echo $single_value->discount; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->sub_total; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->customer_name; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->mobile_no; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                                        <?php if ($one_time == 1) { ?>
                                            <td style="text-align: center;">
                                                <a style="margin: 5px;" class="btn btn-danger"
                                                   href="<?php echo base_url(); ?>Delete/sell_product/<?php echo $single_value->invoice_no; ?>">Delete
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
    $("#salesType").on("change paste keyup", function () {
        var salesType = $('#salesType').val();
        var post_data = {
            'salesType': salesType,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        console.log(post_data);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_med_pro_info",
            data: post_data,
            success: function (data) {
                $('#product_id').html(data); // ??
            }
        });
    });
    $("#product_id").on("change paste keyup", function () {
        var product_id = $('#product_id').val();
        var post_data = {
            'product_id': product_id,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        console.log(post_data);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/selling_product_info",
            data: post_data,
            dataType: 'json', 
            success: function (data) {

                $('#price').val(data[0]);
                $('#qty').val(data[1]);
                $('#discount').val(data[2]);
                $('#sub_total').val(data[3]);
            }
        });
    });

    $("#qty").on("change paste keyup", function () {
        var price = $('#price').val();
        var qty = $('#qty').val();
        var total = parseFloat(price) * parseFloat(qty);
        $('#sub_total').val(total);
    });

    $("#discount").on("change paste keyup", function () {
        var price = $('#price').val();
        var qty = $('#qty').val();
        var discount = $('#discount').val();
        var total = parseFloat(price) * parseFloat(qty) - parseFloat(discount);
        $('#sub_total').val(total);
    });

    var all_sales = new Array();
    var product_count = 0;

    function makeid() {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        for (var i = 0; i < 8; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));

        return text;
    }

    $("#save_btn").click(function () {
        var product_id = $("#product_id option:selected").text();
        var price = $('#price').val();
        var product_qty = $('#qty').val();
        var discount = $('#discount').val();
        var total_price = $('#sub_total').val();
        var payment = $('#payment').val();
        var due = Number(total_price - payment).toFixed(2);
        var customer_name = $('#customer').val();


//        var mobile = $('#mobile').val();
//        var address = $('#address').val();
//        var product_type = $('#product_id').val();


//        all_sales[product_count] = new Array((product_count + 1), product_id, price, product_qty, discount,
//                total_price, mobile, address, product_type,customer);

        // Print Value by Array
        all_sales[product_count] = new Array(
                (product_count + 1), product_id, price, product_qty,
                discount,
                total_price,payment, due, customer_name); 

        var full_table = "";
        for (var i = 0; i < all_sales.length; i++) {
            full_table += "<tr>";
            for (var j = 0; j < all_sales[i].length; j++) {
                full_table += "<td style='text-align: center;'>" + all_sales[i][j] + "</td>";
            }
            full_table += "<td><button class='btn btn-danger' onclick='delete_data(" + i + ")'>Delete</button></td></tr>";
        }
        $('#show_all_sales').html(full_table);
        product_count++;
    });

    $("#sell_btn").click(function () {
        var date = $('#date').val();
        var invoice_no = makeid();
        var post_data = {
            'date': date, 'invoice_no': invoice_no,
            'all_sales': all_sales,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/sales_success_msg2",
            data: post_data,
            success: function () {
                alert("Entry Successfully");
                location.reload();
                // alert(data);
            }
        });
    });

    function delete_data(arr_no) {
        all_sales.splice(arr_no, 1);
        var full_table = "";
        for (var i = 0; i < all_sales.length; i++) {
            full_table += "<tr>";
            for (var j = 0; j < all_sales[i].length; j++) {
                full_table += "<td style='text-align: center;'>" + all_sales[i][j] + "</td>";
            }
            full_table += "<td><button class='btn btn-danger' onclick='delete_data(" + i + ")'>Delete</button></td></tr>";
        }
        $('#show_all_sales').html(full_table);
        product_count--;
    }

    // Change M/P name by Sells type

</script>