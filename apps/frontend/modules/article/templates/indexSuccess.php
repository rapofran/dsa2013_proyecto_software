
<h2><?php echo $article->getTitle() ?></h2>
<br />
<div class="autoscroll">
  <p class="italic"><?php echo $article->getShortDescription() ?></p>
  <div id="longdescription">
  <?php echo $sf_data->getRaw('article')->getLongDescription() ?>
  </div>
</div>
<p>Publicado el : <?php echo format_date($article->getUpdatedAt(),'dd/MM/yyyy') ?></p>


