

	<?php $this->Form->templates($form_templates['frontForm']); ?>

<div class="container" >
	
	
   <div data-reactroot="">
      <div class="row centered" ><center>
			
					  
         <div class="col-lg-6 col-lg-offset-3">
            <h2>What kind of card do you have?</h2>
					 <div class="buttons">
					 <?php foreach($products as $product){ ?>
						 <button class="product btn btn-lg " value="<?= $product->id ?>"><?= $product->title ?></button>
						
            	
            <?php } ?>
            
            </div>
					<?php 
		
					 if($authUser){  ?>
					
						<?= $this->Form->create($card,['id'=>'cardForm','url'=>SITE_URL.'/cards/add','style'=>'display:none;']);		?>	
					 <div><p>
            <!-- react-text: 13 -->dEnter your card information to get an offer. Offers for <!-- /react-text --><!-- react-text: 14 -->Starbucks<!-- /react-text --><!-- react-text: 15 --> are usually between 70-80% of the card's value. If you accept the offer, the balance will be transferred off the card and you'll be paid in bitcoin.<!-- /react-text -->
         </p>

												 	 
												 <?php
		echo $this->Form->control('product_id',['type'=>'hidden']); 
		echo $this->Form->control('card_no'); 
		echo $this->Form->control('pin'); 		
		echo $this->Form->control('currency_id'); 		
		echo $this->Form->control('wallet_address'); 		
		echo $this->Form->button('Add',['class'=>'btn btn-success']);               

	?>
						 
						 
 
   <p class="help-block">
      <!-- react-text: 20 -->If you would like to sell gift cards in bulk, please contact&nbsp;<!-- /react-text --><a href="mailto:support@cardforcoin.com?subject=Bulk%20Sales">support</a><!-- react-text: 22 -->.<!-- /react-text -->
   </p>					 
 
</div>
					<?= 	$this->Form->end(); ?>
					 <?php }else {?>
					  <div style="padding:20px;">
               Log in with Facebook, Twitter, or Reddit to exchange Starbucks cards.
							<br><br>
               <div class="social-buttons ">
               <center>    <?php echo $this->Facebook->loginLink($options = ['label'=>'Facebook','class'=>"btn btn-primary btn-lg"]); ?>
                  				<?= $this->Html->link('Google',['controller'=>'users','action'=>'googlelogin'],['class'=>'btn btn-warning btn-lg']); ?>
                 </center>
               </div>
            </div>
					 
					 <?php } ?>
           
         </div>
					 
				</center>	
      </div>
   </div>
</div>

<script>
$(document).ready(function(){
	$(".product").click(function(){
		$(".product").attr('class','product btn btn-lg'); 
		$product_id = $(this).val();
		$product = $(this);
		$.get('<?= SITE_URL.'/products/checklimit/'; ?>'+$product_id,function(response){
			response = $.parseJSON(response);
			$remainingCards = response.data;
			if($remainingCards>0){				
				$("#product-id").val($product_id);	
					$("#cardForm").fadeOut('100');
				$("#cardForm").fadeIn('100');
				$("#card_no").focus();
				$("#flash-info").hide('100');			
				$product.attr('class','product btn btn-lg btn-success '); 
			}else{
				
				 $("#cardForm").fadeOut('100');
					$("#flash-info").fadeIn('100');
				$("#product_id").val('');	
					$("#flash-info").html('Please, try leter todays limit for card accept is not remained!');
			}
		});
	});
	
	$("#submit").click(function(event){
		if($("#product_id").val()==''){

			$("#flash-negagive").show('100');
			$("#flash-negagive").html('Please, Select Any Product');
			event.preventDefault();	
		}
		
	});
	
	
	 $("#cardForm").validate({
      rules: {
          product_id: "required",
          card_no: "required",
          pin: "required",          
        
      },
      messages: {
        product_id: "<?=__("Please, Select Product.") ?>",
          card_no:  "<?=__("Please, Enter Card Number.") ?>",
          pin:  "<?=__("Please, Enter Pin Number.") ?>",
          
      },
				  errorPlacement: function(error, element) {
				  	$(".form-group").css("height","100px !important;");
				  },

  });
	
});
	
	
</script>