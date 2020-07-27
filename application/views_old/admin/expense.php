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
                    <?php echo form_open_multipart('Insert/expense'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px; color: green; font-weight: bold; text-align: center;">Expense Entry</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>

                        <div class="row">
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="date">Date</label>
                                <input type="text" class="form-control new_datepicker" id="date"
                                   value="<?php echo date('Y-m-d'); ?>" placeholder="Date" name="date">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="expense_head">Expense Head</label>
                                <select name="expense_head" id="expense_head" class="form-control selectpicker"
                                data-live-search="true">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($expense_head as $info) { ?>
                                        <option value="<?php echo $info->head; ?>">
                                            <?php echo $info->head; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="voucher_no">Voucher No.</label>
                                <input type="text" name="voucher_no" id="voucher_no" class="form-control">
                            </div>
                            <div class="form-group col-sm-2 col-xs-12">
                                <label for="quantity">Quantity</label>
                                <input type="text" name="quantity" id="quantity" class="form-control">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="amount">Amount</label>
                                <input type="text" name="amount" id="amount" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                            <button type="submit" class="pull-left btn btn-success">Submit <i
                                    class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>
                <div>
                    <div>
                        <h3 style="color: blue; text-align: center;">Expense Entry Info.</h3>
                    </div>

                    <div class="box-body table-responsive" style="width: 100%; overflow-x: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">SL</th>
                                <th style="text-align: center;">Date</th>
                                <th style="text-align: center;">Expense Head</th>
                                <th style="text-align: center;">Voucher No.</th>
                                <th style="text-align: center;">Quantity</th>
                                <th style="text-align: center;">Amount</th>
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
                                        <td style="text-align: center;"><?php echo $single_value->date; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->head; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->voucher_no; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->quantity; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->amount; ?></td>
                                        <td style="text-align: center;">
                                            <a style="margin: 5px;" class="btn btn-danger"
                                               href="<?php echo base_url(); ?>Delete/expense/<?php echo $single_value->record_id; ?>">Delete
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