<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable"> 
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Product Info.</h3>                               
                    </div>

                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No.</th>
                                    <th style="text-align: center;">Product Name</th>
                                    <th style="text-align: center;">Image</th>
                                    <th style="text-align: center;">Types of Product</th>
                                    <th style="text-align: center;">Manufacture Company</th>
                                    <th style="text-align: center;">Purchase Price</th>
                                    <th style="text-align: center;">Selling Price</th>
                                    <th style="text-align: center;">Total Quantity</th>
                                    <th style="text-align: center;">Reminder Level</th>
                                    <th style="text-align: center;">Product Indication</th>
                                     <th style="text-align: center;">Product Shelf</th>
                                    <th style="text-align: center;">Shelf Details</th>
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
                                        <td style="text-align: center;"><?php echo $single_value->product_name; ?></td>
                                        <td style="text-align: center;">
                                            <img src="<?php echo base_url(); ?>assets/img/product/<?php echo $single_value->image; ?>" width="50" height="50">
                                        </td>
                                        <td style="text-align: center;"><?php echo $single_value->types_of_product; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->manufacture_company; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->purchase_price; ?> /-</td>
                                        <td style="text-align: center;"><?php echo $single_value->selling_price; ?> /-</td>
                                        <td style="text-align: center;"><?php echo $single_value->total_qty; ?> Pcs</td>
                                        <td style="text-align: center;"><?php echo $single_value->reminder_level; ?> Pcs</td>
                                        <td style="text-align: center;"><?php echo $single_value->product_indication; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->product_shelf; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->shelf_details; ?></td>
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
