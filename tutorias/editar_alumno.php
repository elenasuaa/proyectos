<?php 
$idalumno=$_GET["idalumno"];

require_once("seguridad.php");
require_once("clases/clase_alumno.php");
require_once("clases/clase_grupo.php");
require_once("clases/clase_carrera.php");

$alumno= new Alumno();
$grupo= new Grupo();
$carrera= new Carrera();

$registro=$alumno->buscarPorId($idalumno);
$registrosgrupo=$grupo->mostrar();
$registroscarrera=$carrera->mostrar();
while ($fila=mysqli_fetch_array($registro)) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Datos Personales (canalización)</title>
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" type="text/css" href="css/formato.css">
</head>
<body>
	<div id="name">
        <span alt="Application" title="Application" height="70" width="1100">Universidad Tecnológica de Escuinapa</span>
    </div>
        <div id="navbar">
                <div id="navbar-entry"><a href="cerrar_sesion.php">Salir</a></div>
        </div><br><br>
        <nav>
            <a href="index.php" id="nav-inicio">Inicio</a>
        </nav>
            <div id="verticalLine">
            <div id="container">
                <h2>Oficina Integral de Atención Estudiantil</h2>   
		<form action="actualizar_alumno.php" method="POST">
		<input type="hidden" name="idalumno" value="<?=$idalumno?>">
		<div  id="datos_personales"><br>
            <h3>DATOS PERSONALES</h3>
            <table>
			<tbody>
				<tr>
					<td><label>Nombre:</label></td><td colspan="3"><input type="text" name="nom_alumno" value="<?=$fila['nom_alumno']?>"></td>
					<td><label>Paterno:</label></td><td><input type="text" name="apellido_p" value="<?=$fila['apellido_p']?>"></td>
					<td><label>Materno:</label></td><td><input type="text"  name="apellido_m" value="<?=$fila['apellido_m']?>"></td>
				</tr>
				<tr>
					<td><label>Fecha de Nacimiento:</label></td><td><input type="date" name="fecha_nac" value="<?=$fila['fecha_nac']?>"></td>
					<td><label>Matricula:</label></td><td><input type="text" name="matricula" value="<?=$fila['matricula']?>"></td>
					<td><label>Cuatrimestre:</label></td><td><input type="number" name="cuatri" min="1" max="11" value="<?=$fila['cuatri']?>"></td>
					<td><label>Grupo:</label></td><td>
					<select name="fkgrupo">
					<option value="<?=$fila['idgrupo']?>">
					<?=$fila['nom_grupo']?>
					</option>
					<?php 
						while ($fila2=mysqli_fetch_array($registrosgrupo)) {
							?>
							<option value="<?=$fila2['idgrupo']; ?>"><?=$fila2["nom_grupo"] ?></option>
							<?php
						}
						?>
          		</select>
					</td>
				</tr>
				<tr>
					<td><label>Teléfono:</label></td><td><input type="text" name="tel" value="<?=$fila['tel']?>"></td>
					<td><label>Celular:</label></td><td><input type="text" name="cel" value="<?=$fila['cel']?>"></td>
					<td><label>Dirección:</label></td><td  colspan="3"><input type="text" name="direcc" value="<?=$fila['direcc']?>"></td>
				</tr>
				</tbody>	
        	</table> 
			<button id="btn-guardar" type="submit">Guardar datos</button>
        </div>
	</form>
	</div>
	<hr color="#D7D7D7">
	</div>
</body>
</html>
<?php	
}
 ?>