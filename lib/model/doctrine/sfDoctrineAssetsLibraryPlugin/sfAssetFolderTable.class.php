<?php

/**
 * sfAssetFolderTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class sfAssetFolderTable extends PluginsfAssetFolderTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object sfAssetFolderTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('sfAssetFolder');
    }
}