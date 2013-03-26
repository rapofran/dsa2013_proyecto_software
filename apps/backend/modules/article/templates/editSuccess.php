<?php use_helper('I18N', 'Date') ?>
<?php use_helper('sfAsset') ?>

<?php use_javascript('tiny_mce/tiny_mce.js')  ?> 
<?php use_javascript('tiny_mce/setupItem.js') ?>
<?php echo init_asset_library() ?>
<?php include_partial('article/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Editar Articulo', array(), 'messages') ?></h1>

  <?php include_partial('article/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('article/form_header', array('item' => $item, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('article/form', array('item' => $item, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('article/form_footer', array('item' => $item, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
