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
                            <a href="<?php echo base_url().'admission/operation-invoice' ?>">
                                <button class="btn btn-danger waves-effect waves-light">
                                    <i class="fa fa-window-close-o"></i>
                                </button> 
                            </a>
                        </div>
                        <div style="color: black; text-align: center; margin: 0px; padding: 0px; padding-top: 20px; border-radius: 10px !important;">
                            <p style="font-weight: bold; padding: 0px; margin:0px; font-size: 18px;">GREEN PATHOLOGY COMPLEX</p>
                            <p style="font-weight: bold; padding: 0px; margin:0px; font-size: 16px;">Mirpur-1, Dhaka-1216.</p>
                            <p style="font-weight: bold; padding: 0px; margin:0px;font-size: 16px;">Mobile: 01619180956, 01719180956</p>
                        </div>
                        <div class="container" style="border: 1px solid #c2c4c3; margin: 2px; padding-top: 10px; border-radius: 10px; color: white !important;
                             background: #d1ffe8 !important; font-family: Arial narrow !important; width: 100%;">
                            <div class="row">
                                <div class="form-group col-xs-6"  style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                                    <b>Invoice No: </b><?php echo $invoice->record_id ; ?>
                                </div>
                                <div class="form-group col-xs-3"  style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                                    <b>Admission Date: </b><?php echo $invoice->admission_date; ?>
                                </div>
                                <div class="form-group col-xs-3"  style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                                    <b>Operation Date: </b><?php echo $invoice->operation_date; ?>
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
                                <div class="form-group col-xs-12"  style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                                    <b>Surgeon Name: </b><?php echo $invoice->doctor_name; ?>
                                </div>
                                <div class="form-group col-xs-12"  style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                                    <b>Anesthesia: </b><?php echo $invoice->anesthesia; ?>
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
                            <div class="col-md-7">
                              <h5 class="text-center text-success">Patient Operation Invoice</h5>
                            </div>
                        </div>
                        <div class="col md-12 col-xs-12" style="color: black;">
                            <table class="table table-bordered table-hover" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Operation Name</th>
                                        <th style="text-align: right;">Price</th>
                                        <!--<th style="text-align: center;">Total Price</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $invoice->operation_name ?></td>
                                        <td style="text-align: right;"><?php echo $invoice->operation_price ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan='2' style="text-align: right;"><b>Paid Amount : </b><?php echo $invoice->payable_amount ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  colspan='2' style="text-align: right;">
                                            <b>Discount : </b><?php echo $invoice->discount ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan='2' style="text-align: right;">
                                            <b>Advance : </b><?php echo $invoice->advance_fee ?>
                                        </td>
                                    </tr>
                                        <td colspan="2" style="text-align: right;">
                                            <b>Due : </b><?php echo $invoice->due ?>
                                        </td>
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
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>     
