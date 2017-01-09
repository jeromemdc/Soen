<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" ng-app="myApp">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>SO-EN Lingerie</title>
	<meta name="description" content="Description here">
	<meta name="keywords" content="Keywords here">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta property="og:type" content="website" />
	<meta property="og:site_name" content="Soen" />
	<meta property="og:title" content="Soen" />
	<meta property="og:description" content="Soen" />

	<link rel="icon" type="image/x-icon" href="<?=base_url()?>includes/img/favicon.ico">
	<link href="<?=base_url()?>includes/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>includes/css/reset.css" />

	<link rel="stylesheet" type="text/css" href="https://rawgit.com/igorlino/elevatezoom-plus/master/css/jquery.ez-plus.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/igorlino/fancybox-plus/1.3.6/css/jquery.fancybox-plus.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>includes/css/style.css" />

	<script src="https://use.typekit.net/yug5edb.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>

	<script>
        var BASE_URL = "<?=base_url()?>"; 
    </script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="<?=base_url()?>includes/js/parallax.js"></script>
</head>

<body>

	<header-container></header-container>

	<div ng-view></div>
	
	<footer-container></footer-container>

	<!-- JS -->
	
	<script type="text/javascript" src="<?=base_url()?>includes/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-sanitize.js"></script>

	<script src='https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.18/src/jquery.ez-plus.js'></script>
    <script src='https://cdn.rawgit.com/igorlino/angular-fancybox-plus/1.0.2/js/angular-fancybox-plus.js'></script>
	
	<script src="<?=base_url()?>includes/js/home.js"></script>
	<script src="<?=base_url()?>includes/js/angular-ezplus.js"></script>
	<script src="<?=base_url()?>includes/js/update-meta.js"></script>
	<script src="<?=base_url()?>includes/js/angular-filter.js"></script>
	<script data-require="ui-bootstrap@*" data-semver="0.12.1" src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.12.1.min.js"></script>
	<script src="<?=base_url()?>includes/js/app.js"></script>
	<script type="text/javascript">
		$(window).scroll(function(e){
		  parallax();
		});
		function parallax(){
		  var scrolled = $(window).scrollTop();
		  $('.parallax-1').css('top',-(scrolled*1.2)+'px');
		  $('.parallax-2').css('top',-(scrolled*2)+'px');
		  $('.parallax-3').css('top',-(scrolled*1.2)+'px');
		  $('.parallax-4').css('top',-(scrolled*2)+'px');
		}
	</script>

</body>
</html>