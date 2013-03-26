<h2>Albums de imagenes</h2>
<br />
<div id="galleries">
    <?php include_partial('portfolio/list', array('galleries' => $pager->getResults())) ; ?>
</div>

<?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="<?php echo url_for('portfolio/index') ?>?page=1">
      <img src="/images/first.png" alt="Primer Pagina" title="Primer Pagina" />
    </a>
 
    <a href="<?php echo url_for('portfolio/index') ?>?page=<?php echo $pager->getPreviousPage() ?>">
      <img src="/images/previous.png" alt="Anterior Pagina" title="Anterior Pagina" />
    </a>
 
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for('portfolio/index') ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
 
    <a href="<?php echo url_for('portfolio/index') ?>?page=<?php echo $pager->getNextPage() ?>">
      <img src="/images/next.png" alt="Siguiente Pagina" title="Siguiente Pagina" />
    </a>
 
    <a href="<?php echo url_for('portfolio/index') ?>?page=<?php echo $pager->getLastPage() ?>">
      <img src="/images/last.png" alt="Ultima Pagina" title="Ultima Pagina" />
    </a>
  </div>
<?php endif; ?>

<div class="pagination_desc">
  <strong><?php echo $pager->getNbResults() ?></strong> albums.
 
  <?php if ($pager->haveToPaginate()): ?>
    - pagina <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
  <?php endif; ?>
</div>
    
