<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable"> 
                <div style="color: black; background: #a6d7ff; padding: 8px; border: 2px solid #055d9c; margin-bottom:5px;" class="no_print">
                    <form action="<?php echo base_url().'operation/create-expenditure'?>" method="post">
                    <h5 class="text-center text-info">Operation Expenditure Edit Form</h5>
                    <h5 class="text-center text-success"><?php echo $this->session->flashdata('success') ?></h5>
                    <h5 class="text-center text-danger"><?php echo $this->session->flashdata('error') ?></h5>
                    <div class="box-body">
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="expenditure_title">Expenditure Title</label>
                            <input type="text" class="form-control" id="expenditure_title" value="<?php echo $expenditure->expenditure_title ?>" name="expenditure_title">
                            <input type="hidden" name="record_id" value="<?php echo $expenditure->record_id ?>">
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="rate">Rate</label>
                            <input type="number" class="form-control" id="rate" value="<?php echo $expenditure->expenditure_rate ?>" name="expenditure_rate">
                        </div>
                    </div>
                    <div class="clearfix" style="margin-top: 17px;">
                        <button type="submit" class="pull-left btn btn-success" style="margin-top: 26px;" id="submit" name="update">Update <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>
                <h4 class="text-center text-success">Operation Expenditure Info.</h4>
                <div class="box-body table-responsive" style="width: 100%; overflow-x: scroll; color: black;">
                    <table id="datatable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="text-align: center;">SL</th>
                                <th style="text-align: center;">Expenditure</th>
                                <th style="text-align: center;">Rate</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $count = 1;
                                foreach ($expenditures as $expenditure) {
                            ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $count++; ?></td>
                                    <td style="text-align: center;"><?php echo $expenditure->expenditure_title; ?></td>
                                    <td style="text-align: center;"><?php echo $expenditure->expenditure_rate; ?></td>
                                    <td style="text-align: center;">
                                        <a class="btn btn-sm btn-success" href="<?php echo base_url().'operation/edit-expenditure/'.$expenditure->record_id ?>"><i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger" href="<?php echo base_url().'operation/delete-expenditure/'.$expenditure->record_id ?>" onclick="return confirm('Are You Sure ?')"><i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </section>
</aside>
<script>
    $(document).ready(function () {
        datatable();
    });
    function datatable() {
        $('#datatable').dataTable({
            //"info":false,
            "autoWidth": false,
            "order": false,
            "oSearch": {"bSmart": false}
        });
    }
</script>