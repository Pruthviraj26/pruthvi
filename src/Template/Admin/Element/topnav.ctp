<div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
							 <ul class="nav navbar-nav pull-left">
								  <li class="">
										<a><b>Last Login :</b> <?= $authUser['login'] ?></a>
								 </li>
								 
								  <li class="">
										<a><b>Last Logout :</b> <?= $authUser['logout'] ?></a>
								 </li>
							
							</ul>
              <ul class="nav navbar-nav navbar-right" style="width:auto;">
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
    
                    <li><a href="<?= ADMIN_URL.'/users/edit/'.$authUser['id'] ?>" title="Manage profile" data-toggle="tooltip"> <i class="fa fa-user pull-right"></i> Profile</a></li>
                    <li><a href="<?= ADMIN_URL ?>/users/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
								
							
								<?php 
									 /*
								 <li role="presentation" class="dropdown">
								
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user-plus"></i>
                    <?php if(count($newUsers)){ ?><span class="badge bg-green"><?= count($newUsers) ?></span> <?php } ?>
                  </a>

									
									
									 //// START NEW USERS NOTIFICATIONS
									 if(count($newUsers)>0){ ?>
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
                          <strong>See All Users</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
									<?php }
										 //// END NEW USERS NOTIFICATIONS
									*/?>
                </li>			
								
								
							
								
								
								
								
								
								
								 
              </ul>
            </nav>
          </div>
        </div>