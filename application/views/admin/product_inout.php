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
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Insert/purchase_medicine'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Product In & Out Info</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>

                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="date_from">Date From</label>
                                <input type="text" class="form-control new_datepicker" name="date_from" id="date_from">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="date_to">Date To</label>
                                <input type="text" class="form-control new_datepicker" name="date_to" id="date_to">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="in_out">Transaction Type</label>
                                <select id="in_out" name="in_out" class="form-control selectpicker">
                                    <option value="">--Select--</option>
                                    <option value="in">In</option>
                                    <option value="out">Out</option>
                                </select>
                            </div>

                        </div>



                    </div>
                    <div class="box-footer clearfix">
                        <div class="col-sm-2 col-sm-offset-5">
                            <button type="button" class="pull-left btn btn-success" id="inout_report">Search &nbsp<i
                                        class="fa fa-search"></i></button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">Product In Out Info.</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;" id="inout">

                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
    window.onload = function () {
        $('#inout_report').on('click', function (e) {
            var inout = $('#in_out').val();
            var date_from = $('#date_from').val();
            var date_to = $('#date_to').val();
            var post_data = {
                'date_from': date_from, 'date_to': date_to, 'trans_type': inout,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Get_ajax_value/inout_report",
                data: post_data,
                success: function (data) {
                    $('#inout').html(data);
                }
            });



        });

    };
</script>