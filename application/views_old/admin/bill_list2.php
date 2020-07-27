<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;" id="no_print1">
                    <div class="box-body">
                        <p style="font-size: 20px;">Search By Bill No</p>
                        <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                                <select name="bill_id" id="bill_id" class="form-control selectpicker"
                                        data-live-search ="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_bill as $info) { ?>
                                        <option value="<?php echo $info->bill_id; ?>">
                                            <?php echo $info->bill_id; ?>
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
                
                <div  id="show_bill"></div>
                
                <div class="box box-info" id="no_print2">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">Patient Bill List</h3>
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">SL</th>
                                    <th style="text-align: center;">Bill Date</th>
                                    <th style="text-align: center;">Bill ID</th>
                                    <th style="text-align: center;">Patient ID</th>
                                    <th style="text-align: center;">Patient Name</th>
                                    <th style="text-align: center;">Invoice No</th>
                                    <th style="text-align: center;">Invoice Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 1; $i <= $count_it; $i++) {
                                    $all_invoice_total = 0;
                                    $one_time = 0;
                                    foreach (${"bill_result" . $i} as $single_value) {
                                        $one_time++;
                                        ?>
                                        <tr>
                                            <?php if ($one_time == 1) { ?>
                                                <td style="text-align: center;"><?php echo $i; ?></td>
                                                <td style="text-align: center;">
                                                    <?php
                                                    if ($single_value->bill_date != "0000-00-00") {
                                                        echo date('d F, Y', strtotime($single_value->bill_date));
                                                    }
                                                    ?>
                                                </td>
                                                <td style="text-align: center;"><?php echo $single_value->bill_id; ?></td>
                                                <td style="text-align: center;"><?php echo $single_value->patient_id; ?></td>
                                                <td style="text-align: center;"><?php echo $single_value->patient_name; ?></td>
                                            <?php } else { ?>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                                <td style="text-align: center;"></td>
                                            <?php } ?>
                                            <td style="text-align: center;"><?php echo $single_value->invoice_no; ?></td>
                                            <td style="text-align: center;">
                                                <?php
                                                echo $single_value->invoice_total;
                                                $all_invoice_total += $single_value->invoice_total;
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="6"></td>
                                        <td style="text-align: center;">Total: <?php echo $all_invoice_total; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"></td>
                                        <td style="text-align: center;">Tax: <?php echo $single_value->tax; ?></td>
                                        <td style="text-align: center;">Discount: <?php echo $single_value->discount; ?></td>
                                        <td style="text-align: center;">Paid Amount: <?php echo $single_value->total; ?></td>
                                    </tr>
                                    <tr><td colspan="10"></td></tr>
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
        var input_data = $('#bill_id').val();
        var post_data = {
            'bill_id': input_data,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/search_bill",
            data: post_data,
            success: function (data) {
                $('#show_bill').html(data);
            }
        });
    });
</script>