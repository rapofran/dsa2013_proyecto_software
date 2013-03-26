<?php if (count($partidos) > 0) : ?>
<br />
<br />
<h3>En proximos partidos a jugar encontramos</h3>
<br />
<div id="partidos">
<table>
    <th>Fecha</th>
    <th>Visitante</th>
    <th>Local</th>
    <?php foreach ($partidos as $partido): ?>
    <tr>
      <td align="center"><?php echo $partido->getDate() ?></td>
      <td align="center"><?php echo $partido->getTeamOne() ?></td>
      <td align="center"><?php echo $partido->getTeamTwo() ?></td>
    </tr>
    <?php endforeach; ?>
</table>
</div>
<?php endif ?>
