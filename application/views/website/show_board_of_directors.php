<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" style="color: black; width: 100%; padding: 0px 50px;">
    <div class="box box-info">
        <div class="box-header">
            <h2 style="text-align: center;">Board of Directors</h2>                                    
        </div>

        <div class="box-body table-responsive">
            <div class="container">
                <?php
                $count = 0;
                foreach ($all_value as $all_info) {
                    $count++;
                    if ($count == 1) {
                        ?>

                        <div class="col-sm-4"></div>
                        <div class="col-md-4 col-xs-12 thumbnail" style="padding: 30px 10px;
                             height: 210px; background-color: #27265b; color: white;">

                            <img src="<?php echo base_url(); ?>assets/img/board_of_directors/<?php echo $all_info->image; ?>" 
                                 style="width: 120px; height: 100px;">

                            <h4 style="text-align: center; color: yellow;">
                                <?php echo $all_info->name; ?>
                            </h4>
                            <h4 style="text-align: center; font-size: 16px;">
                                <?php echo $all_info->designation; ?>
                            </h4>
                        </div>
                        <div class="col-sm-4"></div>
                    <?php } elseif ($count >= 2 && $count <= 4) { ?>
                        <div class="col-md-4 col-xs-12 thumbnail" style="padding: 25px 10px; 
                             height: 210px; background-color: #27265b; color: white;">

                            <img src="<?php echo base_url(); ?>assets/img/board_of_directors/<?php echo $all_info->image; ?>" 
                                 style="width: 120px; height: 100px;">

                            <h4 style="text-align: center; color: yellow;">
                                <?php echo $all_info->name; ?>
                            </h4>
                            <h4 style="text-align: center; font-size: 16px;">
                                <?php echo $all_info->designation; ?>
                            </h4>
                        </div>
                    <?php } else { ?>
                        <div class="col-md-3 col-xs-12 thumbnail" style="padding: 25px 10px; 
                             height: 210px; background-color: #27265b; color: white;">
                            <p style="text-align: center;">
                                <img src="<?php echo base_url(); ?>assets/img/board_of_directors/<?php echo $all_info->image; ?>" 
                                     style="width: 120px; height: 100px;">
                            </p>
                            <h4 style="text-align: center; color: yellow;">
                                <?php echo $all_info->name; ?>
                                </p>
                                <h4 style="text-align: center; font-size: 16px;">
                                    <?php echo $all_info->designation; ?>
                                    </p>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            </div>
                            </div>
                            </div>
                            </div>