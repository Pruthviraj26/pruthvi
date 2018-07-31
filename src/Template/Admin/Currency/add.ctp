<?php $new = $currency->isNew();	 
	echo $this->element('form_start',['formTitle'=>$viewTitle]);
		echo $this->Form->create($currency,['id'=>'currencyForm','url'=>ADMIN_URL.'/currency/add']);
			echo $this->Form->input('id',['type'=>'hidden','value'=> !$new ? $currency->id:'']); 
			echo $this->Form->control('title',['value'=> !$new ? $currency->title:'','required']); 
		//	echo $this->Form->control('code',['type'=>'number','value'=> !$new ?$currency->code:'','required']);					
			echo !$new?$this->element('create_modify_details',['record'=>$currency]):''; 
		echo $this->Form->button(!$new?'Update':'Add',['class'=>'btn btn-success']);               
		echo $this->Form->end(); 
	echo $this->element('form_end');
?>



<script>
	<?= $this->start('script') ?>
	$(document).ready(function(){
				$("#currencyForm").validate({
					rules: {
							title: "required",
							//code: "required",          

					},
					messages: {
						title: "<?=__("Please, enter title.") ?>",
						//code:  "<?=__("Please, enter code.") ?>",


					},
							errorPlacement: function(error, element) {
								$(".form-group").css("height","100px !important;");
								element.attr("placeholder",error.html());
							},

				});
	});
		 
	<?= $this->end('script') ?>
	
</script>