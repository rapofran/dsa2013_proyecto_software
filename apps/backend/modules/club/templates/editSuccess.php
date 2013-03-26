<?php use_helper('I18N', 'Date') ?>
<?php include_partial('club/assets') ?>
<?php use_helper('sfAsset') ?>

<?php use_javascript('tiny_mce/tiny_mce.js')  ?> 
<?php use_javascript('tiny_mce/setupClub.js') ?>
<?php echo init_asset_library() ?>

<script type="text/javascript">
  $(function() {
		$( ".div_acordion" ).accordion({ collapsible: true, active: false,autoHeight: false });
	});
  
</script>

<div id="sf_admin_container">
  <h1><?php echo __('Editar información del Club', array(), 'messages') ?></h1>

  <?php include_partial('club/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('club/form_header', array('stuff' => $stuff, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('club/form', array('stuff' => $stuff, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('club/form_footer', array('stuff' => $stuff, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
