<?php $this->Form->templates($form_templates['adminForm']); ?>	
<div  class="card" >
<div class="card-header"><strong><?= $formTitle ?></strong><small><?= isset($tagline)?$tagline:'' ?></small>

	<div class="pull-right">
                      <?php if(isset($elements)) { ?>
                    
                    
                    <?php foreach($elements as $element){ ?>
                      		<?= $element ?>
                      <?php } ?>
                      </div>
                      <!--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>-->
                     <!-- <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>-->
            
										<?php } ?>
</div>
<div class="card-body">
  		

