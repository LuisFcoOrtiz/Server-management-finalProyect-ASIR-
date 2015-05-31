<?php
	session_start();
	//vacia las variables de session
	session_unset();
	//destruye la session
	session_destroy();
	//redirige hacia index.html
	header('Location: index.html');
?>