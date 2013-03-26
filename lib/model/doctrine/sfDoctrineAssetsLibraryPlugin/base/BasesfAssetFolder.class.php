<?php

/**
 * BasesfAssetFolder
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $relative_path
 * @property Doctrine_Collection $Assets
 * 
 * @method integer             getId()            Returns the current record's "id" value
 * @method string              getName()          Returns the current record's "name" value
 * @method string              getRelativePath()  Returns the current record's "relative_path" value
 * @method Doctrine_Collection getAssets()        Returns the current record's "Assets" collection
 * @method sfAssetFolder       setId()            Sets the current record's "id" value
 * @method sfAssetFolder       setName()          Sets the current record's "name" value
 * @method sfAssetFolder       setRelativePath()  Sets the current record's "relative_path" value
 * @method sfAssetFolder       setAssets()        Sets the current record's "Assets" collection
 * 
 * @package    rugby
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasesfAssetFolder extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_asset_folder');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'autoincrement' => true,
             'primary' => true,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('relative_path', 'string', 255, array(
             'type' => 'string',
             'unique' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('sfAsset as Assets', array(
             'local' => 'id',
             'foreign' => 'folder_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $nestedset0 = new Doctrine_Template_NestedSet();
        $this->actAs($timestampable0);
        $this->actAs($nestedset0);
    }
}