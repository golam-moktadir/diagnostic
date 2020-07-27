<?php
if ($msg == "main") {
    $msg = "";
} elseif ($msg == "empty") {
    $msg = "Please fill out all required fields";
}
foreach ($one_value as $one_info) {
    $record_id = $one_info->record_id;
    $title = $one_info->title;
    if ($title == 1) {
        $title_name = "Hospital Profile";
    } elseif ($title == 2) {
        $title_name = "Message from Chairman";
    } elseif ($title == 3) {
        $title_name = "Message from Director";
    } elseif ($title == 4) {
        $title_name = "X-ray Description";
    } elseif ($title == 5) {
        $title_name = "Message from Up-Zilla Chairman";
    } elseif ($title == 6) {
        $title_name = "Message from UNO";
    } elseif ($title == 7) {
        $title_name = "Message from Meyor";
    } elseif ($title == 8) {
        $title_name = "Mission-Vision";
    } elseif ($title == 9) {
        $title_name = "Ultrasonogram";
    } elseif ($title == 10) {
        $title_name = "Instruction for Guardians";
    } elseif ($title == 11) {
        $title_name = "Dress Code";
    }
    $details = $one_info->details;
}
?>
<aside>
    <section class="content">
        <div class="row" style="margin-top: 55px;">
            <section class="col-xs-12 connectedSortable">
                <div class="" style="color: black;">
                    <?php echo form_open_multipart('Edit/single_page_content/' . $record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit Info.</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                        <div class="row">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="title">Select Title</label>
                                <select name="title" id="title" class="form-control selectpicker"
                                        data-container="body">
                                    <option value="<?php echo $title; ?>"><?php echo $title_name; ?></option>
                                    <option value="1">Hospital Profile</option>
                                    <option value="2">Message from Message from Honorable MP</option>
                                    <option value="3">Message from President</option>
                                    <option value="4">Message from Principal</option>
                                    <!--                          <option value="5">Message from Up-Zilla Chairman</option>
                                                                    <option value="6">Message from UNO</option>
                                                                    <option value="7">Message from Meyor</option>-->
                                    <option value="8">Mission-Vision</option>
                                    <option value="9">Rules & Regulations</option>
                                    <option value="10">Instruction for Guardians</option>
                                    <option value="11">Dress Code</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="image">Image (If any)</label>
                                <input type="file" class="form-control" id="image" placeholder="" name="image">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-8 col-xs-12">
                                <label for="details">Details</label>
                                <textarea rows="6" class="form-control" id="details"
                                          name="details"><?php echo $details; ?></textarea>
                            </div>
                            <div class="box-footer col-xs-4 clearfix">
                                <button style="margin-top: 27px" type="submit" class="pull-left btn btn-success">Edit <i
                                            class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title" style="color: black;">All Info.</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive" style="width: 98%; overflow: scroll; color: black;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center;">SL</th>
                                <th style="text-align: center;">Title</th>
                                <th style="text-align: center;">Image (If any)</th>
                                <th style="text-align: center;">Details</th>
                                <th style="text-align: center;">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count = 0;
                            foreach ($all_value as $single_value) {
                                $count++;
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $count; ?></td>
                                    <td style="text-align: center;">
                                        <?php
                                        $title_id = $single_value->title;
                                        if ($title_id == 1) {
                                            echo "Hospital Profile";
                                        } elseif ($title_id == 2) {
                                            echo "Message from Honorable MP";
                                        } elseif ($title_id == 3) {
                                            echo "Message from President";
                                        } elseif ($title_id == 4) {
                                            echo "Message from Principal";
                                        } elseif ($title_id == 5) {
                                            echo "Message from Up-Zilla Chairman";
                                        } elseif ($title_id == 6) {
                                            echo "Message from UNO";
                                        } elseif ($title_id == 7) {
                                            echo "Message from Meyor";
                                        } elseif ($title_id == 8) {
                                            echo "Mission-Vision";
                                        } elseif ($title_id == 9) {
                                            echo "Rules & Regulations";
                                        } elseif ($title_id == 10) {
                                            echo "Instruction for Guardians";
                                        } elseif ($title_id == 11) {
                                            echo "Dress Code";
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php if (file_exists('./assets/img/single_page_content/' . $single_value->image)) { ?>
                                            <img src="<?php echo base_url(); ?>assets/img/single_page_content/<?php echo $single_value->image; ?>"
                                                 style="width: 100px; height: 70px;">
                                        <?php } else {
                                            echo "No Image";
                                        } ?>
                                    </td>
                                    <td style="text-align: justify;"><?php echo $single_value->details; ?></td>
                                    <td style="text-align: center;">
                                        <a style="margin: 5px;"
                                           href="<?php echo base_url(); ?>Show_edit_form/single_page_content/<?php echo $single_value->record_id; ?>/main"
                                           class="btn btn-info">Edit
                                        </a>
                                        <a style="margin: 5px;"
                                           href="<?php echo base_url(); ?>Delete/single_page_content/<?php echo $single_value->record_id; ?>/main"
                                           class="btn btn-danger">Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </section>
</aside>