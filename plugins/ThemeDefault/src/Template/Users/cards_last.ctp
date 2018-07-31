	
    
    <!----------------------------------------------------------------------------------------------------------->
    
    <section class="faq">
        <div class="container">
        	<h1 class="heading">CARDS AND BALANCE</h1>
            <div class="row">
							<?php foreach($cards as $card){ ?>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <div class="fcards">
              <div class="fcaption">
                <div class='col-lg-12 well-add-card  fcard-details'>
                    <h4><?= $card->product->title; ?>
                    </h4>
									<p>Balance  : <?= $this->Number->currency($card->balance) ?> | 
									Balance Used : <?= $this->Number->currency($card->balance_used) ?> |
									Bitcoin Offered  : <?= $this->Number->currency($card->offer_bitcoin) ?></p>
                </div>
								
								
                <div class="col-lg-12">
                    <h6 class="atmdet"><?php
															$text = $card->card_no;
															$textLength = strlen($text);
															$maxChars = 16;	
															$result = substr_replace($text, 'XXXXX', $maxChars/2, $textLength-$maxChars);	 
															echo $result; ?></h6>
                    <h6 class"text-muted">Created on <?= date_format($card->created, 'd/m/Y H:i:s'); ?></h6>
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

