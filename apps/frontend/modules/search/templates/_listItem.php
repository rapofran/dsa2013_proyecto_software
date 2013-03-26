<?php if (count($items) > 0) : ?>
<br />
<br />
  <h3>En noticias y eventos encontramos</h3>
<br />
  <div id="items">
  <table>
      <?php $i = 0 ?>
      <?php foreach ($items as $item): ?>
          <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
              <td><a href="<?php echo url_for('article/index?id='.$item->getId()) ?>"><?php echo $item->getTitle() ?></a></td>
              <td><?php echo $item->getShortDescription() ?></td>
              <?php if ($item->getItemTypeId() == 1) : ?>
                <td>Encontrado en <a href="<?php echo url_for('new/index') ?>">Noticias</a></td>
              <?php else : ?>
                <td>Encontrado en <a href="<?php echo url_for('new/index') ?>">Eventos</a></td>
              <?php endif ?>
          </tr>
        <?php $i++ ?>
      <?php endforeach; ?>
  </table>
  </div>
<?php endif ?>
