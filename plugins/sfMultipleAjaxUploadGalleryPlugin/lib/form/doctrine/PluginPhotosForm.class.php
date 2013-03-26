<?php

/**
 * PluginPhotos form.
 *
 * @package    sfMultipleAjaxUploadGalleryPlugin
 * @subpackage form
 * @author     leny
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginPhotosForm extends BasePhotosForm
{

      public function setup()
      {
        parent::setup();
        $this->removeFields();

        $this->widgetSchema->setLabels(array(
                    'title' => 'Titre :',
                    'picpath' => 'Chemin <em>*</em>:',
        ));
        $path_gallery = sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_path_gallery").$this->getObject()->getGalleryId()."/";
        $default_size = sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_default_size");

        $uploadDir = sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_path_gallery");
        $webDir = sfConfig::get("sf_web_dir");
        $upload_gallery_path = substr($uploadDir, strlen($webDir), strlen($uploadDir) - strlen($webDir)).$this->getObject()->getGalleryId()."/";

        $this->widgetSchema['picpath'] = new sfWidgetFormInputFileEditable(array(
                        'label'     => 'Image :',
                        'file_src'  => $upload_gallery_path.$default_size."/".$this->getObject()->getPicpath(),
                        'is_image'  => true,
                        'edit_mode' => !$this->isNew(),
                        'template'  => '<div>%file%<br />%input%<br />%delete% %delete_label%</div>',
        ));

	$this->setValidator('picpath', new sfValidatorFile(array(
                              'required' => true,
                              'path' => $path_gallery."tmp/",
                              'mime_types' => 'web_images'
                        ), array(
                        )));

        $this->disableCSRFProtection();
    }

    protected function removeFields() {
        unset(
                $this['created_at'], $this['updated_at']
        );
    }

    public function generatePicpathFilename(sfValidatedFile $file) {
        return $file->getOriginalName();
    }
}
