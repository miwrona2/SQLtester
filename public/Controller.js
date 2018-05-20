var app = angular.module('myApp', []);
app.controller('Controller', function($scope, $http) {
    $scope.var = 'default select value';
    $scope.textValue = '';
    $scope.myFunction = function () {
        $scope.textValue += ' ' + $scope.var;
    };
    $scope.execute = function() {
        $http({
            method : "POST",
            url : "index/execute",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8',
                'X-Requested-With': 'XMLHttpRequest'
            }
        }).then(function mySuccess(response) {
            console.log(response.data.message);
        }, function myError(response) {
            console.log('error11111');
        });

    };
});

app.config(interpolateConfig);
function interpolateConfig($interpolateProvider) {
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
}