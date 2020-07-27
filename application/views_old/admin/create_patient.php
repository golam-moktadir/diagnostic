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
        <div class="row">
            <section class="col-xs-12 connectedSortable"> 
                <div style="color: black; background: #a6d7ff; padding: 8px; border: 2px solid #055d9c; margin-bottom:5px;" class="no_print">
                    <?php echo form_open_multipart('Insert/create_patient'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px; color: green; font-weight: bold; text-align: center;">Add Patient Info</p>
                        <p  style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="name">Patient Name</label>
                                <input type="text" class="form-control" id="name" 
                                       placeholder="" name="name">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" id="age" placeholder="" name="age">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="height">Height</label>
                                <input type="text" class="form-control" id="height" placeholder="" name="height">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="weight">Weight</label>
                                <input type="text" class="form-control" id="weight" placeholder="" name="weight">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="mobile">Mobile No</label>
                                <input type="text" class="form-control" id="mobile" placeholder="" name="mobile">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="" name="address">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Submit <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>

                <div>
                    <div>
                        <h3 style="color: blue; text-align: center">All Patient Info.</h3>                              
                    </div>

                    <div class="box-body table-responsive" style="width: 100%; overflow-x: scroll; color: black;">
                        <table id="datatable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">SL</th>
                                    <th style="text-align: center;">Patient Name</th>
                                    <th style="text-align: center;">Age</th>
                                    <th style="text-align: center;">Mobile</th>
                                    <th style="text-align: center;">Address</th>
                                    <th style="text-align: center;">Weight</th>
                                    <th style="text-align: center;">Height</th>
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
                                        <td style="text-align: center;"><?php echo $single_value->name."[".$single_value->record_id."]"; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->age; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->mobile; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->weight; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->height; ?></td>
                                        <td style="text-align: center; white-space: nowrap;">
                                            <a style="margin: 5px;" class="btn btn-info"
                                               href="<?php echo base_url(); ?>Show_edit_form/create_patient/<?php echo $single_value->record_id; ?>/main">Edit
                                            </a>
                                            <a style="margin: 5px;" class="btn btn-danger"
                                               href="<?php echo base_url(); ?>Delete/create_patient/<?php echo $single_value->record_id; ?>">Delete
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

<script>
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