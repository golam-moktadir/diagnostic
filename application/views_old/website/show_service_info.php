<table id="datatable" class="datatable table table-bordered table-hover">
    <thead>
        <tr>
            <th style="text-align: center;">SL</th>         
            <th style="text-align: center;">Service Name</th>
            <!--<th style="text-align: center;">Description</th>-->
            <th style="text-align: center;">Rate</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 0;
        foreach ($all_price as $single_value) {
            $count++;
            ?>
            <tr>
                <td style="text-align: center;"><?php echo $count; ?></td>
                <td style="text-align: center;"><?php echo $single_value->test_name; ?></td>
                <!--<td style="text-align: center;"><?php echo $single_value->description; ?></td>-->
                <td style="text-align: center;"><?php echo $single_value->price; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
