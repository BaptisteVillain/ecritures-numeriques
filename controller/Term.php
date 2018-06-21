<?php

class Term extends Timber\Term
{

  /**
   * Array
   */
  var $_related;
  public function related()
  {
    $this->_related = array();

    $types = array('publication', 'project', 'event');
    foreach ($types as $key => $type) {

      $result = new Timber\PostQuery(array(
      'posts_per_page' => -1,
      'post_type' => $type,
      'tax_query' => array(
        array(
          'taxonomy' => $this->taxonomy,
          'field' => 'term_id',
          'terms' => $this->id
          )
        )
      ));

      if(!empty($result)){
        $this->_related[] = $result;
      }
    }

    return $this->_related;
  }

  private function setIndex()
  {

    $taxonomies = array('research_field', 'research_topic', 'key_concept', 'axis');

    $this->terms = Timber::get_terms(array(
      "taxonomy" => $taxonomies,
      "hide_empty" => false
    ));

    $this->index = 0;

    foreach ($this->terms as $key => $term) {
      if($term->slug == $this->slug){
        $this->index = $key;
      }
    }
  }


  var $_next;
  public function next()
  {

    $this->setIndex();

    if ($this->index < count($this->terms) - 1) {
      $this->_next = $this->terms[$this->index + 1];
    }
    else{
      $this->_next = $this->terms[0];
    }

    return $this->_next;
  }

  var $_previous;
  public function previous()
  {

    $this->setIndex();

    if ($this->index > 0) {
      $this->_previous = $this->terms[$this->index - 1];
    }
    else{
      $this->_previous = $this->terms[count($this->terms) - 1];
    }

    return $this->_previous;
  }
}
