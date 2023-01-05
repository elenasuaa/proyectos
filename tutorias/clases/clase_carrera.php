<?php 

	class Carrera{
		function __construct(){
			require_once("conexion.php");
			$this->conexion= new Conexion();
		}
		function mostrar(){
			$consulta="SELECT * FROM carrera WHERE estatus=1 ORDER BY nom_carrera ASC";
			$resultado=$this->conexion->returnConsulta($consulta);
			return $resultado;
		}

		function buscarPorId($idcarrera){
			$consulta="SELECT * FROM carrera WHERE idcarrera='{$idcarrera}'";
			$resultado=$this->conexion->returnConsulta($consulta);
			return $resultado;
		}

	}
 ?>