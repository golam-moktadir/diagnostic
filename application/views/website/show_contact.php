<?php require 'header.php'; ?>
<div class="container">
    <div class="well" style="margin-bottom: -10px">
        <div class="col-lg-offset-3">
            <p style="text-align: justify">
            <h2 style="color: #229cae; text-align: "><strong>Contact Us:</strong></h2><br>
                <h4><strong style="color: #0b9c52; text-transform: uppercase"><?php echo $contact->c_name; ?></strong></h4>
                <i class="ion-home" style="font-size: 18px;"></i> &nbsp
                <?php echo $contact->address; ?>
                <br>
                <i class="ion-android-mail" style="font-size: 18px; ;"></i> &nbsp
                <a href="mailto:<?php echo $contact->email; ?>?Subject=Web"
                   target="_top"><?php echo $contact->email; ?></a>
            <?php if ($contact->email2 !== "" ){?>
                 <a href="mailto:<?php echo $contact->email2; ?>?Subject=Web" target="_top"><?php echo ", ".$contact->email2; ?></a>
                <?php }?>
                <?php if ($contact->email3 !== "" ){?>
                 <a href="mailto:<?php echo $contact->email3; ?>?Subject=Web" target="_top"><?php echo ", ".$contact->email3; ?></a>
                    <?php }?>
                <br>
                <i class="ion-android-globe" style="font-size: 18px; ;"></i> &nbsp
                <a href="http://<?php echo $contact->web;?>"><?php echo $contact->web; ?></a><br>
                <i class="ion-android-call" style="font-size: 18px; ;"></i> &nbsp
                <?php echo $contact->hotline;
                if ($contact->hotline2 !== "" ){
                    echo ", ".$contact->hotline2;
                }
                if ($contact->hotline3 !== "" ){
                    echo ", ".$contact->hotline3;
                } ?>  <br>
            </p>
        </div>
    </div>
</div>