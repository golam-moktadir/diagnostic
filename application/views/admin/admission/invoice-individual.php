<aside>
    <section class="content" style="padding-top: 0px; margin-top: 0px;">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div id="invoice">
                    <div style="width: 100%; color: black;">
                        <div style="text-align: right; padding-right: 0px;" class="no_print">
                            <button  id="print" onclick="window.print()" class="btn btn-warning waves-effect waves-light">
                                <i class="fa fa-print"></i>
                            </button>
                            <a href="<?php echo base_url(); ?>admission/operation-details">
                                <button class="btn btn-danger waves-effect waves-light">
                                    <i class="fa fa-window-close-o"></i>
                                </button> 
                            </a>
                        </div>
                        <div style="color: black; text-align: center; margin: 0px; padding: 0px; padding-top: 20px; border-radius: 10px !important;">
                            <p style="font-weight: bold; padding: 0px; margin:0px; font-size: 18px;">GREEN PATHOLOGY COMPLEX</p>
                            <p style="font-weight: bold; padding: 0px; margin:0px; font-size: 16px;">Mirpur-1, Dhaka-1216.</p>
                            <p style="font-weight: bold; padding: 0px; margin:0px;font-size: 16px;">Mobile: 01619180956, 01719180956</p>
                            <!--<p style="font-weight: bold; font-size: 18px;"><u>Customer Copy</u></p>-->
                        </div>
                        <div class="container" style="border: 1px solid #c2c4c3; margin: 2px; padding-top: 10px; border-radius: 10px; color: white !important;
                             background: #d1ffe8 !important; font-family: Arial narrow !important; width: 100%;">
                            <div class="row">
                                <div class="form-group col-xs-6"  style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                                    <b>Invoice No: </b><?php echo $invoice->record_id; ?>
                                </div>
                                <div class="form-group col-xs-6"  style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                                    <b>Date: </b><?php echo $invoice->operation_date; ?>
                                </div>
                                <div class="form-group col-xs-6"  style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                                    <b>Patient Name: </b><?php echo $invoice->name; ?><?php echo " [ID" . $invoice->patient_id . "]"; ?>
                                </div>
                                <div class="form-group col-xs-3"  style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                                    <b>Age: </b><?php echo $invoice->age; ?>
                                </div>
                                <div class="form-group col-xs-3"  style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                                    <b>Mobile: </b><?php echo $invoice->mobile; ?>
                                </div>
                                <div class="form-group col-xs-4"  style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                                    <b>Surgeon Name: </b><?php echo $invoice->doctor_name; ?>
                                </div>
                                <div class="form-group col-xs-4"  style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                                    <b>Anesthesia: </b><?php echo $invoice->anesthesia; ?>
                                </div>
                                <div class="form-group col-xs-4"  style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                                    <b>Operation Name: </b><?php echo $invoice->operation_name; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-md-3 col-xs-3">
                                <?php if (file_exists('./assets/img/barcode/INV' . $invoice->record_id . '.jpg')) { ?>
                                    <img src="<?php echo base_url(); ?>assets/img/barcode/<?php echo "INV" . $invoice->record_id . '.jpg'; ?>"
                                         style='height: 30px; width: 100px;'>

                                <?php } ?>
                            </div>
                            <div class="col-md-6 col-xs-6" style="text-align: center;"><b>Operation INVOICE</b></div>
                            <div class="col-md-3 col-xs-3"></div>
                        </div>
                        <div class="col md-12 col-xs-12" style="color: black; text-align: center;">
                            <table class="table table-bordered table-hover" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">OT Expenditure</th>
                                        <th style="text-align: right;">Price</th>
                                        <!--<th style="text-align: center;">Total Price</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $total_expenditure = 0; 
                                        foreach ($equipments as $single_value) { 
                                            $total_expenditure += $single_value->new_expenditure_price;
                                    ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $single_value->expenditure_title; ?></td>
                                            <td style="text-align: right;"><?php echo $single_value->new_expenditure_price; ?></td>
                                        </tr>
                                    <?php } ?>
                                     <tr>
                                        <td style="text-align: right;" colspan="2">Total Expenditure: <?php echo $total_expenditure; ?></td>

                                    </tr>
                                     <tr>
                                        <td style="text-align: right;" colspan="2">Operation Price: <?php echo $invoice->operation_price; ?></td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: right;" colspan="2">Total Price: <?php echo $invoice->total_price; ?></td>

                                    </tr>
                                    <tr>
                                        <td style="text-align: right;" colspan="2">Discount: <?php echo $invoice->discount; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right;" colspan="2">Sub Total: <?php echo $invoice->sub_total; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right;" colspan="2">Paid: <?php echo $invoice->payable_amount; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right;" colspan="2">Due: <?php echo $invoice->due; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row" style="margin-left: 15px;">
                            <div style="float: left; margin-top: 40px;">
                                <p>-----------------------------</p>
                                <p>Patient Signature</p>
                            </div>

                            <div style="float: right; margin-top: 40px;">
                                <p>----------------------------</p>
                                <p>Authorized Signature</p>
                            </div>
                        </div>
                        <!--                            <div class="row">
                                                        <div style="text-align: center;">
                                                            <p><b style="color: red">**</b>Warranty can not be availed if the product is broken, burned or
                                                                damaged by electric short-circuit.</p>
                                                        </div>
                                                    </div>-->
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
        /*        @page {
                    size: A5 portrait;
                }
                         div.divHeader {
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
        .no_print{
            display: none;
        }
        #print_button {
            display: none;
        }
        #space_id{
            display: none;
        }
        /*        div.divFooter {
        
                    position: fixed;
                    bottom: 0;
                }
                div.divHeader {
                    position: fixed;
                    top: 0;
                }
                #patient_info{
                    margin-top: 120px;
                }*/
        /*        #footer_space{
                    margin-bottom: 50px;
                }*/
    }
    /*    div.divFooter {
            width: 100%;
            bottom: 0;
        }
        div.divHeader {
            width: 100%;
            top: 0;
        }*/
    table.table-bordered{
        background: #e3fff1 !important;
        border: grey 1px solid !important;
        color: black;
        font-size: 15px;
    }
    table.table-bordered > thead > tr > th{
        background: #e3fff1 !important;
        padding: 2px;
        padding-bottom: 5px;
        padding-top: 5px;
        padding-left: 10px;
        margin: 0px;
        border: grey 1px solid !important;
        color: black;
        font-size: 16px;
    }
    table.table-bordered > tbody > tr > td{
        background: #e3fff1 !important;
        padding-bottom: 0px;
        padding-top: 0px;
        padding-left: 10px;
        margin: 0px;
        border: grey 1px solid !important;
        color: black;
        font-size: 15px;
    }
</style>      
