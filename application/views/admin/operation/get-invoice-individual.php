<div class="form-group col-sm-3 col-xs-12">
    <label for="operation_id">Operation Name</label>
    <input  name="operation_id" id="operation_id" value="<?php echo $invoice->operation_name ?>" class="form-control" disabled="">           
</div>
<div class="form-group col-sm-3 col-xs-12">
    <label for="doctor_id">Surgeon  Name</label>
    <input type="text" name="doctor_id" id="doctor_id" value="<?php echo $invoice->doctor_name ?>" class="form-control" disabled="">
</div>
<div class="form-group col-sm-3 col-xs-12">
    <label for="anesthesia_id">Anesthesia</label>
    <input type="text" name="anesthesia_id" id="anesthesia_id" value="<?php echo $invoice->anesthesia ?>" class="form-control" disabled="">
</div>
<div class="form-group col-sm-3 col-xs-12">
    <label for="diagnosis">Diagnosis</label>
    <input class="form-control" id="diagnosis" value="<?php echo $invoice->diagnosis ?>" name="diagnosis" disabled="">
</div>