<?php

  add_filter('timber/twig', 'add_filters');
  function add_filters($twig)
  {
    $twig->addFilter(new Twig_SimpleFilter('join_authors', 'join_authors'));
    $twig->addFilter(new Twig_SimpleFilter('join_terms', 'join_terms'));

    return $twig;
  }


  function join_authors($authors) : string
  {
    $result = '';

    if((is_array($authors) || is_object($authors)) && !empty($authors)){
      foreach ($authors as $key => $author) {
        $result .=  $key > 0 ? ', '.$author->post_title : $author->post_title;
      }
    }

    return $result;
  }

  function join_terms($terms) : string
  {
    $result = '';
    if((is_array($terms) || is_object($terms)) && !empty($terms)){
      foreach ($terms as $key => $term) {
        $result .=  $key > 0 ? ' - '.$term->name : $term->name;
      }
    }

    return $result;
  }