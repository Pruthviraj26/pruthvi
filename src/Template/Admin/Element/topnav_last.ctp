<div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
               <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php if(strpos($authUser['image'],'http')!==false) { ?>
												<img src="<?= $authUser['image'] ?>" alt="">
										<?php }else{ ?>
												<img src="<?= SITE_URL.'/img/icon/'.$authUser['image'] ?>" alt="">
										<?php
															 } ?>	
										
										
										<?= $authUser['first_name'].' '.$authUser['last_name'] ?>
                    <i class="fa fa-chevron-down"></i>
                  </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
    
                    <li><a href="<?= ADMIN_URL ?>/users/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
								
									<li role="presentation" class="dropdown">
								
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-check-square-o"></i>
                    <span class="badge bg-green"><?= count($acceptedCards) ?></span>
                  </a>

									
									<?php if(count($acceptedCards)>0){ ?>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
										<?php foreach($acceptedCards as $card) {  ?>
                    <li>
                      <a>
                        <span class="image">	<?php if(strpos($card->user->image,'http')!==false){ ?>
									<img src="<?= $card->user->image ?>" alt="<?= $card->user->username ?>" >
								<?php }else{  ?>
                	<img src="<?= SITE_URL.'/img/icon/'.$card->user->image ?>" alt="<?= $card->user->username ?>" >
								<?php } ?></span>
                        <span>
                          <span><?= $card->user->first_name.' '.$card->user->last_name ?></span>
                          <span class="time"><?= $card->user->created ?></span>
                        </span>
                        <span class="message">
													Product : <?= $card->product->title ?>
                        </span>
                      </a>
                    </li>
                  <?php } ?>
                    <li>
                      <div class="text-center">
                        <a href="<?= ADMIN_URL.'/cards/status/accepted' ?>">
                          <strong>See All Accepted Cards</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
									<?php } ?>
                </li>
								
								
								<li role="presentation" class="dropdown">
								
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-money"></i>
                    <span class="badge bg-green"><?= count($approvedCards) ?></span>
                  </a>

									
									<?php if(count($approvedCards)>0){ ?>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
										<?php foreach($approvedCards as $card) {  ?>
                    <li>
                      <a>
                        <span class="image">	<?php if(strpos($card->user->image,'http')!==false){ ?>
									<img src="<?= $card->user->image ?>" alt="<?= $card->user->username ?>" >
								<?php }else{  ?>
                	<img src="<?= SITE_URL.'/img/icon/'.$card->user->image ?>" alt="<?= $card->user->username ?>" >
								<?php } ?></span>
                        <span>
                          <span><?= $card->user->first_name.' '.$card->user->last_name ?></span>
                          <span class="time"><?= $card->user->created ?></span>
                        </span>
                        <span class="message">
													Product : <?= $card->product->title ?>
                        </span>
                      </a>
                    </li>
                  <?php } ?>
                    <li>
                      <div class="text-center">
                        <a href="<?= ADMIN_URL.'/cards/status/approved' ?>">
                          <strong>See All Approved Cards</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
									<?php } ?>
                </li>
								
                <li role="presentation" class="dropdown">
								
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-credit-card"></i>
                    <?php if(count($pendingCards)) { ?><span class="badge bg-green"><?= count($pendingCards) ?></span> <?php } ?>
                  </a>

									
									<?php if(count($pendingCards)>0){ ?>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
										<?php foreach($pendingCards as $card) {  ?>
                    <li>
                      <a>
                        <span class="image">	<?php if(strpos($card->user->image,'http')!==false){ ?>
									<img src="<?= $card->user->image ?>" alt="<?= $card->user->username ?>" >
								<?php }else{  ?>
                	<img src="<?= SITE_URL.'/img/icon/'.$card->user->image ?>" alt="<?= $card->user->username ?>" >
								<?php } ?></span>
                        <span>
                          <span><?= $card->user->first_name.' '.$card->user->last_name ?></span>
                          <span class="time"><?= $card->user->created ?></span>
                        </span>
                        <span class="message">
													Product : <?= $card->product->title ?>
                        </span>
                      </a>
                    </li>
                  <?php } ?>
                    <li>
                      <div class="text-center">
                        <a href="<?= ADMIN_URL.'/cards/status/pending' ?>">
                          <strong>See All Pending Cards</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
									<?php } ?>
                </li>			
								
								
								 <li role="presentation" class="dropdown">
								
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user-plus"></i>
                    <?php if(count($newUsers)){ ?><span class="badge bg-green"><?= count($newUsers) ?></span> <?php } ?>
                  </a>

									
									<?php if(count($newUsers)>0){ ?>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
										<?php foreach($newUsers as $user) {  ?>
                    <li>
                      <a>
                        <span class="image"><?php $url = strpos($user->image,'http')!==false?$user->image:SITE_URL."/img/medium/".$user->image;  ?>	
                						<img src="<?= $url ?>" alt="<?= $user->username ?>" >
												</span>
                        <span>
                          <span><?= $user->first_name.' '.$user->last_name ?></span>
                          <span class="time"><?= $user->created ?></span>
                        </span>
                       
                      </a>
                    </li>
                  <?php } ?>
                    <li>
                      <div class="text-center">
                        <a href="<?= ADMIN_URL.'/users/type/user' ?>">
                          <strong>See All Pending Cards</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
									<?php } ?>
                </li>			
								
								
							
								
								
								
								
								
								
								 
              </ul>
            </nav>
          </div>
        </div>