<?php

/**
 * Member form.
 *
 * @package    rugby
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */

class MemberForm extends BaseMemberForm
{
  public function configure()
  {  

    //campo date modificacion para mostrar en formato argentina y con datapicker de jquery
    $format = '%day%/%month%/%year%';
    $date = new sfWidgetFormDate(array('format' => $format));
    $this->widgetSchema['birthday'] = new sfWidgetFormJQueryDate(array(
      'config' => '{}','image' => '/images/calendar.png','date_widget' => $date, 'culture' => 'es' )
    );
    
    //campo 
    $directory = sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'members';
    $this->widgetSchema['url_picture'] = new sfWidgetFormInputFileEditable( array('label'=>'Imagen de perfil', 'edit_mode'=>true,
                                                                                     'with_delete' => false,
                                                                                     'is_image' => true,    
                                                                             'file_src' => '/uploads/members/'.$this->getObject()->getUrlPicture()
                                                                                    ));

    $this->validatorSchema['url_picture'] = new sfValidatorFile(array('max_size' => 500000,
                                                                'mime_types' => 'web_images', //you can set your own of course
                                                                'path' => $directory,
                                                                'required' => false));
    
    $this->validatorSchema['telephone'] = new sfValidatorPhone(array('required' => false,'max_length' => 50));
    
    $this->validatorSchema['celphone'] = new sfValidatorPhone(array('required' => false,  'max_length' => 50 ));

    $this->validatorSchema['email'] = new sfValidatorEmail(array(), array('invalid' => 'El email no es valido','max_length' => 50, 'required' => false));

    

  }

}

