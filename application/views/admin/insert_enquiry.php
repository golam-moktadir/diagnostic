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
                    <?php echo form_open_multipart('Insert/enquiry'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Insert Enquiry</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="form-group" style="width: 200px;">
                            <label for="date">Date<b style="color: red;">*</b></label>
                            <input type="date" class="form-control" id="date" placeholder="" name="date"
                                   value="<?php echo date("Y-m-d");?>">
                        </div>
                        <div class="form-group" style="width: 400px;">
                            <label for="title">Title<b style="color: red;">*</b></label>
                            <textarea class="form-control" id="title" name="title" rows="1"
                                      oninput='this.style.height = "";
                                      this.style.height = this.scrollHeight + 2 + "px"'></textarea>
                        </div>
                        <div class="form-group" style="width: 400px;">
                            <label for="name">Name<b style="color: red;">*</b></label>
                            <input type="text" class="form-control" id="name" placeholder="" name="name">
                        </div>
                        <div class="form-group" style="width: 400px;">
                            <label for="mobile">Mobile<b style="color: red;">*</b></label>
                            <input type="text" class="form-control" id="mobile" placeholder="" name="mobile">
                        </div>
                        <div class="form-group" style="width: 400px;">
                            <label for="email">Email<b style="color: red;">*</b></label>
                            <input type="email" class="form-control" id="email" placeholder="" name="email">
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
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Date</th>
                                <th style="text-align: center;">Title</th>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Mobile</th>
                                <th style="text-align: center;">Email</th>
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
                                    <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->date)); ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->title; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->mobile; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->email; ?></td>
                                    <td style="text-align: center;">
                                        <a style="margin: 5px;" class="btn btn-danger"
                                           href="<?php echo base_url(); ?>Delete/enquiry/<?php echo $single_value->record_id; ?>">Delete
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