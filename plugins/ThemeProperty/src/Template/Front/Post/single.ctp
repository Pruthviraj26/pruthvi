<div class="container">
<div class="content-top">
	<?php //pr($seoPost) ?>
			<div class="single">
				<div class="single-top">
					<img src="<?= SITE_URL.'/img/uploads/'.$seoPost->post['image'] ?>" class="img-responsive" alt="">
					
					<p class="sin"><?= $seoPost->post['content'] ?></p>
					
						<div class="artical-links">
		  						 	<ul>
		  						 		<li><small> </small><span><?= $seoPost->post['created'] ?></span></li>
		  						 		<li><a href="#"><small class="admin"> </small><span>admin</span></a></li>
		  						 		<li><a href="#"><small class="no"> </small><span>No comments</span></a></li>
		  						 		<li><a href="#"><small class="posts"> </small><span>View posts</span></a></li>
		  						 		<li><a href="#"><small class="link"> </small><span>permalink</span></a></li>
		  						 	</ul>
		  						 </div>
						<div class="respon">
							<h2>Responses so far</h2>
							<div class="strator">
								<h5>ADMINISTRATOR</h5>
								<p>feb 20th, 2015 at 9:41 pm</p>
									<div class="strator-left">
										<img src="<?= SITE_URL.'/'.$front_theme ?>/images/co.png" class="img-responsive" alt="">
									</div>
									<div class="strator-right">
										<p class="sin">Sed posuere consectetur est at lobortis. Nulla vitae elit libero, a pharetra aug  
											metus auctor fringilla. Donec id elit non mi porta  da at eget me  us, tellus ac   
											ortor mauris ntum nibh, ut fermentum massa risus. Sed posuere consectetur 
											Nulla vitae elit liber. Sed posuere consectetur est at lobortis.</p>
									</div>
								<div class="clearfix"></div>
								<div class="rep">
									<a href="#" class="reply">REPLY</a>
								</div>
							</div>
							<div class="strator1">
								<h5>JANE DOE</h5>
								<p>feb 20th, 2015 at 9:41 pm</p>
									<div class="strator-left">
										<img src="<?= SITE_URL.'/'.$front_theme ?>/images/co.png" class="img-responsive" alt="">
									</div>
									<div class="strator-right">
										<p class="sin">Sed posuere consectetur est at lobortis. Nulla vitae elit libero, a pti
											metus auctor fringilla. Donec id elit non mi porta  da at eget me  us,
											ortor mauris ntum nibh, ut fermentum massa risus. Sed posuere 
											Nulla vitae elit liber. Sed posuere consectetur.</p>
									</div>
								<div class="clearfix"></div>
								<div class="rep">
									<a href="#" class="reply">REPLY</a>
								</div>
							</div>
							<div class="comment">
								<h2>Leave a comment</h2>
								<form method="post" action="">
								 <input type="text" class="textbox" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
								 <input type="text" class="textbox" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
								  <input type="text" class="textbox" value="Website" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Website';}">
								 <textarea value="Message:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
								 <div class="smt1">
									<input type="submit" value="add a comment">
								 </div>
							   </form>
							</div>
						</div>
				</div>
				<div class="blog-content-right">
						<div class="b-search">
							<form>
								<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
								<input type="submit" value="">
							</form>
						</div>
						<!--start-twitter-weight-->
						<div class="twitter-weights">
							<h3>Tweet Widget</h3>
							<div class="twitter-weight-grid">
								<h4><span> </span>John Doe</h4>
								<p>Lorem ipsum dolor sit amet, consectetur elit,labore et dolore magna aliqua. <a href="#">http://t.co/h12k</a></p>
								<i><a href="#">2 days ago</a></i>
							</div>
							<div class="twitter-weight-grid">
								<h4><span> </span>John Doe</h4>
								<p>Lorem ipsum dolor sit amet, consectetur elit,labore et dolore magna aliqua. <a href="#">http://t.co/h12k</a></p>
								<i><a href="#">2 days ago</a></i>
							</div>
							<a class="twittbtn" href="#">See all Tweets</a>
						</div>
						<!--//End-twitter-weight-->
						<!-- start-tag-weight-->
						<div class="b-tag-weight">
							<h3>Tags Weight</h3>
							<ul>
								<li><a href="#">Lorem</a></li>
								<li><a href="#">consectetur</a></li>
								<li><a href="#">dolore</a></li>
								<li><a href="#">aliqua</a></li>
								<li><a href="#">sit amet</a></li>
								<li><a href="#">ipsum</a></li>
								<li><a href="#">Lorem</a></li>
								<li><a href="#">consectetur</a></li>
								<li><a href="#">dolore</a></li>
								<li><a href="#">aliqua</a></li>
								<li><a href="#">sit amet</a></li>
								<li><a href="#">ipsum</a></li>
							</ul>
						</div>
						<!---- //End-tag-weight---->
					</div>
					<div class="clearfix"> </div>
			</div>
</div>