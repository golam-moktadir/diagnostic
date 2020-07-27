
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="doctor_id">Surgeon  Name</label>   
                                <input type="text" value="<?php echo $patient->doctor_name ?>" class="form-control" disabled>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="anesthesia_id">Anesthesia</label>    
                                <input type="text" value="<?php echo $patient->anesthesia ?>" disabled class="form-control">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="diagnosis">Diagnosis</label>     
                                    <input type="text" class="form-control" value="<?php echo $patient->diagnosis ?>" disabled>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="relation">Relation with Patient</label>
                                    <input type="text" value="<?php echo $patient->relation ?>" disabled class="form-control">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="admission_date">Admission Date</label>
                                <input type="text" class="form-control" disabled="" value="<?php echo $patient->admission_date ?>">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="operation_date">Operation Date</label>
                                <input type="text" class="form-control" value="<?php echo $patient->operation_date ?>" disabled>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="operation_price">Operation Price</label>
                                <input type="number" name="operation_price" value="<?php echo $patient->rate ?>" class="form-control" id="operation_price">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="advance_fee">Advance Paid</label>
                                <input type="number" class="form-control" disabled="" value="<?php echo $patient->advance_fee ?>">
                                <input type="hidden" name="advance_fee" value="<?php echo $patient->advance_fee ?>" id="advance_fee">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="payable_amount">Amount to be Paid</label>
                                <?php  $payable_amount = $patient->rate - $patient->advance_fee ?>    
                                <input type="number" name="payable_amount" value="<?php echo $payable_amount ?>" class="form-control" id="payable_amount">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="discount">Discount</label>
                                <input type="number" name="discount" id="discount" class="form-control" placeholder="Enter Discount amount">
                            </div>
<script type="text/javascript">
    $(document).ready(function(){
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
        $("#operation_price").on('change keyup',function(){
            var operation_price = $(this).val();
            var discount = $("#discount").val();
            var advance_fee = $("#advance_fee").val();
            var payable_amount = Number(operation_price) - (Number(discount) + Number(advance_fee));
            $("#payable_amount").val(payable_amount);
        });
    });
</script>
                            