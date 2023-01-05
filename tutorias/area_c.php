<?php
 $idalumno=$_GET["idalumno"]; 

 require_once("seguridad.php");
 require_once("clases/clase_alumno.php");
 require_once("clases/clase_usuario.php");

 $alumno= new Alumno();
 $usuario= new Usuario();

 $registro=$alumno->buscarPorId($idalumno);
 $registrosusuario=$usuario->mostrar();
 while ($fila=mysqli_fetch_array($registro)) {
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Canalización</title>
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" type="text/css" href="css/formato.css">
	<link rel="stylesheet" type="text/css" href="css/area_c.css">
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
                <h2>Oficina Integral de Atención Estudiantil</h2><br>
		<form action="" method="GET">
		<input type="hidden" name="idalumno" value="<?=$idalumno?>">
		<div>
            <h3>CANALIZACIÓN</h3><br>
				<table id="tb-datos">
					<td>
						<label>Nombre:</label> <div id="datos"><?=$fila["nom_alumno"]?> <?=$fila["apellido_p"]?> <?=$fila["apellido_m"]?>
					</td>
					<td>
						<label>Carrera:</label> <div id="datos"><?=$fila["nom_carrera"]?>
					</td>
					<td>
						<label>Grupo:</label> <div id="datos"><?=$fila["nom_grupo"]?>
					</td>
			</table>
		</div>
			<br><table id="tb-area">
			<tr>
				<td>
					<?php 
					while ($fila=mysqli_fetch_array($registrosusuario)) {
						?>
						<label>Nombre del quién canaliza:</label> <div id="datos"><?=$fila["nom"]?> <?=$fila["apellido_p"]?> <?=$fila["apellido_m"]?>
						<?php
					}
					?></td>
			</tr>
			</table>
			<br><table id="table-c">
					<h4>Área a la que se canaliza</h4>
					<tr>
						<td align="center">
						<img src="imagenes/info3.png" alt=""><br>
						<button>Asesoría psicopedagógica</button>
						</td>
						<td align="center">
						<img  src="imagenes/info3.png" alt=""><br>
						<button>Atención medica</button>
						</td>
						<td align="center">
						<img src="imagenes/info3.png" alt=""><br>
						<a href="formato_tutorias.php?idalumno=<?=$fila['idalumno']?>"><button >Asesorías académicas</button></a>
						</td>
						<td align="center">
						<img src="imagenes/info3.png" alt=""><br>
						<button>Trabajo social</button>
						</td>
				</tr>
			</table>
        </div>
	</form> 
	<hr color="#D7D7D7">
	</div>
	</div>
</body>
</html>
<?php
    }
    ?>
