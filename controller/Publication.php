<?php

class Publication extends Timber\Post
{


  /**
   * Array
   */
  var $_authors;

  public function authors() : array
  {
    $this->_authors = Timber::get_posts(array(
      'post_type' => 'member',
      'post__in' => $this->publication_authors
    ));

    return $this->_authors;
  }

  /**
   * Contributors
   */
  var $_contributors;

  /**
   * Timestamp
   */
  var $_date_creation;

  /**
   * String
   */
  var $_url;

  /**
   * Array
   */
  var $_related;
  public function related() : array
  {
    if(empty($this->relation_publication_publication)){
      return array();
    }

    $this->_related = Timber::get_posts(array(
      'post_type' => 'publication',
      'post__in' => $this->relation_publication_publication
    ));

    return $this->_related;
  }

  /**
   * Array
   */
  var $_tags;
  public function tags() : array
  {
    $taxonomies = get_taxonomies(array(
      'public' => true,
      '_builtin' => false
    ));
    $this->_tags = wp_get_post_terms($this->ID, $taxonomies);

    return $this->_tags;
  }

}
