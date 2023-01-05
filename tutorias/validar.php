<?php 

$matricula=$_POST["matricula"];
$contraseña=$_POST["contraseña"];

require_once("clases/clase_usuario.php");
$usuario=new Usuario();

$resultado=$usuario->buscar($matricula, $contraseña);

$validacion=mysqli_num_rows($resultado);

 if ($validacion==1) {
 	session_start();
 	$_SESSION["usuario"]=$matricula;
 	header("location: index.php");
 }else if($validacion==0){
 	echo "<meta http-equiv='REFRESH' content='0; url=inicio_sesion.php'>
	 <script type='text/javascript'>
	 alert('Matricula y/o contraseña incorrecta');
	 </script>";
	 
 }
 ?>