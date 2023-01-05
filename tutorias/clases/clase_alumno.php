<?php 

class Alumno{
		function __construct(){
			require_once("conexion.php");
			$this->conexion=new Conexion();
		}
		function insertar($nom_alumno, $apellido_p, $apellido_m, $fecha_nac, $matricula, $cuatri, $fkgrupo, $tel, $cel, $direcc){
			$consulta= "INSERT INTO alumno (idalumno, nom_alumno, apellido_p, apellido_m, fecha_nac, matricula, cuatri, fkgrupo, 
			tel, cel, direcc, estatus) VALUES (NULL, '{$nom_alumno}', '{$apellido_p}','{$apellido_m}','{$fecha_nac}','{$matricula}','{$cuatri}',
			'{$fkgrupo}','{$tel}','{$cel}','{$direcc}', 1)";
			$resultado=$this->conexion->insertarConsulta($consulta);
			return $resultado;
		}
		function mostrar(){
			$consulta="SELECT * FROM alumno a INNER JOIN grupo g ON a.fkgrupo=g.idgrupo INNER JOIN carrera c ON c.idcarrera=g.fkcarrera WHERE a.estatus=1";
			$resultado=$this->conexion->returnConsulta($consulta);
			return $resultado;
		}
		function buscarPorId($idalumno){
			$consulta="SELECT * FROM alumno a INNER JOIN grupo g ON a.fkgrupo=g.idgrupo INNER JOIN carrera c ON c.idcarrera=g.fkcarrera WHERE idalumno= '{$idalumno}'";
			$resultado=$this->conexion->returnConsulta($consulta);
			return $resultado;
		}
		function actualizar($nom_alumno, $apellido_p, $apellido_m, $fecha_nac, $matricula, $cuatri, $fkgrupo, $tel, $cel, $direcc, $idalumno){
			$consulta="UPDATE alumno a INNER JOIN grupo g ON a.fkgrupo=g.idgrupo INNER JOIN carrera c ON c.idcarrera=g.fkcarrera SET nom_alumno= 
			'{$nom_alumno}', apellido_p= '{$apellido_p}', apellido_m= '{$apellido_m}', fecha_nac= '{$fecha_nac}', matricula= '{$matricula}', 
			cuatri= '{$cuatri}', fkgrupo= '{$fkgrupo}', tel= '{$tel}', cel= '{$cel}', direcc= '{$direcc}' 
			WHERE idalumno= '{$idalumno}'";
			$resultado=$this->conexion->returnConsulta($consulta);
			return $resultado;
		}
		function baja($idalumno){
			$consulta="UPDATE alumno SET estatus=0 WHERE idalumno= '{$idalumno}'";
			$resultado=$this->conexion->returnConsulta($consulta);
			return $resultado;
		}
		function eliminar($idalumno){
			$consulta="DELETE FROM alumno WHERE idalumno= '{$idalumno}'";
			$resultado=$this->conexion->returnConsulta($consulta);
			return $resultado;
		}
	}
 ?>