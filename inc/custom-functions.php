<?php

function term_link($term){

  $url = get_site_url().'/rubriques/'.$term->slug;

  return $url;
}