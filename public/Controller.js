var app = angular.module('myApp', []);
app.controller('Controller', function($scope, $http) {
    $scope.buton = '';

    $scope.query1 = 'SELECT * FROM Book';
    $scope.query2 = 'INSERT INTO Book (title, author) VALUES (\'book_title\', \'Name_Surname\')';
    $scope.query3 = 'DELETE FROM Book WHERE title = \'book_title\'';
    $scope.textValue = '';
    $scope.sqlresults = [];
    $scope.columns = [];
    $scope.books = [];
    $scope.getValueFromButton = function () {
        $scope.textValue += ' ' + $scope.button;
    };
    $scope.getBooks = function() {
        $http({
            method : "POST",
            url : "index/get-books",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8',
                'X-Requested-With': 'XMLHttpRequest'
            }
        }).then(function mySuccess(response) {
            $scope.books = response.data.books;

        }, function myError(response) {
        });
    };

    $scope.clearWindow = function () {
        $scope.textValue = '';
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
            $scope.getBooks();

        }, function myError(response) {
        });

    };

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