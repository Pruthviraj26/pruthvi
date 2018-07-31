<?php
	$footerMenuPost = $Post->find()->where(['Post.post_type'=>'menu','Post.title'=>'Footer'])->first();
			$footerMenu = json_decode($footerMenuPost->content);

	?>
<div class="head-nav">
					<span class="menu"> </span>
						<ul class="cl-effect-1">
							
							
										<div class="clearfix"></div>
						</ul>
				</div>


<div class="footer">

				<?php foreach($footerMenu as $main){  ?>
			<div class="col-md-3 foot-1">
				<h4><?= $main->text ?></h4>
				<ul>	
					<?php foreach($main->children as $menu){ ?>
							<li class="active"><a href="<?= $menu->href ?>" title="<?= $menu->title ?>" target="<?= isset($menu->target)?$menu->target:$menu->text ?>"><?= $menu->text ?></a></li>
					<?php } ?>
					
				</ul>
			</div>
	<?php } ?>
			
			<div class="clearfix"> </div>
			<div class="copyright">
				<p>Copyrights © 2015 Voguish All rights reserved | Template by <a href="<?= SITE_URL.'/'.$front_theme ?>/http://w3layouts.com/">W3layouts</a></p>
			</div>
		</div>	