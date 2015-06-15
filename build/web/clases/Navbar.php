<?php 
	
	//Clase Header para crear un menu header comun para todas las páginas.
	class header {

		function crearHeader() {
			
			echo " 
			<div class='navbar navbar-inverse'> 
	            <a class='navbar-brand' href='#''>
	            	Panel de administración
	            </a> 
	            <ul class='nav nav-tabs nav-justified'> 
	                    <li class='active'><a href='admin.php'>Admin</a></li> 
	                    <li><a href='owncloud.php''>Owncloud</a></li> 	                    
	                    <li><a id='usuario' href='logout.php'>Exit</a></li>
	            </ul> 
        	</div>";

		}

	}


?>