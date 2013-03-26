<?php

/**
 * rss actions.
 *
 * @package    rugby
 * @subpackage rss
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class rssActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    // obtenemos los ultimos articulos de cada tipo
    $this->news_rss   = Doctrine_Core::getTable('Item')->getItemsWithRSS('1','4');
    $this->events_rss = Doctrine_Core::getTable('Item')->getItemsWithRSS('2','4');
  }
}
