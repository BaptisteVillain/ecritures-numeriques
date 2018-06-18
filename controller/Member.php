<?php

class Member extends Timber\Post
{

  var $_posts;
  public function posts()
  {
    $terms = $this->terms();
    foreach ($terms as $term) {
      if($term->parent !== 0){
        $this->_posts[] = $term;
      }
    }

    return $this->_posts;
  }


  /**
   * Array
   */
  var $_publications;
  public function publications()
  {
    if(!empty($this->publication_authors)){

      $this->_publications = new Timber\PostQuery(array(
        'post_type' => 'publication',
        'post__in' => $this->publication_authors
      ));

    }

    return $this->_publications;
  }

  /**
   * Array
   */
  var $_projects;
  public function projects()
  {
    if(!empty($this->project_authors)){

      $this->_projects = new Timber\PostQuery(array(
        'post_type' => 'project',
        'post__in' => $this->project_authors
      ));

    }

    return $this->_projects;
  }

  /**
   * Array
   */
  var $_events;
  public function events()
  {
    if(!empty($this->event_authors)){
      $this->_events = new Timber\PostQuery(array(
        'post_type' => 'event',
        'post__in' => $this->event_authors
      ));

    }

    return $this->_events;
  }


  private function setIndex()
  {
    $this->members = new Timber\PostQuery(array(
      'post_type' => 'member',
      'post_per_page' => -1
    ));

    $this->index = 0;

    foreach ($this->members as $key => $member) {
      if($member->slug == $this->slug){
        $this->index = $key;
      }
    }
  }

  var $_previous;
  public function previous()
  {

    $this->setIndex();

    if ($this->index > 0) {
      $this->_previous = $this->members[$this->index - 1];
    }
    else{
      $this->_previous = $this->members[count($this->members) - 1];
    }

    return $this->_previous;
  }

  var $_next;
  public function next($in_same_term = false)
  {

    $this->setIndex();

    if ($this->index < count($this->members) - 1) {
      $this->_next = $this->members[$this->index + 1];
    }
    else{
      $this->_next = $this->members[0];
    }

    return $this->_next;
  }
}
