

<?php use_javascript('/sfDoctrineAssetsLibraryPlugin/js/util') ?>
<?php use_helper('sfAsset') ?>

<form action="<?php echo url_for('@sf_asset_library_add_quick') ?>" method="post" enctype="multipart/form-data">
  <div class="form-row">
    <label for="new_file">
      <?php echo image_tag('/sfDoctrineAssetsLibraryPlugin/images/image_add.png', 'alt=add align=top') ?>
      <?php echo link_to(__('Upload a file here', null, 'sfAsset'), '@sf_asset_library_add_quick', array('class' => 'toggle', 'rel' => '{ div: \'input_new_file\'}')) ?>
    </label>
    <div class="content" id="input_new_file" style="display:none">
      <?php echo $fileform['file'] ?>
      <input type="submit" value="<?php echo __('Add', null, 'sfAsset') ?>" />
    </div>
  </div>
  <?php echo $fileform->renderHiddenFields() ?>
</form>




