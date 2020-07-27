<div class="box box-info">
    <div class="box-header"  style="color: black; text-align: center;">
        <h3>Pharmacy Name</h3>
    </div>
    <p style="padding-left: 10px;"><button id="print_button" title="Click to Print" type="button" 
                                           onClick="window.print()" class="btn btn-flat btn-warning">Print</button></p>
    <div class="container">
        <div class="row">
            <div class="col-sm-6" style="color: black; font-size: 18px; 
                 font-family: 'Lucida Grande'"><b>Invoice No:</b> <?php echo $invoice_no; ?>
            </div>
            <div class="col-sm-6" style="color: black; font-size: 18px; 
                 font-family: 'Lucida Grande'"><b>Patient ID:</b> <?php echo $patient_id; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3" style="color: black; font-size: 18px; 
                 font-family: 'Lucida Grande'"><b>Patient Name:</b> <?php echo $patient_name; ?>
            </div>
            <div class="col-sm-3" style="color: black; font-size: 18px;  
                 font-family: 'Lucida Grande'"><b>Age:</b> <?php echo $age; ?>
            </div>
            <div class="col-sm-3" style="color: black; font-size: 18px;  
                 font-family: 'Lucida Grande'"><b>Height:</b> <?php echo $height; ?>
            </div>
            <div class="col-sm-3" style="color: black; font-size: 18px;  
                 font-family: 'Lucida Grande'"><b>Weight:</b> <?php echo $weight; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6" style="color: black; font-size: 18px;  
                 font-family: 'Lucida Grande'"><b>Admission Date: </b> 
                 <?php
                 if ($admission_date != "0000-00-00") {
                     echo date('d F, Y', strtotime($admission_date));
                 }
                 ?>
            </div>
            <div class="col-sm-6" style="color: black; font-size: 18px;  
                 font-family: 'Lucida Grande'"><b>Discharge Date: </b>
                 <?php
                if ($discharge_date != "0000-00-00") {
                     echo date('d F, Y', strtotime($discharge_date));
                 }
                 ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3" style="color: black; font-size: 18px;  
                 font-family: 'Lucida Grande'"><b>Guardian: </b> <?php echo $guardian_name; ?>
            </div>
            <div class="col-sm-3" style="color: black; font-size: 18px;  
                 font-family: 'Lucida Grande'"><b>Relation</b> <?php echo $relation; ?>
            </div>
            <div class="col-sm-3" style="color: black; font-size: 18px;  
                 font-family: 'Lucida Grande'"><b>Contact: </b> <?php echo $contact; ?>
            </div>
            <div class="col-sm-3" style="color: black; font-size: 18px;  
                 font-family: 'Lucida Grande'"><b>Address</b> <?php echo $address; ?>
            </div>
        </div>
    </div>
    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="text-align: center;">SL</th>
                    <th style="text-align: center;">Doctor Name</th>
                    <th style="text-align: center;">Service</th>
                    <th style="text-align: center;">Package</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 1; $i <= $count_it; $i++) {
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $i; ?></td>
                        <td style="text-align: center;"><?php echo ${"doctor_name" . $i}; ?></td>
                        <td style="text-align: center;"><?php echo ${"service_name" . $i} ?> </td>
                        <td style="text-align: center;"><?php echo ${"package_name" . $i}; ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">Total Amount: <?php echo $total; ?></td>
                    <td style="text-align: center;">Due Amount: <?php echo $due; ?></td>
                    <td style="text-align: center;">Status: <?php echo $status; ?></td>
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