<article class="tease tease-{{post.post_type}}" id="tease-{{post.ID}}">
	{% block content %}
		<h2><a href="{{post.link}}">{{post.title}}</a></h2>
		<p>{{post.get_preview}}</p>
		{% if post.get_thumbnail %}
			<img src="{{post.thumbnail.src}}" />
		{% endif %}
	{% endblock %}
</article>