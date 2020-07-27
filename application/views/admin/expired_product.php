<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;"><?php echo $title; ?>Expired Medicine Info.</h3>
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No.</th>
                                    <th style="text-align: center;">Medicine Name</th>
                                    <th style="text-align: center;">Manufacture Company</th>
                                    <th style="text-align: center;">Buy Date</th>
                                    <th style="text-align: center;">Voucher No.</th>
                                    <th style="text-align: center;">Purchase Price</th>
                                    <th style="text-align: center;">Selling Price</th>
                                    <th style="text-align: center;">Medicine Quantity</th>
                                    <th style="text-align: center;">Total Price</th>
                                    <th style="text-align: center;">Expiry Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                foreach ($expired_medicine as $single_value) {
                                    $count++;
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $count; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->medicine_name; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->manufacture_company; ?></td>
                                        <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->date)); ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->invoice_no; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->purchase_price; ?> /-</td>
                                        <td style="text-align: center;"><?php echo $single_value->selling_price; ?> /-</td>
                                        <td style="text-align: center;"><?php echo $single_value->medicine_qty; ?> Pcs</td>
                                        <td style="text-align: center;"><?php echo $single_value->total_price; ?></td>
                                        <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->expiry_date)); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;"><?php echo $title; ?>Expired Product Info.</h3>
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No.</th>
                                    <th style="text-align: center;">Product Name</th>
                                    <th style="text-align: center;">Manufacture Company</th>
                                    <th style="text-align: center;">Buy Date</th>
                                    <th style="text-align: center;">Voucher No.</th>
                                    <th style="text-align: center;">Purchase Price</th>
                                    <th style="text-align: center;">Selling Price</th>
                                    <th style="text-align: center;">Product Quantity</th>
                                    <th style="text-align: center;">Total Price</th>
                                    <th style="text-align: center;">Expiry Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                foreach ($expired_product as $single_value) {
                                    $count++;
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $count; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->product_name; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->manufacture_company; ?></td>
                                        <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->date)); ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->invoice_no; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->purchase_price; ?> /-</td>
                                        <td style="text-align: center;"><?php echo $single_value->selling_price; ?> /-</td>
                                        <td style="text-align: center;"><?php echo $single_value->product_qty; ?> Pcs</td>
                                        <td style="text-align: center;"><?php echo $single_value->total_price; ?></td>
                                        <td style="text-align: center;"><?php echo date('d F, Y', strtotime($single_value->expiry_date)); ?></td>
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