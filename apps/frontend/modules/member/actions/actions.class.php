<?php

/**
 * member actions.
 *
 * @package    rugby
 * @subpackage member
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class memberActions extends sfActions
{

  public function executeShow(sfWebRequest $request)
  {
    $this->member = Doctrine_Core::getTable('Member')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->member);
  }

}
