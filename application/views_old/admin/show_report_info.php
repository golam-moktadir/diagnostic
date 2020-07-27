<div>
    <div class="box-header">
        <h4 style="color: black; text-align: center; color: blue; font-weight: bolder;">
            <u>Total Cash Report (<?php echo date('d F, Y', strtotime($start_date)) . " - " . date('d F, Y', strtotime($end_date)); ?>)</u>
        </h4>
    </div>
    <p style="padding-left: 10px;"><button id="print_button" title="Click to Print" type="button" 
                                           onClick="window.print()" class="btn btn-flat btn-warning">Print</button></p>
    <div class="box-body table-responsive" style="width: 98%; overflow-x: scroll;">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="text-align: center; vertical-align: middle;" rowspan="2">Date</th>
                    <th style="text-align: center;" colspan="3">Income</th>
                    <th style="text-align: center;" colspan="3">Expense</th>
                    <th style="text-align: center; vertical-align: middle;" rowspan="2">Balance</th>
                </tr>
                <tr>
                    <th style="text-align: center;">Consultation</th>
                    <th style="text-align: center;">Test Invoice</th>
                    <th style="text-align: center;">Income (Others)</th>
                    <th style="text-align: center;">Consultancy</th>
                    <th style="text-align: center;">Test Invoice</th>
                    <th style="text-align: center;">Expense (Others)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_balance = 0;
                $total_income = 0;
                $total_expense = 0;
                for ($i = 1; $i <= $count_it; $i++) {
                    $total_income += ${"con_in_sum" . $i} + ${"test_invoice_in_sum" . $i} + ${"income" . $i};
                    $total_expense += ${"con_ex_sum" . $i} + ${"test_invoice_ex_sum" . $i} + ${"expense" . $i};
                    $total_balance += ${"balance" . $i}
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo ${"date" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"con_in_sum" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"test_invoice_in_sum" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"income" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"con_ex_sum" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"test_invoice_ex_sum" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"expense" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"balance" . $i}; ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="8" style="text-align: right;">
                        <h6 style="color: red; font-weight: bold; padding: 0px; margin: 0px;">Total Income: <?php echo $total_income; ?></h6></td>
                </tr>
                <tr>
                    <td colspan="8" style="text-align: right;">
                        <h6 style="color: red; font-weight: bold; padding: 0px; margin: 0px;">Total Expense: <?php echo $total_expense; ?></h6></td>
                </tr>
                <tr>
                    <td colspan="8" style="text-align: right;">
                        <h6 style="color: red; font-weight: bold; padding: 0px; margin: 0px;">Total Balance: <?php echo $total_balance; ?></h6></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<style>
    @media print {  
        a[href]:after {
            content: none !important;
        }
        #print_button {
            display: none;
        }
        #no_print1 {
            display: none;
        }
 #space_id{
            display: none;
        }
    }
    table.table-bordered{
        border: grey 1px solid !important;
        font-weight: bold !important;
        color: black !important;
        font-size: 13px !important;
    }
    table.table-bordered > thead > tr > th{
        border: grey 1px solid !important;
        font-weight: bold !important;
        color: black!important;
        font-size: 13px !important;
        background: #0aad87 !important;
    }
    table.table-bordered > tbody > tr > td{
        border: grey 1px solid !important;
        font-weight: bold !important;
        color: black !important;
        font-size: 13px !important;
    }
</style>