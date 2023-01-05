<?php 

$idalumno=$_GET["idalumno"];
require_once("clases/clase_alumno.php");

$alumno= new Alumno();

$resultado=$alumno->baja($idalumno);
if ($resultado) {
	echo "<meta http-equiv='REFRESH' content='0; url=index.php'>
		<script type='text/javascript'>
			alert('Alumno dado de baja con exito!');
		</script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=index.php'>
		<script type='text/javascript'>
			alert('Ocurrio un error al dar de baja al alumno!');
		</script>";
}

 ?>