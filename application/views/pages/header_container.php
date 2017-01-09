<!--navigation-->

<div id="header" class="container-fluid">
	<div class="row">

		<div class="col-md-2 nav-logo-container">
			<div class="nav-logo">
				<a href="#/">
					<img src="includes/img/soen-logo.png" alt="SOEN Lingerie" class="img-responsive">
				</a>
			</div>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-trigger" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="nav-trigger" >
			<div class="row">
				<div class="col-md-6 nav-menu-container" >
					<div class="nav-menu">
						<ul class="navbar nav-pills nav-justified" ng-controller="CategoryController as parent_categories">
							<li ng-repeat="category in parent_categories.category">
								<a href="#category/{{ category.slug }}">{{ category.cat_name }}</a>
							</li>
						</ul>
					</div>
				</div>

				<div class="col-md-2 col-sm-8 nav-search-container">
					<div class="nav-search" ng-controller="searchCtrl">
						<form class="navbar-form" role="search" ng-submit="SendHttpPostData()">
							<div class="input-group add-on">
								<div class="input-group-btn">
									<input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text" ng-model="keywords" required>
									<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div class="col-md-2 col-sm-4 nav-sns-container">
					<div class="sns-buttons">
						<ul id="inline-icons">

							<li>
								<a href="https://www.facebook.com/SOENPhilippines/?fref=ts" target="_BLANK">
									<img src="includes/img/facebook-icon.png" alt="Facebook" class="img-responsive">
								</a>
							</li>

							<li>
								<a href="https://twitter.com/soen_lingerie?lang=en" target="_BLANK">
									<img src="includes/img/twitter-icon.png" alt="Twitter" class="img-responsive">
								</a>
							</li>

							<li>
								<a href="https://www.instagram.com/soen_lingerie" target="_BLANK">
									<img src="includes/img/ig-icon.png" alt="Instagram" class="img-responsive">
								</a>
							</li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>