<style>
    table.table-bordered {
        border: #55830c 1px solid;
        font-weight: bold;
        color: black;
        font-size: 16px;
    }

    table.table-bordered > thead > tr > th {
        border: #55830c 1px solid;
        font-weight: bold;
        color: black;
        font-size: 18px;
    }

    table.table-bordered > tbody > tr > td {
        border: #55830c 1px solid;
        font-weight: bold;
        color: black;
        font-size: 16px;
    }
</style>

<div class="box box-info">
    <div class="box-header" style="color: black; text-align: center;">
        <h3>Hospital Name</h3>
    </div>

    <div class="container">
        <?php
        for ($i = 1; $i <= $count_it; $i++) {
            $one_time = 0;
            foreach (${"all_goods" . $i} as $all_info) {
                $one_time++;
                ?>
                <?php if ($one_time == 1) { ?>
                    <div class="row">
                        <div class="col-sm-3" style="color: black; font-size: 18px;  font-family: 'Lucida Grande'">
                            Date: <?php echo date('d F, Y', strtotime($all_info->date)); ?></div>
                        <div class="col-sm-2"
                             style="text-align:center; color: black; font-size: 18px; font-family: 'Lucida Grande'">
                            Doctor
                            Name: <?php echo $all_info->dr_name; ?></div>
                        <div class="col-sm-3"
                             style="text-align:center; color: black; font-size: 18px;  font-family: 'Lucida Grande'">
                            Doctor Mobile: <?php echo $all_info->dr_mobile; ?></div>
                        <div class="col-sm-3"
                             style="text-align:right; color: black; font-size: 18px; font-family: 'Lucida Grande'">
                            Prescription No. <?php echo $all_info->prescription_id; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3" style="color: black; font-size: 18px;  font-family: 'Lucida Grande'">
                            Patient
                            Name: <?php echo $all_info->customer_name; ?></div>
                        <div class="col-sm-2"
                             style="text-align:center; color: black; font-size: 18px;  font-family: 'Lucida Grande'">
                            Age: <?php echo $all_info->age; ?></div>
                        <div class="col-sm-3"
                             style="text-align:center; color: black; font-size: 18px;  font-family: 'Lucida Grande'">
                            Weight: <?php echo $all_info->weight; ?></div>
                        <div class="col-sm-3"
                             style="text-align:right; color: black; font-size: 18px;  font-family: 'Lucida Grande'">
                            Height: <?php echo $all_info->height; ?></div>
                    </div>

                    <?php
                }
            }
        }
        ?>
    </div>
    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="text-align: center;">No.</th>
                    <th style="text-align: center;">Goods Name</th>
                    <th style="text-align: center;">Uses Details</th>
                    <th style="text-align: center;">No of Days</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                for ($i = 1; $i <= $count_it; $i++) {
                    $count++;
                    $one_time = 0;
                    foreach (${"all_goods" . $i} as $all_info) {
                        $one_time++;
                        ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $count; ?></td>
                            <td style="text-align: center;">
                                <button type="button"
                                        onclick="prescribed_product_info('<?php echo $all_info->product_name; ?>',
                                                                '<?php echo $all_info->customer_name; ?>', '<?php echo $all_info->per_day_dose; ?>',
                                                                '<?php echo $all_info->no_of_days; ?>')">
                                    <?php echo $all_info->product_name; ?></button>
                            </td>
                            <td style="text-align: center;"><?php
                                echo $all_info->per_day_dose . '<br>' .
                                $all_info->meal_type . '<br>' . $all_info->description . '<br>';
                                ?>
                            </td>
                            <td style="text-align: center;"><?php echo $all_info->no_of_days; ?></td>

                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="box box-info">

        <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
            <table id="salesList" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center;">No.</th>
                        <th style="text-align: center;">Product Name</th>
                        <th style="text-align: center;">Price (per Unit)</th>
                        <th style="text-align: center;">Product Quantity</th>
                        <th style="text-align: center;">Discount</th>
                        <th style="text-align: center;">Total Price</th>
                        <th style="text-align: center;">Patient Name</th>
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
</div>


<script type="text/javascript">

    var all_sales = new Array();
    var product_count = 0;

    function delete_data(arr_no) {
        all_sales.splice(arr_no, 1);
        var full_table = "";
        for (var i = 0; i < all_sales.length; i++) {
            full_table += "<tr>";
            for (var j = 0; j < all_sales[i].length - 1; j++) {
                if (j == 3) {
                    full_table += "<td style='text-align: center;'><input type='text' style='width: 50%;' id='qty" + i + "'" +
                            "onkeyup='get_new_total(" + i + ")' value='" + all_sales[i][3] + "'></td>";
                } else if (j == 4) {
                    full_table += "<td style='text-align: center;'><input type='text' style='width: 50%;' id='discount" + i + "'" +
                            "onkeyup='get_new_total(" + i + ")' value='" + 0 + "'></td>";
                } else if (j == 5) {
                    full_table += "<td style='text-align: center;'>" + "<input type='text' style='width: 50%;' " +
                            "id='new_amount" + i + "'readonly value='" + all_sales[i][5] + "'></td>";
                } else {
                    full_table += "<td style='text-align: center;'>" + all_sales[i][j] + "</td>";
                }
            }
            full_table += "<td><button class='btn btn-danger' onclick='delete_data(" + i + ")'>Delete</button></td></tr>";
        }
        $('#show_all_sales').html(full_table);
        product_count--;
    }

    function get_new_total(row) {
        new_quantity = $('#qty' + row).val();
        new_discount = $('#discount' + row).val();
        all_sales[row][3] = new_quantity;
        all_sales[row][4] = new_discount;
        new_total = (new_quantity * all_sales[row][2]) - new_discount;
        all_sales[row][5] = new_total;
        $('#new_amount' + row).val(new_total);
    }

    function prescribed_product_info(product, patient, per_day, days) {
        var post_data = {
            'product_name': product,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/prescription_product_info",
            data: post_data,
            dataType: 'json',
            success: function (data) {
                var product_id = product;
                var price = data[0];
                var product_qty = eval(per_day) * days;
                var discount = data[2];
                var total_price = price * product_qty;
                var customer_name = patient;
                var product_type = data[4];
                all_sales[product_count] = new Array((product_count + 1), product_id, price, product_qty, discount,
                        total_price, customer_name, product_type);
                var full_table = "";
                for (var i = 0; i < all_sales.length; i++) {
                    full_table += "<tr>";
                    for (var j = 0; j < all_sales[i].length - 1; j++) {
                        if (j == 3) {
                            full_table += "<td style='text-align: center;'><input type='text' style='width: 50%;' id='qty" + i + "'" +
                                    "onkeyup='get_new_total(" + i + ")' value='" + all_sales[i][3] + "'></td>";
                        } else if (j == 4) {
                            full_table += "<td style='text-align: center;'><input type='text' style='width: 50%;' id='discount" + i + "'" +
                                    "onkeyup='get_new_total(" + i + ")' value='" + 0 + "'></td>";
                        } else if (j == 5) {
                            full_table += "<td style='text-align: center;'>" + "<input type='text' style='width: 50%;' " +
                                    "id='new_amount" + i + "'readonly value='" + all_sales[i][5] + "'></td>";
                        } else {
                            full_table += "<td style='text-align: center;'>" + all_sales[i][j] + "</td>";
                        }
                    }
                    full_table += "<td><button class='btn btn-danger' onclick='delete_data(" + i + ")'>Delete</button></td></tr>";
                }
                $('#show_all_sales').html(full_table);
                product_count++;
            }
        });
    }
    function makeid() {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        for (var i = 0; i < 8; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));

        return text;
    }
    $("#sell_btn").click(function () {
        var invoice_no = makeid();
        var post_data = {
            'invoice_no': invoice_no,
            'all_sales': all_sales,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/send_prescription_sell",
            data: post_data,
            success: function (data) {
                alert("Entry Successfully");
                location.reload();
            }
        });
    });
</script>