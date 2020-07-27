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
                                    <?php if (file_exists('./assets/img/barcode/URI' . $test_id . '.jpg')) { ?>
                                        <img src="<?php echo base_url(); ?>assets/img/barcode/<?php echo "URI" . $test_id . '.jpg'; ?>"
                                             style='height: 40px; width: 70%;'>

                                    <?php } ?>
                                </div>
                                <div class="col-md-8 col-xs-8" style="text-align: center; margin: 10px;"><b style="border: 2px solid black; padding: 5px;">URINE EXAMINATION REPORT</b></div>
                                <div class="col-md-2 col-xs-2"></div>
                            </div>
                        </h4>
                        <?php if ($test_res[0]->pregnancy == "") { ?>
                            <h6 style="text-align: center; color: black; font-weight: bold;">
                                Test are carried out by UroMeter 720™(Korea) Automated Urine Analyzer & Manually Check .
                            </h6>
                        <?php } ?>
                        <div class="box-body table-responsive" style="width: 100%;color: black;">
                            <table id="purchaseList" class="table table-bordered table-hover">
                                <thead>
                                    <tr style="text-align: center">
                                        <?php if ($test_res[0]->pregnancy == "") { ?>
                                            <th style="text-align: center;">Test Name (Methodology) </th>
                                            <th style="text-align: center;">Result</th>
                                            <th style="text-align: center;">Biological Reference Interval</th>
                                        <?php } else { ?>
                                            <th style="text-align: center;">Investigation</th>
                                            <th style="text-align: center;">Result</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($test_res[0]->pregnancy == "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left; color: #003399 !important;" colspan="3">Physical Examination</td>
                                        </tr>
                                    <?php } ?>

                                    <?php if ($test_res[0]->Colour != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Colour</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Colour; ?></td>
                                            <td style="text-align: center;">Straw, Pale Yellow</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Appearance != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Appearance</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Appearance; ?></td>
                                            <td style="text-align: center;">Clear, Slight Hazy</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Sediment != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Sediment</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Sediment; ?></td>
                                            <td style="text-align: center;">Absent</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Specific_gravity != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Specific gravity</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Specific_gravity; ?></td>
                                            <td style="text-align: center;">1.005-1.025</td>
                                        </tr>
                                    <?php } ?>

                                    <?php if ($test_res[0]->pregnancy == "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left; color: #003399 !important;" colspan="3">Chemical Examination</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->PH != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">PH</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->PH; ?></td>
                                            <td style="text-align: center;">4.8-7.4</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Protein != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Protein (Albumin)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Protein; ?></td>
                                            <td style="text-align: center;">Absent</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Reducing_Substance != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Reducing Substance (Sugar)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Reducing_Substance; ?></td>
                                            <td style="text-align: center;">Absent</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Ex_Phosphate != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Ex. Phosphate</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Ex_Phosphate; ?></td>
                                            <td style="text-align: center;">Absent</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Ketones != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Ketones</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Ketones; ?></td>
                                            <td style="text-align: center;">Negative or <20.0 mg/dl</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Bilirubin != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Bilirubin</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Bilirubin; ?></td>
                                            <td style="text-align: center;">Negative</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Urobilinogen != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Urobilinogen</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Urobilinogen; ?></td>
                                            <td style="text-align: center;">Normal(0.5-1.0 mg/dl)</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Nitrate != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Nitrate</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Nitrate; ?></td>
                                            <td style="text-align: center;">Negative</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Blood != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Blood</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Blood; ?></td>
                                            <td style="text-align: center;">Negative</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Leukocyte != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Leukocyte</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Leukocyte; ?></td>
                                            <td style="text-align: center;">Negative</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->pregnancy == "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left; color: #003399 !important;" colspan="3">Microscopic Examination</td>
                                        </tr>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left; color: #003399 !important;" colspan="3">Cells/HPF</td>
                                        </tr>
                                    <?php } ?>

                                    <?php if ($test_res[0]->Epithelial_Cell != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Epithelial Cell</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Epithelial_Cell; ?></td>
                                            <td style="text-align: center;">02-05/HPF</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Pus_Cell != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Pus Cell</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Pus_Cell; ?></td>
                                            <td style="text-align: center;">01-03/HPF</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->RBC != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">RBC (HPF)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->RBC; ?></td>
                                            <td style="text-align: center;">00-02/HPF</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->pregnancy == "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left; color: #003399 !important;" colspan="3">Casts/LPF</td>
                                        </tr>
                                    <?php } ?>

                                    <?php if ($test_res[0]->Hyaline != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Hyaline</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Hyaline; ?></td>
                                            <td style="text-align: center;">00-05/LPF</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Granular != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Granular</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Granular; ?></td>
                                            <td style="text-align: center;">Absent/LPF</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->WBC != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">WBC</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->WBC; ?></td>
                                            <td style="text-align: center;">Absent/LPF</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->RBC_cast != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">RBC (LPF)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->RBC_cast; ?></td>
                                            <td style="text-align: center;">Absent/LPF</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->pregnancy == "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left; color: #003399 !important;" colspan="3">Crystals/LPF</td>
                                        </tr>
                                    <?php } ?>

                                    <?php if ($test_res[0]->Calcium_Oxalate != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Calcium_Oxalate</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Calcium_Oxalate; ?></td>
                                            <td style="text-align: center;">Absent/LPF</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Amor_Phosphate != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Amor Phosphate</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Amor_Phosphate; ?></td>
                                            <td style="text-align: center;">Absent/LPF</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Triple_Phosphate != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Triple Phosphate</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Triple_Phosphate; ?></td>
                                            <td style="text-align: center;">Occasionally Few/LPF</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Uric_Acid != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Uric Acid</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Uric_Acid; ?></td>
                                            <td style="text-align: center;">Absent/LPF</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Photocoagulation != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Heat Coagulation Test (HCT)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Photocoagulation; ?></td>
                                            <td style="text-align: center;"></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->pregnancy != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Pregnancy Test</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->pregnancy; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!--                        <div class="row"  id="footer_space">
                                                    <div class="col-md-10 col-xs-10" style="font-weight: bold;">
                                                        <b>Note: <?php // echo $note;             ?></b>
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
