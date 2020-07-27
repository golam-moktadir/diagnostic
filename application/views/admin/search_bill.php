<div class="box box-info">
    <div class="box-header"  style="color: black; text-align: center;">
        <h3>Pharmacy Name</h3>
    </div>
    <p style="padding-left: 10px;"><button id="print_button" title="Click to Print" type="button" 
                                           onClick="window.print()" class="btn btn-flat btn-warning">Print</button></p>
    <div class="container">
        <div class="row">
            <div class="col-sm-4" style="color: black; font-size: 18px; 
                 font-family: 'Lucida Grande'"><b>Bill Date:</b>
                 <?php
                 if (!empty($bill_date)) {
                     echo date('d F, Y', strtotime($bill_date));
                 }
                 ?> 
            </div>
            <div class="col-sm-3" style="color: black; font-size: 18px; 
                 font-family: 'Lucida Grande'"><b>Bill ID:</b> <?php echo $bill_id; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4" style="color: black; font-size: 18px; 
                 font-family: 'Lucida Grande'"><b>Discharge Date:</b>
                 <?php
                 if (!empty($bill_date)) {
                     echo date('d F, Y', strtotime($bill_date));
                 }
                 ?> 
            </div>
            <div class="col-sm-3" style="color: black; font-size: 18px; 
                 font-family: 'Lucida Grande'"><b>Patient ID:</b> <?php echo $patient_id; ?>
            </div>
            <div class="col-sm-3" style="color: black; font-size: 18px;  
                 font-family: 'Lucida Grande'"><b>Patient Name:</b> <?php echo $patient_name; ?>
            </div>
            
        </div>
    </div>
    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="text-align: center;">No.</th>
                    <th style="text-align: center;">Invoice No</th>
                    <th style="text-align: center;">Invoice Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $all_invoice_total=0;
                for ($i = 1; $i <= $count_it; $i++) {
                    $all_invoice_total+=${"invoice_total" . $i};
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $i; ?></td>
                        <td style="text-align: center;"><?php echo ${"invoice_no" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"invoice_total" . $i} ?> </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="2"></td>
                    <td style="text-align: center;">Total Amount: <?php echo $all_invoice_total; ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><b>Tax:</b> <?php echo $tax; ?></td>
                    <td style="text-align: center;"><b>Discount:</b> <?php echo $discount; ?></td>
                    <td style="text-align: center;"><b>Paid Amount:</b> <?php echo $total; ?></td>
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
        #no_print2 {
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