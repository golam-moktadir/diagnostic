<aside >
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable" id="full_page">
                <div style="color: black; background: #a6d7ff; padding: 8px; border: 2px solid #055d9c; margin-bottom:5px;" class="no_print">
                    <form action="<?php echo base_url().'admission/update-operation-invoice'?>" method='post'>
                    <div class="box-body">
                        <p style="font-size: 20px; color: green; font-weight: bold; text-align: center;">Edit Operation Invoice</p>
                        <h3 class="text-center text-danger"><?php echo $this->session->flashdata('error') ?></h3>
                        <h3 class="text-center text-success"><?php echo $this->session->flashdata('success') ?></h3>
                        <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="patient_id">Patient Name</label>
                                <input value="<?php echo $invoice->name ?>" class="form-control" disabled="">
                            </div> 
                            <!--Patient Name Add and Insert New-->
                        <div id="info">
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="mobile">Mobile No.</label>
                                <input type="text" value="<?php echo $invoice->mobile ?>" class="form-control" disabled="">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" value="<?php echo $invoice->age ?>" disabled="">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address"
                                       value="<?php echo $invoice->address ?>" disabled="">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="operation_name">Operation Name</label>
                                <input class="form-control" value="<?php echo $invoice->operation_name ?>" disabled="">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="doctor_id">Surgeon  Name</label>
                                <input class="form-control" value="<?php echo $invoice->doctor_name ?>" disabled="">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="anesthesia_id">Anesthesia</label>
                                 <input class="form-control" value="<?php echo $invoice->anesthesia ?>" disabled="">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="date">Diagnosis</label>
                                <input class="form-control" value="<?php echo $invoice->diagnosis ?>" disabled="">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="date">Relation with Patient</label>
                                <input class="form-control" value="<?php echo $invoice->relation ?>" disabled="">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="admission_date">Admission Date</label>
                                 <input class="form-control" value="<?php echo $invoice->admission_date ?>" disabled="">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="operation_date">Operation Date</label>
                                <input class="form-control" value="<?php echo $invoice->operation_date ?>" disabled="">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="operation_price">Operation Price</label>
                                <input type="number" name="operation_price" class="form-control" value="<?php echo $invoice->operation_price ?>" id="operation_price">
                                <input type="hidden" name="admission_id" value="<?php echo $invoice->admission_id ?>">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="advance_fee">Advance Paid</label>
                                <input type="number" class="form-control" value="<?php echo $invoice->advance_fee ?>" disabled>
                                <input type="hidden" name="advance_fee" id="advance_fee" value="<?php echo $invoice->advance_fee ?>">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="payable_amount">Amount to be Paid</label>
                                <input type="number" class="form-control" value="<?php echo $invoice->payable_amount ?>" name="payable_amount" id="payable_amount">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="discount">Discount</label>
                                <input type="number" name="discount" class="form-control" id="discount" value="<?php echo $invoice->discount ?>">
                            </div>
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

    $("#operation_price").on('change keyup',function(){
        var operation_price = $(this).val();
        var discount = $("#discount").val();
        var advance_fee = $("#advance_fee").val();
        var payable_amount = Number(operation_price) - (Number(discount) + Number(advance_fee));
        $("#payable_amount").val(payable_amount);
    });
    $("#discount").on('change keyup',function(){
        var discount = $(this).val();
        var operation_price = $("#operation_price").val();
        var advance_fee = $("#advance_fee").val();
        var payable_amount = Number(operation_price) - (Number(discount) + Number(advance_fee));

        if(Number(operation_price) < Number(discount)){
            alert('Discount amount can not be larger than Operation Price');
            $(this).val('');
        }
        else if(Number(payable_amount) < 0){
            alert('Discount is not more than payable amount');
            $("#payable_amount").val(Number(operation_price) - Number(advance_fee));
            $(this).val('');
        }
        else{
            $("#payable_amount").val(payable_amount);
        }
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