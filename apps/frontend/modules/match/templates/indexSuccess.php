<div class="export">
     <h3><a href="<?php echo url_for('match/excelMatches') ?>">Exportar A Excel<img src="/images/excel.jpg" alt="Exportar a Excel"/></a></h3>
    </div>
    <br />
<h2>Partidos</h2>
<br/>
<div class="autoscroll">
<div id="partidos">
<table>
    <tr>
      <th>Fecha</th>
      <th>Visitante</th>
      <th>Local</th>
    </tr>
    <?php foreach ($partidos as $partido): ?>
    <tr>
      <td align="center"><?php echo format_date($partido->getDate(),'dd/MM/yyyy') ?></td>
      <td align="center"><?php echo $partido->getTeamOne() ?></td>
      <td align="center"><?php echo $partido->getTeamTwo() ?></td>
    </tr>
    <?php endforeach; ?>
</table>
</div>
</div>
