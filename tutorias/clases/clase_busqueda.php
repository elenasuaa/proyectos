<?php
include 'clases/connect.php';

if(!isset($_POST['buscar'])){
    $_POST['buscar'] = "";
    $buscar = $_POST['buscar'];
}

$buscar = $_POST['buscar'];

$SQL_READ = "SELECT * FROM alumno a INNER JOIN grupo g ON a.fkgrupo=g.idgrupo INNER JOIN carrera c ON c.idcarrera=g.fkcarrera 
WHERE (matricula LIKE '%".$buscar."%' OR nom_alumno LIKE '%".$buscar."%' OR apellido_p LIKE '%".$buscar."%' OR apellido_m LIKE '%".$buscar."%' 
OR nom_carrera LIKE '%".$buscar."%' OR cuatri LIKE '%".$buscar."%' OR nom_grupo LIKE '%".$buscar."%' OR tel LIKE '%".$buscar."%' 
OR direcc LIKE '%".$buscar."%') AND a.estatus=1";
$sql_query =  mysqli_query($conn,$SQL_READ);

?>
