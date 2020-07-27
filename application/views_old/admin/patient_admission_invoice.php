<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable"> 
                <div class="" style="color:black;">
                     <h3 style="text-align: center;">GST General Hospital</h3>
                     <h4 style="text-align: center;"><u>Patient Admission Invoice</u></h4>
                <div class="box-header"  style="color: black; text-align: center;">
                    <p style="padding: 10px; text-align: left;"><button id="print_button" title="Click to Print" type="button" 
                                                                        onClick="window.print()" class="btn btn-flat btn-warning">Print</button></p>
                </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Patient ID:</b> <?php echo $patient_id; ?>
                            </div>
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Patient Name:</b> <?php echo $patient_name; ?>
                            </div>
<!--                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Age:</b> <?php echo $age; ?>
                            </div>
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Mobile:</b> <?php echo $mobile; ?>
                            </div>-->
<!--                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Doctor Name:</b> <?php echo $doctor_name; ?>
                            </div>
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Department:</b> <?php echo $department; ?>
                            </div>-->
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Date From:</b> <?php echo $date_from; ?>
                            </div>
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Date To:</b> <?php echo $date_to; ?>
                            </div>
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Room No:</b> <?php echo $room_no; ?>
                            </div>
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Total Day:</b> <?php echo $total_day; ?>
                            </div>
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Single Day Price:</b> <?php echo $single_day_price; ?>
                            </div>
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Amount:</b> <?php echo $amount; ?>
                            </div>
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Discount:</b> <?php echo $discount; ?>
                            </div>
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Sub Total:</b> <?php echo $sub_total; ?>
                            </div>
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Pay:</b> <?php echo $pay; ?>
                            </div>
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Due:</b> <?php echo $due; ?>
                            </div>
<!--                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Advance:</b> <?php echo $advance; ?>
                            </div>-->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>

<style>
    @media print {  
        :-webkit-scrollbar {
            display: none;
        }
        @page {
            size: A4; /* DIN A4 standard, Europe */
            margin:0;
        }
        /*         div.divHeader {
                    position: fixed;
                    height: 80px;  put the image height here 
                    width: 97%;  put the image width here 
                    top: 0;
                }
                div.divFooter {
                    position: fixed;
                    height: 80px;  put the image height here 
                    width: 97%;  put the image width here 
                    bottom: 0;
                }*/
        a[href]:after {
            content: none !important;
        }
        #print_button {
            display: none;
        }
    }
</style>      