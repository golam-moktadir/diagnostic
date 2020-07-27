<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;">
                    <?php echo form_open_multipart('Insert/photo_gallery'); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Insert Photo.</p>
                        <h3 class="text-success text-center"><?php echo $this->session->flashdata('message')?></h3>
                        <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="image_name">Image Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter image Title">
                            </div>
                            <div class="form-group col-sm-3 col-xs-12">
                                <label>Upload Picture</label>
                                <input type="file" name="image" id="image">
                            </div>
                            <div class="box-footer col-xs-3 clearfix">
                                <button style="margin-top: 27px" type="submit" class="pull-left btn btn-success">Submit <i
                                            class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info.</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">SL</th>
                                <th style="text-align: center;">Image Title</th>
                                <th style="text-align: center;">image</th>
                                <th style="text-align: center;">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count = 0;
                            foreach ($all_value as $info) {
                                $count++;
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $count; ?></td>
                                    <td style="text-align: center;"><?php echo $info->title; ?></td>
                                    <td style="text-align: center;">
                                        <img src="<?php echo base_url(); ?>assets/img/photo_gallery/<?php echo $info->image; ?>"
                                             width="70" height="60">
                                    </td>
                                    <td style="text-align: center;">
                                        <a href="<?php echo base_url(); ?>Show_edit_form/photo_gallery/<?php echo $info->record_id; ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo base_url(); ?>Delete/photo_gallery/<?php echo $info->record_id; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>