<?php require 'header.php'; ?>
<div class="container">
    <div class="well" style="margin-bottom: -10px">
        <div class="col-lg-offset-3">
            <p style="text-align: justify">
            <h2 style="color: #229cae; text-align: "><strong>Contact Us:</strong></h2><br>
            <?php foreach ($contact as $info) { ?>
                <h4><strong style="color: #0b9c52; text-transform: uppercase"><?php echo $info->c_name; ?></strong></h4>
                <i class="ion-home" style="font-size: 18px;"></i> &nbsp
                <?php echo $info->address; ?>
                <br>
                <i class="ion-android-mail" style="font-size: 18px; ;"></i> &nbsp
                <a href="mailto:<?php echo $info->email; ?>?Subject=Web"
                   target="_top"><?php echo $info->email; ?></a>
            <?php if ($info->email2 !== "" ){?>
                 <a href="mailto:<?php echo $info->email2; ?>?Subject=Web" target="_top"><?php echo ", ".$info->email2; ?></a>
                <?php }?>
                <?php if ($info->email3 !== "" ){?>
                 <a href="mailto:<?php echo $info->email3; ?>?Subject=Web" target="_top"><?php echo ", ".$info->email3; ?></a>
                    <?php }?>
                <br>
                <i class="ion-android-globe" style="font-size: 18px; ;"></i> &nbsp
                <a href="http://<?php echo $info->web;?>"><?php echo $info->web; ?></a><br>
                <i class="ion-android-call" style="font-size: 18px; ;"></i> &nbsp
                <?php echo $info->hotline;
                if ($info->hotline2 !== "" ){
                    echo ", ".$info->hotline2;
                }
                if ($info->hotline3 !== "" ){
                    echo ", ".$info->hotline3;
                } ?>  <br>
            <?php } ?>
            </p>
        </div>
    </div>
</div>