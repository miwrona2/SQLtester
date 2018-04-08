{% extends 'layouts/layout.volt' %}


{% block title %}{{ title }}{% endblock %}


{% block content %}
    <div class="container">
        <div class="py-5 px-5 text-center">
            <h2>{{ heading }}</h2>
                <form action="#" class="form-group">
                    <div class="mb-3"><textarea name="query" id="" cols="30" rows="10"></textarea></div>
                    <div class="mb-3"><input type="submit" class="btn btn-primary btn-lg" value="Testuj"></div>
                </form>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>Lp.</th>
                        <th>Tytuł</th>
                        <th>Autor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>{{ book.getTitle() }}</td>
                        <td>{{ book.getAuthor() }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
{% endblock %}