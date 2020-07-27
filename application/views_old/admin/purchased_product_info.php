<div class="form-group col-sm-6 col-xs-12" style="width: 400px;">
    <p style="font-size: 18px;">Purchased Product List</p>
</div>

<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th style="text-align: center;">Product Name</th>
        <th style="text-align: center;">Manufacturer</th>
        <th style="text-align: center;">Purchase Price (per Unit)</th>
        <th style="text-align: center;">Quantity</th>
        <th style="text-align: center;">Total</th>
        <th style="text-align: center;">Action</th>
    </tr>
    </thead>
    <tbody><?php $total = 0;
    $invoice = '';
    $count = 0;
    if (!empty($return_medicine)) {
        foreach ($return_medicine as $single_value) {
            $count++;
            $total += $single_value->total_price;
            $invoice = $single_value->invoice_no; ?>
            <tr>
                <td style="text-align: center;"><?php echo $single_value->medicine_name; ?></td>
                <td style="text-align: center;"><?php echo $single_value->manufacture_company; ?></td>
                <td style="text-align: center;"><?php echo $single_value->purchase_price; ?></td>
                <td style="text-align: center;">
                    <input type="number" value="<?php echo $single_value->medicine_qty; ?>" style="width: 50%;"
                           onchange="total_price(<?php echo $single_value->purchase_price; ?>,
                           <?php echo $count; ?>)"
                           max="<?php echo $single_value->medicine_qty; ?>" min="0" id="qty<?php echo $count; ?>">
                </td>
                <td style="text-align: center;">
                    <input type="number" value="<?php echo $single_value->total_price; ?>" style="width: 50%;"
                           min="0" id="total_price<?php echo $count; ?>" readonly>
                </td>
                <td style="text-align: center;">
                    <button type="button" style="margin: 5px;" class="btn btn-info"
                            onclick="update_full_row('<?php echo $single_value->medicine_name; ?>' , 'Medicine',
                            <?php echo $single_value->record_id; ?> , '<?php echo $single_value->invoice_no; ?>',
                            <?php echo $count; ?>)">
                        Update
                    </button>
                    <button type="button" style="margin: 5px;" class="btn btn-danger"
                            onclick="cancel_full_row('<?php echo $single_value->medicine_name; ?>' , 'Medicine',
                            <?php echo $single_value->record_id; ?> , '<?php echo $single_value->invoice_no; ?>')">
                        Cancel
                    </button>
                </td>
            </tr>
            <?php
        }
    } elseif (!empty($return_product)) {
        foreach ($return_product as $single_value) {
            $count++;
            $total += $single_value->total_price;
            $invoice = $single_value->invoice_no; ?>
            <tr>
                <td style="text-align: center;"><?php echo $single_value->product_name; ?></td>
                <td style="text-align: center;"><?php echo $single_value->manufacture_company; ?></td>
                <td style="text-align: center;"><?php echo $single_value->purchase_price; ?></td>
                <td style="text-align: center;">
                    <input type="number" value="<?php echo $single_value->product_qty; ?>" style="width: 50%;"
                           onchange="total_price(<?php echo $single_value->purchase_price; ?>,
                           <?php echo $count; ?>)"
                           max="<?php echo $single_value->product_qty; ?>" min="0" id="qty<?php echo $count; ?>">
                </td>
                <td style="text-align: center;">
                    <input type="number" value="<?php echo $single_value->total_price; ?>" style="width: 50%;"
                           min="0" id="total_price<?php echo $count; ?>" readonly>
                </td>
                <td style="text-align: center;">
                    <button type="button" style="margin: 5px;" class="btn btn-info"
                            onclick="update_full_row('<?php echo $single_value->product_name; ?>', 'Product',
                            <?php echo $single_value->record_id; ?> , '<?php echo $single_value->invoice_no; ?>',
                            <?php echo $count; ?>)">
                        Update
                    </button>
                    <button type="button" style="margin: 5px;" class="btn btn-danger"
                            onclick="cancel_full_row('<?php echo $single_value->product_name; ?>' , 'Product',
                            <?php echo $single_value->record_id; ?> , '<?php echo $single_value->invoice_no; ?>')">
                        Cancel
                    </button>
                </td>
            </tr>
            <?php
        }
    }
    if (!empty($return_medicine)) { ?>
        <tr>
            <td colspan="4" style="text-align: right;">Total</td>
            <td style="text-align: center;">
                <input type="number" value="<?php echo $total; ?>" style="width: 50%;"
                       max="<?php echo $total; ?>" min="0" id="total" readonly>
            </td>
            <td colspan="4" style="text-align: center;">
                <button type="button" style="margin: 5px;" class="btn btn-danger"
                        onclick="cancel('<?php echo $single_value->invoice_no; ?>', 'Medicine')">
                    Cancel
                </button>
            </td>
        </tr>
    <?php } elseif (!empty($return_product)) { ?>
        <tr>
            <td colspan="4" style="text-align: right;">Total</td>
            <td style="text-align: center;">
                <input type="number" value="<?php echo $total; ?>" style="width: 100%;"
                       max="<?php echo $total; ?>" min="0" id="total" readonly>
            </td>
            <td colspan="4" style="text-align: center;">
                <button type="button" style="margin: 5px;" class="btn btn-danger"
                        onclick="cancel('<?php echo $single_value->invoice_no; ?>', 'Product')">
                    Cancel
                </button>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>


<script type="text/javascript">

    function total_price(price, count) {
        var total_price = price * $('#qty' + count).val();
        var diff = $('#total_price' + count).val() - total_price;
        var newTotal = $('#total').val() - diff;

        $('#total_price' + count).val(total_price);
        $('#total').val(newTotal);
    }

    function cancel_full_row(product_name, type, record_id, invoice) {

        var post_data = {
            'product_name': product_name,
            'product_type': type,
            'record_id': record_id,
            'invoice_no': invoice,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        console.log(post_data);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/return_to_manufacture_full_row",
            data: post_data,
            success: function (data) {
                console.log(data);
                $('#purchased_product').html(data);
            }
        });

    }

    function update_full_row(product_name, type, record_id, invoice, count) {

        var qty = $('#qty' + count).val();
        var total_price = $('#total_price' + count).val()
        var post_data = {
            'product_name': product_name,
            'product_type': type,
            'record_id': record_id,
            'invoice_no': invoice,
            'product_qty': qty,
            'total_price': total_price,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        console.log(post_data);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/return_to_manufacture_update_full_row",
            data: post_data,
            success: function (data) {
                console.log(data);
                alert('Updated Successfully');
                $('#purchased_product').html(data);
            }
        });

    }

    function cancel(invoice, type) {

        var post_data = {
            'record_id': '',
            'invoice_no': invoice,
            'product_type': type,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        console.log(post_data);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/return_to_manufacture",
            data: post_data,
            success: function (data) {
                console.log(data);
                $('#purchased_product').html(data);
            }
        });

    }

</script>