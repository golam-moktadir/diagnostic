<?php require 'header.php'; ?>
<div class="container">
<section id="intro">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-12">
                <div class="block">
                    <div class="section-title">
                        <h2 style="color: #229cae;">About Us</h2>
                        <p id="about">
                            <?php foreach ($about as $info){
                                echo $info->about;
                            }?>
                        </p>
                    </div>

                </div>
            </div><!-- .col-md-7 close -->
            <div class="col-md-5 col-sm-12">
                <div class="block">
                    <img src="<?php echo base_url(); ?>assets/img/wrapper-img.gif" alt="Img">
                </div>
            </div><!-- .col-md-5 close -->
        </div>
    </div>
</section>
</div>
