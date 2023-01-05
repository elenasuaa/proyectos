<?php 
require_once("clases/clase_alumno.php");
require_once("clases/clase_grupo.php");
require_once("clases/clase_carrera.php");

$alumno = new Alumno();
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


$resultado=$alumno->insertar($nom_alumno, $apellido_p, $apellido_m, $fecha_nac, $matricula, $cuatri, $fkgrupo, $tel, $cel, $direcc);
 ?>

 <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<?php  
		if ($resultado) {
		?>
				<meta http-equiv='REFRESH' content='0; url=index.php'>
				<script type="text/javascript">
					alert("Se registró el alumno con exito!");
				</script>
		<?php
		}else{
			echo "No se pudo guardar el registro del alumno <b>".$nom_alumno." ".$apellido_p." ".$apellido_m."</b>.";
		}		
		?>
</body>
</html>