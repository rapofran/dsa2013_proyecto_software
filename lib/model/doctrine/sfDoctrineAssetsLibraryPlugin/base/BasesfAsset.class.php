<?php

/**
 * BasesfAsset
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $folder_id
 * @property string $filename
 * @property string $description
 * @property string $author
 * @property string $copyright
 * @property string $type
 * @property integer $filesize
 * @property sfAssetFolder $Folder
 * 
 * @method integer       getId()          Returns the current record's "id" value
 * @method integer       getFolderId()    Returns the current record's "folder_id" value
 * @method string        getFilename()    Returns the current record's "filename" value
 * @method string        getDescription() Returns the current record's "description" value
 * @method string        getAuthor()      Returns the current record's "author" value
 * @method string        getCopyright()   Returns the current record's "copyright" value
 * @method string        getType()        Returns the current record's "type" value
 * @method integer       getFilesize()    Returns the current record's "filesize" value
 * @method sfAssetFolder getFolder()      Returns the current record's "Folder" value
 * @method sfAsset       setId()          Sets the current record's "id" value
 * @method sfAsset       setFolderId()    Sets the current record's "folder_id" value
 * @method sfAsset       setFilename()    Sets the current record's "filename" value
 * @method sfAsset       setDescription() Sets the current record's "description" value
 * @method sfAsset       setAuthor()      Sets the current record's "author" value
 * @method sfAsset       setCopyright()   Sets the current record's "copyright" value
 * @method sfAsset       setType()        Sets the current record's "type" value
 * @method sfAsset       setFilesize()    Sets the current record's "filesize" value
 * @method sfAsset       setFolder()      Sets the current record's "Folder" value
 * 
 * @package    rugby
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasesfAsset extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_asset');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'autoincrement' => true,
             'primary' => true,
             ));
        $this->hasColumn('folder_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('filename', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('description', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('author', 'string', null, array(
             'type' => 'string',
             ));
        $this->hasColumn('copyright', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('type', 'string', 10, array(
             'type' => 'string',
             'length' => 10,
             ));
        $this->hasColumn('filesize', 'integer', null, array(
             'type' => 'integer',
             ));


        $this->index('uk_folder_filename', array(
             'fields' => 
             array(
              0 => 'folder_id',
              1 => 'filename',
             ),
             'type' => 'unique',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfAssetFolder as Folder', array(
             'local' => 'folder_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}