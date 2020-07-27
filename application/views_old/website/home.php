<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--<p style="color: #9b0c0c; font-size: 16px; font-weight: bold; margin: 0px; padding: 0px;">
<marquee>
    <?php foreach($all_news as $one_news){echo $one_news->news;}?>
</marquee>
</p>-->
<!-- Slider Start -->
<div class="container"style="width: 100%; margin: 0px; padding: 0px;">
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin: 0px; padding: 0px;">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
            <li data-target="#myCarousel" data-slide-to="6"></li>
            <li data-target="#myCarousel" data-slide-to="7"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="<?php echo base_url(); ?>assets/img/slider2/1.jpg" alt="slider2" width="100%" height="55px">
            </div>

            <div class="item">
                <img src="<?php echo base_url(); ?>assets/img/slider2/2.jpg" alt="slider2" width="100%" height="55px">
            </div>

            <div class="item">
                <img src="<?php echo base_url(); ?>assets/img/slider2/3.jpg" alt="slider2" width="100%" height="55px">
            </div>

            <div class="item">
                <img src="<?php echo base_url(); ?>assets/img/slider2/4.jpg" alt="slider2" width="100%" height="55px">
            </div>

            <div class="item">
                <img src="<?php echo base_url(); ?>assets/img/slider2/5.jpg" alt="slider2" width="100%" height="55px">
            </div>

            <div class="item">
                <img src="<?php echo base_url(); ?>assets/img/slider2/6.jpg" alt="slider2" width="100%" height="55px">
            </div>
            <div class="item">
                <img src="<?php echo base_url(); ?>assets/img/slider2/7.jpg" alt="slider2" width="100%" height="55px">
            </div>
            <div class="item">
                <img src="<?php echo base_url(); ?>assets/img/slider2/8.jpg" alt="slider2" width="100%" height="55px">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"></a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next"></a>
    </div>
</div>
<section>
    <div class="container" style="text-align: center; padding: 0px 30px; width: 100%; margin: 0px;">
        <div class="row">
            <div class="section-title" style="margin-bottom: 35px; padding-top: 0px;">
                <h2 style="color: #3440eb; font-size: 22px;">Our Activities</h2>
            </div>
        </div>
        <div class="row" style="margin-top: -30px; text-align: center;">
            <div class="col-md-4 col-xs-12 " style="padding: 5px 20px 5px 20px;
                 height: 500px; background-color: #9da00b; color: white;">
                <div class="service-item">
                    <i class="ion-map" style="font-size: 50px;"></i>
                    <h4 style="margin-top: -5px">Hospital Profile</h4>
                <?php
                    foreach ($all_value as $all_info) {
                        if ($all_info->title == 1) {
                            if (file_exists('./assets/img/single_page_content/' . $all_info->image)) {
                                ?>
                                <p><img src="<?php echo base_url(); ?>assets/img/single_page_content/<?php echo $all_info->image; ?>" 
                                        width=" 180" height="110"></p>
                                <?php } ?>
                            <p id="limit1" style="text-align: justify; font-size: 15px;">
                                <?php echo nl2br($all_info->details); ?>
                            </p>
                            <?php
                        }
                    }
                    ?>
                    <p style="text-align: center;">
                        <a href="<?php echo base_url(); ?>Show_data/single_page_content/1" 
                           class="btn btn-default" style="margin-top: 10px;">View More</a>
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 " style="padding: 5px 20px 5px 20px; 
                 height: 500px; background-color: #17b277; color: white;">
                <div class="service-item">
                    <i class="ion-android-clipboard" style="font-size: 50px;"></i>
                    <h4 style="margin-top: -5px">Message from Chairman</h4>
                  <?php
                    foreach ($all_value as $all_info) {
                        if ($all_info->title == 2) {
                            if (file_exists('./assets/img/single_page_content/' . $all_info->image)) {
                                ?>
                                <p><img src="<?php echo base_url(); ?>assets/img/single_page_content/<?php echo $all_info->image; ?>" 
                                        width=" 180" height="110"></p>
                                <?php } ?>
                            <p id="limit2" style="text-align: justify; font-size: 15px;">
                                <?php echo nl2br($all_info->details); ?>
                            </p>
                            <?php
                        }
                    }
                    ?>
                    <p style="text-align: center;">
                        <a href="<?php echo base_url(); ?>Show_data/single_page_content/2" 
                           class="btn btn-default" style="margin-top: 10px;">View More</a>
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 " style="padding: 5px 20px 5px 20px;  
                 height: 500px; background-color: #9da00b; color: white;">
                <i class="ion-android-people" style="font-size: 50px;"></i>
                <h4 style="margin-top: -5px">Message from Director</h4>
              <?php
                foreach ($all_value as $all_info) {
                    if ($all_info->title == 3) {
                        if (file_exists('./assets/img/single_page_content/' . $all_info->image)) {
                            ?>
                            <p><img src="<?php echo base_url(); ?>assets/img/single_page_content/<?php echo $all_info->image; ?>" 
                                    width=" 180" height="110"></p>
                            <?php } ?>
                        <p id="limit3" style="text-align: justify; font-size: 15px;">
                            <?php echo nl2br($all_info->details); ?>
                        </p>
                        <?php
                    }
                }
                ?>
                <p style="text-align: center;">
                    <a href="<?php echo base_url(); ?>Show_data/single_page_content/3" 
                       class="btn btn-default" style="margin-top: 10px;">View More</a>
                </p>
            </div>
        </div>
        <div class="row" style="margin-top: -30px; text-align: center;">

            <div class="col-md-4 col-xs-12 " style="padding: 5px 20px 5px 20px; 
                 height: 500px; background-color: #17b277; color: white;">
                <div class="service-item">
                    <i class="ion-map" style="font-size: 50px;"></i>
                    <h4 style="margin-top: -5px">X-Ray Description</h4>
                     <?php
                    foreach ($all_value as $all_info) {
                        if ($all_info->title == 4) {
                            if (file_exists('./assets/img/single_page_content/' . $all_info->image)) {
                                ?>
                                <p><img src="<?php echo base_url(); ?>assets/img/single_page_content/<?php echo $all_info->image; ?>" 
                                        width=" 180" height="110"></p>
                                <?php } ?>
                            <p id="limit4" style="text-align: justify; font-size: 15px;">
                                <?php echo nl2br($all_info->details); ?>
                            </p>
                            <?php
                        }
                    }
                    ?>
                    <p style="text-align: center;">
                        <a href="<?php echo base_url(); ?>Show_data/single_page_content/4" 
                           class="btn btn-default" style="margin-top: 10px;">View More</a>
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 " style="padding: 5px 20px 5px 20px; 
                 height: 500px; background-color: #6517b2; color: white;">
                <div class="service-item">
                    <i class="ion-android-clipboard" style="font-size: 50px;"></i>
                    <h4 style="margin-top: -5px">Ultrasonogram</h4>
                   <?php
                    foreach ($all_value as $all_info) {
                        if ($all_info->title == 9) {
                            if (file_exists('./assets/img/single_page_content/' . $all_info->image)) {
                                ?>
                                <p><img src="<?php echo base_url(); ?>assets/img/single_page_content/<?php echo $all_info->image; ?>" 
                                        width=" 180" height="110"></p>
                                <?php } ?>
                            <p id="limit8" style="text-align: justify; font-size: 15px;">
                                <?php echo nl2br($all_info->details); ?>
                            </p>
                            <?php
                        }
                    }
                    ?>
                    <p style="text-align: center;">
                        <a href="<?php echo base_url(); ?>Show_data/single_page_content/9" 
                           class="btn btn-default" style="margin-top: 10px;">View More</a>
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 " style="padding: 5px 20px 5px 20px;  
                 height: 500px; background-color: #17b277; color: white;">
                <i class="ion-android-people" style="font-size: 50px;"></i>
                <h4 style="margin-top: -5px">Service List</h4>
               <?php
                foreach ($all_value as $all_info) {
                    if ($all_info->title == 10) {
                        if (file_exists('./assets/img/single_page_content/' . $all_info->image)) {
                            ?>
                            <p><img src="<?php echo base_url(); ?>assets/img/single_page_content/<?php echo $all_info->image; ?>" 
                                    width=" 180" height="110"></p>
                            <?php } ?>
                        <p id="limit9" style="text-align: justify; font-size: 15px;">
                            <?php echo nl2br($all_info->details); ?>
                        </p>
                        <?php
                    }
                }
                 ?>
                <p style="text-align: center;">
                    <a href="<?php echo base_url(); ?>Show_data/show_service_info/10" 
                       class="btn btn-default" style="margin-top: 10px;">View More</a>
                </p>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6 col-xs-12 " style="padding: 5px 20px 5px 20px; border: #066 solid 2px; border-width: 0px 2px 0px 0px;
                 height: 380px; background-color: wheat; color: black;">
                <i class="ion-android-people" style="font-size: 50px;"></i>
                <h4 style="margin-top: -5px; color: maroon;">Important Link</h4>
                <p><a href="http://www.mohfw.gov.bd/" target="_blank" style="color: green; font-size: 16px;">
                        স্বাস্থ্য মন্ত্রণালয়</a></p>
                <p><a href="http://dgfp.gov.bd/" target="_blank" style="color: green; font-size: 16px;">
                        পরিবার পরিকল্পনা অধিদপ্তর</a></p>
                <p><a href="http://bmdc.org.bd/" target="_blank" style="color: green; font-size: 16px;">
                        বাংলাদেশ মেডিকেল ও ডেন্টাল কাউন্সিল (বিএম ও ডিসি)</a></p>
                <p><a href="http://www.emedicalpoint.com/" target="_blank" style="color: green; font-size: 16px;">                   
                        অনলাইন মেডিকেল হেলথ কেয়ার পোর্টাল বাংলাদেশ</a></p>
                <p><a href="http://www.dghs.gov.bd/index.php/en/home" target="_blank" style="color: green; font-size: 16px;">
                        স্বাস্থ্য সেবা অধিদপ্তর</a></p>
            </div>
            <div class="col-md-6 col-xs-12 " style="padding: 5px 20px 5px 20px; border: #066 solid 2px; border-width: 0px 0px 0px 2px;
                 height: 380px; background-color: wheat; color: black;">
                <i class="ion-android-people" style="font-size: 50px;"></i>
                <h4 style="margin-top: -5px; color: maroon">Photo Gallery</h4>
               <?php
                $photo_count = 0;
                foreach ($all_photo as $photo) {
                    $photo_count++;
                    ?>
                    <p style="display: inline-block;">
                        <img src="<?php echo base_url(); ?>assets/img/photo_gallery/<?php echo $photo->image_id; ?>"
                             width="160" height="80">
                    </p>
                    <?php
                    if ($photo_count == 3) {
                        break;
                    }
                }
                ?>
                <p style="text-align: center;">
                    <a href="<?php echo base_url(); ?>Show_data/photo_gallery" 
                       class="btn btn-default" style="margin-top: 10px;">View More</a>
                </p>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    var myDiv1 = $('#limit1');
    var myDiv2 = $('#limit2');
    var myDiv3 = $('#limit3');
    var myDiv4 = $('#limit4');
    var myDiv5 = $('#limit5');
    var myDiv6 = $('#limit6');
    var myDiv7 = $('#limit7');
    var myDiv8 = $('#limit8');
    var myDiv9 = $('#limit9');

    myDiv1.text(myDiv1.text().substring(0, 250) + "...");
    myDiv2.text(myDiv2.text().substring(0, 250) + "...");
    myDiv3.text(myDiv3.text().substring(0, 250) + "...");
    myDiv4.text(myDiv4.text().substring(0, 250) + "...");
    myDiv5.text(myDiv5.text().substring(0, 250) + "...");
    myDiv6.text(myDiv6.text().substring(0, 250) + "...");
    myDiv7.text(myDiv7.text().substring(0, 250) + "...");
    myDiv8.text(myDiv8.text().substring(0, 250) + "...");
    myDiv9.text(myDiv9.text().substring(0, 250) + "...");
</script>



