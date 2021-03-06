<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable" id="full_page">
                <div style="color: black; background: #a6d7ff; padding: 8px; border: 2px solid #055d9c; margin-bottom:5px;" class="no_print">
                    <form action="<?php echo base_url().'admission/create-admission'?>" method='post'>
                    <div class="box-body">
                        <p style="font-size: 20px; color: green; font-weight: bold; text-align: center;">Operation Case </p>
                        <h3 class="text-center text-danger"><?php echo $this->session->flashdata('error' ) ?></h3>
                        <h3 class="text-center text-success"><?php echo $this->session->flashdata('success' ) ?></h3>
                        <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="patient_id">Patient Name</label>
                                    <select name="patient_id" id="patient_id" class="form-control selectpicker">
                                        <option value="">--Select--</option>
                                        <?php foreach ($all_patient as $info) { ?>
                                            <option value="<?php echo $info->patient_id ?>">
                                                <?php echo "$info->name [ID: $info->patient_id]"; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                            </div> 
                            <!--Patient Name Add and Insert New-->

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="mobile">Mobile No.</label>
                                <input type="text" name="mobile" id="mobile" class="form-control" disabled="">
                                <input type="hidden" name="admit_id" id="admit_id">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" id="age" name="age" disabled="">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address"
                                       value="" placeholder="" name="address" disabled="">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="category_id">Operation Category</label>
                                <select name="category_id" id="category_id" class="form-control selectpicker" data-container="body">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?php echo $category->record_id ?>">
                                            <?php echo $category->category_name ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="operation_id">Operation Name</label>
                                <select name="operation_id" id="operation_id" class="form-control" data-container="" required="">
                                    <option value="">-- Select --</option>
                                    
                                </select>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="doctor_id">Surgeon  Name</label>
                                <select name="doctor_id" id="doctor_id" class="form-control selectpicker" data-container="body">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_doctor as $info) { ?>
                                        <option value="<?php echo $info->record_id ?>">
                                            <?php echo $info->name ." [" . $info->designation . "]"; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="anesthesia_id">Anesthesia</label>
                                <select name="anesthesia_id" id="anesthesia_id" class="form-control selectpicker" data-container="body">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_doctor as $info) { ?>
                                        <option value="<?php echo $info->record_id ?>">
                                            <?php echo $info->name ." [" . $info->designation . "]"; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="date">Diagnosis</label>
                                <input type="text" class="form-control" id="diagnosis"
                                       placeholder="Diagnosis" name="diagnosis">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="date">Relation with Patient</label>
                                <input type="text" class="form-control" id="relation"
                                       placeholder="Relation with Patient" name="relation">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="appointment_time">Operation Date</label>
                                <input type="text" class="form-control new_datepicker" id="operation_date" name="operation_date" value="<?php echo date('Y-m-d'); ?>">
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
                        <h5 class="text-center text-info">All Admitted Patients for Operation</h5>
                    </div>
                    <div class="box-body table-responsive" style="width: 100%; overflow-x: scroll; color: black;">
                        <table id="datatable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Patient</th>
                                    <th>Operation Name</th>
                                    <th>Doctor</th>
                                    <th>Anesthesia</th>
                                    <th>Diagnosis</th>
                                    <th>Relation</th>
                                    <th>Operation Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                foreach ($admit_patients as $single_value) {
                                    $count++;
                                    ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $single_value->name; ?></td>
                                        <td><?php echo $single_value->operation_name; ?></td>
                                        <td><?php echo $single_value->doctor_name; ?></td>
                                        <td><?php echo $single_value->anesthesia ?></td>
                                        <td><?php echo $single_value->diagnosis; ?></td> 
                                        <td><?php echo $single_value->relation; ?></td>
                                        <td><?php echo $single_value->operation_date; ?></td>
                                        <td>
                                            <a href="<?php echo base_url().'admission/edit-admission/'.$single_value->record_id.'/'.$single_value->category_id ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i>
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
    $("#patient_id").change(function () {
        var patient_id = $('#patient_id').val();

        $.ajax({
            url: "<?php echo base_url().'AdmissionController/getSinglePatientAdmitInfo' ?>",
            type: "POST",
            dataType: 'json',
            data:{patient_id:patient_id},
            success: function (response) {
                $("#admit_id").val(response.admit_id);
                $("#age").val(response.age);
                $("#mobile").val(response.mobile);
                $("#address").val(response.address);
            }
        });
    });

    $('#category_id').change(function(){
        var category_id = $(this).val();
        $.ajax({
            url:"<?php echo base_url().'AdmissionController/getOperationName' ?>",
            type:'post',
            dataType:'json',
            data:{category_id:category_id},
            success:function(response){
                console.log(response);
                $("#operation_id").empty().html(response);
            }
        });
    });
    $("#submit").click(function(){
        var patient_id = $("#patient_id").val();
        if(patient_id.length == 0){
            alert('Patient Name is required');
            return false;
        }
        var category_id = $('#category_id').val();
        if(category_id.length == 0){
            alert('Category Name is required');
            return false;
        }
        var operation_id = $('#operation_id').val();
        if(operation_id.length == 0){
            alert('Operation Name is required');
            return false;
        }
        var doctor_id = $('#doctor_id').val();
        if(doctor_id.length == 0){
            alert('Surgeon Name is required');
            return false;
        }
        var anesthesia_id = $('#anesthesia_id').val();
        if(anesthesia_id.length == 0){
            alert('Anesthesia Doctor Name is required');
            return false;
        }
        var diagnosis = $('#diagnosis').val();
        if(diagnosis.length == 0){
            alert('Please Insert diagnosis');
            return false;
        }
    });
    $(document).ready(function () {
        datatable();
    });
    function datatable() {
        $('#datatable').dataTable({
            //"info":false,
            "autoWidth": false,
            "order": false,
            "oSearch": {"bSmart": false}
        });
    }
</script>