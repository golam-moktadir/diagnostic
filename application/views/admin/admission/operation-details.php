<aside >
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable" id="full_page">
                <div style="color: black; padding: 8px; border: 2px solid #055d9c; margin-bottom:5px;" class="no_print">
                    <form action="<?php echo base_url().'admission/operation-details-invoice'?>" method='post'>
                    <div class="box-body">
                        <p style="font-size: 20px; color: green; font-weight: bold; text-align: center;">Operation Details</p>
                        <h3 class="text-center text-danger"><?php echo $this->session->flashdata('error') ?></h3>
                        <h3 class="text-center text-success"><?php echo $this->session->flashdata('success') ?></h3>
                        <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="patient_id">Patient Name</label>
                                <select name="patient_id" id="patient_id" class="form-control selectpicker">
                                    <option value="">--Select--</option>
                                    <?php 
                                        foreach ($admit_patients as $info) { ?>
                                            <option value="<?php echo $info->patient_id ?>">
                                                <?php echo "$info->name [ID: $info->patient_id]"; ?>
                                            </option>
                                    <?php } ?>
                                </select>
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
                                <select name="operation_id" id="operation_id" class="form-control" data-container="">
                                    <option value="">-- Select --</option>
                                    
                                </select>
                            </div> 
                             <div class="form-group col-sm-3 col-xs-12">
                                <label for="operation_price">Operation Price</label>
                                <input type="number" class="form-control" id="operation_price"
                                       placeholder="Operation Price" name="operation_price">
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
                                <label for="appointment_time">Operation Date</label>
                                <input type="text" class="form-control new_datepicker" id="operation_date" name="operation_date" value="<?php echo date('Y-m-d') ?>">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="expenditure_title">OT Expenditure</label>
                                <select name="" id="expenditure_title" class="form-control">
                                    <option value="">--Select--</option>
                                    <?php 
                                        foreach ($expenditures as $expenditure) { ?>
                                            <option value="<?php echo $expenditure->record_id ?>">
                                                <?php echo "$expenditure->expenditure_title" ?>
                                            </option>
                                    <?php } ?>
                                </select>
                            </div> 
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="expenditure_price">Expenditure Price</label>
                                <input type="number" class="form-control" name="" id="expenditure_price">
                            </div>  
                            <div class="form-group col-sm-12">
                                <button style="margin-top: 5px;" type="button" onclick="" 
                                        class="pull-right btn btn-success" id="addButton">
                                    Add <i class="fa fa-arrow-circle-right"></i></button>
                            </div>                       
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <table class="table" id="add_expenditure">
                                
                                </table>
                            </div>
                        </div> 
                        <div class="row">
                              <div class="form-group col-sm-3">
                                <label for="payable_amount">Amount To be Paid</label>
                                <input type="number" class="form-control" name="payable_amount" id="payable_amount">
                            </div> 
                              <div class="form-group col-sm-3">
                                <label for="discount">Discount</label>
                                <input type="number" class="form-control" name="discount" id="discount">
                                <input type="hidden" name="total_expenditure_price" id="total_expenditure_price">
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
                                    <th style="text-align: center;">Operation Date</th>
                                    <th style="text-align: center;">Operation Price</th>
                                    <th style="text-align: center;">Paid Amount</th>
                                    <th style="text-align: center;">Discount</th>
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
                                        <td style="text-align: center;"><?php echo $single_value->operation_date; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->operation_price; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->payable_amount; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->discount; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->due; ?></td>
                                        <td style="text-align: center;">
                                           <a href="<?php echo base_url().'admission/edit-operation-details/'.$single_value->record_id.'/'.$single_value->category_id ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i>
                                            </a>
                                            <a href="<?php echo base_url().'admission/invoice-individual/'.$single_value->record_id ?>" class="btn btn-sm btn-info" title='Invoice'><i class="fa fa-eye"></i>
                                            </a>
                                            <a href="<?php echo base_url(); ?>admission/delete-operation-details/<?php echo $single_value->record_id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you Sure ?')"><i class="fa fa-trash-o"></i>
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
    $('#operation_id').change(function(){
        var operation_id = $(this).val();
        $.ajax({
            url:"<?php echo base_url().'AdmissionController/getOperationPrice' ?>",
            type:'post',
            dataType:'json',
            data:{operation_id:operation_id},
            success:function(response){
                console.log(response);
                $("#operation_price").val(response.rate);
              //  $("#expenditure_title").removeAttr('disabled');
                $("#payable_amount").val(response.rate)
            }
        });
    });
    $('#operation_price').on('change keyup',function(){
        var operation_price = $(this).val();
        var total_expenditure_price = $("#total_expenditure_price").val();  
        var discount = $("#discount").val();
        $("#payable_amount").val(Number(operation_price) + Number(total_expenditure_price) - discount);
    });
    $("#expenditure_title").change(function(){
        var record_id = $(this).val();
        $.ajax({
            url:"<?php echo base_url().'AdmissionController/getExpenditureRate' ?>",
            type:'post',
            dataType:'json',
            data:{record_id:record_id},
            success:function(response){
                $("#expenditure_price").val(response.expenditure_rate);
            }
        });
    });
    $("#addButton").click(function(){
        var record_id = $("#expenditure_title").val();
        var expenditure = $("#expenditure-"+record_id).val();
        var expenditure_price = $("#expenditure_price").val();
        var operation_price = $("#operation_price").val();
        if(Number(expenditure) > 0){
            alert('Already Taken');
        }
        else if(operation_price.length == 0){
            alert('Please Select Operation Name');
        }
        else{
            $.ajax({
                url:"<?php echo base_url().'AdmissionController/getExpenditureRate' ?>",
                type:'post',
                dataType:'json',
                data:{record_id:record_id},
                success:function(response){
                var html = "<tr id='content-"+response.record_id+"'>";
                    html += "<td>"+response.expenditure_title+"</td>";
                    html += "<td>"+expenditure_price+"</td>";
                    html += "<td class='col-sm-3'>";
                    html +=  "<button onclick='removeButton("+response.record_id+")' class='btn btn-sm btn-danger'>X</button>";
                    html +=  "<input type='hidden' name='new_expenditure_price[]' id='new_expenditure_price-"+response.record_id+"' value='"+expenditure_price+"'>";
                    html +=  "<input type='hidden' name='expenditure_id[]' value='"+response.record_id+"' id='expenditure-"+response.record_id+"'>";
                    html += "</td>";
                    html += "</tr>";
                    $("#add_expenditure").append(html);
                }           
            });
            var total_expenditure_price = $("#total_expenditure_price").val();
            total_expenditure_price = Number(total_expenditure_price) + Number(expenditure_price);
            $("#total_expenditure_price").val(total_expenditure_price);
            $("#discount").val('');
            $("#payable_amount").val(Number(operation_price) + Number(total_expenditure_price));
        }
    });
    function removeButton(record_id){
        event.preventDefault();
        var new_expenditure_price = $("#new_expenditure_price-"+record_id).val();
        var total_expenditure_price = $("#total_expenditure_price").val();
        var operation_price = $("#operation_price").val();
        $("#total_expenditure_price").val(total_expenditure_price - new_expenditure_price);
        $("#payable_amount").val(Number(operation_price) + Number(total_expenditure_price) - Number(new_expenditure_price));
        $("#content-"+record_id).remove();
        $("#discount").val('');

    }
    $("#discount").on('change keyup',function(){
        var discount = $(this).val();
        var operation_price = $("#operation_price").val();
        var total_expenditure_price = $("#total_expenditure_price").val();
        $("#payable_amount").val(Number(operation_price) + Number(total_expenditure_price) - Number(discount));

    });
    $("#submit").click(function(){
        var patient_id = $("#patient_id").val();
        if(patient_id.length == 0){
            alert("Please Select Patient Name");
            return false;
        }
        var category_id = $("#category_id").val();
        if(category_id.length == 0){
            alert('Please Select Operation Category Name');
            return false;
        }
        var operation_id = $("#operation_id").val();
        if(operation_id.length == 0){
            alert('Please Select Operation Name');
            return false;
        }
        var operation_price = $("#operation_price").val();
        if(operation_price.length == 0){
            alert('Please Insert Valid Operation Price');
            return false;
        }
        var doctor_id = $("#doctor_id").val();
        if(doctor_id.length == 0){
            alert('Please Select Surgeon Name');
            return false;
        }
        var operation_date = $("#operation_date").val();
        if(operation_date.length == 0){
            alert("Please Select Operation Date");
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