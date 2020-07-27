<table id="example2" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="text-align: center;">SL</th>
            <th style="text-align: center;">Date</th>
            <th style="text-align: center;">Client Name [ID]</th>
            <th style="text-align: center;">Mobile No.</th>
            <th style="text-align: center;">Address</th>
            <th style="text-align: center;">Previous Due</th>
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
                <td style="text-align: center;">
                    <?php echo date('d F, Y', strtotime($single_value->date)); ?>
                </td>
                <td style="text-align: center;"><?php
                    echo $single_value->name . " [ID: " .
                    $single_value->record_id . "]";
                    ?></td>
                <td style="text-align: center;"><?php echo $single_value->mobile; ?></td>
                <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                <td style="text-align: center;"><?php echo $single_value->previous_due; ?></td>
                <td style="text-align: center;">
                    <a style="margin: 5px;" class="btn btn-info fa fa-edit"
                       href="<?php echo base_url(); ?>Show_edit_form/add_client/<?php echo $single_value->record_id; ?>">
                    </a>
                    <a style="margin: 5px;" class="btn btn-danger fa fa-trash-o" title="Delete"
                       href="<?php echo base_url(); ?>Delete/add_client/<?php echo $single_value->record_id; ?>">
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
