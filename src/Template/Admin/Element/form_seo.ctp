
			<?php
				echo $this->element('form_start',['formTitle'=>'SEO - SEARCH ENGINE OPTIMIZATION']);
				echo $this->Form->control('seo[id]',['type'=>'hidden','value'=>isset($seo)?$seo->id:'']);
				echo $this->Form->control('seo[url]',['id'=>'seo_url','label'=>'Url','value'=>isset($seo)?$seo->url:'', 'required']);
		
			?>
				<div class="form-group " form-type="textarea">            
					 <div class="col-md-12 col-sm-12 col-xs-12">
					 		<label class="control-label" for="keywords">Keywords</label>					 			
					 		<textarea name="seo[keywords]" type="" class="form-control" required="required" id="seo_keyword" rows="3" aria-required="true"><?= isset($seo)?$seo->keywords:'' ?></textarea>
					 </div>
				</div>
			
				<div class="form-group " form-type="textarea">            
					 <div class="col-md-12 col-sm-12 col-xs-12">
					 		<label class="control-label" for="excerpt">Description</label>					 			
					 		<textarea name="seo[description]" type="" class="form-control" required="required" id="seo_description" rows="5" aria-required="true"><?= isset($seo)?$seo->description:'' ?></textarea>
					 </div>
				</div>
			
			<?php
				echo $this->element('form_end');
			?>
			