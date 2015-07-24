<?php extract($_REQUEST); ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	
	<title>Planilla Panamá</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
	<!-- icheck -->
	<link rel="stylesheet" href="css/plugins/icheck/all.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="css/themes.css">


	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	
	<!-- Nice Scroll -->
	<script src="js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- Validation -->
	<script src="js/plugins/validation/jquery.validate.min.js"></script>
	<script src="js/plugins/validation/additional-methods.min.js"></script>
	<!-- icheck -->
	<script src="js/plugins/icheck/jquery.icheck.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
		<!-- Bootbox -->
	<script src="js/plugins/bootbox/jquery.bootbox.js"></script>
	<!--<script src="js/eakroko.js"></script>-->
	<script type="text/javascript" src="js/jquery.functions3.js?1.1.12"></script>

	<!--[if lte IE 9]>
		<script src="js2/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
	

	<!-- Favicon -->
	<!--<link rel="shortcut icon" href="img/favicon.ico" />-->
	<!-- Apple devices Homescreen icon -->
	<!--<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />-->
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body class='login theme-satblue' data-theme="theme-satblue">
<!--<body  data-layout-topbar="fixed" class="theme-satblue"  data-theme="theme-satblue">-->
	<div class="wrapper">
		<!--<h1><a href="index.html"><img src="img/logo-big.png" alt="" class='retina-ready' width="59" height="49">Planilla Panamá</a></h1>-->
		<h1><a href="#">Planilla Panamá</a></h1>
		<div class="login-body">
			<h2></h2>
			<form action="" method='POST'   id="FormToValidate">
				<div class="control-group">
					<div class="controls">
						<input type="text" name='usuario' id='usuario' placeholder="usuario" class='input-block-level' data-rule-required="true" autofocus=true>
					</div>
				</div>
				<div class="control-group">
					<div class="pw controls">
						<input type="password" name="contrasena" id="contrasena" placeholder="contraseña" class='input-block-level' data-rule-required="true">
					</div>
				</div>
				<div class="submit">
					<!--<div class="remember">-->
						<!--<input type="checkbox" name="remember" class='icheck-me' data-skin="square" data-color="blue" id="remember"> <label for="remember">Remember me</label>-->
					<!--</div>-->
					<input type="submit" value="Ingresar" class='btn btn-primary' id="btnValidate">
				</div>
			</form>
			<div class="forget">
				<a href="#"><span></span></a>
			</div>
		</div>
	</div>
</body>

</html>
