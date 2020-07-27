<script>
    function goBack() {
        setTimeout(function(){history.back();}, 500);
    }
</script>
<?php require 'header.php'; ?>
<?php require 'sidebar.php'; ?>


<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");
?>

<body onload="goBack()">
<div class="wrapper">
    <div class="content-wrapper" style="border-style: solid; border: 2px;">
        <section class="content-header">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="alert alert-success alert-dismissable">
                            <i class="fa fa-check"></i>

                            <b>Updated successfully</b>
                        </div>
                    </div><!-- /.box -->
                </div>
            </div>
        </section>
    </div>
    <?php require 'footer.php'; ?>


</div>
</body>
<link rel="stylesheet" href="/maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>








