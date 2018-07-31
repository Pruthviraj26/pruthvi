
<?php 

		$texonomyOptions = $themeConfig['Texonomies'][$texonomy]['option'];
$new = $term->isNew();	
	$options = ['0'=>'None'];
		if($terms)
			foreach($terms as $option)
				$options[$option->id] = $option->name; 

	echo $this->element('form_start',['formTitle'=>$viewTitle]);
		echo $this->Form->create($term,['id'=>'termFrom','url'=>ADMIN_URL.'/terms/add','enctype' => 'multipart/form-data']);
			echo $this->Form->input('id',['type'=>'hidden','value'=> !$new ? $term->id:'']); 
			echo $this->Form->input('texonomy',['type'=>'hidden','value'=> $texonomy]); 
			echo $this->Form->input('post_type',['type'=>'hidden','value'=> $posttype]); 
			echo $this->Form->control('name',['value'=> !$new ? $term->title:'','required']);	
			if($texonomyOptions['hierarchical']){
				echo $this->Form->select('parent_id',$options,['label'=>'Parent']);	
			}
			echo $this->Form->control('description',['value'=> !$new ?$term->description:'','required']);					
			echo !$new?$this->element('create_modify_details',['record'=>$term]):''; 
		echo $this->Form->button(!$new?'Update':'Add',['class'=>'btn btn-success']);               
		echo $this->Form->end(); 
	echo $this->element('form_end');
?>



<script>
	<?= $this->start('script') ?>
	$(document).ready(function(){
		$("#termFrom").validate({
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