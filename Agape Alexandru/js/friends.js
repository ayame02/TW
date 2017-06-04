var app =angular.module('friends', [
	'ngRoute',
	'app.controllers'
	])

.config(['$routeProvider',function($routeProvider){

			$routeProvider
			.when('/',{
				templateUrl: 'views/friends-list.html',
				controller: 'friendsList'

			})
			.when('/friend/:id',{
				templateUrl: 'views/friend.html',
				controller: 'friend'

			})
			.otherwise({
				redirectTo: '/'
			});
		}]);
