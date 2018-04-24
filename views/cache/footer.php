<div class="footer__wrapper">
  <div class="footer__section wrapper__socials">
    <div class="icon">
      {{ footer.icon_svg }}
    </div>
    <ul class="socials_list">
      {% for social in footer.socials %}
        <li class="social">
          <a href="{{social.url}}" target="_blank">
            {{social.svg}}
          </a>
        </li>
      {% endfor %}
    </ul>
  </div>
  <div class="footer__section footer__description">
    <p>
      {{footer.description}}
    </p>
  </div>
  <div class="footer__section wrapper__contact">
    <h3>{{footer.contact_us}}</h3>
    <p>{{footer.phone_number}}</p>
    <p>{{footer.email}}</p>
    <p>{{footer.address}}</p>
  </div>
  <div class="footer__section wrapper__partners">
    {% for partner in footer.partners %}
      <a href="{{partner.url}}" title="{{partner.name}}" target="_blank">
        <div>
          <img src="{{partner.logo.sizes.medium_large}}" alt="{{partner.name}}">
        </div>
      </a>
    {% endfor %}
  </div>
  <div class="footer">
    <a href="#" target="_blank">{{footer.legal}}</a>
    <p>{{footer.copyright}}</p>
  </div>
</div>
