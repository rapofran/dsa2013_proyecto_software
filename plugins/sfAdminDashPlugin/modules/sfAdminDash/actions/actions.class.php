<?php
require_once(dirname(__FILE__).'/../lib/BasesfAdminDashActions.class.php');

/**
 * sfAdminDash actions.
 *
 * @package    plugins
 * @subpackage sfAdminDash
 * @author     kevin
 * @version    SVN: $Id: actions.class.php 25203 2009-12-10 16:50:26Z Crafty_Shadow $
 */ 
class sfAdminDashActions extends BasesfAdminDashActions
{
  public function executeBack(sfWebRequest $request){
    sfApplicationConfiguration::getActive()->loadHelpers(array('Url'));    
    //$this->redirect(sfConfig::get('sf_web_dir').DIRECTORY_SEPARATOR.'index.php');
    $this->redirect(public_path ('index.php'));
  }
}
