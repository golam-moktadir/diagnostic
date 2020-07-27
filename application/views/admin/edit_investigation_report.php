<?php
if ($msg == "main") {
    $msg = "";
}

foreach($one_value as $one_info){
    $record_id = $one_info->record_id;
    $date = $one_info->date;
    $patient_name = $one_info->patient_name;
    $patient_id = $one_info->patient_id;
      $gender = $one_info->gender;
    $title = $one_info->title;
    $description =$one_info->description;
    $image =$one_info->image;
    $doctor_name = $one_info->doctor_name;
    $doctor_id = $one_info->doctor_id;

}
?>
<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Edit/investigation_report/'.$record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Investigation Report</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12" style="">
                                <label for="date">Date</label>
                                <input type="text" class="form-control" id="date" placeholder="" name="date"
                                       value="<?php echo $date; ?>" readonly>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" style="">
                                <label for="patient">Patient</label>
                                <select name="patient" id="patient" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_patient as $info) { ?>
                                        <option value="<?php echo $info->record_id; ?>"
                                            <?php if($patient_id == $info->record_id){echo "selected";}?>>
                                            <?php echo $info->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" style="">
                                <label for="gender">Gender</label>
                                     <select name="gender" id="gender" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                     </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" style="">
                                <label for="doctor">Doctor</label>
                                <select name="doctor" id="doctor" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_doctor as $info) { ?>
                                        <option value="<?php echo $info->record_id; ?>"
                                            <?php if($doctor_id == $info->record_id){echo "selected";}?>>
                                            <?php echo $info->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" style="">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="" name="title" value="<?php echo $title; ?>">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="image">Image</label>
                                <br>
                                <img src="<?php echo base_url(); ?>assets/img/investigation_report/<?php echo $image; ?>"
                                     width="50" height="50">
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <input type="hidden" class="form-control" id="doctor_name" placeholder="" name="doctor_name"
                                   value="<?php echo $doctor_name;?>">
                            <input type="hidden" class="form-control" id="patient_name" placeholder="" name="patient_name"
                                   value="<?php echo $patient_name;?>">
                            <div class="form-group col-sm-4 col-xs-12" style="">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4"
                                          oninput='this.style.height = ""; this.style.height = this.scrollHeight + 2 + "px"'
                                ><?php echo $description; ?></textarea>
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


<script type="text/javascript">

    $('#doctor').on('change', function () {
        var id = $('#doctor').val();
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
                $('#doctor_name').val(data[1]);
            }
        });
    });

    $('#patient').on('change', function () {
        var id = $('#patient').val();

        var post_data = {
            'patient_id': id,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        console.log(post_data);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_patient",
            data: post_data,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#patient_name').val(data[0]);
            }
        });
    });



</script>