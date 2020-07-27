<?php
if ($msg == "main") {
    $msg = "";
} elseif ($msg == "empty") {
    $msg = "Please fill out all required fields";
}
foreach ($one_value as $one_info) {
    $record_id = $one_info->record_id;
    $date = $one_info->date;
    $particular = $one_info->particular;
    $details = $one_info->details;
}
?>
<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable"> 
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Edit/insert_notice/' . $record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Notice</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="form-group" style="width: 200px;">
                            <label for="date">Date<b style="color: red;">*</b></label>
                            <input type="date" class="form-control" id="date" 
                                   value="<?php echo $date; ?>" placeholder="" name="date">
                        </div>
                        <div class="form-group" style="width: 500px;">
                            <label for="particular">Particular<b style="color: red;">*</b></label>
                            <input type="text" class="form-control" id="particular" 
                                   value="<?php echo $particular; ?>" placeholder="" name="particular">
                        </div>
                        <div class="form-group">
                            <label for="details">Details<b style="color: red;">*</b></label>
                            <textarea rows="10" class="form-control" id="details" name="details"><?php echo $details; ?></textarea>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Edit <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>
            </section>
        </div>
    </section>
</aside>