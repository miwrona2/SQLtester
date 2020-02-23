{% extends 'layouts/layout.volt' %}


{% block title %}{{ title }}{% endblock %}


{% block content %}
    <div class="container" ng-app="myApp" ng-controller="Controller">
        <div class="py-5 px-5 text-center">
            <h2>{{ heading }}</h2>
            <div class="row">
                <div class="col-md-10">
                    {{ form('class' : 'form-group', 'ng-submit' : 'execute()') }}
                        {{ executeForm.render('textarea', ['class' : 'form-control', 'placeholder' : 'Enter a database query or use buttons', 'ng-model': 'textValue', 'name' : 'name']) }}
                        {{ executeForm.render('submit', ['class' : 'btn btn-success btn-fill']) }}
                    {{ end_form() }}
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
                    <button class="btn btn-outline-dark" ng-click="getValueFromButton(button = query4)">{[{ query4 }]}</button>
                    <button class="btn btn-outline-dark" style="white-space: pre" ng-click="getValueFromButton(button = query5)">{[{ query5 }]}</button>
                </div>
            </div>
            {% include 'index/includes/results.volt' %}
            {% include 'index/includes/predefined_tables.volt' %}
        </div>
    </div>
{% endblock %}