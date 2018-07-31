	
<?php $this->Form->templates($form_templates['adminForm']); ?>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title" <?= isset($form_id)?"id='$form_id'":'' ?>>
                    <h2> <?= $formTitle ?> <small><?= isset($tagline)?$tagline:'' ?></small></h2>
										<?php if(isset($elements)) { ?>
                    <ul class="nav navbar-right panel_toolbox">
											
											<?php foreach($elements as $element){ ?>
                      		<li><?= $element ?></li>
											<?php } ?>
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
                    </ul>
										<?php } ?>
                    <div class="clearfix"></div>
										
                  </div>
								
                  <div class="x_content">
                    <br />
                
         