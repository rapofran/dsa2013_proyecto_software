<div class="autoscroll">
<div class="album">
    <?php foreach ($galleries as $i=>$gallery): ?>
    <fieldset>    
    <div class="cont-albumdesc">
      <a class="title" href="<?php echo url_for(@showGallery, $gallery) ?>">
        <h3><?php echo $gallery->getTitle() ?></h3>
      </a>
      <h4><?php echo $gallery->getDescription() ?></h4>
    </div>
    <div class="cont-img">
		<a href="<?php echo url_for(@showGallery, $gallery) ?>">
                    <?php 
                    $uploadDir = sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_path_gallery");
                    $webDir = sfConfig::get("sf_web_dir");
                    $correctPath = substr($uploadDir, strlen($webDir), strlen($uploadDir)-strlen($webDir));
                    $default = $gallery->getPhotoDefault()->getPicpath() == "" ? sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_defaultPicture") :
                            $correctPath.$gallery->getSlug()."/".
				sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_portfolio_thumbnails_size")."/".$gallery->getPhotoDefault()->getPicpath();
                    ?>
                	<img src="<?php echo $default ?>"/>
            	</a>
	  </div>
    </fieldset>
    <br />
    <?php endforeach; ?>
</div>
<?php echo count($galleries) >= 4 ? '<div class="clear"></div>' : ""; ?>
</div>
