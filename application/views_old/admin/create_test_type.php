<?php
if ($msg == "main") {
    $msg = "";
}elseif ($msg == "empty") {
    $msg = "Please fill out all required fields";
}elseif ($msg == "created") {
    $msg = "Created Successfully";
} elseif ($msg == "edit") {
    $msg = "Edited Successfully";
}elseif ($msg == "delete") {
    $msg = "Deleted Successfully";
}   elseif ($msg == "active") {
    $msg = "Service has been made active";
}elseif ($msg == "inactive") {
    $msg = "Service has been made inactive";
}
?>
<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Insert/insert_test_type'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Create Test</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-12 col-xs-12" style="width: 600px;">
                                <label for="test_name">Test Name</label>
                                <input type="text" class="form-control" id="test_name" placeholder="" name="test_name">
                            </div>
                            <div class="form-group col-sm-12 col-xs-12" style="width: 600px;">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" rows="6"
                                          name="description"></textarea>
                            </div>
                            <div class="form-group col-sm-12 col-xs-12" style="width: 600px;">
                                <label for="rate">Rate</label>
                                <input type="text" class="form-control" id="rate" placeholder="" name="rate">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Create <i
                                class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>

                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info.</h3>
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Test Name</th>
                                <th style="text-align: center;">Description</th>
                                <th style="text-align: center;">Rate</th>
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
                                    <td style="text-align: center;"><?php echo $single_value->test_name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->description; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->rate; ?></td>
                                    <td style="text-align: center;">
                                        <?php
                                        if($single_value->block_status==0){
                                            echo "Runing";
                                        }else{
                                            echo "Inactive";
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php if($single_value->block_status==0){ ?>
                                            <a style="margin: 5px;" class="btn btn-warning"
                                               href="<?php echo base_url(); ?>Edit/unblock_test_type/<?php echo $single_value->record_id; ?>">Inactive
                                            </a>
                                        <?php }else{ ?>
                                            <a style="margin: 5px;" class="btn btn-success"
                                               href="<?php echo base_url(); ?>Edit/block_test_type/<?php echo $single_value->record_id; ?>">Active
                                            </a>
                                        <?php } ?>
                                        <a style="margin: 5px;" class="btn btn-info"
                                           href="<?php echo base_url(); ?>Show_edit_form/test_type/<?php echo $single_value->record_id; ?>/main">Edit
                                        </a>
                                        <a style="margin: 5px;" class="btn btn-danger"
                                           href="<?php echo base_url(); ?>Delete/test_type/<?php echo $single_value->record_id; ?>">Delete
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
