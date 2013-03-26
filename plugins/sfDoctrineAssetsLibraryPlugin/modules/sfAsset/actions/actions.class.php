<?php

require_once dirname(__FILE__).'/../lib/BasesfAssetActions.class.php';

/**
 * sfAsset actions.
 * 
 * @package    sfDoctrineAssetsLibraryPlugin
 * @subpackage sfAsset
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
class sfAssetActions extends BasesfAssetActions
{
  protected function removeLayoutIfPopup(sfWebRequest $request)
  {
    if ($popup = $request->getParameter('popup'))
    {
      $this->getUser()->setAttribute('popup', $popup, 'sf_admin/sf_asset/navigation');
    }
    if  ($this->getUser()->hasAttribute('popup', 'sf_admin/sf_asset/navigation'))
    {
      $this->setLayout($this->getContext()->getConfiguration()->getTemplateDir('sfAsset', 'popupLayout.php') . DIRECTORY_SEPARATOR . 'popupLayout');
      $this->popup = true;
      // tinyMCE?
      $this->getResponse()->addJavascript('tiny_mce/tiny_mce_popup');
    }
    else
    {
      $this->popup = false;
    }
  }
}
