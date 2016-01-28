(function(){
	var app= angular.module("europa",[]);
		
	app.controller('ciudadesController',function ($scope,$http) {
		    $http.get("europajson.php").success(function(data) {
				$scope.ciudades = data;
			});
	});
	
})();