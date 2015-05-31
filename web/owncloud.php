.<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>CloudComputing center</title>	        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/jquery-ui.min.css">
         <link rel="stylesheet" href="css/estilos.css">
          <!-- scripts -->
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/scriptsOwncloud.js"></script> <!--Script para la web de owncloud admin-->
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
          echo = $manuelillo;
	?>

        <div class="container">
                
                <!-- inicio fila principal fila-->
                <div class="main row">

                        <!--columna de la izquierda-->
                        <div class="col-xs-12 col-sm-7 col-md-9">

                                <!--menu desplegable de usuarios owncloud-->
                                <div id="menuUsuariosOwncloud">
                                        <h3>Usuario 1</h3>
                                  <div>
                                    <p>Datos del usuario 1</p>
                                  </div>
                                  <h3>Usuario 2</h3>
                                  <div>
                                    <p>Datos del usuario2 </p>
                                  </div>
                                  <h3>Usuario 3</h3>
                                  <div>
                                    <p>Datos del usuario 3 </p>
                                    <ul>
                                      <li>List item one</li>
                                      <li>List item two</li>
                                      <li>List item three</li>
                                    </ul>
                                  </div>
                                  <h3>Usuario 4</h3>
                                  <div>
                                    <p>Cras dictum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia mauris vel est. </p><p>Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
                                  </div>
                                </div><!--fin de menu desplegable de usuarios owncloud-->

                        </div> <!--fin de columna de la izquierda--> 

                        <!--panel administracion derecha owncloud admin-->
                        <div class="col-xs-12 col-sm-4 col-md-3">
                                <img src="images/owncloud.png" class="img-responsive" alt="Responsive image">
                                <!--Barra de proceso para terminar el backup-->
                                <div id="progressBarBackup">
                                        <div class="progress-label"></div>
                                </div>
                                <!--seleccion de opciones administracion owncloud-->                               
                                <ul class="list-group">
                                  <li class="list-group-item"><button id="botonImprimirLogOwncloud" class="glyphicon glyphicon-print">  Informe Owncloud  </li>
                                  <li class="list-group-item"><button id="botonNuevoUsuarioOwncloud" class="glyphicon glyphicon-plus">  Nuevo usuario</li>
                                  <li class="list-group-item"><button id="botonCapacidadOwncloud" class="glyphicon glyphicon-hdd">  Capacidad HDD</li>
                                  <li class="list-group-item"><button id="botonRealizarBackup" class="glyphicon glyphicon-floppy-disk">  Realizar backup</li>
                                  <li class="list-group-item"><a class="glyphicon glyphicon-cloud" href="http://192.168.1.100/owncloud/" role="button" target="_blank"> Owncloud</a></li>
                                </ul>
                                                                
                        </div> <!--Fin de panel derecha owncloud admin-->

                        <!--Formulario para añadir nuevo usuario owncloud-->
                        <div id="formularioNuevoUsuario" class="ui-widget-content ui-corner-all">
                                <table class="table">
                                        <tr class="active">
                                                <td></td>
                                                <td>Usuario</td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                                <td><input id="nombreUsuario" type="text" class="form-control" placeholder="User name"></td>
                                                <td><input id="contraseña" type="text" class="form-control" placeholder="Password"></td>
                                                <td>
                                                        <select id="tipoUsuario" class="form-control" placeholder="User type">
                                                                  <option>admin</option>
                                                                  <option>user</option>
                                                                </select>
                                                </td>
                                        </tr>
                                </table>
                        </div> <!--final de Formulario owncloud-->                   

                </div><!-- fin de fila principal-->
                
                <!-- segunda fila-->
                <div class="row">

                </div><!-- fin de segunda fila-->
        </div>
</body>
</html>