{% extends "base.twig" %}

{% block content %}
	<div class="content-wrapper">
		<article class="post-type-{{post.post_type}}" id="post-{{post.ID}}">
			<section class="article-content">
				<h1 class="article-title">{{post.title}}</h1>
				<p class="blog-author">
					<span>By</span><a href="{{post.author.path}}"> {{ post.author.name }} </a><span>&bull;</span> {{ post.post_date|date}}
				</p>
			</section>
			<section class="comments">
				<div class="respond">
					<h3 class="h2">Comments</h3>
					{{ comment_form }}
				</div>
				<div class="responses">
					{% for cmt in post.get_comments() %}
						{% include "comment.twig" with { comment:cmt } %}
					{% endfor %}
				</div>
			</section>
		</article>
	</div><!-- /content-wrapper -->
{% endblock %}
