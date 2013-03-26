<?php use_stylesheet('portfolio') ?>
<?php use_javascript('jquery-1.5.1.min.js') ?>
<?php use_javascript('setupPortfolio.js') ?>
<?php use_javascript('jquery.pikachoose.js') ?>

<div class="pikachoose">
<?php echo $gallery->getTitle() ?>
	<ul id="pikame" class="jcarousel-skin-pika">
		<?php
        $uploadDir = sfConfig::get("app_sfMultipleAjaxUploadGalleryPlugin_path_gallery");
        $webDir = sfConfig::get("sf_web_dir");
        $correctPath = substr($uploadDir, strlen($webDir), strlen($uploadDir) - strlen($webDir)); ?>

        <?php foreach ($gallery->getPhotos() as $photo) {
 ?>
            <li>
                <a name="<?php echo $photo->getTitle() ?>" href="<?php echo $correctPath.$gallery->getSlug()."/".$photo->getPicPath() ?>" title="<?php echo $photo->getTitle() ?>">
                    <img class="imgthumb" src="<?php echo $correctPath.$gallery->getSlug()."/300/".$photo->getPicPath() ?>" alt="<?php echo $photo->getTitle() ?>" />
                </a>
                <span><?php echo $photo->getTitle() ?></span>
            </li>
    <?php } ?>
	</ul>
</div>

