<?php
if ($msg == "main") {
    $msg = "";
}

foreach($one_value as $one_info){
    $record_id = $one_info->record_id;
    $date = $one_info->date;
    $staff_type = $one_info->staff_type;
    $doctor_name=$one_info->doctor_name;
    $department=$one_info->department;
    $start_time=$one_info->start_time;
    $end_time=$one_info->end_time;
    $per_patient_time=$one_info->per_patient_time;
}
?>
<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Edit/schedule/'.$record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Schedule</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12" style="">
                                <label for="date">Date</label>
                                <input type="text" class="form-control" id="date" placeholder="" name="date"
                                       value="<?php echo $date;?>" readonly>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="staff_type">Select Staff/Doctor</label>
                                <select name="staff_type" id="staff_type" class="form-control selectpicker">
                                    <option value="">-- Select --</option>
                                    <option value="Doctor" <?php if($staff_type == 'Doctor'){echo "selected";}?>>Doctor</option>
                                    <option value="Nurse">Nurse</option>
                                    <option value="Staff">Staff</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" style="">
                                <label for="doctor_name">Name</label>
                                <select name="doctor_name" id="doctor_name" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_doctor as $info) { ?>
                                        <option value="<?php echo $info->record_id; ?>"
                                        <?php if($doctor_name == $info->name){echo "selected";}?>><?php echo $info->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" style="">
                                <label for="dept">Department</label>
                                <input type="text" class="form-control" id="dept" placeholder="" name="dept"
                                       value="<?php echo $department;?>" readonly>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" style="">
                                <label for="st_time">Start Time</label>
                                <input type="time" class="form-control" id="st_time" placeholder=""
                                       value="<?php echo $start_time;?>" name="st_time">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" style="">
                                <label for="end_time">End Time</label>
                                <input type="time" class="form-control" id="end_time" placeholder=""
                                       value="<?php echo $end_time;?>" name="end_time">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12"
                                 style="<?php if($staff_type !== 'Doctor'){echo "display:none";}?>" id="patient_time">
                                <label for="pp_time">Per Patient Time</label>
                                <input type="text" class="form-control" id="pp_time" placeholder=""
                                       value="<?php echo $per_patient_time;?>" name="pp_time">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Edit <i
                                class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
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
            }
        });
    });

</script>
