<div class="publication__card">
  <div class="card__surtitle">théorie de l'édition</div>
  <h4 class="card__title">{{ post.title }}</h4>
  {% if content %}
    <div class="card__subtitle">{{post.content | excerpt(41)}}</div>
  {% endif %}
  <div class="card__footer">
    <div class="card__author">Marcello Vitali-Rosati</div>
    <div class="card__source">
      <span class="card__italic">Sens public</span>
      <span> - 15 dec</span>
    </div>
  </div>
</div>