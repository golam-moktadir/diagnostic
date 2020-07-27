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
                    <?php echo form_open_multipart('Edit/create_patient/' . $one_value[0]->record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Patient Info</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="name">Patient Name</label>
                                <input type="text" class="form-control" id="name"  value="<?php echo $one_value[0]->name; ?>"
                                       placeholder="" name="name">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" id="age" placeholder="" name="age"  value="<?php echo $one_value[0]->age; ?>">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="height">Height</label>
                                <input type="text" class="form-control" id="height" placeholder="" name="height"  value="<?php echo $one_value[0]->height; ?>">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="weight">Weight</label>
                                <input type="text" class="form-control" id="weight" placeholder="" name="weight"  value="<?php echo $one_value[0]->weight; ?>">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="mobile">Mobile No</label>
                                <input type="text" class="form-control" id="mobile" placeholder="" name="mobile"  value="<?php echo $one_value[0]->mobile; ?>">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="" name="address"  value="<?php echo $one_value[0]->address; ?>">
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
