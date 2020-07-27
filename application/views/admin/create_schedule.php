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
                    <?php echo form_open_multipart('Insert/schedule'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Create Schedule</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12" style="">
                                <label for="date">Date</label>
                                <input type="text" class="form-control" id="date" placeholder="" name="date"
                                       value="<?php echo date("Y-m-d"); ?>" readonly>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="staff_type">Select Staff/Doctor</label>
                                <select name="staff_type" id="staff_type" class="form-control selectpicker">
                                    <option value="">-- Select --</option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Nurse">Nurse</option>
                                    <option value="Staff">Staff</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" style="">
                                <label for="doctor_name">Name</label>
                                <select name="doctor_name" id="doctor_name" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_doctor as $info) {
                                        if($info->staff_type == 'Doctor' ){?>
                                        <option value="<?php echo $info->record_id; ?>"><?php echo $info->name; ?></option>
                                    <?php } }?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" style="">
                                <label for="dept">Department</label>
                                <input type="text" class="form-control" id="dept" placeholder="" name="dept" readonly>
                            </div>
                            <input type="hidden" class="form-control" id="name" placeholder="" name="name">
                            <div class="form-group col-sm-4 col-xs-12" style="">
                                <label for="st_time">Start Time</label>
                                <input type="time" class="form-control" id="st_time" placeholder="" name="st_time">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" style="">
                                <label for="end_time">End Time</label>
                                <input type="time" class="form-control" id="end_time" placeholder="" name="end_time">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" style="display: none;" id="patient_time">
                                <label for="pp_time">Per Patient Time</label>
                                <input type="text" class="form-control" id="pp_time" placeholder="" name="pp_time">
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
                                <th style="text-align: center;">Date</th>
                                <th style="text-align: center;">Staff Type</th>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Department</th>
                                <th style="text-align: center;">Start Time</th>
                                <th style="text-align: center;">End Time</th>
                                <th style="text-align: center;">Per Patient Time</th>
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
                                    <td style="text-align: center;"><?php echo $single_value->date; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->staff_type; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->doctor_name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->department; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->start_time; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->end_time; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->per_patient_time; ?></td>
                                    <td style="text-align: center;">
                                        <a style="margin: 5px;" class="btn btn-info"
                                           href="<?php echo base_url(); ?>Show_edit_form/schedule/<?php echo $single_value->record_id; ?>/main">Edit
                                        </a>
                                        <a style="margin: 5px;" class="btn btn-danger"
                                           href="<?php echo base_url(); ?>Delete/schedule/<?php echo $single_value->record_id; ?>">Delete
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

<script type="text/javascript">

    $('#doctor_name').on('change', function () {
        var id = $('#doctor_name').val();

        var post_data = {
            'doctor_id': id,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        console.log(post_data);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_dept",
            data: post_data,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#dept').val(data[0]);
                $('#name').val(data[1]);
            }
        });
    });

    $("#staff_type").on("change paste keyup", function () {
        var input_data = $('#staff_type').val();
        if (input_data == "Doctor") {
            $('#patient_time').show();
        } else {
            $('#patient_time').hide();
        }
    });

</script>