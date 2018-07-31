
<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Created</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input id="accept_card_per_day" name ="accept_card_per_day" type="text" class="form-control" placeholder="Enter limit to allowed card per day"
																 value="<?= isset($record)?' By '.$record->creator->username.' @ '.$record->created :''?>" disabled>
                        </div>
                      </div>

											<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Modified</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input id="accept_card_per_day" name ="accept_card_per_day" type="text" class="form-control" placeholder="Enter limit to allowed card per day"
																 value="<?= isset($record)?' By '. $record->modifier->username.' @ '.$record->modified:''?>" disabled>
                        </div>
                      </div>