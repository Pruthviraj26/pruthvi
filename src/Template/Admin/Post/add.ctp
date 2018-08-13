<style>
	input[type=file],#preview {
    display: block;
   
    opacity:0;

    height: 150px;
    width: 150px;
    background-image: url(<?= SITE_URL.'/img/default.png' ?>);
		background-size: 150px 150px;
	}
	#preview {
		 position: absolute; 
		  opacity:1 !important;
	}
	.error{
		color: red;
	}
	
	
	@import url(https://fonts.googleapis.com/css?family=Noto+Sans);

</style>
<?php $propertyPost = $themeConfig['Post'][$posttype]; ?>
<?php echo $this->Form->create($post,['id'=>'featureForm','url'=>ADMIN_URL.'/post/add','enctype' => 'multipart/form-data']); ?>
<div class="row">
	<div class="col-md-9 col-sm-12 col-xs-12">

		
			<?php $new = $post->isNew();	 
						echo $this->element('form_start',['formTitle'=>$propertyPost['labels']['singular_name']]);
						echo $this->Form->input('id',['type'=>'hidden','value'=> !$new ? $post->id:'']); 
						echo $this->Form->control('post_type',['type'=>'hidden','value'=> $posttype,'required']);
						echo $this->Form->control('title',['value'=> !$new ? $post->title:'','required']);		
						echo $this->Form->control('excerpt',['value'=> !$new ?$post->description:'','required']);					
					?>
					<div class="form-group " form-type="text">
						<div class="col-md-12 col-sm-12 col-xs-12">
						<label class="control-label" for="last_name">Content</label>
						<textarea  name="content" type="" class="ckeditor form-control" required="required" id="container" rows="5" aria-required="true"><?= !$new ? $post->content:'' ?></textarea> </div>
					</div>
			<?php echo $this->element('form_end'); ?>

			
			<?php
				//	pr($propertyPost['meta']);

					foreach($propertyPost['meta'] as $group=>$meta){
						echo $this->element('form_start',['formTitle'=>strtoupper($group)]);
						foreach($meta as $fields){
							$key = $fields['name'];
							$value = "";
							if(isset($metaValue) and isset($metaValue[$group]) and isset($metaValue[$group][$key] )){
								$value = $metaValue[$group][$key];
							}
							if(is_array($fields['options']['type'])){
								$type = $fields['options']['type']['name'];
								if($type=='multiple')
									$multiple = true;
								else
									$multiple = false;
													$options = $fields['options']['type']['options'];
												//foreach($options as $key=>$value){ 
											/*		echo '<select class="form-control" name="<?= "meta[$group][$key][]" ?>">';
													echo "<option value='$key'>$value</option>";
													echo '</select>';
											*/
			
													echo $this->Form->select("meta[$group][$key][]",$options,['label'=>'test','type' => 'select','class'=>'form-control','multiple' => $multiple,'value'=>'']);
													
							}else{
								echo $this->Form->control("meta[$group][$key][]",['label'=>ucfirst($fields['name']),'type'=>'text','value'=>$value]);	
							}
							
						}
						echo $this->element('form_end');
					}
			?>
			<?php 
			$addMore ='<button id="add_new" type="reset" class="btn btn-primary btn-sm add_field_button"> <i class="fa fa-plus"></i> Add More </button>';
			echo $this->element('form_start',['formTitle'=>'OTHER INFORMATION','elements'=>[$addMore]]); ?>			
			<div class="input_fields_wrap"></div>			
			<?php echo $this->element('form_end'); ?>
			
			
				<?php  $this->element('form_seo',['seo'=>isset($seo)?$seo:null]); ?>
			
			
	

	
	
	<div class="col-md-3 col-sm-12 col-xs-12">


		
		<?php echo $this->element('form_start',['formTitle'=>'Publish']); ?>
		<input type="submit" class="btn btn-lg btn-info btn-block" value="Save">
		<?php  echo $this->element('form_end'); ?>

		<?php 
			foreach($termsList as $texonomy=>$terms){
					echo $this->element('form_start',['formTitle'=>ucfirst($texonomy)]);				
					//echo $this->Form->select("terms[$texonomy]",$terms,['type' => 'checkbox','class'=>'form-control','multiple' => true,'default'=>!$new?$termsForPost:'']);  				
					echo $this->element('texonomy_checkbox',['terms'=>$terms,'texonomy'=>$texonomy,'termsForPost'=>!$new?$termsForPost:'']);
					echo $this->element('form_end');
			}

			echo $this->element('form_start',['formTitle'=>'Featured Image']);
			$image = !$new ? SITE_URL.'/img/uploads/'.$post->image:'';
			echo '<img id="preview" src="'.$image.'"/><input type="file" name="image" id="image" >';
			echo $this->element('form_end');
			
		?>
			
	</div>

<?php echo $this->Form->end();  ?>

	



<script>
	<?= $this->start('script') ?>
	jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Letters only please"); 
	
	$(document).ready(function(){
		 var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
     $("#add_new").click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="form-group row" ><div class="col-md-6 col-sm-6 col-xs-12"><label class="control-label" for="excerpt">Name</label><input type="text" name="othermeta[key][]" class="form-control"></div><div class="col-md-6 col-sm-6 col-xs-12"><label class="control-label" for="excerpt">Value</label><input type="text" name="othermeta[value]" class="form-control"></div></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
		
		
		function fillSeoForm(){
			$title = 	$("#title").val();
			$content = 	$("#excerpt").val();
			$oldtitle = '<?= isset($seo)?$seo->title:''?>';
			$oldkeywords = '<?= isset($seo)?$seo->keywords:''?>';
			 
			if($title!="" && $title!=$oldtitle){
				$.post("<?=ADMIN_URL ?>/seo/geturl",{title:$title},function(response){
						response = JSON.parse(response);
						$("#seo_url").val(response.data.url);
				});
			}
			
			if($content!="" && $content!=$oldkeywords){
				$.post("<?=ADMIN_URL ?>/seo/getkeywords",{content:$content},function(response){
						response = JSON.parse(response);
						$("#seo_keyword").val(response.data.keyword);
				});
			}
			
		}
		
		$("#title").blur(fillSeoForm);
		$("#excerpt").blur(fillSeoForm);
		$("#image").change(function(){
			
			 var reader = new FileReader();

        reader.onload = function (e) {
					
            $("#preview").attr('src',e.target.result);
        }

        reader.readAsDataURL($(this).prop('files')[0]);
			
			
	
			
		});
		
		$("#featureForm").validate({
      rules: {
          title: "required",
          description: "required", 							
				<?php		//start - postmeta validation message start
				foreach($propertyPost['meta'] as $group=>$meta){
					foreach($meta as $fields){
						if(isset($fields['options']['validation'])){
								echo "'meta[".$group."][".$fields['name']."][]':{";						
								foreach($fields['options']['validation'] as $rule=>$message){
									echo $rule.':true,';
								}
								echo "},";
							}
					}				
				} 
			//end - postmeta validation message start
					?>
				



        
      },
      messages: {
        title: "<?=__("Please, enter title.") ?>",
        image:  "<?=__("Please, select image.") ?>",
        description:  "<?=__("Please, enter description.") ?>",
          <?php	
					//end - postmeta validation message start
					foreach($propertyPost['meta'] as $group=>$meta){
								foreach($meta as $fields){
									if(isset($fields['options']['validation'])){
											echo "'meta[".$group."][".$fields['name']."][]':{ ";
											foreach($fields['options']['validation'] as $rule=>$message){
												echo $rule.': "'.$message.'" , ';
											}
											echo "},";
										}
									}	
							} 
					 //start - postmeta validation message 
					?>
      },						

			/*
				  errorPlacement: function(error, element) {
						
				  	$(".form-group").css("height","100px !important;");
				  	element.attr("placeholder",error.html());
				  },*/

  	});
	});
		 
	
	
	<?= $this->end('script') ?>
	
</script>