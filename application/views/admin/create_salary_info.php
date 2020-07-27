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
                    <?php echo form_open_multipart('Insert/create_salary_info'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Create Info.</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="form-group" style="width: 300px;">
                            <label for="employee">Select Employee</label>
                            <select name="employee" id="employee" class="form-control selectpicker"
                                    data-live-search="true">
                                <option value="">-- Select --</option>
                            </select>
                        </div>
                        <div class="form-group" style="width: 300px;">
                            <label for="designation">Select Designation</label>
                            <input type="text" name="designation" id="designation" class="form-control" readonly>
                        </div>
                        <div class="form-group" style="width: 300px;">
                            <label for="bank_name">Bank Name</label>
                            <input type="text" class="form-control" id="bank_name" 
                                   value="" placeholder="" name="bank_name" readonly>
                        </div>
                        <div class="form-group" style="width: 300px;">
                            <label for="account_no">Account No.</label>
                            <input type="text" class="form-control" id="account_no" placeholder="" name="account_no">
                        </div>

                        <div class="form-group" style="width: 300px;">
                            <label for="salary_scale">Total Salary</label>
                            <input type="text" class="form-control" value="0" id="salary_scale" placeholder="" name="salary_scale" readonly>
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

                    <!-- /.box-header -->
                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">SL</th>
                                    <th style="text-align: center;">Employee</th>
                                    <th style="text-align: center;">Employee Name</th>
                                    <th style="text-align: center;">Designation</th>
                                    <th style="text-align: center;">Account No.</th>
                                    <th style="text-align: center;">Total Salary</th>
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
                                        <td style="text-align: center;"><?php echo $single_value->employee_name; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->designation; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->account_no; ?></td>
                                        <td style="text-align: center;"><?php echo number_format($single_value->salary_amount); ?>/-</td>
                                        <td style="text-align: center;">
                                            <a style="margin: 5px;" class="btn btn-danger"
                                               href="<?php echo base_url(); ?>Delete/create_salary_info/<?php echo $single_value->record_id; ?>">Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div><!-- /.box-body -->
                </div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">

</script>