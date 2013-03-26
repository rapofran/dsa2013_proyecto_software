<?php

/**
 * site actions.
 *
 * @package    rugby
 * @subpackage menu
 * @author     Frank y Tinchox
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class menuActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->news = Doctrine_Core::getTable('Item')->getItemsByType('1');
  }

}
