<div class="box box-info">

    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th style="text-align: center;">Date</th>
                <th style="text-align: center;">Product Name.</th>
                <th style="text-align: center;">In Quantity</th>
                <th style="text-align: center;">Out Quantity</th>
                <th style="text-align: center;">Balance</th>
            </tr>
            </thead>
            <tbody>
            <?php $balance = 0;
            for ($i = 1; $i <= $count_it1; $i++) {
                $one_time = 0;
                foreach (${"med_result1" . $i} as $single_value) {
                    $one_time++;
                    ?>
                    <tr>
                        <?php if ($one_time == 1) { ?>
                            <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->date)); ?></td>
<!--                            <td style="text-align: center;"><?php echo $single_value->invoice_no; ?></td>-->
                        //<?php } else { ?>
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;"></td>
                        //<?php } ?>
                        <td style="text-align: center;"></td>
                        <td style="text-align: center;"><?php echo $single_value->medicine_name; ?></td>
                        <td style="text-align: center;"><?php echo $single_value->medicine_qty; ?> </td>
                        <td style="text-align: center;"><?php echo 0; ?> </td>
                        <td style="text-align: center;"><?php echo $balance += $single_value->medicine_qty; ?> </td>
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
                            <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->date)); ?></td>
                            <td style="text-align: center;"><?php echo $single_value->invoice_no; ?></td>
                        <?php } else { ?>
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;"></td>
                        <?php } ?>
                        <td style="text-align: center;"></td>
                        <td style="text-align: center;"><?php echo $single_value->product_name; ?></td>
                        <td style="text-align: center;"><?php echo $single_value->product_qty; ?> </td>
                        <td style="text-align: center;"><?php echo 0; ?> </td>
                        <td style="text-align: center;"><?php echo $balance += $single_value->product_qty; ?> </td>
                    </tr>
                    <?php
                }
            }
            ?>

            <?php
            for ($i = 1; $i <= $count_it3; $i++) {
                $one_time = 0;
                foreach (${"med_result3" . $i} as $single_value) {
                    $one_time++;
                    ?>
                    <tr>
                        <?php if ($one_time == 1) { ?>
                            <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->date)); ?></td>
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;"><?php echo $single_value->invoice_no; ?></td>
                        <?php } else { ?>
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;"></td>
                        <?php } ?>
                        <td style="text-align: center;"><?php echo $single_value->product_name; ?></td>
                        <td style="text-align: center;"><?php echo 0; ?> </td>
                        <td style="text-align: center;"><?php echo $single_value->product_qty; ?> </td>
                        <td style="text-align: center;"><?php echo $balance -= $single_value->product_qty; ?> </td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>