<?php
$this->load->view('admin/header');
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/dataTables.bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/jquery.dataTables.css">
<script src="<?php echo base_url(); ?>public/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>public/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>public/js/dataTables.bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/datatable.buttons.css">
<script src="<?php echo base_url(); ?>public/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/buttons.print.min.js"></script>

<script src="<?php echo base_url(); ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
    $(document).ready(function () {

        $("#submit").click(function (e) {
            e.preventDefault();
            if ($('#date_from').val() != "" && $('#date_to').val() != "") {
                var postData = {
                    "date_from": $('#date_from').val(),
                    "date_to": $('#date_to').val()
                };
                $.ajax({
                    type: "POST",
                    data: postData,
                    url: "<?php echo base_url(); ?>admins/search_liability_report",
                    success: function (data) {
                        $('#fa').html(data);
                    }
                });
            } else {
                alert("Fill both Date fields");
            }
        });
    });
</script>

<aside class="right-side">
    <section class="content">
        <div class="row">
            <?php
            $attributes = array('class' => 'form-horizontal', 'id' => 'userEntryForm', 'role' => 'form');
            echo form_open_multipart('admins/liability_report', $attributes);
            ?>
            <aside class="profile-info col-lg-12" id="no_print1">
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
                        <h1></h1>
                        <hr>
                        <hr>
                        <div class="form-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                            <label class="col-lg-3 control-label" for="user_addr">Date From</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" readonly name="date_from"
                                       id="date_from" value="" placeholder="Enter Date ">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                            <label class="col-lg-3 control-label" for="user_addr">Date To</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" readonly name="date_to"
                                       id="date_to" value="" placeholder="Enter Date ">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-10">
                                <button type="submit" id="submit" class="btn btn-info" style="margin-left: 10px;">
                                    Search
                                </button>
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
        <div class="row" id="fa">
            <aside class="profile-info col-lg-12">
                <section class="panel">
                    <br>
                    <fieldset class="scheduler-border">
                        <table id="example1" class="table table-striped table-bordered" width="100%"
                               cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align: center">LIABILITIES</th>
                                    <th style="text-align: center">BALANCE FOREWORD</th>
                                    <th style="text-align: center">P<br>S</th>
                                    <th style="text-align: center">CREDIT</th>
                                    <th style="text-align: center">P<br>S</th>
                                    <th style="text-align: center">DEBIT</th>
                                    <th style="text-align: center">P<br>S</th>
                                    <th style="text-align: center">BALANCE</th>
                                    <th style="text-align: center">P<br>S</th>
                                </tr>
                            </thead>
                        </table>
                    </fieldset>
                </section>
            </aside>
        </div>
    </section>
</aside>
<?php
$this->load->view('admin/footer');
?>