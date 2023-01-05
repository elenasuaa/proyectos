<?php

include ("clases/clase_busqueda.php");
require_once("seguridad.php");
require_once("clases/clase_alumno.php");
require_once("clases/clase_usuario.php");


$alumno=new Alumno();

$registros=$alumno->mostrar();
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Página principal</title>
	<link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">

</head>
<body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="sweetalert/sweetalert2@11.js"></script> -->
    <!-- <script src="sweetAlert.js"></script> -->

    <div id="name">
        <span alt="Application" title="Application" height="70" width="1100">Universidad Tecnológica de Escuinapa</span>
        <div id="navbar">  
        <div id="navbar-entry"><a href="cerrar_sesion.php">Salir</a></div>    
                <!-- <div id="navbar-entry"><input id="btn-salir" type="submit" onclick="ConfirmSalir()" value="Salir" ></div> -->
                <div id="navbar-entry">Bienvenido: <?php echo $_SESSION["usuario"]; ?></div>  
        </div><br><br>
        <nav>
            <a id="nav-inicio">Inicio</a>
            <a href="" id="registro">Registrar nueva carrera</a>
            <a href="" id="registro">Registrar nuevo grupo</a>
        </nav>
            <div id="container">
                <h2>Oficina Integral de Atención Estudiantil</h2>   
            <br><br>
            </div>  
        <div>
        <form id="busqueda" method="POST" action="index.php">
            <fieldset>
            <input type="text" id="buscar" value="" size="30" maxlength="4000" name="buscar"/>
            <button value="Buscar">Buscar</button>
            <a id="btn-agregar" href="formulario.php">Canalizar</a>
            </fieldset>
        </form>
        <br><br>
        <table>
                <tr>
                    <th>Formatos</th>
                    <th>Matricula</th>
                    <th>Nombre</th>
                    <th>Paterno</th>
                    <th>Materno</th>
                    <th>F. Nacimiento</th>
                    <th>Carrera</th>
                    <th>Cuatrimestre</th>
                    <th>Grupo</th>
                    <th>Teléfono</th>
                    <th>Celular</th>
                    <th>Dirección</th>
                    <th>Editar</th>
                    <th>Baja</th>
                    <th>Eliminar</th>
                </tr>
                    <?php 

                    while ($fila=mysqli_fetch_array($sql_query)) {
                ?>
                <tr>
                    <td><a id="btn-c" href="area_c.php?idalumno=<?=$fila['idalumno']?>"><img src="imagenes/c.png" alt=""></a></td>
                    <td> <?=$fila["matricula"]?> </td>  
                    <td> <?=$fila["nom_alumno"]?> </td>  
                    <td> <?=$fila["apellido_p"] ?> </td>
 			        <td> <?=$fila["apellido_m"] ?> </td>
                    <td> <?=$fila["fecha_nac"]?> </td>  
                    <td> <?=$fila["nom_carrera"]?> </td>  
                    <td> <?=$fila["cuatri"]?> </td>  
                    <td> <?=$fila["nom_grupo"]?> </td> 
                    <td> <?=$fila["tel"]?> </td> 
                    <td> <?=$fila["cel"]?> </td> 
                    <td> <?=$fila["direcc"]?> </td> 
                    <td><a id="btn-c" href="editar_alumno.php?idalumno=<?=$fila['idalumno']?>"><img src="imagenes/editarr.png" alt=""></a></td>
                    <td><a id="btn-c"><img src="imagenes/baja.png" onclick="" name="ConfirmBaja"></a></td>
                    <td><a id="btn-c" href="eliminar_alumno.php?idalumno=<?=$fila['idalumno']?>"><img src="imagenes/eliminar.png" onclick="return ConfirmDelete()"></a></td>
            </tr>
            <?php
                }
                ?>
        </table> 
        </div>
        </div> 
        </div>
    </div>
</div>
<script type="text/javascript">

    function ConfirmDelete(){
        var respuesta = confirm("¿Estas seguro que deseas eliminar este registro?");
        if (respuesta == true){
            return true;
        }
        else{
            return false;
        }
    }

    // function ConfirmBaja(){
    //     var respuesta = confirm("¿Estas seguro que deseas dar de baja este registro?");
    //     if (respuesta == true){
    //         return true;
    //     }
    //     else{
    //         return false;
    //     }
    // }
    </script>

    <script type="text/javascript">
        function ConfirmBaja(){
            Swal.fire({
                title: '¿Seguro que quieres cerrar la sesión?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'black',
                cancelButtonColor: 'red',
                confirmButtonText: 'Cerrar sesión'
            }).then((result) => {
                if (result.isConfirmed){
                    window.location='baja_alumno.php?idalumno=<?=$fila['idalumno']?>';
                }else{Swal.fire('No cerraste sesión', '', 'info')}
            })
        }
    </script>
</body>
</html>
