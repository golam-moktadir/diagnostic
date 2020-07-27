<?php
if ($msg == "main") {
    $msg = "";
} elseif ($msg == "empty") {
    $msg = "Please fill out all required fields";
} elseif ($msg == "created") {
    $msg = "Assigned Successfully";
} elseif ($msg == "edit") {
    $msg = "Discharged Successfully";
} elseif ($msg == "delete") {
    $msg = "Deleted Successfully";
}

?>
<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;" id="show_invoice">
                    <?php echo form_open_multipart('Insert/assign_bed'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Assign Bed</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="date">Assign Date</label>
                                <input type="date" class="form-control" id="date" placeholder="" name="date"
                                       value="<?php echo date("Y-m-d"); ?>">
                            </div>

                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="patient_id">Patient ID</label>
                                <select name="patient_id" id="patient_id" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_patient as $info) { ?>
                                        <option value="<?php echo $info->record_id; ?>"><?php echo $info->record_id . '-' . $info->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>


                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="bed_no">Bed No.</label>
                                <select name="bed_no" id="bed_no" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_bed_no as $info) { ?>
                                        <option value="<?php echo $info->bed_no; ?>"><?php echo $info->bed_type . "-" . $info->bed_no; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="room_no">Room No.</label>
                                <select name="room_no" id="room_no" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_room_no as $info) { ?>
                                        <option value="<?php echo $info->room_no; ?>"><?php echo $info->room_type . "-" . $info->room_no; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="guardian_name">Guardian Name<b style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="guardian_name" placeholder=""
                                       name="guardian_name">
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="relation">Relation<b style="color: red;">*</b></label>
                                <input type="text" class="form-control" id="relation" placeholder="" name="relation">
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="contact">Contact </label>
                                <input type="text" class="form-control" id="contact" placeholder="" name="contact">
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="" name="address">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Assign &nbsp<i
                                    class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>

                <div class="box box-info" id="info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info.</h3>
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Assign Date</th>
                                <th style="text-align: center;">Patient ID</th>
                                <th style="text-align: center;">Patient Name</th>
                                <th style="text-align: center;">Bed No.</th>
                                <th style="text-align: center;">Bed Type</th>
                                <th style="text-align: center;">Room No</th>
                                <th style="text-align: center;">Charge (Per Day)</th>
                                <th style="text-align: center;">Amount</th>
                                <th style="text-align: center;">Discharge Date</th>
                                <th style="text-align: center;">Invoice</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count = 0;
                            foreach ($all_value as $single_value) {
                                $count++;
                                $count2=0;
                                $discharge_date = date("Y-m-d");
                                $assign_date = $single_value->assign_date;
                                $charge = $single_value->charge;
                                while (strtotime($assign_date) <= strtotime($discharge_date)) {
                                    $count2++;
                                    $assign_date = date("Y-m-d", strtotime("+1 day", strtotime($assign_date)));
                                }

                                $amount = $charge * $count2;
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $count; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->assign_date; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->patient_id; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->patient_name; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->bed_no; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->bed_type; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->room_no; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->charge; ?> BDT</td>
                                    <td style="text-align: center;">
                                        <?php if ($single_value->status == 0) {
                                            echo $amount;
                                        } else {
                                            echo $single_value->amount;
                                        }?>
                                        BDT
                                    </td>
                                    <td style="text-align: center;"><?php echo $single_value->discharge_date; ?></td>
                                    <td style="text-align: center;">
                                        <button type="button" class="pull-left btn btn-info"
                                                id="purchase_btn"
                                                onclick="invoice('<?php echo $single_value->record_id; ?>')">Invoice
                                        </button>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php if ($single_value->status == 0) { ?>
                                            <a style="margin: 5px;" class="btn btn-success"
                                               href="<?php echo base_url(); ?>Edit/assign_bed/<?php echo $single_value->record_id; ?>">Discharge
                                            </a>
                                        <?php } else { ?>
                                            <a style="margin: 5px;" class="btn btn-success"
                                               href="<?php echo base_url(); ?>Edit/assign_bed/<?php echo $single_value->record_id; ?>"
                                               disabled="">Discharged
                                            </a>
                                        <?php } ?>
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
    function invoice(id)
    {
        var post_data = {
            'id': id,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_bed_invoice",
            data: post_data,
            success: function (data) {
                $('#show_invoice').html(data);
                $('#info').hide();
            }
        });
    }

    $("#patient_id").on("change paste keyup", function () {
        var input_data = $('#patient_id').val();
        var post_data = {
            'patient_id': input_data,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        console.log(post_data);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_patient2",
            data: post_data,
            dataType: 'JSON',
            success: function (data) {
                console.log(data);
                $('#guardian_name').val(data[4]);
                $('#relation').val(data[5]);
                $('#contact').val(data[6]);
                $('#address').val(data[7]);
            }
        });
    });
</script>