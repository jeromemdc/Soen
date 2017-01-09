<meta-container></meta-container>
<hr class="home">

<!--first fold banner-->
<div id="fold-1" class="container-fluid">
	<div class="row">

		<div class="col-lg-7 col-md-6 home-image left">
			<a href="#collection/cotton-spandex">
				<center>
					<img src="includes/img/new/home-girl-1.jpg" class="img-responsive">
				</center>
			</a>
		</div>

		<div class="col-lg-5 col-md-6 home-image right">
			<a href="#collection/summer-2017">
				<center>
					<img src="includes/img/new/home-girl-2.jpg" class="img-responsive">
				</center>
			</a>
		</div>

	</div>
</div>

<!--second fold banner-->
<div id="fold-2" class="container-fluid">
	<div class="row">

		<div class="col-lg-5 col-md-6 home-image left">
			<a href="#category/bra">
				<center>
					<img src="includes/img/new/home-girl-3.jpg" class="img-responsive">
				</center>
			</a>
		</div>

		<div class="col-lg-7 col-md-6 home-image right">
			<a href="#collection/microfiber">
				<center>
					<img src="includes/img/new/home-girl-4.jpg" class="img-responsive">
				</center>
			</a>
		</div>

	</div>
</div>

<!-- <div id="first-fold-banner" class="container-fluid">
	<div class="row">

		<div class="col-md-8">
			<div class="image-left">
				<a href="#/"><img src="includes/img/new/home-girl-1.jpg" class="img-responsive"></a>
			</div>
		</div>

		<div class="col-md-4">
			<div class="image-right">
				<a href="#/"><img src="includes/img/new/home-girl-2.jpg" class="img-responsive"></a>
			</div>

		</div>
	</div>
</div> -->


<!--text-block-->

<!-- <div id="text-block" class="container-fluid">
	<div class="row">
		<div class="container">
			<div class="col-md-12">
				<center>
					<h2>Find the perfect fitting underwear for your size and shape.</h2>
					<a href="#/" class="quiz-btn">Take the Fit Quiz</a>
				</center>
			</div>
		</div>
	</div>
</div> -->

<!--second fold banner-->

<!-- <div id="second-fold-banner" class="container-fluid">
	<div class="row">
		<div class="home-img-left-container">
			<div class="col-xs-6 col-md-3">
				<div class="image-left">
					<a href="#/"><img src="includes/img/new/home-girl-3.jpg" class="img-responsive"></a>
				</div>
			</div>

			<div class="col-xs-6 col-md-3">
				<div class="image-center">
					<a href="#/"><img src="includes/img/new/home-girl-4.jpg" class="img-responsive"></a>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-md-6">
			<div class="image-right">
				<a href="#/"><img src="includes/img/new/home-girl-5.jpg" class="img-responsive"></a>
			</div>
		</div>
	</div>
</div> -->

<!--Fun colorful and young -->

<div id="banner-four" class="container-fluid">
	<div class="row">
		<a href="#collection/cotton-spandex">
			<center>
				<img src="includes/img/narrowbanner2.jpg" class="img-responsive">
				<!--div class="fun-banner-text">
					<p>Fun, Colorful, and Young</p>
					<a href="#/" class="browse-kids-btn">Browse kids' collection</a>
				</div-->
			</center>
		</a>
	</div>
</div>




<!--our bestsellers-->

<div id="product-reco" class="container">
	<center>
		<h2>Our Bestsellers</h2>   
	</center>
	<br>
	<div class="row">
		<ul>
			<li class="col-xs-6 col-sm-6 col-md-3" ng-repeat="product in result.seller">
				<a href="#product/{{ product.cat_slug1 }}/{{ product.cat_slug2 }}/{{ product.prod_slug }}">
					
					<div class="wrap">
						<img ng-src="uploads/img/{{ product.prod_image }}" alt="{{ product.prod_name }}" class="img-responsive">
					</div>
					<div class="caption">
						<h3 class="text-center">{{ product.prod_name }} </h3>
					</div>

				</a>
			</li>
		</ul>
	</div>
	<!-- <center>
		<a href="#" class="btn-cta">View All</a>
	</center> -->
</div>

<br><br><br>

<!--cta break-->

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 break-cta home">
			<div class="overlay-white">
				<p>Follow us on Social Media!</p>
				<h3>#IWearThisForMe</h3>
				<a href="https://www.facebook.com/SOENPhilippines/?fref=ts" target="_blank" class="latest-btn">Facebook</a>
				<a href="https://twitter.com/soen_lingerie" target="_blank" class="latest-btn">Twitter</a>
				<a href="https://www.instagram.com/soen_lingerie/" target="_blank" class="latest-btn">Instagram</a>
			</div>
		</div>
	</div>
</div>
