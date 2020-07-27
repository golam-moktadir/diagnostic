<?php
if ($msg == "main") {
    $msg = "";
} elseif ($msg == "empty") {
    $msg = "Please fill out all required fields";
} elseif ($msg == "created") {
    $msg = "Created Successfully";
} elseif ($msg == "edit") {
    $msg = "Edited Successfully";
} elseif ($msg == "delete") {
    $msg = "Deleted Successfully";
}
?>
<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable"> 
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Insert/create_customer'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Create Customer</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="name">Customer Name</label>
                                <input type="text" class="form-control" id="name" 
                                       placeholder="" name="name">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="mobile">Mobile No.</label>
                                <input type="text" class="form-control" id="mobile" placeholder="" name="mobile">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="" name="email">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="" name="address">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Submit <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>

                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info.</h3>                              
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">SL</th>
                                    <th style="text-align: center;">Unique ID</th>
                                    <th style="text-align: center;">Customer Name</th>
                                    <th style="text-align: center;">Mobile No.</th>
                                    <th style="text-align: center;">Email</th>
                                    <th style="text-align: center;">Address</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                foreach ($all_value as $single_value) {
                                    $count++;
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $count; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->record_id; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->name; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->mobile; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->email; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                                        <td style="text-align: center;">
                                            <a style="margin: 5px;" class="btn btn-danger"
                                               href="<?php echo base_url(); ?>Delete/create_customer/<?php echo $single_value->record_id; ?>">Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>