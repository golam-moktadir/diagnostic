<aside>
    <section class="col-xs-12 connectedSortable">
        <section class="content-header">
            <h3>Update Contact Info</h3>
        </section>
        <section class="content">
            <form action="<?php echo base_url().'Edit/contact_us/'.$contact->id ?>" method="post"
                  autocomplete="off">
                <div class="row">
                    <div class="form-group col-sm-3 col-xs-12">
                        <label for="c_name">Company Name</label>
                        <input type="text" name="c_name" id="c_name" class="form-control" value="<?php echo $contact->c_name ?>">
                    </div>
                    <div class="form-group col-sm-3 col-xs-12">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="<?php echo $contact->address ?>">
                    </div>
                    <div class="form-group col-sm-3 col-xs-12">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $contact->email?>">
                    </div>
                    <div class="form-group col-sm-3 col-xs-12">
                        <label for="email2">Email 2 <span style="font-size: smaller">(Optional)</span></label>
                        <input type="email" name="email2" id="email2" class="form-control" value="<?php echo $contact->email2 ?>">
                    </div>
                    <div class="form-group col-sm-3 col-xs-12">
                        <label for="email3">Email 3 <span style="font-size: smaller">(Optional)</span></label>
                        <input type="email" name="email3" id="email3" class="form-control" value="<?php echo $contact->email3 ?>">
                    </div>
                    <div class="form-group col-sm-3 col-xs-12">
                        <label for="web">Web Address</label>
                        <input type="text" name="web" id="web" class="form-control" value="<?php echo $contact->web ?>">
                    </div>
                    <div class="form-group col-sm-3 col-xs-12">
                        <label for="hotline">Hotline No.</label>
                        <input type="text" name="hotline" id="hotline" class="form-control" value="<?php echo $contact->hotline ?>">
                    </div>
                    <div class="form-group col-sm-3 col-xs-12">
                        <label for="hotline2">Addtional Hotline No. <span
                                    style="font-size: smaller">(Optional)</span></label>
                        <input type="text" name="hotline2" id="hotline2" class="form-control" value="<?php echo $contact->hotline2 ?>">
                    </div>
                    <div class="form-group col-sm-3 col-xs-12">
                        <label for="hotline3">Additional Hotline No. <span style="font-size: smaller">(Optional)</span></label>
                        <input type="text" name="hotline3" id="hotline3" class="form-control" value="<?php echo $contact->hotline3 ?>" >
                    </div>
                    <div class="form-group col-sm-3 col-xs-12">
                        <button style="margin-top: 25px" type="submit" class="btn btn-success">Submit
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
                                <th style="text-align: center;">Company Name</th>
                                <th style="text-align: center;">Address</th>
                                <th style="text-align: center;">Email</th>
                                <th style="text-align: center;">Email 2</th>
                                <th style="text-align: center;">Email 3</th>
                                <th style="text-align: center;">Web Address</th>
                                <th style="text-align: center;">Hotline No.</th>
                                <th style="text-align: center;">Hotline No. 2</th>
                                <th style="text-align: center;">Hotline No. 3</th>
                                <th style="text-align: center;">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $count = 0;
                            foreach ($contacts as $info) {
                                $count++;
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $count; ?></td>
                                    <td style="text-align: center;"><?php echo $info->c_name; ?></td>
                                    <td style="text-align: center;"><?php echo $info->address; ?></td>
                                    <td style="text-align: center;"><?php echo $info->email; ?></td>
                                    <td style="text-align: center;"><?php echo $info->email2; ?></td>
                                    <td style="text-align: center;"><?php echo $info->email3; ?></td>
                                    <td style="text-align: center;"><?php echo $info->web; ?></td>
                                    <td style="text-align: center;"><?php echo $info->hotline; ?></td>
                                    <-<td style="text-align: center;"><?php echo $info->hotline2; ?></td>->
                                    <-<td style="text-align: center;"><?php echo $info->hotline3; ?></td>->
                                    <td style="text-align: center;">
                                        <a href="<?php echo base_url().'Show_edit_form/contact_us/'.$info->id ?>" class="btn btn-sm btn-success" ><i class="fa fa-edit"></i></a> 
                                    </td>

                                </tr>
                            <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </form>
        </section>
    </section>
</aside>

