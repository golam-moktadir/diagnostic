<aside >
    <section class="content">
        <section class="col-xs-12 connectedSortable">
            <div style="text-align: right; padding-right: 0px;" class="no_print">
                <button  id="print" onclick="window.print()" class="btn btn-warning waves-effect waves-light">
                    <i class="fa fa-print"></i>
                </button>
                <a href="<?php echo base_url(); ?>Show_form/consultancy/main">
                    <button class="btn btn-danger waves-effect waves-light">
                        <i class="fa fa-window-close-o"></i>
                    </button> 
                </a>
            </div>
            <div style="color: black; text-align: center; margin: 10px; padding: 0px; border-radius: 10px !important;">
 <!--                            <img src="<?php echo base_url(); ?>assets/img/banner.jpg" style="border-radius: 10px;"
                                  alt="Logo" width="300px" height="80px">-->
                <p style="font-weight: bold; padding: 0px; margin:0px; font-size: 18px;">GREEN PATHOLOGY COMPLEX</p>
                <p style="font-weight: bold; padding: 0px; margin:0px; font-size: 16px;">Mirpur-1, Dhaka-1216.</p>
                <p style="font-weight: bold; padding: 0px; margin:0px;font-size: 16px;">Mobile: 01619180956, 01719180956</p>
                <!--<p style="font-weight: bold; font-size: 18px;"><u>Customer Copy</u></p>-->
            </div>
            <?php foreach ($one_value as $single) { ?>
                <div class="container" style="border: 1px solid #c2c4c3; margin: 2px; padding-top: 10px; padding-bottom: 10px; border-radius: 10px;
                     background: #d1ffe8 !important; font-family: Arial narrow !important; width: 100%; margin-bottom: 10px;">
                    <div class="row">
                        <div class="form-group col-sm-4 col-xs-6" style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                            <b>ID No: </b><?php echo $single->patient_id; ?>
                        </div>
                        <div class="form-group col-sm-4 col-xs-6" style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                            <b>Invoice No: </b><?php echo $single->record_id; ?>
                        </div>
                        <div class="form-group col-sm-4 col-xs-6" style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                            <b>Invoice Type: </b>Consultation
                        </div>
                        <div class="form-group col-sm-4 col-xs-6" style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                            <b>Patient Name: </b><?php echo $single->patient_name; ?>
                        </div>
                        <div class="form-group col-sm-4 col-xs-6" style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                            <b>Age: </b><?php echo $single->age; ?>
                        </div>
                        <div class="form-group col-sm-4 col-xs-6" style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                            <b>Contact No: </b><?php echo $single->mobile; ?>
                        </div>
                        <div class="form-group col-sm-6 col-xs-6" style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                            <b>Date & Time: </b><?php echo $single->date . " " . date("h:i A", strtotime($single->appointment_time)); ?>
                        </div>
                    </div>
                </div>
                </div>

                <div class="row" style="margin-bottom: 5px;">
                    <div class="col-md-3 col-xs-3">
                        <?php if (file_exists('./assets/img/barcode/CONS' . $single->record_id . '.jpg')) { ?>
                            <img src="<?php echo base_url(); ?>assets/img/barcode/<?php echo "CONS" . $single->record_id . '.jpg'; ?>"
                                 style='height: 30px; width: 100px;'>

                        <?php } ?>
                    </div>
                    <div class="col-md-6 col-xs-6" style="text-align: center; font-weight: bold;"><b>Bill/Invoice</b></div>
                    <div class="col-md-3 col-xs-3"></div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 col-xs-12"style="text-align: center; font-weight: bold; padding-bottom: 0px; margin-bottom: 0px;">
                        <table id="" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Doctor Name</th>
                                    <th style="text-align: center;">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;"><?php echo $single->doctor_name . " [" . $single->designation . "]"; ?></td>
                                    <td style="text-align: center;"><?php echo $single->doctor_fee; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <table id="" class="table table-bordered table-hover">

                            <tbody>
                                <tr>
                                    <td style="text-align: right;" colspan="2">Total: <?php echo $single->doctor_fee; ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right;" colspan="2">Vat: 0.00</td>
                                </tr>
                                <tr>
                                    <td style="text-align: right;" colspan="2">Discount (0%): 0.00</td>
                                </tr>
                                <tr>
                                    <td style="text-align: right;" colspan="2">Net Amount: <?php echo $single->doctor_fee; ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right;" colspan="2">Payment Amount: <?php echo $single->doctor_fee; ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: right;" colspan="2">Due Amount: 0.00</td>
                                </tr>
                                <tr>
                                    <td style="text-align: right;" colspan="2">In Word:<?php echo $this->numbertowords->convert_number($single->doctor_fee); ?> Taka Only</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <br><br>
                <div class="row">
                    <div class="form-group col-sm-6 col-xs-6" style="text-align: center; font-weight: bold; padding-bottom: 0px; margin-bottom: 0px;">
                        <p>_______________________</p><br>
                        <p>Patient</p>
                    </div>
                    <div class="form-group col-sm-6 col-xs-6" style="text-align: center; font-weight: bold; padding-bottom: 0px; margin-bottom: 0px;">
                        <p>_______________________</p><br>
                        <p>Authority</p>
                    </div>
                </div>
            <?php } ?>
        </section>
    </section>
</aside>

<style>
    @media print {  
        :-webkit-scrollbar {
            display: none;
        }
        @page {
            size: A5 portrait;
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
        .no_print {
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
