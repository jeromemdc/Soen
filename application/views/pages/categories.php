<fit-quiz></fit-quiz>

<meta-container></meta-container>

<div class="parallax-3 parallax"></div>
<div class="parallax-4 parallax"></div>

<div class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#/">Home</a></li>
			<li class="active bold">{{ result.category.cat_name }}</li>
		</ol>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="cat-hero-image col-sm-12">
			<img ng-src="uploads/img/{{ result.category.image }}" class="img-responsive">
		</div>
	</div>
</div>

<div class="categories-grid container">
	<div class="row">   
		<div id="category" class="col-md-12 underwear-img">
			<ul class="row">
				<li class="col-sm-3 col-xs-6" ng-repeat="prod_category in result.subcategories">
					<a href="#category/{{ result.category.slug }}/{{ prod_category.slug }}">
						<div class="wrap">
							<img ng-src="uploads/img/{{ prod_category.image }}" alt="{{ prod_category.cat_name }}" class="img-responsive">
						</div>
						<div class="caption">
							<h3 class="text-center">{{ prod_category.cat_name }}</h3>
						</div>
					</a>
				</li>
			</ul>
		</div>

	</div>
</div>
