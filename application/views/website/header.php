<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html class="no-js">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>GREEN Pathology Complex</title>
        <link rel="Tab Icon" type="image/jpg" href="<?php echo base_url(); ?>assets/img/fab.jpg"/>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css">

        <!-- Js -->
        <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/ajax_jquery_website.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/min/waypoints.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.counterup.js"></script>

        <!-- Google Map -->
        <script src="<?php echo base_url(); ?>assets/js/google_map.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/google-map-init.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
        
    </head>

    <body>
        <div class="container-fluid" style="padding: 0;">
            <div class="row">
                <div class="col-xs-12" style="text-align: center; margin-top: 10px;">
                    <img src="<?php echo base_url(); ?>assets/img/banner.jpg"
                         alt="Logo" width="40%" height="70px">
                </div>
            </div>
            <div class="row" style="margin-bottom: 10px;" id="no_print1">
                <div class="col-xs-1 col-lg-2"></div>
                <div class="col-xs-1 col-lg-2"></div>
                <div class="col-xs-8 col-lg-6"></div>
                <div class="col-xs-1 col-lg-2" style="margin-top: 10px;">
                    <button class="btn btn-success" style="font-weight: bold; padding: 5px 10px 5px 10px; 
                            border: 0px; background: brown;"
                            onclick="location.href = '<?php echo base_url(); ?>Log_in_out'">Login
                    </button>
                </div>
            </div>
            <div class="row" id="no_print2">
                <div class="navbar navbar-inverse" style="background-color: #3440eb; 
                     color: white; border: 0px; margin-left: 30px; margin-right: 30px; border-radius: 10px 10px 0px 0px;">
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
                        <div class="collapse navbar-collapse row" style="padding-top: 13px; font-size: 16px; font-weight: bold;">
                            <div class="col-sm-2 col-xs-12" style="text-align: center;">
                                <a style="color: wheat;" href="<?php echo base_url(); ?>Home/index">Home</a>
                            </div>
                            <div class="col-sm-2 col-xs-12" style="text-align: center;  color: #066;">
                                <a style="color: wheat; cursor: pointer;" href="<?php echo base_url(); ?>Show_data/about">About</a>
                            </div>
                            <div class="col-sm-2 col-xs-12" style="text-align: center;  color: #066;">
                                <a style="color: wheat; cursor: pointer;" href="<?php echo base_url(); ?>Show_data/show_service">Our Services</a>
                            </div>
                            <div class="col-sm-2 col-xs-12" style="text-align: center;  color: #066;">
                                <a style="color: wheat; cursor: pointer;" href="<?php echo base_url(); ?>Show_data/show_doctor_info">Doctor Info.</a>   
                            </div>
       
<!--                            <div class="col-sm-1 col-xs-12" style="text-align: center;  color: #066;">
                                <a style="color: white; cursor: pointer;" class="dropdown-toggle" data-toggle="dropdown">Result
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a class="test" href="#">Class 11<span class="caret"></span></a>
                                        <ul class="subtog dropdown-menu">
                                            <li style="margin: 10px; font-size: 15px;"><a href="<?php echo base_url(); ?>Show_data/show_result/1">Tutorial</a></li>
                                            <li style="margin: 10px; font-size: 15px;"><a href="<?php echo base_url(); ?>Show_data/show_result/2">Half-Yearly</a></li>
                                            <li style="margin: 10px; font-size: 15px;"><a href="<?php echo base_url(); ?>Show_data/show_result/3">Yearly</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown-submenu" style="margin: 10px; font-size: 15px;">
                                        <a class="test" href="#">Class 12<span class="caret"></span></a>
                                        <ul class="subtog dropdown-menu">
                                            <li style="margin: 10px; font-size: 15px;"><a href="<?php echo base_url(); ?>Show_data/show_result/4">Tutorial</a></li>
                                            <li style="margin: 10px; font-size: 15px;"><a href="<?php echo base_url(); ?>Show_data/show_result/5">Pre-test</a></li>
                                            <li style="margin: 10px; font-size: 15px;"><a href="<?php echo base_url(); ?>Show_data/show_result/6">Test</a></li>
                                            <li style="margin: 10px; font-size: 15px;"><a href="<?php echo base_url(); ?>Show_data/show_result/7">Model-test</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>-->
                            <div class="col-sm-2 col-xs-12" style="text-align: center;">
                                <a style="color: wheat;" href="<?php echo base_url(); ?>Show_data/photo_gallery">Photo Gallery</a>
                            </div>
                            <div class="col-sm-2 col-xs-12" style="text-align: center;">
                                <a style="color: wheat;" href="<?php echo base_url(); ?>Show_data/contact">Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
