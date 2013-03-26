<?php use_javascript('jquery-1.5.1.min.js')  ?> 
<?php use_javascript('jquery-ui-1.8.11.custom.min.js')  ?> 
<?php use_stylesheet('jquery-ui-1.8.11.custom.css') ?>
<?php use_javascript('setUpTabs.js')  ?> 

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Historia</a></li>
		<li><a href="#tabs-2">Autoridades</a></li>
    <li><a href="#tabs-3">Institucional</a></li>
    <li><a href="#tabs-4">Reglamento</a></li>
    <li><a href="#tabs-5">Jugadores</a></li>
		<li><a href="#tabs-6">Como Llegar</a></li>
	</ul>
	<div id="tabs-1">
    <div class="export">
    <h3><a href="<?php echo url_for('club/exportHistory') ?>">Exportar a PDF<img src="/images/pdf.jpg" alt="Exportar a PDF"/></a></h3>
    </div>
    <br />
		<h4>HISTORIA:</h4><p><?php echo $sf_data->getRaw('stuff')->getStory() ?></p>
	</div>
	<div id="tabs-2">
    <fieldset>
    <legend>Presidente</legend>
    <?php foreach ($presidentes as $presidente): ?>
      <h4><?php echo $presidente->getName(); echo ",  Tel.".$presidente->getTelephone() ?></h4>
      <h3><a href="<?php echo url_for('member/show?id='.$presidente->getId()) ?>">Ver Perfil</a></h3>
    <?php endforeach; ?>
    </fieldset>
    <fieldset>
    <legend>Administraci&oacute;n</legend>
    <?php foreach ($administradores as $administrador): ?>
      <h4><?php echo $administrador->getName(); echo ",  Tel.".$administrador->getTelephone() ?></h4>
      <h3><a href="<?php echo url_for('member/show?id='.$administrador->getId()) ?>">Ver Perfil</a></h3>
    <?php endforeach; ?>
    </fieldset>
    <fieldset>
    <legend>Cordinaci&oacute;n de Rugby</legend>
    <?php foreach ($coordinadores as $coordinador): ?>
      <h4><?php echo $coordinador->getName(); echo ",  Tel.".$coordinador->getTelephone() ?></h4>
      <h3><a href="<?php echo url_for('member/show?id='.$coordinador->getId()) ?>">Ver Perfil</a></h3>
    <?php endforeach; ?>
    </fieldset>
	</div>
	<div id="tabs-3">
    <div class="export">
    <h3><a href="<?php echo url_for('club/exportInstitucional') ?>">Exportar a PDF<img src="/images/pdf.jpg" alt="Exportar a PDF"/></a></h3>
    </div>
    <br />
    <?php echo $sf_data->getRaw('stuff')->getDescription() ?>
	</div>
  <div id="tabs-4">
    <div class="export">
    <h3><a href="<?php echo url_for('club/exportRules') ?>">Exportar a PDF<img src="/images/pdf.jpg" alt="Exportar a PDF"/></a></h3>
    </div>
    <br />
    <?php echo $sf_data->getRaw('stuff')->getRules() ?>
	</div>
  <div id="tabs-5">
    <div class="export">
     <h3><a href="<?php echo url_for('club/excelPlayer') ?>">Exportar A Excel<img src="/images/excel.jpg" alt="Exportar a Excel"/></a></h3>
    </div>
    <br />
    <fieldset>
    <legend>Jugadores</legend>
    <table border='1' id="club-players">
      <thead>
        <tr>
          <th>Apellido y Nombre</th>
          <th>Fecha de Nacimiento</th>
          <th>Categoria</th>
          <th>Foto</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($jugadores as $jugador): ?>
        <tr>
          <td><?php echo $jugador->getName() ?></td>
          <td><?php $date = strtotime($jugador->getBirthday()); echo date("d/m/Y",$date) ?></td>
          <td><?php echo $jugador->getCategory() ?></td>
          <td><?php include_partial('member/article_link', array('member' => $jugador)) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </fieldset>
  </div>
	<div id="tabs-6">
  <!-- Google Map, se podria usar el plugin o directamente la API -->
<h4>CAMPO DE DEPORTES:</h4><p>Parque Brigadier General Martín Rodriguez, calles 43 y 126, Bo. El Dique, Ensenada.-
Desde la Plata se llega por Av. 38 hasta Av. 122 doblar a derecha hasta calle 43, doblar a izquierda hasta calle 126 y seguir 100 mts. mas hasta la entrada a mano izquierda.</p>
<p>Desde Capital, bajar al final de la autopista Bs. As. – La Plata bordear toda la rotonda y tomar camino Rivadavia hasta 122 (1er. Semáforo) doblar a la derecha por esta hasta calle 43 (ruta 215), doblar a izquierda por esta hasta calle 126, seguir 100 mts. hasta entrada a mano izquierda.</p>
<iframe width="565" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.ar/maps?q=-34.893939,-57.937152&amp;num=1&amp;sll=<?php echo $stuff->getLatitud().",".$stuff->getLongitud() ?>&amp;sspn=0.073211,0.128059&amp;ie=UTF8&amp;ll=<?php echo $stuff->getLatitud().",".$stuff->getLongitud() ?>&amp;spn=0.009821,0.01929&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
	</div>
</div>
