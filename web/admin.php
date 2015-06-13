
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
					    	Este es el panel de informacion	
					    </p>
					  </div>
					  <div id="tabs-2">
					    <p>
					    	Este es el panel de servicios
					    </p>
					  </div>
					  <div id="tabs-3">
					    <p>
					    	<!-- Para insertar codigos de operacion -->
				    		Insertar codigo de operacion:
				            <input class="codigo" type="text"/><br/>
				            <a class="boton" href="#">Enviar</a>
					    </p>
					    
					  </div>
					</div> <!-- fin de tablas de informacion admin -->					

			        <!--Cuadro que aparece al pulsar (botonInfoUsuario) para ver el usuario activo-->
			            <div id="usuarioActual" class="ui-widget-content ui-corner-all">
			            	<table class="table">
								<tr class="active">
									<td></td>
									<td>USUARIO</td>
									<td></td>
								</tr>
								<tr>
									<td>Iliberis</td>
									<td>administrador</td>
									<td><a href="logout.php"><IMG id="logoutUsuario" SRC="images/logout.png"></a></td>
								</tr>
			            	</table>
			            </div><!--fin de div ver usuario activo -->					

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
			            	<td></td>	
			            	<td>Usuario</td>
			            	<td></td>
			            	<!--boton para ver el usuario-->			            	
			           		<td><button id="botonInfoUsuario" class="glyphicon glyphicon-user"></button></td>
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