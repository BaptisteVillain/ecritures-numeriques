<?php

class Publication extends Timber\Post
{


  /**
   * Array
   */
  var $_authors;

  public function authors()
  {
    if(!empty($this->publication_authors)){
      $this->_authors = new Timber\PostQuery(array(
        'post_type' => 'member',
        'post__in' => $this->publication_authors
      ));
    }

    return $this->_authors;
  }

  /**
   * Array
   */
  var $_related;
  public function related()
  {
    if(!empty($this->relation_publication_publication)){

      $this->_related = new Timber\PostQuery(array(
        'post_type' => 'publication',
        'post__in' => $this->relation_publication_publication
      ));

    }

    return $this->_related;
  }
}
