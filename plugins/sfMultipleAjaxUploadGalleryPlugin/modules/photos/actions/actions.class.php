<?php

require_once dirname(__FILE__).'/../lib/photosGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/photosGeneratorHelper.class.php';

/**
 * photos actions.
 *
 * @package    sfMultipleAjaxUploadGalleryPlugin
 * @subpackage photos
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class photosActions extends autoPhotosActions
{
    public function executeUpdateTitle(sfWebRequest $request){
        if ($request->isXmlHttpRequest()) {
            $id = $request->getParameter('id');
            $title = $request->getParameter('title');
            $photo = Doctrine::getTable('photos')->find($id);
            $photo->setTitle($title);
            $photo->update();
            return $this->renderText('La foto fue modificada con exito !');
        }
    }

    public function executeCrop(sfWebRequest $request){
        if ($request->isMethod(sfRequest::POST) )
        {
            $values = array();
            foreach ($request->getPostParameters() as $key => $value) {
                $values[] = $value;
            }
            list($left,$top,$width,$height,$photo_id) = $values;
            $photo = Doctrine::getTable('Photos')->find($photo_id);
            $gallery = Doctrine::getTable('gallery')->find($photo->getGalleryId());
            if(!$photo instanceof  Photos) $photo = new Photos();
            $quality = 100;

            $ok = $photo->crop($left, $top, $width, $height, $quality);
            
           $message = $ok==true? "La foto se reencuadro correctamente":"Error al modificar la foto";

            $this->getUser()->setFlash('ajax_notice',$message);
            return $this->renderPartial('gallery/photoListe', array('photos'=> $gallery->getPhotos()));
                    

        }
    }
}
