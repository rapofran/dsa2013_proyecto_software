<?php

/**
 * contactUs actions.
 *
 * @package    rugby
 * @subpackage contactUs
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactUsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    // obtenemos toda la info de la base
    $this->stuff = Doctrine_Core::getTable('Stuff')->find('1'); 
  }
}
