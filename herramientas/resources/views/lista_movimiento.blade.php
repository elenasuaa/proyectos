<!DOCTYPE html>
<html lang="en">
<head>
    <title>Productos</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
 	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
</head>
<style>
</style>
<body>

<!-- <div class="linea"></div>
    <div class="titulo">
    </div><br><br> -->
    <center>
    <div class="container" align="center">
    <h1>ÍNDICE DE MOVIMIENTOS</h1><br>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

 	<!-- <script type="text/javascript">$(document).ready(function() {
    $('#example').DataTable();} );</script> -->
<script>
   $(document).ready(function() {    
    $('#example').DataTable({
    //para cambiar el lenguaje a español
        "language": {
                "lengthMenu": "Lista de registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de MAX registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":" Siguiente",
                    "sPrevious": "Anterior "
			     },
			     "sProcessing":"Procesando...",
            }
    });     
});
</script>


 	<div class="container">
     <a href="/Lista_Movimiento"><button type="button" class="btn-l">Entrada</button></a>
     <a href="/Lista_Salida"><button type="button" class="btn-l">Salida</button></a>

     <table class="tb-lista" id="example" style="width:100%">
            <thead>
                    <th>Código ID</th>
                    <th>Nombre Herramienta</th>
                    <th>Cantidad Ingresada</th>
                    <th>Persona</th>
                    <th>Fecha y hora</th>  
 			</thead>
 			<tbody>
             @foreach ($entrada as $fila)
 				<tr>
                    <td>{{$fila->codigo_ID}}</td>                   
                    <td>{{$fila->nombre_hta}}</td>
                    <td>{{$fila->cantidad}}</td>
                    <td>{{$fila->name}}</td>
                    <td>{{$fila->created_at}}</td>
 				</tr>
            @endforeach  
 			</tbody>
 		</table>
    </div>
    <center>
    <div class="col-6">
      <a href="./dashboard"><button type="button">REGRESAR</button></a>
      </div>
</center>
@include('sweetalert::alert')

</body>
</html>