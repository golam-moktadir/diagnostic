<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable"> 
                <div style="color: black; background: #a6d7ff; padding: 8px; border: 2px solid #055d9c; margin-bottom:5px;" class="no_print">
                    <form action="<?php echo base_url().'operation/create-operation-name'?>" method="post">
                    <h5 class="text-center text-info">Operation Name Form</h5>
                    <h5 class="text-center text-success"><?php echo $this->session->flashdata('success') ?></h5>
                    <h5 class="text-center text-danger"><?php echo $this->session->flashdata('error') ?></h5>
                    <div class="box-body">
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="category_id;">Operation Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">-- Select --</option>
                                <?php foreach ($categories as $category) { ?>
                                    <option value="<?php echo $category->record_id; ?>">
                                        <?php echo $category->category_name; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="operation_name">Operation Name</label>
                            <input type="text" class="form-control" id="operation_name" placeholder="Enter Operation Name" name="operation_name">
                        </div>
                        <div class="form-group col-sm-3 col-xs-12">
                            <label for="rate">Rate</label>
                            <input type="number" class="form-control" id="rate" placeholder="Enter Operation Rate" name="rate">
                        </div>
                    </div>
                    <div class="clearfix" style="margin-top: 17px;">
                        <button type="submit" class="pull-left btn btn-success" style="margin-top: 26px;" id="submit" name="submit" value="submit">Create <i class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>

                <div>
                    <div>
                        <h4 style="color: blue; text-align: center;">Operation Name Info.</h4>                               
                    </div>

                    <div class="box-body table-responsive" style="width: 100%; overflow-x: scroll; color: black;">
                        <table id="datatable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No.</th>
                                    <th style="text-align: center;">Operation Category</th>
                                    <th style="text-align: center;">Operation Name</th>
                                    <th style="text-align: center;">Operation Rate</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                foreach ($names as $single_value) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $count++; ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->category_name ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->operation_name ?></td>
                                        <td style="text-align: center;"><?php echo $single_value->rate ?></td>
                                        <td style="text-align: center;">
                                            <a class="btn btn-sm btn-success" href="<?php echo base_url().'operation/edit-operation-name/'.$single_value->record_id ?>"><i class="fa fa-edit"></i>
                                            </a>
                                            <a class="btn btn-sm btn-danger"
                                               href="<?php echo base_url().'operation/delete-operation-name/'.$single_value->record_id ?>" onclick="return confirm('Are You Sure ?')"><i class="fa fa-trash-o"></i>
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
    $(document).ready(function(){
        datatable();

       $("#submit").click(function(){
            var category = $("#category_id").val();
            var operation_name = $("#operation_name").val();
            var rate = $("#rate").val();

            if(category.length == 0){
                alert('Category Name is Required');
                return false;
            }
            if(operation_name.length == 0){
                alert("Please Insert an Operation Name");
                return false;
            }
            if(rate.length == 0){
                alert("Please Insert Rate Amount");
                return false;
            }
       });
    function datatable() {
        $('#datatable').dataTable({
            //"info":false,
            "autoWidth": false,
            "order": false,
            "oSearch": {"bSmart": false}
        });
    }

    });
</script>
