<?php
//$this->load->view('admin/header');
$this->load->view('admin/header');
?>

    <script src="<?php echo base_url(); ?>public/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.min.css">

    <script src="<?php echo base_url(); ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>


    <script>
        $(document).ready(function () {
            $('#fa').hide();
            $('#ca').hide();
            $('#gl').hide();

            $('#asset_type').change(function () {
                $('#asset_type_name').val($('#asset_type option:selected').text());
                if ($(this).val() == '') {
                    $('#fa').hide();
                    $('#ca').hide();
                    $('#gl').hide();
                }
                else if ($(this).val() >= 20 && $(this).val() <= 22) {
                    $('#fa').show();
                    $('#ca').hide();
                    $('#gl').hide();
                    // var type_name = $(this).html();
                    var type = $(this).val();
                    var post_data = {
                        'type': type,
                        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                    };
                    console.log(type);
                    // console.log(type_name);
                    console.log(post_data);
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>admins/al_sub_category",
                        data: post_data,
                        success: function (data) {
                            $('#sub_c').html(data);
                        }
                    });
                }
                else if ($(this).val() >= 23 && $(this).val() <= 28) {
                    $('#baseId').val($(this).val());
                    $('#fa').hide();
                    $('#ca').hide();
                    $('#gl').show();
                }
                else if ($(this).val() == '29') {
                    $('#fa').hide();
                    $('#ca').show();
                    $('#gl').hide();
                }
            });
        });
    </script>
    <!--main content start-->
    <aside class="right-side">
        <section class="content">
            <!-- page start-->
            <div class="row">
                <?php
                $attributes = array('class' => 'form-horizontal', 'id' => 'userEntryForm', 'role' => 'form');
                echo form_open_multipart('admins/insert_asset_info', $attributes);
                ?>
                <aside class="profile-info col-lg-12">
                    <section class="panel">
                        <div class="panel-body bio-graph-info">
                            <?php
                            if ($this->session->flashdata('user_insert_msg')) {
                                echo '<div class="alert alert-block alert-success fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-ok-sign"></i></button><strong>SUCCESS! </strong>' . $this->session->flashdata('user_insert_msg') . '</div>';
                            }
                            if ($this->session->flashdata('user_insert_msg_error')) {
                                echo '<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-ok-sign"></i></button><strong>ERROR! </strong>' . $this->session->flashdata('user_insert_msg_error') . '</div>';
                            }
                            ?>
                            <h1> Create Asset Information</h1>
                            <hr>

                            <div class="form-group">
                                <label for="user_name" class="col-lg-3 control-label ">Asset Type</label>
                                <div class="col-lg-6">
                                    <select name="asset_type" id="asset_type" class="form-control">
                                        <option value="">Select</option>
                                        <?php
                                        $designationList = base_info_lists(100); //5=Asset Type
                                        foreach ($designationList as $list) {
                                            echo "<option  value= '" . $list->value . "'> " . $list->name . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" name="asset_type_name" id="asset_type_name">

                            <div id="fa" style="display: none">
                                <div class="form-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                    <label class="col-lg-3 control-label" for="user_addr"> Date </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" readonly name="fa_date" id="fa_date"
                                               value="" placeholder="Enter Date ">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="sub_c">
                                    <label for="user_name" class="col-lg-3 control-label ">Sub Category</label>
                                    <div class="col-lg-6">
                                        <select name="fa_product_name" id="fa_product_name" class="form-control">
                                            <option value="">Select</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="user_name" class="col-lg-3 control-label ">Credit / Debit</label>
                                    <div class="col-lg-6">
                                        <select name="fa_trans_type" id="fa_trans_type" class="form-control">
                                            <option value="">Select</option>
                                            <option value="Credit">Credit</option>
                                            <option value="Debit">Debit</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="user_name" class="col-lg-3 control-label ">Asset From</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="fa_product_model" value=""
                                               id="fa_product_model" placeholder="Enter Model">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label" for="user_contact">Quantity</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="fa_quantity" value=""
                                               id="fa_quantity" placeholder="Enter Quantity">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="user_name" class="col-lg-3 control-label ">Amount </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="fa_total_amount" value=""
                                               id="fa_total_amount" placeholder="Enter total amount">
                                    </div>
                                </div>
                            </div>
                            <div id="gl" style="display: none">
                                <div class="form-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                    <label class="col-lg-3 control-label" for="user_addr"> Date </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" readonly name="gl_date" id="fa_date"
                                               value="" placeholder="Enter Date ">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="user_name" class="col-lg-3 control-label ">Credit / Debit</label>
                                    <div class="col-lg-6">
                                        <select name="gl_trans_type" id="gl_trans_type" class="form-control">
                                            <option value="">Select</option>
                                            <option value="Credit">Credit</option>
                                            <option value="Debit">Debit</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="user_name" class="col-lg-3 control-label ">Asset From</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="gl_product_model" value=""
                                               id="fa_product_model" placeholder="Enter Model">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label" for="user_contact">Quantity</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="gl_quantity" value=""
                                               id="fa_quantity" placeholder="Enter Quantity">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="user_name" class="col-lg-3 control-label ">Amount </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="gl_total_amount" value=""
                                               id="fa_total_amount" placeholder="Enter total amount">
                                    </div>
                                </div>
                            </div>
                            <div id="ca" style="display: none">
                                <div class="form-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                    <label class="col-lg-3 control-label" for="user_addr"> Date </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" readonly name="ca_date" id="ca_date"
                                               value="" placeholder="Enter Date ">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="user_name" class="col-lg-3 control-label ">Credit / Debit</label>
                                    <div class="col-lg-6">
                                        <select name="ca_trans_type" id="ca_trans_type" class="form-control">
                                            <option value="">Select</option>
                                            <option value="Credit">Credit</option>
                                            <option value="Debit">Debit</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="user_name" class="col-lg-3 control-label ">Amount </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="ca_amount" id="ca_amount"
                                               placeholder="Enter total amount">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-10">
                                    <button type="submit" class="btn btn-info" style="margin-left: 10px;">Save</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </div>
                        </div>
                    </section>
                </aside>
                <?php
                echo form_close();
                ?>
            </div>

        </section>
    </aside>

<?php
$this->load->view('admin/footer');
?>