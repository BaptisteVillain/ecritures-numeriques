{% extends "base.twig" %}

{% block content %}
	<section class="home-section landing">
		<div class="landing__container">
			
		</div>
	</section>
	<section class="home-section events">
		<header class="section-header events__header">
			<h2 class="header__title">{{page.events_title}}</h2>
			<a href="#" class="header__link">{{page.events_see_more}} > </a>
		</header>
		<div class="section-container events__container">
			{% for post in highlighted_event %}
				{% include 'partials/card-event-highlighted.twig' %}
			{% endfor %}
			{% for post in events %}	
				{% include 'partials/card-event.twig' %}
			{% endfor %}
		</div>
		<footer class="section-footer events__footer">
			<a href="#" class="footer__link">{{page.events_see_more}} > </a>
		</footer>
	</section>
	<section class="home-section projects">
		<div class="projects__container">
			<header class="section-header projects__header">
				<h2 class="header__title">{{page.projects_title}}</h2>
				<a href="#" class="header__link">{{page.projects_see_more}} ></a>
			</header>
			{% for key, post in projects %}
				{% include 'partials/card-project.twig' %}			
			{% endfor %}
			<footer class="section-footer projects__footer">
				<a href="" class="footer__link">{{page.projects_see_more}} ></a>
			</footer>
		</div>
	</section>
	<section class="home-section publications">
		<div class="publications__container">
			<header class="section-header publications__header">
				<h2 class="header__title">{{page.publications_title}}</h2>
				<a href="#" class="header__link">{{page.publications_see_more}} ></a>
			</header>
			{% for key,post in publications[0:1] %}
			{% include 'partials/card-publication.twig' with {'content': true} %}				
			{% endfor %}
			<div class="publications__wrapper">
			{% for post in publications[1:] %}
				{% include 'partials/card-publication.twig' with {'content': false} %}				
			{% endfor %}
			</div>
			<footer class="section-footer publications__footer">
				<a href="" class="footer__link">{{page.publications_see_more}} ></a>
			</footer>
		</div>
	</section>
	<section class="home-section rubrics">
		<div class="rubrics__container">
			<div class="rubrics__lines">
				<div class="line"></div>
				<div class="line"></div>
				<div class="line"></div>
				<div class="line"></div>
				<div class="line"></div>
			</div>
			<header class="section-header rubrics__header">
				<h2 class="header__title">{{page.rubrics_title}}</h2>
				<a href="#" class="header__link">{{page.rubrics_see_more}} ></a>			
			</header>
			<ul class="rubrics__wrapper">
			{% for key,rubric in rubrics %}
				<li class="rubrics__item">
					<button class="item__button {% if key == 0 %}desktop-active{% endif %}">{{rubric[0].taxonomy}} <span>></span></button>
					<ul class="item__wrapper {% if key == 0 %}desktop-active{% endif %}">
						{% for item in rubric[0:19] %}
						<li class="rubrics__subItem">
							<a href="#">{{item.name}}</a>
						</li>
						{% endfor %}
					</ul>
				</li>
			{% endfor %}
				<li class="item__grid">
					{% for index in 0..19 %}
						<div></div>
					{% endfor %}
				</li>
			</ul>
			<footer class="section-footer rubrics__footer">
				<a href="" class="footer__link">{{page.rubriques_see_more}} ></a>
			</footer>
		</div>
	</section>
	<section class="home-section social">
		<div class="social__section social__youtube">
			<div class="social__header">
				<div class="header__label">youtube</div>
				<a href="#" class="header__icon" target="_blank">
					<svg aria-labelledby="simpleicons-youtube-icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title id="simpleicons-youtube-icon">YouTube icon</title><path class="a" d="M23.495 6.205a3.007 3.007 0 0 0-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 0 0 .527 6.205a31.247 31.247 0 0 0-.522 5.805 31.247 31.247 0 0 0 .522 5.783 3.007 3.007 0 0 0 2.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 0 0 2.088-2.088 31.247 31.247 0 0 0 .5-5.783 31.247 31.247 0 0 0-.5-5.805zM9.609 15.601V8.408l6.264 3.602z"/></svg></div>
				</a>
				<a href="https://www.youtube.com/watch?v={{ videos[0].id }}" class="video__highlight" target="_blank">
					<div class="video__thumbnail" style="background-image:url({{ videos[0].snippet.thumbnails.high.url }})">
						<div class="thumbnail__hover">
							<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="373.008px" height="373.008px" viewBox="0 0 373.008 373.008" style="enable-background:new 0 0 373.008 373.008;" xml:space="preserve"><path d="M61.792,2.588C64.771,0.864,68.105,0,71.444,0c3.33,0,6.663,0.864,9.655,2.588l230.116,167.2 c5.963,3.445,9.656,9.823,9.656,16.719c0,6.895-3.683,13.272-9.656,16.713L81.099,370.427c-5.972,3.441-13.334,3.441-19.302,0 c-5.973-3.453-9.66-9.833-9.66-16.724V19.305C52.137,12.413,55.818,6.036,61.792,2.588z"/></svg>
						</div>
					</div>
					<h3 class="video__title">{{ videos[0].snippet.title }}</h3>
					<p class="video__views">{{ videos[0].statistics.viewCount }} vues</p>
				</a>
			{% for key,video in videos[1:2] %}
				<a href="https://www.youtube.com/watch?v={{ video.id }}"class="youtube__video" target="_blank">
					<div class="video__thumbnail" style="background-image:url({{ video.snippet.thumbnails.high.url }})">
						<div class="thumbnail__hover">
							<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="373.008px" height="373.008px" viewBox="0 0 373.008 373.008" style="enable-background:new 0 0 373.008 373.008;" xml:space="preserve"><path d="M61.792,2.588C64.771,0.864,68.105,0,71.444,0c3.33,0,6.663,0.864,9.655,2.588l230.116,167.2 c5.963,3.445,9.656,9.823,9.656,16.719c0,6.895-3.683,13.272-9.656,16.713L81.099,370.427c-5.972,3.441-13.334,3.441-19.302,0 c-5.973-3.453-9.66-9.833-9.66-16.724V19.305C52.137,12.413,55.818,6.036,61.792,2.588z"/></svg>
						</div>
					</div>
					<div class="video__content">
						<h4 class="video__title">{{ video.snippet.title }}</h4>
						<p class="video__views">{{ video.statistics.viewCount }} vues</p>
					</div>
				</a>
			{% endfor %}
		</div>
		<div class="social__section social__twitter">
			<div class="social__header">
				<div class="header__label">twitter</div>
				<a href="#" class="header__icon" target="_blank">
					<svg aria-labelledby="simpleicons-twitter-icon" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title id="simpleicons-twitter-icon">Twitter icon</title><path d="M23.954 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.951.555-2.005.959-3.127 1.184-.896-.959-2.173-1.559-3.591-1.559-2.717 0-4.92 2.203-4.92 4.917 0 .39.045.765.127 1.124C7.691 8.094 4.066 6.13 1.64 3.161c-.427.722-.666 1.561-.666 2.475 0 1.71.87 3.213 2.188 4.096-.807-.026-1.566-.248-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63.961-.689 1.8-1.56 2.46-2.548l-.047-.02z"/></svg>
				</a>	
			</div>
			<div id="tweets">
  			{{function('do_shortcode', '[custom-twitter-feeds]')}}				
			</div>
		</div>
	</section>
{% endblock %}
