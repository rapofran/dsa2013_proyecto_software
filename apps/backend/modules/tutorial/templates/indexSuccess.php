<?php use_javascript('jquery-ui-1.8.11.custom.min.js')  ?> 
<?php use_javascript('setVideos.js')  ?> 
<?php use_javascript('flowplayer-3.2.6.min.js') ?>

<h1>Video Tutoriales</h1>

<div id="accordion">
  <h3><a href="#">Video 1 - Sitio Publico</a></h3>
  <div> 
    <div id="player_front" style="display:block;width:800px;height:450px;"></div>     
    <script>
      $f("player_front", {src: "/uploads/assets/videos/flowplayer-3.2.7.swf"}, {
	      clip: {
		      url: "/uploads/assets/videos/tuto_frontend_video.flv",
		      autoPlay: false,
	      }
      });
    </script>
  </div>
  <h3><a href="#">Video 2 - Administracion del sitio - Articulos</a></h3>
  <div>
    <div id="player_items" style="display:block;width:800px;height:450px;"></div>     
    <script>
      $f("player_items", {src: "/uploads/assets/videos/flowplayer-3.2.7.swf"}, {
	      clip: {
		      url: "/uploads/assets/videos/tuto_backend_items_video.flv",
		      autoPlay: false,
	      }
      });
    </script>
  </div>
  <h3><a href="#">Video 3 - Administracion del sitio - El Club</a></h3>
  <div>
    <div id="player_club" style="display:block;width:800px;height:450px;"></div>     
    <script>
      $f("player_club", {src: "/uploads/assets/videos/flowplayer-3.2.7.swf"}, {
	      clip: {
		      url: "/uploads/assets/videos/tuto_backend_club_video.flv",
		      autoPlay: false,
	      },
	      play: {
		      label: 'Click para reproducir el video',
		      replayLabel: null
	      },

        plugins: {			// load one or more plugins
              controls: {			// load the controls plugin
                  url: '/uploads/assets/videos/flowplayer.controls-3.2.5.swf',	
                  tooltips: {				// this plugin object exposes a 'tooltips' object
                      buttons: true,
                      fullscreen: 'Modo Pantalla Completa'
                  }
              }
          }
      });
    </script>
  </div>
  <h3><a href="#">Video 4 - Administracion del sitio - Partidos</a></h3>
  <div>
    <div id="player_partidos" style="display:block;width:800px;height:450px;"></div>     
    <script>
      $f("player_partidos", {src: "/uploads/assets/videos/flowplayer-3.2.7.swf"}, {
	      clip: {
		      url: "/uploads/assets/videos/tuto_backend_partidos_video.flv",
		      autoPlay: false,
	      }
      });
    </script>
  </div>
  <h3><a href="#">Video 5 - Administracion del sitio - Miembros</a></h3>
  <div>
    <div id="player_miembros" style="display:block;width:800px;height:450px;"></div>     
    <script>
      $f("player_miembros", {src: "/uploads/assets/videos/flowplayer-3.2.7.swf"}, {
	      clip: {
		      url: "/uploads/assets/videos/tuto_backend_miembros_video.flv",
		      autoPlay: false,
	      }
      });
    </script>
  </div>
  <h3><a href="#">Video 6 - Administracion del sitio - Configuracion del Sitio</a></h3>
  <div>
    <div id="player_config" style="display:block;width:800px;height:450px;"></div>     
    <script>
      $f("player_config", {src: "/uploads/assets/videos/flowplayer-3.2.7.swf"}, {
	      clip: {
		      url: "/uploads/assets/videos/tuto_backend_config_video.flv",
		      autoPlay: false,
	      }
      });
    </script>
  </div>
  <h3><a href="#">Video 7 - Administracion del sitio - Usuarios</a></h3>
  <div>
    <div id="player_users" style="display:block;width:800px;height:450px;"></div>     
    <script>
      $f("player_users", {src: "/uploads/assets/videos/flowplayer-3.2.7.swf"}, {
	      clip: {
		      url: "/uploads/assets/videos/tuto_backend_users_video.flv",
		      autoPlay: false,
	      }
      });
    </script>
  </div>
  <h3><a href="#">Video 8 - Administracion del sitio - Administracion de Imagenes</a></h3>
  <div>
    <div id="player_fotos" style="display:block;width:800px;height:450px;"></div>     
    <script>
      $f("player_fotos", {src: "/uploads/assets/videos/flowplayer-3.2.7.swf"}, {
	      clip: {
		      url: "/uploads/assets/videos/tuto_backend_fotos_video.flv",
		      autoPlay: false,
	      }
      });
    </script>
  </div>
</div>
