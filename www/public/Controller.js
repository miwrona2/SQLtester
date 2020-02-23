var app = angular.module('myApp', []);
app.controller('Controller', function($scope, $http) {
    $scope.buton = '';

    $scope.query1 = 'SELECT * FROM Book';
    $scope.query2 = 'INSERT INTO Book (title, author) VALUES (\'book_title\', \'Name_Surname\')';
    $scope.query3 = 'DELETE FROM Book WHERE title = \'book_title\'';
    $scope.query4 = ' SELECT * FROM Book b join Genre g on b.genre_id = g.id where g.id = 3';
    $scope.query5 = 'SELECT *\n' +
        'FROM book\n' +
        '         LEFT JOIN genre ON book.id = genre.id\n' +
        'UNION\n' +
        'SELECT *\n' +
        'FROM book\n' +
        '         RIGHT JOIN genre ON book.id = genre.id;\n';
    $scope.textValue = '';
    $scope.sqlresults = [];
    $scope.columns = [];
    $scope.books = [];
    $scope.genres = [];
    $scope.getValueFromButton = function () {
        $scope.textValue += ' ' + $scope.button;
    };
    $scope.getBooks = function() {
        $http({
            method : "GET",
            url : "index/get-books",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8',
                'X-Requested-With': 'XMLHttpRequest'
            }
        }).then(function (response) {
            $scope.books = response.data.books;

        }, function (response) {
        });
    };

    $scope.getGenres = function() {
        $http({
            method : "GET",
            url : "index/get-genres",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8',
                'X-Requested-With': 'XMLHttpRequest'
            }
        }).then(function (response) {
            $scope.genres = response.data.genres;
        }, function (response) {
            alert('error getGenres');
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
        }).then(function (response) {
            $scope.sqlresults = response.data.queryResult;
            $scope.columns = response.data.columns;
            if (response.data.status == 'success') {
                $.notify({
                    message: response.data.message
                }, {
                    type: 'success',
                    delay: 5000,
                    placement: {
                        align: "left"
                    },
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    }
                });
            } else {
                $.notify({
                    message: response.data.message
                }, {
                    type: 'warning',
                    delay: 5000,
                    placement: {
                        align: "center"
                    },
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    }
                });
            }

        }, function errorCallback(response){
            $.notify({
                message: 'An error occurred'
            },{
                type: 'warning',
                delay: 5000,
                placement: {
                    align: "center"
                },
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                }
            });
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