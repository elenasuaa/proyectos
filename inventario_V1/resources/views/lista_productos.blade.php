<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" type="text/css" href="estilo2.css">
</head>
<body>
<div class="container"><br><br><br>
    <div align="center">
    <h2>PRODUCTOS</h2><br>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Costo</th>
                    <th>Descripción</th>    
                    <th>Cantidad</th>   
                    <th>Categoría</th>    
                    <th>Opciones</th>         
                </tr>
            </thead>
            <tbody>
            @foreach ($productos as $fila)
                    <tr>
                    <td>{{$fila->nombre}}</td>                   
                    <td>${{$fila->costo}}.MXN</td>
                    <td>{{$fila->descripcion}}</td>
                    <td>{{$fila->stock}}</td>
                    <td>{{$fila->fkcategoria}}</td>
                        <th> 
                            <a href="{{route('producto.editar', $fila->id)}}">Actualizar producto</a><br>
                            <a href="{{route('formulario.compra', $fila->id)}}">Comprar</a><br>
                        </th>
                    </tr>
            @endforeach    
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>