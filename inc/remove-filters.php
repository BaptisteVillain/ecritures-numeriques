<?php

remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');
remove_filter('term_description','wpautop');

function acf_replace_p($content) {
  $content = preg_replace("/<p[^>]*?>/", "", $content);
  $content = str_replace("</p>", "<br />", $content);

  return $content;
}

function acf_wrapp_ytb($content) {
  $content = str_replace("<iframe", '<div class="content__youtube"><iframe', $content);
  $content = str_replace("</iframe>", '</iframe></div>', $content);

  return $content;
}

function acf_wysiwyg(){
  add_filter('acf_the_content', 'acf_wrapp_ytb');
  add_filter('acf_the_content', 'acf_replace_p');  
}
add_action('acf/init', 'acf_wysiwyg', 15);
