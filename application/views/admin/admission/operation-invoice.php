<aside >
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable" id="full_page">
                <div style="color: black; background: #a6d7ff; padding: 8px; border: 2px solid #055d9c; margin-bottom:5px;" class="no_print">
                    <form action="<?php echo base_url().'admission/operation-create-invoice'?>" method='post'>
                    <div class="box-body">
                        <p style="font-size: 20px; color: green; font-weight: bold; text-align: center;">Operation Invoice</p>
                        <h3 class="text-center text-danger"><?php echo $this->session->flashdata('error') ?></h3>
                        <h3 class="text-center text-success"><?php echo $this->session->flashdata('success') ?></h3>
                        <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="patient_id">Patient Name</label>
                                <select name="patient_id" id="patient_id" class="form-control selectpicker">
                                    <option value="">--Select--</option>
                                    <?php 
                                        foreach ($all_patient as $info) { ?>
                                            <option value="<?php echo $info->patient_id ?>">
                                                <?php echo "$info->name [ID: $info->patient_id]"; ?>
                                            </option>
                                    <?php } ?>
                                </select>
                            </div> 
                            <!--Patient Name Add and Insert New-->
                        <div id="info">
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="mobile">Mobile No.</label>
                                <input type="text" name="mobile" id="mobile" class="form-control" disabled="">
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
                                <label for="record_id">Operation Name</label>
                                <select name="record_id" id="record_id" class="form-control" data-container="body">
                                    <option value="">-- Select --</option>
                                    
                                </select>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="doctor_id">Surgeon  Name</label>
                                <select name="doctor_id" id="doctor_id" class="form-control selectpicker" data-container="body">
                                    <option value="">-- Select --</option>
                                    
                                </select>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="anesthesia_id">Anesthesia</label>
                                <select name="anesthesia_id" id="anesthesia_id" class="form-control selectpicker" data-container="body">
                                    <option value="">-- Select --</option>
                                    
                                </select>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="date">Diagnosis</label>
                                <select class="form-control selectpicker" id="diagnosis"
                                       data-container="body" name="diagnosis">
                                       <option value="">-- Select --</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="date">Relation with Patient</label>
                                <select class="form-control selectpicker" id="relation"
                                       data-container="body" name="relation">
                                       <option value="">-- Select --</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="admission_date">Admission Date</label>
                                <select class="form-control selectpicker" id="admission_date"
                                       data-container="body" name="admission_date">
                                       <option value="">-- Select --</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="operation_date">Operation Date</label>
                                <select class="form-control selectpicker" id="operation_date"
                                       data-container="body" name="operation_date">
                                       <option value="">-- Select --</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="operation_price">Operation Price</label>
                                <input type="number" name="operation_price" class="form-control" placeholder="Enter Operation Price" id="operation_price">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="advance_fee">Advance Paid</label>
                                <input type="number" class="form-control" placeholder="Enter Advance Fee">
                                <input type="hidden" name="advance_fee">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="payable_amount">Amount to be Paid</label>
                                <input type="number" class="form-control" placeholder="Enter Amount Fee" name="payable_amount" id="payable_amount">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="discount">Discount</label>
                                <input type="number" name="discount" class="form-control" id="discount" placeholder="Enter Discount amount">
                            </div>
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
                        <h3 class="text-center text-info">All Invoices List</h3>
                    </div>
                    <div class="box-body table-responsive" style="width: 100%; overflow-x: scroll; color: black;">
                        <table id="datatable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">SL</th>
                                    <th style="text-align: center;">Patient</th>
                                    <th style="text-align: center;">Operation Name</th>
                                    <th style="text-align: center;">Operation Price</th>
                                    <th style="text-align: center;">Advance</th>
                                    <th style="text-align: center;">Discount</th>
                                    <th style="text-align: center;">Paid Amount</th>
                                    <th style="text-align: center;">Due</th>
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
                                        <td style="text-align: center;"><?php echo $single_value->operation_name; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->operation_price; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->advance_fee; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->discount; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->payable_amount; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->due; ?></td>
                                        <td style="text-align: center;">
                                           <a href="<?php echo base_url().'admission/edit-operation-invoice/'.$single_value->admission_id ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i>
                                            </a>
                                            <a href="<?php echo base_url().'operation/invoice-individual/'.$single_value->admission_id ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i>
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
    $("#patient_id").change(function(){
        var patient_id = $(this).val();
        $.ajax({
            url:"<?php echo base_url().'AdmissionController/patientAdmissionInfo' ?>",
            type:'post',
            data:{patient_id:patient_id},
            success:function(response){
                $("#info").empty().html(response);  
              //  console.log(response);   
            }
        });
    });
    $("#submit").click(function(){
        var patient_id = $("#patient_id").val();
        if(patient_id.length == 0){
            alert("Please Select Patient Name");
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