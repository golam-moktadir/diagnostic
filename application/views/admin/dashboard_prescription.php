<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">Prescription List</h3>
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No.</th>
                                    <th style="text-align: center;">Date</th>
                                    <th style="text-align: center;">Prescription ID</th>
                                    <th style="text-align: center;">Dr. Name</th>
                                    <th style="text-align: center;">Dr. Mobile</th>
                                    <th style="text-align: center;">Designation</th>
                                    <th style="text-align: center;">Customer Name</th>
                                    <th style="text-align: center;">Product Name</th>
                                    <th style="text-align: center;">Uses Details</th>
                                    <th style="text-align: center;">No of Days</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 1; $i <= $count_it; $i++) {
                                    $one_time = 0;
                                    foreach (${"prescription_result" . $i} as $single_value) {
                                        $one_time++;
                                        ?>
                                        <tr>
                                            <?php if ($one_time == 1) { ?>
                                                <td style="text-align: center;"><?php echo $i; ?></td>
                                                <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->date)); ?></td>
                                                <td style="text-align: center;"><?php echo $single_value->prescription_id; ?></td>
                                                <td style="text-align: center;"><?php echo $single_value->dr_name; ?></td>
                                                <td style="text-align: center;"><?php echo $single_value->dr_mobile; ?></td>
                                                <td style="text-align: center;"><?php echo $single_value->designation; ?></td>
                                                <td style="text-align: center;"><?php echo $single_value->customer_name; ?></td>
                                            <?php } else { ?>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                            <?php } ?>
                                            <td style="text-align: center;"><?php echo $single_value->product_name; ?></td>
                                            <td style="text-align: center;">
                                                <?php echo $single_value->per_day_dose."<br>".$single_value->meal_type
                                                        ."<br>".$single_value->description; ?>
                                            </td>
                                            <td style="text-align: center;"><?php echo $single_value->no_of_days; ?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr><td colspan="10"></td></tr>
                                        <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>

<style>
    table.table-bordered{
        border: #55830c 1px solid;
        font-weight: bold;
        color: black;
        font-size: 16px;
    }
    table.table-bordered > thead > tr > th{
        border: #55830c 1px solid;
        font-weight: bold;
        color: black;
        font-size: 18px;
    }
    table.table-bordered > tbody > tr > td{
        border: #55830c 1px solid;
        font-weight: bold;
        color: black;
        font-size: 16px;
    }
</style>  