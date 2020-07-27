<?php
if ($msg == "main") {
    $msg = "";
}
?>
<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Edit/test_price/' . $one_value[0]->record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Test Price</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="form-group col-sm-5 col-xs-12">
                            <label for="test_id">Test Name</label>
                            <select name="test_id" id="test_id" class="form-control">
                                <option value="<?php echo $one_value[0]->test_id . "###" . $one_value[0]->test_name; ?>"><?php echo $one_value[0]->test_name; ?></option>
                                <?php foreach ($all_value as $info) { ?>
                                    <option value="<?php echo $info->record_id . "###" . $info->test_name; ?>"><?php
                                        echo $info->test_name;
                                        ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="price">Rate</label>
                            <input type="text" class="form-control" id="price" placeholder="" name="price" value="<?php echo $one_value[0]->price; ?>">
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
