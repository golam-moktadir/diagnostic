<div class="box box-info">
    <div class="box-header">
        <h3 class="box-title" style="color: black;">All Info.</h3>
    </div>

    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th style="text-align: center;">No.</th>
                <th style="text-align: center;">Date</th>
                <th style="text-align: center;">Voucher No.</th>
                <th style="text-align: center;"><?php echo $category; ?> Name</th>
                <th style="text-align: center;">Manufacture Company</th>
                <th style="text-align: center;">Purchase Price</th>
                <th style="text-align: center;">Selling Price</th>
                <th style="text-align: center;"><?php echo $category; ?> Quantity</th>
                <th style="text-align: center;">Total Price</th>
                <th style="text-align: center;">Expiry Date</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for ($i = 1; $i <= $count_it1; $i++) {
                $one_time = 0;
                foreach (${"med_result1" . $i} as $single_value) {
                    $one_time++;
                    ?>
                    <tr>
                        <?php if ($one_time == 1) { ?>
                            <td style="text-align: center;"><?php echo $i; ?></td>
                            <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->date)); ?></td>
                            <td style="text-align: center;"><button type="button" onclick="purchased_product_info('<?php echo $single_value->invoice_no; ?>')"><?php echo $single_value->invoice_no; ?></button></td>
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
                        <td style="text-align: center;"><?php echo $single_value->total_price; ?> Pcs</td>
                        <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->expiry_date)); ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
            <?php
            for ($i = 1; $i <= $count_it2; $i++) {
                $one_time = 0;
                foreach (${"med_result2" . $i} as $single_value) {
                    $one_time++;
                    ?>
                    <tr>
                        <?php if ($one_time == 1) { ?>
                            <td style="text-align: center;"><?php echo $i; ?></td>
                            <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->date)); ?></td>
                            <td style="text-align: center;"><button type="button" onclick="purchased_product_info('<?php echo $single_value->invoice_no; ?>')"><?php echo $single_value->invoice_no; ?></button></td>
                        <?php } else { ?>
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;"></td>
                        <?php } ?>
                        <td style="text-align: center;"><?php echo $single_value->product_name; ?></td>
                        <td style="text-align: center;"><?php echo $single_value->manufacture_company; ?></td>
                        <td style="text-align: center;"><?php echo $single_value->purchase_price; ?> /-</td>
                        <td style="text-align: center;"><?php echo $single_value->selling_price; ?> /-</td>
                        <td style="text-align: center;"><?php echo $single_value->product_qty; ?> Pcs</td>
                        <td style="text-align: center;"><?php echo $single_value->total_price; ?> Pcs</td>
                        <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->expiry_date)); ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>


<script type="text/javascript">

    function purchased_product_info(voucher) {

        var post_data = {
            'invoice_no': voucher,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        console.log(post_data);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/purchased_product_info",
            data: post_data,
            success: function (data) {
                console.log(data);
                $('#purchased_product').html(data);
            }
        });
    }

</script>