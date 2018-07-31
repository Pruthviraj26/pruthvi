<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Voguish a Blogging Category Flat Bootstarp Responsive Website Template | Home :: w3layouts</title>
<link href="<?= SITE_URL.'/'.$front_theme ?>/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="<?= SITE_URL.'/'.$front_theme ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Voguish Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,700' rel='stylesheet' type='text/css'>
<script src="<?= SITE_URL.'/'.$front_theme ?>/js/jquery.min.js"></script>
<script src="<?= SITE_URL.'/'.$front_theme ?>/js/responsiveslides.min.js"></script>
<script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
	
  </script>
	
</head>
<body>
<!-- header -->
	<div class="header">
		<div class="container">
			<div class="logo">
				<a href="<?= SITE_URL.'/'.$front_theme ?>/index.html"><img src="<?= SITE_URL.'/'.$front_theme	 ?>/images/logo.png" class="img-responsive" alt=""></a>
			</div>
			
				<?= $this->element("primary"); ?>
						<!-- script-for-nav -->
							<script>
								$( "span.menu" ).click(function() {
								  $( ".head-nav ul" ).slideToggle(300, function() {
									// Animation complete.
								  });
								});
							</script>
						<!-- script-for-nav -->
				
						
			
					<div class="clearfix"> </div>
		</div>
	</div>
<!-- header -->
	<?= $this->fetch('content') ?>

		<?= $this->element("footer"); ?>	
</body>
</html>