<div>
    <div>
        <h4  style="color: black; text-align: center; color: blue; font-weight: bolder;">Consultation Report (<?php echo date('d F, Y', strtotime($start_date)) . " - " . date('d F, Y', strtotime($end_date)); ?>)</h4>
    </div>
    <p style="padding-left: 10px;"><button id="print_button" title="Click to Print" type="button" 
                                           onClick="window.print()" class="btn btn-flat btn-warning">Print</button></p>
    <div class="box-body table-responsive" style="width: 98%; overflow-x: scroll; color: black;">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="text-align: center;">SL</th>
<!--                    <th style="text-align: center;">Patient</th>
                    <th style="text-align: center;">Mobile</th>
                    <th style="text-align: center;">Address</th>
                    <th style="text-align: center;">Age</th>-->
                    <th style="text-align: center;">Date</th>
                    <th style="text-align: center;">Doctor_Name</th>
                    <th style="text-align: center;">Fee</th>
                    <th style="text-align: center;">Discount</th>
                    <th style="text-align: center;">Sub_Total</th>
                    <th style="text-align: center;">Commission</th>
                    <th style="text-align: center;">Hospital_Amount</th>
<!--                    <th style="text-align: center;">Appt_Date</th>
                    <th style="text-align: center;">Appt_Time</th>-->
                </tr>
            </thead>
            <tbody>
                <?php
                $sub_total = 0;
                $doctor_commission = 0;
                $company_commission = 0;
                $count=0;
                foreach ($all_value as $single_value) {
                    $count++;
                    $sub_total +=  $single_value->sub_total;
                    $doctor_commission +=  $single_value->doctor_commission;
                    $company_commission +=  $single_value->company_commission;
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $count; ?></td>
<!--                        <td style="text-align: center;"><?php echo $single_value->patient_name; ?></td>
                        <td style="text-align: center;"><?php echo $single_value->mobile; ?></td>
                        <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                        <td style="text-align: center;"><?php echo $single_value->age; ?></td>-->
                        <td style="text-align: center;"><?php echo $single_value->date; ?></td>
                        <td style="text-align: center;"><?php echo $single_value->doctor_name; ?></td>
                        <td style="text-align: center;"><?php echo $single_value->doctor_fee; ?></td>
                        <td style="text-align: center;"><?php echo $single_value->discount; ?></td>
                        <td style="text-align: center;"><?php echo $single_value->sub_total; ?></td>
                        <td style="text-align: center;"><?php echo $single_value->doctor_commission; ?></td>
                        <td style="text-align: center;"><?php echo $single_value->company_commission; ?></td>
                        
                        <!--<td style="text-align: center;"><?php echo date("h:i A", strtotime($single_value->appointment_time)); ?></td>-->
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="5" style="text-align: right;">Total</td>
                    <td  style="text-align: center;"><?php echo $sub_total; ?></td>
                    <td style="text-align: center;"><?php echo $doctor_commission; ?></td>
                    <td style="text-align: center;"><?php echo $company_commission; ?></td>
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
        .no_print {
            display: none;
        }
    }
    table.table-bordered{
        border: #55830c 1px solid;
        font-weight: bold;
        color: black;
        font-size: 15px;
    }
    table.table-bordered > thead > tr > th{
        border: #55830c 1px solid;
        font-weight: bold;
        color: black;
        font-size: 16px;
    }
    table.table-bordered > tbody > tr > td{
        border: #55830c 1px solid;
        font-weight: bold;
        color: black;
        font-size: 15px;
    }
</style> 