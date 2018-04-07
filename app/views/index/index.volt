{% extends 'layouts/layout.volt' %}


{% block title %}{{ title }}{% endblock %}


{% block content %}
    <div class="py-5 text-center">
        <h2>{{ heading }}</h2>
        <div class="row">
            <div class="col-md-12">
                <form action="#" class="form-group">
                    <div class="mb-3"><textarea name="query" id="" cols="30" rows="10"></textarea></div>
                    <div class="mb-3"><input type="submit" class="btn btn-primary btn-lg" value="Testuj"></div>
                </form>
            </div>
        </div>
    </div>
{% endblock %}