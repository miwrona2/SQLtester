{% extends 'layouts/layout.volt' %}


{% block title %}{{ title }}{% endblock %}


{% block content %}
    <div class="container" ng-app="myApp" ng-controller="Controller">
        <div class="py-5 px-5 text-center">
            <h2>{{ heading }}</h2>
            <div class="row">
                <div class="col-md-10">
                    {{ form('class' : 'form-group') }}
                        {{ executeForm.render('textarea', ['class' : 'form-control', 'placeholder' : 'Enter a database query or use buttons', 'ng-value' : 'textValue']) }}
                        {{ executeForm.render('submit', ['class' : 'btn btn-success btn-fill']) }}
                    {{ end_form }}
                </div>
                <div class="col-md-2">
                    <button class="btn btn-fill btn-sm btn-danger" ng-click="myFunction(var ='SELECT')">SELECT</button>
                    <button class="btn btn-fill btn-sm btn-primary" ng-click="myFunction(var ='*')">*</button>
                    <button class="btn btn-fill btn-sm" ng-click="myFunction(var ='FROM')">FROM</button>
                    <button class="btn btn-fill btn-sm btn-warning" ng-click="myFunction(var ='Book')">Book</button>
                    <button class="btn btn-fill btn-sm btn-success" ng-click="myFunction(var ='Where')">Where</button>
                    <button class="btn btn-sm btn-light" ng-click="myFunction(var ='SELECT * FROM Book')">SELECT * FROM Book</button>
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
                    {% for book in books %}
                        <tr>
                            <th>1</th>
                            <td>{{ book.getTitle() }}</td>
                            <td>{{ book.getAuthor() }}</td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>
    </div>
{% endblock %}