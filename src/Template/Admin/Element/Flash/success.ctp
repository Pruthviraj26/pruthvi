<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<script>
	
	$(document).ready(function(){
		
		new PNotify({ title: 'Success',
									 text: '<?= $message ?>',
									type: 'success',								 
									hide: false,
									styling: 'bootstrap3'
							});
		
		
	});
	

</script>

