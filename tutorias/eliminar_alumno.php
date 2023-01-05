<?php 

$idalumno=$_GET["idalumno"];

require_once("clases/clase_alumno.php");
$alumno= new Alumno();
$resultado_a=$alumno->eliminar($idalumno);

if ($resultado_a) {
	echo "<meta http-equiv='REFRESH' content='0; url=index.php'>
		<script type='text/javascript'>
			alert('Se eliminó el alumno con exito!');
		</script>";
}else{
	echo "<meta http-equiv='REFRESH' content='0; url=index.php'>
		<script type='text/javascript'>
			alert('No se pudo eliminar el alumno!');
		</script>";
}

 ?>