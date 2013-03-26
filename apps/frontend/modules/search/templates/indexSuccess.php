<div id="search-result">
<h2>Resultados de busqueda</h2>
<div class="autoscroll">
<?php if ($search != '') : ?>
<?php include_partial('search/listItem', array('items' => $items)) ?>

<?php include_partial('search/listMatch', array('partidos' => $matches)) ?>

<?php include_partial('search/listMembers', array('members' => $members)) ?>
<?php else : ?>
  <h3>No se encontraron elementos</h3>
<?php endif ?>
</div>
</div>



