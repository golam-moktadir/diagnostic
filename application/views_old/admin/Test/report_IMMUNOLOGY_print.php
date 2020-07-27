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
                                    <?php if (file_exists('./assets/img/barcode/IMM' . $test_id . '.jpg')) { ?>
                                        <img src="<?php echo base_url(); ?>assets/img/barcode/<?php echo "IMM" . $test_id . '.jpg'; ?>"
                                             style='height: 40px; width: 70%;'>

                                    <?php } ?>
                                </div>
                                <div class="col-md-8 col-xs-8" style="text-align: center; margin: 10px;"><b style="border: 2px solid black; padding: 5px;">IMMUNOLOGICAL TEST REPORT</b></div>
                                <div class="col-md-2 col-xs-2"></div>
                            </div>
                        </h4>
                        <h6 style="text-align: center; color: black; font-weight: bold;">
                            <i>(All the estimations are carried out by Getein-1100 Immunofluorescence Analyzer)</i>
                        </h6>
                        <div class="box-body table-responsive" style="width: 100%;color: black;">
                            <table id="purchaseList" class="table table-bordered table-hover">
                                <thead>
                                    <tr style="text-align: center">
                                        <th style="text-align: center;">Test</th>
                                        <th style="text-align: center;">Result</th>
                                        <th style="text-align: center;">Reference Values</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($test_res[0]->HbA1c != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">HbA1c</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->HbA1c; ?> %</td>
                                            <td style="text-align: center;">4.40-6.40%</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->TSH != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">TSH</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->TSH; ?> µIU/ml</td>
                                            <td style="text-align: center;">0.47-5.01 µIU/ml<br>Newborns: 01-25.0 µIU/ml</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->T4 != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">T4</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->T4; ?> µIU/ml</td>
                                            <td style="text-align: center;">0.47-5.01 µIU/ml<br>Newborns: 01-25.0 µIU/ml</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->T3 != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">T3</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->T3; ?> µIU/ml</td>
                                            <td style="text-align: center;">0.47-5.01 µIU/ml<br>Newborns: 01-25.0 µIU/ml</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Troponin_I != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Troponin I</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Troponin_I; ?> ng/ml</td>
                                            <td style="text-align: center;"><0.10 ng/ml</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->CRP != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">C-Reactive Protein (CRP)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->CRP; ?></td>
                                            <td style="text-align: center;"></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->FT3 != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">FT3</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->FT3; ?></td>
                                            <td style="text-align: center;"></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->FT4 != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">FT4</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->FT4; ?></td>
                                            <td style="text-align: center;"></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->se_ige != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Serum IgE</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->se_ige; ?></td>
                                            <td style="text-align: center;"></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->se_igg != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Serum IgG</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->se_igg; ?></td>
                                            <td style="text-align: center;"></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->se_prolectin != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Serum Prolectin</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->se_prolectin; ?></td>
                                            <td style="text-align: center;"></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->psa != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">PSA</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->psa; ?></td>
                                            <td style="text-align: center;"></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->testosterone != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Testosterone</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->testosterone; ?></td>
                                            <td style="text-align: center;"></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->hcg != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Beta HCG</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->hcg; ?></td>
                                            <td style="text-align: center;"></td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                        <!--                        <div class="row"  id="footer_space">
                                                    <div class="col-md-10 col-xs-10" style="font-weight: bold;">
                                                        <b>Note: <?php // echo $note;           ?></b>
                                                    </div>
                                                </div>-->
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
