<?php

/**
 * new actions.
 *
 * @package    rugby
 * @subpackage new
 * @author     Frank, Tincho
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $q          = Doctrine_Core::getTable('Item')->getQueryItemsByType('1');
    $this->news = $q->execute();

    // paginado:'Item',4 --> 4 por pagina
    $this->pager = new sfDoctrinePager('Item',ConfigTable::getCantItems());
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }

}
