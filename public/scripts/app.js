//Create app module variable
var openlogix = angular.module('openlogix',
				[
				'ngResource',
        'ngRoute',
				'ui.bootstrap'
				]);

openlogix.config(function($routeProvider){
  $routeProvider
      .when('/', {
        templateUrl: '/views/index.html'
      });
});
