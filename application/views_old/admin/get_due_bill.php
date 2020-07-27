<div class="form-group col-sm-12 col-xs-12">
    <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th style="text-align: center;">No.</th>
            <th style="text-align: center;">Invoice No</th>
            <th style="text-align: center;">Admission Date</th>
            <th style="text-align: center;">Discharge Date</th>
            <th style="text-align: center;">Doctor Details</th>
            <th style="text-align: center;">Service Name</th>
            <th style="text-align: center;">Package Name</th>
            <th style="text-align: center;">Total</th>
            <th style="text-align: center;">Due</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $total_due = 0;
        for ($i = 1; $i <= $count_it; $i++) {
            $one_time = 0;
            foreach (${"admission_result" . $i} as $single_value) {
                $one_time++;
                ?>
                <tr>
                    <?php if ($one_time == 1) { ?>
                        <td style="text-align: center;"><?php echo $i; ?></td>
                        <td style="text-align: center;"><?php echo $single_value->invoice_no; ?></td>
                        <td style="text-align: center;">
                            <?php
                            if (!empty($single_value->admission_date)) {
                                echo date('d F, Y', strtotime($single_value->admission_date));
                            }
                            ?>

                        </td>
                        <td style="text-align: center;">
                            <?php
                            if (!empty($date)) {
                                echo date('d F, Y', strtotime($single_value->discharge_date));
                            }
                            ?>
                        </td>
                    <?php } else { ?>
                        <td style="text-align: center;"></td>
                        <td style="text-align: center;"></td>
                        <td style="text-align: center;"></td>
                        <td style="text-align: center;"></td>
                    <?php } ?>
                    <td style="text-align: center;"><?php echo $single_value->doctor_name; ?></td>
                    <td style="text-align: center;"><?php echo $single_value->service_name; ?></td>
                    <td style="text-align: center;"><?php echo $single_value->package_name; ?></td>
                    <?php if ($one_time == 1) { ?>
                        <td style="text-align: center;"><?php echo $single_value->total; ?></td>
                        <td style="text-align: center;">
                            <?php
                            echo $single_value->due_amount;
                            $total_due += $single_value->due_amount;
                            ?>
                        </td>
                    <?php } else { ?>
                        <td style="text-align: center;"></td>
                        <td style="text-align: center;"></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        <?php } ?>
        <tr>
            <td colspan="10" style="text-align: right;">Total Due: <?php echo $total_due; ?></td>
        </tr>
        </tbody>
    </table>
</div>

<div class="form-group col-sm-4 col-xs-12">
    <label for="tax">Tax (%)</label>
    <select class="form-control selectpicker" id="tax" name="tax">
        <option value="0">0 %</option>
        <option value="1">1 %</option>
        <option value="2">2 %</option>
        <option value="3">3 %</option>
        <option value="4">4 %</option>
        <option value="5">5 %</option>
    </select>
</div>
<div class="form-group col-sm-4 col-xs-12">
    <label for="discount">Discount (%)</label>
    <select class="form-control selectpicker" id="discount" name="discount">
        <option value="0">0 %</option>
        <option value="1">1 %</option>
        <option value="2">2 %</option>
        <option value="3">3 %</option>
        <option value="4">4 %</option>
        <option value="5">5 %</option>
    </select>
</div>
<div class="form-group col-sm-4 col-xs-12">
    <label for="payable_amount">Payable Amount</label>
    <input type="text" class="form-control" id="payable_amount" placeholder=""
           name="payable_amount" value="<?php echo $total_due; ?>" readonly="">
</div>
<div class="box-footer clearfix">
    <button type="button" id="create_bill" class="pull-left btn btn-success">Create Bill <i
                class="fa fa-arrow-circle-right"></i></button>
</div>
<style>
    table.table-bordered {
        border: #55830c 1px solid;
        font-weight: bold;
        color: black;
        font-size: 16px;
    }

    table.table-bordered > thead > tr > th {
        border: #55830c 1px solid;
        font-weight: bold;
        color: black;
        font-size: 18px;
    }

    table.table-bordered > tbody > tr > td {
        border: #55830c 1px solid;
        font-weight: bold;
        color: black;
        font-size: 16px;
    }
</style>

<script type="text/javascript">
    $("#discount, #tax").on("change paste keyup", function () {
        var total_amount = parseFloat(<?php echo $total_due; ?>);
        var discount = total_amount * parseFloat($('#discount').val())/100;
        var tax = total_amount * parseFloat($('#tax').val())/100;
        console.log(discount);
        console.log(tax);
        $('#payable_amount').val(Math.round((total_amount + tax) - discount));
    });
    $("#create_bill").click(function () {
        var date = $('#date').val();
        var patient = $('#patient').val();
        var total_amount = parseFloat(<?php echo $total_due; ?>);
        var discount = total_amount * parseFloat($('#discount').val())/100;
        var tax = total_amount * parseFloat($('#tax').val())/100;
        var payable_amount = $('#payable_amount').val();
        var post_data = {
            'date': date, 'patient': patient, 'tax': tax, 'discount': discount, 'payable_amount': payable_amount,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_bill_invoice",
            data: post_data,
            success: function (data) {
                $('#show_bill').html(data);
            }
        });
    });
</script>