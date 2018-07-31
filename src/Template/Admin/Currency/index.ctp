
<?php  $controller = strtolower($this->name); ?>
	
<?= $this->element('table_start',['tableTitle'=>$viewTitle]) ?>

                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="selectAll" name="selectAll" >
                            </th>
                            <th class="column-title">Sr.</th>
                            <th class="column-title">Name</th>
                           <!-- <th class="column-title">Code</th>       -->                                                                      
                            <th class="column-title">Status</th>                                                                                 
                            <th class="column-title no-link last" style="width: 200px;"><span class="fa fa-gear"></span> Action</th>
                            
                          </tr>
                        </thead>

                        <tbody>
													
													<?php foreach($currency as $index=>$row) { ?>
													
                          <tr class="even pointer">
                            <td class="a-center ">
                             		<?php if(count($row->cards)==0){ ?>
                              <input type="checkbox" class="ids" name="ids[<?= $row->id ?>]">
																<?php } ?>
                            </td>
														<th><?= ++$index ?></th>
                            <td><?= $row->title ?></td>
                        <?php /**    <td><?= $row->code ?></td>			*/ ?>																								
														<td><?= $row->status ?></td>
														<td>
															<?= $this->element('table_change_status_toggel',['row'=>$row])?>
															
														<?= $this->element('table_edit_btn',['row'=>$row])?>
															
                            			<?php if(count($row->cards)==0){ ?>
                            		<?= $this->element('table_delete_btn',['row'=>$row])?>
																<?php }else{ ?><a href="<?= ADMIN_URL.'/cards/search/'.strtolower($row->title) ?>" title="View Cards <?= 'of '.ucwords($row->title) ?>" data-toggle="tooltip" class="btn btn-primary"><i class="fa fa-credit-card"></i></a><?php } ?>
                            </td>
                            	

                          </tr>
													
                       <?php } ?>
													
                        </tbody>
	

<?= $this->element('table_end') ?>






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
				offer_bitcoin  = $("#offer_bitcoin_"+$id).html();
				$("#balance").val(balance);
				$("#balance_used").val(balance_used);
				$("#offer_bitcoin").val(offer_bitcoin);
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
          offer_bitcoin: "required",          
        
      },
      messages: {
        balance: "Please, Enter Balance.",
        balance_used:  "Please, Enter Card Number.",
        offer_bitcoin:  "Please, Enter Pin Number."
          
      },
				  errorPlacement: function(error, element) {
				  	$(".form-group").css("height","100px !important;");
				  	
				  },

  });
	});
		 
		
		
});
<?= $this->end('script') ?>
	</script>