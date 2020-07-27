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
<style>
    .content{ padding-top: 10px; margin-top: 0px;}
    .form-group{ margin-bottom: 5px;}
    .final_btn{margin-top: 27px; margin-bottom: 8px;}
    .table tbody tr:hover td, .table tbody tr:hover th {background-color: #76e094;}
</style>
<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable"> 
                <div style="color: black;">
                    <?php echo form_open_multipart('Insert/manufacture_company'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Create Supplier</p>
                        <p style="font-size: 20px; color: #003399;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="manufacture">Supplier Company</label>
                                <input type="text" class="form-control" id="manufacture_company" placeholder="" name="manufacture_company">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="mobile_no">Mobile No</label>
                                <input type="text" class="form-control" id="mobile_no" placeholder="" name="mobile_no">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="" name="address">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="previous_due">Previous Due</label>
                                <input type="text" class="form-control" id="previous_due" 
                                       value="0" placeholder="" name="previous_due">
                            </div>
                             <div class="form-group col-sm-2 col-xs-12">
                                 <button type="submit" class="pull-left btn btn-success final_btn">Create
                            <i class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
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
                                    <th style="text-align: center;">Supplier Name</th>
                                    <th style="text-align: center;">Mobile No</th>
                                    <th style="text-align: center;">Address</th>
                                    <th style="text-align: center;">Previous Due</th>
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
                                        <td style="text-align: center;"><?php echo "$single_value->manufacture_company [ID: $single_value->record_id]"; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->mobile_no; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->previous_due; ?></td>
                                        <td style="text-align: center;">
                                        <!-- <a style="margin: 5px;" class="btn btn-info fa fa-edit" title="Edit"
                                                href="<?php echo base_url(); ?>show_edit_form/create_manufacture_company/<?php echo $single_value->record_id; ?>">
                                             </a>-->
                                            <a style="margin: 5px;" class="btn btn-danger fa fa-trash-o" title="Delete"
                                               href="<?php echo base_url(); ?>Delete/manufacture_company/<?php echo $single_value->record_id; ?>">
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