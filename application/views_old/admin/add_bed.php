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
<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Insert/add_bed'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Create Bed Info.</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>

                        <div class="form-group" style="width: 400px;">
                            <label for="date">date</label>
                            <input type="text" class="form-control" id="date" placeholder="" name="date"
                                   value="<?php echo date("Y-m-d");?>" readonly>
                        </div>

                        <div class="form-group" style="width: 400px;">
                            <label for="bed_type">Bed Type</label>
                            <select name="bed_type" id="bed_type" class="form-control selectpicker"
                                    data-live-search="true">
                                <option value="">-- Select --</option>
                                <?php foreach ($all_bed_type as $info) { ?>
                                    <option value="<?php echo $info->bed_type; ?>"><?php echo $info->bed_type; ?></option>
                                <?php } ?>
                            </select>

                        </div>

                        <div class="form-group" style="width: 400px;">
                            <label for="bed_qty">No. of Beds</label>
                            <input type="text" class="form-control" id="bed_qty" placeholder="" name="bed_qty" value=0>
                        </div>

                        <div class="form-group" style="width: 400px; display: none;" >
                            <label for="price">Purchase Price</label>
                            <input type="text" class="form-control" id="price" placeholder="" name="price" value=0>
                        </div>

                        <div class="form-group" style="width: 400px; display: none;">
                            <label for="total">Total Amount</label>
                            <input type="text" class="form-control" id="total" placeholder="" name="total" readonly>
                        </div>

                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Add &nbsp<i
                                class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>

                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info.</h3>
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Date</th>
                                <th style="text-align: center;">Bed Type</th>
                                <th style="text-align: center;">No. of Beds</th>
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
                                    <td style="text-align: center;"><?php echo $single_value->bed_type; ?></td>
                                    <td style="text-align: center;"><?php echo $single_value->bed_qty; ?></td>
                                    <td style="text-align: center;">
                                        <a style="margin: 5px;" class="btn btn-danger"
                                           href="<?php echo base_url(); ?>Delete/add_bed/<?php echo $single_value->record_id; ?>">Delete
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

<script type="text/javascript">

    $('#bed_qty').on('change keyup paste',function () {
       var qty =  $('#bed_qty').val();
       var price =  $('#price').val();

       var total = qty * price;
       $('#total').val(total);
    });

    $('#price').on('change keyup paste',function () {
       var qty =  $('#bed_qty').val();
       var price =  $('#price').val();

       var total = qty * price;
       $('#total').val(total);
    });

</script>