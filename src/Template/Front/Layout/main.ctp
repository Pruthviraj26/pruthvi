<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>card4crypto</title>


    <link href="<?= FRONT_URL ?>/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?= FRONT_URL ?>/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="<?= FRONT_URL ?>/css/animations.css" rel="stylesheet" type="text/css">
    <link href="<?= FRONT_URL ?>/css/style.css" rel="stylesheet" type="text/css">

    <link href="<?= FRONT_URL ?>/css/responsive.css" rel="stylesheet" type="text/css">
		
		<script src="<?= FRONT_URL ?>/js/jquery-3.1.0.min.js"></script>   
    <script src="<?= FRONT_URL ?>/js/animations.js"></script>
    <script src="<?= FRONT_URL ?>/js/bootstrap.min.js"></script>
    <script src="<?= FRONT_URL ?>/js/jquery.easing.min.js"></script>
    <script src="<?= FRONT_URL ?>/js/scrolling-nav.js"></script>
    <script src="<?= FRONT_URL ?>/js/main.js"></script>
		<script src="<?= FRONT_URL ?>/jquery-validation/dist/jquery.validate.min.js" ></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="<?= FRONT_URL ?>/https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="<?= FRONT_URL ?>/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
    
    
  </head>
  <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
  	<header class="navbar-fixed-top">
    <div class="container">
    	<div class="row">
         <?php if(isset($authUser)){ ?>
              <div class="col-md-4 col-sm-4 col-xs-12">
								<?php }else{ ?>
									 <div class="col-md-5 col-sm-4 col-xs-12">
								<?php } ?> 
                <div class="logo"> 
                    <a href="<?= SITE_URL ?>"><img src="<?= SITE_URL.'/img/medium/'.$siteconfig->header_logo_image ?>" class="img-responsive"  alt="Logo"></a> 
                </div>
                <div class="navbar-header">
                          <button type="button" class="navbar-toggle collapsed resp-btn" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                        </div>
              </div>
			  
               <?php if(isset($authUser)){ ?>
			   
              <div class="col-md-8 col-sm-8 col-xs-12">
									<?php }else{ ?>
								 <div class="col-md-7 col-sm-8 col-xs-12">
									<?php } ?> 
									
                  <nav class="navbar navbar-default">
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						 <?php $requestUrl = explode('/',$_SERVER['REQUEST_URI']);
							   $requestPage = end($requestUrl);
							?>
                        <ul class="nav navbar-nav">                    
                             <li class="<?= $requestPage=='#about'?'active':'' ?>" id="aboutMenu"><a href="<?=SITE_URL ?>/#about" class="page-scroll" >About Us</a></li>
                             <li class="<?= $requestPage=='#howitwork'?'active':'' ?>" id="howitworkMenu"><a href="<?=SITE_URL ?>/#howitwork" class="page-scroll" >How it works</a></li>
                             <li class="<?= $requestPage=='#feature'?'active':'' ?>" id="featureMenu"><a href="<?=SITE_URL ?>/#feature" class="page-scroll">feature</a></li>
                             <li class="<?= $requestPage=='faq'?'active':'' ?>" id="faqMenu"><a href="<?= SITE_URL ?>/faq">faq</a></li>
														<?php if(isset($authUser)){ ?>
                             
														<?php } ?>
														
														
                          </ul>
                          <ul class="menulinks">
                          	
                            	<?php if(!isset($authUser)){ ?>
                            <li class="dropdown">
														
                              <a href="#" class="dropdown-toggle logina" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login <span class="caret"></span></a>
															
                              <ul class="dropdown-menu checksocial">
                                    	<li><?php echo $this->Facebook->loginLink($options = ['label'=>'<i class="fa fa-facebook-f"></i>Facebook</a>','class'=>"fb"]); ?></li>
													
                                <li><a href="<?=SITE_URL ?>/users/googlelogin"  class="gl"><i class="fa fa-google-plus"></i>Google+</a></li>
																
                                    <?php if($twitterLoginUrl){ ?>
                         <li><a href="<?= $twitterLoginUrl ?>"  class="tw"><i class="fa fa-twitter"></i>Twitter</a></li>
							<?php } ?>
                              </ul>
														
                            </li>
                            	<?php }else{ ?>
					
														 <li class="dropdown">
														
                              <a href="#" class="dropdown-toggle logina" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $authUser['first_name'] ?><span class="caret"></span></a>
															
                              <ul class="dropdown-menu checksocial">
																		<li> <a href="<?= SITE_URL ?>/users/profile" class="fb">Profile</a></li>													
																		<li><a href="<?= SITE_URL ?>/users/cards" class="tw">My Cards</a></li>
																		<li><a href="<?= SITE_URL ?>/users/logout" class="gl">Logout</a></li>
                              </ul>
														
                            </li>
                            	<?php } ?>
											
                          </ul>
                      </div><!-- /.container-fluid -->
                  </nav>
                </div>
              
              
            
      	</div>
    	

      <!-- Main component for a primary marketing message or call to action -->
      

    </div> <!-- /container -->

    </header>
    
    <!----------------------------------------------------------------------------------------------------------->
    
    <?= $this->Flash->render('positive') ?>
		<div id="flash-negagive" class="alert alert-danger" style="display:none;">The Cards has been saved</div>
<div id="flash-info" class="alert alert-info" style="display:none;">The Cards has been saved</div>
		
			
		
	
			
		<?= $this->fetch('content') ?>
    
    <!----------------------------------------------------------------------------------------------------------->
    
    <footer>
    	<div class="container">
        	<img src="<?= SITE_URL.'/img/medium/'.$siteconfig->footer_logo_image ?>" class="img-responsive"  alt="Logo">
           <?= $this->element('newsletter_subscription_form') ?>
            <ul class="list-unstyled social-links">
            		<?php if($siteconfig->facebook) { ?><li><a href="<?= $siteconfig->facebook ?>" target="_blank"><img src="<?= FRONT_URL ?>/images/social_03.png" alt=""></a></li> <?php } ?>
								<?php if($siteconfig->twitter) { ?><li><a href="<?= $siteconfig->twitter ?>" target="_blank"><img src="<?= FRONT_URL ?>/images/social_07.png" alt=""></a></li> <?php } ?>
							<?php if($siteconfig->instagram) { ?><li><a href="<?= $siteconfig->instagram ?>" target="_blank"><img src="<?= FRONT_URL ?>/images/social_09.png" alt=""></a></li> <?php } ?>
							<?php if($siteconfig->google_plus) { ?><li><a href="<?= $siteconfig->google_plus ?>" target="_blank"><img src="<?= FRONT_URL ?>/images/social_05.png" alt=""></a></li> <?php } ?>
							<?php if($siteconfig->pinterest) { ?><li><a href="<?= $siteconfig->pinterest ?>" target="_blank"><img src="<?= FRONT_URL ?>/images/social_11.png" alt=""></a></li> <?php } ?>
								
              
            </ul>
				
				
				
				  <ul class="list-unstyled footer-links">
            <li><a href="<?= SITE_URL ?>/terms">Terms & Conditions</a></li> 
            <li><a  style="color: #fff;" >|</a></li> 
            <li><a href="mailto:support@card4crypto.com">Support</a></li> 
            </ul>
				
				
        </div>
    </footer>
    
    <!----------------------------------------------------------------------------------------------------------->
    
    <div class="copyright">
    	<span><?= $siteconfig->copyright ?></span>
			 <span></span>
    </div>
    
    <!----------------------------------------------------------------------------------------------------------->

    
	<?= $this->fetch('script') ?>
	<script> $(".nav.navbar-nav li a").click(function(){ $(".navbar-collapse").removeClass("in"); }); </script>
    
    
	
  </body>
</html>