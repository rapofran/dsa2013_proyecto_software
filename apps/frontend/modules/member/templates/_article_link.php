<?php if (!isset($width) && !isset($height)) { $width = '75px'; $height = '75px'; } ?>
<?php if ($member->getUrlPicture() != "") : ?>
    <img src="<?php echo DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'members'.DIRECTORY_SEPARATOR.$member->getUrlPicture() ?>" width="<?php echo $width ?>" height="<?php echo $height ?>" alt="Foto Perfil"/>
  <?php else : ?>
  <img src="<?php echo DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'cameraadd.png'?>" width="<?php echo $width ?>" height="<?php echo $height ?>" alt="Foto Perfil"/>
  <?php endif ?>
