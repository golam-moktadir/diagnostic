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
<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable"> 
                <div style="color: black; background: #a6d7ff; padding: 8px; border: 2px solid #055d9c; margin-bottom:5px;" class="no_print">
                    <form action="<?php echo base_url().'product/create-product-category' ?>" method="post">
                    <h5 class="text-center text-info">Product Category Form</h5>
                    <h5 class="text-center text-success"><?php echo $this->session->flashdata('success') ?></h5>
                    <h5 class="text-center text-danger"><?php echo $this->session->flashdata('error') ?></h5>
                    <div class="box-body">
                        <div class="form-group" style="width: 400px;">
                            <label for="types_of_product" style="color: green;">Product Category</label>
                            <input type="text" class="form-control" id="types_of_medicine" placeholder="" name="types_of_product">
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success" name="submit" value="submit">Create <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>

                <div>
                    <div>
                        <h4  style="color: blue; text-align: center;">Product Category Info.</h4>                               
                    </div>

                    <div class="box-body table-responsive" style="width: 100%; overflow-x: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">SL</th>
                                    <th style="text-align: center;">Product Category</th>
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
                                        <td style="text-align: center;"><?php echo $single_value->types_of_product; ?></td>
                                        <td style="text-align: center;">
                                            <a class="btn btn-sm btn-success" href="<?php echo base_url().'product/edit-category/'.$single_value->record_id ?>"><i class="fa fa-edit"></i>
                                            <a style="margin: 5px;" class="btn btn-danger"
                                               href="<?php echo base_url(); ?>Delete/types_of_product/<?php echo $single_value->record_id; ?>"><i class="fa fa-trash-o"></i>
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