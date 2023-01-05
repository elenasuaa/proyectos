<?php 

class Grupo{
	function __construct(){
		require_once("conexion.php");
		$this->conexion=new Conexion();
	}
	function mostrar(){
		$consulta="SELECT * FROM grupo g INNER JOIN carrera c ON g.fkcarrera=c.idcarrera WHERE g.estatus=1";
		$resultado=$this->conexion->returnConsulta($consulta);
		return $resultado;
	}
	function buscarPorId($idgrupo){
		$consulta="SELECT * FROM grupo g INNER JOIN carrera c ON g.fkcarrera=c.idcarrera WHERE idgrupo='{$idgrupo}'";
		$resultado=$this->conexion->returnConsulta($consulta);
		return $resultado;
	}

}

 ?>
