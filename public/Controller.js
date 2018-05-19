var app = angular.module('myApp', []);
app.controller('Controller', function($scope, $window) {
    $scope.var = 'default select value';
    $scope.textValue = '';
    $scope.myFunction = function () {
        $scope.textValue += ' ' + $scope.var;
    }
});

app.config(interpolateConfig);
function interpolateConfig($interpolateProvider) {
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
}