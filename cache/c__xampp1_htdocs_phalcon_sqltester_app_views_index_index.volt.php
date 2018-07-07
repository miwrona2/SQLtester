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
                    <?= $this->tag->form(['class' => 'form-group', 'ng-submit' => 'execute()']) ?>
                        <?= $executeForm->render('textarea', ['class' => 'form-control', 'placeholder' => 'Enter a database query or use buttons', 'ng-model' => 'textValue', 'name' => 'name']) ?>
                        <?= $executeForm->render('submit', ['class' => 'btn btn-success btn-fill']) ?>
                    <?= $this->tag->endForm() ?>
                    <button ng-click="clearWindow()" class="btn btn-warning">Wyczyść</button>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-fill btn-sm btn-danger" ng-click="getValueFromButton(button = 'SELECT')">SELECT</button>
                    <button class="btn btn-fill btn-sm btn-primary" ng-click="getValueFromButton(button ='*')">*</button>
                    <button class="btn btn-fill btn-sm" ng-click="getValueFromButton(button ='FROM')">FROM</button>
                    <button class="btn btn-fill btn-sm btn-warning" ng-click="getValueFromButton(button ='Book')">Book</button>
                    <button class="btn btn-fill btn-sm btn-success" ng-click="getValueFromButton(button ='WHERE')">Where</button>
                    <button class="btn btn-outline-dark" ng-click="getValueFromButton(button = query1)">{[{ query1 }]}</button>
                    <button class="btn btn-outline-dark" ng-click="getValueFromButton(button = query2)">{[{ query2 }]}</button>
                    <button class="btn btn-outline-dark" ng-click="getValueFromButton(button = query3)">{[{ query3 }]}</button>
                </div>
            </div>
            <table class="table table-striped" ng-init="getBooks()">
                <caption>Database table 'Book'</caption>
                <thead class="thead-dark">
                    <tr>
                        <th>Lp.</th>
                        <th>id</th>
                        <th>Tytuł</th>
                        <th>Autor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="(key, book) in books">
                        <th>{[{ key }]}</th>
                        <td>{[{ book.id }]}</td>
                        <td>{[{ book.title }]}</td>
                        <td>{[{ book.author }]}</td>
                    </tr>
                </tbody>
            </table>

            <table>
                <thead>
                    <tr>
                        <th ng-repeat="column in columns">{[{ column }]}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="row in sqlresults">
                        <td ng-repeat="column in columns">{[{ row[column] }]}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

        </div>
    </body>
</html>