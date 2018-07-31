
<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= ADMIN_URL.'/' ?>" class="site_title" title="Dashboard" style="background-color: white;
    height: 57px;">
    	
    <span>
    	
								
    <img src="<?= SITE_URL.'/img/medium/'.$siteconfig->footer_logo_image ?>" style="width: 95%;" />
    	
								
    </span>
    	
    </a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
           <a href="<?= ADMIN_URL.'/users/edit/'.$authUser['id'] ?>" title="Manage profile" data-toggle="tooltip"> <div class="profile clearfix">
              <div class="profile_pic">
								
								<?php if(strpos($authUser['image'],'http')!==false){ ?>
									<img src="<?= $authUser['image'] ?>" alt="..." class="img-circle profile_img">
								<?php }else{  ?>
                <img src="<?= SITE_URL.'/img/icon/'.$authUser['image'] ?>" alt="..." class="img-circle profile_img">
								<?php } ?>
              </div>
              <div class="profile_info" >
                <span>Welcome,</span>
                <h2><?= ucwords($authUser['first_name'].' '.$authUser['last_name']) ?></h2>
              </div>
            </div>
						 </a>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
							 
							
              <div class="menu_section">
                <h3>Catalog</h3>
                <ul class="nav side-menu">
									   
									
										<?php foreach($themeConfig['Post'] as $postType=>$postOption){
												
											?>

											<li><a title="Manage users" data-toggle="tooltip"><i class="<?= $postOption['labels']['icon'] ?>"></i> 
												<?= $postOption['labels']['plural_name'] ?>  <span class="fa fa-chevron-down"></span></a>
												<ul class="nav child_menu">
																<?php if($postOption['view_all']){ ?>
													<li><a href="<?= ADMIN_URL.'/posttype/'.$postType ?>">View All <?= ucfirst($postType) ?></a></li>
													<?php } ?>
													<?php if($postOption['add_new_link']){ ?>
													  <li><a href="<?= ADMIN_URL.'/posttype/'.$postType.'/add' ?>">Add New</a></li>
													<?php } ?>
														<?php 
												if(isset($themeConfig['Texonomies']))
												foreach($themeConfig['Texonomies'] as $texonomyType=>$texonomyOption){
														if(in_array($postType,$texonomyOption['type'])){	?>	
													<li>
														<a href="<?= ADMIN_URL.'/posttype/'.$postType.'/texonomy/'.$texonomyType ?>">									
																<?= ucfirst($texonomyOption['option']['labels']['name']) ?>
														</a>														
													</li>
													
												<?php		}
															
													
															
														 } ?>
												</ul>
											</li>
									<?php }?>
									
									
									
									
									
                </ul>
              </div>
							
							
							
							
             

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
						
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" href="<?= ADMIN_URL.'/siteconfigs/edit/'.$siteconfig->id ?>" title="Mangage System Settings" style="width:50%">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
             <!-- <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>-->
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= ADMIN_URL ?>/users/logout" style="width:50%">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>