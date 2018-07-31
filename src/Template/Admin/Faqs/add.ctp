<?php $new = $faq->isNew();	 
	echo $this->element('form_start',['formTitle'=>$viewTitle]);
		echo $this->Form->create($faq,['id'=>'faqForm','url'=>ADMIN_URL.'/faqs/add','enctype' => 'multipart/form-data']);
			echo $this->Form->input('id',['type'=>'hidden','value'=> !$new ? $faq->id:'']); 
			echo $this->Form->control('question',['value'=> !$new ? $faq->title:'','required']); 
			echo $this->Form->control('answer',['value'=> !$new ?$faq->description:'','required']);					
			echo !$new?$this->element('create_modify_details',['record'=>$faq]):''; 
		echo $this->Form->button(!$new?'Update':'Add',['class'=>'btn btn-success']);               
		echo $this->Form->end(); 
	echo $this->element('form_end');
?>



<script>
	<?= $this->start('script') ?>
		$(document).ready(function(){
					$("#faqForm").validate({
						rules: {
								question: "required",
								answer: "required",          
						},
						messages: {
							question: "<?=__("Please, enter question.") ?>",
							answer:  "<?=__("Please, enter answer.") ?>",
						},
						errorPlacement: function(error, element) {
							$(".form-group").css("height","100px !important;");
							element.attr("placeholder",error.html());
						},
					});
		});
	<?= $this->end('script') ?>
</script>