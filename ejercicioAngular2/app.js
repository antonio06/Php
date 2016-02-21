(function () {
    var app = angular.module("musica", []);

    app.controller('artistasController', function ($scope, $http) {
        $http.get("musicajson.php").success(function (data) {
            $scope.artistas = data;
        });

    });

})();




