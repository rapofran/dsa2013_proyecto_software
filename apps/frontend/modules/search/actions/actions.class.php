<?php

class searchActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {
    $this->search = $request->getParameter('searchinput');
  
    if ($this->search != '') {

      $query_search = '%'.$this->search.'%';
    
      $this->items = Doctrine_Core::getTable('Item')->getItemsBySearch($query_search);

      $this->matches = Doctrine_Core::getTable('Match')->getMatchesBySearch($query_search);

      $this->members = Doctrine_Core::getTable('Member')->getMembersBySearch($query_search);
    }
  }

}
