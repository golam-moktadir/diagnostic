<aside >
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable" id="full_page">
                <div style="color: black; background: #a6d7ff; padding: 8px; border: 2px solid #055d9c; margin-bottom:5px;" class="no_print">
                    <form action="<?php echo base_url().'admission/admission-create-invoice'?>" method='post'>
                    <div class="box-body">
                        <p style="font-size: 20px; color: green; font-weight: bold; text-align: center;">Admission Invoice</p>
                        <h3 class="text-center text-danger"><?php echo $this->session->flashdata('error') ?></h3>
                        <h3 class="text-center text-success"><?php echo $this->session->flashdata('success') ?></h3>
                        <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
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
                                           name="name" style="display: none">
                                    <span class="input-group-addon">
                                        <button type="button" id="c_plus" style="height: 20px;"
                                                class="btn btn-success fa fa-plus-square btn-sm"></button>
                                        <button type="button" id="c_back" style="height: 20px; display:none;"
                                                class="btn btn-info fa fa-backward btn-sm"></button>
                                    </span>
                                </div>
                            </div> 
                            <!--Patient Name Add and Insert New-->
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="mobile">Mobile No.</label>
                                <input type="text" name="mobile" id="mobile" class="form-control">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" id="age" name="age">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address"
                                       value="" placeholder="" name="address">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                    <label for="admission_fee">Admission Fee</label>
                                    <input type="number" class="form-control" name="admission_fee" placeholder="Enter Admission Fee" id="admission_fee">
                            </div> 
                            <div class="form-group col-sm-3 col-xs-12">
                                    <label for="advance_amount">Advance Amount (If any)</label>
                                    <input type="number" class="form-control" name="advance_amount" placeholder="Enter Advance Amount">
                            </div> 
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="admission_date">Admission Date</label>
                                <input type="text" class="form-control new_datepicker" id="admission_date" name="admission_date" value="<?php echo date('Y-m-d') ?>">
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
                        <h3 class="text-center text-info">All Admission List</h3>
                    </div>
                    <div class="box-body table-responsive" style="width: 100%; overflow-x: scroll; color: black;">
                        <table id="datatable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">SL</th>
                                    <th style="text-align: center;">Patient</th>
                                    <th style="text-align: center;">Mobile</th>
                                    <th style="text-align: center;">age</th>
                                    <th style="text-align: center;">Address</th>
                                    <th style="text-align: center;">admission_fee</th>
                                    <th style="text-align: center;">advance_amount</th>
                                    <th style="text-align: center;">Admission Date</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                foreach ($invoices as $single_value) {
                                    $count++;
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $count; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->name; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->mobile; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->age; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->admission_fee; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->advance_amount; ?></td>
                                         <td style="text-align: center;"><?php echo $single_value->admission_date; ?></td>
                                        <td style="text-align: center;">
                                           <a href="<?php echo base_url().'admission/edit-admission-invoice/'.$single_value->record_id ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i>
                                            </a>
                                            <a href="<?php echo base_url().'admission/print-invoice/'.$single_value->record_id ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i>
                                            </a>
                                            <a href="<?php echo base_url(); ?>admission/delete-admission-invoice/<?php echo $single_value->patient_id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure ?')"><i class="fa fa-trash-o"></i>
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

    $("#patient_id").change(function(){
        var patient_id = $(this).val();
        $.ajax({
            url:"<?php echo base_url().'AdmissionController/patientBasicInfo' ?>",
            type:'post',
            dataType:'json',
            data:{patient_id:patient_id},
            success:function(response){
                $("#mobile").val(response.mobile);
                $("#age").val(response.age);
                $("#address").val(response.address);
            }
        });
    });
    $("#submit").click(function(){
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