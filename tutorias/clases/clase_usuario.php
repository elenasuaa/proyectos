<?php 
class Usuario{
	function __construct(){
		require_once("conexion.php");
		$this->conexion=new Conexion();
	}
	function buscar($num_empleado, $contra){
		$consulta="SELECT * FROM usuario WHERE num_empleado='{$num_empleado}'AND contra='{$contra}' AND estatus=1";
		$resultado=$this->conexion->returnConsulta($consulta);
		return $resultado;
	}
	function mostrar(){
		$consulta="SELECT * FROM usuario u INNER JOIN area a ON u.fkarea=a.idarea WHERE u.estatus=1";
		$resultado=$this->conexion->returnConsulta($consulta);
		return $resultado;
	}
}
 ?>