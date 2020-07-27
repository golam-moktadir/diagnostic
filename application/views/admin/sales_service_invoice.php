<aside>
    <section class="content" style="padding-top: 0px; margin-top: 0px;">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div id="invoice">
                    <div style="width: 100%; color: black;">
                        <div class="row">
                            <div class="col-xs-12" style="color: black; text-align: center;">
                                <img src="<?php echo base_url(); ?>assets/img/banner.jpg"
                                     alt="Logo" width="50%" height="80px" style="border-radius: 15px;">
                                <!--<h3 style="text-align: center;">New Popular Hospital</h3>-->
                                <h4 style="text-align: center;"><u>Sales Service Invoice</u></h4>
                            </div>
<!--                            <div class="col-xs-12" style="color: black; text-align: center;">
                                <p style="color: #066; text-align: center; font-size: 22px;"><u>Sales Invoice</u></p>
                            </div>-->
                            <div class="col-xs-12" style="color: black; text-align: center;">
                                <button id="print_button" title="Click to Print" type="button" style="float: left;"
                                        onClick="window.print();" class="btn btn-flat btn-warning">Print
                                </button>
                            </div>
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Patient ID:</b> <?php echo $patient_id; ?>
                            </div>
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Patient Name:</b> <?php echo $patient_name; ?>
                            </div>
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Age:</b> <?php echo $age; ?>
                            </div>
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Mobile:</b> <?php echo $mobile; ?>
                            </div>
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Doctor Name:</b> <?php echo $doctor_name; ?>
                            </div>
                            <div class="form-group col-xs-4 col-xs-12"><b>
                                    Date:</b> <?php echo $date; ?>
                            </div>
<!--                                <p style="text-align:right; color: black; font-size: 18px; font-family: 'Lucida Grande'">
                                    <b>Sold By:</b> <?php echo $sold_by; ?>
                                </p>-->
                            </div>
                            <div class="col-xs-12" style="color: black; text-align: center;">
                                <table class="table table-bordered table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Service Names</th>
                                            <th style="text-align: center;">Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td style="text-align: center;"><?php echo $test_collection; ?></td>
                                                <td style="text-align: right;"><?php echo $amount; ?></td>
                                            </tr>
                                        <tr>
                                            <td style="text-align: right;" colspan="1">Discount:</b> <?php echo $discount; ?></td>
                                            <td style="text-align: right;" colspan="1">Sub Total:</b> <?php echo $sub_total; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: right;" colspan="1">Paid:</b> <?php echo $pay; ?></td>
                                            <td style="text-align: right;" colspan="1">Due: <?php echo $due; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row" style="margin-top: 75px; margin-left: 15px;">
                                <div style="float: left;">
                                    <p>-----------------------------</p>
                                    <p>Customer Signature</p>
                                </div>

                                <div style="float: right;">
                                    <p>--------------------------------</p>
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
                </div>
            </section>
        </div>
    </section>
</aside>

<style>
    @media print {
        a[href]:after {
            content: none !important;
        }

        #print_button {
            display: none;
        }
    }
</style> 