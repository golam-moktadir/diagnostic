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
<aside>
    <section class="content">
        <section class="col-xs-12 connectedSortable"> 
            <div style="color: black; background: #a6d7ff; padding: 8px; border: 2px solid #055d9c; margin-bottom:5px;" class="row no_print">
                <?php echo form_open_multipart('Test_result/test_result'); ?>
                <p style="font-size: 20px; color: green; font-weight: bold; text-align: center;">Test Result Input</p>
                <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                <div class="form-group col-sm-3 col-xs-12">
                    <label for="date">Specimen Collection Date</label>
                    <input type="text" class="form-control new_datepicker" id="date"
                           value="<?php echo date('Y-m-d'); ?>" placeholder="Date" name="date">
                </div>
                <div class="form-group col-sm-3 col-xs-12">
                    <font color="red";><label for="patient_id">Patient ID & Name </label></font>
                    <select id="patient_id" name="patient_id" class="form-control selectpicker"
                            data-live-search ="true">
                        <option value="">--Select--</option>
                        <?php foreach ($all_patient as $info) { ?>
                            <option value="<?php echo $info->record_id . "###" . $info->name; ?>">
                                <?php echo $info->name . "[" . $info->record_id . "]"; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-3 col-xs-12">
                    <label for="age">Age</label>
                    <input type="text" class="form-control" id="age" placeholder="" name="age">
                </div>
                <div class="form-group col-sm-3 col-xs-12">
                    <font color="red";><label for="sex">Gender</label></font>
                    <select name="sex" id="sex" class="form-control">
                        <option value="">-- Select --</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group col-sm-3 col-xs-12">
                    <label for="ref_by">Reference Doctor</label>
                    <input type="text" class="form-control" id="ref_by" placeholder="" name="ref_by">
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <font color="red";><label for="test_category">Test Name</label></font>
                    <select name="test_category" id="test_category" class="form-control selectpicker" data-live-search ="true">

                    </select>
                </div>
                <div class="form-group col-sm-3 col-xs-12">
                    <label for="report_date">Reporting Date</label>
                    <input type="text" class="form-control new_datepicker" id="date"
                           value="<?php echo date('Y-m-d'); ?>" placeholder="report_date" name="report_date">
                </div>
                <div id="show_info"></div>
                <div class="clearfix form-group col-sm-2 col-xs-12" style="margin-top: 26px;">
                    <button type="submit" class="pull-left btn btn-success">Confirm <i class="fa fa-arrow-circle-right"></i></button>
                </div>
                </form>
            </div>

            <div class="box-body table-responsive" style="width: 100%; overflow-x: scroll; color: black;">
                <div style="text-align: right; padding-right: 15px; margin-top: 15px;" class="no_print">
                    <a  id="print" onclick="window.print()" class="btn btn-warning waves-effect waves-light">
                        <i class="fa fa-print"></i>
                    </a>
                </div>
                <div class="box-header">
                    <h4 class="box-title" style="color: blue; text-align: center;">All Test Result Info.</h4>
                </div>

                <table id="datatable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No.</th>
                            <th style="text-align: center;">Result_ID</th>
                            <th style="text-align: center;">Collection_Date</th>
                            <th style="text-align: center;">Patient_Name_[ID]</th>
                            <th style="text-align: center;">Ref._Doctor</th>
                            <th style="text-align: center;">Category</th>
                            <th style="text-align: center;">Test_Name</th>
                            <th style="text-align: center;">Reporting_Date</th>
                            <!--<th style="text-align: center;">Result</th>-->
                            <th style="text-align: center;" class="no_print">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        foreach ($all_test_result as $single_value) {
                            $count++;
                            ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $count; ?></td>
                                <td style="text-align: center;"><?php echo $single_value->record_id; ?></td>
                                <td style="text-align: center;"><?php echo $single_value->date; ?></td>
                                <td style="text-align: center;"><?php echo $single_value->patient_name . " [" . $single_value->patient_id . "]"; ?></td>
                                <td style="text-align: center;"><?php echo $single_value->doctor_name; ?></td>
                                <td style="text-align: center;"><?php echo $single_value->test_category; ?></td>
                                <td style="text-align: center;"><?php echo $single_value->test_name; ?></td>
                                <td style="text-align: center;"><?php echo $single_value->report_date; ?></td>
                                <td style="text-align: center;" class="no_print">
                                    <a style="margin: 5px;" class="btn btn-warning"
                                       href="<?php echo base_url(); ?>Test_result/show_report/<?php echo $single_value->record_id; ?>">Report
                                    </a>
                                    <a style="margin: 5px;" class="btn btn-danger"
                                       href="<?php echo base_url(); ?>Delete/test_result/<?php echo $single_value->record_id; ?>">Delete
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </section>
</aside>

<script type="text/javascript">
    $("#test_category").on("change paste keyup", function () {
        var test_name_category = $('#test_category').val().split("###");
        var test_category = test_name_category[1];
        var test_name = test_name_category[0];
//        alert(test_category);
        var post_data = {
            'test_name': test_name, 'test_category': test_category,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
//        console.log(post_data);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_test_form",
            data: post_data,
            success: function (data) {
                $('#show_info').html(data);
            }
        });
    });

    $("#patient_id").on("change paste keyup", function () {
        var patient = $('#patient_id').val().split("###");
        var date = $('#date').val();
        var patient_id = patient[0];
        var patient_name = patient[1];
        var post_data = {
            'patient_id': patient_id, 'date': date,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_patient_age_category",
            data: post_data,
            dataType: 'json',
            success: function (data) {
                $('#age').val(data[0]);
                $('#test_category').html(data[1]);
                $('#ref_by').val(data[2]);
                $('#test_category').selectpicker("refresh");
            }
        });
    });

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