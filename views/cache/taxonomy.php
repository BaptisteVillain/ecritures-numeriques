{% extends "base.twig" %}

{% block content %}
	{% include "partials/background-lines.twig" %}
	<div class="taxonomy__container">
		<header class="taxonomy__header">
			<a href="#" class="header__link">< retour aux rubriques</a>
			<h3 class="header__parent">concepts clés</h3>
			<h2 class="header__title">intermedialité</h2>
		</header>
		<div class="taxonomy__wrapper">
			<div class="taxonomy__about">
				<p>
					La notion d’intermédialité renvoie à une pluralité d’approches théoriques étudiant les relations entre les médias. Ces approches se rejoignent dans la primauté qu’elles accordent à la relation – qui vient ainsi avant les termes –, dans l’attention qu’elles portent à la matérialité de la médiation et, depuis quelques années, dans l’adoption de perspectives anti-essentialistes qui s’opposent à une conception des médias comme formes à l’identité fixe. L'intermédialité s'intéresse entre autres aux pratiques intermédiales, sans s'y limiter.
				</p>
				<ul class="taxonomy__count">
					<li>
						<h5>publications</h5>
						<p>3</p>
					</li>
					<li>
						<h5>projets</h5>
						<p>3</p>
					</li>
					<li>
						<h5>evenements</h5>
						<p>3</p>
					</li>
				</ul>
				<div class="taxonomy__discovers">
					<h4>découvrir aussi</h4>
					<ul>
						<li>Espace numérique</li>
						<li>Espace numérique</li>
						<li>Espace numérique</li>
					</ul>
				</div>
				<footer class="taxonomy__footer">
					<div class="footer__link">
						<p>previous</p>
						<a href="#">Imaginaire / Réel</a>
					</div>
					<div class="footer__link">
						<p>next</p>
						<a href="#">Imaginaire / Réel</a>
					</div>
				</footer>
			</div>
			<div class="taxonomy__related">
				<header class="related__header">
					<nav>
						<ul>
							<li class="header__item">
								<button class="header__button active" data-index="0">
									<p class="header__label">publications</p>
									<p class="title__count">7</p>
								</button>
							</li>
							<li class="header__item">
								<button class="header__button" data-index="1">
									<p class="header__label">projets</p>
									<p class="title__count">7</p>
								</button>
							</li>
							<li class="header__item">
								<button class="header__button" data-index="2">
									<p class="header__label">événements</p>
									<p class="title__count">7</p>
								</button>
							</li>
						</ul>
					</nav>
				</header>
				<div class="related__wrapper">
					<section class="related__section active">
						<div class="related__item">
							<h5 class="item__title">
								« The Writer is the Architect. Editorialization and the Production of Digital Space »
							</h5>
							<div class="item__about">
								<p class="item__author">Marcello Vitali-Rosati</p>
								<p class="item__date">[06-03-18] - Sens Public</p>
							</div>
						</div>
					</section>
					<section class="related__section">

					</section>
					<section class="related__section">
						<div class="related__item">
							<h5 class="item__title">
								« The Writer is the Architect. Editorialization and the Production of Digital Space »
							</h5>
							<div class="item__about">
								<p class="item__author">Marcello Vitali-Rosati</p>
								<p class="item__date">[06-03-18] - Sens Public</p>
							</div>
						</div>
						<div class="related__item">
							<h5 class="item__title">
								« The Writer is the Architect. Editorialization and the Production of Digital Space »
							</h5>
							<div class="item__about">
								<p class="item__author">Marcello Vitali-Rosati</p>
								<p class="item__date">[06-03-18] - Sens Public</p>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
{% endblock %}
