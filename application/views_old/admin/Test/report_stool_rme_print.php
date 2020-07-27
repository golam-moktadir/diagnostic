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
                                    <?php if (file_exists('./assets/img/barcode/STO' . $test_id . '.jpg')) { ?>
                                        <img src="<?php echo base_url(); ?>assets/img/barcode/<?php echo "STO" . $test_id . '.jpg'; ?>"
                                              style='height: 40px; width: 70%;'>

                                    <?php } ?>
                                </div>
                                <div class="col-md-8 col-xs-8" style="text-align: center; margin: 10px;"><b style="border: 2px solid black; padding: 5px;">STOOL EXAMINATION REPORT</b></div>
                                <div class="col-md-2 col-xs-2"></div>
                            </div>
                        </h4>
                        <div class="box-body table-responsive" style="width: 100%;color: black;">
                            <table id="purchaseList" class="table table-bordered table-hover">
<!--                                <thead>
                                    <tr style="text-align: center">
                                        <th style="text-align: center;">Test</th>
                                        <th style="text-align: center;">Result</th>
                                        <th style="text-align: center;">Reference Values</th>
                                    </tr>
                                </thead>-->
                                <tbody>
                                    <tr style="text-align: left; font-weight: bolder;">
                                        <td style="text-align: center; color: #003399 !important;" colspan="2">Physical Examination</td>
                                    </tr>
                                    <?php if ($test_res[0]->color != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Color</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->color; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->consistency != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Consistency</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->consistency; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->blood != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Blood</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->blood; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->mucus != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Mucus</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->mucus; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->worm != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Worm</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->worm; ?></td>
                                        </tr>
                                    <?php } ?>


                                    <tr style="text-align: left; font-weight: bolder;">
                                        <td style="text-align: left; color: #003399 !important;" colspan="2">Chemical Examination</td>
                                    </tr>

                                    <?php if ($test_res[0]->reaction != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Reaction</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->reaction; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->reducing_substance != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Reducing Substance (R/S)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->reducing_substance; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->occult_blood != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Occult Blood Test (OBT)</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->occult_blood; ?></td>
                                        </tr>
                                    <?php } ?>

                                    <tr style="text-align: left; font-weight: bolder;">
                                        <td style="text-align: left; color: #003399 !important;" colspan="2">Microscopic Examination</td>
                                    </tr>
                                    <tr style="text-align: left; font-weight: bolder;">
                                        <td style="text-align: left; color: #003399 !important;" colspan="2">Ova of </td>
                                    </tr>
                                    <?php if ($test_res[0]->ascaris != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Ascaris Lumbricoides</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->ascaris; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->ankylostoma != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Ankylostoma Duodenale </td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->ankylostoma; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->trichuris != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Trichuris Trichura</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->trichuris; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr style="text-align: left; font-weight: bolder;">
                                        <td style="text-align: left; color: #003399 !important;" colspan="2">Cyst  & Trophozoite of Protozoa</td>
                                    </tr>
                                    <?php if ($test_res[0]->giardia != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Giardia</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->giardia; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->e_histolytica != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">E.Histolytica</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->e_histolytica; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->e_coli != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">E.Coli</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->e_coli; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr style="text-align: left; font-weight: bolder;">
                                        <td style="text-align: left; color: #003399 !important;" colspan="2">Others</td>
                                    </tr>

                                    <?php if ($test_res[0]->vegetable_cells != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Vegetable Cells</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->vegetable_cells; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->epithelial_cells != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Epithelial Cells</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->epithelial_cells; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->pus_cells != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Muscle Fiber</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->muscle_cells; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->RBC != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">RBC</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->RBC; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->fat_globules != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">FAT Globules</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->fat_globules; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->pus_cells != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Pus Cells</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->muscle_cells; ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($test_res[0]->starch_granules != "") { ?>
                                        <tr style="text-align: left; font-weight: bolder;">
                                            <td style="text-align: left;">Starch</td>
                                            <td style="text-align: center;"><?php echo $test_res[0]->starch_granules; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!--                        <div class="row"  id="footer_space">
                                                    <div class="col-md-10 col-xs-10" style="font-weight: bold;">
                                                        <b>Note: <?php // echo $note;          ?></b>
                                                    </div>
                                                </div>-->
                        <!--<div class="row"  id="footer_space" style="padding : 30px;">
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
