<div class="box box-info">
    <div class="box-header">
        <h3 class="box-title" style="color: black;">Balance Sheet</h3>
    </div>
    <p style="padding-left: 10px;"><button id="print_button" title="Click to Print" type="button" 
                                           onClick="window.print()" class="btn btn-flat btn-warning">Print</button></p>
    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="text-align: center;" colspan="5">Income</th>
                    <th style="text-align: center;"  colspan="5">Expense</th>
                </tr>
                <tr>
                    <th style="text-align: center;">Date</th>
                    <th style="text-align: center;">Particular</th>
                    <th style="text-align: center;">Invoice No</th>
                    <th style="text-align: center;">Quantity</th>
                    <th style="text-align: center;">Amount</th>
                    <th style="text-align: center;">Date</th>
                    <th style="text-align: center;">Particular</th>
                    <th style="text-align: center;">Voucher No</th>
                    <th style="text-align: center;">Quantity</th>
                    <th style="text-align: center;">Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $income_total = 0;
                $expense_total = 0;
                for ($i = 1; $i <= $count_it; $i++) {
                    if (!empty(${"amount" . $i})) {
                        $income_total += ${"amount" . $i};
                    }
                    if (!empty(${"expense_amount" . $i})) {
                        $expense_total += ${"expense_amount" . $i};
                    }
                    ?>
                    <tr>
                        <td style="text-align: center;">
                            <?php 
                            if(empty(${"date" . $i})){
                                echo "";
                            }else{
                                echo date('d F, Y', strtotime(${"date" . $i})); 
                            }
                            ?>
                        </td>
                        <td style="text-align: center;"><?php echo ${"particular" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"record_id" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"quantity" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"amount" . $i}; ?></td>
                        <td style="text-align: center;">
                            <?php 
                            if(empty(${"expense_date" . $i})){
                                echo "";
                            }else{
                                echo date('d F, Y', strtotime(${"expense_date" . $i})); 
                            }
                            ?>
                        </td>
                        <td style="text-align: center;"><?php echo ${"expense_particular" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"expense_voucher_no" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"expense_quantity" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"expense_amount" . $i}; ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <th style="text-align: center;" colspan="5"><?php echo "Income Total: ".$income_total." BDT"; ?></th>
                    <th style="text-align: center;" colspan="5"><?php echo "Expense Total: ".$expense_total." BDT"; ?></th>
                </tr>
                <?php $balance=$income_total-$expense_total; ?>
                <tr>
                    <th style="text-align: right;" colspan="10">
                        <?php 
                        if($balance < 0){
                            echo "Balance: ".$balance." BDT (Loss)"; 
                        }elseif($balance > 0){
                            echo "Balance: ".$balance." BDT (Profit)"; 
                        }else{
                             echo "Balance: ".$balance." BDT"; 
                        }
                        ?>
                    </th>
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
    }
    table.table-bordered{
        border: #55830c 1px solid;
        font-weight: bold;
        color: black;
        font-size: 16px;
    }
    table.table-bordered > thead > tr > th{
        border: #55830c 1px solid;
        font-weight: bold;
        color: black;
        font-size: 18px;
    }
    table.table-bordered > tbody > tr > td{
        border: #55830c 1px solid;
        font-weight: bold;
        color: black;
        font-size: 16px;
    }
</style>  