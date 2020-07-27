<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div style="background-color: #3440eb; padding: 5px 0px 0px 0px;
     border-radius: 0px 0px 10px 10px;" id="no_print3">
    <p style="font-size: 15px; color: white; text-align: center; font-weight: bold;
       font-family: Helvetica; margin: 0px; padding: 0px;">
        Page View <i class="fa fa-angle-double-right"></i>
        <?php
        $hit_counter = $this->session->hit_counter;
        echo $hit_counter;
        ?>
    </p>
    <p style="color: white; font-size: 13px; text-align: center;">Copyright &copy; 2020. Designed & Developed by <a href="http://greensoftechbd.com/" target="_blank" style="color: yellow;">GREEN SOFTWARE &
            TECHNOLOGY</a>. All rights reserved</p>
</div> 
</body>
</html>