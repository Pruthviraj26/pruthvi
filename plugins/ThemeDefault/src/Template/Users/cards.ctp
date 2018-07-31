	
    
    <!----------------------------------------------------------------------------------------------------------->
   <?= $this->element('page_banner') ?>
    <section class="faq">
        <div class="container">
        	<h1 class="heading">CARDS AND BALANCE</h1>
            <div class="row">
							
							<?php if(count($cards)==0) { ?>
								
					<center><h3>Record Not found</h3>
						<a href="<?=SITE_URL ?>/#about">Click here to Apply</a>
						
					</center>
							<?php }  
						
							?>
						
							<?php foreach($cards as $card){ ?>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <div class="fcards">
              <div class="fcaption">
                <div class='col-lg-12 well-add-card  fcard-details'>
                    <h4><?= $card->product->title; ?>
                    </h4>
								 <div class="row">
											 <div class="col-md-8">Card Balance</div>
											 <div class="col-md-4"><?= $this->Number->currency($card->balance_from_user) ?></div>
										</div>
											 	
											 <div class="row">
												 <div class="col-md-8">Balance From Admin</div>
												 <div class="col-md-4"><?= $this->Number->currency($card->balance_from_admin) ?></div>
											 </div>
											 	
											 <div class="row">
											  		<div class="col-md-8">Balance Used</div>
											 		<div class="col-md-4"><?= $this->Number->currency($card->balance_used) ?></div>
											 </div>
											 
										<div class="row">
											  <div class="col-md-8">Offered</div>
											 <div class="col-md-4"><?= number_format($card->offer_bitcoin,2) ?></div>
										</div>
                </div>
								
								
                <div class="col-lg-12">
                   	
										<h6 class="atmdet"><?php
															$card_no = $card->card_no;
															$textLength = strlen($card_no);
															$maxChars = 7;	
															$card_no = substr_replace($card_no, 'XXXXXXXXX', $maxChars/2, $textLength-$maxChars);	 
															echo $card_no; ?></h6>
                    <h6 class="text-muted">Created on <?= date_format($card->created, 'd/m/Y H:i:s'); ?></h6>
									<?php if($card->status=='PENDING') { ?>
									
												<h6 >Your card is send for Admin Approval !</h6>
									
									<?php }else if($card->status=='ACCEPTED'){ ?>
												<h6 class="caccept"><?= ucfirst(strtolower($card->status)) ?> on <?= date_format($card->modified, 'd/m/Y H:i:s'); ?></h6>								
									<?php }else{ ?>
									
										<h6><?= ucfirst(strtolower($card->status)) ?> on <?= date_format($card->modified, 'd/m/Y H:i:s'); ?></h6>
								
															<?php } ?>
									
									
                    <span class="glyphicon glyphicon-credit-card atmicon"></span>
                </div>
								
								
                    
								
								<div class="col-lg-12">
								<?php if($card->status=='APPROVED'){ ?>
                <a href="<?= SITE_URL.'/cards/accepted/'.$card->id; ?>" type="button" class="btn btn-success btn-xs btn-update btn-add-card">Accept</a>
							
							
                <a href="<?= SITE_URL.'/cards/rejected/'.$card->id; ?>" type="button" class="btn btn-danger btn-xs btn-update btn-add-card">Reject</a>
									<?php }		
																						 
 					
								
								if($card->status=='REJECTED'){ ?>
										<span class='glyphicon glyphicon-exclamation-sign text-danger icon-style'></span>
									<?php } ?>
								
														</div>
								<div class="clearfix"></div>
                
            </div>
						
						<a href="<?= SITE_URL.'/cards/delete/'.$card->id; ?>" class="glyphicon glyphicon-trash carddeleteicon"></a>
						
          </div>
        </div>
							
     <?php } ?>
        
            </div>
        </div>
    </section>

