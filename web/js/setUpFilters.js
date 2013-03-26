jQuery(document).ready( function(){
    anadirElementoFinal();
    $.fx.speeds._default = 1000;

    $( ".sf_admin_filter" ).dialog({
			    autoOpen: false,
			    show: "blind",
			    hide: "explode",
          title: "Filtros"
		    });
    
    $( ".filtro" ).click(function() {
			$( ".sf_admin_filter" ).dialog( "open" );
			return false;
		});

    $( ".ui-dialog").addClass("ui-filtros");
});

  function anadirElementoFinal()
    {
      var x;
      x=$("#ul-tree");
      x.append("<li class=\"filtro\"><a href=\"#\" id=\"opener\">Filtros</a></li>");
    }

