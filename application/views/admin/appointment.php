<style>
    table.table-bordered{
        border: grey 1px solid !important;
        font-weight: bold !important;
        color: black !important;
        font-size: 13px !important;
    }
    table.table-bordered > thead > tr > th{
        border: grey 1px solid !important;
        font-weight: bold !important;
        color: white !important;
        font-size: 13px !important;
        background: #0aad87 !important;
    }
    table.table-bordered > tbody > tr > td{
        border: grey 1px solid !important;
        font-weight: bold !important;
        color: black !important;
        font-size: 13px !important;
    }
</style>
<aside >
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable" id="full_page">
                <div style="color: black; background: #a6d7ff; padding: 8px; border: 2px solid #055d9c; margin-bottom:5px;" class="no_print">
                    <form action="<?php echo base_url().'Insert/appointment' ?>" method='post'>
                    <div class="box-body">
                        <p style="font-size: 20px; color: green; font-weight: bold; text-align: center;">Doctor Appointment</p>
                        <h5 class="text-center text-success"><?php echo $this->session->flashdata('success') ?></h5>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="patient_id">Patient Name</label>
                                <div class="input-group">
                                    <select name="patient_id" id="patient_id" class="form-control selectpicker"
                                            data-live-search="true">
                                        <option value="">--Select--</option>
                                        <?php foreach ($all_patient as $info) { ?>
                                            <option value="<?php echo $info->record_id ?>">
                                                <?php echo "$info->name [ID: $info->record_id]"; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <input type="text" class="form-control" id="new_patient"
                                           placeholder="New Patient Name"
                                           name="patient_name" style="display: none">
                                    <span class="input-group-addon">
                                        <button type="button" id="c_plus" style="height: 20px;"
                                                class="btn btn-success fa fa-plus-square btn-sm"></button>
                                        <button type="button" id="c_back" style="height: 20px; display:none;"
                                                class="btn btn-info fa fa-backward btn-sm"></button>
                                    </span>
                                </div>
                            </div> 
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="mobile">Mobile No.</label>
                                <input type="text" name="mobile" id="mobile" class="form-control">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" id="age" name="age">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address"
                                       value="" placeholder="" name="address">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="doctor_id">Doctor Name</label>
                                <select name="doctor_id" id="doctor_id" class="form-control selectpicker" data-container="body">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_doctor as $info) { ?>
                                        <option value="<?php echo $info->record_id ?>">
                                            <?php
                                                echo $info->name .
                                                " [" . $info->designation . "]";
                                                ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="doctor_fee">Doctor Fee</label>
                                <input type="text" class="form-control" id="doctor_fee" placeholder=""
                                       name="doctor_fee">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="date">Appointment Date</label>
                                <input type="text" class="form-control new_datepicker" id="date"
                                       value="<?php echo date('Y-m-d'); ?>" placeholder="Date" name="date">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="appointment_time">Appointment Time</label>
                                <input type="time" class="form-control" id="appointment_time" placeholder=""
                                       name="appointment_time">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success" id="submit">Submit <i
                                class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>

                <div>
                    <div>
                        <h3 style="color: blue; text-align: center;">All Appointment Info</h3>
                    </div>
                    <div class="box-body table-responsive" style="width: 100%; overflow-x: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">SL</th>
                                    <th style="text-align: center;">Patient</th>
                                    <th style="text-align: center;">Mobile</th>
                                    <th style="text-align: center;">Address</th>
                                    <th style="text-align: center;">Age</th>
                                    <th style="text-align: center;">Doctor</th>
                                    <th style="text-align: center;">Fee</th>
                                    <th style="text-align: center;">Appt_Date</th>
                                    <th style="text-align: center;">Appt_Time</th>
                                    <!--<th style="text-align: center;">Status</th>-->
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
                                        <?php
                                            foreach($all_patient as $patient){
                                                if($patient->record_id == $single_value->patient_id){
                                        ?>
                                        <td style="text-align: center;"><?php echo $patient->name; ?></td>
                                        <?php
                                                }
                                            }
                                        ?>
                                        <?php
                                            foreach($all_patient as $patient){
                                                if($patient->record_id == $single_value->patient_id){
                                        ?>
                                        <td style="text-align: center;"><?php echo $patient->mobile; ?></td>
                                        <?php
                                                }
                                            }
                                        ?>
                                        <?php
                                            foreach($all_patient as $patient){
                                                if($patient->record_id == $single_value->patient_id){
                                        ?>
                                        <td style="text-align: center;"><?php echo $patient->address; ?></td>
                                        <?php
                                                }
                                            }
                                        ?>
                                        <?php
                                            foreach($all_patient as $patient){
                                                if($patient->record_id == $single_value->patient_id){
                                        ?>
                                        <td style="text-align: center;"><?php echo $patient->age; ?></td>
                                        <?php
                                                }
                                            }
                                        ?>
                                        <?php
                                            foreach($all_doctor as $doctor){
                                                if($doctor->record_id == $single_value->doctor_id){
                                        ?>
                                        <td style="text-align: center;"><?php echo $doctor->name; ?></td>
                                        <?php
                                                }
                                            }
                                        ?>
                                        <td style="text-align: center;"><?php echo $single_value->doctor_fee; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->date; ?></td>
                                        <td style="text-align: center;"><?php echo date("h:i A", strtotime($single_value->appointment_time)); ?></td>
                                        <td style="text-align: center;">
                                            <a href="<?php echo base_url().'Show_edit_form/appointment/'.$single_value->record_id.'/'.$single_value->patient_id; ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i>
                                            </a>
                                            <a href="<?php echo base_url(); ?>Delete/appointment/<?php echo $single_value->record_id; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div><!-- /.box-body -->
                </div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">

    var c_status = 0;
    $('#c_plus').on('click', function () {
        $('#patient_id').selectpicker('hide');
        $('#new_patient').show();
        $('#c_back').show();
        $('#patient_id').hide();
        $('#c_plus').hide();
        $('#mobile').val('');
        $('#age').val('');
        $('#address').val('');
        c_status = 1;
    });
    $('#c_back').on('click', function () {
        $('#patient_id').selectpicker('show');
        $('#new_patient').hide();
        $('#c_back').hide();
        $('#patient_id').show();
        $('#c_plus').show();
        $('#new_patient').val('');
        c_status = 0;
    });
//    Add and Insert Patient End
    $("#patient_id").on("change paste keyup", function () {
        var patient_id = $('#patient_id').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url().'AdmissionController/patientBasicInfo' ?>",
            data: {patient_id:patient_id},
            dataType: 'json',
            success: function (response) {
                $('#age').val(response.age);
                $('#mobile').val(response.mobile);
                $('#address').val(response.address);
            }
        });
    });

    $("#doctor_id").on("change paste keyup", function () {
        var doctor_id = $('#doctor_id').val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>ProductController/getDoctorFee",
            dataType: 'json',
            data:{doctor_id:doctor_id},
            success: function (response) {
               $("#doctor_fee").val(response.frees);
            }
        });
    });

    $('#search_appointment').on('click', function () {
        var date = $('#s_date').val();
        var post_data = {
            'date': date,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/appointment_by_date",
            data: post_data,
            success: function (data) {
                $('#appointment').html(data);
            }
        });
    });

    $("#submit").click(function () {
      //  event.preventDefault();
        if (c_status == 1) {
            var patient_name = $('#new_patient').val();
            if(patient_name.length == 0){
                alert('Patient Name Can not be empty');
                return false;
            }
        }
        else{
            var patient_id = $('#patient_id').val();
            if(patient_id.length == 0){
                alert('Please Select A Patient Name');
                return false;
            }
        }        
    });


</script>