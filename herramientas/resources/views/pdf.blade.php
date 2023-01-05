<html>
    <head>
        <title>Reporte Inventario</title>
        <link rel="stylesheet" type="text/css" href="estilos.css" />
        <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
    </head>
    <body>
        <style>
            table {
            width: 100%;
            font-family: Century Gothic;
            font:13px Arial;
            text-align:center;
            border-collapse:collapse;
            }
            table th {
                font-family: Century Gothic;
                font: 14px Arial;
                background-color: #DEEAF6;
                padding: 8px 10px;

            }

            h3{
                font-family: Century Gothic;
                font:bold 20px Arial;
            }

            td{
                text-transform: uppercase;
                padding: 5px;
            }
        </style>


<div align="right">

        <h3>Reporte de Inventario - JDK TOOLS</h3>
        <h4> {{$today}}</h4>
        <h4>Escuinapa de Hidalgo, Sinaloa.</h4>
</div>

<div>
    <h4>Control de Productos</h4>
    <h4>Nombre del contrubuyente: {{ Auth::user()->name }}</h4>
</div>
        <table border="1">
            <tr>
                    <th>Código ID</th>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Estado</th>    
                    <th>Tipo de hta.</th>   
                    <th>Categoría</th>
                    <th>Marca</th>    
                    <th>Fecha - Hora</th>   
            </tr>
            @foreach ($productos as $fila)
 				<tr class="fila_par">
                    <td >{{$fila->codigo_ID}}</td>                   
                    <td>{{$fila->nombre_hta}}</td>
                    <td>{{$fila->stock}}</td>
                    <td>{{$fila->estado}}</td>
                    <td>{{$fila->tipo_hta}}</td>
                    <td>{{$fila->nombre_cat}}</td>
                    <td>{{$fila->nombre_marca}}</td>
                    <td>{{$fila->created_at}}</td>
 				</tr>
            @endforeach  
        </table>
    </body>







<body>
    
<div>
    <h4>Control de movimientos (Entrada)</h4>
 
</div>
 	<div>
     <table border="1">
            <thead>
                    <th>Código ID</th>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Estado</th>    
                    <th>Tipo de hta.</th>   
                    <th>Categoría</th>
                    <th>Marca</th>    
                    <th>Fecha - Hora</th>   
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
 				</tr>
            @endforeach  
 			</tbody>
 		</table>
    </div>

    </body>



    <body>
    <div>
    <h4>Control de movimientos (Salida)</h4>
   
</div> 
   
    <div >
     <table border="1">
            <thead>
                    <th>Código ID</th>
                    <th>Nombre</th>
                    <th>Cant. en existencia</th>
                    <th>Estado</th>    
                    <th>Tipo de hta.</th>   
                    <th>Categoría</th>
                    <th>Marca</th>    
                    <th>Fecha - Hora</th>   
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
 				</tr>
            @endforeach  
 			</tbody>
 		</table>
    </div>
    </body>
 </html>