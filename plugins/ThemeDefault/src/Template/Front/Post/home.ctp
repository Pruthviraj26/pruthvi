<?php


$slidersTop = $postByCategory->find()->contain(['Post','Term'=>['Parent']])->where(['Post.post_type'=>'sliders','Term.name'=>'Top','Parent.name'=>'Home Page']);

$slidersBottom = $postByCategory->find()->contain(['Post','Term'=>['Parent']])->where(['Post.post_type'=>'sliders','Term.name'=>'Bottom','Parent.name'=>'Home Page']);



$homepagePost = $postByCategory->find()->contain(['Post'=>['seo'],'Term'])->where(['Post.post_type'=>'post','Term.name'=>'Home Page'])->toArray();


?>
<div class="container">
	<div class="col-md-9 bann-right">
		
		<!-- banner -->
		<div class="banner">		
			<div class="header-slider">
				<div class="slider">
					<div class="callbacks_container">
					  	<ul class="rslides" id="slider">
								<?php foreach($slidersTop as $slide){
								
								
								?>
							<li>
								<img src="<?= SITE_URL.'/img/uploads/'.$slide->post['image']; ?>" class="img-responsive" alt="">
								<div class="caption">
									<h3><?= $slide->post['title']; ?></h3>
									<p><?= $slide->post['excerpt']; ?></p>
								</div>
							</li>
							<?php } ?>
						</ul>
			  		</div>
				 </div>
			</div>
		</div>
		<!-- banner -->	
		 	<?php $rows = array_chunk($homepagePost,2); ?>
		
		<!-- nam-matis -->
		<div class="nam-matis">
				<?php foreach($rows as $homepagePost){ ?>	
			<div class="nam-matis-top">
						<?php foreach($homepagePost as $homepage){  ?>
							<div class="col-md-6 nam-matis-1">
								<a href="<?= SITE_URL.'/'.$homepage->post['seo']->url ?>">
									
								<img src="<?= SITE_URL.'/img/uploads/'.$homepage->post['image'] ?>" class="img-responsive" alt=""></a>
								<h3><a href="<?= SITE_URL.'/'.$homepage->post['seo']->url?>"><?= $homepage->post['title'] ?></a></h3>
								<p><?= $homepage->post['excerpt'] ?></p>
							</div>	
					<?php } ?>
					
							<div class="clearfix"> </div>
				</div>
				<?php } ?>	
				
		</div>
		<!-- nam-matis -->	
	</div>
	<?= $this->element('sidebar') ?>
		<div class="fle-xsel">
			<ul id="flexiselDemo3">
					<?php foreach($slidersBottom as $slide){ ?>
				<li>
					<a href="<?= SITE_URL.'/' ?>/#">
						<div class="banner-1">
							<img src="<?= SITE_URL.'/img/uploads/'.$slide->post['image'] ?>" class="img-responsive" alt="">
						</div>
					</a>
				</li>
					<?php } ?>	
			</ul>
							
							 <script type="text/javascript">
								$(window).load(function() {
									
									$("#flexiselDemo3").flexisel({
										visibleItems: 5,
										animationSpeed: 1000,
										autoPlay: true,
										autoPlaySpeed: 3000,    		
										pauseOnHover: true,
										enableResponsiveBreakpoints: true,
										responsiveBreakpoints: { 
											portrait: { 
												changePoint:480,
												visibleItems: 2
											}, 
											landscape: { 
												changePoint:640,
												visibleItems: 3
											},
											tablet: { 
												changePoint:768,
												visibleItems: 3
											}
										}
									});
									
								});
								</script>
								<script type="text/javascript" src="<?= SITE_URL.'/'.$front_theme ?>/js/jquery.flexisel.js"></script>
					<div class="clearfix"> </div>
		</div>
	
	
	
	
		
	</div>