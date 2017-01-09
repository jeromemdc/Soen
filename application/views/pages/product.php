<meta-container></meta-container>

<div class="parallax-1 parallax"></div>
<div class="parallax-2 parallax"></div>

<!--breadcrumb-->
<div class="container" >
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#/">Home</a></li>
            <li><a href="#category/{{ result.category.cat_slug1 }}">{{ result.category.cat_name1 }}</a></li>
            <li><a href="#category/{{ result.category.cat_slug1 }}/{{ result.category.cat_slug2 }}">{{ result.category.cat_name2 }}</a></li>
            <li class="active bold">{{ result.product.name }}</li>
        </ol>
    </div>
</div>

<div class="container container-section bikini">
    <div class="row">
        <div class="col-md-2 sidebar-text">
            <div class="header-copy cat-title">
                <h2>{{ result.category.cat_name1 }}</h2>
            </div>

            <div class="side-menu">
                <ul>
                    <li ng-repeat="prod_subcategory in result.subcategories" ng-class="{ active: result.subcategory.slug == prod_subcategory.slug }">
                        <a href="#category/{{ result.category.cat_slug1 }}/{{ prod_subcategory.slug }}">{{ prod_subcategory.cat_name }}</a>
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
                        <a href="#/collection/{{ collection.slug }}">{{ collection.name }}</a>
                    </li>
                </ul>
            </div>
            <br><br>
        </div>

        <div class="col-md-10">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="product-code">{{ result.product.name }}</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-lg-5">
                    <div ng-init="setApproot('');">
                        <img style="position: absolute; max-width: 95%;" id="zoom_03" src="{{image_default}}" data-zoom-image="{{image_default}}" ez-plus ezp-model="zoomModelGallery01" ezp-options="zoomOptionsGallery01" class="img-responsive" />
                    </div>
                </div>
                
                <div class="col-sm-6 col-lg-7 product-name">
                    
                    <div class="info" ng-hide="!result.product.description.length">
                        <p><b>Description</b></p>
                        <p ng-bind-html="result.product.description"></p>
                    </div>
                    <div class="info" ng-hide="!result.product.sizes.length">
                        <p><b>Sizes </b> <span ng-bind-html="result.product.sizes"></span></p>
                    </div> 
                    <div class="info">
                        <p><b>Design and Features</b></p>
                    </div>
                    <div id="gallery_01">
                        <a class="img-group-01" ng-repeat="image2 in imagesForGallery" ng-click="setActiveImageInGallery('zoomModelGallery01',image2);"
                           data-image="{{approot}}{{image2.small}}" data-zoom-image="{{approot}}{{image2.small}}" href="#">
                            <img ng-src="{{approot}}{{image2.small}}" style="width:55px" />
                        </a>
                    </div>
                    <div class="info" ng-hide="!price.length">
                        <p><b>Prices </b> <span ng-bind-html="newString"></span></p>
                    </div> 

                    <div class="info" ng-hide="!result.product.care_instructions.length">
                        <p><b>Care Instructions</b></p>
                        <p ng-bind-html="result.product.care_instructions"></p>
                    </div>  
                </div>

                <div id="product-reco" class="col-sm-12" ng-hide="!result.related_products.length">
                    <center>
                        <h2>You might also like</h2>   
                    </center>

                    <div class="row">
                        <ul class="product-grid">
                            <li class="col-sm-3 col-xs-6" ng-repeat="related_product in result.related_products">
                                <a href="#product/{{ result.category.cat_slug1 }}/{{ result.category.cat_slug2 }}/{{ related_product.slug }}">
                                    <div class="wrap">
                                        <img ng-src="uploads/img/{{ related_product.image }}" alt="{{ related_product.name }}" class="img-responsive">
                                    </div>
                                    <div class="caption">
                                        <h3 class="text-center">{{ related_product.name }}</h3>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>                    


            
<div class="clearfix"></div>

