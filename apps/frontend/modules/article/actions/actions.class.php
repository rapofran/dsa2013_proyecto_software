<?php

class articleActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {
    $this->article = Doctrine_Core::getTable('Item')->find($request->getParameter('id'));
    $this->article->saveClick($this->article);
  }

}
