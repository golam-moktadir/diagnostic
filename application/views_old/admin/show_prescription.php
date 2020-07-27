<div class="box box-info">
    <div class="box-header"  style="color: black; text-align: center;">
        <h3>Hospital Name</h3>
    </div>
    <p style="padding-left: 10px;"><button id="print_button" title="Click to Print" type="button" 
                                           onClick="window.print()" class="btn btn-flat btn-warning">Print</button></p>
    <div class="container">
        <div class="row">
            <div class="col-sm-4" style="color: black; font-size: 18px; 
                 font-family: 'Lucida Grande'"><b>Date:</b> <?php echo date('d F, Y', strtotime($date)); ?>
            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-3" style="color: black; font-size: 18px; 
                 font-family: 'Lucida Grande'"><b>Prescription ID:</b> <?php echo $prescription_id; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4" style="color: black; font-size: 18px; 
                 font-family: 'Lucida Grande'"><b>Doctor Name:</b> <?php echo $dr_name; ?>
            </div>
            <div class="col-sm-4" style="color: black; font-size: 18px;  
                 font-family: 'Lucida Grande'"><b>Designation:</b> <?php echo $designation; ?>
            </div>
            <div class="col-sm-3" style="color: black; font-size: 18px;  
                 font-family: 'Lucida Grande'"><b>Mobile:</b> <?php echo $dr_mobile; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4" style="color: black; font-size: 18px;  
                 font-family: 'Lucida Grande'"><b>Patient Name:</b> <?php echo $name; ?>
            </div>
            <div class="col-sm-2" style="color: black; font-size: 18px;  
                 font-family: 'Lucida Grande'"><b>Age:</b> <?php echo $age; ?>
            </div>
            <div class="col-sm-2" style="color: black; font-size: 18px;  
                 font-family: 'Lucida Grande'"><b>Weight:</b> <?php echo $weight; ?>
            </div>
            <div class="col-sm-3" style="color: black; font-size: 18px;  
                 font-family: 'Lucida Grande'"><b>Height:</b> <?php echo $height; ?></div>
        </div>
    </div>
    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
        <table class="table table-bordered table-hover" style="margin-bottom: 25px;">
            <thead>
                <tr>
                    <th style="text-align: center;">No.</th>
                    <th style="text-align: center;">Medicine Name</th>
                    <th style="text-align: center;">Uses Details</th>
                    <th style="text-align: center;">No of Days</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                foreach ($all_goods as $all_info) {
                    $count++;
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $count; ?></td>
                        <td style="text-align: center;"><?php echo $all_info[0]; ?></td>
                        <td style="text-align: center;"><?php echo $all_info[1]."<br>".$all_info[2]."<br>".$all_info[3]; ?></td>
                        <td style="text-align: center;"><?php echo $all_info[4]; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <table class="table table-bordered table-hover" style="margin-top: 25px;">
            <thead>
            <tr>
                <th style="text-align: center;">No.</th>
                <th style="text-align: center;">Test Name</th>
                <th style="text-align: center;">Test Details</th>
                <th style="text-align: center;">Test Rate</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 0;
            foreach ($all_tests as $all_info) {
                $count++;
                ?>
                <tr>
                    <td style="text-align: center;"><?php echo $count; ?></td>
                    <td style="text-align: center;"><?php echo $all_info[1]; ?></td>
                    <td style="text-align: center;"><?php echo $all_info[2]; ?></td>
                    <td style="text-align: center;"><?php echo $all_info[3]; ?></td>
                </tr>
            <?php } ?>
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