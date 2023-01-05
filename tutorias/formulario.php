<?php
require_once("seguridad.php");
require_once("clases/clase_grupo.php");
require_once("clases/clase_carrera.php");

$grupo= new Grupo();
$carrera= new Carrera();
$registrosgrupo=$grupo->mostrar();
$registroscarrera=$carrera->mostrar();

?> 
<!DOCTYPE html>
<html>
<head>
	<title>Datos Personales</title>
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
		<form action="insertar_alumno.php" method="POST" enctype="multipart/form-data">
		<div  id="datos_personales"><br>
            <h3>DATOS PERSONALES</h3>
            <table>
				<tr>
					<td><label>Nombre:</label></td><td colspan="3"><input type="text" name="nom_alumno" required=""></td>
					<td><label>Paterno:</label></td><td><input type="text" name="apellido_p" required=""></td>
					<td><label>Materno:</label></td><td><input type="text"  name="apellido_m"></td>
				</tr>
				<tr>
					<td><label >Fecha de Nacimiento:</label></td><td><input type="date" name="fecha_nac" required=""></td>
					<td><label>Matricula:</label></td><td><input type="text" name="matricula" required=""></td>
					<td><label>Cuatrimestre:</label></td><td><input type="number" name="cuatri" min="1" max="11"  required=""></td>
					<td><label>Grupo:</label></td><td>
					<select name="fkgrupo">
                    <option value="">
					Seleccione un grupo
					</option>
					<?php 
					while ($fila=mysqli_fetch_array($registrosgrupo)) {
						?>
						<option value="<?=$fila['idgrupo']; ?>"><?=$fila['nom_grupo'] ?></option>
						<?php
					}
					?>
					</select>
					</td>
				</tr>
				<tr >
					<td><label>Teléfono:</label></td><td><input type="text" minlength="10" maxlength="10" pattern="[0-9]+" name="tel"  ></td>
					<td><label>Celular:</label></td><td><input type="text" minlength="10" maxlength="10"  name="cel" ></td>
					<td><label>Dirección:</label></td><td colspan="3"><input type="text" name="direcc"  required=""></td>
				</tr>	
        	</table> 
			<button id="btn-guardar">Guardar datos</button>
        </div>
	</form>
	</div>
	<hr color="#D7D7D7">
	</div>
</body>
</html>