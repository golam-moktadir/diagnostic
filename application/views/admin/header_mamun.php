<?php $user_type = $this->session->ses_user_type; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>New Popular Hospital</title>
        <link rel="Tab Icon" type="image/png" href="<?php echo base_url(); ?>assets/img/fab.jpg"/>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo base_url(); ?>adminlte/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>adminlte/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/w3.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>adminlte/css/AdminLTE.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/css/fixedHeader.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select.min.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">

        <!--Live Search-->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    </head>

    <body>
        <div class="container-fluid"  style="position: fixed; z-index: 500; width: 100%;">
            <div class="row">
                <div class="navbar navbar-inverse" style="background-color: #066;
                     color: white; border: 0px; margin-left: 20px; margin-right: 20px;">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse row" style="padding: 8px; font-size: 16px; font-weight: bold;">
                            <?php if ($user_type == "admin") { ?>
                              <div class="col-sm-1 col-xs-12"
                             style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                            <a style="color: wheat; cursor: pointer;" class="dropdown-toggle sub_hide"
                               data-toggle="dropdown">Web Part<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a href="<?php echo base_url(); ?>Show_form/about_us/main">
                                        <i class="fa fa-th text-fuchsia"></i>
                                        <span>About Us</span>
                                    </a>
                                </li>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a href="<?php echo base_url(); ?>Show_form/test_price/main">
                                        <i class="fa fa-th text"></i>
                                        <span>Our Service</span>
                                    </a>
                                </li>
                               <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a href="<?php echo base_url(); ?>Show_form/single_page_content/main">
                                        <i class="fa fa-th text-yellow"></i>
                                        <span>Insert Basic Info.</span>
                                    </a>
                                </li>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a href="<?php echo base_url(); ?>Show_form/create_doctor/main">
                                        <i class="fa fa-th text-yellow"></i>
                                        <span>Insert Doctors Info.</span>
                                    </a>
                                </li>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a href="<?php echo base_url(); ?>Show_form/photo_gallery/main">
                                        <i class="fa fa-th text-teal"></i>
                                        <span>Photo Gallery</span>
                                    </a>
                                </li>
                                <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                    <a href="<?php echo base_url(); ?>Show_form/contact_us/main">
                                        <i class="fa fa-th text-blue"></i>
                                        <span>Contact Us</span>
                                    </a>
                                </li>   
                            </ul>
                        </div>
                                <div class="col-sm-1 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                    <a style="color: wheat;" href="<?php echo base_url(); ?>Log_in_out/logout">Logout</a>
                                </div>
<!--                                <div class="col-sm-1 col-xs-12" style="text-align: center; font-size: 15px; color: white;">
                                    <?php echo date('l'); ?><br><?php echo date('d-M-y'); ?>
                                </div>-->
                            <?php } ?>

                            <?php if ($user_type == "ssssss") { ?>
                                <div class="col-sm-2 col-xs-12" style="text-align: center;">
                                    <img src="<?php echo base_url(); ?>assets/img/banner.jpg"  
                                         style="width: 80px; height: 40px; border-radius: 5px;"
                                         alt="Logo">
                                </div>
                                <div class="col-sm-3 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                    <a style="color: wheat;" href="<?php echo base_url(); ?>Log_in_out">Dashboard</a>
                                </div>
                                <div class="col-sm-3 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                    <a style="color: wheat; cursor: pointer;" class="dropdown-toggle" 
                                       data-toggle="dropdown">SELECT MENU<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <?php
                                        $permission = explode('#', $this->session->ses_permission);
                                        foreach ($permission as $single_permission) {
                                            if (!empty($single_permission)) {
                                                ?>
                                                <?php if ($single_permission == 1) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/create_vehicle_type/main">
                                                            <i class="fa fa-plus-square text-yellow"></i>Create Transport Type</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 2) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/create_owner_user_unit/main">
                                                            <i class="fa fa-plus-square text-grey"></i>Create Owner/User Unit</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 3) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/create_papers_name/main">
                                                            <i class="fa fa-plus-square text-aqua"></i>Create Papers Name</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 4) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/create_product_type/main">
                                                            <i class="fa fa-plus-square text-olive"></i>Create Parts Category</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 5) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/create_parts_name/main">
                                                            <i class="fa fa-plus-square text-fuchsia"></i>Create Parts Name </a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 6) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/create_supplier/main">
                                                            <i class="fa fa-plus-square text-yellow"></i>Create Supplier name </a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 7) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/create_counter/main">
                                                            <i class="fa fa-plus-square text-green"></i>Create Counter name </a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 8) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/create_root/main">
                                                            <i class="fa fa-plus-square text-orange"></i>Create Route Name</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 9) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/create_sub_root/main">
                                                            <i class="fa fa-plus-square text-orange"></i>Create Sub-route Name</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 10) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/create_coach/main">
                                                            <i class="fa fa-plus-square text-blue"></i>Create Coach No</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 11) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/create_bank/main">
                                                            <i class="fa fa-plus-square text-grey"></i>Create Bank Name</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 12) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/income_head/main"><i
                                                                class="fa fa-plus-square text-purple"></i>Create Head of Income</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 13) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/expense_head/main"><i
                                                                class="fa fa-plus-square text-lime"></i>Create Head of Expenditure</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 14) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/route_line_expenses/main"><i
                                                                class="fa fa-plus-square text-lime"></i>Line Expense Head</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 15) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/create_designation/main">
                                                            <i class="fa fa-plus-square text-red"></i>Create Designation</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 16) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/create_user/main">
                                                            <i class="fa fa-plus-square text-light-blue"></i>Create User</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 17) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/insert_staff/main">
                                                            <i class="fa fa-pencil-square-o text-light-blue"></i>Insert Staff Info.</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 18) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/vehicle_details/main">
                                                            <i class="fa fa-pencil-square-o text-red"></i>Insert Transport Info.</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 19) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/change_vehicle_info/main">
                                                            <i class="fa fa-pencil-square-o text-green"></i>Insert Change Transport Info.</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 20) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/insert_papers_info/main">
                                                            <i class="fa fa-pencil-square-o text-grey"></i>Insert Papers Info.</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 21) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/insert_log_data/main">
                                                            <i class="fa fa-pencil-square-o text-green"></i>Insert Log Sheet Info.</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 22) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/insert_run_km/main">
                                                            <i class="fa fa-pencil-square-o text-aqua"></i>Insert Run Kilometer (KM)<b style="color: red">*</b></a>
                                                    </li>
                                                <?php } ?>

                                                <?php if ($single_permission == 23) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/petty_cash/main">
                                                            <i class="fa fa-pencil-square-o text-olive"></i>Insert Petty Cash Info.</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 24) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a class="test" href="#">
                                                            <i class="fa fa-pencil-square-o text-red"></i>Parts Info.<span class="caret"></span>
                                                        </a>
                                                        <ul class="subtog dropdown-menu">
                                                            <li style="margin: 5px; font-size: 15px; text-align: left;">
                                                                <a href="<?php echo base_url(); ?>Show_form/insert_spare_parts_info/main">
                                                                    <i class="fa fa-pencil-square text-red"></i>Credit Parts Info.</a>
                                                            </li>
                                                            <li style="margin: 5px; font-size: 15px; text-align: left;">
                                                                <a href="<?php echo base_url(); ?>Show_form/insert_credit_general/main">
                                                                    <i class="fa fa-pencil-square text-blue"></i>Credit General Exp. Info.</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 25) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a class="test" href="#">
                                                            <i class="fa fa-pencil-square-o text-yellow"></i>Bill Register<span class="caret"></span>
                                                        </a>
                                                        <ul class="subtog dropdown-menu">
                                                            <li style="margin: 5px; font-size: 15px; text-align: left;">
                                                                <a href="<?php echo base_url(); ?>Show_form/bill_register_info/main">
                                                                    <i class="fa fa-pencil-square text-gray"></i>Bill Register Info.</a>
                                                            </li>
                                                            <li style="margin: 5px; font-size: 15px; text-align: left;">
                                                                <a href="<?php echo base_url(); ?>Show_form/bill_payment_register/main">
                                                                    <i class="fa fa-pencil-square text-primary"></i>Bill Payment Register</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 26) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/create_line_expenses/main">
                                                            <i class="fa fa-pencil-square-o text-purple"></i>Line Expense</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 27) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a class="test" href="#">
                                                            <i class="fa fa-pencil-square-o text-olive"></i>Daily Cash<span class="caret"></span>
                                                        </a>
                                                        <ul class="subtog dropdown-menu">
                                                            <li style="margin: 5px; font-size: 15px; text-align: left;">
                                                                <a href="<?php echo base_url(); ?>Show_form/income/main">
                                                                    <i class="fa fa-pencil-square text-red"></i>Bus Income & Expense</a>
                                                            </li>
                                                            <li style="margin: 5px; font-size: 15px; text-align: left;">
                                                                <a href="<?php echo base_url(); ?>Show_form/expense/main">
                                                                    <i class="fa fa-pencil-square text-yellow"></i>Voucher Expense Entry</a>
                                                            </li>
                                                            <li style="margin: 5px; font-size: 15px; text-align: left;">
                                                                <a href="<?php echo base_url(); ?>Show_form/bus_maintenance/main">
                                                                    <i class="fa fa-pencil-square text-green"></i>Bus Maintenance</a>
                                                            </li>
                                                            <li style="margin: 5px; font-size: 15px; text-align: left;">
                                                                <a href="<?php echo base_url(); ?>Show_form/bus_general_maintenance/main">
                                                                    <i class="fa fa-pencil-square text-blue"></i>General Maintenance</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 28) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a class="test" href="#">
                                                            <i class="fa fa-file-text text-red"></i>Transport Reports<span class="caret"></span>
                                                        </a>
                                                        <ul class="subtog dropdown-menu">
                                                            <li style="margin: 5px; font-size: 15px; text-align: left;">
                                                                <a href="<?php echo base_url(); ?>Show_form/owner_vehicle_details/main"><i
                                                                        class="fa fa-file-text-o text-fuchsia"></i>Owner Co. Wise Report
                                                                </a>
                                                            </li>
                                                            <li style="margin: 5px; font-size: 15px; text-align: left;">
                                                                <a href="<?php echo base_url(); ?>Show_form/userco_vehicle_details/main"><i
                                                                        class="fa fa-file-text-o text-gray"></i>User Co. Wise Report
                                                                </a>
                                                            </li>
                                                            <li style="margin: 5px; font-size: 15px; text-align: left;">
                                                                <a href="<?php echo base_url(); ?>Show_form/vehicle_value_report/main"><i
                                                                        class="fa fa-file-text-o text-lime"></i>Total Value Report
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 29) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a class="test" href="#">
                                                            <i class="fa fa-angle-double-right text-red"></i>Papers Report<span class="caret"></span>
                                                        </a>
                                                        <ul class="subtog dropdown-menu">
                                                            <li style="margin: 5px; font-size: 15px; text-align: left;">
                                                                <a href="<?php echo base_url(); ?>Show_form/search_papers_transport/main"><i
                                                                        class="fa fa-file-text-o text-fuchsia"></i>Transport-wise</a>
                                                            </li>
                                                            <li style="margin: 5px; font-size: 15px; text-align: left;">
                                                                <a href="<?php echo base_url(); ?>Show_form/all_papers/main"><i
                                                                        class="fa fa-file-text-o text-gray"></i>All Documents Position</a>
                                                            </li>
                                                            <li style="margin: 5px; font-size: 15px; text-align: left;">
                                                                <a href="<?php echo base_url(); ?>Show_form/search_papers_expire/main"><i
                                                                        class="fa fa-file-text-o text-lime"></i>Expiry Date-wise</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 30) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/transportwise_run_km/main">
                                                            <i class="fa fa-file-text text-yellow"></i>Transport Wise Run KM</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 31) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/mobil_change_info/main">
                                                            <i class="fa fa-file-text text-aqua"></i>Lubricant Change Info.</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 32) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/search_log_sheet/main">
                                                            <i class="fa fa-file-text text-olive"></i>Log Sheet Report</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 33) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/petty_cash_report">
                                                            <i class="fa fa-file-text text-red"></i>Petty Cash Report</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 34) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a class="test" href="#">
                                                            <i class="fa fa-file-text text-purple"></i>Parts Report<span class="caret"></span>
                                                        </a>
                                                        <ul class="subtog dropdown-menu">
                                                            <li style="margin: 5px; font-size: 15px; text-align: left;">
                                                                <a href="<?php echo base_url(); ?>Show_form/search_spare_parts">
                                                                    <i class="fa fa-file-text-o text-lime"></i>Parts Credit Report</a>
                                                            </li>
                                                            <li style="margin: 5px; font-size: 15px; text-align: left;">
                                                                <a href="<?php echo base_url(); ?>Show_form/parts_repair_tasks/main">
                                                                    <i class="fa fa-file-text-o text-yellow"></i>Parts Repair Tasks</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 35) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a class="test" href="#">
                                                            <i class="fa fa-angle-double-right text-red"></i>Bill Report<span class="caret"></span>
                                                        </a>
                                                        <ul class="subtog dropdown-menu">
                                                            <li style="margin: 5px; font-size: 15px; text-align: left;">
                                                                <a href="<?php echo base_url(); ?>Show_form/search_bill_register/main">
                                                                    <i class="fa fa-file-text-o text-red"></i>Bill Register Report</a>
                                                            </li>
                                                            <li style="margin: 5px; font-size: 15px; text-align: left;">
                                                                <a href="<?php echo base_url(); ?>Show_form/search_bill_payment/main">
                                                                    <i class="fa fa-file-text-o text-lime"></i>Bill Payment Report</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                <?php } ?>

                                                <?php if ($single_permission == 36) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/daily_report">
                                                            <i class="fa fa-file-text text-lime"></i>Income & Expenditure Summery</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 37) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/daily_cash_position">
                                                            <i class="fa fa-file-text text-red"></i>Daily Cash Position</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 38) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/trial_balance">
                                                            <i class="fa fa-file-text text-yellow"></i>Trial Balance</a>
                                                    </li>
                                                <?php } ?>
                                                <?php if ($single_permission == 39) { ?>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                        <a href="<?php echo base_url(); ?>Show_form/route_trip_wise_report">
                                                            <i class="fa fa-angle-double-right text-red"></i>Route & Trip wise Accounts</a>
                                                    </li>
                                                <?php } ?>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="col-sm-2 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                    <a style="color: wheat;" href="<?php echo base_url(); ?>Log_in_out/logout">Logout</a>
                                </div>
                                <div class="col-sm-2 col-xs-12" style="text-align: center; font-size: 15px;">
                                    <?php echo date('l'); ?><br><?php echo date('d-M-y'); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="padding-top: 55px;"></div>
        <script>
            $('.sub_hide').on("click", function () {
                $('.subtog').hide();
            });

            $('.dropdown-submenu a.test').on("click", function (e) {
                $('.subtog').hide();
                $(this).next('ul').show();
                e.stopPropagation();
                e.preventDefault();
            });
        </script>