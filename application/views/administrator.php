<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Soen | <?=$title?></title>
	<link rel="icon" type="image/x-icon" href="<?=base_url()?>includes/img/favicon.ico">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="<?=base_url()?>assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/css/animate.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/css/style.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/css/theme/red.css" rel="stylesheet" id="theme" />
	
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="<?=base_url()?>assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/plugins/lightbox/css/lightbox.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/css/custom.css" rel="stylesheet" id="theme" />
	
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?=base_url()?>assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/pace/pace.min.js"></script>
	<script src="<?=base_url()?>assets/js/jquery.form.js"></script>
	<!-- ================== END BASE JS ================== -->

	<script type="text/javascript">
		var base_url = '<?=base_url()?>';		
	</script>
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="<?=base_url()?>dashboard" class="navbar-brand"><span class="navbar-logo"></span> 
						<img src="<?=base_url()?>includes/img/soen-logo.png" class="img-responsive nav-logo" alt="">
					</a>
					<!-- <img src="<?=base_url()?>includes/img/logo.png" class="img-responsive" alt=""> -->
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
				
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					<li>
						<form class="navbar-form full-width">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Enter keyword" />
								<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
							</div>
						</form>
					</li>
					
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?=base_url()?>assets/img/user-13.jpg" alt="" /> 
							<span class="hidden-xs">Administrator</span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<li><a href="<?=base_url()?>administrator/logout">Log Out</a></li>
						</ul>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<div class="image">
							<a href="javascript:;"><img src="<?=base_url()?>assets/img/user-13.jpg" alt="" /></a>
						</div>
						<div class="info">
							Administrator
							<small>Admin Panel</small>
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation</li>

					<?php $method = $this->uri->segment(2); ?>
					<?php $uri = $this->uri->segment(3); ?>

					
					<li class="<?=$method == 'dashboard' ? 'active' : ''?>"><a href="<?=base_url()?>administrator/dashboard"><i class="fa fa-laptop"></i> <span>Dashboard</span></a></li>
					
					<li class="has-sub <?=$this->input->get('route') == 'catalog' ? 'active' : ''?>">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-tags"></i>
						    <span>Catalog</span>
					    </a>
						<ul class="sub-menu">
						    <li class="<?=$method == 'categories' || $method == 'add_category' || $method == 'edit_category' ? 'active' : ''?>"><a href="<?=base_url()?>administrator/categories?route=catalog">Categories</a></li>
						    <li class="<?=$method == 'collections' || $method == 'add_collection' || $method == 'edit_collection' ? 'active' : ''?>"><a href="<?=base_url()?>administrator/collections?route=catalog">Collections</a></li>
						    <li class="<?=$method == 'products' || $method == 'add_product' || $method == 'edit_product' || $method == 'add_attribute' || $method == 'add_image' ? 'active' : ''?>"><a href="<?=base_url()?>administrator/products?route=catalog">Products</a></li>
						</ul>
					</li>

					<li class="has-sub <?=$this->input->get('route') == 'pages' ? 'active' : ''?>">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-bookmark"></i>
						    <span>Pages</span>
					    </a>
						<ul class="sub-menu">
						    <li class="<?=$uri == 1 && $this->input->get('route') == 'pages' ? 'active' : ''?>"><a href="<?=base_url()?>administrator/pages/1?route=pages">Home Page</a></li>
						    <li class="<?=$uri == 2 && $this->input->get('route') == 'pages' ? 'active' : ''?>"><a href="<?=base_url()?>administrator/pages/2?route=pages">About Page</a></li>
						</ul>
					</li>


					
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<?php $this->load->view('administrator/media_modal'); ?>
		<?php $this->load->view('administrator/'.$page); ?>
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<script src="<?=base_url()?>assets/js/multiple_upload.js"></script>

	<!-- ================== BEGIN BASE JS ================== -->
	
	<script src="<?=base_url()?>assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	
	<!--[if lt IE 9]>
		<script src="<?=base_url()?>assets/crossbrowserjs/html5shiv.js"></script>
		<script src="<?=base_url()?>assets/crossbrowserjs/respond.min.js"></script>
		<script src="<?=base_url()?>assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?=base_url()?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?=base_url()?>assets/plugins/DataTables/js/jquery.dataTables.js"></script>
	<script src="<?=base_url()?>assets/js/table-manage-tabletools.demo.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/DataTables/js/dataTables.tableTools.js"></script>
	<script src="<?=base_url()?>assets/plugins/DataTables/js/jquery.dataTables.rowReordering.js"></script>
	<script src="<?=base_url()?>assets/plugins/ckeditor/ckeditor.js"></script>
	<script src="<?=base_url()?>assets/js/form-plugins.demo.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/parsley/dist/parsley.js"></script>
	<script src="<?=base_url()?>assets/plugins/lightbox/js/lightbox-2.6.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/ckeditor/config.js"></script>
	<script src="<?=base_url()?>assets/js/jquery.twbsPagination.min.js"></script>
	<script src="<?=base_url()?>assets/js/mediamanager.js"></script>
	<script src="<?=base_url()?>assets/js/custom.js"></script>
	
	<script src="<?=base_url()?>assets/js/upload_single.js"></script>
	<script src="<?=base_url()?>assets/js/apps.min.js"></script>

	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			TableManageTableTools.init();
			$('#images').dataTable().rowReordering();
		});
	</script>
</body>
</html>