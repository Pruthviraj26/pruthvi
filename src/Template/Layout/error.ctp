<!doctype html>
<html>
	<head>
		<title></title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
		
		<link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>/front/css/bootstrap.css">
 
		<style>.error {
  margin: 0 auto;
  text-align: center;
}

.error-code {
  bottom: 60%;
  color: #2d353c;
  font-size: 96px;
  line-height: 100px;
}

.error-desc {
  font-size: 12px;
  color: #647788;
}

.m-b-10 {
  margin-bottom: 10px!important;
}

.m-b-20 {
  margin-bottom: 20px!important;
}

.m-t-20 {
  margin-top: 20px!important;
}
</style>
				<script src="<?= FRONT_URL ?>/js/jquery-3.1.0.min.js"></script>  
		

	</head>

	<body>
				<?=  $this->fetch('content') ?>
	</body>
</html>