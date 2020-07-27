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
<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Insert/room_info'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Create Room Info.</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-12 col-xs-12" style="width: 600px;">
                                <label for="room_no">Room No.</label>
                                <input type="text" class="form-control" id="room_no" placeholder="" name="room_no">
                            </div>
                            <div class="form-group col-sm-12 col-xs-12" style="width: 600px;">
                                <label for="floor_no">Floor No.</label>
                                <input type="text" class="form-control" id="floor_no" placeholder="" name="floor_no">
                            </div>
                            <div class="form-group col-sm-12 col-xs-12" style="width: 600px;">
                                <label for="dept">Department</label>
                                <select class="form-control selectpicker" id="dept" name="dept">
                                    <option value="">--Select--</option>
                                    <?php foreach ($all_dept as $info) {?>
                                        <option value="<?php echo $info->department;?>"><?php echo $info->department;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-xs-12" style="width: 600px;">
                                <label for="room_type">Room Type</label>
                                <input type="text" class="form-control" id="room_type" placeholder="" name="room_type">
                            </div>
                            <div class="form-group col-sm-12 col-xs-12" style="width: 600px;">
                                <label for="room_con">Room Condition</label>
                                <select class="form-control selectpicker" id="room_con" name="room_con">
                                    <option value="">--Select--</option>
                                    <option value="AC">AC</option>
                                    <option value="Non AC">Non AC</option>
                                </select>
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
                        <h3 class="box-title" style="color: black;">All Room Info.</h3>
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">SL</th>
                                <th style="text-align: center;">Room No.</th>
                                <th style="text-align: center;">Floor No.</th>
                                <th style="text-align: center;">Department</th>
                                <th style="text-align: center;">Type</th>
                                <th style="text-align: center;">Room Condition</th>
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
                                    <td style="text-align: center;"><?php echo $single_value->room_no; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->floor_no; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->department; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->room_type; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->room_condition; ?></td>
                                    <td style="text-align: center;">
                                        <?php
                                        if($single_value->status==0){
                                            echo "Available";
                                        }else{
                                            echo "Occupied";
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <a style="margin: 5px;" class="btn btn-info"
                                           href="<?php echo base_url(); ?>Show_edit_form/room_info/<?php echo $single_value->record_id; ?>/main">Edit
                                        </a>
                                        <a style="margin: 5px;" class="btn btn-danger"
                                           href="<?php echo base_url(); ?>Delete/room_info/<?php echo $single_value->record_id; ?>">Delete
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
