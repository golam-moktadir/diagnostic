<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;" id="no_print1">
                    <div class="box-body">
                        <p style="font-size: 20px;">Search By Invoice No</p>
                        <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                                <select name="invoice_no" id="invoice_no" class="form-control selectpicker"
                                        data-live-search ="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_invoice as $info) { ?>
                                        <option value="<?php echo $info->invoice_no; ?>">
                                            <?php echo $info->invoice_no; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <button type="button" class="pull-left btn btn-success"
                                        id="search_btn">Search <i class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div  id="show_invoice"></div>
                
                <div class="box box-info" id="no_print2">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">Patient Admission List</h3>
                    </div>
                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No.</th>
                                    <th style="text-align: center;">Invoice No</th>
                                    <th style="text-align: center;">Patient ID</th>
                                    <th style="text-align: center;">Patient Name</th>
                                    <th style="text-align: center;">Patient Details</th>
                                    <th style="text-align: center;">Admission Date</th>
                                    <th style="text-align: center;">Discharge Date</th>
                                    <th style="text-align: center;">Doctor Details</th>
                                    <th style="text-align: center;">Service Name</th>
                                    <th style="text-align: center;">Package Name</th>
                                    <th style="text-align: center;">Guardian Name</th>
                                    <th style="text-align: center;">Relation</th>
                                    <th style="text-align: center;">Contact</th>
                                    <th style="text-align: center;">Address</th>
                                    <th style="text-align: center;">Total</th>
                                    <th style="text-align: center;">Due</th>
                                    <th style="text-align: center;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 1; $i <= $count_it; $i++) {
                                    $one_time = 0;
                                    foreach (${"admission_result" . $i} as $single_value) {
                                        $one_time++;
                                        ?>
                                        <tr>
                                            <?php if ($one_time == 1) { ?>
                                                <td style="text-align: center;"><?php echo $i; ?></td>
                                                <td style="text-align: center;"><?php echo $single_value->invoice_no; ?></td>
                                                <td style="text-align: center;"><?php echo $single_value->patient_id; ?></td>
                                                <td style="text-align: center;"><?php echo $single_value->patient_name; ?></td>
                                                <td style="text-align: center;">
                                                    <?php echo $single_value->age . "<br>" . $single_value->height . "<br>" . $single_value->weight; ?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <?php
                                                    if ($single_value->admission_date != "0000-00-00") {
                                                        echo date('d F, Y', strtotime($single_value->admission_date));
                                                    }
                                                    ?>

                                                </td>
                                                <td style="text-align: center;">
                                                    <?php
                                                    if ($single_value->discharge_date != "0000-00-00") {
                                                        echo date('d F, Y', strtotime($single_value->discharge_date));
                                                    }
                                                    ?>
                                                </td>
                                            <?php } else { ?>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                            <?php } ?>
                                            <td style="text-align: center;"><?php echo $single_value->doctor_name; ?></td>
                                            <td style="text-align: center;"><?php echo $single_value->service_name; ?></td>
                                            <td style="text-align: center;"><?php echo $single_value->package_name; ?></td>
                                            <?php if ($one_time == 1) { ?>
                                                <td style="text-align: center;"><?php echo $single_value->guardian_name; ?></td>
                                                <td style="text-align: center;"><?php echo $single_value->relation; ?></td>
                                                <td style="text-align: center;"><?php echo $single_value->contact; ?></td>
                                                <td style="text-align: center;"><?php echo $single_value->address; ?></td>
                                                <td style="text-align: center;"><?php echo $single_value->total; ?></td>
                                                <td style="text-align: center;"><?php echo $single_value->due_amount; ?></td>
                                                <td style="text-align: center;">
                                                    <?php
                                                    if ($single_value->status == 1) {
                                                        echo "Paid";
                                                    }
                                                    ?>
                                                </td>
                                            <?php } else { ?>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                    <tr><td colspan="17"></td></tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>

<style>
    table.table-bordered{
        border: #55830c 1px solid;
        font-weight: bold;
        color: black;
        font-size: 16px;
    }
    table.table-bordered > thead > tr > th{
        border: #55830c 1px solid;
        font-weight: bold;
        color: black;
        font-size: 18px;
    }
    table.table-bordered > tbody > tr > td{
        border: #55830c 1px solid;
        font-weight: bold;
        color: black;
        font-size: 16px;
    }
</style>  

<script type="text/javascript">
    $("#search_btn").click(function () {
        var input_data = $('#invoice_no').val();
        var post_data = {
            'invoice_no': input_data,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/search_admission_invoice",
            data: post_data,
            success: function (data) {
                $('#show_invoice').html(data);
            }
        });
    });
</script>