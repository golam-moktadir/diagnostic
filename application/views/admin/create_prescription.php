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
            <section class="col-xs-12 connectedSortable" id="total_page">
                <div class="box box-info" style="color: black;">
                    <div class="box-body">
                        <p style="font-size: 20px;">Create Prescription</p>
                        <p id="empty_msg" style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" placeholder="" name="date"
                                       value="<?php echo date("Y-m-d");?>">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="name">Patient Name</label>
                                <select class="form-control selectpicker" id="name" name="name">
                                    <option value="">--Select--</option>
                                    <?php foreach ($all_patient as $info){?>
                                        <option value="<?php echo $info->record_id;?>"><?php echo $info->name;?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="medicine_id">Medicine & Product List </label>
                                <select id="medicine_id" name="medicine_id" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">--Select--</option>
                                    <?php foreach ($all_medicine as $info) { ?>
                                        <option value="<?php echo $info->record_id; ?>"><?php
                                            echo $info->medicine_name .
                                                " [" . $info->medicine_presentation . "]";
                                            ?></option>
                                    <?php } ?>
                                    <?php foreach ($all_product as $info) { ?>
                                        <option value="<?php echo $info->record_id; ?>"><?php
                                            echo $info->product_name .
                                                " [" . $info->types_of_product . "]";
                                            ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" id="age" placeholder="" name="age">
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="meal_type">Meal Type</label>
                                <select id="meal_type" name="meal_type" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">--Select--</option>
                                    <option value="Before Meal">Before Meal</option>
                                    <option value="After Meal">After Meal</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="weight">Weight</label>
                                <input type="text" class="form-control" id="weight" placeholder="" name="weight">
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="per_day_dose">Per Day Dose</label>
                                <select id="per_day_dose" name="per_day_dose" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">--Select--</option>
                                    <option value="1+1+1">1+1+1</option>
                                    <option value="1+0+1">1+0+1</option>
                                    <option value="1+0+0">1+0+0</option>
                                    <option value="0+0+1">0+0+1</option>
                                    <option value="0+1+0">0+1+0</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="height">Height</label>
                                <input type="text" class="form-control" id="height" placeholder="" name="height">
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="number_of_days">Number of Days</label>
                                <input type="number" class="form-control" id="number_of_days" value="7" placeholder=""
                                       name="number_of_days">
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" placeholder=""
                                       name="description">
                            </div>

                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="button" class="pull-left btn btn-success" id="save_btn">Add <i
                                    class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="test">Select Test</label>
                                <select id="test" name="test" class="form-control selectpicker"
                                        data-live-search="true">
                                    <option value="">--Select--</option>
                                    <?php foreach ($all_test as $info) { ?>
                                        <option value="<?php echo $info->record_id; ?>"><?php
                                            echo $info->test_name; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="description_test">Test Description</label>
                                <input type="text" class="form-control" id="description_test" placeholder=""
                                       name="description_test">
                            </div>
                            <div class="form-group col-sm-6 col-xs-12" style="display: none;">
                                <label for="test_rate">Rate</label>
                                <input type="text" class="form-control" id="test_rate" placeholder=""
                                       name="test_rate">
                            </div>

                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="button" class="pull-left btn btn-success" id="save_btn2">Add <i
                                    class="fa fa-arrow-circle-right"></i></button>
                    </div>
                </div>
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info.</h3>
                    </div>
                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table class="table table-bordered table-hover" style="margin-bottom: 25px;">
                            <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Goods Name</th>
                                <th style="text-align: center;">Uses Details</th>
                                <th style="text-align: center;">No of Days</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                            </thead>
                            <tbody id="show_all_goods">

                            </tbody>
                        </table>

                        <table class="table table-bordered table-hover" style="margin-top: 25px;">
                            <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Test Name</th>
                                <th style="text-align: center;">Description</th>
                                <th style="text-align: center;">Rate</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                            </thead>
                            <tbody id="show_all_tests">

                            </tbody>
                        </table>

                        <div class="box-footer clearfix">
                            <button type="button" class="pull-left btn btn-success"
                                    id="prescribe_btn">Create Prescription <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
    var all_goods = new Array();
    var goods_count = 0;
    var all_tests = new Array();
    var test_count = 0;

    $('#test').on('change',function () {
        var test_id = $("#test").val();
        var post_data = {
            'test_id': test_id,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_test_rate",
            data: post_data,
            dataType: 'json',
            success: function (data) {
                $('#test_rate').val(data[0]);
            }
        });
    });

    $('#name').on('change',function () {
        var patient_id = $("#name").val();
        var post_data = {
            'patient_id': patient_id,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_patient",
            data: post_data,
            dataType: 'json',
            success: function (data) {
                $('#age').val(data[1]);
                $('#height').val(data[2]);
                $('#weight').val(data[3]);
            }
        });
    });

    $("#save_btn").click(function () {
        var medicine_id = $("#medicine_id option:selected").text();
        var per_day_dose = $('#per_day_dose').val();
        var meal_type = $('#meal_type').val();
        var description = $('#description').val();
        var number_of_days = $('#number_of_days').val();
        all_goods[goods_count] = new Array(medicine_id, per_day_dose, meal_type, description, number_of_days);
        var full_table = "";
        for (var i = 0; i < all_goods.length; i++) {
            full_table += "<tr>";
            full_table += "<td style='text-align: center;'>" + (i + 1) + "</td>";
            for (var j = 0; j < all_goods[i].length; j++) {
                if (j == 1) {
                    full_table += "<td style='text-align: center;'>" + all_goods[i][j] + "<br>";
                }
                else if (j == 2) {
                    full_table += all_goods[i][j] + "<br>";
                } else if (j == 3) {
                    full_table += all_goods[i][j] + "</td>";
                } else {
                    full_table += "<td style='text-align: center;'>" + all_goods[i][j] + "</td>";
                }
            }
            full_table += "<td style='text-align: center;'><button class='btn btn-danger' onclick='delete_data(" + i + ")'>Delete</button></td></tr>";
        }
        $('#show_all_goods').html(full_table);
        goods_count++;
    });

    $("#save_btn2").click(function () {
        var test_name = $("#test option:selected").text();
        var test_id = $("#test").val();
        var description = $('#description_test').val();
        var test_rate = $('#test_rate').val();
        all_tests[test_count] = new Array(test_id, test_name, description, test_rate);
        var full_table = "";
        for (var i = 0; i < all_tests.length; i++) {
            full_table += "<tr>";
            full_table += "<td style='text-align: center;'>" + (i + 1) + "</td>";
            for (var j = 1; j < all_tests[i].length; j++) {
                    full_table += "<td style='text-align: center;'>" + all_tests[i][j] + "</td>";
            }
            full_table += "<td style='text-align: center;'><button class='btn btn-danger' onclick='delete_data2(" + i + ")'>Delete</button></td></tr>";
        }
        $('#show_all_tests').html(full_table);
        test_count++;
    });

    $("#prescribe_btn").click(function () {
        var date = $('#date').val();
        var name = $('#name option:selected').text();
        var age = $('#age').val();
        var weight = $('#weight').val();
        var height = $('#height').val();
        var post_data = {
            'date': date, 'name': name, 'age': age, 'weight': weight, 'height': height,
            'all_goods': all_goods,
            'all_tests': all_tests,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/show_prescription",
            data: post_data,
            success: function (data) {
                $('#total_page').html(data);
            }
        });
    });

    function delete_data(arr_no) {
        all_goods.splice(arr_no, 1);
        var full_table = "";
        for (var i = 0; i < all_goods.length; i++) {
            full_table += "<tr>";
            full_table += "<td style='text-align: center;'>" + (i + 1) + "</td>";
            for (var j = 0; j < all_goods[i].length; j++) {
                if (j == 1) {
                    full_table += "<td style='text-align: center;'>" + all_goods[i][j] + "<br>";
                }
                else if (j == 2) {
                    full_table += all_goods[i][j] + "<br>";
                } else if (j == 3) {
                    full_table += all_goods[i][j] + "</td>";
                } else {
                    full_table += "<td style='text-align: center;'>" + all_goods[i][j] + "</td>";
                }
            }
            full_table += "<td style='text-align: center;'><button class='btn btn-danger' onclick='delete_data(" + i + ")'>Delete</button></td></tr>";
        }
        $('#show_all_goods').html(full_table);
        goods_count--;
    }

    function delete_data2(arr_no) {
        all_tests.splice(arr_no, 1);
        var full_table = "";
        for (var i = 0; i < all_tests.length; i++) {
            full_table += "<tr>";
            full_table += "<td style='text-align: center;'>" + (i + 1) + "</td>";
            for (var j = 1; j < all_tests[i].length; j++) {
                full_table += "<td style='text-align: center;'>" + all_tests[i][j] + "</td>";
            }
            full_table += "<td style='text-align: center;'><button class='btn btn-danger' onclick='delete_data2(" + i + ")'>Delete</button></td></tr>";
        }
        $('#show_all_tests').html(full_table);
        test_count--;
    }
</script>