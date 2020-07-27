                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="mobile">Mobile No.</label>
                                <input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo $patient->mobile ?>" disabled="">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" id="age" name="age" value="<?php echo $patient->age ?>" disabled="">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address"
                                       disabled="" name="address" value="<?php echo $patient->address ?>">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="record_id">Operation Name</label>
                                <select name="record_id" id="record_id" class="form-control" data-container="body">
                                <?php
                                   foreach($patients as $patient){                                  
                                ?>
                                    <option value="<?php echo $patient->record_id ?>"><?php echo $patient->operation_name ?></option>
                                <?php
                                    }
                                ?>
                                </select>
                            </div>
                        <div id="patientAdmissionAnotherInfo">
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="doctor">Surgeon  Name</label>
                                <?php
                                    $i = 1;
                                    foreach($patients as $patient){
                                        if($i == 1){
                                ?>    
                                    <input type="text" class="form-control" value="<?php echo $patient->doctor_name ?>" disabled >
                                <?php
                                        }
                                    $i++;
                                    }
                                ?>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="anesthesia">Anesthesia</label>
                                <?php
                                    $i = 1;
                                    foreach($patients as $patient){
                                        if($i == 1){
                                ?>    
                                    <input type="text" class="form-control" value="<?php echo $patient->anesthesia ?>" disabled>
                                <?php
                                        }
                                    $i++;
                                    }
                                ?>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="Diagnosis">Diagnosis</label>
                                <?php
                                    $i = 1;
                                    foreach($patients as $patient){
                                        if($i == 1){
                                ?>    
                                    <input type="text" class="form-control" value="<?php echo $patient->diagnosis ?>" disabled>
                                <?php
                                        }
                                    $i++;
                                    }
                                ?>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="Relation">Relation with Patient</label>
                                <?php
                                    $i = 1;
                                    foreach($patients as $patient){
                                        if($i == 1){
                                ?>    
                                    <input type="text" class="form-control" value="<?php echo $patient->relation ?>" disabled>
                                <?php
                                        }
                                    $i++;
                                    }
                                ?>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="admission_date">Admission Date</label>
                                <?php
                                    $i = 1;
                                    foreach($patients as $patient){
                                        if($i == 1){
                                ?>    
                                    <input type="text" class="form-control" value="<?php echo $patient->admission_date ?>" disabled>
                                <?php
                                        }
                                    $i++;
                                    }
                                ?>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="operation_date">Operation Date</label>
                                <?php
                                    $i = 1;
                                    foreach($patients as $patient){
                                        if($i == 1){
                                ?>    
                                    <input type="text" class="form-control" value="<?php echo $patient->operation_date ?>" disabled>
                                <?php
                                        }
                                    $i++;
                                    }
                                ?>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="operation_price">Operation Price</label>
                                <?php
                                   $i = 1;
                                   foreach($patients as $patient){
                                        if($i == 1){      
                                ?>
                                    <input type="number" name="operation_price" value="<?php echo $patient->rate ?>" class="form-control" id="operation_price">
                                <?php
                                        }
                                        $i++;
                                    }
                                ?>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="advance_fee">Advance Paid</label>
                                <?php
                                   $i = 1;
                                   foreach($patients as $patient){
                                        if($i == 1){
                                ?>
                                    <input type="number" value="<?php echo $patient->advance_fee ?>" class="form-control" disabled>
                                    <input type="hidden" name="advance_fee" value="<?php echo $patient->advance_fee ?>" id="advance_fee">
                                <?php
                                        }
                                        $i++;
                                    }
                                ?>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="payable_amount">Amount to be Paid</label>
                                <?php
                                   $i = 1;
                                   foreach($patients as $patient){
                                        if($i == 1){  
                                       $payable_amount = $patient->rate - $patient->advance_fee;    
                                ?>
                                    <input type="number" name="payable_amount" value="<?php echo $payable_amount ?>" class="form-control" id="payable_amount">
                                <?php
                                        }
                                        $i++;
                                    }
                                ?>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="discount">Discount</label>
                                <input type="number" name="discount" id="discount" class="form-control" placeholder="Enter Discount amount">
                            </div>
                        </div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#record_id").change(function(){
            var record_id = $(this).val();

            $.ajax({
                url:"<?php echo base_url().'AdmissionController/patientAdmissionAnotherInfo'?>",
                type:'post',
                data:{record_id:record_id},
                success:function(response){
                    $("#patientAdmissionAnotherInfo").empty().html(response);
                    console.log(response);
                }
            });
        });
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
    });
</script>