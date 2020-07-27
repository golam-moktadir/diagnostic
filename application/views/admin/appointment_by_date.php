<table id="example2" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="text-align: center;">SL</th>
            <th style="text-align: center;">Date</th>
            <th style="text-align: center;">Patient Name</th>
            <th style="text-align: center;">Mobile</th>
            <th style="text-align: center;">Address</th>
            <th style="text-align: center;">Age</th>
            <th style="text-align: center;">Doctor Name</th>
            <th style="text-align: center;">Doctor Fee</th>
            <th style="text-align: center;">Appointment Time</th>
            <th style="text-align: center;">Status</th>
            <th style="text-align: center;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 0;
        foreach ($all_value as $single_value) {
            $count++;
            ?>
            <tr>
                <td style="text-align: center;"><?php echo $count; ?></td>
                <td style="text-align: center;"><?php echo $single_value->date; ?></td>
                <td style="text-align: center;"><?php echo $single_value->patient_name; ?></td>
                <td style="text-align: center;"><?php echo $single_value->mobile; ?></td>
                <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                <td style="text-align: center;"><?php echo $single_value->age; ?></td>
                <td style="text-align: center;"><?php echo $single_value->doctor_name; ?></td>
                <td style="text-align: center;"><?php echo $single_value->doctor_fee; ?></td>
                <td style="text-align: center;"><?php echo date("h:i A", strtotime($single_value->appointment_time)); ?></td>
                <td style="text-align: center;">
                    <?php
                    if ($single_value->status == 0) {
                        echo "Due";
                    } else {
                        echo "Paid";
                    }
                    ?>
                </td>
                <td style="text-align: center;">
                    <?php if ($single_value->status == 0) { ?>
                        <button class="btn btn-info" onclick="invoice_app(<?php echo $single_value->record_id; ?>)">
                            Invoice
                        </button> 
                        <button class="btn btn-success" onclick="edit_app(<?php echo $single_value->record_id; ?>)">
                            Pay
                        </button> 
                        <button class="btn btn-warning" onclick="pad(<?php echo $single_value->record_id; ?>)">
                            Pad
                        </button> 
                        <!--                        <a style="margin: 5px;"
                                                   href="<?php echo base_url(); ?>Edit/appointment_status/<?php echo $single_value->record_id; ?>"
                                                   class="btn btn-success">Pay
                                                </a>-->
                        <!--                    <a style="margin: 5px;"
                                               href="<?php echo base_url(); ?>Delete/appointment/<?php echo $single_value->record_id; ?>"
                                               class="btn btn-danger">Cancel
                                            </a>-->
                    <?php } else { ?>
                        <button class="btn btn-info" disabled="" onclick="invoice_app(<?php echo $single_value->record_id; ?>)">
                            Invoice
                        </button> 
                        <button class="btn btn-success" disabled="" onclick="edit_app(<?php echo $single_value->record_id; ?>)">
                            Pay
                        </button> 
                        <button class="btn btn-warning" disabled="" onclick="edit_app(<?php echo $single_value->record_id; ?>)">
                            Pad
                        </button> 
                        <!--                    <a style="margin: 5px;" href="#"
                                               class="btn btn-danger" disabled>Cancel
                                            </a>-->
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>

</table>