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