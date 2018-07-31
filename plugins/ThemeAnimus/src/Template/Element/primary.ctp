<?php
	$primaryMenuPost = $Post->find()->where(['Post.post_type'=>'menu','Post.title'=>'Primary'])->first();
			$primaryMenu = json_decode($primaryMenuPost->content);
	
	?>



<div class="head-nav">
					<span class="menu"> </span>
						<ul class="cl-effect-15">
						<?php foreach($primaryMenu as $menu){  ?>
							<li class="active"><a href="<?= $menu->href ?>" title="<?= isset($menu->title)?$menu->title:$menu->text; ?>" target="<?= isset($menu->target)?$menu->target:$menu->text ?>"><?= $menu->text ?></a></li>
						<?php } ?>
								<div class="clearfix"> </div>
						</ul>
				</div>