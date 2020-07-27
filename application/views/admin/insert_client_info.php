<?php
if ($msg == "main") {
    $msg = "";
} elseif ($msg == "empty") {
    $msg = "Please fill out all required fields";
} elseif ($msg == "created") {
    $msg = "Created Successfully";
} elseif ($msg == "edit") {
    $msg = "Edited Successfully";
} elseif ($msg == "delete") {
    $msg = "Deleted Successfully";
}
?>
<style>
    .content{ padding-top: 0px; margin-top: 0px;}
    .form-group{ margin-bottom: 5px;}
    .final_btn{margin-top: 27px; margin-bottom: 8px;}
    .table tbody tr:hover td, .table tbody tr:hover th {background-color: #76e094;}
</style>
<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div style="color: black;">
                    <?php echo form_open_multipart('Insert/add_client'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Add Client</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="client_name">Client Name</label>
                                <input type="text" name="client_name" id="client_name" class="form-control">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="mobile">Mobile No.</label>
                                <input type="text" name="mobile" id="mobile" class="form-control">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address"
                                       value="" placeholder="" name="address">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="previous_due">Previous Due</label>
                                <input type="text" class="form-control" id="previous_due"
                                       value="0" placeholder="" name="previous_due">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                 <button type="submit" class="pull-left btn btn-success final_btn">Create <i
                                class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

                <div class="box box-info" style="color: black;">
                    <div class="box-body" id="no_print2">
                        <p style="font-size: 20px;">Search Client</p>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                                <select name="select_customer" id="select_customer" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_value as $single_value) { ?>
                                        <option value="<?php echo $single_value->record_id; ?>">
                                            <?php echo $single_value->name . " [ID: " . $single_value->record_id . "]"; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <button type="button" class="pull-left btn btn-info" style="width: 150px;"
                                        id="search_customer">Search <i class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <div id="show_info"></div>
                </div>

                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info.</h3>
                    </div>

                    <div class="box-body" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">SL</th>
                                    <th style="text-align: center;">Date</th>
                                    <th style="text-align: center;">Client Name</th>
                                    <th style="text-align: center;">Mobile No.</th>
                                    <th style="text-align: center;">Address</th>
                                    <th style="text-align: center;">Previous Due</th>
                                    <!--<th style="text-align: center;">Point</th>-->
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
                                            <?php echo date('d/m/y', strtotime($single_value->date)); ?>
                                        </td>
                                        <td style="text-align: center;"><?php
                                            echo "$single_value->name [ID: $single_value->record_id]";
                                            ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->mobile; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->previous_due; ?></td>
                                        <!--<td style="text-align: center;"><?php echo $single_value->point; ?></td>-->
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
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>

<style>
    .zoom {
        padding: 3px;
        background-color: #1a3d4f;
        width: 80px;
        height: 80px;
    }
    .zoom:hover {
        -ms-transform: scale(2.5); /* IE 9 */
        -webkit-transform: scale(2.5); /* Safari 3-8 */
        transform: scale(2.5); 
    }
</style>

<script type="text/javascript">
    $("#search_customer").on("click", function () {
        var customer_id = $('#select_customer').val();
        var post_data = {
            'customer_id': customer_id,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_customer_info",
            data: post_data,
            success: function (data) {
                $('#show_info').html(data);
            }
        });
    });
</script>