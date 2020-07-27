
<style>
    .content{ padding-top: 0px; margin-top: 0px;}
    .form-group{ margin-bottom: 5px;}
    .final_btn{margin-top: 27px; margin-bottom: 8px;}
    .table tbody tr:hover td, .table tbody tr:hover th {background-color: #76e094;}
</style>
<aside>
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div style="color: black;" id="no_print1">
                    <div class="box-body">
                        <p style="font-size: 20px;">All Test Report</p>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="test_id">Test ID</label>
                                <select name="test_id" id="test_id" class="form-control">
                                    <option value="">-- Select --</option>
                                    <?php foreach ($all_test as $info) { ?>
                                        <option value="<?php echo $info->unique_id; ?>">
                                            <?php echo $info->unique_id; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <button type="button" class="pull-left btn btn-info" style="margin-top: 24px; width: 150px;"
                                        id="search_btn">Search <i class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="show_info"><?php
                    for ($i = 1; $i <= 100; $i++) {
                        echo "<br>";
                    }
                    ?></div>
            </section>
        </div>
    </section>
</aside>

<script type="text/javascript">
    $('#search_btn').on('click', function (e) {
        var test_id = $('#test_id').val();
        var post_data = {
            'test_id': test_id,
             '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_all_test_report",
            data: post_data,
            success: function (data) {
                $('#show_info').html(data);
            }
        });
    });
</script>