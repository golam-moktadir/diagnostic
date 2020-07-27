<p style="padding-left: 10px; padding-top: 20px;"><button id="print_button" title="Click to Print" type="button" 
                                       onClick="window.print()" class="btn btn-flat btn-warning">Print</button></p>
<!--<p style="text-align: center; font-size: 16px;">Ullapara Science College</p>-->
<!--<p style="text-align: center;  font-size: 16px;">Ullapara, Sirajganj</p>-->
<!--<p style="text-align: center;  font-size: 16px;">Name of the Bank-Uttara Bank Limited</p>-->
<!--<p style="text-align: center;  font-size: 16px;">--><?php //echo $month; ?><!--</p>-->

<div style="padding: 10px;">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th style="text-align: center;">SL No.</th>
                <th style="text-align: center;">Employee Name</th>
                <th style="text-align: center;">Designation</th>
                <th style="text-align: center;">Account No.</th>
                <th style="text-align: center;">Amount (Taka)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 0;
            foreach ($all_value as $single_value) {
                $count++;
                ?>
                <tr>
                    <td style="text-align: center;"><?php echo $count; ?></td>
                    <td style="text-align: center;"><?php echo $single_value->employee_name."[".$single_value->employee_id."]"; ?></td>
                    <td style="text-align: center;"><?php echo $single_value->designation; ?></td>
                    <td style="text-align: center;"><?php echo $single_value->account_no; ?></td>
                    <td style="text-align: center;"><?php echo number_format($single_value->salary_scale); ?>/-</td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="3"></td>
                <td style="text-align: center;">Total</td>
                <td style="text-align: center;">=<?php echo number_format($total); ?>/-</td>
            </tr>
            <tr>
                <td colspan="6" style="text-align: right;">
                    In Words - <?php echo $this->numbertowords->convert_number($total); ?> Taka Only
                </td>
            </tr>
        </tbody>

    </table>
</div>
