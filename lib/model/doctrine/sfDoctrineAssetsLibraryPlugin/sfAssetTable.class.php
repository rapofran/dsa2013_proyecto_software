<?php

/**
 * sfAssetTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class sfAssetTable extends PluginsfAssetTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object sfAssetTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('sfAsset');
    }
}