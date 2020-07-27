<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
if ($no == 1) {
    $title = "View Result";
    $name_ajax = "get_website_total_result";
} elseif ($no == 2) {
    $title = "View Merit List";
    $name_ajax = "get_website_merit_list";
} elseif ($no == 3) {
    $title = "View Fail List";
    $name_ajax = "get_website_fail_list";
}
?>
<div class="container" style="color: black; width: 100%; padding: 0px 50px;">
    <div class="box box-info" style="color: black;">
        <form id="result_form">
            <div class="box-body">
                <p style="font-size: 20px;"><?php echo $title; ?></p>
                <div class="row">
                    <div class="form-group col-sm-4 col-xs-12">
                        <label for="class">Select Class<b style="color: red;">*</b></label>
                        <select name="class" id="class" class="form-control">
                            <option value="">-- Select --</option>
                            <?php foreach ($all_class as $single_class) { ?>
                                <option value="<?php echo $single_class->class_name; ?>">
                                    <?php echo "Class - " . $single_class->class_name; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label for="shift">Select Shift<b style="color: red;">*</b></label>
                        <select name="shift" id="shift" class="form-control">
                            <option value="">-- Select --</option>
                            <?php foreach ($all_shift as $single_shift) { ?>
                                <option value="<?php echo $single_shift->shift_name; ?>">
                                    <?php echo $single_shift->shift_name; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12" id="group_div" style="display: none">
                        <label for="group">Select Group<b style="color: red;">*</b></label>
                        <select name="group" id="group" class="form-control">
                            <option value="">-- Select --</option>
                            <?php foreach ($all_group as $single_group) { ?>
                                <option value="<?php echo $single_group->group_name; ?>">
                                    <?php echo $single_group->group_name; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12" id="section_div">
                        <label for="section">Select Section<b style="color: red;">*</b></label>
                        <select name="section" id="section" class="form-control">
                            <option value="">-- Select --</option>
                            <?php foreach ($all_section as $single_section) { ?>
                                <option value="<?php echo $single_section->section_name; ?>">
                                    <?php echo $single_section->section_name; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label for="session_name">Select Year</label>
                        <select name="session_name" id="session_name" class="form-control">
                            <option value="">-- Select --</option>
                            <?php foreach ($all_session as $single_session) { ?>
                                <option value="<?php echo $single_session->session_name; ?>"
                                    <?php if ($single_session->session_name == date('Y')) {
                                        echo 'selected';
                                    } ?>>
                                    <?php echo $single_session->session_name; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div id="show_info2">
                        <div class="form-group col-sm-4 col-xs-12">
                            <label for="exam_name">Select Exam</label>
                            <select name="exam_name" id="exam_name" class="form-control">
                                <option value="">-- Select --</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer clearfix">
                <button id="result_btn" type="button" class="pull-left btn btn-success">Show <i
                            class="fa fa-arrow-circle-right"></i></button>
            </div>
        </form>
    </div>
    <br>
    <br>
    <div class="box box-info">
        <div class="box-body table-responsive" id="show_result" style="width: 98%; 
             color: black; border: #591e46 5px solid; border-radius: 10px; padding: 15px;">
            <h4 style="text-align: center;"><?php echo $title; ?></h4>
        </div>
    </div>
</div>
<br>
<script type="text/javascript">
    $("#result_btn").click(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/<?php echo $name_ajax; ?>",
            data: $('#result_form').serialize(),
            success: function (data) {
                $('#show_result').html(data);
            }
        });
    });
    $("#class").on("change", function () {
        var input_data = $('#class').val();
        console.log(input_data);

        if (input_data == '9' || input_data == '10') {
            $('#group_div').css('display', 'block');
            $('#section').val('');
            $('#section_div').hide();
        } else {
            $('#group').val('');
            $('#group_div').hide();
            $('#section_div').css('display', 'block');
        }

        var post_data = {
            'class_name': input_data,
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_ajax_value/get_exam_info",
            data: post_data,
            success: function (data) {
                $('#show_info2').html(data);
                $('#date_div').hide();
            }
        });
    });
</script>