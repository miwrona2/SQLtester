<html>
    <head>
        
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

            <script src="Controller.js"></script>
        

        <title><?= $title ?></title>
    </head>

    <body class="bg-light">
        <div id="container">
            
    <div class="container" ng-app="myApp" ng-controller="Controller">
        <div class="py-5 px-5 text-center">
            <h2><?= $heading ?></h2>
            <div class="row">
                <div class="col-md-10">
                    <?= $this->tag->form(['class' => 'form-group']) ?>
                        <?= $executeForm->render('textarea', ['class' => 'form-control', 'placeholder' => 'Enter a database query or use buttons', 'ng-value' => 'textValue']) ?>
                        <?= $executeForm->render('submit', ['class' => 'btn btn-success btn-fill', 'ng-click="execute()"']) ?>
                    <?= $this->tag->endForm() ?>
                    <button ng-click="clearWindow()" class="btn btn-warning">Wyczyść</button>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-fill btn-sm btn-danger" ng-click="myFunction(var ='SELECT')">SELECT</button>
                    <button class="btn btn-fill btn-sm btn-primary" ng-click="myFunction(var ='*')">*</button>
                    <button class="btn btn-fill btn-sm" ng-click="myFunction(var ='FROM')">FROM</button>
                    <button class="btn btn-fill btn-sm btn-warning" ng-click="myFunction(var ='Book')">Book</button>
                    <button class="btn btn-fill btn-sm btn-success" ng-click="myFunction(var ='Where')">Where</button>
                    <button class="btn btn-outline-dark" ng-click="myFunction(var ='SELECT * FROM Book')">SELECT * FROM Book</button>
                </div>
            </div>
            <table class="table table-striped">
                <caption>Database table 'Book'</caption>
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
            <div>
                <button ng-click="execute()" class="btn btn-danger">execute</button>
            </div>
        </div>
    </div>

        </div>
    </body>
</html>