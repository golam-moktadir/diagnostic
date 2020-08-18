<?php
$user_type = $this->session->ses_user_type;
?>
<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <title>GREEN Pathology Complex</title>
        <link rel="Tab Icon" type="image/jpg" href="<?php echo base_url(); ?>assets/img/fab.jpg"/>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo base_url(); ?>adminlte/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
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
                <div class="navbar navbar-inverse" style="background-color: #781f53;
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
                                <div class="col-sm-1 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                    <a class="sub_hide" style="color: yellow;" href="<?php echo base_url(); ?>Log_in_out">Home</a>
                                </div>
                                <!--Create Options Start-->
                                <div class="col-sm-1 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                    <a style="color: wheat; cursor: pointer;" class="dropdown-toggle sub_hide" 
                                       data-toggle="dropdown">Create<span class="caret"></span></a>
                                    <ul class="dropdown-menu">

                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;"><a href="<?php echo base_url(); ?>product/category"><i
                                                    class="fa fa-th text-blue"></i>Product Category</a>
                                        </li>
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;"><a href="<?php echo base_url(); ?>product/product"><i
                                                    class="fa fa-th text-yellow"></i>Product Name</a>
                                        </li>
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/designation/main"><i
                                                    class="fa fa-th text-green"></i>Designation</a></li>
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;"><a href="<?php echo base_url(); ?>operation/category"><i
                                                    class="fa fa-th text-yellow"></i>Operation Category</a>
                                        </li>
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;"><a href="<?php echo base_url(); ?>operation/operation-name"><i
                                                    class="fa fa-th text-green"></i>Operation Name</a></li>
                                         <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;"><a href="<?php echo base_url(); ?>operation/expenditure"><i
                                                    class="fa fa-th text-yellow"></i>OT Expenditure</a>
                                        </li>
                                    </ul>
                                </div>
                                <!--Create End-->

                                <!--Input Data Start-->
                                <div class="col-sm-1 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                    <a style="color: wheat; cursor: pointer;" class="dropdown-toggle sub_hide"
                                       data-toggle="dropdown">Input Data
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/create_patient/main"><i
                                                    class="fa fa-th text-red"></i>Patient Info.</a>
                                        </li>
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/appointment">
                                                <i class="fa fa-th text-green"></i>
                                                <span>Appointment</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/consultancy/main">
                                                <i class="fa fa-th text-yellow"></i>
                                                <span>Consultation</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/create_doctor/main"><i
                                                    class="fa fa-th text-fuchsia"></i>Doctor Info</a>
                                        </li>
                                    </ul>
                                </div>
                                <!--Input Data End-->

                                <!--Billing Strat-->
                                <div class="col-sm-2 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                    <a style="color: wheat; cursor: pointer;" class="dropdown-toggle sub_hide"
                                       data-toggle="dropdown">Billing Part
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">              
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/sales_test/main">
                                                <i class="fa fa-th text-fuchsia"></i>
                                                <span>Test Invoice</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>admission/admission-invoice">
                                                <i class="fa fa-th text-red"></i>
                                                <span>Admission Invoice</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/pay_test_due/main">
                                                <i class="fa fa-th text-yellow"></i>
                                                <span>Due Collection</span>
                                            </a>
                                        </li>
                                    <!--
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/bill_list">
                                                <i class="fa fa-angle-double-right text-green"></i>
                                                <span>All Bill List</span>
                                            </a>
                                        </li>
                                   <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                        <a href="<?php echo base_url(); ?>Show_form/bill_list">
                                            <i class="fa fa-angle-double-right text-blue"></i>
                                            <span>Due Payment</span>
                                        </a>
                                    </li>   -->                              
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/bill_list">
                                                <i class="fa fa-th text-blue"></i>
                                                <span>Patient Ledger</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>admission/operation-details">
                                                <i class="fa fa-th text-yellow"></i>
                                                <span>Operation Details</span>
                                            </a>
                                        </li> 
                                    </ul>
                                </div>
                                <!--Billing End-->

                                <!--Pathology Start-->
                                <div class="col-sm-1 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                    <a style="color: wheat; cursor: pointer;" class="dropdown-toggle sub_hide"
                                       data-toggle="dropdown">Pathology
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/test_request/main">
                                                <i class="fa fa-th text-fuchsia"></i>
                                                <span>Sales Test</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/test_result/main">
                                                <i class="fa fa-th text-blue"></i>
                                                <span>Result Input</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/create_test_category/main">
                                                <i class="fa fa-th text-yellow"></i>
                                                <span>Test Category</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/create_test_name/main">
                                                <i class="fa fa-th text-green"></i>
                                                <span>Test Name</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/test_price/main">
                                                <i class="fa fa-th text-red"></i>
                                                <span>Test Price</span>
                                            </a>
                                        </li>

                                        <!--                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                                                    <a href="<?php echo base_url(); ?>Show_form/all_test_report/main">
                                                                                        <i class="fa fa-angle-double-right text-blue"></i>
                                                                                        <span>All Test Report Info</span>
                                                                                    </a>
                                                                                </li>-->
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/lab_product_use_in/main">
                                                <i class="fa fa-th text-green"></i>
                                                <span>Lab Product IN</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/lab_product_use_out/main">
                                                <i class="fa fa-th text-yellow"></i>
                                                <span>Lab Product OUT</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/lab_inout_info/main">
                                                <i class="fa fa-th text-fuchsia"></i>
                                                <span>Lab In/Out Info</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!--Pathology End-->

                                <!--Accounts Start-->
                                <div class="col-sm-2 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                    <a style="color: wheat; cursor: pointer;" class="dropdown-toggle sub_hide"
                                       data-toggle="dropdown">Accounts Part
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a class="test" href="#">
                                                <i class="fa fa-th text-green"></i>Income<span class="caret"></span>
                                            </a>
                                            <ul class="subtog dropdown-menu">
                                                <li style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/income/main"><i
                                                            class="fa fa-angle-double-right text-red"></i>Income Entry</a></li>
                                                <li style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/income_head/main"><i
                                                            class="fa fa-angle-double-right text-blue"></i>Create Income Head</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a class="test" href="#">
                                                <i class="fa fa-th text-red"></i>Expense<span class="caret"></span>
                                            </a>
                                            <ul class="subtog dropdown-menu">
                                                <li style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/expense/main"><i
                                                            class="fa fa-angle-double-right text-blue"></i>Expense Entry</a></li>
                                                <li style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/expense_head/main"><i
                                                            class="fa fa-angle-double-right text-green"></i>Create Expense
                                                        Head</a></li>
                                            </ul>
                                        </li>

<!--                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/ledger/main">
                                                <i class="fa fa-th text-blue"></i>
                                                <span>Balance Sheet</span>
                                            </a>
                                        </li>-->
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/report/main">
                                                <i class="fa fa-th text-fuchsia"></i>
                                                <span>Total Cash Report</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/con_report/main">
                                                <i class="fa fa-th text-yellow"></i>
                                                <span>Consultation Info.</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/test_commission/main">
                                                <i class="fa fa-th text-blue"></i>
                                                <span>Test Honorarium Info.</span>
                                            </a>
                                        </li>
                                        <!-- <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                             <a class="test" href="#">
                                                 <i class="fa fa-angle-double-right text-green"></i>Bank History<span class="caret"></span>
                                             </a>
                                             <ul class="subtog dropdown-menu">
                                                 <li style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/create_bank_name/main"><i
                                                             class="fa fa-angle-double-right text-green"></i> Create Bank Name</a>
                                                 </li>
                                                 <li style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/bank_deposit/main"><i
                                                             class="fa fa-angle-double-right text-red"></i> Bank Deposit</a></li>
                                                 <li style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/bank_withdraw/main"><i
                                                             class="fa fa-angle-double-right text-blue"></i> Bank Withdraw</a>
                                                 </li>
                                                 <li style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/bank_report/main"><i
                                                             class="fa fa-angle-double-right text-yellow"></i> Report</a></li>
                                             </ul>
                                         </li>-->
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/create_salary_sheet/main"><i
                                                    class="fa fa-th text-green"></i> Salary Payment</a>
                                        </li>
                                    </ul>
                                </div>
                                <!--Accounts End-->

                                <!--HR Start-->
                                <div class="col-sm-1 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                    <a style="color: wheat; cursor: pointer;" class="dropdown-toggle sub_hide"
                                       data-toggle="dropdown">HR
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/create_user/main"><i
                                                    class="fa fa-th text-fuchsia"></i>Staff Info.</a>
                                        </li>
                                    </ul>
                                </div>
                                <!--HR End-->

                                <!--Web Part Start-->
                                <div class="col-sm-1 col-xs-12"
                                     style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                    <a style="color: wheat; cursor: pointer;" class="dropdown-toggle sub_hide"
                                       data-toggle="dropdown">Web Part<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/about_us">
                                                <i class="fa fa-th text-fuchsia"></i>
                                                <span>About Us</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/single_page_content">
                                                <i class="fa fa-th text-yellow"></i>
                                                <span>Insert Basic Info.</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/create_doctor/">
                                                <i class="fa fa-th text-green"></i>
                                                <span>Insert Doctors Info.</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/photo_gallery">
                                                <i class="fa fa-th text-red"></i>
                                                <span>Photo Gallery</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/contact_us">
                                                <i class="fa fa-th text-blue"></i>
                                                <span>Contact Us</span>
                                            </a>
                                        </li> 
                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/insert_news">
                                                <i class="fa fa-th text-blue"></i>
                                                <span>Update News</span>
                                            </a>
                                        </li>   
                                    </ul>
                                </div>
                                <!--Web Part End-->
                                <div class="col-sm-1 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                    <a style="color: yellow;" href="<?php echo base_url(); ?>Log_in_out/logout">Logout</a>
                                </div>
                                <div class="col-sm-1 col-xs-12" style="text-align: center; font-size: 15px; color: white;">
                                    <?php echo date('l'); ?><br><?php echo date('d-m'); ?>
                                </div>
                            <?php }
                            ?>

                            <!--      Admin Header END  -->

                            <?php
                            if ($user_type == "staff") {
                                ?>
                                <div class="col-sm-1 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                    <a class="sub_hide" style="color: wheat;" href="<?php echo base_url(); ?>Log_in_out">Dashboard</a>
                                </div>
                                <?php if ($this->session->ses_createOption_access == 1) { ?>
                                    <div class="col-sm-1 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                        <a style="color: wheat; cursor: pointer;" class="dropdown-toggle sub_hide" 
                                           data-toggle="dropdown">Create<span class="caret"></span></a>
                                        <ul class="dropdown-menu">

                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;"><a href="<?php echo base_url(); ?>product/category"><i
                                                        class="fa fa-angle-double-right text-red"></i> Product Category</a>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;"><a href="<?php echo base_url(); ?>product/product"><i
                                                        class="fa fa-angle-double-right text-red"></i> Product Name</a>
                                            </li>

                                                        <!--                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/department/main"><i
                                                                                                            class="fa fa-angle-double-right text-red"></i> Department</a></li>-->
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/designation/main"><i
                                                        class="fa fa-angle-double-right text-green"></i> Designation</a></li>
                                        </ul>
                                    </div>
                                <?php } ?>
                                <?php if ($this->session->ses_inventory_access == 1) { ?>
                                    <div class="col-sm-1 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                        <a style="color: wheat; cursor: pointer;" class="dropdown-toggle sub_hide"
                                           data-toggle="dropdown">Inventory
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/insert_medicine_info/main"><i
                                                        class="fa fa-angle-double-right text-red"></i> Insert Medicine Info.</a>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/insert_product_info/main"><i
                                                        class="fa fa-angle-double-right text-red"></i> Insert Product Info.</a>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/purchase_statement/main"><i
                                                        class="fa fa-angle-double-right text-red"></i>Purchase Statement</a>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/product_inout/main">
                                                    <i class="fa fa-angle-double-right text-red"></i>
                                                    <span>Product In & Out Info.</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a class="test" href="#">
                                                    <i class="fa fa-angle-double-right text-red"></i>Supplier<span class="caret"></span>
                                                </a>
                                                <ul class="subtog dropdown-menu">
                                                    <li style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/sales/main"><i
                                                                class="fa fa-angle-double-right text-red"></i>Supplier Payment</a></li>
                                                    <li style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/return_product/main"><i
                                                                class="fa fa-angle-double-right text-red"></i>Supplier Ledger</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a class="test" href="#">
                                                    <i class="fa fa-angle-double-right text-red"></i>Return<span class="caret"></span>
                                                </a>
                                                <ul class="subtog dropdown-menu">

                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/manufacturer_return/main"><i
                                                                class="fa fa-angle-double-right text-red"></i>
                                                            Supplier Return</a></li>
                                                    <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/manufacturer_return/main"><i
                                                                class="fa fa-angle-double-right text-red"></i>
                                                            Supplier Ledger</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                <?php } ?>

                                <?php if ($this->session->ses_sales_access == 1) { ?>
                                    <div class="col-sm-1 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                        <a style="color: wheat; cursor: pointer;" class="dropdown-toggle sub_hide"
                                           data-toggle="dropdown">Input Data
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/create_patient/main"><i
                                                        class="fa fa-angle-double-right text-blue"></i>Insert Patient Info.</a>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/appointment">
                                                    <i class="fa fa-angle-double-right text-green"></i>
                                                    <span>Appointment</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/consultancy/main">
                                                    <i class="fa fa-angle-double-right text-green"></i>
                                                    <span>Consultation</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/create_doctor/main"><i
                                                        class="fa fa-angle-double-right text-red"></i>Insert Doctor Info</a>
                                            </li>
                                        </ul>
                                    </div>
                                <?php } ?>
                                <?php if ($this->session->ses_billing_access == 1) { ?>
                                    <div class="col-sm-2 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                        <a style="color: wheat; cursor: pointer;" class="dropdown-toggle sub_hide"
                                           data-toggle="dropdown">Billing Part
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">              
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/sales_test/main">
                                                    <i class="fa fa-angle-double-right text-blue"></i>
                                                    <span>Sales Test</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/pay_test_due/main">
                                                    <i class="fa fa-angle-double-right text-yellow"></i>
                                                    <span>Due Collection</span>
                                                </a>
                                            </li>
                                            <!--<li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/create_bill/main">
                                                    <i class="fa fa-angle-double-right text-red"></i>
                                                    <span>Pre Due Collection</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/bill_list">
                                                    <i class="fa fa-angle-double-right text-green"></i>
                                                    <span>All Bill List</span>
                                                </a>
                                            </li>
                                       <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                            <a href="<?php echo base_url(); ?>Show_form/bill_list">
                                                <i class="fa fa-angle-double-right text-blue"></i>
                                                <span>Due Payment</span>
                                            </a>
                                        </li>   -->                              
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/bill_list">
                                                    <i class="fa fa-angle-double-right text-yellow"></i>
                                                    <span>Patient Ledger</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                <?php } ?>
                                <?php if ($this->session->ses_laboratory_access == 1) { ?>
                                    <div class="col-sm-1 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                        <a style="color: wheat; cursor: pointer;" class="dropdown-toggle sub_hide"
                                           data-toggle="dropdown">Pathology
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/test_request/main">
                                                    <i class="fa fa-th text-yellow"></i>
                                                    <span>Test Sales Info</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/test_result/main">
                                                    <i class="fa fa-th text-fuchsia"></i>
                                                    <span>Test Result Input</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/create_test_category/main">
                                                    <i class="fa fa-th text-blue"></i>
                                                    <span>Test Category Set-Up</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/create_test_name/main">
                                                    <i class="fa fa-th text-green"></i>
                                                    <span>Test Name Set-Up</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/test_price/main">
                                                    <i class="fa fa-th text-red"></i>
                                                    <span>Test Price Set-Up</span>
                                                </a>
                                            </li>

                                            <!--                                        <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                                                        <a href="<?php echo base_url(); ?>Show_form/all_test_report/main">
                                                                                            <i class="fa fa-angle-double-right text-blue"></i>
                                                                                            <span>All Test Report Info</span>
                                                                                        </a>
                                                                                    </li>-->
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/lab_product_use_in/main">
                                                    <i class="fa fa-angle-double-right text-yellow"></i>
                                                    <span>Lab Product Use(IN)</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/lab_product_use_out/main">
                                                    <i class="fa fa-angle-double-right text-green"></i>
                                                    <span>Lab Product Use(OUT)</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/lab_inout_info/main">
                                                    <i class="fa fa-angle-double-right text-blue"></i>
                                                    <span>Lab In/Out Info</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                <?php } ?>
                                <?php if ($this->session->ses_information_access == 1) { ?>
                                    <div class="col-sm-1 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                        <a style="color: wheat; cursor: pointer;" class="dropdown-toggle sub_hide"
                                           data-toggle="dropdown">Information
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-submenu"  style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/birth_report/main"><i
                                                        class="fa fa-angle-double-right text-red"></i>Add Birth Report</a>
                                            </li>
                                            <li class="dropdown-submenu"  style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/death_report/main"><i
                                                        class="fa fa-angle-double-right text-red"></i>Add Death Report</a>
                                            </li>
                                            <li class="dropdown-submenu"  style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/operation_report/main"><i
                                                        class="fa fa-angle-double-right text-red"></i>Add Operation
                                                    Report</a>
                                            </li>
                                            <li class="dropdown-submenu"  style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/investigation_report/main"><i
                                                        class="fa fa-angle-double-right text-red"></i>Add Investigation Report</a>
                                            </li>
                                        </ul>
                                    </div>
                                <?php } ?>
                                <?php if ($this->session->ses_accounting_access == 1) { ?>
                                    <div class="col-sm-2 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                        <a style="color: wheat; cursor: pointer;" class="dropdown-toggle sub_hide"
                                           data-toggle="dropdown">Accounts Part
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a class="test" href="#">
                                                    <i class="fa fa-angle-double-right text-green"></i>Income<span class="caret"></span>
                                                </a>
                                                <ul class="subtog dropdown-menu">
                                                    <li style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/income/main"><i
                                                                class="fa fa-angle-double-right text-red"></i>Income Entry</a></li>
                                                    <li style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/income_head/main"><i
                                                                class="fa fa-angle-double-right text-blue"></i>Create Income Head</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a class="test" href="#">
                                                    <i class="fa fa-angle-double-right text-red"></i>Expense<span class="caret"></span>
                                                </a>
                                                <ul class="subtog dropdown-menu">
                                                    <li style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/expense/main"><i
                                                                class="fa fa-angle-double-right text-blue"></i>Expense Entry</a></li>
                                                    <li style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/expense_head/main"><i
                                                                class="fa fa-angle-double-right text-green"></i>Create Expense
                                                            Head</a></li>
                                                </ul>
                                            </li>

                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/ledger/main">
                                                    <i class="fa fa-angle-double-right text-blue"></i>
                                                    <span>Balance</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/report/main">
                                                    <i class="fa fa-angle-double-right text-yellow"></i>
                                                    <span>Report</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/con_report/main">
                                                    <i class="fa fa-angle-double-right text-red"></i>
                                                    <span>Consultation Report</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/test_commission/main">
                                                    <i class="fa fa-angle-double-right text-red"></i>
                                                    <span>Test Honorarium Report</span>
                                                </a>
                                            </li>
                                            <!-- <li class="dropdown-submenu" style="margin: 5px; font-size: 15px; text-align: left;">
                                                 <a class="test" href="#">
                                                     <i class="fa fa-angle-double-right text-green"></i>Bank History<span class="caret"></span>
                                                 </a>
                                                 <ul class="subtog dropdown-menu">
                                                     <li style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/create_bank_name/main"><i
                                                                 class="fa fa-angle-double-right text-green"></i> Create Bank Name</a>
                                                     </li>
                                                     <li style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/bank_deposit/main"><i
                                                                 class="fa fa-angle-double-right text-red"></i> Bank Deposit</a></li>
                                                     <li style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/bank_withdraw/main"><i
                                                                 class="fa fa-angle-double-right text-blue"></i> Bank Withdraw</a>
                                                     </li>
                                                     <li style="margin: 5px; font-size: 15px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/bank_report/main"><i
                                                                 class="fa fa-angle-double-right text-yellow"></i> Report</a></li>
                                                 </ul>
                                             </li>-->
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/create_salary_sheet/main"><i
                                                        class="fa fa-angle-double-right text-red"></i> Salary Payment</a>
                                            </li>
                                        </ul>
                                    </div>
                                <?php } ?>
                                <?php if ($this->session->ses_hr_access == 1) { ?>
                                    <div class="col-sm-1 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                        <a style="color: wheat; cursor: pointer;" class="dropdown-toggle sub_hide"
                                           data-toggle="dropdown">HR
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;"><a href="<?php echo base_url(); ?>Show_form/create_user/main"><i
                                                        class="fa fa-angle-double-right text-red"></i>Insert Employee Info.</a>
                                            </li>
                                        </ul>
                                    </div>
                                <?php } ?>

                                <?php if ($this->session->ses_webpart_access == 1) { ?>
                                    <div class="col-sm-1 col-xs-12"
                                         style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                        <a style="color: wheat; cursor: pointer;" class="dropdown-toggle sub_hide"
                                           data-toggle="dropdown">Web Part<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/about_us/main">
                                                    <i class="fa fa-th text-fuchsia"></i>
                                                    <span>About Us</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/single_page_content/main">
                                                    <i class="fa fa-th text-yellow"></i>
                                                    <span>Insert Basic Info.</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/create_doctor/main">
                                                    <i class="fa fa-th text-green"></i>
                                                    <span>Insert Doctors Info.</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/photo_gallery/main">
                                                    <i class="fa fa-th text-red"></i>
                                                    <span>Photo Gallery</span>
                                                </a>
                                            </li>
                                            <li class="dropdown-submenu" style="margin: 5px; font-size: 16px; text-align: left;">
                                                <a href="<?php echo base_url(); ?>Show_form/contact_us/main">
                                                    <i class="fa fa-th text-blue"></i>
                                                    <span>Contact Us</span>
                                                </a>
                                            </li>   
                                        </ul>
                                    </div>
                                <?php } ?>
                                <div class="col-sm-1 col-xs-12" style="color: #066; text-align: center; padding: 8px 0px 0px 0px;">
                                    <a style="color: wheat;" href="<?php echo base_url(); ?>Log_in_out/logout">Logout</a>
                                </div>
                                <div class="col-sm-1 col-xs-12" style="text-align: center; font-size: 15px; color: white;">
                                    <?php echo date('l'); ?><br><?php echo date('d-M-y'); ?>
                                </div>
                            <?php } ?>                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="space_id" style="padding-top: 55px; padding-bottom: 20px;"></div>
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