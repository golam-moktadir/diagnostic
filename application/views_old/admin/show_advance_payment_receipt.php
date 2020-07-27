<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div style="color: black;">
                    <div class="box-body">
                        <p style="font-size: 20px; text-align: center;">New Popular Hospital</p>
                        <p style="padding-left: 10px;"><button id="print_button" title="Click to Print" type="button" 
                                                               onClick="window.print()" class="btn btn-flat btn-warning">Print</button></p>
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-3" style="color: black; font-size: 18px; 
                                     font-family: 'Lucida Grande'"><b>Date:</b> 
                                     <?php
                                     if (!empty($date)) {
                                         echo date('d F, Y', strtotime($date));
                                     }
                                     ?>
                                </div>
                                <div class="col-xs-3" style="color: black; font-size: 18px;  
                                     font-family: 'Lucida Grande'"><b>Patient ID:</b> <?php echo $patient_id; ?>
                                </div>
                                <div class="col-xs-3" style="color: black; font-size: 18px; 
                                     font-family: 'Lucida Grande'"><b>Patient Name:</b> <?php echo $patient_name; ?>
                                </div>
                                <div class="col-xs-3" style="color: black; font-size: 18px; 
                                     font-family: 'Lucida Grande'"><b>Patient Age:</b> <?php echo $age; ?>
                                </div>
                                <div class="col-xs-3" style="color: black; font-size: 18px; 
                                     font-family: 'Lucida Grande'"><b>Patient Mobile  NO:</b> <?php echo $mobile; ?>
                                </div>
                                <div class="col-xs-3" style="color: black; font-size: 18px; 
                                     font-family: 'Lucida Grande'"><b>Ref. Doctor:</b> <?php echo $doctor; ?>
                                </div>
                                <div class="col-xs-3" style="color: black; font-size: 18px; 
                                     font-family: 'Lucida Grande'"><b>Department:</b> <?php echo $department; ?>
                                </div>
                                <div class="col-xs-3" style="color: black; font-size: 18px; 
                                     font-family: 'Lucida Grande'"><b>Room/Cabin:</b> <?php echo $room_no; ?>
                                </div>
<!--                                <div class="col-xs-3" style="color: black; font-size: 18px;  
                                     font-family: 'Lucida Grande'"><b>Payment Method</b> <?php echo $payment_method; ?>
                                </div>-->
                                <div class="col-xs-3" style="color: black; font-size: 18px;  
                                     font-family: 'Lucida Grande'"><b>Payment Amount</b> <?php echo $payment_amount; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>

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