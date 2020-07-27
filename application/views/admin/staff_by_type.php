<div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
           <th style="text-align: center;">SL</th>
                                <th style="text-align: center;">Image</th>
                                <th style="text-align: center;">Staff Name</th>
                                <th style="text-align: center;">Doctor Name</th>
                                <th style="text-align: center;">Username</th>
                                <th style="text-align: center;">Designation</th>
                                <th style="text-align: center;">Joining Date</th>
                                <th style="text-align: center;">Department</th>
                                <th style="text-align: center;">Visiting Hour</th>
                                <th style="text-align: center;">Doctor Fee</th>
                                <th style="text-align: center;">Available Days</th>
                                <th style="text-align: center;">Mobile</th>
                                <th style="text-align: center;">Address</th>
                                <th style="text-align: center;">Bank Name</th>
                                <th style="text-align: center;">A/C</th>
                                <th style="text-align: center;">Total Salary</th>
                                <th style="text-align: center;">Permission</th>
                                <th style="text-align: center;">Action</th>
                                <th style="text-align: center;">Status</th>
        </tr>
        </thead>
      <tbody>
                            <?php
                            $count = 0;
                            foreach ($all_staff as $single_value) {
                                $count++;
                                ?>
                                <tr>
<!--                                    <td style="text-align: center;"><?php echo $count; ?></td>-->
                                    <td style="text-align: center;"><?php echo $single_value->record_id; ?></td>
                                    <td style="text-align: center;">
                                        <img src="<?php echo base_url(); ?>assets/img/staff/<?php echo "$single_value->image"; ?>"
                                             width="50" height="50"><?php  echo "[ID: $single_value->record_id]";?>
                                    </td>
<!--                                    <td style="text-align: center;"><?php echo $single_value->name ; ?></td>-->
                                    <td style="text-align: center;"><?php  echo "$single_value->name";?></td>
                                    <td style="text-align: center;"><?php  echo "$single_value->doctor_name";
                                            ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->username; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->designation; ?></td>
                                    <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->joining_date)); ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->department; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->visiting_hour; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->doctor_fee; ?></td>
                                    <td style="text-align: center;">
                                        <?php
                                        $each_day = explode('#', $single_value->available_days);
                                        foreach ($each_day as $day) {
                                            echo $day . "<br>";
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align: center;"><?php echo $single_value->mobile; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->bank_name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->account_no; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->total_salary; ?></td>
                                    <td style="text-align: center;">
                                        <?php
                                        if ($single_value->hr_access == 1) {
                                            echo "HR Part,<br>";
                                        }
                                        ?>
                                        <?php
                                        if ($single_value->inventory_access == 1) {
                                            echo "Inventory Part,<br>";
                                        }
                                        ?>

                                        <?php
                                        if ($single_value->billing_access == 1) {
                                            echo "Billing Part,<br>";
                                        }
                                        ?>
                                        
                                        <?php
                                        if ($single_value->accounting_access == 1) {
                                            echo "Accounting Part,<br>";
                                        }
                                        ?>
                                       
                                        <?php
                                        if ($single_value->sales_access == 1) {
                                            echo "Sales,<br>";
                                        }
                                        ?>
                                        <?php
                                        if ($single_value->webpart_access == 1) {
                                            echo "Web Part,<br>";
                                        }
                                        ?>
                                        <?php
                                        if ($single_value->laboratory_access == 1) {
                                            echo "Laboratory,<br>";
                                        }
                                        ?>
                                        <?php
                                        if ($single_value->information_access == 1) {
                                            echo "Information,<br>";
                                        }
                                        ?>
                                        <?php
                                        if ($single_value->createOption_access == 1) {
                                            echo "Create Option,<br>";
                                        }
                                        ?>
                                        
                                    </td>

                                    <td style="text-align: center;">
                                        <a style="margin: 5px;"
                                           href="<?php echo base_url(); ?>Show_edit_form/create_user/<?php echo $single_value->record_id; ?>/main"
                                           class="btn btn-info fa fa-edit" title="Edit">
                                        </a>
                                        <a style="margin: 5px;"
                                           href="<?php echo base_url(); ?>Delete/create_user/<?php echo $single_value->record_id; ?>/main"
                                           class="btn btn-danger fa fa-cut" title="Delete">
                                        </a>
                                        <?php if ($single_value->block_status == 1) { ?>
                                            <a style="margin: 5px;"
                                               href="<?php echo base_url(); ?>Edit/staff_active/<?php echo $single_value->record_id; ?>"
                                               class="btn btn-success">Active
                                            </a>
                                        <?php } else { ?>
                                            <a style="margin: 5px;"
                                               href="<?php echo base_url(); ?>Edit/staff_inactive/<?php echo $single_value->record_id; ?>"
                                               class="btn btn-danger">Inactive
                                            </a>
                                        <?php } ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php
                                        if ($single_value->block_status == 0) {
                                            echo "Active";
                                        } else {
                                            echo "Inactive";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
    </table>
</div>