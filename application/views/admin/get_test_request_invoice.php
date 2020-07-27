<!--All Info Start-->
        <div>
            <div class="box-body table-responsive" style="width: 98%; overflow-x: scroll; color: black;">
                <p style="font-size: 20px; text-align: center;"><u>All Info.</u></p>
                <table id="pagination_search" class="table table-bordered table-hover">
                    <thead>
                        <tr>
<!--                            <th style="text-align: center;">No.</th>-->
                            <th style="text-align: center;">Date</th>
                            <th style="text-align: center;">Test Name</th>
<!--                            <th style="text-align: center;">Record ID</th>-->
                            <th style="text-align: center;">Patient Name(ID)</th>
                            <th style="text-align: center;">Ref. Doctor</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         
                            foreach ($result as $single_value) {
                            $count;
                                
                                ?>
                                    <tr>
                                       <!--<td style="text-align: center;"><?php echo   $count; ?></td>-->
                                        <td style="text-align: center;"><?php echo date('d/m/y', strtotime($single_value->date)); ?></td>
                                         <td style="text-align: center; white-space: nowrap;">
                                        <?php echo $single_value->test_name."</br>[".$single_value->test_category."]"; ?><br>
                                        </td>
                                        <!--<td style="text-align: center;"><?php echo $single_value->record_id; ?></td>-->
                                        <td style="text-align: center; white-space: nowrap;">
                                        <?php echo $single_value->patient_name; ?>
                                        [<b>ID: </b><?php echo $single_value->patient_id; ?>]<br>
                                    </td>
                                    <td style="text-align: center;"><?php echo $single_value->doctor_name; ?></td>
                                   
                                </tr>
                            <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--All Info Start-->