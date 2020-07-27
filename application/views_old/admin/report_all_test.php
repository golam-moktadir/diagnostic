<aside>
    <section class="content">
        <div class="row">
            <div class="col-xs-12" style="color: black; text-align: center;">
                                <img src="<?php echo base_url(); ?>assets/img/banner.jpg"
                                     alt="Logo" width="40%" height="80px" style="border-radius: 15px;">
                            </div>
            <section class="col-xs-12 connectedSortable">
                <!--                <div class="divHeader"  style="color: black; text-align: center;">
                                        <img src="<?php echo base_url(); ?>assets/img/banner.jpg"
                                             alt="Logo" width="100%" height="80px" style="border-radius: 15px;">
                                    </div>-->
<!--                <h3 style="text-align: center;">New Popular Hospital</h3>-->
                <div class="box-header"  style="color: black; text-align: center;">
                    <p style="padding: 10px; text-align: left;"><button id="print_button" title="Click to Print" type="button" 
                                                                        onClick="window.print()" class="btn btn-flat btn-warning">Print</button></p>
                </div>
                <div style="color: black;">
                    <div class="box-body">
                        <div class="row">
                              <div class="form-group col-sm-3 col-xs-3">
                                Test ID: <?php echo $unique_id; ?>
                            </div>
                            <div class="form-group col-sm-3 col-xs-3">
                                Patient ID: <?php echo $patient_id; ?>
                            </div>
                            <div class="form-group col-sm-3 col-xs-3">
                                Patient Name: <?php echo $patient_name; ?>
                            </div>
                            <div class="form-group col-sm-3 col-xs-3">
                                Date: <?php echo $date; ?>
                            </div>
                            <div class="form-group col-sm-3 col-xs-3">
                                Age: <?php echo $age; ?>
                            </div>
                            <div class="form-group col-sm-3 col-xs-3">
                                Mobile: <?php echo $mobile; ?>
                            </div>
                            <div class="form-group col-sm-3 col-xs-3">
                                Refd. By: <?php echo $referenced_by; ?>
                            </div>
                        </div>
                        <h3 style="text-align: center;"><?php echo $report_category; ?> Report</h3>
                        <div class="box-body table-responsive" style="width: 98%;color: black;">
                            <?php if($report_category == "Haematology") { ?>
                                <table id="purchaseList" class="table table-bordered table-hover">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th style="text-align: center;">Test Name</th>
                                            <th style="text-align: center;" colspan="2">Result</th>
                                            <th style="text-align: center;" colspan="3">Reference Range</th>
                                        </tr>
                                    </thead>
                                        <!--Haematology 1st Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Haemoglobin") {
                                                ?>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">Hemoglobin</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">gm/dl</td>
                                                    <td style="text-align: center;">Men</td>
                                                    <td style="text-align: center;">13.0-18.0</td>
                                                    <th style="text-align: center;">g/dl</th>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Women</td>
                                                    <td style="text-align: center;">11.5-16.5</td>
                                                    <th style="text-align: center;">g/dl</th>
                                                </tr>
                                                 <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">At Birth</td>
                                                    <td style="text-align: center;">13.5-19.5</td>
                                                    <th style="text-align: center;">g/dl</th>
                                                </tr>
                                                 <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Up to 1 year</td>
                                                    <td style="text-align: center;">11.0-13.0</td>
                                                    <th style="text-align: center;">g/dl</th>
                                                </tr>
                                                 <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">10-12 years</td>
                                                    <td style="text-align: center;">11.5-14.5</td>
                                                    <th style="text-align: center;">g/dl</th>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    <!--Haematology Second Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "ESR (Westergren)") {
                                                ?>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">ESR (Westergren)</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">gm/dl</td>
                                                    <td style="text-align: center;">Men</td>
                                                    <td style="text-align: center;">0-10</td>
                                                    <th style="text-align: center;">mm in 1st hr</th>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Women</td>
                                                    <td style="text-align: center;">0-20</td>
                                                    <th style="text-align: center;">mm in 1st hr </th>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                     <!--Haematology 3rd Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "TC of WBC") {
                                                ?>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">TC of WBC</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">/Cmm</td>
                                                    <td style="text-align: center;">Adult:</td>
                                                    <td style="text-align: center;">4,000- 11,000</td>
                                                    <th style="text-align: center;">/Cmm</th>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">At birth:</td>
                                                    <td style="text-align: center;">10,000- 25,000</td>
                                                    <th style="text-align: center;">/Cmm</th>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">1 year:</td>
                                                    <td style="text-align: center;">6,000- 18,000</td>
                                                    <th style="text-align: center;">/Cmm</th>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">4- 7 years::</td>
                                                    <td style="text-align: center;">5,000- 15,000</td>
                                                    <th style="text-align: center;">/Cmm</th>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">8- 12 years::</td>
                                                    <td style="text-align: center;">4,500- 13,000</td>
                                                    <th style="text-align: center;">/Cmm</th>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                         <!--Haematology 4th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "DC of WBC( Neutrophil)") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">DC of WBC( Neutrophil)</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">%</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">40-75</td>
                                                    <th style="text-align: center;">%</th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!--Haematology 5th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "DC of WBC( Lymphocyte)") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">DC of WBC( Lymphocyte)</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">%</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">20- 50</td>
                                                    <th style="text-align: center;">%</th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!--Haematology 6th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "DC of WBC(Monocyte)") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">DC of WBC(Monocyte)</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">%</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">2-10</td>
                                                    <th style="text-align: center;">%</th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!--Haematology 7th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "DC of WBC(Eosinophil)") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">DC of WBC(Eosinophil)</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">%</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">1-6</td>
                                                    <th style="text-align: center;">%</th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!--Haematology 7th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "DC of WBC(Basophil)") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">DC of WBC(Basophil)</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">%</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;"><1</td>
                                                    <th style="text-align: center;">%</th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!--Haematology 7th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Haematocrit/ PCV") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">Haematocrit/ PCV</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">%</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">36-50 </td>
                                                    <th style="text-align: center;">%</th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!--Haematology 8th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "MCV") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">MCV</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">fl</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">83-101 fl </td>
                                                    <th style="text-align: center;"></th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!--Haematology 9th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "MCH") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">MCH</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">pg</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">27-32 pg</td>
                                                    <th style="text-align: center;"></th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!--Haematology 10th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "MCHC") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">MCHC</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">g/dl</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">31.5-34.5 g/dl</td>
                                                    <th style="text-align: center;"></th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!--Haematology 11th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Platelet count") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">Platelet Count</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">/Cmm</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">1,50,000- 4,50,000</td>
                                                    <th style="text-align: center;">/mm3</th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!--Haematology 12th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Circulating Eosinophils") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">Circulating Eosinophils</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">/Cmm</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">50-400</td>
                                                    <th style="text-align: center;">/Cmm</th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!--Haematology 13st Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "TC of RBC") {
                                                ?>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">TC of RBC</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5"/Cmm</td>
                                                    <td style="text-align: center;">Men</td>
                                                    <td style="text-align: center;">4.5- 5.5 Million</td>
                                                    <th style="text-align: center;">/Cmm</th>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Female</td>
                                                    <td style="text-align: center;">4.0- 5.0 Million</td>
                                                    <th style="text-align: center;">/Cmm</th>
                                                </tr>
                                                 <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Infant</td>
                                                    <td style="text-align: center;">6.0-7.0 Million</td>
                                                    <th style="text-align: center;">/Cmm</th>
                                                </tr>
                                                 <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Children</td>
                                                    <td style="text-align: center;">4.5- 5.5 Million</td>
                                                     <th style="text-align: center;">/Cmm</th>
                                                </tr>
                                                <?php } } ?>
                                    </tbody>
                                    <!--Haematology 13th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Bleeding Time(BT)") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">Bleeding Time(BT)</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <!--<td style="text-align: center;" rowspan="5">2 Minute 30 Second.</td>-->
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">1-7 Minutes</td>
                                                    <th style="text-align: center;"></th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!--Haematology 14th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Clotting Time(CT)") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">Clotting Time(CT)</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <!--<td style="text-align: center;" rowspan="5">5 Minute 30 Second.</td>-->
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">5-10 Minutes</td>
                                                    <th style="text-align: center;"></th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!--Haematology 15th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Reticulocyte Count") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">Reticulocyte Count</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <!--<td style="text-align: center;" rowspan="5">5 Minute 30 Second.</td>-->
                                                    <td style="text-align: center;">Adult</td>
                                                    <td style="text-align: center;">2-5%</td>
                                                    <th style="text-align: center;"></th>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                     <td style="text-align: center;">Child</td>
                                                    <td style="text-align: center;">2-6%</td>
                                                    <th style="text-align: center;"></th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                               <!--Haematology END Test -->
                                </table>
                                <?php
                            }
                            ?>
                        </div><!--Haematology END -->
                        
                        <div class="box-body table-responsive" style="width: 98%;color: black;">
                            <?php if($report_category == "Biochemistry") { ?>
                                <table id="purchaseList" class="table table-bordered table-hover">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th style="text-align: center;">Test Name</th>
                                            <th style="text-align: center;" colspan="2">Result</th>
                                            <th style="text-align: center;" colspan="3">Reference Range</th>
                                        </tr>
                                    </thead>
                                        <!--Biochemistry 1st Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Plasma Glucose (Fasting)") {
                                                ?>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">Plasma Glucose (Fasting)</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">mmol/ L</td>
                                                    <td style="text-align: center;">Normal:</td>
                                                    <td style="text-align: center;">3.5- <6.1</td>
                                                    <th style="text-align: center;">mmol/ L</th>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">IFG:</td>
                                                    <td style="text-align: center;">>=6.1- <7.0</td>
                                                    <th style="text-align: center;">mmol/ L</th>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Diabetes::</td>
                                                    <td style="text-align: center;">>=11.1</td>
                                                    <th style="text-align: center;">mmol/ L</th>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    <!--Biochemistry 2nd Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "CUS-Plasma glucose(2h)") {  ?>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Corresponding urine sugar</td>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">Plasma glucose(2 hrs after 75 gm glucose)</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">mmol/ L</td>
                                                    <td style="text-align: center;">Normal:</td>
                                                    <td style="text-align: center;">3.5- <7.8</td>
                                                    <th style="text-align: center;">mmol/ L</th>
                                                </tr>
                                               <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">IFG:</td>
                                                    <td style="text-align: center;">>=7.4-<11.1</td>
                                                    <th style="text-align: center;">mmol/ L</th>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Diabetes::</td>
                                                    <td style="text-align: center;">>=11.1</td>
                                                    <th style="text-align: center;">mmol/ L</th>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                     <!--Biochemistry 3rd Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Plasma Glucose(2h-ABF)") {  ?>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Corresponding urine sugar</td>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">Plasma glucose(2 hrs after 75 gm glucose)</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">mmol/ L</td>
                                                    <td style="text-align: center;">Normal:</td>
                                                    <td style="text-align: center;">3.5- <7.8</td>
                                                    <th style="text-align: center;">mmol/ L</th>
                                                </tr>
                                               <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">IFG:</td>
                                                    <td style="text-align: center;">>=7.4-<11.1</td>
                                                    <th style="text-align: center;">mmol/ L</th>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Diabetes::</td>
                                                    <td style="text-align: center;">>=11.1</td>
                                                    <th style="text-align: center;">mmol/ L</th>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                         <!--Biochemistry 4th Test Name-->
                                     <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Plasma Glucose (Random)") {
                                                ?>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Corresponding urine sugar</td>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">Plasma Glucose (Random)</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">mmol/ L</td>
                                                    <td style="text-align: center;">Normal:</td>
                                                    <td style="text-align: center;">3.5- <7.8</td>
                                                    <th style="text-align: center;">mmol/ L</th>
                                                </tr>
                                               <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">IFG:</td>
                                                    <td style="text-align: center;">>=7.4-<11.1</td>
                                                    <th style="text-align: center;">mmol/ L</th>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Diabetes::</td>
                                                    <td style="text-align: center;">>=11.1</td>
                                                    <th style="text-align: center;">mmol/ L</th>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    <!--Biochemistry 5th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "HbA1C") {
                                                ?>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Corresponding urine sugar</td>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">HbA1C:</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">4.0- 6.0</td>
                                                    <th style="text-align: center;">%</th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!--Biochemistry 6th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Total Cholesterol(Serum Lipid profile)") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">Total Cholesterol(Serum Lipid profile)</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">mg/ dL</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;"><200</td>
                                                    <th style="text-align: center;">mg/ dL</th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!--Biochemistry 7th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "LDL(Serum Lipid profile)") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">LDL(Serum Lipid profile)</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">mg/ dL</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;"><155</td>
                                                    <th style="text-align: center;">mg/ dL</th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!--Biochemistry 8th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "HDL(Serum Lipid profile)") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">HDL(Serum Lipid profile)</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">mg/ dL</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">>= 40</td>
                                                    <th style="text-align: center;">mg/ dL</th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                     <!--Biochemistry 9th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Triglyceride(Serum Lipid profile)") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">Triglyceride(Serum Lipid profile)</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">mg/ dL</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;"><150</td>
                                                    <th style="text-align: center;">mg/ dL</th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!--Biochemistry 10th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Serum protein (Total)") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">Serum protein (Total)</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">gm/ dL</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">6.0- 8.0</td>
                                                    <th style="text-align: center;">gm/ dL</th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!--Biochemistry 11th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Serum albumin") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">Serum albumin)</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">gm/ dL</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">3.81- 4.65</td>
                                                    <th style="text-align: center;">g/ dL</th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!--Biochemistry 12th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Albumin globulin ratio") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">Albumin globulin ratio</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!--Biochemistry 13th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "BUN") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">BUN</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;">mg/ dL</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">7- 21</td>
                                                    <th style="text-align: center;">mg/ dL</th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!--Biochemistry 14th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Serum Urea") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">Serum Urea</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;">mg/ dL</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">15- 40</td>
                                                    <th style="text-align: center;">mg/ dL</th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!--Biochemistry 15th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Serum Creatinine") {
                                                ?>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">Serum Creatinine</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">mg/ dL</td>
                                                    <td style="text-align: center;">Children (1- 18 yr):</td>
                                                    <td style="text-align: center;">0.2- .0.7</td>
                                                    <th style="text-align: center;">mmol/ L</th>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Adult:</td>
                                                    <td style="text-align: center;">0.7- 1.2</td>
                                                    <th style="text-align: center;">mg/ dL</th>
                                                </tr>
                                                <?php }}?>
                                    </tbody>
                                    <!-- Biochemistry 16st Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Serum Uric acid") {
                                                ?>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">Serum Uric acid</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">mg/ dL</td>
                                                    <td style="text-align: center;">Men:</td>
                                                    <td style="text-align: center;">3.5 - 7.2</td>
                                                    <th style="text-align: center;">mmol/ L</th>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Women:</td>
                                                    <td style="text-align: center;">2.6 - 6.0</td>
                                                    <th style="text-align: center;">mg/ dL</th>
                                                </tr>
                                                <?php }}?>
                                    </tbody>
                                    
                               <!--Biochemistry END Test -->
                                </table>
                                <?php
                            }
                            ?>
                        </div><!--Biochemistry END Category -->
                        
                        <div class="box-body table-responsive" style="width: 98%;color: black;">
                            <?php if($report_category == "Liver function-Biochemistry") { ?>
                                <table id="purchaseList" class="table table-bordered table-hover">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th style="text-align: center;">Test Name</th>
                                            <th style="text-align: center;" colspan="2">Result</th>
                                            <th style="text-align: center;" colspan="3">Reference Range</th>
                                        </tr>
                                    </thead>
                                        <!-- Liver function-Biochemistry 1st Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Serum Bilirubin (Total)") {
                                                ?>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">Serum Bilirubin (Total)</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">mg/ dL</td>
                                                    <td style="text-align: center;">At birth:</td>
                                                    <td style="text-align: center;"><=8.7</td>
                                                    <th style="text-align: center;">mg/ dL</th>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">4- 6 days::</td>
                                                    <td style="text-align: center;">0.1 - 12.6</td>
                                                    <th style="text-align: center;">mg/ dL</th>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">>1 month:</td>
                                                    <td style="text-align: center;">0.2- 1.0</td>
                                                    <th style="text-align: center;">mg/ dL</th>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Adult:</td>
                                                    <td style="text-align: center;">0.1- 1.10</td>
                                                    <th style="text-align: center;">mg/ dL</th>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    <!--Liver function-Biochemistry 2nd Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "SGPT/ ALT") {  ?>
                                                
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">SGPT/ ALT</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">U/ L</td>
                                                    <td style="text-align: center;">Male:</td>
                                                    <td style="text-align: center;">Upto 42</td>
                                                    <th style="text-align: center;">U/ L</th>
                                                </tr>
                                               <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Female:</td>
                                                    <td style="text-align: center;">Upto 32</td>
                                                    <th style="text-align: center;">U/ L</th>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                     <!-- Liver function-Biochemistry 3rd Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "SGOT/AST") {  ?>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">SGOT/ AST</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">U/ L</td>
                                                    <td style="text-align: center;">Male:</td>
                                                    <td style="text-align: center;">Upto 38</td>
                                                    <th style="text-align: center;">U/ L</th>
                                                </tr>
                                               <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Female:</td>
                                                    <td style="text-align: center;">Upto 28</td>
                                                    <th style="text-align: center;">U/ L</th>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                         <!--Liver function-Biochemistry 4th Test Name-->
                                     <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Alkaline Phosphate") {
                                                ?>
                                                
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Alkaline Phosphate:</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;">U/ L</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">Upto270</td>
                                                    <th style="text-align: center;">U/ L</th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!-- Liver function-Biochemistry 5th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Control(Prothrombin Time)") {
                                                ?>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Prothrombin Time </td>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Control:</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;">Second</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">10- 14</td>
                                                    <th style="text-align: center;">Second</th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!-- Liver function-Biochemistry 6th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Patient(Prothrombin Time)") {
                                                ?>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Prothrombin Time </td>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Patient:</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;">Second</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">10- 14</td>
                                                    <th style="text-align: center;">Second</th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!-- Liver function-Biochemistry 7th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "INR(Prothrombin Time)") {
                                                ?>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Prothrombin Time </td>
                                                </tr>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">INR:</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;"></td>
                                                    <th style="text-align: center;"></th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                               <!-- Liver function-Biochemistry END Test -->
                                </table>
                                <?php
                            }
                            ?>
                        </div><!-- Liver function-Biochemistry END Test -->
                        
                        
                        <div class="box-body table-responsive" style="width: 98%;color: black;">
                            <?php if($report_category == "Kidney profile-Biochemistry") { ?>
                                <table id="purchaseList" class="table table-bordered table-hover">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th style="text-align: center;">Test Name</th>
                                            <th style="text-align: center;" colspan="2">Result</th>
                                            <th style="text-align: center;" colspan="3">Reference Range</th>
                                        </tr>
                                    </thead>
                                        <!-- Kidney profile 1st Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Serum Uric acid") {
                                                ?>
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">Serum Uric acid</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">mg/ dL</td>
                                                   <td style="text-align: center;">Male:</td>
                                                    <td style="text-align: center;">3.5 - 7.2</td>
                                                    <th style="text-align: center;">mg/ dL</th>
                                                </tr>
                                               <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Female:</td>
                                                    <td style="text-align: center;">2.6 - 6.0</td>
                                                    <th style="text-align: center;">mg/ dL</th>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    <!--Kidney profile 2nd Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Serum Creatinine") {  ?>
                                                
                                                <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">Serum Creatinine</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;" rowspan="5">mg/ dL</td>
                                                   <td style="text-align: center;">Children (1- 18 yr)::</td>
                                                    <td style="text-align: center;">0.2- .0.7</td>
                                                    <th style="text-align: center;">mg/ dL</th>
                                                </tr>
                                               <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;">Adult:</td>
                                                    <td style="text-align: center;">0.7- 1.2</td>
                                                    <th style="text-align: center;">mg/ dL</th>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                     <!-- Kidney profile3rd Test Name-->
                                   <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "BUN") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">BUN</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;">mg/ dL</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">7- 21</td>
                                                    <th style="text-align: center;">mg/ dL</th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                    <!--Biochemistry 4th Test Name-->
                                    <tbody>
                                        <?php
                                        foreach ($all_sales as $single_test_name) {
                                            if ($single_test_name[4] == "Serum Urea") {
                                                ?>
                                              <tr style="text-align: center; font-weight: bolder;">
                                                    <td style="text-align: center;" rowspan="5">Serum Urea</td>
                                                    <td style="text-align: center;"rowspan="5"><?php echo $single_test_name[5]; ?></td>
                                                    <td style="text-align: center;">mg/ dL</td>
                                                    <td style="text-align: center;"></td>
                                                    <td style="text-align: center;">15- 40</td>
                                                    <th style="text-align: center;">mg/ dL</th>
                                                </tr>
                                                <?php } }?>
                                    </tbody>
                                     
                               <!-- Liver function-Biochemistry END Test -->
                                </table>
                                <?php
                            }
                            ?>
                        </div><!-- Kidney profile END Test -->
                        
                        
                        
                        
                    </div><!-- Box-Body END Test -->
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
            size: A4; /* DIN A4 standard, Europe */
            margin:0;
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
    }
</style>      
