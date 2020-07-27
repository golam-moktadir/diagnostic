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

        <?php echo form_open('Log_in_out/login_check'); ?>

        <div class="form-box" id="login-box">
            <div class="header">Sign In</div>

            <div class="body bg-gray"  align="center">
                <div class="form-group" style="width: 40%; border: #1a3d4f 1px solid; text-align: center;">
                    <select name="user_type" id="user_type" class="form-control" style="color: black;">
                        <option value="">-- Select --</option>
                        <option value="admin">Admin</option>
                        <!--<option value="accounts">Accounts</option>-->
                        <option value="staff">Staff</option>
                    </select>
                </div>
                <div class="form-group" style="border: #066 1px solid;">
                    <input type="text" name="user_id" class="form-control" placeholder="User ID">
                </div>
                <div class="form-group" style="border: #066 1px solid;">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>  

                <div class="form-group" style="color: red;">
                    <?php echo validation_errors(); ?>
                </div>
                <div class="form-group" style="color: red;">
                    <?php echo $wrong_msg; ?>
                </div>
            </div>
            <div class="footer">                                                               
                <button type="submit" class="btn bg-olive btn-block">Sign in</button> 
            </div>

        </div>

    </form>
    <!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>adminlte/js/bootstrap.min.js" type="text/javascript"></script>        

</body>
</html>