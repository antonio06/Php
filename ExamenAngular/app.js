(function () {
    var app = angular.module("productos", []);
    app.controller('productosController', function ($scope, $http) {
        $scope.categorias = [];
        $http.get("categorias.json").success(function (data) {
            $scope.categorias = data;
        });
    });
})();

