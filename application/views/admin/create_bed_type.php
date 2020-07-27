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
<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Insert/bed_type'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Create Bed Type</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>

                        <div class="form-group" style="width: 400px;">
                            <label for="bed_cabin">Bed/Cabin</label>
                            <select class="form-control selectpicker" id="bed_cabin" name="bed_cabin">
                                <option value="">--Select--</option>
                                <option value="Bed">Bed</option>
                                <option value="Cabin">Cabin</option>

                            </select>
                        </div>
                        <div class="form-group" style="width: 400px;">
                            <label for="room_no">Room No</label>
                            <select class="form-control selectpicker" id="room_no" name="room_no">
                                <option value="">--Select--</option>
                                <?php foreach ($all_room as $info) { ?>
                                    <option value="<?php echo $info->room_no; ?>"><?php echo $info->room_no; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group" style="width: 400px;">
                            <label for="no_bed">No. of Bed</label>
                            <input type="text" class="form-control" id="no_bed" placeholder="" name="no_bed">
                        </div>
                        <div class="form-group" style="width: 400px;">
                            <label for="capacity">Capacity</label>
                            <input type="text" class="form-control" id="capacity" placeholder="" name="capacity">
                        </div>

                        <div class="form-group" style="width: 400px;">
                            <label for="charge">Charge (Per Day)</label>
                            <input type="text" class="form-control" id="charge" placeholder="" name="charge">
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
                                    <th style="text-align: center;">Bed/Cabin</th>
                                    <th style="text-align: center;">Room No.</th>
                                    <th style="text-align: center;">No. of Beds</th>
                                    <th style="text-align: center;">Capacity</th>
                                    <th style="text-align: center;">Charge (Per Day)</th>
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
                                        <td style="text-align: center;"><?php echo $single_value->bed_type; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->room_no; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->bed_qty; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->capacity; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->charge; ?> BDT</td>
                                        <td style="text-align: center;">
                                            <a style="margin: 5px;" class="btn btn-danger"
                                               href="<?php echo base_url(); ?>Delete/bed_type/<?php echo $single_value->record_id; ?>">Delete
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