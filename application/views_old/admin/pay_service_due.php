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
    .content {
        padding-top: 0px;
        margin-top: 0px;
    }

    .form-group {
        margin-bottom: 5px;
    }

    .col-sm-2 {
        padding: 0px 2px 0px 2px;
    }

    .table tbody tr:hover td {
        background-color: #76e094;
    }
</style>
<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable" id="full_page">
                <div style="color: black; margin-bottom: 5px;">
                    <?php echo form_open_multipart('Insert/pay_service_due'); ?>
                    <div class="box-body">
                        <p id="empty_msg" style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="date">Date</label>
                            <input type="text" class="form-control new_datepicker" id="date"
                                   value="<?php echo date('Y-m-d'); ?>" placeholder="Date" name="date">
                        </div>

                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="patient_id">Patient Name</label>
                            <select id="patient_id" name="patient_id" class="form-control"
                                    data-live-search ="true">
                                <option value="">--Select--</option>
                                <?php foreach ($all_patient as $info) { ?>
                                    <option value="<?php echo $info->record_id . "###" . $info->name; ?>">
                                        <?php echo $info->record_id . ' - ' . $info->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="previous_due">Previous Due</label>
                            <input type="text" class="form-control" id="previous_due"
                                   readonly=" " placeholder="" name="previous_due">
                        </div>
                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="pay">Pay</label>
                            <input type="text" class="form-control" id="pay" placeholder="" name="pay">
                        </div>
                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="due">Due</label>
                            <input type="text" class="form-control" id="due" placeholder="" name="due">
                        </div>
                        <div class="form-group col-sm-2 col-xs-12">
                            <button  type="submit" style="margin-top: 27px;"
                                     class="btn btn-success">
                                Confirm <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
//    $("#test_name").on("change paste keyup", function () {
//        var test_name = $('#test_name').val();
//        var post_data = {
//            'test_name': test_name,
//            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
//        };
//
//        $.ajax({
//            type: "POST",
//            url: "<?php echo base_url(); ?>Get_ajax_value/get_test_price",
//            data: post_data,
//            success: function (data) {
//                $('#test_price').val(data);
//            }
//        });
//    });

    $("#patient_id").on("change paste keyup", function () {
        var patient = $('#patient_id').val().split("###");
        var patient_id = patient[0];
        var patient_name = patient[1];
        var post_data = {
            'patient_id': patient_id,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_service_due",
            data: post_data,
            dataType: 'json',
            success: function (data) {
                $('#previous_due').val(data);
                $('#pay').val(0);
                $('#due').val(0);
            }
        });
    });
//
//    var complete_total = 0;
//    var all_purchase = new Array();
//    var product_count = 0;
//    $("#save_btn").click(function () {
//        var date = $('#date').val();
//        var patient = $('#patient_id').val().split("###");
//        var patient_id = patient[0];
//        var patient_name = patient[1];
//        var doctor = $('#doctor').val();
//        var age = $('#age').val();
//        var mobile = $('#mobile').val();
//        var test_name = $('#test_name').val();
//        var test_price = $('#test_price').val();
//        all_purchase[product_count] = new Array(date, patient_id, patient_name,
//                doctor, age, mobile, test_name, test_price);
//        var full_table = "";
//        var test_total = 0;
//        for (var i = 0; i < all_purchase.length; i++) {
//            test_total += Number(all_purchase[i][7]);
//            full_table += "<tr>";
//            for (var j = 0; j < all_purchase[i].length; j++) {
//                full_table += "<td style='text-align: center;'>" + all_purchase[i][j] + "</td>";
//            }
//            full_table += "<td><button class='btn btn-danger' onclick='delete_data(" + i + ")'>Delete</button></td></tr>";
//        }
//        $('#show_all_sales').html(full_table);
//        product_count++;
//        complete_total = test_total;
//        calculation();
//    });
//
//    function delete_data(arr_no) {
//        all_purchase.splice(arr_no, 1);
//        var full_table = "";
//        var test_total = 0;
//        for (var i = 0; i < all_purchase.length; i++) {
//            test_total += Number(all_purchase[i][7]);
//            full_table += "<tr>";
//            for (var j = 0; j < all_purchase[i].length; j++) {
//                full_table += "<td style='text-align: center;'>" + all_purchase[i][j] + "</td>";
//            }
//            full_table += "<td><button class='btn btn-danger' onclick='delete_data(" + i + ")'>Delete</button></td></tr>";
//        }
//        $('#show_all_sales').html(full_table);
//        product_count--;
//        console.log(all_purchase);
//        complete_total = test_total;
//        calculation();
//    }

    $("#pay").on("change paste keyup", function () {
        var previous_due = $('#previous_due').val();
        if (previous_due == "") {
            previous_due = 0;
        }
        var pay = $('#pay').val();
        $('#due').val(Number(previous_due - pay));
    });
//    function calculation() {
//        $('#amount').val(complete_total);
//        var discount = $('#discount').val();
//        if (discount == "") {
//            discount = 0;
//        }
//        $('#sub_total').val(Number(complete_total - discount));
//        var pay = $('#pay').val();
//        if (pay == "") {
//            pay = 0;
//        }
//        var after_pay = Number(complete_total - discount - pay);
//        if (after_pay >= 0) {
//            $('#due').val(after_pay);
//            $('#advance').val(0);
//        } else {
//            $('#due').val(0);
//            $('#advance').val(after_pay * (-1));
//        }
//    }
//    $("#sell_btn").click(function () {
//        var amount = $('#amount').val();
//        var discount = $('#discount').val();
//        var sub_total = $('#sub_total').val();
//        var pay = $('#pay').val();
//        var due = $('#due').val();
//        var advance = $('#advance').val();
//        var post_data = {
//            'amount': amount, 'discount': discount, 'sub_total': sub_total, 'pay': pay, 'due': due, 'advance': advance,
//            'all_purchase': all_purchase,
//            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
//        };
//        $.ajax({
//            type: "POST",
//            url: "<?php echo base_url(); ?>Get_ajax_value/sales_test_confirm",
//            data: post_data,
//            success: function (data) {
//                $('#full_page').html(data);
//            }
//        });
//    });

</script>