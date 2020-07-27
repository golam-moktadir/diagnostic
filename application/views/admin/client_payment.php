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
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="row">
                    <section class="col-xs-12 connectedSortable">
                        <div class="" style="color: black;">
                            <?php echo form_open_multipart('Insert/create_class'); ?>
                            <div class="box-body">
                                <p style="font-size: 20px;">Client Payment</p>
                                <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-8 form-group">
                                        <label for="class_name">Client</label>
                                        <select id="category" name="category" class="form-control selectpicker">
                                            <option value="">--Select--</option>
                                            <option value="">Client 1</option>
                                            <option value="">Client 2</option>
                                        </select>
                                    </div>
                                    <div class="box-footer col-xs-4 clearfix">
                                        <button style="margin-top: 27px" type="search" class="pull-left btn btn-success">Search<i
                                                class="fa fa-arrow-circle-right"></i></button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>

                        <div class="box box-info">
                            <div class="box-header">
                                <h3 class="box-title" style="color: black;">All Info.</h3>
                            </div>

                            <!-- /.box-header -->
                            <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                                <table id="example2" class="table table-bordered table-hover"
                                       style="color: black; font-size: 16px;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No.</th>
                                            <th style="text-align: center;">Class Name</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <!-- /.Action -->

                                    </tbody>

                                </table>
                            </div><!-- /.box-body -->
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </section>
</aside>

