{% extends "base.twig" %}

{% block content %}
	{% include "partials/background-lines.twig" %}
	<div class="publication-wrapper">
		<div class="publication__discover-list">
			{% if discovers is not empty %}
				<h3 class="discover-list__title">découvrir aussi</h3>
			{% endif %}
			{% for publication in discovers %}
				<div class="discover-list__item">
					<p class="discover__research-field">{{publication.research_field.name}}</p>
					<h5 class="discover__title">{{publication.post_title}}</h5>
					<p class="discover__authors">
						{{publication.domain}},
						{% for key, author in publication.authors %}{% if key > 0 %}, {% endif %}{{author.post_title}}{% endfor %}
					</p>
				</div>
			{% endfor %}
		</div>
		<article class="publication">
			<p class="publication__research-field">{{research_field.name}}</p>
			<h2 class="publication__title">{{post.title}}</h2>
			<p class="publication__authors">Par
			{% for key, author in authors %}{% if key > 0 %}, {% endif %}{{author.post_title}}{% endfor %}
			</p>
			<p class="publication__date">Pubié le <span class="date__uppercase">[{{post.post_date | date('d M Y')}}]</span> {% if domain  %}sur {{domain}}{% endif %}</p>
			{% if domain %}
				<a href="{{post.url}}" class="publication__link" target="_blank">lire sur {{domain}} ></a>
			{% endif %}
			<p class="publication__content">{{post.content}}</p>
			{% if tags is not empty %}
				<ul class="publication__tags">
					{% for tag in tags%}
						<li class="tag">{{tag.name}}</li>
					{% endfor %}
				</ul>
			{% endif %}
			<div class="publication__transition"></div>
		</article>
	</div>
{% endblock %}
