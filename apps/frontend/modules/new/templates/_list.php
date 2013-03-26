<h2>Noticias</h2>
<br />
<div class="autoscroll">
<div id="noticias">
<table>
    <?php $i = 0 ?>
    <?php foreach ($news as $new): ?>
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
      <td><a href="<?php echo url_for('article/index?id='.$new->getId()) ?>"><?php echo $new->getTitle() ?></a></td>
      <td><?php echo $new->getShortDescription() ?></td>
    </tr>
    <?php $i++ ?>
    <?php endforeach; ?>
</table>
</div>
</div>
<br />
