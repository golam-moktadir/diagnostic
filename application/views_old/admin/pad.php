<div style="text-align: right; padding-right: 0px;" class="no_print">
    <button  id="print" onclick="window.print()" class="btn btn-warning waves-effect waves-light">
        <i class="fa fa-print"></i>
    </button>
    <button class="btn btn-danger waves-effect waves-light" onclick="close_invoice();">
        <i class="fa fa-window-close-o"></i>
    </button> 
</div>
<?php foreach ($one_value as $single) { ?>
    <div  style="color: black; font-weight: bolder; font-size: 14px;">
        <div>
            <div class="row">
                <div class="form-group col-sm-6 col-xs-6" style="text-align: left;padding-top:0px;margin-top:0px;">
                    Patient ID: <?php echo $single->patient_id; ?>
                </div>
                <div class="form-group col-sm-6 col-xs-6" style="text-align: left;padding-top:0px;margin-top:0px;">
                    Prescription No.: <?php echo $single->record_id; ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6 col-xs-6" style="text-align: left;padding-top:0px;margin-top:0px;">
                    Name: <?php echo $single->patient_name; ?>
                </div>
                <div class="form-group col-sm-6 col-xs-6" style="text-align: left;padding-top:0px;margin-top:0px;">
                    Prescription Type: Consultant
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6 col-xs-6" style="text-align: left;padding-top:0px;margin-top:0px;">
                    Phone: <?php echo $single->mobile; ?>
                </div>
                <div class="form-group col-sm-6 col-xs-6" style="text-align: left;padding-top:0px;margin-top:0px;">
                    Date: <?php echo $single->date . " " . date("h:i A", strtotime($single->appointment_time)); ?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6 col-xs-6" style="text-align: left;padding-top:0px;margin-top:0px;">
                    Age: <?php echo $single->age; ?>
                </div>
                <div class="form-group col-sm-6 col-xs-6" style="text-align: left;padding-top:0px;margin-top:0px;">
                    Consultant Name: <?php echo $single->doctor_name; ?>
                </div>
            </div>
            <hr style="height: 1px; background-color: black;">

            <div class="vl"></div>
        </div>
    </div>
    </div>
<?php } ?>

<style>
    .vl {
        border-left: 1px solid black;
        margin-left: 200px;
        height: 500px;
    }
    @media print {
        @page 
        {
            /* 182mm 257mm  */
            size: A4 portrait ;   /* auto is the current printer page size */

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
