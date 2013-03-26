<?php

require_once dirname(__FILE__).'/../lib/memberGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/memberGeneratorHelper.class.php';

/**
 * member actions.
 *
 * @package    rugby
 * @subpackage member
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class memberActions extends autoMemberActions
{
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
    
    $directory = sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'members';
    $elem = $directory.DIRECTORY_SEPARATOR.$this->getRoute()->getObject()->getUrlPicture();
    if ($this->getRoute()->getObject()->delete())
    {
      unlink($elem);   
      $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
    }

    $this->redirect('@member');
  }

}

