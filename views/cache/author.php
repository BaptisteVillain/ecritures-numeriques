{% extends "base.twig" %}

{% block content %}
	{% for post in posts %}
		{% include ["tease-"~post.post_type~".twig", "tease.twig"] %}
	{% endfor %}
{% endblock %}