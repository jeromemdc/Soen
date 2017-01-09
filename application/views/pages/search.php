<fit-quiz></fit-quiz>

<div class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#/">Home</a></li>
			<li><a href="#/">Search</a></li>
			<li class="active bold">{{ search }}</li>
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
					<h2>Search results for "{{ search }}"</h2>
				</div>
			</div>
			<div class="row">
				<ul>
					<li class="col-md-4" ng-repeat="product in result.products">
						<a href="#product/{{ product.cat_slug1 }}/{{ product.cat_slug2 }}/{{ product.prod_slug }}">
							<img ng-src="uploads/img/{{ product.prod_image }}" alt="{{ product.prod_name }}" class="img-responsive">
							<div class="caption">
								<h3 class="text-center">{{ product.prod_name }}</h3>
							</div>
						</a>
					</li> 

				</ul>
				<div ng-if="result.products.length === 0" class="text-center"><h2>No Result Found</h2></div>

			</div>
		</div>
	</div>
</div>