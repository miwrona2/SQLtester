{% extends 'layouts/layout.volt' %}


{% block title %}{{ title }}{% endblock %}


{% block content %}
    <div class="container">
        <div class="py-5 px-5 text-center">
            <h2>{{ heading }}</h2>
                <form action="#" class="form-group">
                    <div class="mb-3"><textarea name="query" id="777" cols="30" rows="10"></textarea></div>
                    <div class="mb-3"><input type="submit" class="btn btn-primary btn-lg" value="Testuj" data-toggle="collapse" data-target="#collapseResult"></div>
                </form>
            <div class="collapse" id="collapseResult">
                <div class="card card-body">
                    Result of query...
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