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
                <th style="text-align: center;">Invoice No.</th>
                <th style="text-align: center;"><?php echo $category; ?> Name</th>
                <th style="text-align: center;">Price (per Unit)</th>
                <th style="text-align: center;"><?php echo $category; ?> Quantity</th>
                <th style="text-align: center;">Discount</th>
                <th style="text-align: center;">Total Price</th>
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
                        <td style="text-align: center;"><?php echo $single_value->price_per_unit; ?></td>
                        <td style="text-align: center;"><?php echo $single_value->product_qty; ?> Pcs</td>
                        <td style="text-align: center;"><?php echo $single_value->discount; ?></td>
                        <td style="text-align: center;"><?php echo $single_value->sub_total; ?> Pcs</td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>