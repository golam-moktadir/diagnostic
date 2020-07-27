<!DOCTYPE html>
<html class="bg-black">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <title>GREEN Pathology Complex | Log in</title>
        <link rel="Tab Icon" type="image/jpg" href="<?php echo base_url(); ?>assets/img/fab.jpg"/>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url(); ?>adminlte/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url(); ?>adminlte/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>adminlte/css/AdminLTE.css" rel="stylesheet" type="text/css" />

    </head>
    <body class="bg-black">

        <?php echo form_open('user/login'); ?>

        <div class="form-box" id="login-box">
            <div class="header">Sign In</div>
            <div class="body bg-gray"  align="center">
                <div class="form-group" style="border: #066 1px solid;">
                    <?php echo form_error('username'); ?>
                    <input type="text" name="username" class="form-control" placeholder="User Name" value="<?php echo set_value('username'); ?>">
                </div>
                <div class="form-group" style="border: #066 1px solid;">
                    <?php echo form_error('password'); ?>
                    <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>">
                </div>  
            </div>
            <div class="footer">                                                               
                <input type="submit" name="submit" class="btn bg-olive btn-block" value="Sign in"> 
            </div>

        </div>

    </form>
    <!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>adminlte/js/bootstrap.min.js" type="text/javascript"></script>        

</body>
</html>