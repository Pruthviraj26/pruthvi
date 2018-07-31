<style>
	.well-add-card{
		    margin: 0px;
    padding: 3px;
	}
</style>

<div class="row">
                <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= 'CARD OF '.strtoupper($user->first_name.' '.$user->last_name) ?><small></small></h2>
										
                  <!--  <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>-->
										
                    <div class="clearfix"></div>
										
                  </div>
								
                  <div class="x_content">
											<?php foreach($cards as $card){ ?>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <div class="thumbnail">
              <div class="caption">
                <div class='col-lg-12'>
                    <span class="glyphicon glyphicon-credit-card"></span>
                    <span><?= $card->status ?></span>
                </div>
                <div class='col-lg-12 well well-add-card'>
                    <h4><?= $card->product->title; ?>
                    </h4>
									<p>Balance  : <?= $this->Number->currency($card->balance) ?> | 
									Balance Used : <?= $this->Number->currency($card->balance_used) ?> |
									Bitcoin Offered  : <?= $this->Number->currency($card->offer_bitcoin) ?></p>
                </div>
								
								
                <div class='col-lg-12'>
                    <h6><?php
															$text = $card->card_no;
															$textLength = strlen($text);
															$maxChars = 16;	
															$result = substr_replace($text, 'XXXXX', $maxChars/2, $textLength-$maxChars);	 
															echo $result; ?></h6>
                    <h6 class="text-muted">Created on <?= date_format($card->created, 'd/m/Y H:i:s'); ?></h6>
									<?php if($card->status=='PENDING') { ?>
										<h6 style="color:green">Your card is send for Admin Approval !</h6>
									<?php }else{ ?>
									
																<h6><?= ucfirst(strtolower($card->status)) ?> on <?= date_format($card->modified, 'd/m/Y H:i:s'); ?></h6>
								
															<?php } ?>
									
									
                </div>
								<?php if($card->status=='APPROVED'){ ?>
                <a href="<?= SITE_URL.'/cards/accepted/'.$card->id; ?>" type="button" class="btn btn-success btn-xs btn-update btn-add-card">Accept</a>
							
							
                <a href="<?= SITE_URL.'/cards/rejected/'.$card->id; ?>" type="button" class="btn btn-danger btn-xs btn-update btn-add-card">Reject</a>
									<?php }
																			 
 							if($card->status=='ACCEPTED'){ ?>
										<span class='glyphicon glyphicon-exclamation-sign text-success pull-right icon-style'></span>
									<?php } 
								
								if($card->status=='REJECTED'){ ?>
										<span class='glyphicon glyphicon-exclamation-sign text-danger pull-right icon-style'></span>
									<?php } ?>
								&nbsp;
                
            </div>
          </div>
        </div>
     <?php } ?>
									</div>
									</div>
	</div>
</div>


