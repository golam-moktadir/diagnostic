<aside>
    <section class="content">
        <div class="row">
            <div class="col-xs-12" style="color: black; text-align: center;">
                                <img src="<?php echo base_url(); ?>assets/img/banner.jpg"
                                     alt="Logo" width="50%" height="80px" style="border-radius: 15px;">
             </div>
            <section class="col-xs-12 connectedSortable"> 
                <div class="" style="color:black;">
<!--                     <h3 style="text-align: center;">New Popular Hospital</h3>-->
                     <h4 style="text-align: center;"><u>Pay Test Due Invoice</u></h4>
                <div class="box-header"  style="color: black; text-align: center;">
                    <p style="padding: 10px; text-align: left;"><button id="print_button" title="Click to Print" type="button" 
                                                                        onClick="window.print()" class="btn btn-flat btn-warning">Print</button></p>
                </div>
                    <div class="box-body">
                        <div class="row">
                             <div class="form-group col-xs-4 col-xs-12"><b>
                                    Date:</b> <?php echo $date; ?>
                            </div>
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Patient ID:</b> <?php echo $patient_id; ?>
                            </div>
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Patient Name:</b> <?php echo $patient_name; ?>
                            </div>
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Previous Due:</b> <?php echo $previous_due; ?>
                            </div>
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Paid:</b> <?php echo $pay; ?>
                            </div>
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Due:</b> <?php echo $due; ?>
                            </div>
                        </div>
                         <div class="row" style="margin-top: 75px; margin-left: 15px;margin-right: 25px;">
                                <div style="float: left;">
                                    <p>-----------------------------</p>
                                    <p>Customer Signature</p>
                                </div>

                                <div style="float: right;">
                                    <p>---------------------------</p>
                                    <p>Authorized Signature</p>
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
        :-webkit-scrollbar {
            display: none;
        }
        @page {
            size: A5 portrait; /* DIN A4 standard, Europe */
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