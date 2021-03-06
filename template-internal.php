<?php

include_once('php.util/restrict.php');
restrict();

?>
<!DOCTYPE html>
<html lang="en" ng-app="sig_operacional">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SIG Simple | Colaborative Project Management SaaS.</title>

	<!--STYLESHEET-->
	<!--=================================================-->

	<!--Open Sans Font [ OPTIONAL ] -->
 	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">


	<!--Bootstrap Stylesheet [ REQUIRED ]-->
	<link href="css/bootstrap.min.css" rel="stylesheet">


	<!--Nifty Stylesheet [ REQUIRED ]-->
	<link href="css/nifty.min.css" rel="stylesheet">

	
	<!--Font Awesome [ OPTIONAL ]-->
	<link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">


	<!--Switchery [ OPTIONAL ]-->
	<link href="plugins/switchery/switchery.min.css" rel="stylesheet">


	<!--Bootstrap Select [ OPTIONAL ]-->
	<link href="plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">


	<!--Bootstrap Validator [ OPTIONAL ]-->
	<link href="plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">


	<!--Switchery [ OPTIONAL ]-->
	<link href="plugins/switchery/switchery.min.css" rel="stylesheet">


	<!--Bootstrap Datepicker [ OPTIONAL ]-->
	<link href="plugins/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">
	

	<!--Bootstrap Timepicker [ OPTIONAL ]-->
	<link href="plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">


	<!--Bootstrap Table [ OPTIONAL ]-->
	<!-- <link href="plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet"> -->
	<link href="plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
	<link href="plugins/bootstrap-table/bootstrap-table-fixed-columns.css" rel="stylesheet">

	<!--Chosen [ OPTIONAL ]-->
	<link href="plugins/chosen/chosen.min.css" rel="stylesheet">

	<!--X-editable [ OPTIONAL ]-->
	<link href="plugins/x-editable/css/bootstrap-editable.css" rel="stylesheet">


	<!--Demo [ DEMONSTRATION ]-->
	<link href="css/demo/nifty-demo.min.css" rel="stylesheet">

	<!--PivotTable-->
	<link rel="stylesheet" type="text/css" href="plugins/pivottable/pivot.css">

	<!-- CUSTOM -->
	<link href="css/custom.css" rel="stylesheet">

	<!--SCRIPT-->
	<!--=================================================-->

	<!--Page Load Progress Bar [ OPTIONAL ]-->
	<link href="plugins/pace/pace.min.css" rel="stylesheet">
	<script src="plugins/pace/pace.min.js"></script>
</head>

<body>
	<div id="container" class="effect mainnav-lg">
		<!--NAVBAR-->
		<!--===================================================-->
		<header id="navbar">
			<div id="navbar-container" class="boxed">
				<?php include('navbar-brand.php'); ?>

				<!--Navbar Dropdown-->
				<!--================================-->
				<?php include('navbar-dropdown.php'); ?>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End Navbar Dropdown-->
			</div>
		</header>
		<!--===================================================-->
		<!--END NAVBAR-->

		<div class="boxed">
			<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div id="content-container">
				<!--Page Title-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<?php
					if(isset($_GET['page']) && $_GET['page'] != "home") {
						include('page-title.php');
						/*$ext = substr($_GET['page'], -4, 4);
						if($ext != '.asp') {
							include('page-title.php');
						}*/
					}
				?>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End page title-->

				<!--Breadcrumb-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<?php include('page-breadcrumb.php'); ?>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End breadcrumb-->

				<!--Page content-->
				<!--===================================================-->
				<div id="page-content">
					<?php
						if(isset($_GET['page'])) {
							$ext = substr($_GET['page'], -4, 4);
							if($ext == '.asp') {
					?>
					<iframe src="http://www.sigsimple-reports.tecnologia.ws/<?php echo $_GET['page']; ?>"
						border="0" frameborder="0">
					</iframe>
					<?php
							}
							else if(file_exists($_GET['page'].'.php')) {
								include($_GET['page'].'.php');
							}
							else {
								include('page-404.php');
							}
						}
					?>
				</div>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End Page content-->
			</div>
			<!--===================================================-->
			<!--END CONTENT CONTAINER-->

			<?php include('menu.php'); ?>
		</div>

		<?php include('footer.php'); ?>

		<!-- SCROLL TOP BUTTON -->
		<!--===================================================-->
		<button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
		<!--===================================================-->
	</div>
	<!--===================================================-->
	<!-- END OF CONTAINER -->
	
	<!--JAVASCRIPT-->
	<!--=================================================-->

	<!--jQuery [ REQUIRED ]-->
	<script src="js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

	<!--BootstrapJS [ RECOMMENDED ]-->
	<script src="js/bootstrap.min.js"></script>

	<!--Fast Click [ OPTIONAL ]-->
	<script src="plugins/fast-click/fastclick.min.js"></script>
	
	<!--Nifty Admin [ RECOMMENDED ]-->
	<script src="js/nifty.min.js"></script>

	<!--Switchery [ OPTIONAL ]-->
	<script src="plugins/switchery/switchery.min.js"></script>

	<!--Bootstrap Select [ OPTIONAL ]-->
	<script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>

	<!--Bootstrap Datepicker [ OPTIONAL ]-->
	<script src="plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
	<script src="plugins/bootstrap-datepicker/bootstrap-datepicker.pt-BR.js"></script>

	<!--Bootstrap Timepicker [ OPTIONAL ]-->
	<script src="plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>


	<!--Bootstrap Wizard [ OPTIONAL ]-->
	<script src="plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>


	<!--Bootstrap Validator [ OPTIONAL ]-->
	<script src="plugins/bootstrap-validator/bootstrapValidator.min.js"></script>

	<!--X-editable [ OPTIONAL ]-->
	<script src="plugins/x-editable/js/bootstrap-editable.min.js"></script>

	<!--Switchery [ OPTIONAL ]-->
	<script src="plugins/switchery/switchery.min.js"></script>

	<!--Table Export [ OPTIONAL ]-->
	<script src="plugins/table-2-excel/jquery.table2excel.js"></script>

	<!--Bootstrap Table [ OPTIONAL ]-->
	<!--<script src="plugins/bootstrap-table/bootstrap-table.min.js"></script>-->
	<script src="plugins/bootstrap-table/bootstrap-table.js"></script>
	<script src="plugins/bootstrap-table/bootstrap-table-fixed-columns.js"></script>

	<!--Table Export [ OPTIONAL ]-->
	<script src="plugins/table-export/tableExport.js"></script>
	<script src="plugins/table-export/jquery.base64.js"></script>
	<script src="plugins/table-export/jspdf/libs/sprintf.js"></script>
	<script src="plugins/table-export/jspdf/jspdf.js"></script>
	<script src="plugins/table-export/jspdf/libs/base64.js"></script>

	<!--Bootstrap Table Extension [ OPTIONAL ]-->
	<script src="plugins/bootstrap-table/extensions/editable/bootstrap-table-editable.js"></script>
	<script src="plugins/bootstrap-table/extensions/export/bootstrap-table-export.js"></script>

	<!--Demo script [ DEMONSTRATION ]-->
	<script src="js/demo/nifty-demo.js"></script>

	<!--Underscore [ REQUIRED ]-->
	<script src="js/underscore.min.js"></script>

	<!--Chosen [ OPTIONAL ]-->
	<script src="plugins/chosen/chosen.jquery.min.js"></script>

	<!--Angular [ REQUIRED ]-->
	<script src="bower_components/angular/angular.min.js"></script>
	<script src="js/angular-locale_pt-br.js"></script>

	<!--Chosen [ OPTIONAL ]-->
	<script src="plugins/chosen/angular-chosen.min.js"></script>

	<!--Angular [ REQUIRED ]-->
	<script src="js/ui-bootstrap-custom-0.13.0.min.js"></script>
	<script src="js/ui-bootstrap-custom-tpls-0.13.0.min.js"></script>

	<!--Bootstrap Treeview [ REQUIRED ]-->
	<script src="bower_components/bootstrap-treeview/src/js/bootstrap-treeview.js"></script>

	<!--Flow.js [ REQUIRED ]-->
	<script src="bower_components/flow.js/dist/flow.min.js"></script>
	<script src="bower_components/ng-flow/dist/ng-flow-standalone.min.js"></script>

	<!--Angular Input Masks [ REQUIRED ]-->
	<script src="bower_components/angular-input-masks/angular-input-masks-standalone.min.js"></script>

	<!--Moment [ REQUIRED ]-->
	<script src="bower_components/moment/moment.js"></script>
	<script src="bower_components/moment/locale/pt-br.js"></script>

	<!--Bootstrap Select [ REQUIRED ]-->
	<script src="bower_components/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="bower_components/moment/locale/pt-br.js"></script>

	<!--Bootstrap Select [ OPTIONAL ]-->
	<script src="plugins/bootstrap-ajax-typeahead/js/bootstrap-typeahead.min.js"></script>

	<!--PivotTable-->
    <script type="text/javascript" src="plugins/pivottable/pivot.js"></script>
    <script type="text/javascript" src="plugins/pivottable/pivot.pt.js"></script>

	<!--CUSTOM-->
	<script src="js/custom.js"></script>
	<script src="js/extras.js"></script>

	<script src="js/angular-app.js"></script>
	<script src="js/service/services.js"></script>
	<script src="js/controller/menu.js"></script>
	<script src="js/controller/page-title.js"></script>
	<script src="js/controller/page-breadcrumb.js"></script>
	<script src="js/controller/navbar-dropdown.js"></script>
	<script src="js/controller/<?=($_GET['page'])?>.js"></script>
</body>
</html>