<?php
/**
 * menu actions.
 *
 * @package    entrega
 * @subpackage menu
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class configComponents extends sfComponents
{
  public function executeSet()
  {
    // titulo del sitio
    $config       = Doctrine_Core::getTable('Config')->find('1'); 
    $this->titulo = $config->getTitle();
  }

  public function executeSite()
  {
    // sitio habilitado
    $config           = Doctrine_Core::getTable('Config')->find('1'); 
    $sitioHabilitado  = $config->getMessage();

    if($config->getEnabled() == 0){
      die("<h1>".$sitioHabilitado."</h1>");
    } 
  }

  public function executeStyle()
  {
    // estilo del sitio
    $config = Doctrine_Core::getTable('Config')->find('1'); 
    $this->style = $config->getStyle();
  }

}
