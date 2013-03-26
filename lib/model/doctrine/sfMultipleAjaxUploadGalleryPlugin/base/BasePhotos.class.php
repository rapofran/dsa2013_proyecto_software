<?php

/**
 * BasePhotos
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $title
 * @property string $picpath
 * @property integer $gallery_id
 * @property integer $order_photo
 * @property boolean $is_default
 * @property Gallery $Gallery
 * 
 * @method string  getTitle()       Returns the current record's "title" value
 * @method string  getPicpath()     Returns the current record's "picpath" value
 * @method integer getGalleryId()   Returns the current record's "gallery_id" value
 * @method integer getOrderPhoto()  Returns the current record's "order_photo" value
 * @method boolean getIsDefault()   Returns the current record's "is_default" value
 * @method Gallery getGallery()     Returns the current record's "Gallery" value
 * @method Photos  setTitle()       Sets the current record's "title" value
 * @method Photos  setPicpath()     Sets the current record's "picpath" value
 * @method Photos  setGalleryId()   Sets the current record's "gallery_id" value
 * @method Photos  setOrderPhoto()  Sets the current record's "order_photo" value
 * @method Photos  setIsDefault()   Sets the current record's "is_default" value
 * @method Photos  setGallery()     Sets the current record's "Gallery" value
 * 
 * @package    rugby
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePhotos extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('photos');
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('picpath', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('gallery_id', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             ));
        $this->hasColumn('order_photo', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('is_default', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Gallery', array(
             'local' => 'gallery_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'fields' => 
             array(
              0 => 'title',
             ),
             'unique' => true,
             ));
        $this->actAs($timestampable0);
        $this->actAs($sluggable0);
    }
}