
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
										
								if($selected=="notChecked" and $product->accept_card_per_day > count($product->cards)){
									$selected = "checked";
									$pid = $product->id;
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
							 <input type="hidden" id="product_id" name="product_id" value="<?= $pid ?>" >
             
                  <div class="row">
                     <div class="col-md-8 col-sm-8">
                     	
											 
                     <input name="card_no" type="number" class="form-control" placeholder="Enter card number" id="card-no" onKeyUp="if(this.value.length==16)pin.focus();"></div>
										
										
									 
										
										
										
										
                     <div class="col-md-4 col-sm-4">
                     
                     <input name="pin" type="number" class="form-control" placeholder="Enter PIN " id="pin" onKeyUp="if(this.value.length==4)currency_id.focus();"></div>
										
									
										
                  </div>
                  <div class="row">
                    	 <div class="col-md-3 col-sm-4">
                        <select name="currency_id" placeholder="Select Currency" id="currency_id" class="form-control" onChange="wallet_address.focus()">
                    
                      			<?php foreach($currencies as $currency){?>
														<option value="<?= $currency->id ?>"><?= $currency->title ?></option>
														<?php } ?>
                        </select>
                     </div>
										
                     <div class="col-md-6 col-sm-4"><input name="wallet_address" type="email" class="form-control" placeholder="Enter wallet address" id="wallet-address"></div>
										 <div class="col-md-3 col-sm-4">
                        <center><button type="submit" id="submit" class="btn btn-success">APPLY</button></center>
                     </div>
                     <div class="col-md-4 col-sm-6"></div>
                  </div>
                
          
							 
            </form>
            <?php }else{ ?>
            <span >Log in with Facebook, Twitter, or Reddit to exchange above cards.</span>
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
			
   	$(".product").click(function(){
		
   			$("#product_error").fadeOut('100');
				$product = $(this);
   		$product_id = $product.val();
			
   	
					$(".productList").attr('checked',false);
					$("#product_"+$product_id).attr('checked','true');
			
   		$.get('<?= SITE_URL.'/products/checklimit/'; ?>'+$product_id,function(response){
   			response = $.parseJSON(response);
   			$remainingCards = response.data;
   			if($remainingCards>0){				
   				$("#product_id").val($product_id);	
   				
   				$("#cardForm").fadeIn('100');
   				$("#card_no").focus();
   				$("#flash-info").hide('100');						
   			
					console.log($("#product_"+$product_id));
					$("#product_id").val($product_id);
					
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
   	
/*   	jQuery.validator.addMethod("max", function(value, element) {
  return this.optional(element) || /^http:\/\/mycorporatedomain.com/.test(value);
}, "Please specify the correct domain for your documents");*/
		 
   	 $("#cardForm").validate({
         rules: {
             product_id: "required",
             card_no: "required",
             pin: "required",          
             currency_id: "required",          
             wallet_address: "required",          
           
         },
         messages: {
           	product_id: "<?=__("Please, Select Product.") ?>",
             card_no:  "<?=__("Card number required") ?>",
             pin:  "<?=__("PIN required") ?>",
             currency_id:  "<?=__("Currency") ?>",
             wallet_address:  "<?=__("Enter valid wallet address. ") ?>",
             
         },
			 	
				  	errorPlacement: function(error, element) {					
				  	$(".form-group").css("height","100px !important;");					
						element.attr('placeholder',error.html());
						
				  },

   				 
   
     });
   	
   });
   	
   	
</script>
