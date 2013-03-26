<?php use_javascript('jquery-1.5.1.min.js') ?> 
<?php use_javascript('jquery.innerfade.js') ?>
<?php use_javascript('setMarquesinaNoticias.js') ?>

<div id="contenido_inicio"> 
<h2>Bienvenidos al sitio del Ensenada Rugby Club</h2>
<div id="noticias_rotativas">
<?php foreach ($news as $new): ?>
  <p>
    <a href="<?php echo url_for('article/index?id='.$new->getId()) ?>"><?php echo $new->getTitle() ?></a>
    <?php echo $new->getShortDescription() ?>
  </p>
<?php endforeach; ?>
</div>
<img id="img_frontend" src="<?php echo public_path('images/frontend.jpg') ?>"; width= auto; height= 48%; alt="Bienvenidos al sitio del Ensenada Rugby Club"/>
</div>
