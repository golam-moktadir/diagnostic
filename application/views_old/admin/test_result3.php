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
<aside >
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable" id="full_page">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Insert/sell_product'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Test Result</p>
                        <p id="empty_msg" style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>

                        <!--     Row Number 1-->
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12"><label for="date">Date</label>
                                <input type="text" class="form-control" id="date" placeholder="" name="date"
                                       value="<?php echo date("Y-m-d"); ?>" readonly>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="patient_id">Patient Name</label>
                                <select id="patient_id" name="patient_id" class="form-control selectpicker"
                                        data-live-search ="true">
                                    <option value="">--Select--</option>
                                    <?php foreach ($all_patient as $info) { ?>
                                        <option value="<?php echo $info->record_id . "###" . $info->name; ?>">
                                            <?php echo $info->record_id . ' - ' . $info->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="doctor_name">Ref. Doctor</label>
                                <select  id="doctor_name" name="doctor_name" class="form-control selectpicker"
                                        data-live-search ="true" >
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_doctor as $info) { ?>
                                        <option value="<?php echo $info->name; ?>">
                                            <?php echo $info->name?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="test_category">Test Category</label>
                                <select name="test_category" id="test_category" class="form-control selectpicker"
                                        data-live-search ="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_category as $info) { ?>
                                        <option value="<?php echo $info->test_category; ?>">
                                            <?php echo $info->test_category; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="test_name">Test Name</label>
                                <select name="test_name" id="test_name" class="form-control selectpicker"
                                        data-live-search ="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_test as $info) { ?>
                                        <option value="<?php echo $info->test_name; ?>">
                                            <?php echo $info->test_name; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12"><label for="result">Result</label>
                                <input type="text" class="form-control" id="result" placeholder="" name="result">
                            </div>
                        </div>
                        <!--     Row Number 3-->
                        <div class="row">

                            <!--                            <div class="col-sm-4"><label for="payment">Payment</label>
                                                            <input type="text" class="form-control" id="payment" placeholder="" name="payment">
                                                        </div>-->
                        </div>

                        <!--     Row Number 3-->
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <button type="button" class=" btn btn-success" id="save_btn">Add <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                </div>

                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info.</h3>
                    </div>
                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="salesList" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Patient ID</th>
                                    <th style="text-align: center;">Patient Name</th>
                                    <th style="text-align: center;">Ref. Doctor</th>
                                    <th style="text-align: center;">Test Category</th>
                                    <th style="text-align: center;">Test Name</th>
                                    <th style="text-align: center;">Result</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="show_all_sales">

                            </tbody>
                        </table>
                        <div class="box-footer clearfix">
                            <button type="button" class="pull-left btn btn-success" id="sell_btn">Confirm <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>


<script type="text/javascript">
//    $("#patient_id").on("change paste keyup", function () {
//        var patient = $('#patient_id').val().split("###");
//        var patient_id = patient[0];
//        var patient_name = patient[1];
//        var post_data = {
//            'patient_id': patient_id,
//            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
//        };
//
//        $.ajax({
//            type: "POST",
//            url: "<?php echo base_url(); ?>Get_ajax_value/get_patient_age_mobile",
//            data: post_data,
//            dataType: 'json',
//            success: function (data) {
//                $('#age').val(data[0]);
//                $('#mobile').val(data[1]);
//            }
//        });
//    });
    var all_sales = new Array();
    var product_count = 0;

    $("#save_btn").click(function () {
        var patient = $('#patient_id').val().split("###");
        var patient_id = patient[0];
        var patient_name = patient[1];
        var doctor_name = $("#doctor_name").val();
        var test_category = $("#test_category").val();
        var test_name = $("#test_name").val();
        var result = $('#result').val();

        // Print Value by Array
        all_sales[product_count] = new Array(patient_id, patient_name, doctor_name, test_category, test_name, result);

        var full_table = "";
        for (var i = 0; i < all_sales.length; i++) {
            full_table += "<tr>";
            for (var j = 0; j < all_sales[i].length; j++) {
                full_table += "<td style='text-align: center;'>" + all_sales[i][j] + "</td>";
            }
            full_table += "<td><button class='btn btn-danger' onclick='delete_data(" + i + ")'>Delete</button></td></tr>";
        }
        $('#show_all_sales').html(full_table);
        product_count++;
    });
    function delete_data(arr_no) {
        all_sales.splice(arr_no, 1);
        var full_table = "";
        for (var i = 0; i < all_sales.length; i++) {
            full_table += "<tr>";
            for (var j = 0; j < all_sales[i].length; j++) {
                full_table += "<td style='text-align: center;'>" + all_sales[i][j] + "</td>";
            }
            full_table += "<td><button class='btn btn-danger' onclick='delete_data(" + i + ")'>Delete</button></td></tr>";
        }
        $('#show_all_sales').html(full_table);
        product_count--;
    }
    $("#sell_btn").click(function () {
        var date = $('#date').val();
        var post_data = {
            'date': date, 'all_sales': all_sales,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/test_result_success",
            data: post_data,
            success: function (data) {
                $('#full_page').html(data);
            }
        });
    });

</script>