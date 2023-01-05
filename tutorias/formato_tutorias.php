<?php 
$idalumno=$_GET["idalumno"];

require_once("seguridad.php");
require_once("clases/clase_alumno.php");


$alumno= new Alumno();

$registro=$alumno->buscarPorId($idalumno);
while ($fila=mysqli_fetch_array($registro)) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tutorías</title>
	<link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/formato.css">
    <style type="text/css">
        #datos_personales, #seguimiento,
        #registro_atencion, #canalizacion,
        #reporte_final, #seguimiento_i{
            display: none;
        }
    </style>
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
                <a id="nav-inicio" onclick="mostrarDatosPersonales()">Datos personales</a>
                <a id="nav-inicio" onclick="mostrarSeguimiento()">Seguimiento</a>
                <a id="nav-inicio" onclick="mostrarCanalizacion()">Canalización</a>
                <a id="nav-inicio" onclick="mostrarSeguimientoI()">Seguimiento individual</a>
                <a id="nav-inicio" onclick="mostrarAtencionIndividual()">Registro de atención individual</a>
                <a id="nav-inicio" onclick="mostrarReporteFinal()">Reporte final</a>
            </nav>
            <div id="container">
                    <h2>Oficina Integral de Atención Estudiantil</h2>
            <form action="" method="GET">
            <div ><br>
            <div id="datos_personales">
            <h3>ENTREVISTA INDIVIDUAL</h3>
                 <br><table>
                    <h4>Datos de los padres</h4>
                <tr>
					<td><label>Nombre del padre:</label></td><td colspan="3"><input type="text" name="nom_padre"></td>
					<td><label>Edad:</label></td><td><input type="number" name="edad_p"></td>
					<td><label>Profesión:</label></td><td><input type="text" name="profesion_p"></td>
				</tr>
                <tr>
					<td><label>Nombre de la madre:</label></td><td colspan="3"><input type="text" name="nom_madre"></td>
					<td><label>Edad:</label></td><td><input type="number" name="edad_m"></td>
					<td><label>Profesión:</label></td><td><input type="text" name="profesion_m"></td>
				</tr>
                </table>
                    <h4>Hermanos</h4>
                <table>
                <tr>
					<td><label>Nombre:</label></td><td colspan="3"><input type="text" name="nom_padre"></td>
					<td><label>Edad:</label></td><td><input type="number" name="edad_p"></td>
					<td><label>Ocupación:</label></td><td><input type="text" name="profesion_p"></td>
                <tr>
                </table>
                <h4>Contacto en caso de Emergencia</h4>
                <table>
                <tr>
					<td><label>Teléfono:</label></td><td colspan="3"><input type="tel" name="tel"></td>
					<td><label>Celular:</label></td><td><input type="tel" name="cel"></td>
				</tr>
                </table><br>
                <button id="btn-guardar">Guardar datos</button>
            </div>
            <div id="seguimiento">
            <h3>FORMATO DE SEGUIMIENTO</h3>
            <table>
                <tr>
                    <td><label>Fecha/hora de atención:</label></td><td colspan="3"><input type="datetime-local" name="fecha_hora"></td>
                    <td><label>Área de atención:</label></td><td colspan="3"><input input type="text" name="a_atencion"></td>
                    <td><label>Encargado de la atención:</label></td><td colspan="3"><input type="text" name="e_atencion"></td>
                </tr>
                <tr>
                    <td colspan="3"><label>Diagnostico otorgado</label></td>
                    <td colspan="7"><textarea name="text" id="" cols="1000" rows=""></textarea></td>
                </tr>
                <tr>
                    <td colspan="3"><label>Recomendaciones</label></td>
                    <td colspan="7"><textarea name="text" id="" cols="1000" rows=""></textarea></td>
                </tr>
                <tr>
                    <td colspan="10" align="center"><label>Seguimiento de citas</label></td>
                </tr>
                <tr>
                    <td><label>Cita:</label></td><td colspan="3"><input type="text" name="cita"></td>
                    <td><label>Domicilio:</label></td><td colspan="3"><input input type="text" name="domicilio"></td>
                    <td><label>Contacto:</label></td><td colspan="3"><input type="text" name="contacto"></td>
                </tr>
                </table>
                <button id="btn-guardar">Guardar datos</button>
            </div>
            <div id="canalizacion">
        <h3>FICHA DE IDENTIFICACIÓN</h3>
                <p>Nombre: <input type="text" name="nombre" size="40"></p>
                <p>Edad: <input type="number" name="edad" min="17"></p>
                <p>Matricula: <input type="text" name="matric"></p>
                <p>Grupo: <input type="text" name="grupo"></p>
                <p>Cuatrimestre: <input type="number" name="cuatri" min="1" max="11"></p>
                <p>Área de canalización:<input type="text" name="a_canalizacion" id="" cols="40" rows="3"></p>
                <p>Fecha: <input type="date" name="fecha"></p>
                <p>Motivo:<textarea type="text" name="motivo" id="" cols="40" rows="3"></textarea></p>
            </div>

            <div id="seguimiento_i">
            <h3>FORMATO DE SEGUIMIENTO</h3>
            <table>
            <tr>
                    <td><label>Fecha/hora de atención:</label></td><td colspan="3"><input type="datetime-local" name="fecha_hora"></td>
                    <td><label>Área de atención:</label></td><td colspan="3"><input input type="text" name="a_atencion"></td>
                    <td><label>Encargado de la atención:</label></td><td colspan="3"><input type="text" name="e_atencion"></td>
                </tr>
                <tr>
                    <td colspan="3"><label>Diagnostico otorgado</label></td>
                    <td colspan="7"><textarea name="text" id="" cols="1000" rows=""></textarea></td>
                </tr>
                <tr>
                    <td colspan="3"><label>Recomendaciones</label></td>
                    <td colspan="7"><textarea name="text" id="" cols="1000" rows=""></textarea></td>
                </tr>
                <tr>
                    <td colspan="10" align="center"><label>Seguimiento de citas</label></td>
                </tr>
                <tr>
                    <td><label>Cita:</label></td><td colspan="3"><input type="text" name="cita"></td>
                    <td><label>Domicilio:</label></td><td colspan="3"><input input type="text" name="domicilio"></td>
                    <td><label>Contacto:</label></td><td colspan="3"><input type="text" name="contacto"></td>
                </tr>
            </table>
            <button id="btn-guardar">Guardar datos</button>
            </div>
            <div id="registro_atencion">
            <h3>FORMATO REGISTRO DE ATENCIÓN INDIVIDUAL</h3>
                <table>
                <tr>
                </tr>
                <tr>
                    <th><label>Fecha:</label></th>
                    <th><label>Motivo de la atención(socioeconómico, personal, académico):</label></th>
                    <th><label>Breve descripción de la situación:</label></th>
                    <th><label>Acciones concretas a llevar a cabo(compromisos tutor/alumnos):</label></th>
                    <th><label>Fecha de la próxima cita de seguimiento:</label></th>
                </tr>
                <tr>
                    <td><input type="date" name="fecha"></td>
                    <td><textarea name="text" name="motivo_atencion" id="" cols="800" rows="5"></textarea></td>
                    <td><textarea name="text" name="descrip" id="" cols="800" rows="5"></textarea></td>
                    <td><textarea name="text" name="acciones" id="" cols="800" rows="5"></textarea></td>
                    <td><input type="date" name="fecha_prox"></td>
                </tr>
                </table>
                <button id="btn-guardar">Guardar datos</button>
            </div>
        <div id="reporte_final">
        <h3>FORMATO DE REPORTE FINAL</h3>
            <table id="datos_t">
                <td><label>Tutor:</label></td><td><input input type="text" name="a_atencion"></td>
                </table><br>
                <table>
                <tr>
                <th  colspan="1"><label></label></th>
                    <th  colspan="3"><label>Casos atendidos:</label></th>
                </tr>
                <tr>
                    <th  colspan=""><label>Impresiones iniciales:</label></th>
                    <th  colspan=""><label>Motivo:</label></th>
                    <th  colspan=""><label>Acciones remediales:</label></th>
                </tr>
                <tr>
                    <td><textarea name="text" name="acciones" id="" cols="600" rows="4"></textarea></td>
                    <td><textarea name="text" name="acciones" id="" cols="400" rows="4"></textarea></td>
                    <td><textarea name="text" name="acciones" id="" cols="400" rows="4"></textarea></td>
                </tr>
                </table>
                <table>
                <tr>
                    <th  colspan=""><label>Impresiones finales:</label></th>
                    <th  colspan=""><label>Recomendaciones de la atención al grupo durante el cuatrimestre siguiente:</label></th>
                    <th  colspan=""><label>Sugerencias al departamento:</label></th>
                </tr>
                <tr>
                    <td><textarea name="text" name="acciones" id="" cols="400" rows="4"></textarea></td>
                    <td><textarea name="text" name="acciones" id="" cols="400" rows="4"></textarea></td>
                    <td><textarea name="text" name="acciones" id="" cols="400" rows="4"></textarea></td>
                </tr>
                </table>
                <button id="btn-guardar">Guardar datos</button>
            </div>
            </form>
</div>
<script type="text/javascript">
    function mostrarDatosPersonales(){
        document.getElementById('datos_personales').style.display='block';
        document.getElementById('seguimiento').style.display='none';
        document.getElementById('canalizacion').style.display='none';
        document.getElementById('seguimiento_i').style.display='none';
        document.getElementById('registro_atencion').style.display='none';
        document.getElementById('reporte_final').style.display='none';
    }
    function mostrarSeguimiento(){
        document.getElementById('datos_personales').style.display='none';
        document.getElementById('seguimiento').style.display='block';
        document.getElementById('canalizacion').style.display='none';
        document.getElementById('seguimiento_i').style.display='none';
        document.getElementById('registro_atencion').style.display='none';
        document.getElementById('reporte_final').style.display='none';
    }
    function mostrarCanalizacion(){
        document.getElementById('datos_personales').style.display='none';
        document.getElementById('seguimiento').style.display='none';
        document.getElementById('canalizacion').style.display='block';
        document.getElementById('seguimiento_i').style.display='none';
        document.getElementById('registro_atencion').style.display='none';
        document.getElementById('reporte_final').style.display='none';
    }
        function mostrarSeguimientoI(){
        document.getElementById('datos_personales').style.display='none';
        document.getElementById('seguimiento').style.display='none';
        document.getElementById('canalizacion').style.display='none';
        document.getElementById('seguimiento_i').style.display='block';
        document.getElementById('registro_atencion').style.display='none';
        document.getElementById('reporte_final').style.display='none';
    }
        function mostrarAtencionIndividual(){
        document.getElementById('datos_personales').style.display='none';
        document.getElementById('seguimiento').style.display='none';
        document.getElementById('canalizacion').style.display='none';
        document.getElementById('seguimiento_i').style.display='none';
        document.getElementById('registro_atencion').style.display='block';
        document.getElementById('reporte_final').style.display='none';
    }
        function mostrarReporteFinal(){
        document.getElementById('datos_personales').style.display='none';
        document.getElementById('seguimiento').style.display='none';
        document.getElementById('canalizacion').style.display='none';
        document.getElementById('seguimiento_i').style.display='none';
        document.getElementById('registro_atencion').style.display='none';
        document.getElementById('reporte_final').style.display='block';
    }
</script>
</body>
</html>
<?php	
}
 ?>