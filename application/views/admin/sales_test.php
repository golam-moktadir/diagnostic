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
                <div style="color: black; background: #a6d7ff; padding: 8px; border: 2px solid #055d9c; margin-bottom:5px;" class="no_print">
                    <div style="color: black; margin-bottom: 5px;">
                        <?php echo form_open_multipart('Insert/sell_product'); ?>
                        <div class="box-body">
                            <p style="font-size: 20px; color: green; font-weight: bold; text-align: center;">Test Invoice</p>
                            <p id="empty_msg" style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="date">Date</label>
                                <input type="text" class="form-control new_datepicker" id="date"
                                       value="<?php echo date('Y-m-d'); ?>" placeholder="Date" name="date">
                            </div>
                            <!--Patient Name Add and Insert New-->
                            <div class="form-group col-sm-4 col-xs-12">
                                <font color="red";><label for="patient_id">Patient Name</label></font>
                                <div class="input-group">
                                    <select name="patient_id" id="patient_id" class="form-control selectpicker"
                                            data-live-search="true">
                                        <option value="">--Select--</option>
                                        <?php foreach ($all_patient as $info) { ?>
                                            <option value="<?php echo $info->record_id . "###" . $info->name; ?>">
                                                <?php echo "$info->name [ID: $info->record_id]"; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <input type="text" class="form-control" id="new_patient"
                                           placeholder="New Patient Name"
                                           name="new_patient" style="display: none">
                                    <span class="input-group-addon">
                                        <button type="button" id="c_plus" style="height: 20px;"
                                                class="btn btn-success fa fa-plus-square btn-sm"></button>
                                        <button type="button" id="c_back" style="height: 20px; display:none;"
                                                class="btn btn-info fa fa-backward btn-sm"></button>
                                    </span>
                                </div>
                            </div>

                            <!--Patient Name Add and Insert New-->
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" id="age" placeholder="" name="age">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="mobile">Mobile No</label>
                                <input type="text" class="form-control" id="mobile" placeholder="" name="mobile">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <font color="red";><label for="doctor">Ref. Doctor</label></font>
                                <select id="doctor" name="doctor" class="form-control selectpicker"
                                        data-live-search ="true">
                                    <option value="">--Select--</option>
                                    <?php foreach ($doctor as $info) { ?>
                                        <option value="<?php
                                        echo $info->name .
                                        " [" . $info->designation . "]";
                                        ?>"><?php
                                                    echo $info->name .
                                                    " [" . $info->designation . "]";
                                                    ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group col-sm-5 col-xs-12">
                                <font color="red";><label for="test_name">Test Name</label></font>
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

                    <div class="box-body table-responsive" style="width: 100%; color: black;">
                        <table id="salesList" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Date</th>
                                    <th style="text-align: center;">P_ID</th>
                                    <th style="text-align: center; color: red;">P_Name</th>
                                    <th style="text-align: center; color: red;">Ref._Doctor</th>
                                    <th style="text-align: center;">Age</th>
                                    <th style="text-align: center;">Mobile</th>
                                    <th style="text-align: center;">Category</th>
                                    <th style="text-align: center; color: red;">Test_Name</th>
                                    <th style="text-align: center; color: red;">Price</th>
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
                                <td>
                                    Due<input type="text" class="form-control" id="due"
                                              value="0" style="color: black; border: black 2px solid;" name="due"
                                              readonly>
                                </td>
                                <td>
                                    Advance<input type="text" class="form-control" id="advance"
                                                  value="0" style="color: black; border: black 2px solid;" name="advance"
                                                  readonly>
                                </td>
                                <td colspan="2">
                                    D.Commission<input type="text" class="form-control" id="doctor_commission"
                                                       value="0" style="color: black; border: black 2px solid;" name="doctor_commission">
                                </td>

                            </tr>
                        </table>
                        <div class="box-footer clearfix">
                            <button style="margin-top: -10px;" type="button" class="pull-right btn btn-success btn-sm"
                                    id="sell_btn">Confirm <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                </div>

                <!--All Info Start-->
                <div>
                    <div class="box-body table-responsive" style="width: 100%; overflow-x: scroll; color: black;">
                        <div style="text-align: right; padding-right: 15px; margin-top: 15px;" class="no_print">
                            <a  id="print" onclick="window.print()" class="btn btn-warning waves-effect waves-light">
                                <i class="fa fa-print"></i>
                            </a>
                        </div>
                        <p style="font-size: 20px; color: blue; text-align: center;">Test Invoice List</p>
                        <!--                        <div style="color: black; text-align: center; margin: 0px; padding: 0px; padding-top: 20px; border-radius: 10px !important;">
                                                    <img src="<?php echo base_url(); ?>assets/img/banner.jpg" style="border-radius: 10px;"
                                                         alt="Logo" width="300px" height="80px">
                                                    <p style="font-weight: bold; padding: 0px; margin:0px; font-size: 18px;">SAMANTA PATHOLOGY COMPLEX</p>
                                                    <p style="font-weight: bold; padding: 0px; margin:0px; font-size: 16px;">Near Sonali Bank, Tetulia, Panchagarh</p>
                                                    <p style="font-weight: bold; padding: 0px; margin:0px;font-size: 16px;">Mobile: +8801724-179836, +8801974-179836</p>
                                                    <p style="font-weight: bold; font-size: 18px;"><u>Customer Copy</u></p>
                                                </div>-->
                        <table id="datatable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">SL</th>
                                    <th style="text-align: center;" class="no_print">Action</th>
                                    <th style="text-align: center;">Date</th>
                                    <th style="text-align: center;">Inv_No</th>
                                    <th style="text-align: center;">Patient[ID]</th>
                                    <th style="text-align: center;">Ref.Doctor</th>
                                    <th style="text-align: center;">Test_Name</th>
                                    <th style="text-align: center;">Total_Price</th>
                                    <th style="text-align: center;">Discount</th>
                                    <th style="text-align: center;">S.Total</th>
                                    <th style="text-align: center;">Paid</th>
                                    <th style="text-align: center;">Due</th>
                                    <th style="text-align: center;">Advance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 1; $i <= $count_it; $i++) {
                                    $test_res = "";
                                    foreach (${"pro_result" . $i} as $single_value) {
                                        $date = date('d/m/y', strtotime($single_value->date));
                                        $inv_no = $single_value->invoice_no;
                                        $patient_info = $single_value->patient_name . "[" . $single_value->patient_id . "]";
                                        $doc = $single_value->doctor_name;
                                        $test_res .= $single_value->test_name . "<br>";
                                        $amount = $single_value->amount;
                                        $discount = $single_value->discount;
                                        $sub_total = $single_value->sub_total;
                                        $pay = $single_value->pay;
                                        $due = $single_value->due;
                                        $advance = $single_value->advance;
                                    }
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $i; ?></td>
                                        <td style="text-align: center; white-space: nowrap;" class="no_print">
                                            <a class="btn btn-success" onclick="view_data(<?php echo $inv_no; ?>)">
                                                View
                                            </a>
                                            <a style="margin: 1px;" class="btn btn-info"
                                               href="<?php echo base_url(); ?>Show_edit_form/sales_test/<?php echo $inv_no; ?>">Edit
                                            </a>
                                            <a style="margin: 1px;" class="btn btn-danger"
                                               href="<?php echo base_url(); ?>Delete/sales_test/<?php echo $inv_no; ?>">Delete
                                            </a>
                                        </td>
                                        <td style="text-align: center;"><?php echo $date; ?></td>
                                        <td style="text-align: center;"><?php echo $inv_no; ?></td>
                                        <td style="text-align: center; white-space: nowrap;">
                                            <?php echo $patient_info; ?>
                                        </td>
                                        <td style="text-align: center;"><?php echo $doc; ?></td>
                                        <td style="text-align: center; white-space: nowrap;">
                                            <?php echo $test_res; ?><br>
                                        </td>
                                        <td style="text-align: center;"><?php echo $amount; ?>/-</td>
                                        <td style="text-align: center;"><?php echo $discount; ?>/-</td>
                                        <td style="text-align: center;"><?php echo $sub_total; ?>/- </td>
                                        <td style="text-align: center;"><?php echo $pay; ?>/-</td>
                                        <td style="text-align: center;"><?php echo $due; ?>/-</td>
                                        <td style="text-align: center;"><?php echo $advance; ?>/-</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--All Info Start-->


            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">

    var c_status = 0;

    $('#c_plus').on('click', function () {
        $('#patient_id').selectpicker('hide');
        $('#new_patient').show();
        $('#c_back').show();
        $('#patient_id').hide();
        $('#c_plus').hide();
        c_status = 1;
    });


    $('#c_back').on('click', function () {
        $('#patient_id').selectpicker('show');
        $('#new_patient').hide();
        $('#c_back').hide();
        $('#patient_id').show();
        $('#c_plus').show();
        $('#new_patient').val('');
        c_status = 0;
    });
//    Add and Insert Patient End

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
    $("#save_btn").click(function () {
        var date = $('#date').val();
        if (c_status == 1) {
            var patient_id = "";
            var patient_name = $('#new_patient').val();
        } else {
            var patient = $('#patient_id').val().split("###");
            var patient_id = patient[0];
            var patient_name = patient[1];
        }

        var doctor = $('#doctor').val();
        var age = $('#age').val();
        var mobile = $('#mobile').val();

        var test = $('#test_name').val().split("###");
        var test_category = test[1];
        var test_name = test[0];

        var test_price = $('#test_price').val();
        all_purchase[product_count] = new Array(date, patient_id, patient_name,
                doctor, age, mobile, test_category, test_name, test_price);
        var full_table = "";
        var test_total = 0;
        for (var i = 0; i < all_purchase.length; i++) {
            test_total += Number(all_purchase[i][8]);
            full_table += "<tr>";
            for (var j = 0; j < all_purchase[i].length; j++) {
                full_table += "<td style='text-align: center;'>" + all_purchase[i][j] + "</td>";
            }
            full_table += "<td><button class='btn btn-danger' onclick='delete_data(" + i + ")'>Delete</button></td></tr>";
        }
        $('#show_all_sales').html(full_table);
        product_count++;
        $('#amount').val(test_total);
        calculation();
    });

    function delete_data(arr_no) {
        all_purchase.splice(arr_no, 1);
        var full_table = "";
        var test_total = 0;
        for (var i = 0; i < all_purchase.length; i++) {
            test_total += Number(all_purchase[i][8]);
            full_table += "<tr>";
            for (var j = 0; j < all_purchase[i].length; j++) {
                full_table += "<td style='text-align: center;'>" + all_purchase[i][j] + "</td>";
            }
            full_table += "<td><button class='btn btn-danger' onclick='delete_data(" + i + ")'>Delete</button></td></tr>";
        }
        $('#show_all_sales').html(full_table);
        product_count--;
        $('#amount').val(test_total);
        calculation();
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

////        New patient or client
//        var client_name = $('#new_customer').val();
//        if (client_name.trim() == "" && $('#patient_id').val() != "") {
////            var client_name = "";
////            var client_name_id = $('#patient_id').val();
//        } else {
//            var client_name_id = "New";
//        }
//        New patient or client

        var amount = $('#amount').val();
        var discount = $('#discount').val();
        var sub_total = $('#sub_total').val();
        var pay = $('#pay').val();
        var due = $('#due').val();
        var advance = $('#advance').val();
        var doctor_commission = $('#doctor_commission').val();
        var post_data = {
            'amount': amount, 'discount': discount, 'sub_total': sub_total, 'pay': pay,
            'due': due, 'advance': advance, 'doctor_commission': doctor_commission,
            'all_purchase': all_purchase, 'c_status': c_status,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/sales_test_confirm",
            data: post_data,
            success: function (data) {
                $('#full_page').html(data);
            }
        });
    });

    function view_data(id) {
        var url = "<?php echo base_url() ?>Get_ajax_value/sales_test_report";
        $.ajax({
            url: url,
            type: "post",
//            dataType: "json",
            data: {'id': id},
            success: function (data) {
                $('#full_page').html(data);
            }
        });
    }
    $(document).ready(function () {
        datatable();
    });

    function datatable() {
        $('#datatable').dataTable({
            //"info":false,
            "autoWidth": false,
            "order": false,
            "oSearch": {"bSmart": false}
        });
    }
</script>

<style>
    @media print {
        @page 
        {
            size: A4 landscape;   /* auto is the current printer page size */
            margin: -5mm 0mm 0mm 10mm;
        }
        html
        {
            background-color: #FFFFFF; 
            margin: 0px;  /* this affects the margin on the html before sending to printer */
        }
        .no_print {
            display: none;
        }
        ::-webkit-scrollbar{
            display: none;
        }
        .dataTables_filter {
            display: none;
        }
        .dataTables_paginate {
            display: none;
        }
        .dataTables_info {
            display: none;
        }
        .dataTables_length {
            display: none;
        }
        .dataTables_orderable{
            display: none;
        }
        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_desc:after {
            display: none;
        }
    }
</style>