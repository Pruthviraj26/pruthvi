  <style>
  	.card > input{ /* HIDE RADIO */
      opacity: 0;
    position: absolute;
			cursor: pointer !important;
    
    width: 100%;
    height: 100%; /* Remove input from document flow */
}
.card > input + img{ /* IMAGE STYLES */
  cursor:pointer;
  border:2px solid transparent;

}
.card > input:checked + #pruthvi { /* (RADIO CHECKED) IMAGE STYLES */
  border:2px solid #f00 !important;
}
		
		.card{
			    margin: 10px !important;
					cursor: pointer;
		}
  </style>   

<?php $new = $siteconfig->isNew();	 
	echo $this->element('form_start',['formTitle'=>$viewTitle]);
		echo $this->Form->create($siteconfig,['id'=>'siteconfigForm','url'=>ADMIN_URL.'/siteconfigs/add','enctype' => 'multipart/form-data']);
			


			if(!$new){ 
					$header_image = "Header Logo <br><img src='".SITE_URL."/img/icon/".$siteconfig->header_logo_image."'>";
					$footer_image = "Footer Logo <br><img src='".SITE_URL."/img/icon/".$siteconfig->footer_logo_image."' style='background-color:#292929'>";
			}else{
				$header_image = "Header Image";
				$footer_image = "Footer Image";
			}
			
		

			echo $this->Form->input('id',['type'=>'hidden','value'=> !$new ? $siteconfig->id:'']);	


$plugin_path = str_replace("src\Template\Admin\Siteconfigs",'',__DIR__)."plugins\\";

$themeList = glob($plugin_path.'Theme*');

foreach($themeList as $theme){ 
	$images = glob($theme.'\webroot\\screenshot*');
	$screenshot = str_replace($theme.'\webroot\\','',$images[0]);
	$theme = str_replace($plugin_path,'',$theme);
	$screenshot = SITE_URL.'/'.$theme.'/'.$screenshot;
?>



<div class="col-md-3 card" style="width: 20rem;">
	 <input type="radio" name="front_theme" value="<?= $theme ?>" <?= $siteconfig->front_theme==$theme?'checked':'' ?>/>
	<div id="pruthvi">
  <img class="card-img-top" src="<?= $screenshot ?>" alt="Card image cap" width="100%" height="150px">
  <div class="card-block">
		
    <h4 class="card-title"><center><?= ucfirst(str_replace('Theme','',$theme)); ?></center></h4>
    
  </div>
		</div>
</div>

<?php
}


			echo $this->Form->control('title',['label'=>['text'=>'Site Name'],'value'=> !$new ? $siteconfig->title:'','required']);
			echo $this->Form->control('copyright',['value'=>!$new?$siteconfig->copyright:'','required']);
			echo $this->Form->control('email',['value'=>!$new?$siteconfig->email:'','required']);
			echo $this->Form->control('facebook',['value'=> !$new ? $siteconfig->facebook:'']); 			
			echo $this->Form->control('google_plus',['value'=> !$new ? $siteconfig->google_plus:'']); 			
			echo $this->Form->control('twitter',['value'=> !$new ? $siteconfig->twitter:'']); 			
			echo $this->Form->control('instagram',['value'=> !$new ? $siteconfig->instagram:'']); 			
			echo $this->Form->control('pinterest',['value'=> !$new ? $siteconfig->pinterest:'']);
			echo $this->Form->control('description',['value'=>!$new?$siteconfig->description:'','required']);	

			echo $this->Form->control('facebook_app_id',['type'=>'text','value'=>!$new?$siteconfig->facebook_app_id:'','required']);	
			echo $this->Form->control('facebook_app_secret',['value'=>!$new?$siteconfig->facebook_app_secret:'','required']);	
			echo $this->Form->control('google_client_id',['type'=>'text','value'=>!$new?$siteconfig->google_client_id:'','required']);	
			echo $this->Form->control('google_client_secret',['value'=>!$new?$siteconfig->google_client_secret:'','required']);	
			echo $this->Form->control('twitter_consumer_key',['value'=>!$new?$siteconfig->twitter_consumer_key:'','required']);	
			echo $this->Form->control('twitter_consumer_secret',['value'=>!$new?$siteconfig->twitter_consumer_secret:'','required']);	
			echo $this->Form->control('mailchimp_key',['value'=>!$new?$siteconfig->mailchimp_key:'','required']);	
			echo $this->Form->control('mailchimp_list_id',['type'=>'text','value'=>!$new?$siteconfig->mailchimp_list_id:'','required']);	
			echo $this->Form->control('smtp_host',['value'=>!$new?$siteconfig->smtp_host:'','required']);	
			echo $this->Form->control('smtp_port',['value'=>!$new?$siteconfig->smtp_port:'','required']);	
			echo $this->Form->control('smtp_email_id',['type'=>'email','value'=>!$new?$siteconfig->smtp_email_id:'','required']);	
			echo $this->Form->control('smtp_password',['value'=>!$new?$siteconfig->smtp_password:'','required']);	

			
			echo $this->Form->input('header_logo_image', ['label' => $header_image,'type' => 'file',$new ? 'required':'','escape' => false]);	
			echo $this->Form->input('footer_logo_image', ['label' => $footer_image,'type' => 'file',$new ? 'required':'','escape' => false]);	
			echo !$new ? $this->element('create_modify_details',['record'=>$siteconfig]):''; 



			echo $this->Form->button(!$new?'Update':'Add',['class'=>'btn btn-success']);               
			echo $this->Form->end(); 
	echo $this->element('form_end');
?>


<script>
	<?= $this->start('script') ?>
	$(document).ready(function(){
		$("#siteconfigForm").validate({
					 	rule: {
						title: "required",
						copyright:  "required",
						description:  "required",
						logo_image:  "required",
					},
					messages: {
						title: "<?=__("Please, enter title.") ?>",
						copyright:  "<?=__("Please, enter copyright.") ?>",
						description:  "<?=__("Please, enter description.") ?>",
						logo_image:  "<?=__("Please, Logo Image.") ?>",
						
						facebook_app_id:  "<?=__("Please, enter facebook app Id.") ?>",
						facebook_app_secret:  "<?=__("Please, enter facebook app secret key.") ?>",
						google_client_id:  "<?=__("Please, enter google app Id.") ?>",
						google_client_secret:  "<?=__("Please, enter google app secret key.") ?>",
						twitter_consumer_key:  "<?=__("Please, enter twitter app key.") ?>",
						twitter_consumer_secret:  "<?=__("Please, enter twitter app secret. ") ?>",
						smtp_host:  "<?=__("Please, enter smtp email host name.") ?>",
						smtp_port:  "<?=__("Please, enter smtp email port number.") ?>",
						smtp_email_id:  "<?=__("Please, website gmail account email address.") ?>",
						smtp_password:  "<?=__("Please,gmail account password.") ?>",

					},
							errorPlacement: function(error, element) {
								$(".form-group").css("height","100px !important;");
								element.attr("placeholder",error.html());
							},

				});
		
	
	});
		 
	<?= $this->end('script') ?>
	
</script>