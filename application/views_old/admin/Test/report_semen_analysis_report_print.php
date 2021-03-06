<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box-header"  style="color: black; text-align: center;">
                    <p style="text-align: left;">
                        <button id="print_button" title="Click to Print" type="button" 
                                onClick="window.print()" class="btn btn-flat btn-warning">Print</button>
                        <a href="<?php echo base_url(); ?>Show_form/test_result/main" id="print_button">
                            <button class="btn btn-danger waves-effect waves-light">
                                <i class="fa fa-window-close-o"></i>
                            </button> 
                        </a>
                    </p>
                </div>
                <div class="divHeader"  style="color: black; text-align: center; margin: 0px; padding: 0px;">
                    <img src="<?php echo base_url(); ?>assets/img/header.png"
                         alt="Logo" width="100%" height="120px">
                </div>
                <!--<h3 style="text-align: center;">New Popular Hospital</h3>-->

                <div id="patient_info">
                    <div class="box-body">
                       <div class="container" style="border: 1px solid black; margin: 2px; padding-top: 10px; padding-bottom: 10px; border-radius: 10px;
                             background: #d1ffe8 !important;font-family: Arial narrow !important; width: 100%;">
                            <div class="row">
                                <div class="form-group col-md-4 col-xs-4" style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                                    <b>ID No: </b><?php echo $test_id; ?>
                                </div>
                                <div class="form-group col-md-4 col-xs-4" style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                                    <b>Collection Date: </b><?php echo $test_res[0]->date; ?>
                                </div>
                                <div class="form-group col-md-4 col-xs-4" style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                                    <b>Reporting Date: </b><?php echo $test_res[0]->report_date; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 col-xs-4" style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                                    <b>Patient Name: </b><?php echo $test_res[0]->patient_name . " [" . $test_res[0]->patient_id . "]"; ?>
                                </div>
                                <div class="form-group col-md-4 col-xs-4" style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                                    <b>Age: </b><?php echo $test_res[0]->age; ?>
                                </div>
                                <div class="form-group col-md-4 col-xs-4" style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                                    <b>Sex: </b><?php echo $test_res[0]->sex; ?>
                                </div>
                            </div>
                            <div class="row">
<!--                                <div class="form-group col-md-4 col-xs-" style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                                    <b>Test Name: </b><?php echo $test_name; ?>
                                </div>-->
                                <div class="form-group col-md-8 col-xs-8" style="color: black !important; font-size: 17px; padding: 0px 5px 0px 5px; margin: 0px;">
                                    <b>Refd. By: </b><?php echo $test_res[0]->referenced_by; ?>
                                </div>
                            </div>
                        </div>
                        <h4>
                            <div class="row">
                                <div class="col-md-2 col-xs-2">
                                    <?php if (file_exists('./assets/img/barcode/SEM' . $test_id . '.jpg')) { ?>
                                        <img src="<?php echo base_url(); ?>assets/img/barcode/<?php echo "SEM" . $test_id . '.jpg'; ?>"
                                              style='height: 40px; width: 70%;'>

                                    <?php } ?>
                                </div>
                                <div class="col-md-8 col-xs-8" style="text-align: center; margin: 10px;"><b style="border: 2px solid black; padding: 5px;">SEMEN ANALYSIS REPORT</b></div>
                                <div class="col-md-2 col-xs-2"></div>
                            </div>
                        </h4>
                        <p style="font-size: 16px; font-weight: bold;"><i>Sample Collection: <?php echo $test_res[0]->collection_place; ?></i></p>
                        <p style="font-size: 16px; font-weight: bold;"><i>Time of ejaculation: <?php echo $test_res[0]->ejaculation_time; ?></i></p>
                        <p style="font-size: 16px; font-weight: bold;"><i>Time of examination: <?php echo $test_res[0]->examination_time; ?></i></p>
                        <p style="font-size: 16px; font-weight: bold;"><i>Period of abstinence: <?php echo $test_res[0]->abstinence_period; ?></i></p>
                        <div class="box-body table-responsive" style="width: 100%;color: black;">
                            <table id="purchaseList" class="table table-bordered table-hover">
                                <thead>
                                    <tr style="text-align: center">
                                        <th style="text-align: left;">Investigation</th>
                                        <th style="text-align: left;">Result</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align: center; font-weight: bolder;">
                                        <td style="text-align: left;">Amount</td>
                                        <td style="text-align: center;"><?php echo $test_res[0]->Amount; ?></td>
                                    </tr>
                                    <tr style="text-align: center; font-weight: bolder;">
                                        <td style="text-align: left;">Colour</td>
                                        <td style="text-align: center;"><?php echo $test_res[0]->Colour; ?></td>
                                    </tr>
                                    <tr style="text-align: center; font-weight: bolder;">
                                        <td style="text-align: left;">Viscosity</td>
                                        <td style="text-align: center;"><?php echo $test_res[0]->Viscosity; ?></td>
                                    </tr>
                                    <tr style="text-align: center; font-weight: bolder;">
                                        <td style="text-align: left;">TC of Sperm</td>
                                        <td style="text-align: center;"><?php echo $test_res[0]->TC_of_Sperm; ?></td>
                                    </tr>
                                    <tr style="text-align: center; font-weight: bolder;">
                                        <td style="text-align: left;">Active Motile</td>
                                        <td style="text-align: center;"><?php echo $test_res[0]->Active_Motile; ?></td>
                                    </tr>
                                    <tr style="text-align: center; font-weight: bolder;">
                                        <td style="text-align: left;">Weakly Motile</td>
                                        <td style="text-align: center;"><?php echo $test_res[0]->Weakly_Motile; ?></td>
                                    </tr>
                                    <tr style="text-align: center; font-weight: bolder;">
                                        <td style="text-align: left;">Non Motile</td>
                                        <td style="text-align: center;"><?php echo $test_res[0]->Non_Motile; ?></td>
                                    </tr>
                                    <tr style="text-align: center; font-weight: bolder;">
                                        <td style="text-align: left;">Morphologically Normal</td>
                                        <td style="text-align: center;"><?php echo $test_res[0]->Morphologically_Normal; ?></td>
                                    </tr>
                                    <tr style="text-align: center; font-weight: bolder;">
                                        <td style="text-align: left;">Morphologically Abnormal</td>
                                        <td style="text-align: center;"><?php echo $test_res[0]->Morphologically_Abnormal; ?></td>
                                    </tr>
                                    <tr style="text-align: center; font-weight: bolder;">
                                        <td style="text-align: left;">Pus Cell</td>
                                        <td style="text-align: center;"><?php echo $test_res[0]->Pus_Cell; ?></td>
                                    </tr>
                                    <tr style="text-align: center; font-weight: bolder;">
                                        <td style="text-align: left;">Epithelial Cell</td>
                                        <td style="text-align: center;"><?php echo $test_res[0]->Epithelial_Cell; ?></td>
                                    </tr>
                                    <tr style="text-align: center; font-weight: bolder;">
                                        <td style="text-align: left;">RBC</td>
                                        <td style="text-align: center;"><?php echo $test_res[0]->RBC; ?></td>
                                    </tr>
                                    <tr style="text-align: center; font-weight: bolder;">
                                        <td style="text-align: left;">Fructose</td>
                                        <td style="text-align: center;"><?php echo $test_res[0]->Fructose; ?></td>
                                    </tr>
                                </tbody> 
                            </table>
                        </div>
                        <!--<div class="row"  id="footer_space" style="padding: 30px;">
                            <div class="col-xs-6" style="border: none; padding: 10px; padding-top: 20px; text-align: left; font-weight: bold;">
                                <p style="color: black; padding: 0; margin: 0px; font-weight: bold;">Signature of Medical Technologist</p>
<!--                                <p style="color: black; padding: 0; margin: 0px; font-weight: bold;">Md. Habibur Rahman (Hizal)</p>
                                <p style="color: black; padding: 0; margin: 0px; font-weight: bold;">Medical Technologist (Lab. Medicine)</p>-->
                            </div>
                            <!--<div class="col-xs-6" style="border: none; padding: 10px; padding-top: 20px; text-align: right; font-weight: bold;">
                                <p style="color: black; padding: 0; margin: 0px; font-weight: bold;">Signature of Pathologist </p>
<!--                                <p style="color: black; padding: 0; margin: 0px; font-weight: bold;">Bidhan krishna Samanta</p>
                                <p style="color: black; padding: 0; margin: 0px; font-weight: bold;">Diploma in Medical Technology (Lab. Medicine)</p>
                                <p style="color: black; padding: 0; margin: 0px; font-weight: bold;">Trained in Safe Blood Transfusion(DMCH)</p>
                                <p style="color: black; padding: 0; margin: 0px; font-weight: bold;">Medical Technologist (Lab. Medicine)</p>
                                <p style="color: black; padding: 0; margin: 0px; font-weight: bold;">Upazila Health Complex, Tetulia, Panchagarh</p>
                                <p style="color: black; padding: 0; margin: 0px; font-weight: bold;">SMF- Reg. no: 6686</p>-->
                            </div>

                        </div>
                    </div>
                </div>
                <div class="divFooter"  style="color: black; text-align: center; margin: 0px; padding: 0px;">
                    <img src="<?php echo base_url(); ?>assets/img/footer.png"
                         alt="Logo" width="100%" height="60px">
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
            size: A4;
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
        #space_id{
            display: none;
        }
        div.divFooter {
            display: none;
            position: fixed;
            bottom: 0;
        }
        div.divHeader {
            display: none;
            position: fixed;
            top: 0;
        }
        #patient_info{
            margin-top: 70px;
        }
        #footer_space{
            margin-top: 70px;
        }
    }
    div.divFooter {
        width: 100%;
        bottom: 0;
        display: none;
    }
    div.divHeader {
        width: 100%;
        top: 0;
        display: none;
    }
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
