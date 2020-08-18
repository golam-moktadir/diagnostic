<aside >
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable" id="full_page">
                <div style="color: black; background: #a6d7ff; padding: 8px; border: 2px solid #055d9c; margin-bottom:5px;" class="no_print">
                    <form action="<?php echo base_url().'admission/update-admission-invoice' ?>" method='post'>
                    <div class="box-body">
                        <p style="font-size: 20px; color: green; font-weight: bold; text-align: center;">Edit Admission Invoice</p>
                        <h3 class="text-center text-danger"><?php echo $this->session->flashdata('error') ?></h3>
                        <h3 class="text-center text-success"><?php echo $this->session->flashdata('success') ?></h3>
                        <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="patient_id">Patient Name</label>
                                    <input type="text" class="form-control" id="new_patient" value="<?php echo $patient->name ?>" name="name">
                            </div> 
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="mobile">Mobile No.</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $patient->mobile ?>">
                                <input type="hidden" name="record_id" value="<?php echo $patient->record_id ?>">
                                <input type="hidden" name="patient_id" value="<?php echo $patient->patient_id ?>">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" id="age" name="age" value="<?php echo $patient->age ?>">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $patient->address ?>">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                    <label for="admission_fee">Admission Fee</label>
                                    <input type="number" class="form-control" name="admission_fee" value="<?php echo $patient->admission_fee ?>" id="admission_fee">
                            </div> 
                            <div class="form-group col-sm-3 col-xs-12">
                                    <label for="advance_amount">Advance Amount (If any)</label>
                                    <input type="number" class="form-control" name="advance_amount" value="<?php echo $patient->advance_amount ?>">
                            </div> 
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="admission_date">Admission Date</label>
                                <input type="text" class="form-control new_datepicker" id="admission_date" name="admission_date" value="<?php echo $patient->admission_date ?>">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success" id="submit">Update <i
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
        var patient_id = $("#patient_id").val();
        if(patient_id.length == 0){
            alert("Please Select Patient Name");
            return false;
        }
        var admission_fee = $("#admission_fee").val();
        if(admission_fee.length == 0){
            alert("Admission Fee Required");
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