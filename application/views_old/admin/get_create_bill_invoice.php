<div>
    <div class="box-body table-responsive" style="width: 98%; color: black;">
        <h3 style="text-align: center;">GREEN Pathology Complex</h3>
        <h4 style="text-align: center;"><u>Final Bill Invoice</u></h4>
        <p style="padding: 10px; text-align: left;"><button id="print_button" title="Click to Print" type="button" 
                                                            onClick="window.print()" class="btn btn-flat btn-warning">Print</button></p>
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th colspan="3" style="text-align: center;">
                        Patient ID: <?php echo $patient_id; ?>
                    </th>
                    <th colspan="5" style="text-align: center;">
                        Patient Name: <?php echo $patient_name; ?>
                    </th>
                </tr>
                <tr>
                    <th style="text-align: center;">SL</th>
                    <th style="text-align: center;">Date</th>
                    <th style="text-align: center;">Particular</th>
                    <th style="text-align: center;">Amount</th>
                    <th style="text-align: center;">Discount</th>
                    <th style="text-align: center;">Paid</th>
                    <th style="text-align: center;">Due</th>
                    <th style="text-align: center;">Advance</th>
<!--                    <th style="text-align: center;">Balance</th>-->
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                $t_1 = 0;
                $t_2 = 0;
                $t_3 = 0;
                $t_4 = 0;
                $t_5 = 0;
                foreach ($result as $info) {
                    $count++;
                    $t_1 += $info->amount;
                    $t_2 += $info->discount;
                    $t_3 += $info->paid;
                    $t_4 += $info->due;
                    $t_5 += $info->advance;
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $count; ?></td>
                        <td style="text-align: center;"><?php echo $info->date; ?></td>
                        <td style="text-align: center;"><?php echo $info->particular; ?></td>
                        <td style="text-align: center;"><?php echo $info->amount; ?></td>
                        <td style="text-align: center;"><?php echo $info->discount; ?></td>

                        <td style="text-align: center;"><?php echo $info->paid; ?></td>
                        <td style="text-align: center;"><?php echo $info->due; ?></td>
                        <td style="text-align: center;"><?php echo $info->advance; ?></td>
                    </tr>
                <?php } ?>
                    <tr>
                        <td style="text-align: right;" colspan="7">Total Amount</td>
                        <td style="text-align: right;"><?php echo $t_1-$t_2; ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;" colspan="7">Total Paid</td>
                        <td style="text-align: right;"><?php echo $t_3; ?></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;" colspan="7">Balance</td>
                        <td style="text-align: right;"><?php echo ($t_1-$t_2)-$t_3; ?></td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>

<style>
    @media print {  
        @page{
            margin:0;
        }
        a[href]:after {
            content: none !important;
        }
        #print_button {
            display: none;
        }
        #no_print1 {
            display: none;
        }
    }
    table.table-bordered{
        border: #55830c .5px solid;
        font-weight: bold;
        color: black;
        font-size: 15px;
    }
    table.table-bordered > thead > tr > th{
        border: #55830c .5px solid;
        font-weight: bold;
        color: black;
        font-size: 16px;
    }
    table.table-bordered > tbody > tr > td{
        border: #55830c .5px solid;
        font-weight: bold;
        color: black;
        font-size: 15px;
    }
</style>  