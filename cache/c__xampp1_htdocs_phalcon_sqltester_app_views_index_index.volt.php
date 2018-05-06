<html>
    <head>
        
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        

        <title><?= $title ?></title>
    </head>

    <body class="bg-light">
        <div id="container">
            
    <div class="container">
        <div class="py-5 px-5 text-center" ng-app="">
            <h2><?= $heading ?></h2>
                <form action="#" class="form-group">
                    <div class="mb-3"><textarea name="query" id="777" cols="30" rows="10" ng-model="name"></textarea></div>
                    <div class="mb-3"><input type="submit" class="btn btn-primary btn-lg" value="Testuj" data-toggle="collapse" data-target="#collapseResult"></div>
                </form>
            <div class="collapse" id="collapseResult">
                <p ng-bind="name"></p>
                <div class="card card-body">
                    Result of query...
                    <?= var_dump($data) ?>
                </div>
            </div>
            <table class="table table-striped">
                <caption>Example database table</caption>
                <thead class="thead-dark">
                    <tr>
                        <th>Lp.</th>
                        <th>Tytuł</th>
                        <th>Autor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book) { ?>
                        <tr>
                            <th>1</th>
                            <td><?= $book->getTitle() ?></td>
                            <td><?= $book->getAuthor() ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

        </div>
    </body>
</html>