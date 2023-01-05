<?php 

$idalumno=$_POST["idalumno"];
$nom_alumno=$_POST["nom_alumno"];
$apellido_p=$_POST["apellido_p"];
$apellido_m=$_POST["apellido_m"];
$fecha_nac=$_POST["fecha_nac"];
$matricula=$_POST["matricula"];
$cuatri=$_POST["cuatri"];
$fkgrupo=$_POST["fkgrupo"];
$tel=$_POST["tel"];
$cel=$_POST["cel"];
$direcc=$_POST["direcc"];

require_once("clases/clase_alumno.php");
$alumno= new Alumno();
require_once("clases/clase_carrera.php");
$carrera= new Carrera();

$resultado=$alumno->actualizar($nom_alumno, $apellido_p, $apellido_m, $fecha_nac, $matricula, $cuatri, $fkgrupo, $tel, $cel, $direcc, $idalumno);

if ($resultado) {
	echo "<meta http-equiv='REFRESH' content='0; url=index.php'>
		<script type='text/javascript'>
			alert('Se ha actualizado al alumno con exito!');
		</script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=index.php'>
		<script type='text/javascript'>
			alert('Ocurrio un error al actualizar al alumno!');
		</script>";
}
 ?>