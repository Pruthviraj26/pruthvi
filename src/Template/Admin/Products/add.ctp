
<?php $new = $product->isNew();	 
	echo $this->element('form_start',['formTitle'=>$viewTitle]);
		echo $this->Form->create($product,['id'=>'productForm','url'=>ADMIN_URL.'/products/add']);
			echo $this->Form->input('id',['type'=>'hidden','value'=> !$new ? $product->id:'']); 
			echo $this->Form->control('title',['value'=> !$new ? $product->title:'']); 
			echo $this->Form->control('accept_card_per_day',['id'=>'accept_card_per_day','type'=>'text','value'=> !$new ?$product->accept_card_per_day:'']);
			echo $this->Form->control('offer_percentage',['id'=>'offer_percentage','type'=>'text','value'=> !$new ?$product->offer_pecentage:'']);
			echo $this->Form->control('description',['value'=>!$new?$product->description:'']);
			echo !$new ? $this->element('create_modify_details',['record'=>$product]):''; 
		echo $this->Form->button($new?'Add':'Update',['class'=>'btn btn-success']);               
		echo $this->Form->end(); 
	echo $this->element('form_end');
?>
<script>
	<?= $this->start('script') ?>
	$(document).ready(function(){
		
		
		$("#offer_percentage").keyup(chekcPercentageValue);
		$("#accept_card_per_day").keyup(digitOnly);
		
		$("#productForm").validate({
      rules: {
          title: "required",
          accept_card_per_day:{required:true,min:0},
          offer_percentage: {required:true,min:0,max:100},
          description: "required",          
        
      },
      messages: {
        title: "<?=__("Please, enter title.") ?>",
        accept_card_per_day:  "<?=__("Please, enter number of cards to be accepted in a day.") ?>",
        offer_percentage:  "<?=__("Please, enter number of cards to be accepted in a day.") ?>",
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