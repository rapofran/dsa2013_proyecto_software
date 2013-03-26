<?php

/**
 * portfolio actions.
 *
 * @package    sfMultipleAjaxUploadGallery
 * @subpackage portfolio
 * @author     leny bernard
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class portfolioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $q = Gallery::getAllGalleries();
    $this->galleries = $q->execute();

    // paginado:'Item',4 --> 4 por pagina
    $this->pager = new sfDoctrinePager('Gallery',ConfigTable::getCantItems());
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();      

  }

  public function executeShow(sfWebRequest $request)
  {
    $this->gallery = $this->getRoute()->getObject();
    $this->forward404Unless($this->gallery);
  }

}
