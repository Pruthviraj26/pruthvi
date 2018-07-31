<?= $this->element("page_banner") ?>
    
<section class="faq">
        <div class="container">
        	<h1 class="heading">FAQ</h1>
            <div class="row">
							<?php foreach($faqs as $faq) { ?>
            	<div class="col-md-4">
                	<div class="faq-card">
                	<span><?= $faq->question ?></span>
                    <p><?= $faq->answer ?></p>
                    </div>
                </div>   
                <?php } ?>
            </div>
        </div>
    </section>