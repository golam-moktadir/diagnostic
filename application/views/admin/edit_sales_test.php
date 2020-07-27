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
                    <?php echo form_open_multipart('Insert/sell_product'); ?>
                    <div class="box-body">
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="date">Date</label>
                            <input type="text" class="form-control new_datepicker" id="date"
                                   value="<?php echo $all_sales[0]->date; ?>" placeholder="Date" name="date">
                        </div>
                        <!--Patient Name Add and Insert New-->
                        <div class="form-group col-sm-4 col-xs-12">
                            <label for="patient_id">Patient Name</label>
                            <select name="patient_id" id="patient_id" class="form-control selectpicker"
                                    data-live-search="true">
                                <option value="<?php echo $all_sales[0]->patient_id . "###" . $all_sales[0]->patient_name; ?>">
                                    <?php echo $all_sales[0]->patient_id . " [ID: " . $all_sales[0]->patient_name . "]"; ?>
                                </option>
                                <?php foreach ($all_patient as $info) { ?>
                                <!--                                    <option value="<?php echo $info->record_id . "###" . $info->name; ?>">
                                    <?php echo "$info->name [ID: $info->record_id]"; ?>
                                                                    </option>-->
                                <?php } ?>
                            </select>
                        </div>

                        <!--Patient Name Add and Insert New-->
                        <div class="form-group col-sm-2 col-xs-12">
                            <label for="age">Age</label>
                            <input type="text" class="form-control" id="age" placeholder="" name="age" value="<?php echo $all_sales[0]->age; ?>" readonly>
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="mobile">Mobile No</label>
                            <input type="text" class="form-control" id="mobile" placeholder="" name="mobile" value="<?php echo $all_sales[0]->mobile; ?>" readonly>
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                            <label for="doctor">Ref. Doctor</label>
                            <select id="doctor" name="doctor" class="form-control selectpicker"
                                    data-live-search ="true">
                                <option value="<?php echo $all_sales[0]->doctor_name; ?>">
                                    <?php echo $all_sales[0]->doctor_name; ?>
                                </option>
                                <?php foreach ($doctor as $info) { ?>
                                    <option value="<?php echo $info->name; ?>"><?php
                                        echo $info->name .
                                        " [" . $info->department . "]";
                                        ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group col-sm-5 col-xs-12">
                            <label for="test_name">Test Name</label>
                            <select name="test_name" id="test_name" class="form-control selectpicker"
                                    data-live-search="true">
                                <option value="">-- Select --</option>
                                <?php foreach ($all_test as $info) { ?>
                                    <option value="<?php echo $info->test_name . "###" . $info->test_category; ?>"><?php
                                        echo $info->test_name .
                                        " [" . $info->test_category . "]";
                                        ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="test_price">Test Price</label>
                            <input type="text" class="form-control" id="test_price" placeholder="" name="test_price">
                        </div>

                        <div class="form-group col-sm-12 col-xs-12">
                            <button style="margin-top: 5px;" type="button"
                                    class="pull-right btn btn-success  btn-sm" id="save_btn">
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
                                    <th style="text-align: center;">PID_No</th>
                                    <th style="text-align: center;">Patient</th>
                                    <th style="text-align: center;">Ref._Doctor</th>
                                    <th style="text-align: center;">Age</th>
                                    <th style="text-align: center;">Mobile</th>
                                    <th style="text-align: center;">Test_Category</th>
                                    <th style="text-align: center;">Test_Name</th>
                                    <th style="text-align: center;">Price</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <!-- Add Multiple test name  -->
                            <tbody id="show_all_sales">

                            </tbody>


                            <tr>
                                <td colspan="">
                                    Price<input type="text" class="form-control" id="amount"
                                                style="color: black; border: black 2px solid;"
                                                value="<?php echo $all_sales[0]->amount; ?>" name="amount" readonly>
                                </td>
                                <td colspan="2">
                                    Discount<input type="text" class="form-control" id="discount"
                                                   style="color: black; border: black 2px solid;"
                                                   value="<?php echo $all_sales[0]->discount; ?>" placeholder="Discount" name="discount">
                                </td>
                                <td colspan="2">
                                    Sub Total<input type="text" class="form-control" id="sub_total"
                                                    value="<?php echo $all_sales[0]->sub_total; ?>" style="color: black; border: black 2px solid;"
                                                    name="sub_total" readonly>
                                </td>
                                <td colspan="2">
                                    Paid<input type="text" class="form-control" id="pay" readonly=""
                                               value="<?php echo $all_sales[0]->pay; ?>" style="color: black; border: black 2px solid;" name="pay">
                                </td>
                                <td>
                                    Due<input type="text" class="form-control" id="due"
                                              value="<?php echo $all_sales[0]->due; ?>" style="color: black; border: black 2px solid;" name="due"
                                              readonly>
                                </td>
                                <td>
                                    Advance<input type="text" class="form-control" id="advance"
                                                  value="<?php echo $all_sales[0]->advance; ?>" style="color: black; border: black 2px solid;" name="advance"
                                                  readonly>
                                </td>
                                <td colspan="2">
                                    D.Commission<input type="text" class="form-control" id="doctor_commission"
                                                       value="<?php echo $all_sales[0]->doctor_commission; ?>" style="color: black; border: black 2px solid;" name="doctor_commission"
                                                       >
                                </td>
                            </tr>
                        </table>
                        <div class="box-footer clearfix">
                            <button style="margin-top: -10px;" type="button" class="pull-right btn btn-success btn-md"
                                    id="sell_btn">Confirm <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
    $("#test_name").on("change paste keyup", function () {
//        var test_name = $('#test_name').val();
        var test = $('#test_name').val().split("###");
        var test_category = test[0];
        var test_name = test[1];
        var post_data = {
            'test_category': test_category, 'test_name': test_name,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_test_price",
            data: post_data,
            success: function (data) {
                $('#test_price').val(data);
            }
        });
    });

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

    var all_purchase = new Array();
    var product_count = 0;
    already_added();
    function already_added() {
<?php foreach ($all_sales as $single) { ?>
            all_purchase[product_count] = new Array('<?php echo $single->date; ?>', '<?php echo $single->patient_id; ?>', '<?php echo $single->patient_name; ?>',
                    '<?php echo $single->doctor_name; ?>', '<?php echo $single->age; ?>', '<?php echo $single->mobile; ?>', '<?php echo $single->test_category; ?>',
                    '<?php echo $single->test_name; ?>', '<?php echo $single->test_price; ?>');
            product_count++;
<?php } ?>
        show_added_table();
    }
    $("#save_btn").click(function () {
        var date = $('#date').val();
        var patient = $('#patient_id').val().split("###");
        var patient_id = patient[0];
        var patient_name = patient[1];

        var doctor = $('#doctor').val();
        var age = $('#age').val();
        var mobile = $('#mobile').val();

        var test = $('#test_name').val().split("###");
        var test_category = test[1];
        var test_name = test[0];

        var test_price = $('#test_price').val();
        all_purchase[product_count] = new Array(date, patient_id, patient_name,
                doctor, age, mobile, test_category, test_name, test_price);
        show_added_table();
        product_count++;
        calculation();
    });

    function delete_data(arr_no) {
        all_purchase.splice(arr_no, 1);
        show_added_table();
        product_count--;
        calculation();
    }

    function show_added_table() {
        var full_table = "";
        var test_total = 0;
        for (var i = 0; i < all_purchase.length; i++) {
            test_total += Number(all_purchase[i][8]);
            full_table += "<tr>";
            for (var j = 0; j < all_purchase[i].length; j++) {
                full_table += "<td style='text-align: center;'>" + all_purchase[i][j] + "</td>";
            }
            full_table += "<td style='text-align: center;'><button class='btn btn-danger' onclick='delete_data(" + i + ")'>Delete</button></td></tr>";
        }
        $('#show_all_sales').html(full_table);
        $('#amount').val(test_total);
    }
    $("#discount, #pay").on("change paste keyup", function () {
        calculation();
    });
    function calculation() {
        var complete_total = $('#amount').val();
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
        var doctor_commission = $('#doctor_commission').val();
        var old_inv = <?php echo $all_sales[0]->invoice_no; ?>;
        var post_data = {
            'amount': amount, 'discount': discount, 'sub_total': sub_total, 'pay': pay,
            'due': due, 'advance': advance, 'doctor_commission': doctor_commission,
            'all_purchase': all_purchase, 'old_inv': old_inv,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/edit_sales_test_confirm",
            data: post_data,
            success: function (data) {
                $('#full_page').html(data);
            }
        });
    });

</script>