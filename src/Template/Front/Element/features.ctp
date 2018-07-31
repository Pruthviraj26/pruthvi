 <section class="featuresec">
	    <div id="feature"></div>
    	<div class="container">
        
        	<h4 class="heading">Feature</h4>
        <?php $rows = array_chunk($features,4) ?>
				<?php foreach($rows as $features) { ?>
        	<div class="row">
						<?php foreach($features as $feature) { ?>
            	<div class="col-md-4  col-sm-4">
                	<div class="fcard">
                    	<img alt="" src="<?= SITE_URL.'/img/uploads/'.$feature->image ?>" class="img-responsive" />
                        <div class="fdetail">
                        	<h5><?= $feature->title ?></h5>
                            <p><?= $feature->description ?></p>
                        </div>
                    </div>
                </div>
               <?php  } ?>
            </div>
				<?php } ?>
        </div>
    </section>