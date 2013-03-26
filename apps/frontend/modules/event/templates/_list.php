
<h2>Eventos</h2>
<br />
<div class="autoscroll">
  <div id="eventos">
  <table>
      <?php $i = 0 ?>
      <?php foreach ($events as $event): ?>
      <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
        <td><a href="<?php echo url_for('article/index?id='.$event->getId()) ?>"><?php echo $event->getTitle() ?></a></td>
        <td><?php echo $event->getShortDescription() ?></td>
      </tr>
      <?php $i++ ?>
      <?php endforeach; ?>
  </table>
  </div>
</div>
<br />
