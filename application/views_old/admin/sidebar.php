<aside class="main-sidebar" style="background-color: black; z-index: 4;">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url(); ?>assets/img/User/<?php echo $pic ?>" class="img-circle"
                     alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $name ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
        </form>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header treeview active" style="font-weight: bolder; font-size: large; color: yellow; background-color: black;">
                <a href="#" style="background-color: #047d65;">Software Part
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="background-color: black;">
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-th text-red"></i>
                            <span>Create Options</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>Bus_Ct/counter_form">
                                    <i class="fa fa-fort-awesome text-orange"></i> <span>Create Counter Name</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?php echo base_url(); ?>Bus_Ct/bus_type_form">
                                    <i class="fa fa-bus text-red"></i> <span>Create Bus Type</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?php echo base_url(); ?>Bus_Ct/bus_no_form">
                                    <i class="fa fa-bus text-yellow"></i>
                                    <span>Create Bus No.</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?php echo base_url(); ?>Show_form/bus_setup">
                                    <i class="fa fa-gears text-maroon"></i> <span>Bus Set-up</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?php echo base_url(); ?>Bus_Ct/coach_no_form">
                                    <i class="fa fa-bus text-green"></i>
                                    <span>Create Coach No.</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?php echo base_url(); ?>Bus_Ct/route_form">
                                    <i class="fa fa-map-o text-gray"></i> <span>Create Route</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?php echo base_url(); ?>Bus_Ct/time_form">
                                    <i class="fa fa-clock-o text-lime"></i> <span>Create Time Schedule</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?php echo base_url(); ?>Show_form/fare_setup">
                                    <i class="fa fa-ticket text-danger"></i> <span>Seat Fare Set-up</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?php echo base_url(); ?>Bus_Ct/boarding_point_form">
                                    <i class="fa fa-flag-checkered text-fuchsia"></i> <span>Boarding Point Info</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?php echo base_url(); ?>Show_form/create_waybill_expense_head">
                                    <i class="fa fa-money text-light-blue"></i> <span>Way Bill Expense</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="<?php echo base_url(); ?>Show_form/staff_management">
                            <i class="fa fa-users text-info"></i> <span>Staff Management</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url(); ?>Show_form/single_trip_management">
                            <i class="fa fa-map-marker text-gray"></i> <span>Single Trip Management</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url(); ?>Allocate_seat">
                            <i class="fa fa-th-list text-yellow"></i> <span>Allocate Seat</span>
                        </a>
                    </li>
                    <?php $perm = $this->session->userdata('ses_permission');
                    $find = strpos($perm, "Ticket_Booking");
                    if ($find == true) {
                        ?>
                        <li class="">
                            <a href="<?php echo base_url(); ?>Book_ticket">
                                <i class="fa fa-th-list text-yellow"></i> <span>Book Ticket</span>
                            </a>
                        </li>
                    <?php }?>
                    <li class=""><a href="<?php echo base_url(); ?>Show_form/sales"><i
                                class="fa fa-ticket text-olive"></i> <span>Ticket Sale</span></a>
                    </li>
<!--                    <li class=""><a href="--><?php //echo base_url(); ?><!--Show_form/bus_reserve"><i-->
<!--                                class="fa fa-ticket text-olive"></i> <span>Bus Reserve</span></a>-->
<!--                    </li>-->
                    <?php
                    $find = strpos($perm, "Prepaid");
                    if ($find == true) {
                        ?>
<!--                        <li class="">-->
<!--                            <a href="--><?php //echo base_url(); ?><!--Show_form/prepaid">-->
<!--                                <i class="fa fa-th-list text-yellow"></i> <span>Balance Load Request</span>-->
<!--                            </a>-->
<!--                        </li>-->
                    <?php }?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-th text-red"></i>
                            <span> Expense</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="">
                                <a href="<?php echo base_url(); ?>Show_form/create_expense_head">
                                    <i class="fa fa-money text-red"></i>
                                    <span>Create Expense Head</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="<?php echo base_url(); ?>Show_form/expense_entry">
                                    <i class="fa fa-money text-green"></i>
                                    <span>Expense Entry</span></a>
                            </li>
                            <li class=""><a href="<?php echo base_url(); ?>Show_form/search_expense"><i
                                            class="fa fa-search text-teal"></i> <span>Search Expense</span></a>
                            </li>
                        </ul>
                    </li>
<!--                    <li class="">-->
<!--                        <a href="--><?php //echo base_url(); ?><!--Show_form/way_bill">-->
<!--                            <i class="fa fa-money text-green"></i>-->
<!--                            <span>Waybill</span></a>-->
<!--                    </li>-->

                    <li class="">
                        <a href="<?php echo base_url(); ?>Show_form/ledger">
                            <i class="fa fa-money text-green"></i>
                            <span>Ledger</span></a>
                    </li>

                    <li class="">
                        <a href="<?php echo base_url(); ?>Show_form/counter_commission">
                            <i class="fa fa-dollar text-green"></i>
                            <span>Counter Commission</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url(); ?>Show_form/challan">
                            <i class="fa fa-print "></i>
                            <span>Challan Print</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="<?php echo base_url(); ?>Show_form/report_total_balance ">
                            <i class="fa fa-file-text-o text-fuchsia"></i>
                            <span>Total Balance Report</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="<?php echo base_url(); ?>Show_form/create_user">
                            <i class="fa fa-user-plus text-light-blue"></i>
                            <span>Create User</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="header treeview active"
                style="font-weight: bolder; font-size: large; color: yellow; background-color: black;">
                <a href="#"  style="background-color: #047d65;">Web Part
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="background-color: black;">
                    <li class="">
                        <a href="<?php echo base_url(); ?>Show_form/about_us">
                            <i class="fa fa-newspaper-o text-aqua"></i>
                            <span>About Us</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url(); ?>Show_form/contact_us">
                            <i class="fa fa-envelope text-yellow"></i>
                            <span>Contact Us</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url(); ?>Show_form/photo_gallery">
                            <i class="fa fa-photo text-gray"></i>
                            <span>Photo Gallery</span>
                        </a>
                    </li>
                   
                </ul>
            </li>
        </ul>
    </section>
</aside>

