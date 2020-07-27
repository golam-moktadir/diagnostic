<script>
    function goBack() {
        setTimeout(function () {
            history.back();
        }, 500);
    }
</script>
<?php require 'header.php'; ?>
<body onload="goBack()">
    <aside style="margin-top: 20px;">
        <section class="col-xs-12 connectedSortable">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="alert alert-success alert-dismissable">
                            <i class="fa fa-check"></i>

                            <b>Inserted Successfully</b>
                        </div>
                    </div><!-- /.box -->
                </div>
            </div>
        </section>
    </aside>
</body>
<?php require 'footer.php'; ?>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>









