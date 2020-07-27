<?php
if($msg=="main"){
    $msg="";
}elseif($msg=="empty"){
    $msg="Please fill out all required fields";
}
foreach($one_value as $one_info){
    $record_id=$one_info->record_id;
    $date=$one_info->create_date;
    $title=$one_info->title;
    $body=$one_info->body;
}
?>
<aside class="right-side">
    <section class="content">
        <div class="row">
            <section class="col-xs-12 connectedSortable">
                <div class="box box-info" style="color: black;">
                    <?php echo form_open_multipart('Edit/create_sms/'.$record_id); ?>
                    <div class="box-body">
                        <p style="font-size: 20px;">Edit SMS</p>
                        <p style="font-size: 20px; color: #066;"><?php echo $msg; ?></p>
                            <div class="form-group" style="width: 300px;">
                                    <label for="date">Create Date</label>
                                    <input type="date" name="date" id="date" class="form-control"
                                    value="<?php echo $date;?>">
                                </div>
                                <div class="form-group"  style="width: 300px;">
                                    <label for="title">Message Title</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                           value="<?php echo $title;?>">
                                </div>
                            <div class="form-group"  style="width: 70%;">
                                <label for="body">Message Body</label>
                                <textarea rows="8"  name="body" id="body" class="form-control"><?php echo $body;?></textarea>
                            </div>
                        </div>
                    <div class="box-footer clearfix">
                        <button type="submit" class="pull-left btn btn-success">Submit &nbsp <i
                                class="fa fa-arrow-circle-right"></i></button>
                    </div>
                    </form>
                </div>
        </div>
    </section>
    </div>
    </section>
</aside>
