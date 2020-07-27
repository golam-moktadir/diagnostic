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
<!--        <h3> Sales Service</h3>-->
        <div class="row">
            <section class="col-xs-12 connectedSortable" id="full_page">
                <div style="color: black; margin-bottom: 5px;">
                    <?php echo form_open_multipart('Insert/sell_product'); ?>
                    <div class="box-body">
                        <p id="empty_msg" style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="date">Date</label>
                            <input type="text" class="form-control new_datepicker" id="date"
                                   value="<?php echo date('Y-m-d'); ?>" placeholder="Date" name="date">
                        </div>

                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="patient_id">Patient Name</label>
                            <select id="patient_id" name="patient_id" class="form-control selectpicker"
                                    data-live-search ="true">
                                <option value="">--Select--</option>
                                <?php foreach ($all_patient as $info) { ?>
                                    <option value="<?php echo $info->record_id . "###" . $info->name; ?>"><?php echo $info->record_id . ' - ' . $info->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="age">Age</label>
                            <input type="text" class="form-control" id="age" placeholder="" name="age">
                        </div>
                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="mobile">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile" placeholder="" name="mobile">
                        </div>
                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="doctor">Reference Doctor</label>
                            <select id="doctor" name="doctor" class="form-control selectpicker"
                                    data-live-search ="true">
                                <option value="">--Select--</option>
                                <?php foreach ($doctor as $info) { ?>
                                    <option value="<?php echo $info->name; ?>"><?php
                                        echo $info->name .
                                        " [" . $info->department . "]";
                                        ?></option>
                                <?php } ?>
                            </select>
                            </div>

                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="service">Services</label>
                            <select name="service" id="service" class="form-control">
                                <option value="">-- Select --</option>
                                <?php foreach ($all_services as $info) { ?>
                                    <option value="<?php echo $info->service; ?>"><?php
                                        echo $info->service;
                                        ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="service_price">Service Cost</label>
                            <input type="text" class="form-control" id="service_price" placeholder="" name="service_price">
                        </div>

                        <div class="form-group col-sm-12 col-xs-12">
                            <button style="margin-top: 5px;" type="button"
                                    class="pull-right btn btn-success  btn-xs" id="save_btn">
                                Add <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="box-body table-responsive" style="width: 98%; color: black;">
                        <table id="salesList" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Date</th>
                                    <th style="text-align: center;">Patient ID</th>
                                    <th style="text-align: center;">Patient Name</th>
                                    <th style="text-align: center;">Reference Doctor</th>
                                    <th style="text-align: center;">Age</th>
                                    <th style="text-align: center;">Mobile Number</th>
                                    <th style="text-align: center;">Service</th>
                                    <th style="text-align: center;">Service Cost</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <!-- Add Multiple test name  -->
                            <tbody id="show_all_sales">

                            </tbody>

                            
                            <tr>
                                <td colspan="">
                                    Amount<input type="text" class="form-control" id="amount"
                                                 style="color: black; border: black 2px solid;"
                                                 value="0" name="amount" readonly>
                                </td>
                                <td colspan="2">
                                    Discount<input type="text" class="form-control" id="discount"
                                                   style="color: black; border: black 2px solid;"
                                                   value="0" placeholder="Discount" name="discount">
                                </td>
                                <td colspan="2">
                                    Sub Total<input type="text" class="form-control" id="sub_total"
                                                    value="0" style="color: black; border: black 2px solid;"
                                                    name="sub_total" readonly>
                                </td>
                                <td colspan="2">
                                    Pay<input type="text" class="form-control" id="pay"
                                              value="0" style="color: black; border: black 2px solid;" name="pay">
                                </td>
                                <td colspan="2">
                                    Due<input type="text" class="form-control" id="due"
                                              value="0" style="color: black; border: black 2px solid;" name="due"
                                              readonly>
                                </td>
                                <td colspan="2" style="display: none;">
                                    Advance<input type="text" class="form-control" id="advance"
                                                  value="0" style="color: black; border: black 2px solid;" name="advance"
                                                  readonly>
                                </td>

                            </tr>

                        </table>
                        <div class="box-footer clearfix">
                            <button style="margin-top: -10px;" type="button" class="pull-right btn btn-success btn-xs"
                                    id="sell_btn">Confirm <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
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
            url: "<?php echo base_url(); ?>Get_ajax_value/get_patient_age_mobile",
            data: post_data,
            dataType: 'json',
            success: function (data) {
                $('#age').val(data[0]);
                $('#mobile').val(data[1]);
            }
        });
    });
    var complete_total = 0;
    var all_purchase = new Array();
    var product_count = 0;
    $("#save_btn").click(function () {
        var date = $('#date').val();
        var patient = $('#patient_id').val().split("###");
        var patient_id = patient[0];
        var patient_name = patient[1];
        var doctor = $('#doctor').val();
        var age = $('#age').val();
        var mobile = $('#mobile').val();
        var service = $('#service').val();
        var service_price = $('#service_price').val();
        all_purchase[product_count] = new Array(date, patient_id, patient_name,
                doctor, age, mobile, service, service_price);
        var full_table = "";
        var test_total = 0;
        for (var i = 0; i < all_purchase.length; i++) {
            test_total += Number(all_purchase[i][7]);
            full_table += "<tr>";
            for (var j = 0; j < all_purchase[i].length; j++) {
                full_table += "<td style='text-align: center;'>" + all_purchase[i][j] + "</td>";
            }
            full_table += "<td><button class='btn btn-danger' onclick='delete_data(" + i + ")'>Delete</button></td></tr>";
        }
        $('#show_all_sales').html(full_table);
        product_count++;
        complete_total = test_total;
        calculation();
    });

    function delete_data(arr_no) {
        all_purchase.splice(arr_no, 1);
        var full_table = "";
        var test_total = 0;
        for (var i = 0; i < all_purchase.length; i++) {
            test_total += Number(all_purchase[i][7]);
            full_table += "<tr>";
            for (var j = 0; j < all_purchase[i].length; j++) {
                full_table += "<td style='text-align: center;'>" + all_purchase[i][j] + "</td>";
            }
            full_table += "<td><button class='btn btn-danger' onclick='delete_data(" + i + ")'>Delete</button></td></tr>";
        }
        $('#show_all_sales').html(full_table);
        product_count--;
        console.log(all_purchase);
        complete_total = test_total;
        calculation();
    }

    $("#discount, #pay").on("change paste keyup", function () {
        calculation();
    });
    function calculation() {
        $('#amount').val(complete_total);
        var discount = $('#discount').val();
        if (discount == "") {
            discount = 0;
        }
        $('#sub_total').val(Number(complete_total - discount));
        var pay = $('#pay').val();
        if (pay == "") {
            pay = 0;
        }
        var after_pay = Number(complete_total - discount - pay);
        if (after_pay >= 0) {
            $('#due').val(after_pay);
            $('#advance').val(0);
        } else {
            $('#due').val(0);
            $('#advance').val(after_pay * (-1));
        }
    }
    $("#sell_btn").click(function () {
        var amount = $('#amount').val();
        var discount = $('#discount').val();
        var sub_total = $('#sub_total').val();
        var pay = $('#pay').val();
        var due = $('#due').val();
        var advance = $('#advance').val();
        var post_data = {
            'amount': amount, 'discount': discount, 'sub_total': sub_total, 'pay': pay, 'due': due, 'advance': advance,
            'all_purchase': all_purchase,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/sales_service_confirm",
            data: post_data,
            success: function (data) {
                $('#full_page').html(data);
            }
        });
    });

</script>