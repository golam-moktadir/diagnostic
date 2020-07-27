<style>
    table.table-bordered{
        border: grey 1px solid !important;
        font-weight: bold !important;
        color: black !important;
        font-size: 13px !important;
    }
    table.table-bordered > thead > tr > th{
        border: grey 1px solid !important;
        font-weight: bold !important;
        color: white !important;
        font-size: 13px !important;
        background: #0aad87 !important;
    }
    table.table-bordered > tbody > tr > td{
        border: grey 1px solid !important;
        font-weight: bold !important;
        color: black !important;
        font-size: 13px !important;
    }
</style>

<?php
//
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
        <div class="row">
            <section class="col-xs-12 connectedSortable"> 
                <div style="color: black; background: #a6d7ff; padding: 8px; border: 2px solid #055d9c; margin-bottom:5px;" class="no_print">
                    <?php echo form_open_multipart('Insert/test_price'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px; color: green; font-weight: bold; text-align: center;">Test Price</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="form-group col-sm-5 col-xs-12">
                            <label for="test_id">Test Name</label>
                            <select name="test_id" id="test_id" class="form-control">
                                <option value="">-- Select --</option>
                                <?php foreach ($all_value as $info) { ?>
                                    <option value="<?php echo $info->record_id . "###" . $info->test_name; ?>"><?php
                                        echo $info->test_name .
                                        " [" . $info->test_category . "]";
                                        ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="price">Rate</label>
                            <input type="text" class="form-control" id="price" placeholder="" name="price">
                        </div>
                    </div>
                    <div class="clearfix" style="margin-top: 17px;">
                        <button type="submit" class="pull-left btn btn-success">Create <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>

                <div>
                    <div>
                        <h4 style="color: blue; text-align: center;">Test Price Info.</h4>                               
                    </div>

                    <div class="box-body table-responsive" style="width: 100%; overflow-x: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">SL</th>
                                    <th style="text-align: center;">Test Name</th>
                                    <th style="text-align: center;">Rate</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                foreach ($all_price as $single_value) {
                                    $count++;
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $count; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->test_name; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->price; ?></td>
                                        <td style="text-align: center;">
                                            <a style="margin: 5px;" class="btn btn-info"
                                               href="<?php echo base_url(); ?>Show_edit_form/test_price/<?php echo $single_value->record_id; ?>/main">Edit
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
</aside><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

