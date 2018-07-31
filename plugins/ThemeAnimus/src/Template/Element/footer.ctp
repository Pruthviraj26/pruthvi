<?php
	$footerMenuPost = $Post->find()->where(['Post.post_type'=>'menu','Post.title'=>'Footer'])->first();
			$footerMenu = json_decode($footerMenuPost->content);

	?>


	<div class="footer">
		<div class="container">
				<?php foreach($footerMenu as $main){  ?>
			<div class="col-md-3 copy">
				
				<div class="top2">
					<h6><?= $main->text ?></h6>
					<?php foreach($main->children as $menu){ ?>
					<p><a href="<?= $menu->href ?>" title="<?= $menu->title ?>" target="<?= isset($menu->target)?$menu->target:$menu->text ?>"><?= $menu->text ?></a></p>
								<?php } ?>
				</div>
				
				<div class="clearfix"> </div>
			</div>
			<?php } ?>
			<div class="clearfix"> </div>
		</div>
	</div>