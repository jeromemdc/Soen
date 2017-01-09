<fit-quiz></fit-quiz>

<meta-container></meta-container>
<div class="parallax-3 parallax"></div>
<div class="parallax-4 parallax"></div>
<div class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#/">Home</a></li>
			<li><a href="#category/{{ result.subcategory.cat_slug1 }}">{{ result.subcategory.cat_name1 }}</a></li>
			<li class="active bold">{{ result.subcategory.cat_name }}</li>
		</ol>
	</div>
</div>

<!--body -->

<div class="container">
	<div class="row">

		<div class="col-md-2 sidebar-text">

			<div class="header-copy cat-title">
				<h2>{{ result.subcategory.cat_name1 }}</h2>
			</div>

			<div class="side-menu">
				<ul>
					<li ng-repeat="prod_subcategory in result.subcategories" ng-class="{ active: result.subcategory.slug == prod_subcategory.slug }">
						<a href="#category/{{ result.subcategory.cat_slug1 }}/{{ prod_subcategory.slug }}">{{ prod_subcategory.cat_name }}</a>
					</li>
				</ul>
			</div>

			<br><br>

			<div class="header-copy cat-title">
				<h2>Collection</h2>
			</div>

			<div class="side-menu">
				<ul>
					<li ng-repeat="collection in result.collections">
						<a href="#collection/{{ collection.slug }}">{{ collection.name }}</a>
					</li>
				</ul>
			</div>

			<br><br>

		</div>

		<div class="col-md-10">
			<div class="row">
				<div class="col-md-12 sub-cat-info">
					<h2>{{ result.subcategory.cat_name }}</h2>
					<p ng-hide="!result.subcategory.description.length">{{ result.subcategory.description }}</p>
					
				</div>
			</div>
			<div class="row">
				<ul class="product-grid">
					<li class="col-md-4 col-sm-6 col-xs-6" ng-repeat="product in result.products">
						<a href="#product/{{ result.subcategory.cat_slug1 }}/{{ result.subcategory.slug }}/{{ product.slug }}">
							<div class="wrap">
								<img ng-src="uploads/img/{{ product.image }}" alt="{{ product.name }}" class="img-responsive">
							</div>
							<div class="caption">
								<h3 class="text-center">{{ product.name }}</h3>
							</div>
						</a>
					</li> 
				</ul>

			</div>
		</div>
	</div>
</div>