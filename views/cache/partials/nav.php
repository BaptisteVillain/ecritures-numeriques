<button class="nav__trigger">
	<span></span>
	<span></span>
	<span></span>
</button>
<nav class="site-header__nav" role="navigation">
	<ul class="nav__wrapper">
	{% for item in menu.get_items %}
		<li class="nav__item {{item.classes | join(' ')}}">
			<a class="item__link {% if item.get_children %} drop__trigger {% endif %}" href="{{item.link}}">{{item.title}}</a>
			{% if item.get_children %}
				<ul class="item__drop">
				{% for child in item.get_children %}
					<li class="drop__item">
						<a class="drop__link" target="_blank" href="{{child.get_link}}">{{child.title}}</a>
					</li>
				{% endfor %}
				</ul>
			{% endif %}
		</li>
	{% endfor %}
	{% for item in language.get_items %}
		<li>
			<a href="{{item.link}}">{{ item.title }}</a>
		</li>
	{% endfor %}
	</ul>
</nav><!-- /.nav-main -->
