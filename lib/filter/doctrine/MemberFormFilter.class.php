<?php

/**
 * Member filter form.
 *
 * @package    rugby
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MemberFormFilter extends BaseMemberFormFilter
{
  public function configure()
  {
     parent::setUp();
     unset($this['url_picture'],$this['email'],$this['celphone'],$this['telephone']);
  }
}
