<header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item js-item-menu">
                                    <i class="zmdi zmdi-search"></i>
                                    <div class="search-dropdown js-dropdown">
                                        <form method="post">
                                            <input name="searchInput" class="au-input au-input--full au-input--h65" type="text" placeholder="Search for datas &amp; reports..." />
                                            <span class="search-dropdown__icon">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                                <div class="header-button-item has-noti js-item-menu">
                                    <i class="zmdi zmdi-notifications"></i>
                                    <div class="notifi-dropdown js-dropdown">
                                        <div class="notifi__title">
                                            <p>You have 3 Notifications</p>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-email-open"></i>
                                            </div>
                                            <div class="content">
                                                <p>You got a email notification</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c2 img-cir img-40">
                                                <i class="zmdi zmdi-account-box"></i>
                                            </div>
                                            <div class="content">
                                                <p>Your account has been blocked</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c3 img-cir img-40">
                                                <i class="zmdi zmdi-file-text"></i>
                                            </div>
                                            <div class="content">
                                                <p>You got a new file</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__footer">
                                            <a href="#">All notifications</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="<?= ADMIN_URL.'/siteconfigs/edit/'.$siteconfig->id ?>">
                                                <i class="zmdi zmdi-settings"></i>Setting</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-money-box"></i>Billing</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-globe"></i>Language</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-pin"></i>Location</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-email"></i>Email</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-notifications"></i>Notifications</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <?php /*
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
									?>
                </li>			
								
								
							
								
								
								
								
								
								
								 
              </ul>
            </nav>
          </div>
        </div>
        <?php */ ?>