<?php extract($_REQUEST); ?>
<!doctype html>
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
	<!--<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />-->
	<!--<meta http-equiv=content-type content=text/html; charset=utf-8>-->
	<meta http-equiv="X-UA-Compatible" content="IE=10" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	
	<title>Planilla Panamá</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css?1.1.3">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
	
	<link rel="stylesheet" href="css/bootstrap-modal.css">
	<link rel="stylesheet" href="css/toastr.css">
	<link rel="stylesheet" href="css/toastr-responsive.css">
	
	<!-- jQuery UI -->
	<link rel="stylesheet" href="css/plugins/jquery-ui/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
		<!-- timepicker -->
    <link rel="stylesheet" href="css/bootstrap-timepicker.min.css">
	<!-- Datepicker -->
	<link rel="stylesheet" href="css/plugins/datepicker/datepicker.css">

	<!-- dataTables -->
	<link rel="stylesheet" href="css/plugins/datatable/TableTools.css">
	<!-- PageGuide -->
	<link rel="stylesheet" href="css/plugins/pageguide/pageguide.css">
	<!-- Fullcalendar -->
	<!--<link rel="stylesheet" href="css/plugins/fullcalendar/fullcalendar.css">
	<link rel="stylesheet" href="css/plugins/fullcalendar/fullcalendar.print.css" media="print">-->
	<!-- chosen -->
	<link rel="stylesheet" href="css/plugins/chosen/chosen.css">
	<!-- select2 -->
	<link rel="stylesheet" href="css/plugins/select2/select2.css">
	<!-- icheck -->
	<link rel="stylesheet" href="css/plugins/icheck/all.css">
    <link href="css/responsive-calendar.css" rel="stylesheet">


	<!-- Notify -->
	<link rel="stylesheet" href="css/plugins/gritter/jquery.gritter.css">
	<!-- Plupload -->
	<link rel="stylesheet" href="css/plugins/plupload/jquery.plupload.queue.css">
	<link rel="stylesheet" href="css/bootstrap-wysihtml5.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/style.css?2.2.6">		
	<!-- Color CSS -->
	<link rel="stylesheet" href="css/themes.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">
	
	<link rel="stylesheet" type="text/css" href="css/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="css/themes/icon.css"> 

	

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-1.2.1.js"></script>
	
	<!-- Nice Scroll -->
	<script src="js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- imagesLoaded -->
	<script src="js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>
	<!-- jQuery UI -->
	<script src="js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.draggable.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.sortable.min.js"></script>
	<!-- Touch enable for jquery UI -->
	<script src="js/plugins/touch-punch/jquery.touch-punch.min.js"></script>
	<!-- slimScroll -->
	<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- vmap -->
	<!--<script src="js/plugins/vmap/jquery.vmap.min.js"></script>
	<script src="js/plugins/vmap/jquery.vmap.world.js"></script>
	<script src="js/plugins/vmap/jquery.vmap.sampledata.js"></script>-->
	<!-- Bootbox -->
	<script src="js/plugins/bootbox/jquery.bootbox.js"></script>
	<!-- Notify -->
	<!--<script src="js/plugins/gritter/jquery.gritter.min.js"></script>-->
	<!-- Datepicker -->
	<script src="js/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="js/plugins/datepicker/locales/bootstrap-datepicker.es.js"></script>
	<!-- Timepicker -->
	<script src="js/bootstrap-timepicker.min.js"></script>
	
	<!-- dataTables -->
	<script src="js/plugins/datatable/jquery.dataTables.min.js"></script>
	<script src="js/plugins/datatable/TableTools.min.js"></script>
	<script src="js/plugins/datatable/ColReorderWithResize.js"></script>
	<script src="js/plugins/datatable/ColVis.min.js"></script>
	<script src="js/plugins/datatable/jquery.dataTables.columnFilter.js"></script>
	<script src="js/plugins/datatable/jquery.dataTables.grouping.js"></script>
	
	<!-- Validation -->
	<script src="js/plugins/form/jquery.form.min.js"></script>
	<script src="js/plugins/validation/jquery.validate.min.js"></script>
	<script src="js/plugins/validation/additional-methods.min.js"></script>
	
	<!-- Flot -->
    <!--<script src="js/plugins/flot/jquery.flot.min.js"></script>
	<script src="js/plugins/flot/jquery.flot.bar.order.min.js"></script>
	<script src="js/plugins/flot/jquery.flot.pie.min.js"></script>
	<script src="js/plugins/flot/jquery.flot.resize.min.js"></script>-->
	<!-- imagesLoaded -->
	<!--<script src="js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>-->
	<!-- PageGuide -->
	<script src="js/plugins/pageguide/jquery.pageguide.js"></script>
	<!-- FullCalendar -->
	<script src="js/plugins/fullcalendar/fullcalendar.min.js"></script>-
	<!-- Chosen -->
	<script src="js/plugins/chosen/chosen.jquery.min.js"></script>
	<!-- PLUpload -->
	<!--<script src="js/plugins/plupload/plupload.full.js"></script>
	<script src="js/plugins/plupload/jquery.plupload.queue.js"></script>-->
	<!-- Custom file upload -->
	<!--<script src="js/plugins/fileupload/bootstrap-fileupload.min.js"></script>
	<script src="js/plugins/mockjax/jquery.mockjax.js"></script>
    <script src="js/responsive-calendar.js"></script>-->
	
	<!-- select2 -->
	<script src="js/plugins/select2/select2.min.js"></script>
	<!-- icheck -->
	<script src="js/plugins/icheck/jquery.icheck.min.js"></script>

	<!-- Theme framework -->
	<script src="js/eakroko.min.js"></script>
	<!-- Theme scripts -->
	<script src="js/application.min.js"></script>
	
    <!-- CKEditor -->
	<script src="js/plugins/ckeditor2/ckeditor.js"></script>
	 <!-- <script src="js/wysihtml5-0.3.0.js"></script>
	<script src="js/bootstrap-wysihtml5.js"></script>-->
	<!-- CKEditor -->
	<!--<script src="js/plugins/ckeditor/ckeditor.js"></script>-->
	
    <!--script src="js/plugins/tinymce/js/tinymce/tinymce.min.js"></script>-->

	<!--[if lte IE 9]>
	    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="js/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
		<script src="js/respond.min.js"></script>
	<![endif]-->
		
	<!--<script type="text/javascript" src="js/jquery.functions.js"></script>-->
	<script src="js/jquery.functions.js?17.1.3"></script>
	<!--<script src="js/jquery.timepicker.js"></script>-->
	<!--<script type="text/javascript" src="js/ok-time.min.js"></script>-->
	<script src="js/jquery.json.js"></script>
	<script src="js/jquery.tabledit.min.js"></script>
	<!--<script src="js/table_editable.js?1.1.7"></script>-->
	<script src="js/bootstrap-modalmanager.js"></script>
    <script src="js/bootstrap-modal.js"></script>
 	<!--<script src="js/jquery.blockUI.js?2.3.0"></script>-->	
    <script src="js/toastr.js"></script>
	<script src="js/modernizr.custom.js"></script>
    


</head>

<!--<body>-->
<body  data-layout-topbar="fixed" class="theme-satblue"  data-theme="theme-satblue">
	<div id="navigation">
		<div class="container-fluid">
			<a href="#" id="brand">Planilla Panamá</a>
			<a href="#" class="toggle-nav"  data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>

			<div class="user">
				<div class="dropdown">
					<a href="#" class='dropdown-toggle' data-toggle="dropdown"><?php echo $nombre_usuario; ?></a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="cerrarsesion.php">Salir</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid nav-hidden" id="content">

		<div id="main">
			<div class="container-fluid">
    
    
    
