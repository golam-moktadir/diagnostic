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
                                    <?php if (file_exists('./assets/img/barcode/HAE' . $test_id . '.jpg')) { ?>
                                        <img src="<?php echo base_url(); ?>assets/img/barcode/<?php echo "HAE" . $test_id . '.jpg'; ?>"
                                             style='height: 40px; width: 70%;'>

                                    <?php } ?>
                                </div>
                                <div class="col-md-8 col-xs-8" style="text-align: center; margin: 10px;"><b style="border: 2px solid black; padding: 5px;">HAEMATOLOGICAL TEST REPORT</b></div>
                                <div class="col-md-2 col-xs-2"></div>
                            </div>
                        </h4>
                        <?php
                        if ($test_res[0]->pbf == "" && $test_res[0]->bt == "" && $test_res[0]->ct == "" && $test_res[0]->hb_cyan == "" && $test_res[0]->mp == "") {
                            ?>
                            <p style="font-size: 13px; text-align: center; color: black; font-weight: bold;">
                                Test are carried out by 3-Part Sysmex XP-100 (Japan) Full Automated Haematology Analyzer & Manually Check.
                            </p>
                        <?php } ?>
                        <div class="box-body table-responsive" style="width: 100%;color: black;">
                            <table id="purchaseList" class="table table-bordered table-hover">
                                <thead>
                                    <?php if ($test_res[0]->pbf == "") { ?>
                                        <tr style="text-align: center">
                                            <th style="text-align: left; color: red;">Test</th>
                                            <th style="text-align: center; color: red;">Result</th>
                                            <th style="text-align: center; color: red;">Reference Values</th>
                                        </tr>
                                    <?php } ?>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($test_res[0]->hemoglobin != "" || $test_res[0]->rbc_count != "" || $test_res[0]->rbc_count != "" || $test_res[0]->hct_pcv != "" ||
                                            $test_res[0]->mcv != "" || $test_res[0]->mch != "" || $test_res[0]->mchc != "" || $test_res[0]->rdw_sd != "" || $test_res[0]->rdw_cv != "") {
                                        ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left; color: #003399 !important;" colspan="3">RBC Indices</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->hemoglobin != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Haemoglobin (gm/dl)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->hemoglobin; ?> gm/dl</td>
                                            <td style="text-align: center;">11.5-17.50 gm/dl</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->rbc_count != "") { ?>
                                        <tr style="text-align: left;">
                                            <td style="text-align: left;">Red Blood Cells (Total Count)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->rbc_count; ?> x10^6 /µl</td>
                                            <td style="text-align: center;">04.04-06.13 x 10^6 /µl</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->hct_pcv != "") { ?>
                                        <tr style="text-align: left">
                                            <td style="text-align: left;">PCV/HCT</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->hct_pcv; ?> %</td>
                                            <td style="text-align: center;">37.70-53.70 %</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->mcv != "") { ?>
                                        <tr style="text-align: left">
                                            <td style="text-align: left;">MCV</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->mcv; ?> fl</td>
                                            <td style="text-align: center;">76.00-96.00 fl</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->mch != "") { ?>
                                        <tr style="text-align: left">
                                            <td style="text-align: left;">MCH</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->mch; ?> pg</td>
                                            <td style="text-align: center;">27.00-32.00 pg</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->mchc != "") { ?>
                                        <tr style="text-align: left">
                                            <td style="text-align: left;">MCHC</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->mchc; ?> g/dl</td>
                                            <td style="text-align: center;">32.00-36.00 g/dl</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->rdw_sd != "") { ?>
                                        <tr style="text-align: left">
                                            <td style="text-align: left;">RDW-SD</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->rdw_sd; ?> fl</td>
                                            <td style="text-align: center;">39-46 fl</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->rdw_cv != "") { ?>
                                        <tr style="text-align: left">
                                            <td style="text-align: left;">RDW-CV</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->rdw_cv; ?> %</td>
                                            <td style="text-align: center;">11.60-14.80 %</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->total_wbc != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left; color: #003399 !important;" colspan="3">WBC Indices</td>
                                        </tr>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">White Blood Cells (Total Count)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->total_wbc; ?> x 10^3 /µl</td>
                                            <td style="text-align: center;">4.00-11.00 x 10^3 /µl</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->total_eosinophils != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Total Circulating Eosinophils</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->total_eosinophils; ?>/cmm</td>
                                            <td style="text-align: center;">50-400/cmm</td>
                                        </tr>
                                    <?php } ?>
                                    <?php
                                    if ($test_res[0]->neutrophils != "" || $test_res[0]->lymphocytes != "" || $test_res[0]->monocytes != "" || $test_res[0]->eosinophils != "" ||
                                            $test_res[0]->basophils != "" || $test_res[0]->others_cell != "") {
                                        ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left; color: #003399 !important;" colspan="3">Differential Count (WBC)</td>
                                        </tr>
                                    <?php } ?>

                                    <?php if ($test_res[0]->neutrophils != "") { ?>
                                        <tr style="text-align: left">
                                            <td style="text-align: left;">Neutrophil%</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->neutrophils; ?>%</td>
                                            <td style="text-align: center;">40-70%</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->lymphocytes != "") { ?>
                                        <tr style="text-align: left">
                                            <td style="text-align: left;">Lymphocyte%</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->lymphocytes; ?>%</td>
                                            <td style="text-align: center;">20-45%</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->monocytes != "") { ?>
                                        <tr style="text-align: left">
                                            <td style="text-align: left;">Monocyte%</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->monocytes; ?>%</td>
                                            <td style="text-align: center;">02-10%</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->eosinophils != "") { ?>
                                        <tr style="text-align: left">
                                            <td style="text-align: left;">Eosinophil%</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->eosinophils; ?>%</td>
                                            <td style="text-align: center;">01-06%</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->basophils != "") { ?>
                                        <tr style="text-align: left">
                                            <td style="text-align: left;">Basophil%</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->basophils; ?>%</td>
                                            <td style="text-align: center;">00-01%</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->others_cell != "") { ?>
                                        <tr style="text-align: left">
                                            <td style="text-align: left;">Other's</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->others_cell; ?>%</td>
                                            <td style="text-align: center;"></td>
                                        </tr>
                                    <?php } ?>

                                    <?php
                                    if ($test_res[0]->platelet_count != "" || $test_res[0]->mpv != "" || $test_res[0]->pdw != "" || $test_res[0]->p_lcr != "" ||
                                            $test_res[0]->pct != "") {
                                        ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left; color: #003399 !important;" colspan="3">Platelet Indices</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->platelet_count != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Platelet Count (Total Count)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->platelet_count; ?> x10^3 /µl</td>
                                            <td style="text-align: center;">150-450x10^3 /µl</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->mpv != "") { ?>
                                        <tr style="text-align: left">
                                            <td style="text-align: left;">MPV</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->mpv; ?> fl</td>
                                            <td style="text-align: center;">9.40-12.40 fl</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->pdw != "") { ?>
                                        <tr style="text-align: left">
                                            <td style="text-align: left;">PDW</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->pdw; ?> fl</td>
                                            <td style="text-align: center;">9.0-14.0 fl</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->p_lcr != "") { ?>
                                        <tr style="text-align: left">
                                            <td style="text-align: left;">P-LCR</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->p_lcr; ?>%</td>
                                            <td style="text-align: center;">13.0-43.0 %</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->pct != "") { ?>
                                        <tr style="text-align: left">
                                            <td style="text-align: left;">PCT</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->pct; ?>%</td>
                                            <td style="text-align: center;">13.0-43.0 %</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->esr != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Erythrocyte Sedimentation Rate (ESR)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->esr; ?> mm in 1st hour</td>
                                            <td style="text-align: center;">00-20 mm in 1st hour</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->mp != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Malaria Parasite (MP)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->mp; ?> </td>
                                            <td style="text-align: center;"></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->bt != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Bleeding Time(BT)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->bt; ?> minutes</td>
                                            <td style="text-align: center;">01-07 minutes</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->ct != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Clotting Time(CT)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->ct; ?> minutes</td>
                                            <td style="text-align: center;">05-10 minutes</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->hb_cyan != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Haemoglobin(Hb%)(Cyanmethaemoglobin method)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->hb_cyan; ?> gm/dl</td>
                                            <td style="text-align: center;">M:14.0-18.0, F:12.0-16.0 gm/dl</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->pbf != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: center;" colspan="3"><p style="font-size: 20px; font-weight: bold;">PBF:<br><?php echo nl2br($test_res[0]->pbf); ?></p></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>


                        <?php if ($test_res[0]->pbf == "" && $test_res[0]->bt == "" && $test_res[0]->ct == "" && $test_res[0]->hb_cyan == "") { ?>
                            <div class="row">
                                <div class="col-md-10 col-xs-10" style="font-weight: bold; padding-left: 30px;">
                                    <b>Note: Test conducted on EDTA whole blood.</b>
                                </div>
                            </div>
                        <?php } ?>

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
