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
    });  

    /*al hacer clic en (botonImprimirLogOwncloud) inicia la funcion para hacer un PDF en JAVA de los log de owncloud*/
    $(function() {
        $("#botonImprimirLogOwncloud").click(function() {
            $.ajax({ //Ejecuta la clase en java para imprimir log
                        type: "GET",
                        url: "Servidor",
                        data: 'op=3', //La operación 3 ejecuta un script para hacer un backup de owncloud
                        success: function(msge) {
                            $("#resultado").html(msge);
                        }
                    });
        }); //Fin de imprimir log
    });

    

    /*Al hacer clic en el boton (botonRealizarBackup) empieza una barra de proceso para ver cuando termina la copia de seguridad*/
    $("#botonRealizarBackup").click(function() {
    	
        $(function() { //Inicio del processbar
                var progressbar = $( "#progressBarBackup" ),
                progressLabel = $( ".progress-label" );                
                $.ajax({ //Ejecuta la clase en java para imprimir log
                    type: "GET",
                    url: "Servidor",
                    data: 'op=3', //La operación 3 ejecuta un script para hacer un backup de owncloud
                    success: function(msg) {
                        $("#resultado").html(msg);
                    }
                });
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

                setTimeout( progress, 3000 ); //cantidad de tiempo que tardara la barra de procesar
            });
	}); //Fin de la funcion al apretar el boton (botonRealizarBackup)

}); //Fin de document.ready

$(function backup() {
            $.ajax({ //Ejecuta la clase en java para imprimir log
                type: "GET",
                url: "Servidor",
                data: 'op=3', //La operación 3 ejecuta un script para hacer un backup de owncloud
                success: function(msg) {
                    $("#resultado").html(msg);
                }

            });
        });