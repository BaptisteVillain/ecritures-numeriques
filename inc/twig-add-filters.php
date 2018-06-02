<?php

  add_filter('timber/twig', 'add_filters');
  function add_filters($twig)
  {
    $twig->addFilter(new Twig_SimpleFilter('join_authors', 'join_authors'));
    return $twig;
  }


  function join_authors($authors) : string
  {
    $result = '';

    foreach ($authors as $key => $author) {
      $result .=  $key > 0 ? ', '.$author->post_title : $author->post_title;
    }

    return $result;
  }