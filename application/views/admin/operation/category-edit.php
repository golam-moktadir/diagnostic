<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable"> 
                <div style="color: black; background: #a6d7ff; padding: 8px; border: 2px solid #055d9c; margin-bottom:5px;" class="no_print">
                    <form action="<?php echo base_url().'operation/create-category'?>" method="post">
                    <h5 class="text-center text-warning">Category Edit Form</h5> 
                    <div class="box-body">
                        <div class="form-group" style="width: 400px;">
                            <label for="types_of_product" style="color: green;">Operation Category</label>
                            <input type="text" class="form-control" value="<?php echo $category->category_name ?>" name="category_name">
                            <input type="hidden" name="record_id" value="<?php echo $category->record_id ?>">
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success" name="update" value="submit" >Update <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>
                <h4 class="text-center text-success">Operation Category Info.</h4>
                <div class="box-body table-responsive" style="width: 100%; overflow-x: scroll; color: black;">
                    <table id="datatable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="text-align: center;">SL</th>
                                <th style="text-align: center;">Category</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $count = 1;
                                foreach ($categories as $category) {
                            ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $count++; ?></td>
                                    <td style="text-align: center;"><?php echo $category->category_name; ?></td>
                                    <td style="text-align: center;">
                                        <a class="btn btn-sm btn-success" href="<?php echo base_url().'operation/edit-category/'.$category->record_id ?>"><i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger" href="<?php echo base_url().'operation/delete-category/'.$category->record_id ?>" onclick="return confirm('Are You Sure ?')"><i class="fa fa-trash-o"></i>
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