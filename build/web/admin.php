	<?php 	
	    session_start();
	    $tipo=$_SESSION['tipo'];
	    if ($tipo!="admin") {
	        header('Location: index.html');
	    } else { 
	?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Panel de administracion</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/jquery-ui.min.css">
		<link rel="stylesheet" type="text/css" href="css/estilos.css" media="screen" />
        <!-- <link rel="stylesheet" href="css/estilos.css">-->
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
        <script src="js/jquery-ui.min.js"></script>        
         <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">          
    </head>
    
    <body>
        
        <?php 
        	//menu de navegacion
         	include "clases/Navbar.php";
         	$navBar = new Header;
         	$navBar->crearHeader();
        ?>
        <!--Contenedor -->    
        <div class="container" >

        	<div class="main row"> <!--inicio de fila principal--> 
				
				<!-- columnas de la izquierda -->
        		<div class="col-xs-12 col-sm-8 col-md-9 ">
		            
		            <!-- tablas de informacion admin -->
					<div id="tabsAdmin">
					  <ul>
					    <li><a href="#tabs-1">Información</a></li>
					    <li><a href="#tabs-2">servicios</a></li>
					    <li><a href="#tabs-3">Ejecutar</a></li>
					  </ul>
					  <div id="tabs-1">
					    <p>
					    	Bienvenido a la aplicación de gestión del servidor Owncloud, en esta aplicación web puedes gestionar las principales caracteristicas.
					    </p>
					    <p>Esta aplicación esta realizada para el proyecto final de ASIR, puedes visionar la aplicación desde cualquier dispositivo asi que solo queda probarla! </p>					    	
					  </div>
					  <div id="tabs-2">
					    <p>
					    	En el apartado de admin puedes gestionar los estados de los servicios Owncloud y Thinclient (Parar, iniciar, etc) puedes también activar el boton de alerta para enviar un whatsapp al administrador del sistema.
					    </p>
					    <p>En el apartado de Owncloud puedes gestionar los usuarios que estan activos para utilizar el servicio de Owncloud y ver sus ultimos movimientos en ficheros (ficheros borrados, creados, etc) ver logs, realizar backup, etc</p>
					  </div>
					  <div id="tabs-3">
					  	<p>En esta seccion puedes ejecutar operaciones manualmente introduciendo el numero de operacion (para pruebas)</p>
					    <p>
					    	<!-- Para insertar codigos de operacion -->
				    		Insertar codigo de operacion:
				            <input class="codigo" type="text"/><br/>
				            <a class="boton" href="#">Enviar</a>
					    </p>
					    
					  </div>
					</div> <!-- fin de tablas de informacion admin -->								        					

	            </div> <!-- fin de columnas izquierda -->
				
				<!-- columnas de la derecha administracion -->
	            <div class="col-xs-10 col-sm-4 col-md-3 ">		        				        
		            <!-- Tabla del panel de administración -->
		            <table class="table">
		            	<tr> 
			            	<td></td>	
			            	<td><h4>ADMIN</h4></td>
			            	<td><h4>PANEL</h4></td>			            	
			           		<td></td>
			           		<td></td>	
			            </tr>
			            <tr class="active"> 
			            	<td>Alerta</td>	
			            	<td>Administrador</td>
			            	<td></td>
			            	<!--boton para ver el usuario-->			            	
			           		<td><button id="botonEnviarWhatsapp" class="glyphicon glyphicon-warning-sign"></button></td>
			           		<td></td>	
			            </tr>
						<tr class="info">
							<td>Servicio</td>
							<td></td>
							<td>Reiniciar</td>
							<td>Parar</td>
							<td>Iniciar</td>
						</tr>
						<tr>
							<td>Owncloud</td>
							<td></td>
							<td><button id="botonReiniciarOwncloud" class="glyphicon glyphicon-refresh"></button></td>
							<td><button id="botonPararOwncloud" class="glyphicon glyphicon-pause"></button></td>
							<td><button id="botonIniciarOwncloud" class="glyphicon glyphicon-play"></button></td>
						</tr>
						<tr>
							<td>Thinclient</td>
							<td></td>
							<td><button id="botonReiniciarThinClient" class="glyphicon glyphicon-refresh"></button></td>
							<td><button id="botonPararThinClient" class="glyphicon glyphicon-pause"></button></td>
							<td><button id="botonIniciarThinClient" class="glyphicon glyphicon-play"></button></td>
						</tr>
		            </table>

	            </div> <!-- fin de columnas derecha -->

	        </div> <!--Fin de la fila principal--> 			

        </div>
        <!--Fin de Contenedor -->
        

        <div id="resultado"></div>
    </body>
</html>
	<?php 
	    }
	
	?>