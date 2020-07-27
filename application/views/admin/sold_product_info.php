<div class="form-group col-sm-6 col-xs-12" style="width: 400px;">
    <p style="font-size: 18px;">Purchased Product List</p>
</div>

<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th style="text-align: center;">Product Name</th>
        <th style="text-align: center;">Price (per Unit)</th>
        <th style="text-align: center;">Quantity</th>
        <th style="text-align: center;">Discount</th>
        <th style="text-align: center;">Sub Total</th>
        <th style="text-align: center;">Action</th>
    </tr>
    </thead>
    <tbody><?php $total = 0;
    $invoice = '';
    $count = 0;
    foreach ($return_product as $single_value) {
        $count++;
        $total += $single_value->sub_total;
        $invoice = $single_value->invoice_no; ?>
        <tr>
            <td style="text-align: center;"><?php echo $single_value->product_name; ?></td>
            <td style="text-align: center;"><?php echo $single_value->price_per_unit; ?></td>
            <td style="text-align: center;">
                <input type="number" value="<?php echo $single_value->product_qty; ?>" style="width: 100%;"
                       onchange="sub_total(<?php echo $single_value->price_per_unit; ?>, <?php echo $single_value->discount; ?> ,
                       <?php echo $count; ?>)"
                       max="<?php echo $single_value->product_qty; ?>" min="0" id="qty<?php echo $count; ?>">
                Pcs
            </td>
            <td style="text-align: center;"><?php echo $single_value->discount; ?></td>
            <td style="text-align: center;">
                <input type="number" value="<?php echo $single_value->sub_total; ?>" style="width: 100%;"
                       max="<?php echo $single_value->product_qty; ?>" min="0" id="sub_total<?php echo $count; ?>" readonly>
            </td>
            <td style="text-align: center;">
                <button type="button" style="margin: 5px;" class="btn btn-info"
                        onclick="update_full_row('<?php echo $single_value->product_name; ?>', '<?php echo $single_value->type; ?>',
                        <?php echo $single_value->record_id; ?> , '<?php echo $single_value->invoice_no; ?>',
                        <?php echo $count; ?>)">
                    Update</button>
                <button type="button" style="margin: 5px;" class="btn btn-danger"
                        onclick="cancel_full_row('<?php echo $single_value->product_name; ?>', '<?php echo $single_value->type; ?>',
                        <?php echo $single_value->record_id; ?> , '<?php echo $single_value->invoice_no; ?>')">
                    Cancel</button>
            </td>
        </tr>
        <?php
    }
    if (!empty($return_product)) { ?>
        <tr>
            <td colspan="4" style="text-align: right;">Total</td>
            <td style="text-align: center;">
                <input type="number" value="<?php echo $total; ?>" style="width: 100%;"
                       max="<?php echo $total; ?>" min="0" id="total" readonly>
            </td>
            <td colspan="4" style="text-align: center;">
                <button type="button" style="margin: 5px;" class="btn btn-danger"
                        onclick="cancel('<?php echo $single_value->invoice_no; ?>')">
                Cancel</button>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>


<script type="text/javascript">

    function sub_total(price, discount, count) {
        var sub_total = price * $('#qty' + count).val() - discount;
        if (sub_total < 0) {
            sub_total = 0;
        }

        var diff = $('#sub_total' + count).val() - sub_total;
        var newTotal = $('#total').val()  - diff;
        if (newTotal < 0) {
            newTotal = 0;
        }
        $('#sub_total' + count).val(sub_total);
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
            url: "<?php echo base_url(); ?>Get_ajax_value/return_product_full_row",
            data: post_data,
            success: function (data) {
                console.log(data);
                $('#sold_product').html(data);
            }
        });

    }

    function update_full_row(product_name, type, record_id, invoice, count) {

        var qty = $('#qty' + count).val();
        var sub_total = $('#sub_total' + count).val()
        var post_data = {
            'product_name': product_name,
            'product_type': type,
            'record_id': record_id,
            'invoice_no': invoice,
            'product_qty': qty,
            'sub_total': sub_total,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        console.log(post_data);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/update_product_full_row",
            data: post_data,
            success: function (data) {
                console.log(data);
                alert('Updated Successfully');
                $('#sold_product').html(data);
            }
        });

    }

    function cancel(invoice) {

        var post_data = {
            'record_id': '',
            'invoice_no': invoice,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        console.log(post_data);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/return_product",
            data: post_data,
            success: function (data) {
                console.log(data);
                $('#sold_product').html(data);
            }
        });

    }

</script>