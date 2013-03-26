<?php if ($member->getUrlPicture() != "") : ?>
    <img src="<?php echo DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'members'.DIRECTORY_SEPARATOR.$member->getUrlPicture() ?>" width="75px" height="75px" alt="Foto Perfil"/>
  <?php else : ?>
  <img src="<?php echo DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'cameraadd.png'?>" width="75px" height="75px" alt="Foto Perfil"/>
  <?php endif ?>
