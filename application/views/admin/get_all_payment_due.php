<div>
    <div class="box-body table-responsive" style="width: 98%; color: black;">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="text-align: center;">No.</th>
                    <th style="text-align: center;">Date</th>
                    <th style="text-align: center;">Particular</th>
                    <th style="text-align: center;">Total Amount</th>
                    <th style="text-align: center;">Paid</th>
                    <th style="text-align: center;">Due</th>
                    <th style="text-align: center;">Balance</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $balance2 = 0;
                $total_amount = 0;
                $total_paid = 0;
                $count = 0;
                foreach ($result as $info) {
                    $count++;
                    $total_amount += $info->amount;
                    $total_paid += $info->paid;
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $count; ?></td>
                        <td style="text-align: center;"><?php echo $info->date; ?></td>
                        <td style="text-align: center;"><?php echo $info->particular; ?></td>
                        <td style="text-align: center;"><?php echo $info->amount; ?></td>
                        <td style="text-align: center;"><?php echo $info->paid; ?></td>
                        <td style="text-align: center;"><?php echo $info->due; ?></td>
                        <td style="text-align: center;"><?php echo $balance2 += $info->paid - $info->amount; ?> </td>
                        <td style="text-align: center;">
                            <a style="margin: 5px;" class="btn btn-danger"
                               href="<?php echo base_url(); ?>Delete/get_all_payment_due/<?php echo $info->record_id; ?>">Delete
                            </a>
                        </td>
                    </tr>
                <?php }$balance = $total_amount - $total_paid; ?>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <div class="form-group col-sm-12 col-xs-12">
                            <label for="balance">Balance</label>
                            <input type="text" class="form-control" id="balance"
                                   readonly=" " placeholder="" name="balance" value="<?php echo $balance; ?>">
                        </div>
                    </td>
                    <td colspan="1" style="text-align: center;">
                        <div class="form-group col-sm-12 col-xs-12">
                            <label for="discount">Discount</label>
                            <input type="text" class="form-control" id="discount"
                                   placeholder="" name="balance" value="">
                        </div>
                    </td>
                    <td colspan="2" style="text-align: center;">
                        <div class="form-group col-sm-12 col-xs-12">
                            <label for="sub_total">S.Total</label>
                            <input type="text" class="form-control" id="sub_total"
                                   readonly=" " placeholder="" name="sub_total" value="">
                        </div>
                    </td>
                    <td colspan="2" style="text-align: center;">
                        <div class="form-group col-sm-12 col-xs-12">
                            <label for="pay">Pay</label>
                            <input type="text" class="form-control" id="pay" placeholder="" name="pay">
                        </div>
                    </td>
                    <td colspan="2" style="text-align: center;">
                        <div class="form-group col-sm-12 col-xs-12">
                            <label for="due">Due</label>
                            <input type="text" class="form-control" id="due" placeholder="" name="due" readonly="">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;" colspan="12">
                        <button type="button" class="btn btn-success"
                                id="confirm_btn">Confirm <i class="fa fa-arrow-circle-right"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<style>
    @media print {  
        a[href]:after {
            content: none !important;
        }
        #print_button {
            display: none;
        }
        #no_print1 {
            display: none;
        }
    }
    table.table-bordered{
        border: #55830c .5px solid;
        font-weight: bold;
        color: black;
        font-size: 15px;
    }
    table.table-bordered > thead > tr > th{
        border: #55830c .5px solid;
        font-weight: bold;
        color: black;
        font-size: 16px;
    }
    table.table-bordered > tbody > tr > td{
        border: #55830c .5px solid;
        font-weight: bold;
        color: black;
        font-size: 15px;
    }
</style>  

<script>
    $("#pay").on("change paste keyup", function () {
        calculation();
    });
    function calculation() {
        var sub_total = $('#sub_total').val();
        var pay = $('#pay').val();
        if (pay == "") {
            pay = 0;
        }
        $('#due').val(Number(sub_total - pay));

    }
    $("#discount").on("change paste keyup", function () {
        var balance = $('#balance').val();
//        var qty = $('#qty').val();
        var discount = $('#discount').val();
//        var total = parseFloat(price) * parseFloat(qty) - parseFloat(discount);
        var total = parseFloat(balance) - parseFloat(discount);
        $('#sub_total').val(total);
    });

    $('#confirm_btn').on('click', function () {
        var patient = $('#patient_id').val().split("###");
        var patient_id = patient[0];
        var patient_name = patient[1];
        var discount = $('#discount').val();
        var balance = $('#balance').val();
        var pay = $('#pay').val();
        var due = $('#due').val();
        var post_data = {
            'patient_id': patient_id, 'patient_name': patient_name, 'balance': balance, 'pay': pay, 'due': due, 'discount': discount,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_create_bill_invoice",
            data: post_data,
            success: function (data) {
                $('#show_info').html(data);
            }
        });
    });
</script>