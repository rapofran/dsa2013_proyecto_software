<?php

/**
 * Item form.
 *
 * @package    rugby
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ItemForm extends BaseItemForm
{
  public function configure()
  {
    // eliminamos los campos created_at y updated_at de los formularios
    // y las validaciones del modelo
    unset($this->widgetSchema['created_at']);
    unset($this->validatorSchema['created_at']);
    unset($this->widgetSchema['updated_at']);
    unset($this->validatorSchema['updated_at']);

    // sacamos el sf_guard_user_id
    unset($this->widgetSchema['sf_guard_user_id']);
    unset($this->validatorSchema['sf_guard_user_id']);

    // sacamos el campo click
    unset($this->widgetSchema['click']);
    unset($this->validatorSchema['click']);

    $this->widgetSchema['short_description']    = new sfWidgetFormTextarea(array(),array( 'cols' => 100,'rows' => 5));
    $this->validatorSchema['short_description'] = new sfValidatorString(array('max_length' => 150, 'required' => true));
    $this->validatorSchema['title']             = new sfValidatorString(array('max_length' => 100, 'required' => true));
  }
}
