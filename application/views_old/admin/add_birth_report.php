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
                    <?php echo form_open_multipart('Insert/birth_report'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Add Birth Report</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12" style="">
                                <label for="date">Date</label>
                                <input type="text" class="form-control" id="date" placeholder="" name="date"
                                       value="<?php echo date("Y-m-d"); ?>" readonly>
                            </div>
                            <!--                            <div class="form-group col-sm-4 col-xs-12" style="">-->
                            <!--                                <label for="myBrowser">Choose a browser from this list:</label>-->
                            <!--                                <input list="browsers" name="myBrowser" id="myBrowser" class="form-control">-->
                            <!--                                <datalist id="browsers" class="selectpicker">-->
                            <!--                                    <option value="Chrome">-->
                            <!--                                    <option value="Firefox">-->
                            <!--                                    <option value="Internet Explorer">-->
                            <!--                                    <option value="Opera">-->
                            <!--                                    <option value="Safari">-->
                            <!--                                    <option value="Microsoft Edge">-->
                            <!--                                </datalist>-->
                            <!--                            </div>-->

                            <div class="form-group col-sm-4 col-xs-12" style="">
                                <label for="patient">Patient Name</label>
                                <select name="patient" id="patient" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                <?php foreach ($all_patient as $info) { ?>
                                            <option value="<?php echo $info->record_id; ?>"><?php echo $info->name; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" style="">
                                <label for="doctor">Ref. Doctor</label>
                                <select name="doctor" id="doctor" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_doctor as $info) { ?>
                                        <option value="<?php echo $info->record_id; ?>"><?php echo $info->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" style="">
                                <label for="title">Child Name</label>
                                <input type="text" class="form-control" id="child_name" placeholder="" name="child_name">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12" style="">
                                <label for="gender">Child Gender</label>
<!--                                <input type="text" class="form-control" id="gender" placeholder="" name="gender">-->
                                     <select name="gender" id="gender" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">--Select--</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                     </select>
                            </div>
                            
                            <div class="form-group col-sm-4 col-xs-12" style="">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="" name="title">
                            </div>
                            <input type="hidden" class="form-control" id="doctor_name" placeholder="" name="doctor_name">
                            <input type="hidden" class="form-control" id="patient_name" placeholder="" name="patient_name">
                            <div class="form-group col-sm-4 col-xs-12" style="">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="1"
                                          oninput='this.style.height = ""; this.style.height = this.scrollHeight + 2 + "px"'></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Add <i
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
                                    <th style="text-align: center;">SL</th>
                                    <th style="text-align: center;">Date</th>
                                    <th style="text-align: center;">Patient Name</th>
                                    <th style="text-align: center;">Child Name</th>
                                    <th style="text-align: center;">Child Gender</th>
                                    <th style="text-align: center;">Title</th>
                                    <th style="text-align: center;">Description</th>
                                    <th style="text-align: center;">Doctor Name</th>
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
                                        <td style="text-align: center;"><?php echo $single_value->date; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->patient_name; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->child_name; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->gender; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->title; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->description; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->doctor_name; ?></td>
                                        <td style="text-align: center;">
                                            <a style="margin: 5px;" class="btn btn-info"
                                               href="<?php echo base_url(); ?>Show_edit_form/birth_report/<?php echo $single_value->record_id; ?>/main">Edit
                                            </a>
                                            <a style="margin: 5px;" class="btn btn-danger"
                                               href="<?php echo base_url(); ?>Delete/birth_report/<?php echo $single_value->record_id; ?>">Delete
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