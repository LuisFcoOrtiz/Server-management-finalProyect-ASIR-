$(document).ready( function() {
//Script para la web de Owncloud administrator
    
    /*Menu en acordeon para los usuarios de Owncloud*/
    $(function() {
        $( "#menuUsuariosOwncloud" ).accordion({
          collapsible: true
        });
    });

     /*Funcion para mostrar formulario y añadir nuevos usuarios Owncloud*/
    $(function() {
        $( "#formularioNuevoUsuario" ).dialog({
          autoOpen: false,
          show: {
            effect: "fold",
            duration: 100
          },
          hide: {
            effect: "clip",
            duration: 100
          }
        });
     
        $( "#botonNuevoUsuarioOwncloud" ).click(function() {
            $( "#formularioNuevoUsuario" ).dialog( "open" );
        });
    }); //Fin de funcion para abrir formulario nuevo usuario

    /*Funcion para la capacidad de HDD owncloud*/
    $( "#botonCapacidadOwncloud" ).click(function() {            
      $.ajax({ 
                    type: "GET",
                    url: "Servidor",
                    data: 'op=9', //La operación 9 ejecuta script para conocer la capacidad del HDD
                    success: function(msge) {
                        $("#resultado").html(msge);
                    }
                }); 
    }); //Fin de funcion para la capacidad de HDD owncloud
        
    /*Al hacer clic en el boton (botonRealizarBackup) empieza una barra de proceso para ver cuando termina la copia de seguridad*/
    $("#botonRealizarBackup").click(function() {
      $.ajax({ 
                    type: "GET",
                    url: "Servidor",
                    data: 'op=8', //La operación 8 ejecuta script para backup
                    success: function(msge) {
                        $("#resultado").html(msge);
                    }
                });    	
        $(function() { //Inicio del processbar
                var progressbar = $( "#progressBarBackup" ),
                progressLabel = $( ".progress-label" );                                
                progressbar.progressbar({
                  value: false,
                  change: function() {
                    progressLabel.text( progressbar.progressbar( "value" ) + "%" );
                  },
                  complete: function() {
                    progressLabel.text( "Backup complete" );
                  }
                });

                function progress() {
                  var val = progressbar.progressbar( "value" ) || 0;

                  progressbar.progressbar( "value", val + 2 );

                  if ( val < 99 ) {
                    setTimeout( progress, 80 );
                  }
                }	 		   

                setTimeout( progress, 7000 ); //cantidad de tiempo que tardara la barra de procesar
            });
    }); //Fin de la funcion al apretar el boton (botonRealizarBackup)

}); //Fin de document.ready