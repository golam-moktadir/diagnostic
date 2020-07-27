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
<style>
    .content {
        padding-top: 0px;
        margin-top: 0px;
    }

    .form-group {
        margin-bottom: 5px;
    }

    .col-sm-2 {
        padding: 0px 2px 0px 2px;
    }

    .table tbody tr:hover td {
        background-color: #76e094;
    }
</style>
<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div style="color: black;">
                    <div class="box-body">
                        <p style="font-size: 20px;">Add Medicine Info.</p>
                        <p id="empty_msg" style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-6 col-xs-12" style="text-align: left;">
                                <b class="text-primary" id="available_qty"><?php echo $product_name;?></b>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px">
                           
                            <div class="form-group col-sm-2 col-xs-12" style="display: none;">
                                <label for="product_id">Product ID</label>
                                <input type="hidden" class="form-control" id="product_id" placeholder=""
                                       name="product_id" readonly value="<?php echo $product_id; ?>">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12" style="display: none">
                                <label for="product_name">Product</label>
                                <input type="text" class="form-control" id="product_name" placeholder=""
                                       name="product" readonly value="<?php echo $product_name; ?>">
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
<!--                            <div class="form-group col-sm-4 col-xs-12" style="display: none;">
                                <label for="product_category">Product Category</label>
                                <input type="text" class="form-control" id="product_category" placeholder=""
                                       name="category" readonly>
                            </div>-->
<!--                            <div class="form-group col-sm-4 col-xs-12" style="display: none;">
                                <label for="sub_category">Product Sub-category</label>
                                <input type="text" class="form-control" id="sub_category" placeholder=""
                                       name="sub_category" readonly>
                            </div>-->
<!--                            <div class="form-group col-sm-4 col-xs-12" style="display: none;">
                                <label for="brand_name">Brand Name</label>
                                <input type="text" class="form-control" id="brand_name" placeholder=""
                                       name="brand_name" readonly>
                            </div>-->
                            <div class="form-group col-sm-4 col-xs-12" style="display: none;">
                                <label for="product_name">Product Name</label>
                                <input type="text" class="form-control" id="product_name" placeholder=""
                                       name="product_name" readonly>
                            </div>
<!--                            <div class="form-group col-sm-4 col-xs-12" style="display: none;">
                                <label for="product_model">Product Model</label>
                                <input type="text" class="form-control" id="product_model" placeholder=""
                                       name="product_model" readonly>
                            </div>-->
<!--                            <div class="form-group col-sm-4 col-xs-12" style="display: none;">
                                <label for="vendor">Vendor</label>
                                <input type="text" class="form-control" id="vendor" placeholder=""
                                       name="vendor" readonly>
                            </div>-->
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="purchase_price">P. Unit Price</label>
                                <input type="text" class="form-control" id="purchase_price" placeholder="Purchase Unit"
                                       name="purchase_price">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="product_qty">Qty</label>
                                <input type="text" class="form-control" id="product_qty" placeholder="Qty"
                                       name="product_qty">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="total_price">Total Price </label>
                                <input type="text" class="form-control" id="total_price" placeholder="Total Price"
                                       name="total_price" readonly>
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="average_price">Average Unit Price</label>
                                <input type="text" class="form-control" id="average_price"
                                       placeholder="Average Purchase Unit"
                                       name="average_price" readonly>
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="selling_price">Sales Unit Price</label>
                                <input type="text" class="form-control" id="selling_price" placeholder=""
                                       name="selling_price">
                            </div>
<!--                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="selling_price">Retail Unit Price</label>
                                <input type="text" class="form-control" id="retail_price" placeholder="Retail Unit"
                                       name="retail_price">
                            </div>-->
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="date">Date</label>
                                <input type="text" value="<?php echo date("Y-m-d"); ?>"
                                       class="form-control new_datepicker"
                                       id="date" placeholder="Purchase Date" name="date">
                            </div>
                            <!--                            <div class="form-group col-sm-2 col-xs-12">
                                                            <label for="serial">Serial No</label>
                                                            <textarea class="form-control" id="serial" rows="1"
                                                                      name="serial" placeholder="Serial no."></textarea>
                                                        </div>-->
                            <div class="form-group col-sm-2 col-xs-12">
                                <button style="margin-top: 27px" type="button" class="pull-left btn btn-success"
                                        id="save_btn">Add <i
                                        class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="box-body table-responsive" style="width: 98%; color: black;">
                        <table id="purchaseList" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">ID</th>
                                    <th style="text-align: center;">Category</th>
                             <!--<th style="text-align: center;">S.Category</th>-->
                                    <!--                                    <th style="text-align: center;">Brand</th>-->
                                    <!--<th style="text-align: center;">Medicine</th>-->
    <!--                                <th style="text-align: center;">Serial</th>-->
                                    <th style="text-align: center;">Supplier</th>
                                    <th style="text-align: center;">Total</th>
                                    <th style="text-align: center;">Qty</th>
                                    <th style="text-align: center;">P.Unit</th>
                                    <th style="text-align: center;">A.Unit</th>
                                    <th style="text-align: center;">Sales.Unit</th>
                                    <!--<th style="text-align: center;">R.Unit</th>-->
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="show_all_purchase">

                            </tbody>
                            <tr>
                                <td colspan="3">
                                    Total Price<input type="text" class="form-control" id="complete_total"
                                                      value="0" style="color: black; border: black 2px solid;"
                                                      name="complete_total" readonly>
                                </td>
                                <td colspan="3">
                                    Pay<input type="text" class="form-control" id="pay"
                                              value="0" style="color: black; border: black 2px solid;" name="pay">
                                </td>
                                <td colspan="3">
                                    Due<input type="text" class="form-control" id="due"
                                              value="0" style="color: black; border: black 2px solid;" name="due"
                                              readonly>
                                </td>
                                <td colspan="3">
                                    Payment Type
                                    <select id="payment_type" name="payment_type" class="form-control"
                                            style="color: black; border: black 2px solid;">
                                        <option value="Cash">Cash</option>
                                        <option value="Cheque">Cheque</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id="cheque" style="display: none;">
                                <td colspan="4">
                                    Bank Name<input type="text" class="form-control" id="bank_name"
                                                    value="" style="color: black; border: black 2px solid;"
                                                    name="bank_name">
                                </td>
                                <td colspan="4">
                                    Account No.<input type="text" class="form-control" id="account_no"
                                                      value="" style="color: black; border: black 2px solid;"
                                                      name="account_no">
                                </td>
                                <td colspan="4">
                                    Cheque No.<input type="text" class="form-control" id="cheque_no"
                                                     value="" style="color: black; border: black 2px solid;"
                                                     name="cheque_no">
                                </td>
                            </tr>
                        </table>
                        <div>
                            <button type="button" class="pull-left btn btn-success btn-sm"
                                    id="confirm_btn">Confirm <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="box-body table-responsive" style="width: 98%; overflow-x: scroll; color: black;">
                        <p style="font-size: 20px; text-align: center;"><u>All Info.</u></p>
                        <table id="pagination_search" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No.</th>
                                    <th style="text-align: center;">Date</th>
                                    <th style="text-align: center;">Voucher</th>
                                    <th style="text-align: center;">Details</th>
                                    <th style="text-align: center;">Sub Total</th>
                                    <th style="text-align: center;">Qty</th>
                                    <th style="text-align: center;">P.Unit</th>
                                    <th style="text-align: center;">A.Unit</th>
                                    <th style="text-align: center;">W.Unit</th>
                                    <th style="text-align: center;">R.Unit</th>
                                    <th style="text-align: center;">Total Price</th>
                                    <th style="text-align: center;">Bank</th>
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
                                                <td style="text-align: center;"><?php echo date('d/m/y', strtotime($single_value->date)); ?></td>
                                                <td style="text-align: center;"><?php echo $single_value->invoice_no; ?></td>
                                            <?php } else { ?>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                            <?php } ?>
                                            <td style="text-align: center; white-space: nowrap;">
                                                <?php echo $single_value->product_name; ?>
                                                [<b>ID: </b><?php echo 'RTB'.sprintf('%04d', $single_value->product_id); ?>]<br>
                                                <!--                                            <b>S.Category: </b>--><?php //echo $single_value->sub_category;   ?><!--<br>-->
                                                <b>Category: </b><?php echo $single_value->product_type; ?><br>
                                                <!--                                            <b>Brand: </b>--><?php //echo $single_value->brand_name;   ?><!--<br>-->
                                                <!--                                            <b>Model: </b>--><?php //echo $single_value->product_model;   ?>

                                                <b>Vendor: </b><?php echo $single_value->manufacture_company; ?><br>
                                                <!--
                                                <!--                                        </td>-->
                                            </td>
                                            <td style="text-align: center;"><?php echo $single_value->sub_total; ?>/-</td>
                                            <td style="text-align: center;"><?php echo $single_value->product_qty; ?>
                                            </td>
                                            <td style="text-align: center;"><?php echo $single_value->purchase_price; ?>/-
                                            </td>
                                            <td style="text-align: center;"><?php echo $single_value->average_price; ?>/-
                                            </td>
                                            <td style="text-align: center;"><?php echo $single_value->wholesale_price; ?>/-
                                            </td>
                                            <td style="text-align: center;"><?php echo $single_value->retail_price; ?>/-
                                            </td>
                                            <td style="text-align: center;"><?php echo $single_value->total; ?>/-</td>
                                            <td style="text-align: center;">
                                                <?php if ($single_value->payment_type == "Cheque") { ?>
                                                    <b></b><?php echo $single_value->bank_name; ?><br>
                                                    <b>A/C NO: </b><?php echo $single_value->account_no; ?><br>
                                                    <b>C. NO: </b><?php echo $single_value->cheque_no; ?>
                                                    <?php
                                                } else {
                                                    echo "X";
                                                }
                                                ?>
                                            </td>
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
    $("#product_id, #purchase_price, #product_qty").on("change paste keyup", function () {
        var product_qty = $('#product_qty').val();
        var purchase_price = $('#purchase_price').val();
        if (product_qty === "") {
            product_qty = 1;
        }
        if (purchase_price === "") {
            purchase_price = 0;
        }

        $('#total_price').val(parseFloat(purchase_price * product_qty).toFixed(2));
        var product_id = $('#product_id').val();
        if (product_id == "") {
            $('#total_price').val("");
            $('#product_qty').val("");
            $('#purchase_price').val("");
            $('#wholesale_price').val("");
            $('#retail_price').val("");
            $('#average_price').val("");
        } else {
            var post_data = {
                'product_id': product_id,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Get_ajax_value/medicine_info",
                data: post_data,
                dataType: 'json',
                success: function (data) {
                    $('#manufacture_company').val(data[0]);
                    $('#product_name').val(data[1]);
                    $('#product_model').val(data[2]);
                    $('#vendor').val(data[3]);
                    $('#sub_category').val(data[4]);
                    $('#brand_name').val(data[5]);
                    $('#average_price').val(parseFloat((Number(data[6]) + Number(purchase_price * product_qty)) / (Number(data[7])
                            + Number(product_qty))).toFixed(2));
                }
            });
        }
    });

    $("#payment_type").on("change paste keyup", function () {
        var payment_type = $('#payment_type').val();
        if (payment_type === "Cheque") {
            $("#cheque").show();
        } else {
            $("#cheque").hide();
        }
    });

    var temp_total = 0;
    var all_purchase = new Array();
    var product_count = 0;

    $("#save_btn").click(function () {
        var product_id = $('#product_id').val();
//        var product_category = $('#product_category').val();
//        var sub_category = $('#sub_category').val();
//        var brand_name = $('#brand_name').val();
        var product_name = $('#product_name').val();
//        var product_model = $('#product_model').val();
        var vendor = $('#manufacture_company').val();
        var total_price = $('#total_price').val();
        var product_qty = $('#product_qty').val();
        var purchase_price = $('#purchase_price').val();
        var average_price = $('#average_price').val();
        var selling_price = $('#selling_price').val();
//        var retail_price = $('#retail_price').val();
//        var serial = $('#serial').val();
        all_purchase[product_count] = new Array(product_id,
                product_name, vendor, total_price, product_qty,
                purchase_price, average_price, selling_price);
        var complete_total = 0;
        var full_table = "";
        for (var i = 0; i < all_purchase.length; i++) {
            complete_total += parseFloat(all_purchase[i][3]);
            full_table += "<tr>";
            for (var j = 0; j < all_purchase[i].length; j++) {
                if (j === 0) {
                    full_table += "<td style='text-align: center;'>Id: " + all_purchase[i][0] + "</td>";
                } else {
                    full_table += "<td style='text-align: center;'>" + all_purchase[i][j] + "</td>";
                }
            }
            full_table += "<td style='text-align: center;'><button class='btn btn-danger fa fa-trash-o' onclick='delete_data(" + i + ")'></button></td></tr>";
        }
        $('#show_all_purchase').html(full_table);
        $('#complete_total').val(complete_total);
        $('#pay').val(0);
        $('#due').val(complete_total);
        temp_total = complete_total;
        product_count++;
    });

    function delete_data(arr_no) {
        all_purchase.splice(arr_no, 1);
        var complete_total = 0;
        var full_table = "";
        for (var i = 0; i < all_purchase.length; i++) {
            complete_total += parseFloat(all_purchase[i][4]);
            full_table += "<tr>";
            for (var j = 0; j < all_purchase[i].length; j++) {
                if (j === 0) {
                    full_table += "<td style='text-align: center;'>Id: " + all_purchase[i][0] + "</td>";
                } else {
                    full_table += "<td style='text-align: center;'>" + all_purchase[i][j] + "</td>";
                }
            }
            full_table += "<td style='text-align: center;'><button class='btn btn-danger fa fa-trash-o' onclick='delete_data(" + i + ")'></button></td></tr>";
        }
        $('#show_all_purchase').html(full_table);
        $('#complete_total').val(complete_total);
        $('#pay').val(0);
        $('#due').val(complete_total);
        temp_total = complete_total;
        product_count--;
    }

    $("#pay").on("change paste keyup", function () {
        var pay = parseFloat($('#pay').val());
        if (pay > 0) {
            var due = temp_total - pay;
            $('#due').val(due);
        }
    });

    $("#confirm_btn").click(function () {
        var date = $('#date').val();
        var pay = $('#pay').val();
        var due = $('#due').val();
        var complete_total = $('#complete_total').val();
//        var payment_type = $('#payment_type').val();
//        var bank_name = $('#bank_name').val();
//        var account_no = $('#account_no').val();
//        var cheque_no = $('#cheque_no').val();
        var post_data = {
            'all_purchase': all_purchase, 'date': date,
            'complete_total': complete_total, 'pay': pay, 'due': due,
//            'payment_type': payment_type, 'bank_name': bank_name, 'account_no': account_no, 'cheque_no': cheque_no,
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
</script>

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

<style>
    .zoom {
        width: 80px;
        height: 80px;
    }
    #pagination_search_paginate {
        float: left !important;
    }
</style>