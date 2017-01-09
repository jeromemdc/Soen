var app = angular.module('home-directives', []);

app.directive("headerContainer", function() {
    return {
        restrict: 'E',
        templateUrl: BASE_URL + 'front/header_container'
    };
});

app.directive("footerContainer", function() {
    return {
        restrict: 'E',
        templateUrl: BASE_URL + 'front/footer_container'
    };
});

app.directive("fitQuiz", function() {
	return {
  		restrict: 'E',
  		templateUrl: BASE_URL + 'front/fit_quiz'
	};
});

app.directive("metaContainer", function() {
    return {
        restrict: 'E',
        templateUrl: BASE_URL + 'front/meta'
    };
});

