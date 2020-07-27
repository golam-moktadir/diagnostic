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
} elseif ($msg == "active") {
    $msg = "ID is active Now";
} elseif ($msg == "inactive") {
    $msg = "ID is inactive Now";
}
?>
<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Insert/case_patient'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Add Case Patient</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="date">Date</label>
                                <input type="date" name="date" id="date" class="form-control"
                                       value="<?php echo date("Y-m-d");?>">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="patient_id">Patient ID</label>
                                <select name="patient_id" id="patient_id" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_patient as $info) { ?>
                                        <option value="<?php echo $info->record_id; ?>"><?php echo $info->record_id; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="name">Patient Name</label>
                                <input type="text" name="name" id="name" class="form-control" readonly>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="mobile">Mobile No.</label>
                                <input type="text" name="mobile" id="mobile" class="form-control">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="case_manager">Case Manager</label>
                                <select name="case_manager" id="case_manager" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_staff as $info) {
                                        if($info->designation == 'Case Manager'){?>
                                        <option value="<?php echo $info->record_id; ?>"><?php echo $info->name; ?></option>
                                    <?php } }?>
                                </select>
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="ref_doctor">Reference Doctor</label>
                                <input type="text" name="ref_doctor" id="ref_doctor" class="form-control">

                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="hospital">Hospital Name</label>
                                <input type="text" name="hospital" id="hospital" class="form-control">
                            </div>
                        </div>

                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Add <i
                                class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>

                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info</h3>
                    </div>


                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;" id="staff_by_type">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">SL</th>
                                <th style="text-align: center;">Date</th>
                                <th style="text-align: center;">Patient Name</th>
                                <th style="text-align: center;">Mobile</th>
                                <th style="text-align: center;">Case Manager</th>
                                <th style="text-align: center;">Reference Doctor</th>
                                <th style="text-align: center;">Hospital Name</th>
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
                                    <td style="text-align: center;"><?php echo $single_value->date; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->patient_name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->mobile_no; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->case_manager; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->ref_doctor; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->hospital; ?></td>
                                    <td style="text-align: center;">
                                        <a style="margin: 5px;" class="btn btn-danger"
                                           href="<?php echo base_url(); ?>Delete/case_patient/<?php echo $single_value->record_id; ?>">Delete
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

<script type="text/javascript">
    $('#patient_id').on('change', function () {
        var id = $('#patient_id').val();

        var post_data = {
            'patient_id': id,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        console.log(post_data);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_patient",
            data: post_data,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#name').val(data[0]);
            }
        });
    });
</script>