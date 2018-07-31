
<?php 


$created = "";
if(isset($record->created)){
	if($record->created){ 
		
		if(isset($record->creator->username))
			$created = ' By '.$record->creator->username;
		$created = $created.date_format($record->created,' m-d-Y @ H:i:s ');
}
	

?>
<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Created</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input id="accept_card_per_day" name ="accept_card_per_day" type="text" class="form-control" placeholder="Enter limit to allowed card per day"
																 value="<?= $created ?>" disabled>
                        </div>
                      </div>
<?php } ?>
<?php if($record->modified ){ 
	
$modified = "";
if(isset($record->modifier->username))
	$modified = ' By '.$record->modifier->username;

if(isset($record->modified))
	$modified = $modified.date_format($record->modified,' m-d-Y @ H:i:s');
	
	if($modified != $created){
	

?>
											<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Modified</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input id="accept_card_per_day" name ="accept_card_per_day" type="text" class="form-control" placeholder="Enter limit to allowed card per day"
																 value="<?= $modified ?>" disabled>
                        </div>
                      </div>
<?php }
} ?>