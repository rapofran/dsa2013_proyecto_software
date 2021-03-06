<?php

/**
 * PluginPhotos
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sfMultipleAjaxUploadGalleryPlugin
 * @subpackage model
 * @author     leny
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class PluginPhotos extends BasePhotos
{
    public function update(Doctrine_Connection $conn = null) {
        parent::save($conn);
    }
    public function save(Doctrine_Connection $conn = null) {
        parent::save($conn);

        $filename = $this->getPicpath();
        if(file_exists(sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_path_gallery")."tmp/".$filename)){
            copy (
                    sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_path_gallery")."tmp/".$filename,
                    sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_path_gallery").$this->getGallery()->getSlug()."/".$filename );
//            unlink(sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_path_gallery")."tmp/".$filename);
        }

        $this->create_thumbnails();
    }


    public function create_thumbnails(){
        $img = new sfImage(sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_path_gallery").$this->getGallery()->getSlug().'/'.$this->getPicpath(), 'image/'.$this->getExtension());
        $w = $img->getWidth();
        $h = $img->getHeight();
        $sizes = sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_thumbnails_sizes");
        if(in_array(sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_default_size"),$sizes))
        {
            $sizes[] = sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_default_size");
        }
        arsort($sizes,SORT_DESC);
        foreach($sizes as $size)
        {
            if(is_numeric($size))
            {
                $x = (int)($w/$h*$size);
                $img->resize($x,$size);
                $img->setQuality(100);
                $dir = sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_path_gallery").$this->getGallery()->getSlug().'/'.$size;
                if(!is_dir($dir)) mkdir ($dir);
                $img->saveAs($dir.'/'.$this->getPicpath(), 'image/'.$this->getExtension());
            }
        }
    }

    public function  delete(Doctrine_Connection $conn = null) {
        parent::delete($conn);
        $filename = $this->getPicpath();

        unlink(sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_path_gallery").$this->getGallery()->getSlug().'/'.$filename);
        foreach (sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_thumbnails_sizes") as $size)
        {
            unlink(sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_path_gallery").$this->getGallery()->getSlug().'/'.$size.'/'.$filename);
        }
    }

  public function isDefault()
  {
    return (bool) $this->getIsDefault();
  }

  public function crop($left, $top, $width, $height, $quality=100)
  {
    $uploadDir = sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_path_gallery");
    $picpath = $uploadDir.$this->getGallery()->getSlug()."/".$this->getPicpath();

    $img = new sfImage($picpath, 'image/'.$this->getExtension());
    $w = $img->getWidth();
    $h = $img->getHeight();
    $adapter = sfConfig::get("app_sfImageTransformPlugin_default_adapter");
    if($adapter == "GD"){
        $crop = new sfImageCropGD($left, $top, $width, $height);
    }elseif($adapter == "ImageMagick"){
        $crop = new sfImageCropImageMagick($left, $top, $width, $height);
    }
    $crop->execute($img);

    $picpathanalyse = explode("_",$this->getPicpath());
    if(count($picpathanalyse)>0 && is_numeric($picpathanalyse[0])){
        $picpath_orig = "";
        foreach ($picpathanalyse as $key => $value) {
            if($key!=0){
                $picpath_orig .= "_".$value;
            }
        }
        $key = intval($picpathanalyse[0])+1;
        $this->setPicpath($key.$picpath_orig);
    }else{
        $this->setPicpath("1_".$this->getPicpath());
    }
    
    $picpath = $uploadDir.$this->getGallery()->getSlug()."/".$this->getPicpath();
    $ok = $img->saveAs($picpath, 'image/'.$this->getExtension());
    if($ok) {
        $this->create_thumbnails();
        $this->save();
    }
    return $ok;
    
  }

  public function getExtension()
  {
    $extension = explode(".",  $this->getPicpath());
    $extension = strtolower($extension[count($extension)-1]);
    return $extension = $extension == "jpg" ? "jpeg" : $extension;
  }
}
