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
    <h1>ÍNDICE DE REGISTROS</h1><br>
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
    
     <table class="tb-lista" id="example">
            <thead>
                    <th>Código ID</th>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Estado</th>    
                    <th>Tipo de hta</th>   
                    <th>Categoría</th>
                    <th>Marca</th>    
                    <th>Fecha - Hora</th> 
                    <th>Movimientos</th> 
                    <th>Opciones</th> 
 			</thead>
 			<tbody>
            @foreach ($productos as $fila)
 				<tr>
                    <td>{{$fila->codigo_ID}}</td>                   
                    <td>{{$fila->nombre_hta}}</td>
                    <td>{{$fila->stock}}</td>
                    <td>{{$fila->estado}}</td>
                    <td>{{$fila->tipo_hta}}</td>
                    <td>{{$fila->nombre_cat}}</td>
                    <td>{{$fila->nombre_marca}}</td>
                    <td>{{$fila->created_at}}</td>
                    <td>
                    <button class="btn-l"> <a href="{{route('pro.entrada', $fila->id)}}">Entrada</a></button>
                    <button class="btn-l"> <a href="{{route('pro.salida', $fila->id)}}">Salida</a></button>
                    </td>
                    <td>
                        <a style="margin: 0px 10px"  href="{{route('hta.editar', $fila->id)}}"><button class="btn-ed">Editar</button></a>
                    <form action="{{route('hta.eliminar', $fila->id)}}" method="post">
                        @csrf 
                        @method("delete")
                        <button class="btn-e" type="submit" value="Eliminar">Eliminar</button>
                    </td>
                    
                    </div>
                    
                    </form>
                </td>
 				</tr>
            @endforeach  
 			</tbody>
 		</table>
    </div>
    <center>
    <div>
      <a href="./dashboard"><button class="btn-regresar" type="button" style="float: center; margin-bottom: 0px">Regresar</button></a>
            <a href="/NuevaHerramienta"><button type="button" class="btn-ag">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wrench-adjustable-circle-fill" viewBox="0 0 16 16">
        <path d="M6.705 8.139a.25.25 0 0 0-.288-.376l-1.5.5.159.474.808-.27-.595.894a.25.25 0 0 0 .287.376l.808-.27-.595.894a.25.25 0 0 0 .287.376l1.5-.5-.159-.474-.808.27.596-.894a.25.25 0 0 0-.288-.376l-.808.27.596-.894Z"></path>
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16Zm-6.202-4.751 1.988-1.657a4.5 4.5 0 0 1 7.537-4.623L7.497 6.5l1 2.5 1.333 3.11c-.56.251-1.18.39-1.833.39a4.49 4.49 0 0 1-1.592-.29L4.747 14.2a7.031 7.031 0 0 1-2.949-2.951ZM12.496 8a4.491 4.491 0 0 1-1.703 3.526L9.497 8.5l2.959-1.11c.027.2.04.403.04.61Z"></path>
        </svg>
                Agregar nueva herramienta
                    </button></a> 
      </div>
</center>
@include('sweetalert::alert')
</body>
</html>