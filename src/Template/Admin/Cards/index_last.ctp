

<?= $this->element('table_start',['tableTitle'=>$viewTitle]) ?>

                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="selectAll" name="selectAll" >
                            </th>
                            <th class="column-title">Sr.</th>
                            <th class="column-title">User Name</th>
                            <th class="column-title">Product Name</th>                 
                            <th class="column-title">Card Number</th>                 
                            <th class="column-title">PIN</th>                 
                            <th class="column-title">Wallet Address</th>                 
                            <th class="column-title">Available <br> Balance</th>                 
                            <th class="column-title">Admin<br>Balance</th>                 
                            <th class="column-title">Used Balance</th>                 
                            <th class="column-title">Offer</th>                                                              
                            <th class="column-title">Status</th>                                                              
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
													<?php foreach($cards as $index=>$card) { ?>
                          <tr class="even pointer">
														
                             <td class="a-center ">
															 <?php if($card->status=='DISAPPROVED' || $card->status=='REJECTED') { ?>
                              <input type="checkbox" class="ids" name="ids[<?= $card->id ?>]">
															 <?php } ?>
															 
															 
															 <input type="hidden" id="currency_title_<?= $card->id ?>" value="<?= $card->currency->title ?>">
															 <input type="hidden" id="product_offer_pecentage_<?= $card->id ?>" value="<?= $card->product->offer_percentage ?>">
                            </td>
														<th><?= ++$index ?></th>
                            <td id="username_<?= $card->id ?>">
                            	<?php if($card->user){  ?>
                            <a href="<?=ADMIN_URL.'/users/edit/'.$card->user->id ?>"><?= isset($card->user)?$card->user->username:'' ?></a>
                            	<?php } ?>
                            </td>
                            <td id="title_<?= $card->id ?>"><?= $card->product->title ?></td>
                            <td id="card_no_<?= $card->id ?>"><?= $card->card_no ?></td>
                            <td id="pin_<?= $card->id ?>"><?= $card->pin ?></td>
                            <td id="address_<?= $card->id ?>"><?= $card->wallet_address ?></td>
														<td id="balance_from_user_<?= $card->id ?>"><?= $this->Number->currency($card->balance_from_user) ?></td>
														<td id="balance_from_admin_<?= $card->id ?>"><?= $this->Number->currency($card->balance_from_admin) ?></td>
														<td id="balance_used_<?= $card->id ?>"><?= $this->Number->currency($card->balance_used) ?></td>
														<td id="offer_<?= $card->id ?>"><?= $card->offer?$card->offer:0; ?><?= ' '.$card->currency->title ?></td>
														<td id="status_<?= $card->id ?>"><?= $card->status ?></td>
                            <td class="last">
														
															
															<?php if($card->status=='PENDING') { ?>
																<button id="<?= $card->id ?>" value="APPROVED" class="card_status btn btn-success" title="Approve" data-toggle="tooltip"><i class="fa fa-check"></i></button>
																<a href="<?= ADMIN_URL.'/cards/changestatus/disapproved/'.$card->id ?>" class="btn btn-warning" title="Disapprove" data-toggle="tooltip"><i class="fa fa-times"></i>
																	
																</a>
															<?php  } ?>
															
															<?php if($card->status=="ACCEPTED") { ?>
																<a href="<?= ADMIN_URL.'/cards/changestatus/completed/'.$card->id ?>" class="btn btn-success">COMPLETE</a>
															<?php } ?>
															
																<?php if($card->status=='DISAPPROVED' || $card->status=='REJECTED') { ?>
																<?= $this->element('table_delete_btn',['row'=>$card])?>
																<?php } ?>
															
															
														</td>
                          </tr>
													
                       <?php } ?>
													
                        </tbody>

 
<table>

	
 
      
</table>
<?= $this->element('table_end') ?>



	


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel"><?= __('Add Balance') ?></h4>
      </div>
				<form class="form-horizontal" method="post" accept-charset="utf-8" name="addBalanceForm" id="addBalanceForm"
							action="<?= ADMIN_URL ?>/cards/addBlance">
      <div class="modal-body">
        			
				
<?php 
	
echo $this->element('form_start',['formTitle'=>$viewTitle]); ?>
		
			 <div style="display:none;"><input name="_method" type="hidden" class="form-control" value="POST"></div>
				
			 <input name="id" type="hidden" class="form-control" id="cardToAddBalane" >
			 <input  type="hidden" class="form-control" id="product_offer_pecentage" >
				
				 <div class="form-group  required" form-type="text">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="balance_from_user">Balance From User</label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						
					<input name="balance_from_user" id="balance_from_user" type="text" class="form-control" id="balance_from_user" disabled> </div>
			 </div>
				
			 <div class="form-group  required" form-type="text">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="balance_from_admin">Balance From Admin</label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						
					<input name="balance_from_admin"  type="number" class="form-control" id="balance_from_admin" required> </div>
			 </div>
				
			 <div class="form-group  required" form-type="text">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="balance-used">Balance Used</label>
					<div class="col-md-9 col-sm-9 col-xs-12"><input name="balance_used" type="number" class="form-control" required="required" id="balance_used" value=""> </div>
			 </div>
				
			 <div class="form-group  required" form-type="text">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="offer-bitcoin" id="currency_title"></label>
					<div class="col-md-9 col-sm-9 col-xs-12"><input name="offer" type="text" class="form-control" required="required" id="offer" value=""> </div>
			 </div>
				
			 <div class="form-group  required" form-type="text">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status</label>
					<div class="col-md-9 col-sm-9 col-xs-12"><input name="status" type="text" class="form-control" required="required" id="status" > </div>
			 </div>
		
	
	
<?php echo $this->element('form_end');
?>
				<div id="error"></div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"  id="submitBalanceForm">Save changes</button>
      </div>
				</form>
    </div>
  </div>
</div>


<script>
<?= $this->start('script') ?>
	$(document).ready(function() {
			$("#balance_from_admin").keyup(function(){
			$product_offer_pecentage = $("#product_offer_pecentage").val();			
			balance_from_admin = $(this).val();
			console.log($product_offer_pecentage);
			balance_used = (balance_from_admin * $product_offer_pecentage)/100;
			
				$("#balance_used").val(balance_used);
		});
		
		$(".card_status").click(function(){
			event.preventDefault();
			$value = $(this).val();			
			if($value=='APPROVED'){
				$("#myModal").modal();
				$id = $(this).attr('id');
				$title = 'Request for '+$("#title_"+$id).html() + ' By ' + $("#username_"+$id).html();
				$("#myModalLabel").html($title);
				
				$("#cardToAddBalane").val($id);
				balance_from_user  = $("#balance_from_user_"+$id).html();
				currency_title  = $("#currency_title_"+$id).val();
				product_offer_pecentage  = $("#product_offer_pecentage_"+$id).val();
				balance_from_admin  = $("#balance_from_admin"+$id).html();
				card_no  = $("#card_no_"+$id).html();
				balance_used  = $("#balance_used_"+$id).html();
				offer  = $("#offer_"+$id).html();
				
				$(".x_title h2").html('Add balance to card ('+card_no+')');		
				$("#balance_from_user").val(balance_from_user);
				$("#currency_title").html(currency_title+' Offer');				
				$("#product_offer_pecentage").val(product_offer_pecentage);				
				$("#balance_from_admin").val(balance_from_admin);
				$("#balance_used").val(balance_used);
				$("#offer").val(offer);
				$("#status").val($value);
				
				
				
				
				
				
				
					jQuery.validator.addMethod("greterThanEqualBalance",function(value,element,param){
			
				balance_used = parseFloat($("#balance_used").val());
				if(isNaN(balance_used)) return true;
				
				valid = parseFloat(value) >= balance_used;				
				console.log(parseFloat(value)+" greterThanEqualBalance " + parseFloat(balance_used) + " " + valid);
				if(valid){
					return true;
				}else{					
					return false;		
				}
			
			},"Balance must greter than used balance !");
			
				
				
				
				
				
			jQuery.validator.addMethod("lessThanEqualBalance",function(value,element,param){				
				balance = parseFloat($("#balance_from_admin").val());
				if(isNaN(balance)) return true;
				
				valid = parseFloat(value) <= parseFloat(balance);
				console.log(value+" lessThanEqualBalance " + balance + " " + valid);
					if(valid){
					
						return true;
					}else{
						element.value = "";
						return false;		
					}
			},"Balance to use must less than above balance.");

		

			
		$("#addBalanceForm").validate({
      rules: {
          balance_from_admin: { required:true, greterThanEqualBalance:true,min:0 },
				  balance_used:{ required:true, lessThanEqualBalance:true,min:0},
          offer: "required",          
        
      },
      messages: {
       balance_from_admin: "Please, enter balance",
       balance_used: "Please, enter balance for use",
       offer: "Please, enter offer",
      },
				  errorPlacement: function(error, element) {
					
				  	$(".form-group").css("height","100px !important;");
						//$("#error").html(error.html());
						element.attr("placeholder",error.html());
				  	
				  },

  		});
				
			}
		

			
		
			
			
	});
		 
		
 
} );
<?= $this->end('script') ?>
	</script>