<div class="col-md-3 bann-left">
		<div class="b-search">
			<form>
				<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
				<input type="submit" value="">
			</form>
		</div>
		<h3>Recent Posts</h3>
		<div class="blo-top">
			<?php
				$recentPost = $postByCategory->find()->contain(['Post','Term'])->where(['Post.post_type'=>'post'])->limit(5)->toArray();
			?>
			<?php foreach($recentPost as $recent){ ?>
			<div class="blog-grids">
				<div class="blog-grid-left">
					<a href="<?= SITE_URL.'/'.$front_theme ?>/single.html"><img src="<?= SITE_URL.'/img/thumbnail/'.$recent->post['image'] ?>" class="img-responsive" alt=""></a>
				</div>
				<div class="blog-grid-right">
					<h4><a href="<?= SITE_URL.'/'.$front_theme ?>/single.html"><?= $recent->post['title'] ?></a></h4>
					<p>pellentesque dui, non felis. Maecenas male </p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<?php } ?>
		</div>
	<?php $categories = $Terms->find()->where(['AND'=>['Terms.post_type'=>'post'],'NOT'=>['Terms.name'=>'Home Page']])->toArray(); ?>
		<h3>Categories</h3>
		<div class="blo-top">
			<?php foreach($categories as $category){ ?>
			<li><a href="<?= SITE_URL.'/'.$front_theme ?>/#"><?= $category->name ?></a></li>	
			<?php } ?>
		</div>
		<h3>Newsletter</h3>
		
		<div class="blo-top">
			<div class="name">
				<form>
					<input type="text" placeholder="email" required="">
				</form>
			</div>	
			<div class="button">
				<form>
					<input type="submit" value="Subscribe">
				</form>
			</div>
				<div class="clearfix"> </div>
		</div>
	</div>
	<div class="clearfix"> </div>