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
                    <tr>
                        <th>1</th>
                        <td>{{ book.getTitle() }}</td>
                        <td>{{ book.getAuthor() }}</td>
                    </tr>
                </tbody>
            </table>
            <p>
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Link with href
                </a>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Button with data-target
                </button>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                </div>
            </div>
        </div>
    </div>
{% endblock %}