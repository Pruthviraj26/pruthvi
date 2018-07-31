

<?= $this->element('table_start',['tableTitle'=>$viewTitle]) ?>

                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="selectAll" name="selectAll" >
                            </th>
                            <th class="column-title">Sr.</th>
                            <th class="column-title">User Name</th>
                            <th class="column-title">Product Name</th>                 
                            <th class="column-title">Balance</th>                 
                            <th class="column-title">Used Balance</th>                 
                            <th class="column-title">Offer Bitcoin</th>                 
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
                              <input type="checkbox" class="ids" name="ids[<?= $card->id ?>]">
                            </td>
														<th><?= ++$index ?></th>
                            <td id="username_<?= $card->id ?>"><?= $card->user->username ?></td>
                            <td id="product_<?= $card->id ?>"><?= $card->product->title ?></td>
														<td id="balance_<?= $card->id ?>"><?= $this->Number->currency($card->balance) ?></td>
														<td id="balance_used_<?= $card->id ?>"><?= $this->Number->currency($card->balance_used) ?></td>
														<td id="offer_<?= $card->id ?>"><?= $this->Number->currency($card->offer) ?></td>
														<td ><?= $card->status ?></td>
											
                            
                    
                            <td class="last">
															 <?php $statusTochange = $card->status=="PENDING"?'APPROVED':'' ?>                           
                            <?php $statusTochange = $card->status=="ACCEPTED"?'COMPLETED':$statusTochange ?>
															<?php if($statusTochange) { ?>
                            	<button id="<?= $card->id ?>" value="<?= $statusTochange ?>" class="card_status btn btn-success"><?= 'CHANGE TO '.$statusTochange ?></button>
                            		<?php } ?>
                            	
												
                          
                            </td>
                          </tr>
													
                       <?php } ?>
													
                        </tbody>

 
<table>

	<?php echo  $this->element('pagination') ?>
 
      
</table>
<?= $this->element('table_end') ?>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel"><?= __('Add Balance') ?></h4>
      </div>
				<form class="form-horizontal" method="post" accept-charset="utf-8" name="addBalanceForm" id="addBalanceForm" action="http://localhost/projects/cardtocash/admin/cards/addBlance">
      <div class="modal-body">
        			
				
<?php 
	
echo $this->element('form_start',['formTitle'=>$viewTitle]); ?>
		
			 <div style="display:none;"><input name="_method" type="hidden" class="form-control" value="POST"></div>
				
			 <input name="id" type="hidden" class="form-control" id="cardToAddBalane" >
				
			 <div class="form-group  required" form-type="text">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="balance">Balance</label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						
					<input name="balance" type="text" class="form-control" id="balance" required> </div>
			 </div>
				
			 <div class="form-group  required" form-type="text">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="balance-used">Balance Used</label>
					<div class="col-md-9 col-sm-9 col-xs-12"><input name="balance_used" type="text" class="form-control" required="required" id="balance_used" value=""> </div>
			 </div>
				
			 <div class="form-group  required" form-type="text">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="offer-bitcoin">Offer Bitcoin</label>
					<div class="col-md-9 col-sm-9 col-xs-12"><input name="offer" type="text" class="form-control" required="required" id="offer-bitcoin" value=""> </div>
			 </div>
				
			 <div class="form-group  required" form-type="text">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status</label>
					<div class="col-md-9 col-sm-9 col-xs-12"><input name="status" type="text" class="form-control" required="required" id="status" > </div>
			 </div>
		
	
	
<?php echo $this->element('form_end');
?>
				<div class="alert alert-info" style="display:none">Can not use more than balance !</div>
		
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
		
		$(".card_status").click(function(){
			$value = $(this).val();			
			if($value=='APPROVED'){
				$("#myModal").modal();
				$id = $(this).attr('id');
				$title = 'Request for '+$("#product_"+$id).html() + ' Card By ' + $("#username_"+$id).html();
				$("#myModalLabel").html($title);
				$(".x_title h2").html('Add Balance');		
				$("#cardToAddBalane").val($id);
				balance  = $("#balance_"+$id).html();
				balance_used  = $("#balance_used_"+$id).html();
				offer  = $("#offer_"+$id).html();
				$("#balance").val(balance);
				$("#balance_used").val(balance_used);
				$("#offer").val(offer);
				$("#status").val($value);
			}
			
			function validateAmount(){
				
			}
				$("#balance").keyup(function(){
						
						$balace_used = $("#balance_used").val();
						$balance = $("#balance").val();
						if( parseInt($balace_used) > parseInt($balance)){
							$("#balance_used").val('');
							$("#balance").val('');							
							$("#balance").focus();
							$(".alert-info").show("100");
							
						}else{
								$(".alert-info").hide("100");
						}	
				});
				$("#balance_used").keyup(function(){
						$balace_used = $("#balance_used").val();
						$balance = $("#balance").val();
						if( parseInt($balace_used) > parseInt($balance)){
							$("#balance_used").val('');
							$("#balance_used").focus();
								$(".alert-info").show("100");
						}else{
							$(".alert-info").hide("100");
						}
				});
			
			
			
		
		
			
		});
		
		
		
		$(document).ready(function(){
		$("#addBalanceForm").validate({
      rules: {
          balance: "required",
          balance_used: "required",
          offer: "required",          
        
      },
      messages: {
        balance: "Please, Enter Balance.",
        balance_used:  "Please, Enter Card Number.",
        offer:  "Please, Enter Pin Number."
          
      },
				  errorPlacement: function(error, element) {
				  	$(".form-group").css("height","100px !important;");
				  	
				  },

  });
	});
		 
		
 
} );
<?= $this->end('script') ?>
	</script>