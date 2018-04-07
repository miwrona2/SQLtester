<html>
<head>
    {% block head %}
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    {% endblock %}

    <title>{% block title %}{% endblock %} - My Webpage</title>
</head>

<body>
<div id="content">{% block content %}{% endblock %}</div>

<div id="footer">
    {% block footer %}&copy; Copyright 2015, All rights reserved.{% endblock %}
</div>
</body>
</html>