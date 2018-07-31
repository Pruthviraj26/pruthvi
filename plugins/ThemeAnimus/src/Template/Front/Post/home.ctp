<?php


$slidersTop = $postByCategory->find()->contain(['Post','Term'=>['Parent']])->where(['Post.post_type'=>'sliders','Term.name'=>'Top','Parent.name'=>'Home Page']);

$slidersBottom = $postByCategory->find()->contain(['Post','Term'=>['Parent']])->where(['Post.post_type'=>'sliders','Term.name'=>'Bottom','Parent.name'=>'Home Page']);



$homepagePost = $postByCategory->find()->contain(['Post'=>['seo'],'Term'])->where(['Post.post_type'=>'post','Term.name'=>'Home Page'])->toArray();


?>

<div class="container">
	 <div class="load_more">	
			     <ul id="myList">
			        <!-- These are our grid blocks -->
			       
			        <!----//--->
					
			        <!----//--->
			     	 	<?php $rows = array_chunk($homepagePost,4); ?>
						 	<?php foreach($rows as $homepagePost){ ?>	
					 <li>
					
						<div class="l_g">
							
								 	<?php 
							$class=array("integ","praesent"	);

							foreach($homepagePost as $homepage){  
							$key=array_rand($class,1);
						
							?>
							<div class="col-md-3 <?= $class[$key] ?>">
					
								<div class="l_g_r">
									<div class="dapibus">
										<h2><?= $homepage->post['title']; ?></h2>
										<p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
										
										<a href="details.html"><img src="<?= SITE_URL.'/img/uploads/'.$homepage->post['image'] ?>" class="img-responsive" alt=""></a>
										<p><?= $homepage->post['excerpt'] ?></p>
										<a href="<?= SITE_URL.'/'.$homepage->post['seo']->url ?>" class="link">Read More</a>
										
									</div>
								</div>
							</div>
						<?php } ?>	
							<div class="clearfix"></div>
						</div>
						 		
					</li>
						 <div class="clearfix"></div>
						 	<?php } ?>	
						 
					
					 <!----//--->
			      </ul>
				  <div id="loadMore">Load more</div>
	<div id="showLess">Show less</div>

			    </div>
	</div>


