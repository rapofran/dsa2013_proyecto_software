<?php

/**
 * site actions.
 *
 * @package    rugby
 * @subpackage menu
 * @author     Frank y Tinchox
 * @version    SVN: $Id: components.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class menuComponents extends sfComponents
{
      
  // devuelve las ultimas 4 noticias ordenadas por la fecha de modificacion, noticias es type_id = 1
  public function executeMenuNews()
  {
    $this->menu_news = Doctrine_Core::getTable('Item')->getItemsByType('1','4');
  }

  // devuelve los ultimos 4 eventos ordenados por la fecha de modificacion, eventos es type_id = 2
  public function executeMenuEvents()
  {
    $this->menu_events = Doctrine_Core::getTable('Item')->getItemsByType('2','4');
  }

}
