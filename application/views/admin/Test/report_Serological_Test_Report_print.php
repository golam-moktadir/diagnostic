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
                    <div class="box-body"><div class="container" style="border: 1px solid black; margin: 2px; padding-top: 10px; padding-bottom: 10px; border-radius: 10px;
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
                                    <?php if (file_exists('./assets/img/barcode/SER' . $test_id . '.jpg')) { ?>
                                        <img src="<?php echo base_url(); ?>assets/img/barcode/<?php echo "SER" . $test_id . '.jpg'; ?>"
                                             style='height: 40px; width: 70%;'>

                                    <?php } ?>
                                </div>
                                <div class="col-md-8 col-xs-8" style="text-align: center; margin: 10px;"><b style="border: 2px solid black; padding: 5px;">SEROLOGICAL TEST REPORT</b></div>
                                <div class="col-md-2 col-xs-2"></div>
                            </div>
                        </h4>
                        <div class="box-body table-responsive" style="width: 100%;color: black;">
                            <table id="purchaseList" class="table table-bordered table-hover">
                                <thead>
                                    <tr style="text-align: center">
                                        <th style="text-align: left; color: red;">Investigation</th>
                                        <th style="text-align: center; color: red;">Result</th>
                                        <?php
                                        if ($test_res[0]->RA_Test == "" && $test_res[0]->CRP == "" && $test_res[0]->HBsAg == "" &&
                                                $test_res[0]->VDRL == "" && $test_res[0]->Blood_group == "") {
                                            ?>
                                            <th style="text-align: center; color: red;">Unit</th>
                                            <th style="text-align: center; color: red;">Reference value</th>
                                        <?php } ?>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($test_res[0]->RA_Test != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">RA_Test</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->RA_Test; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->CRP != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">CRP</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->CRP; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->HBsAg != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">HBsAg (Rapid Test)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->HBsAg; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->HBsAg_con != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">HBsAg (Confirmatory Test)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->HBsAg_con; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->VDRL != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">VDRL</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->VDRL; ?></td>
                                        </tr>
                                    <?php } ?>

                                    <?php if ($test_res[0]->TPHA != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">TPHA</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->TPHA; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Aldehyde != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Aldehyde Test</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Aldehyde; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Typhoid != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">ICT for Typhoid</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Typhoid; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->TB != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">ICT for TB</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->TB; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Failaria != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">ICT for Failaria</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Failaria; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Kala_Azar != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">ICT for Kala Azar</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Kala_Azar; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Malaria != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">ICT for Malaria</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Malaria; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->HIV != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">HIV (Screening)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->HIV; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->HCV != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Anti HCV (Screening)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->HCV; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Dengu_ns1 != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">ICT for Dengu (NS1)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Dengu_ns1; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->Dengu_igg_igm != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">ICT for Dengu (IgG & IgM)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->Dengu_igg_igm; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if (trim($test_res[0]->Widal_Test != "")) { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Widal Test</td>
                                            <td style="text-align: center;"><?php echo nl2br($test_res[0]->Widal_Test); ?></td>
                                            <td style="text-align: center;">Titre</td>
                                            <td style="text-align: center;">Up to 1:80 Titre</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->ASO_Titre != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">ASO_Titre</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->ASO_Titre; ?></td>
                                            <td style="text-align: center;">IU/ML</td>
                                            <td style="text-align: center;"><200 IU/ML</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if (trim($test_res[0]->Typhoid_Paratyphoid) != "") { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Typhoid & Paratyphoid</td>
                                            <td style="text-align: center;"><?php echo nl2br($test_res[0]->Typhoid_Paratyphoid); ?></td>
                                            <td style="text-align: center;">Titre</td>
                                            <td style="text-align: center;">Up to 1:80 Titre</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if (trim($test_res[0]->Typhus_Fever != "")) { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Typhus_Fever</td>
                                            <td style="text-align: center;"><?php echo nl2br($test_res[0]->Typhus_Fever); ?></td>
                                            <td style="text-align: center;">Titre</td>
                                            <td style="text-align: center;">Up to 1:80 Titre</td>
                                        </tr>
                                    <?php } ?>
                                    <?php if (trim($test_res[0]->Brucellosis != "")) { ?>
                                        <tr style="text-align: center; font-weight: bolder;">
                                            <td style="text-align: left;">Brucellosis</td>
                                            <td style="text-align: center;"><?php echo nl2br($test_res[0]->Brucellosis); ?></td>
                                            <td style="text-align: center;">Titre</td>
                                            <td style="text-align: center;">Up to 1:80 Titre</td>
                                        </tr>
                                    <?php } ?>
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
