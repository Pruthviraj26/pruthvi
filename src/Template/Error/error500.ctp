<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = 'error';

if (Configure::read('debug')):
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error500.ctp');

    $this->start('file');

?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?php echo $message.= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?php Debugger::dump($error->params) ?>
<?php endif; ?>
<?php if ($error instanceof Error) : ?>
        <strong>Error in: </strong>
               <?php echo $message.=  sprintf('%s, line %s', str_replace(ROOT, 'ROOT', $error->getFile()), $error->getLine()) ?>
<?php endif; ?>
<?php
    echo $this->element('auto_table_warning');

    if (extension_loaded('xdebug')):
        xdebug_print_function_stack();
    endif;

    $this->end();
endif;
?>
<div class="error">
        <div class="error-code m-b-10 m-t-20">404 <i class="fa fa-warning"></i></div>
        <h3 class="font-bold">We couldn't find the page..</h3>

        <div class="error-desc">
            Sorry, but the page you are looking for was either not found or does not exist, <br/>
            Try refreshing the page or click the button below to go back to the Homepage.
            <div>
                <a class=" login-detail-panel-button btn" href="<?= SITE_URL ?>">
                        <i class="fa fa-arrow-left"></i>
                       HOME PAGE                 
                    </a>
            </div>
        </div>
    </div>

<script>
			
$(document).ready(function(){
		$.post('<?=SITE_URL ?>/errorReporting',{message:'<?=SITE_URL?> <br> <?=$message ?>'},function(response){});
	
});
</script>

