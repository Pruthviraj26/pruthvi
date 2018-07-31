$(document).ready(function(){
href = window.location.href;
	var arr = href.split('/');
	var liId = arr[arr.length-1];
	$(liId+'Menu').addClass('active');

	$('.nav li').click(function(){
		$('.nav li').removeClass('active');
		$(this).addClass('active');
	});
	
});