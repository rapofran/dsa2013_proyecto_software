<?php

/**
 * PluginGallery
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    sfMultipleAjaxUploadGalleryPlugin
 * @subpackage model
 * @author     leny
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class PluginGallery extends BaseGallery {

    public function  delete(Doctrine_Connection $conn = null) {
        parent::delete($conn);
        if(sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_onDelete")== "cascade")
        {
            $this->RemoveFolder(sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_path_gallery").$this->getSlug().'/');
        }

    }

    public function RemoveFolder($dir){
        $handle = opendir($dir);
        while($elem = readdir($handle))
        {
            if(is_dir($dir.'/'.$elem) && substr($elem, -2, 2) !== '..' && substr(
                    $elem, -1, 1) !== '.')
            {
                $this->RemoveFolder($dir.'/'.$elem);
            }
            else
            {
                if(substr($elem, -2, 2) !== '..' && substr($elem, -1, 1) !== '.')
                {
                    unlink($dir.'/'.$elem);
                }
            }
        }

        $handle = opendir($dir);
        while($elem = readdir($handle))
        {
            if(is_dir($dir.'/'.$elem) && substr($elem, -2, 2) !== '..' && substr(
                    $elem, -1, 1) !== '.')
            {
                $this->RemoveFolder($dir.'/'.$elem);
                rmdir($dir.'/'.$elem);
            }
        }
        rmdir($dir);
    }

    public function setPhotoDefaut($photoId) {
        Doctrine_Query::create()
                ->update('Photos p')
                ->set('p.is_default', '?', false)
                ->where('p.gallery_id = ?', $this->getId())
                ->execute();

        Doctrine_Query::create()
                ->update('Photos p')
                ->set('p.is_default', '?', true)
                ->andWhere('p.id = ?', $photoId)
                ->execute();

        return true;
    }

    public function getPhotoDefault() {
        $default = Doctrine::getTable('Photos')->getDefault($this->getId());
        if(!$default instanceof Photos ){
            $default = new Photos();
            $default->setPicpath('PIC_0089.JPG');
        }
        return $default;
    }

    public function getPhotos(){
        return Doctrine_Query::create()
                ->from('Photos p')
                ->where('p.gallery_id = ?', $this->getId())
                ->orderBy('.order_photo ASC')
                ->execute();
    }

    public static function getAllGalleries(){
        return Doctrine::getTable('gallery')->createQuery('g')->where('g.is_active = ?',true);
    }
    public static function getNbGalleries($nb = 0){
        return Doctrine_Query::create()->from('gallery')->orderBy('updated_at DESC')
        ->limit($nb)
        ->execute();
    }
}
