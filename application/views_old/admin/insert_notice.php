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
<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable"> 
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Insert/insert_notice'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Insert Notice</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="form-group" style="width: 200px;">
                            <label for="date">Date<b style="color: red;">*</b></label>
                            <input type="date" class="form-control" id="date" placeholder="" name="date">
                        </div>
                        <div class="form-group" style="width: 500px;">
                            <label for="particular">Particular<b style="color: red;">*</b></label>
                            <input type="text" class="form-control" id="particular" placeholder="" name="particular">
                        </div>
                        <div class="form-group">
                            <label for="details">Details<b style="color: red;">*</b></label>
                            <textarea rows="10" class="form-control" id="details" name="details"></textarea>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Submit <i class="fa fa-arrow-circle-right"></i></button>
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
                                    <th style="text-align: center;">Date</th>
                                    <th style="text-align: center;">Particular</th>
                                    <th style="text-align: center;">Details</th>
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
                                        <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->date)); ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->particular; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->details; ?></td>
                                        <td style="text-align: center;">
                                            <a style="margin: 5px;" class="btn btn-info"
                                               href="<?php echo base_url(); ?>Show_edit_form/insert_notice/<?php echo $single_value->record_id; ?>/main">Edit
                                            </a>
                                            <a style="margin: 5px;" class="btn btn-danger"
                                               href="<?php echo base_url(); ?>Delete/insert_notice/<?php echo $single_value->record_id; ?>">Delete
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