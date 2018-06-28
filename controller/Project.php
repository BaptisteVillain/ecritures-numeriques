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
        'posts_per_page' => 3,
        'post__in' => $this->relation_project_project
      ));

    }

    return $this->_related;
  }


  private function setIndex()
  {

    $this->projects = new Timber\PostQuery(array(
      'post_type' => 'project',
      'posts_per_page' => -1,
    ));

    $this->index = 0;

    foreach ($this->projects as $key => $project) {
      if($project->slug == $this->slug){
        $this->index = $key;
      }
    }
  }


  var $_next_post;
  public function next_post()
  {

    $this->setIndex();

    if ($this->index < count($this->projects) - 1) {
      $this->_next_post = $this->projects[$this->index + 1];
    }
    else{
      $this->_next_post = $this->projects[0];
    }

    return $this->_next_post;
  }

  var $_previous_post;
  public function previous_post()
  {

    $this->setIndex();

    if ($this->index > 0) {
      $this->_previous_post = $this->projects[$this->index - 1];
    }
    else{
      $this->_previous_post = $this->projects[count($this->projects) - 1];
    }

    return $this->_previous_post;
  }
}
