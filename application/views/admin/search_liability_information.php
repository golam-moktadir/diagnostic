<?php
$this->load->view('admin/header');
?>

    <style>
        label.error {
            color: red;
            font-weight: bold;
        }

        fieldset.scheduler-border {
            border: 1px groove #ddd !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0 1.5em 0 !important;
            -webkit-box-shadow: 0px 0px 0px 0px #000;
            box-shadow: 0px 0px 0px 0px #000;
        }
    </style>


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
                if ($('#date_of_issue_from').val() != "" && $('#date_of_issue_to').val() != "") {
                    var postData = {
                        "date_of_issue_from": $('#date_of_issue_from').val(),
                        "date_of_issue_to": $('#date_of_issue_to').val()
                    };
                    $.ajax({
                        type: "POST",
                        data: postData,
                        url: "<?php echo base_url(); ?>admins/search_liability_information_by_type",
                        error: function () {
                            alert("Error Happened! Try Again");
                        },
                        success: function (data) {
                            //alert(data);
                            console.log(data);
                            var Header = "";
                            if ($('#date_of_issue_from').val() != "") {
                                Header += " Date From: " + $('#date_of_issue_from').val();
                            }
                            if ($('#date_of_issue_to').val() != "") {
                                Header += " To: " + $('#date_of_issue_to').val();
                            }
                            var liability;
                            liability = "Liability";
                            Header += "Liability Type: " + liability;
                            try {
                                var search_data = $.parseJSON(data);
                                $("#example1").dataTable({
                                    aLengthMenu: [
                                        [25, 50, 100, 200, -1],
                                        [25, 50, 100, 200, "All"]
                                    ],
                                    iDisplayLength: 25,
                                    "aaData": search_data,
                                    "bDestroy": true,
                                    "bSort": false,
                                    "aoColumns": [
                                        {"mDataProp": "sl"}, {"mDataProp": "date"}, {"mDataProp": "liability"}, {"mDataProp": "sub_category"}, {"mDataProp": "credit_debit"}, {"mDataProp": "liability_from"}, {"mDataProp": "quantity"}, {"mDataProp": "amount"}
                                    ],
                                    "scrollX": true,
                                    dom: 'Bfrtip',
                                    buttons: [{
                                        text: '<i class="fa fa-lg fa-file-pdf-o"></i>',
                                        extend: 'pdf',
                                        className: 'btn btn-xs btn-primary p-5 m-0 width-35 assets-export-btn export-pdf ttip',
                                        message: Header,
                                        title: '',
                                        orientation: 'landscape',
                                        header: true,
                                        customize: function (doc) {
                                            doc.defaultStyle.fontSize = 8; //<-- set fontsize to 16 instead of 10
                                        }
                                    },
                                        {
                                            extend: 'print',
                                            text: '<i class="fa fa-lg fa-print"></i> Print</i>',
                                            className: 'btn btn-primary btn-sm m-5 width-35 assets-select-btn export-print',
                                            message: Header,
                                            title: '',
                                            orientation: 'landscape',
                                            customize: function (win) {
                                                $(win.document.body)
                                                    .css('font-size', '10pt');
                                                $(win.document.body).find('table')
                                                    .addClass('compact')
                                                    .css('font-size', 'inherit');
                                            }
                                        },
                                        {
                                            extend: 'excel',
                                            text: '<i class="fa fa-lg fa-file-excel-o"></i>',
                                            className: 'btn btn-xs btn-primary p-5 m-0 width-35 assets-export-btn export-xls ttip',
                                            message: Header,
                                            title: '',
                                            orientation: 'landscape',
                                            header: true
                                        }
                                    ]
                                });
                            } catch (e) {
                                var table = $('#example1').DataTable();
                                table.clear().draw();
                            }


                        }//end of success
                    });
                }
            });
        });

    </script>


    <!--main content start-->

    <aside class="right-side">
        <section class="content">
            <!-- page start-->
            <!-- page start-->
            <div class="row">
                <?php
                $attributes = array('class' => 'form-horizontal', 'id' => 'userEntryForm', 'role' => 'form');
                echo form_open_multipart('admins/search_report', $attributes);
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
                            <h1> Search Liability Information </h1>
                            <hr>
                            <hr>


                            <div class="form-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                <label class="col-lg-3 control-label" for="user_addr">Date From</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" readonly name="date_of_issue_from"
                                           id="date_of_issue_from" value="" placeholder="Enter Date ">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                <label class="col-lg-3 control-label" for="user_addr">Date To</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" readonly name="date_of_issue_to"
                                           id="date_of_issue_to" value="" placeholder="Enter Date ">
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
                            <legend class="scheduler-border">Liability</legend>
                            <table id="example1" class="table table-striped table-bordered" width="100%"
                                   cellspacing="0">
                                <thead>

                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Liability Type</th>
                                    <th>Sub Category</th>
                                    <th>Credit / Debit</th>
                                    <th>Liability From</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
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