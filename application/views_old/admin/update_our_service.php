<?php require 'header.php'; ?>

<aside>
    <section class="col-xs-12 connectedSortable">
        <section class="content-header">
            <h1>Update About Us</h1>
        </section>
        <section class="content">
            <form action="<?php echo base_url(); ?>Show_form/update_our_service" method="post" enctype="multipart/form-data"
                  autocomplete="off">
                <div class="row">

                    <h4 style="color: red;"><?php echo validation_errors(); ?></h4>
                    <div class="form-group col-sm-12 col-xs-12">
                        <label for="about">About Us</label>
                        <textarea name="about" rows="6" id="about" class="form-control"></textarea>
                    </div>
                    <div class="form-group col-sm-3 col-xs-12">
                        <label for="c_name">Service Name*</label>
                        <input type="text" name="service_name" id="c_name" class="form-control">
                    </div>
                    <div class="form-group col-sm-3 col-xs-12">
                        <label for="address">Service Rate*</label>
                        <input type="text" name="service_rate" id="address" class="form-control">
                    </div>
                    <div class="form-group col-sm-2 col-xs-12">
                        <button style="" type="submit" class="btn btn-facebook">Submit
                        </button>
                    </div>

                </div>

                <!-- /.row -->

                <div class="row">
                    <div class="box box-info well-lg" style="overflow: scroll;">
                        <table id="example2" class="table table-bordered table-hover table-responsive">
                            <thead>
                            <tr>
                                <th style="text-align: center;">SL</th>
                                <th style="text-align: center;">About Us</th>
                                <th style="text-align: center;">Delete</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count = 0;
                            foreach ($about as $info) {
                                $count++;
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $count; ?></td>
                                    <td style="text-align: center;"><?php echo $info->about; ?></td>

                                    <td align="center">
                                        <a href="<?php echo base_url(); ?>Delete/delete_about/<?php echo $info->id; ?>"
                                           class="glyphicon glyphicon-trash">
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>

                        </table>
                    </div>
                </div>

            </form>
        </section>
    </section>
</aside>
<?php require 'footer.php'; ?>


