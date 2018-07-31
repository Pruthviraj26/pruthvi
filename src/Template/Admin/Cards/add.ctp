
<?php  
$options['PENDING'] = 'PENDING';
$options['APPROVED'] = 'APPROVED';
$options['OFFERED'] = 'OFFERED';
$options[''] = '';
$options[''] = '';
$options[''] = '';
$options[''] = '';
$options[''] = '';
$options[''] = '';
$options[''] = '';

	
	

	echo $this->element('form_start',['formTitle'=>$viewTitle]);
		echo $this->Form->create($card,["id"=>"cardForm"]);
			echo $this->Form->control('id',['type'=>'hidden','value'=> $card->id]); 
			echo $this->Form->control('balance',['value'=> $card->balance]); 
			echo $this->Form->control('balance_used',['value'=> $card->balance_used]); 
			echo $this->Form->control('offer',['value'=> $card->offer]); 			
			echo $this->Form->select('status',['value'=>]); 			
		
		echo $this->Form->button(!$new?'Update':'Add',['class'=>'btn btn-success']);               
		echo $this->Form->end(); 
	echo $this->element('form_end');
?>



<script>
<?= $this->start('script') ?>
			$(document).ready(function(){		
			$("#cardForm").validate({      
						errorPlacement: function(error, element) {
							$(".form-group").css("height","100px !important;");
							element.attr("placeholder","Required");
						},
			});
	});
<?= $this->end('script') ?>
	</script>