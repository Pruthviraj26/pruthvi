<?php $new = $feature->isNew();	 
	echo $this->element('form_start',['formTitle'=>$viewTitle]);
		echo $this->Form->create($feature,['id'=>'featureForm','url'=>ADMIN_URL.'/features/add','enctype' => 'multipart/form-data']);
			echo $this->Form->input('id',['type'=>'hidden','value'=> !$new ? $feature->id:'']); 
			echo $this->Form->control('title',['value'=> !$new ? $feature->title:'','required']);
			
			if(!$new){ ?>
			<center><img src="<?= !$new?SITE_URL."/img/medium/".$feature->image:'' ?>" ></center>
			<?php  }			
			
			echo $this->Form->input('image', ['label' => 'Image','type' => 'file',$new ? 'required':'']);
			echo $this->Form->control('description',['value'=> !$new ?$feature->description:'','required']);					
			echo !$new?$this->element('create_modify_details',['record'=>$feature]):''; 
		echo $this->Form->button(!$new?'Update':'Add',['class'=>'btn btn-success']);               
		echo $this->Form->end(); 
	echo $this->element('form_end');
?>


<script>
	<?= $this->start('script') ?>
	$(document).ready(function(){
		$("#featureForm").validate({
      rules: {
          title: "required",
          description: "required",          
        
      },
      messages: {
        title: "<?=__("Please, enter title.") ?>",
        image:  "<?=__("Please, select image.") ?>",
        description:  "<?=__("Please, enter description.") ?>",
          
      },
				  errorPlacement: function(error, element) {
				  	$(".form-group").css("height","100px !important;");
				  	element.attr("placeholder",error.html());
				  },

  });
	});
		 
	<?= $this->end('script') ?>
	
</script>