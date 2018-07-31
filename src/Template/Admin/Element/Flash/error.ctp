<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<script>
	$(documen).ready(function(){
			new PNotify({
                                  title: 'Sticky Error',
                                  text: <?= $message ?>,
                                  type: 'error',
                                  hide: false,
                                  styling: 'bootstrap3'
                              });
		
	});
	
	
</script>

