var app = angular.module('myApp', []);
app.controller('Controller', function($scope, $http) {
    $scope.var = 'default select value';
    $scope.textValue = '';
    $scope.sqlresults = [];
    $scope.columns = [];
    $scope.myFunction = function () {
        $scope.textValue += ' ' + $scope.var;
    };
    $scope.execute = function() {
        $http({
            method : "POST",
            url : "index/execute",
            data: serialize({'queryString': $scope.textValue}),
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8',
                'X-Requested-With': 'XMLHttpRequest'
            }
        }).then(function mySuccess(response) {
            $scope.sqlresults = response.data.queryResult;
            $scope.columns = response.data.columns;
        }, function myError(response) {
        });

    };

    $scope.clearWindow = function () {
        $scope.textValue = '';
    }
});

function serialize(obj, prefix) {
    var str = [], p;
    for (p in obj) {
        if (obj.hasOwnProperty(p)) {
            var k = prefix ? prefix + "[" + p + "]" : p, v = obj[p];
            str.push((v !== null && typeof v === "object") ?
                serialize(v, k) :
                encodeURIComponent(k) + "=" + encodeURIComponent(v));
        }
    }
    return str.join("&");
}

app.config(interpolateConfig);
function interpolateConfig($interpolateProvider) {
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
}