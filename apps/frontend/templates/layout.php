<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_component_slot('site_name') ?>
    <?php include_component_slot('site_enabled') ?>
    <?php include_component_slot('site_style') ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
  <div id="header">
	  <div id="logo">
      <h1>Logo</h1>
	  </div>
	  <div id="menu">
		  <ul>
			  <li><a href="<?php echo url_for('menu/index') ?>">Inicio</a></li>
			  <li><a href="<?php echo url_for('club/index') ?>">El Club</a></li>
			  <li><a href="<?php echo url_for('new/index') ?>">Noticias</a></li>
			  <li><a href="<?php echo url_for('event/index') ?>">Eventos</a></li>
        <li><a href="<?php echo url_for('match/index') ?>">Partidos</a></li>
        <li><a href="<?php echo url_for('portfolio/index') ?>">Fotos</a></li>
			  <li><a href="<?php echo url_for('contactUs/index') ?>">Contactenos</a></li>
		  </ul>
	  </div>
  </div>
  <div id="page">
	  <div id="content">
      <?php echo $sf_content ?>
	  </div>
	  <div id="sidebar">
		  <div id="search" class="boxed">
			  <h2 class="title">B&uacute;squeda</h2>
			  <div class="content">
				  <form id="searchform" method="get" action="<?php echo url_for('search') ?>">
					  <fieldset>
					  <input id="searchinput" type="text" name="searchinput" value="<?php echo $sf_request->getParameter('query') ?>" />
            <img id="loader" src="/images/ajax-loader.gif" alt="busqueda_ajax" style="vertical-align: middle; display: none" />
					  <input id="searchsubmit" type="submit" value="Buscar" />
					  </fieldset>
				  </form>
			  </div>
		  </div>
		  <div id="news" class="boxed list">
			  <h2 class="title">Noticias</h2>
			  <div class="content">
				  <ul>
					  <?php include_component_slot('menu_news') ?>
				  </ul>
			  </div>
		  </div>
		  <div id="extra" class="boxed list">
			  <h2 class="title">Eventos</h2>
			  <div class="content">
				  <ul class="list">
					  <?php include_component_slot('menu_events') ?>
				  </ul>
			  </div>
		  </div>
		  <div id="footer">
        <p><a href="<?php echo public_path ('backend.php') ?>">Administración</a></p>        
        <p>©2011 Grupo PIN | Contacto: <a href="mailto:lpgupopin@gmail.com?subject=Contacto Grupo PIN">lpgrupopin@gmail.com</a></p>
        <a href="<?php echo url_for('@rss?sf_format=atom', true) ?>"><img id="rss" src="../images/blue_rss.png" alt="RSS"/></a>
		  </div>
	  </div>
  </div>
  </body>
</html>
