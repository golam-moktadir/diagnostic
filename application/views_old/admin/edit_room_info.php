<?php
if ($msg == "main") {
    $msg = "";
}

foreach ($one_value as $one_info) {
    $record_id = $one_info->record_id;
    $room_no = $one_info->room_no;
    $floor_no = $one_info->floor_no;
    $department = $one_info->department;
    $room_type = $one_info->room_type;
    $room_con = $one_info->room_condition;

}
?>
<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Edit/room_info/' . $record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Room Info</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-12 col-xs-12" style="width: 600px;">
                                <label for="room_no">Room No</label>
                                <input type="text" class="form-control" id="room_no" placeholder="" name="room_no"
                                       value="<?php echo $room_no; ?>">
                            </div>
                            <div class="form-group col-sm-12 col-xs-12" style="width: 600px;">
                                <label for="floor_no">Floor No.</label>
                                <input type="text" class="form-control" id="floor_no" placeholder="" name="floor_no"
                                       value="<?php echo $floor_no; ?>">
                            </div>
                            <div class="form-group col-sm-12 col-xs-12" style="width: 600px;">
                                <label for="dept">Department</label>
                                <select class="form-control selectpicker" id="dept" name="dept">
                                    <option value="">--Select--</option>
                                    <?php foreach ($all_dept as $info) { ?>
                                        <option value="<?php echo $info->department; ?>"
                                        <?php if($department == $info->department){echo "selected";}?>><?php echo $info->department; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-xs-12" style="width: 600px;">
                                <label for="room_type">Room Type</label>
                                <input type="text" class="form-control" id="room_type" placeholder="" name="room_type"
                                       value="<?php echo $room_type;?>">
                            </div>
                            <div class="form-group col-sm-12 col-xs-12" style="width: 600px;">
                                <label for="room_con">Room Condition</label>
                                <select class="form-control selectpicker" id="room_con" name="room_con">
                                    <option value="">--Select--</option>
                                    <option value="AC"
                                        <?php if($room_con == 'AC'){echo "selected";}?>>AC</option>
                                    <option value="Non AC"
                                        <?php if($room_con == 'Non AC'){echo "selected";}?>>Non AC</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Edit &nbsp<i
                                    class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>
            </section>
        </div>
    </section>
</aside>
