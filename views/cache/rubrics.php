{% extends "base.twig" %}

{% block content %}
	{% include "partials/background-lines.twig" %}
  <div class="page-rubrics rubrics__container">
    <div class="rubrics__header">
      <h2>Rubriques</h2>
      <p>
        La Chaire aborde 32 thèmes au travers de ses travaux. <br/>
        Découvrez ces thématiques et parcourez les publications, projets et événements liés.
      </p>
    </div>
    <ul class="rubrics__wrapper">
    {% for key,rubric in rubrics %}
      <li class="rubrics__item">
        <button class="item__button">{{rubric[0].taxonomy}} <span>></span></button>
        <ul class="item__wrapper">
          {% for item in rubric[0:19] %}
          <li class="rubrics__subItem">
            <a href="#">{{item.name}}</a>
          </li>
          {% endfor %}
        </ul>
      </li>
    {% endfor %}
    </ul>
  </div>
{% endblock %}
