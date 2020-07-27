<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link href="<?php echo base_url(); ?>adminlte/css/AdminLTE.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/css/fixedHeader.dataTables.min.css" rel="stylesheet" type="text/css"/>
<!--Live Search-->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<div class="container" style="color: black; width: 100%; padding: 0px 50px;">
    <div class="box-body table-responsive"  id="view_table" style="width: 98%; overflow-x: scroll; color: black;">
    </div>
</div>

<!--<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>-->
<script src="<?php echo base_url(); ?>adminlte/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<!--<script src="<?php echo base_url(); ?>assets/js/dataTables.fixedHeader.min.js"></script>-->
<!--<script src="<?php echo base_url(); ?>assets/js/bootstrap-select.min.js"></script>-->
<script>
    view();
    function view() {
        $.ajax({
            url: "<?php echo base_url() ?>Show_data/show_service_info",
            dataType: "json",
            success: function (data) {
                $("#view_table").html(data);
                datatable();
            }
        });
    }

    function datatable() {
        $('#datatable').dataTable({
            //"info":false,
            "autoWidth": false,
            "order": false
        });
    }
</script>

<style>
/*    ::-webkit-scrollbar{
        display: none;
    }*/
/*    .dataTables_filter {
        display: none;
    }*/
/*    .dataTables_paginate {
        display: none;
    }*/
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
</style>


