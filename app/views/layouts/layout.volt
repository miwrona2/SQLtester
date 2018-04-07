<html>
    <head>
        {% block head %}
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
        {% endblock %}

        <title>{% block title %}{% endblock %}</title>
    </head>

    <body class="bg-light">
        <div id="container">
            {% block content %}
            {% endblock %}
        </div>
    </body>
</html>