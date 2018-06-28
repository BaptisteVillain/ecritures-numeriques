<?php

class Project extends Timber\Post
{

  /**
   * Array
   */
  var $_authors;

  public function authors()
  {
    if(!empty($this->project_authors)){
      $this->_authors = new Timber\PostQuery(array(
        'post_type' => 'member',
        'posts_per_page' => -1,
        'post__in' => $this->project_authors
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
    if(!empty($this->relation_project_project)){

      $this->_related = new Timber\PostQuery(array(
        'post_type' => 'project',
        'posts_per_page' => -1,
        'post__in' => $this->relation_project_project
      ));

    }

    return $this->_related;
  }
}
