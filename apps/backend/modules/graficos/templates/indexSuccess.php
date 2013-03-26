<?php use_javascript('setGraphs.js') ?>

<h3>Busqueda por fecha:</h3>
  <div id="form_fechas">
  <form action="<?php echo url_for('graficos') ?>" method="POST">
    <p>1º Fecha: <input type="text" id="datepicker" name="fecha1" value="<?php echo $fecha1  ?>"></p>
    <p>2º Fecha: <input type="text" id="datepicker2" name="fecha2" value="<?php echo $fecha2  ?>"></p>
    <input type="submit" value="Buscar" />
  </form>
</div>

<h3>Cantidad de Articulos Publicados por Usuario:</h3>
<br>
<img src="http://chart.apis.google.com/chart?chs=400x100&cht=p&chco=<?php echo $colores1 ?>&chd=t:<?php echo $dataCant ?>&chl=<?php echo $dataUser ?>" width="500" height="125"> 
<img src="http://chart.apis.google.com/chart?chs=400x100&cht=bhg&chco=<?php echo $colores1 ?>&chd=t:<?php echo $dataCant ?>&chdl=<?php echo $dataUser ?>" width="500" height="125">
<br><br>
<h3>Cantidad de Visitas por Articulo:</h3>
<center>
<img src="http://chart.apis.google.com/chart?chs=600x150&cht=p&chco=<?php echo $colores2 ?>&chd=t:<?php echo $data ?>&chl=<?php echo $dataLabel ?>" width="800" height="200"> 
<br><br>
<img src="http://chart.apis.google.com/chart?chs=800x200&cht=bhg&chco=<?php echo $colores2 ?>&chd=t:<?php echo $data ?>&chdl=<?php echo $dataLabel ?>" width="800" height="200">

</center>

