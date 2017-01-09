var app = angular.module('myApp', ['ngRoute','home-directives', 'ngSanitize', 'updateMeta', 'ezplus', 'fancyboxplus', 'ui.bootstrap']);

app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : BASE_URL + "front/home",
        controller: 'homeCtrl'
    }).
    when("/about-us", {
        templateUrl : BASE_URL + "front/about",
        controller: 'aboutCtrl'
    }).
    when('/category/:category/', {
        templateUrl: BASE_URL + 'front/category',
        controller: 'productCategoryCtrl',
    }).
    when('/category/:category/:subcategory/', {
        templateUrl: BASE_URL + 'front/subcategory',
        controller: 'productSubCategoryCtrl'
    }).
    when('/product/:category/:subcategory/:product', {
        templateUrl: BASE_URL + 'front/product',
        controller: 'productCtrl'
    }).
    when('/collection/:slug/', {
        templateUrl: BASE_URL + 'front/collection',
        controller: 'collectionCategoryCtrl',
    }).
    when('/search/:slug/', {
        templateUrl: BASE_URL + 'front/search',
        controller: 'searchResultCtrl',
    }).
    otherwise({
        redirectTo: '/'
    });
});

app.controller('CategoryController', ['$http',function($http){
    var parent_categories = this;
    parent_categories.category = [];

    $http.get(BASE_URL + 'rest/parent_categories').success(function(data){ 
        parent_categories.category = data;
    });
}]);

app.controller('productCategoryCtrl', function($scope, $http, $routeParams, $location){
    $http.get(BASE_URL + 'rest/category/' + $routeParams.category ).success(function(data){ 
        $scope.result = data;
    });    
});

app.controller('productSubCategoryCtrl', function($scope, $http, $routeParams){
    $http.get(BASE_URL + 'rest/subcategory/' + $routeParams.category  + '/' + $routeParams.subcategory).success(function(data){ 
        $scope.result = data;
        console.log(data);
    });    
});

app.controller('productCtrl', function($scope, $http, $routeParams){
    $scope.imagesForGallery = [];
    $http.get(BASE_URL + 'rest/product/' + $routeParams.category  + '/' + $routeParams.subcategory + '/' + $routeParams.product ).success(function(data){
        $scope.result = data;
        $scope.price = data.product.price;

        var oldString = "Dozen S-L - P477.00, XL - P513.00; 6-Pack S-L - P269.75, XL - P289.75";
        var str=oldString.replace(/;/g,"<br />");
        $scope.newString= str;


        $scope.imagesForGallery = data.product_images2;
        $scope.zoomModel1 = data.product_images2[0];
        $scope.zoomModelGallery01 = data.product_images2[0];
        $scope.image_default = data.product_images2[0].small;
    });
    
    /*$scope.mouseOver = function (image) {
        $scope.image = image;
    }; */

    $scope.setApproot = function(appRoot) {
        $scope.approot = appRoot;
    };

    //default
    $scope.setApproot('');

    $scope.zoomOptionsGallery01 = {
        zoomWindowWidth: 280,
        zoomWindowHeight: 280,
        scrollZoom: true,
        easing: true,
        initial: 'small',
        gallery: 'gallery_01',
        cursor: 'pointer',
        galleryActiveClass: "active",
        imageCrossfade: true,
        loadingIcon: false
    };
   
    $scope.setActiveImageInGallery = function (prop, img) {
        $scope[prop] = img;
    };
});

app.controller('collectionCategoryCtrl', function($scope, $http, $routeParams){
    $http.get(BASE_URL + 'rest/collection/' + $routeParams.slug ).success(function(data){ 
        $scope.result = data;
        $scope.filteredProducts = [], $scope.currentPage = 1, $scope.numPerPage = 9, $scope.maxSize = 3;
        $scope.$watch('currentPage + numPerPage', function() {
            var begin = (($scope.currentPage - 1) * $scope.numPerPage), end = begin + $scope.numPerPage;
            $scope.filteredProducts = $scope.result.products.slice(begin, end);
        });
    });    
});

app.controller('homeCtrl', function($scope, $http, $routeParams){
    $http.get(BASE_URL + 'rest/home').success(function(data){ 
        $scope.result = data;
    });
});

app.controller('aboutCtrl', function($scope, $http, $routeParams){
    $http.get(BASE_URL + 'rest/about').success(function(data){ 
        $scope.result = data;
    });
});

app.controller('CategoryController', ['$http',function($http){
    var parent_categories = this;
    parent_categories.category = [];

    $http.get(BASE_URL + 'rest/parent_categories').success(function(data){ 
        parent_categories.category = data;
    });
}]);

app.controller('searchCtrl', function($scope, $http, $window){
    $scope.SendHttpPostData = function () {
        $window.location.href = '#search/' + $scope.keywords;
    }    
});

app.controller('searchResultCtrl', function($scope, $http, $routeParams){
    $scope.search = $routeParams.slug;
    console.log($routeParams.slug);
    $http.get(BASE_URL + 'rest/search/' + $routeParams.slug ).success(function(data){ 
        $scope.result = data;
    });    
});

