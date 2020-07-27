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
                                    <?php if (file_exists('./assets/img/barcode/BIO' . $test_id . '.jpg')) { ?>
                                        <img src="<?php echo base_url(); ?>assets/img/barcode/<?php echo "BIO" . $test_id . '.jpg'; ?>"
                                             style='height: 40px; width: 70%;'>

                                    <?php } ?>
                                </div>
                                <div class="col-md-8 col-xs-8" style="text-align: center; margin: 10px;"><b style="border: 2px solid black; padding: 5px;">BIOCHEMICAL TEST REPORT</b></div>
                                <div class="col-md-2 col-xs-2"></div>
                            </div>
                        </h4>
                        <?php if ($test_res[0]->sodium != "" || $test_res[0]->potassium != "" || $test_res[0]->chloride != "") { ?>
                            <p style="text-align: center; color: black; font-weight: bold; font-size: 13px;">
                                Test Result’s are carried out by Full Auto Electrolyte Analyzer EasyLyte Plus, Medica corporation, USA.
                            </p>
                            <h6 style="text-align: center; color: black; font-weight: bold;">
                                <b style="text-align: center;"><u>Serum Electrolytes</u></b>
                            </h6>
                        <?php } elseif ($test_res[0]->hba1c != "") { ?>
                        <?php } else { ?>
                            <p style="text-align: center; color: black; font-weight: bold; font-size: 13px;">
                                Test Result’s are carried out by HumaLyzer Primus (Human GmbH. Germany) Semi Auto Analyzer.
                            </p>
                        <?php } ?>
                        <div class="box-body table-responsive" style="width: 100%;color: black;">
                            <table id="purchaseList" class="table table-bordered table-hover">
                                <thead>
                                    <tr style="text-align: center">
                                        <th style="text-align: left; color: red;">Test Name</th>
                                        <th style="text-align: center; color: red;">Result</th>
                                        <th style="text-align: center; color: red;">Reference Values</th>
                                    </tr>
                                </thead>
                                <tbody>
<!--                                    <tr style="text-align: left; font-weight: bolder;">
                                        <td style="text-align: center; color: #003399 !important;" colspan="3">RBC Indices</td>
                                    </tr>-->
                                    <?php if ($test_res[0]->bl_gl_fa != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Blood glucose (Fasting)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->bl_gl_fa; ?> mmol/l</td>
                                            <td style="text-align: center;">3.3-6.4 mmol/l</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->bl_gl_fa_sugar != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Corresponding urine sugar</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->bl_gl_fa_sugar; ?></td>
                                            <td style="text-align: center;">Nil</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->bl_gl_2h != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Blood glucose (Random)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->bl_gl_2h; ?> mmol/l</td>
                                            <td style="text-align: center;"><7.8 mmol/l</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->bl_gl_2h_sugar != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Blood glucose (Random) corresponding sugar</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->bl_gl_2h_sugar; ?></td>
                                            <td style="text-align: center;">Nil</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->bl_gl_1h_75 != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Blood glucose(1hour’s after 75 gm glucose)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->bl_gl_1h_75; ?> mmol/l</td>
                                            <td style="text-align: center;">7.8-11.5 mmol/l</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->bl_gl_1h_75_sugar != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Blood glucose(1hour’s after 75 gm glucose) corresponding sugar</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->bl_gl_1h_75_sugar; ?></td>
                                            <td style="text-align: center;">Nil</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->bl_gl_2h_75 != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Blood glucose(2hour’s after 75 gm glucose)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->bl_gl_2h_75; ?> mmol/l</td>
                                            <td style="text-align: center;">7.8-11.5 mmol/l</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->bl_gl_2h_75_sugar != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Blood glucose(2hour’s after 75 gm glucose) corresponding sugar</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->bl_gl_2h_75_sugar; ?></td>
                                            <td style="text-align: center;">Nil</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->se_cr != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Serum Creatinine</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->se_cr; ?> mg/dl</td>
                                            <td style="text-align: center;">0.3-1.2 mg/dl</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->se_bi != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Serum Bilirubin (Total)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->se_bi; ?> mg/dl</td>
                                            <td style="text-align: center;">0.5-1.3 mg/dl</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->se_bi_di != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Serum Bilirubin (Direct)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->se_bi_di; ?> mg/dl</td>
                                            <td style="text-align: center;">0.5-1.3 mg/dl</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->se_bi_in != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Serum Bilirubin (Indirect)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->se_bi_in; ?> mg/dl</td>
                                            <td style="text-align: center;">0.5-1.3 mg/dl</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->se_ur_ac != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Serum Uric Acid</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->se_ur_ac; ?> mg/dl</td>
                                            <td style="text-align: center;">M: 3.4-7.0, F: 2.4-6.0 mg/dl</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->se_ca != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Serum Calcium</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->se_ca; ?> mg/dl</td>
                                            <td style="text-align: center;">8.4-10.2 mg/dl</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->se_am != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Serum Amylase</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->se_am; ?> u/l</td>
                                            <td style="text-align: center;">Up to 270 u/l</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->sgpt != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">SGPT-ALT</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->sgpt; ?> u/l</td>
                                            <td style="text-align: center;">Up to 40.0 u/l</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->sopt != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">SGOT-AST</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->sopt; ?> u/l</td>
                                            <td style="text-align: center;">Up to 40.0 u/l</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->se_al_ph != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Serum Alkaline Phosphatase</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->se_al_ph; ?> u/l</td>
                                            <td style="text-align: center;">Up to 20-140 u/l</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->se_ur != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Serum Urea</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->se_ur; ?> mg/dl</td>
                                            <td style="text-align: center;">10-50 mg/dl</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->hba1c != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">HbA1c</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->hba1c; ?> %</td>
                                            <td style="text-align: center;">4.40-6.40%</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->se_ch != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Serum Cholesterol</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->se_ch; ?> mg/dl</td>
                                            <td style="text-align: center;">Up to 220 mg/dl</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->RBS != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">RBS</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->RBS; ?> mmol/l</td>
                                            <td style="text-align: center;"><7.8 mmol/l</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->tri_gl != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Triglyceride</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->tri_gl; ?> mg/dl</td>
                                            <td style="text-align: center;">Up to 200 mg/dl</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->hdl != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">HDL-Cholesterol</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->hdl; ?> mg/dl</td>
                                            <td style="text-align: center;">M:35-50 mg/dl,F:45-65 mg/dl</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->ldl != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">LDL- Cholesterol</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->ldl; ?> mg/dl</td>
                                            <td style="text-align: center;">Up to 150 mg/dl</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->OGTT != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">OGTT</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->OGTT; ?></td>
                                            <td style="text-align: center;"></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->lipid_profile != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Lipid Profile</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->lipid_profile; ?></td>
                                            <td style="text-align: center;"></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->urea_nitrogen != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Blood Urea Nitrogen</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->urea_nitrogen; ?></td>
                                            <td style="text-align: center;"></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->se_albumin != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Serum Albumin</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->se_albumin; ?></td>
                                            <td style="text-align: center;"></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->se_globulin != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Serum Globulin</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->se_globulin; ?></td>
                                            <td style="text-align: center;"></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->se_protein != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Serum Protein</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->se_protein; ?></td>
                                            <td style="text-align: center;"></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->se_lipase != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Serum Lipase</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->se_lipase; ?></td>
                                            <td style="text-align: center;"></td>
                                        </tr>
                                    <?php } ?>

                                    <?php if ($test_res[0]->sodium != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Sodium</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->sodium; ?> mmol/l</td>
                                            <td style="text-align: center;">138-148 mmol/l</td>
                                        </tr>
                                    <?php } ?>

                                    <?php if ($test_res[0]->potassium != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Potassium</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->potassium; ?> mmol/l</td>
                                            <td style="text-align: center;">3.5-5.5 mmol/l</td>
                                        </tr>
                                    <?php } ?>

                                    <?php if ($test_res[0]->chloride != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Chloride</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->chloride; ?> mmol/l</td>
                                            <td style="text-align: center;">97-107 mmol/l</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!--                        <div class="row"  id="footer_space">
                                                    <div class="col-md-10 col-xs-10" style="font-weight: bold;">
                                                        <b>Note: <?php // echo $note;              ?></b>
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
