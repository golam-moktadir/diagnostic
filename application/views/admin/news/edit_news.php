<aside>
    <section class="col-xs-12 connectedSortable">
        <section class="content-header">
            <h1>Update News</h1>
        </section>
        <section class="content">
            <form action="<?php echo base_url().'Insert/news' ?>" method="post" autocomplete="off">
                <div class="row">
                    <h3 class="text-danger text-center">
                        <?php echo $this->session->flashdata('error') ?>
                    </h3>
                    <h3 class="text-success text-center">
                        <?php echo $this->session->flashdata('success') ?>
                    </h3>
                    <div class="form-group col-sm-12 col-xs-12">
                        <label for="news">New News</label>
                        <textarea name="news" rows="6" id="news" class="form-control"><?php echo $data->news ?></textarea>
                    </div>
                    <div class="form-group col-sm-2 col-xs-12">
                        <button style="" type="submit" class="btn btn-success">Update
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
                                <th style="text-align: center;">News</th>
                                <th style="text-align: center;">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(empty($data->record_id)){
                                ?>
                                    <tr>
                                        <td colspan="3" style="text-align: center;">No data found</td>
                                    </tr>
                                <?php
                                    }
                                    else{
                                ?>
                                <tr>
                                    <td style="text-align: center;">1</td>
                                    <td style="text-align: center;"><?php echo $data->news; ?></td>
                                    <td style="text-align: center;">
                                        <a href="<?php echo base_url().'Show_edit_form/news/'.$data->record_id ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
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


