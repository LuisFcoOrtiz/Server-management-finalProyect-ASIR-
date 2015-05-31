<?php

	class Mysql {
		private $conexion;
		private $consultas_totales;

		public function Mysql() {
			if (!isset($this->conexion)) {
				$this->conexion = (mysql_connect("192.168.1.110","luis","luisillo")) or die (mysql_error());
				mysql_select_db("proyectofinal",$this->conexion) or die (mysql_error());				
			}
		} //fin de la funcion Mysql
		
		public function consulta($consulta) {
			$this->consultas_totales++;
			$resultado = mysql_query($consulta,$this->conexion);
			if (!$resultado) {
				echo 'Hubo un error';
				exit;
			}
			return $resultado;
		} //fin de la funcion consulta

		public function fetch_array($consulta) {
			return mysql_fetch_array($consulta);
		} // fin de la funcion fetch array

		public function num_rows($consulta) {
			return mysql_num_rows($consulta);
		} // fin de la funcion num_rows

		public function getConsultasTotales() {
			return $this->consultas_totales;
		} // fin de la funcion getConsultasTotales
	}

?>