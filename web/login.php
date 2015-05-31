<?php
	include("Mysql.php");

	if (isset ($_POST['loggin'])) {
		//Conexion con la base de datos
		$dataBase = new Mysql();
		$consulta = $dataBase->consulta("SELECT * from usuarios where tipo='admin'");
		//variables del formulario
		$password= $_POST['password'];
		$user= $_POST['user'];
		
		while ($resultado = $dataBase->fetch_array($consulta)) {

			if (($user == $resultado['user']) and ($password == $resultado['password']))  {
				//Inicio la session e introduzco el usuario y contraseña 
				SESSION_START();
				$_SESSION['user']=$user;
				$_SESSION['tipo']=$resultado['tipo'];
				//redirigo a la pagina de administracion				
				header('Location: admin.php');			
			} else {
				header('Location: index.html');	
			}

		}
	}


?>