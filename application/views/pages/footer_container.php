<!--footer-->
<div id="footer" class="container-fluid" ng-controller="CategoryController as parent_categories">
	<div class="row">

		<div class="col-md-2 footer-logo-container">
			<div class="footer-logo-box">
				<img src="includes/img/soen-logo-footer.png">
			</div>
		</div>

		<div class="col-md-8 footer-menu-container hidden-xs">
			<div class="footer-menu-box">
				<ul>
					<li ng-repeat="category in parent_categories.category">
						<a href="#category/{{ category.slug }}">{{ category.cat_name }}</a>
					</li>
					<li><a href="#about-us">About Us</a></li>
				</ul>
			</div>
		</div>

		<div class="col-md-8 footer-menu-container2 visible-xs-block">
			<div class="footer-menu-box">
				<ul>
					<li ng-repeat="category in parent_categories.category">
						<a href="#category/{{ category.slug }}">{{ category.cat_name }}</a>
					</li>
					<li><a href="#about-us">About Us</a></li>
				</ul>
			</div>
		</div>

		<div class="col-md-2 footer-sns-container hidden-xs">
			<div class="footer-sns-box">
				<ul class="sns-icons">
					<li><a href="https://www.facebook.com/SOENPhilippines/?fref=ts" target="_BLANK"><img src="includes/img/facebook-icon.png" alt="Facebook" class="img-responsive"></a></li>
					<li><a href="https://twitter.com/soen_lingerie?lang=en" target="_BLANK"><img src="includes/img/twitter-icon.png" alt="Twitter" class="img-responsive"></a></li>
					<li><a href="https://www.instagram.com/soen_lingerie" target="_BLANK"><img src="includes/img/ig-icon.png" alt="Instagram" class="img-responsive"></a></li>
				</ul>
			</div>
		</div>

		<div class="col-md-2 footer-sns-container2 visible-xs-block">
			<div class="footer-sns-box">
				<ul class="sns-icons">
					<li><a href="https://www.facebook.com/SOENPhilippines/?fref=ts" target="_BLANK"><img src="includes/img/facebook-icon.png" alt="Facebook" class="img-responsive"></a></li>
					<li><a href="https://twitter.com/soen_lingerie?lang=en" target="_BLANK"><img src="includes/img/twitter-icon.png" alt="Twitter" class="img-responsive"></a></li>
					<li><a href="https://www.instagram.com/soen_lingerie" target="_BLANK"><img src="includes/img/ig-icon.png" alt="Instagram" class="img-responsive"></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>