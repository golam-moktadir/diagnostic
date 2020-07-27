<?php
if ($msg == "main") {
    $msg = "";
}

foreach($one_value as $one_info){
    $record_id = $one_info->record_id;
    $test_name = $one_info->test_name;
    $description = $one_info->description;
    $rate = $one_info->rate;

}
?>
<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Edit/test_type/'.$record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Test</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-12 col-xs-12" style="width: 600px;">
                                <label for="test_name">Test Name</label>
                                <input type="text" class="form-control" id="test_name" placeholder="" name="test_name"
                                       value="<?php echo $test_name;?>">
                            </div>
                            <div class="form-group col-sm-12 col-xs-12" style="width: 600px;">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" rows="6"
                                          name="description"><?php echo $description;?></textarea>
                            </div>
                            <div class="form-group col-sm-12 col-xs-12" style="width: 600px;">
                                <label for="rate">Rate</label>
                                <input type="text" class="form-control" id="rate" placeholder="" name="rate"
                                       value="<?php echo $rate;?>">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Edit &nbsp<i
                                class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>
            </section>
        </div>
    </section>
</aside>
