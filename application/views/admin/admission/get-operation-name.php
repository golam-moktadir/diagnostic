<option value="0">--Select--</option>
<?php
	foreach($names as $name){
?>
	<option value="<?php echo $name->record_id ?>"><?php echo $name->operation_name ?></option>
<?php		
	}
?>