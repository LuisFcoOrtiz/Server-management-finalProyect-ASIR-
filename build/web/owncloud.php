<?php 
  include "clases/MysqlOwncloud.php";   //incluye clase para la conexion con owncloud bd
  include "clases/Navbar.php";          //incluye clase para navbar de la aplicacion web
  //introduce usuario en la session para verificacion
  session_start();
  $tipo=$_SESSION['tipo'];
  if ($tipo!="admin") {
      header('Location: index.html');
  } else {
    //consulta de base de datos para saber los usuarios de owncloud
    $usuariosOwncloud = new MysqlOwncloud();
    $consulta = $usuariosOwncloud->consulta("SELECT uid from oc_users");
    //Consulta para ver los movimientos y los archivos de los usuarios
    $movimientosOwncloud = new MysqlOwncloud();
    

  ?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
           	$navBar = new Header;
           	$navBar->crearHeader();          
  	?>

    <div class="container">
            
      <!-- inicio fila principal fila-->
      <div class="main row">

        <!--columna de la izquierda-->
        <div class="col-xs-12 col-sm-7 col-md-9">

          <!--menu desplegable de usuarios owncloud-->
          <div id="menuUsuariosOwncloud">                                    
            
            <?php

              while ($resultado = $usuariosOwncloud->fetch_array($consulta)) {
                echo "<h3>".$resultado['uid']."</h3>";  //muestra los usuarios de owncloud
                echo"<div>";
                //variable de conexion movimientos usuarios owncloud                
                $consultaMovimientos = $movimientosOwncloud->consulta("SELECT type, app, subjectparams, file from oc_activity where user='".$resultado['uid']."'");                
                while ($resultadoMovimientos = $movimientosOwncloud->fetch_array($consultaMovimientos)) {                  
                  echo "<h5><strong>Accion:</strong>  ".$resultadoMovimientos['type']."| <strong>Archivo:</strong> ";
                  echo $resultadoMovimientos['file']."</h4>";
                }
                echo "</div>";

              } //fin while de usuarios

            ?>

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
            <li class="list-group-item"><a href="http://192.168.1.150:8080/FinalProyect/Informes" role="button" target="_blank"><button id="botonImprimirLogOwncloud" class="glyphicon glyphicon-print">  Informe Owncloud  </a></li>
            <li class="list-group-item"><button id="botonNuevoUsuarioOwncloud" class="glyphicon glyphicon-plus">  Nuevo usuario</li>
            <li class="list-group-item"><button id="botonCapacidadOwncloud" class="glyphicon glyphicon-hdd">Capacidad HDD</li>
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
        <div id="resultado"></div> <!-- muestra los resultados de los script de scriptsOwncloud-->
  </body>
</html>
<?php 
      }
  
  ?>