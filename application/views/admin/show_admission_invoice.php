<div class="box box-info">
    <div class="box-header"  style="color: black; text-align: center;">
        <h3>Hospital Name</h3>
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
                 if (!empty($admission_date)) {
                     echo date('d F, Y', strtotime($admission_date));
                 }
                 ?>
            </div>
            <div class="col-sm-6" style="color: black; font-size: 18px;  
                 font-family: 'Lucida Grande'"><b>Discharge Date: </b>
                 <?php
                 if (!empty($discharge_date)) {
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
                $count = 0;
                foreach ($all_purchase as $all_info) {
                    $count++;
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $count; ?></td>
                        <td style="text-align: center;"><?php echo $all_info[0]; ?></td>
                        <td style="text-align: center;"><?php echo $all_info[1] ?> </td>
                        <td style="text-align: center;"><?php echo $all_info[2]; ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">Total Amount: <?php echo $total; ?></td>
                    <td style="text-align: center;">Due Amount: <?php echo $total; ?></td>
                    <td style="text-align: center;">Status: Unpaid</td>
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