<fit-quiz></fit-quiz>

<div class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#/">Home</a></li>
			<li><a href="#/">Collection</a></li>
			<li class="active bold">{{ result.collection.name }}</li>
		</ol>
	</div>
</div>

<!--body -->

<div class="container">
	<div class="row">

		<div class="col-md-2 sidebar-text">

			<div class="header-copy cat-title">
				<h2>Collection</h2>
			</div>

			<div class="side-menu">
				<ul>
					<li ng-repeat="collection in result.collections" ng-class="{ active: collection.id == result.collection.id }">
						<a href="#collection/{{ collection.slug }}">{{ collection.name }}</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="col-md-10">
			<div class="row">
				<div class="col-md-12 sub-cat-info">
					<h2>{{ result.collection.name }}</h2>
				</div>
			</div>
			<div class="row">
				<ul class="product-grid">
					<li class="col-md-4 col-sm-6 col-xs-6" ng-repeat="product in filteredProducts">
						<a href="#product/{{ product.cat_slug1 }}/{{ product.cat_slug2 }}/{{ product.prod_slug }}">
							<div class="wrap">
								<img ng-src="uploads/img/{{ product.prod_image }}" alt="{{ product.prod_name }}" class="img-responsive">
							</div>
							<div class="caption">
								<h3 class="text-center">{{ product.prod_name }}</h3>
							</div>
						</a>
					</li> 
				</ul>
				<div class="clearfix"></div>
				<center>	<pagination ng-model="currentPage" total-items="result.products.length" max-size="maxSize"  boundary-links="true" items-per-page="numPerPage"></pagination></center>
			</div>
		</div>
	</div>
</div>