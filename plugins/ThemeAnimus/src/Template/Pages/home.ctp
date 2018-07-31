
<?php $this->Form->templates($form_templates['frontForm']); ?>
<div class="bannerdiv">
   <img alt="" src="<?= FRONT_URL ?>/images/banner.jpg" class="img-responsive" />
   <div class="banner-content">
      <strong>welcome to <span><?= $siteconfig->title ?></span></strong>
      <p><?= $siteconfig->description ?>
      </p>
      <a href="#about">get started</a>
   </div>
</div>
<!----------------------------------------------------------------------------------------------------------->
<section class="choicesec">
   <div id="about"></div>
   <div class="container">
   <div class="row ccard">
      <div class="col-md-6 col-sm-6 pad">
         <img alt="" src="<?= FRONT_URL ?>/images/imgchoise.jpg" class="img-responsive" />
      </div>
      <div class="col-md-6 col-sm-6 pad">
         <div class="plan-div">
          
               <h1>What kind of card do you have?</h1>
               <ul class="checkdiv">
                  <?php 
							$selected = "notChecked";
								$pid = "";
									foreach($products as $product){ 
							
								$isAvailabel = ($product->accept_card_per_day >= count($product->cards))?true:false;
								if($selected=="notChecked" && $isAvailabel){
									$selected="checked";
									
									$product_id = $product->id;
									$product_title = $product->title;
									$product_offer_percentage = $product->offer_percentage;
									
								}else{
										$selected = "";
								}
								
								 
								 ?>
                  <li class="product" value="<?= $product->id ?>" >
										
                     <input type="radio" class="productList" name="product_id" id="product_<?= $product->id ?>"  value="<?= $product->id ?>" <?= $selected ?> >
                     <label for="control_01" ><?= $product->title ?> </label>
                  </li>
								 
                  <?php } ?>
								 
								 
								 
								 <label id="product_error" class="error" for="product" style="display:none;"></label>
               </ul>
               <?php if($authUser){ ?>
					   <form class="form-horizontal login-fild-form" method="post" accept-charset="utf-8" id="cardForm" name="cardForm" action="<?= SITE_URL ?>/cards/add">
							 <input type="hidden" id="product_id" name="product_id" value="<?= isset($product_id)?$product_id:0 ?>" >
							 <input type="hidden" id="product_title" name="product_title" value="<?= isset($product_title)?$product_title:'' ?>" >
							 <input type="hidden" id="product_offer_pecentage" name="product_offer_pecentage" value="<?= isset($product_offer_percentage)?$product_offer_percentage:0 ?>" >
             
                  <div class="row">
                     <div class="col-md-5 col-sm-5">
                     		<input name="card_no" type="text" class="form-control" placeholder="Card number" id="card_no" maxlength="16" 
															 onKeyUp="if(isNaN(this.value)) this.value = this.value.substring(0, this.value.length-1);" ></div>

								
								
								
                     <div class="col-md-4 col-sm-4">
                     
                     <input name="pin" type="text" class="form-control" placeholder="PIN" id="pin" maxlength="8"  onKeyUp="if(isNaN(this.value))this.value = this.value.substring(0, this.value.length-1);" ></div>
										
									
										
											<div class="col-md-3 col-sm-3">	
													 <input name="balance_from_user" id="balance_from_user" type="text" class="form-control" placeholder="Balance" ></div>
										 	
										
									
										
                  </div>
                  <div class="row">
                    	 <div class="col-md-3 col-sm-4">
                        <select name="currency_id" placeholder="Select Currency" id="currency_id" class="form-control" onChange="wallet_address.focus()">
                    
                      			<?php foreach($currencies as $currency){?>
														<option value="<?= $currency->id ?>"><?= $currency->title ?></option>
														<?php } ?>
                        </select>
                     </div>
										
                     <div class="col-md-6 col-sm-4"><input name="wallet_address" type="text" class="form-control" placeholder="Wallet address" id="wallet-address"></div>
										 <div class="col-md-3 col-sm-4">
                        <center><button type="submit" id="submit" class="btn btn-success">APPLY</button></center>
                     </div>
                     <div class="col-md-4 col-sm-6"></div>
                  </div>
							 <div class="row">
								  <div class="col-md-12 col-sm-12"><p id="offer_message"></p></div>
							 </div>
                
          
							 
            </form>
            <?php }else{ ?>
            <span>Log in with Facebook, Twitter, or Reddit to exchange above cards.</span>
            <ul class="checksocial">
               <li>
                  <?php echo $this->Facebook->loginLink($options = ['label'=>'<i class="fa fa-facebook-f"></i>Facebook</a>','class'=>"fb"]); ?>
               </li>
               <li><a href="<?=SITE_URL ?>/users/googlelogin"  class="gl"><i class="fa fa-google-plus"></i>Google+</a></li>
							
							<?php if($twitterLoginUrl){ ?>
                         <li><a href="<?= $twitterLoginUrl ?>"  class="tw"><i class="fa fa-twitter"></i>Twitter</a></li>
							<?php } ?>
            </ul>
            <?php } ?>
         </div>
      </div>
   </div>
	</div>
</section>
<!----------------------------------------------------------------------------------------------------------->
<?= $this->element('how_it_works') ?>    
<?= $this->element('features') ?>


<script>
   $(document).ready(function(){
			function countOfferAmount(){
					$balance_from_user = $(this).val();
				if($balance_from_user>0){
					$product_offer_pecentage = $("#product_offer_pecentage").val();
					$product_title = $("#product_title").val();
				
					$offer_amount = ($balance_from_user * $product_offer_pecentage)/100;
					$msg = "You will get "+ $("#currency_id option:selected").text() +" equivalent to  $"+$offer_amount+" based on your balance.";
					$("#offer_message").html($msg);		
				}else{
					$("#balance_from_user").val('');	
						$("#offer_message").html('');		
				}
				
		}
		 
		$("#balance_from_user").keyup(countOfferAmount);
		 
		 
   	$(".product").click(function(){
				
			
   			$("#product_error").fadeOut('100');
				$product = $(this);
   		$product_id = $product.val();
			
   	
			
   		$.get('<?= SITE_URL.'/products/checklimit/'; ?>'+$product_id,function(response){
   			response = $.parseJSON(response);
   			$remainingCards = response.data.product.remaining_accept_card_per_day;
   			$offer_percentage = response.data.product.offer_percentage;
   			if($remainingCards>0){
			
   				$("#product_id").val($product_id);	
   				
   				$("#cardForm").fadeIn('100');
   				$("#card_no").focus();
   				$("#flash-info").hide('100');						
   				$(".productList").attr('checked',false);
					$("#product_"+$product_id).attr('checked','true');
					console.log($("#product_"+$product_id));
					$("#product_id").val($product_id);
					$("#product_offer_pecentage").val($offer_percentage);
					
								$("#balance_from_user").trigger('keyup');
					
   			}else{
   				
   				 $("#cardForm").fadeOut('100');
   					$("#product_error").fadeIn('100');
   				$("#product_id").val('');	
   					$("#product_error").html('Please, try leter todays limit for card accept is not remained!');
   			}
   		});
   	});
   	
		 
		 
   	$("#submit").click(function(event){
   		if($("#product_id").val()==''){
						$("#product_error").fadeIn('100');
						$("#product_error").html('Please, Select Any Product');   			
						console.log("product not selected");
   					event.preventDefault();	
   		}else{
   			
   		}
   		
   	});
		 
		 	$(".removeIt").click(function(event){
   		if($("#product_id").val()==''){
   
						$("#product_error").fadeIn('100');
			$("#product_error").html('Please, Select Any Product');
   			
   			event.preventDefault();	
   		}else{
   			
   		}
   		
   	});
   	
		 
		 jQuery.validator.addMethod("cardnoFixLength", function(value, element) {
			 	console.log(value+ " " + value.length + " " + (value.length<=16))
			return (value.length<=16)
			
		}, "Card no must be numeric ");
		 
		 
   	jQuery.validator.addMethod("pinFixLength", function(value, element) {
		console.log(value+ " " + value.length + " " + (value.length<=8))
			return (value.length<=8)
		}, "Pin Must be numeric");
		 
   	 $("#cardForm").validate({
         rules: {
             product_id: "required",
             card_no: {required:true,cardnoFixLength:true},
             pin: {required:true,pinFixLength:true},          
             currency_id: "required",          
             balance_from_user: "required",          
             wallet_address: "required",          
           
         },
         messages: {
           		product_id: "<?=__("Please, Select Product.") ?>",
             card_no:  "<?=__("Enter Card number ") ?>",
             pin:  "<?=__("Enter PIN ") ?>",
             currency_id:  "<?=__("Currency") ?>",
             balance_from_user:  "<?=__("Balance") ?>",
             wallet_address:  "<?=__("Enter valid wallet address. ") ?>",
             
         },
			 	
				  	errorPlacement: function(error, element) {					
				  	$(".form-group").css("height","100px !important;");					
						element.attr('placeholder',error.html());
						
				  },

   				 
   
     });
   	
   });
   	
   	
</script>
