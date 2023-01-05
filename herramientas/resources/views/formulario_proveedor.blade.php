<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Document</title>
</head>
<body class="body-fondo">
<!-- <div class="linea"></div>
    <div class="titulo">
    </div><br><br> -->
    <div class="container-form">
    <div class="form-f">
    <h1>AGREGAR NUEVO PROVEEDOR</h1><br><br>
    <form action="{{route('proveedor.insertar')}}" method="post">
        @csrf
            <label class="form-label">Nombre del proveedor:</label><br><br>
            <input type="text" name="nombre_prov" required><br><br>
            <label class="form-label" >Teléfono:</label><br><br>
            <input type="text" name="telefono" required ><br><br>
        <a href="./dashboard"><button type="button" style="float: left; margin: 0px 20px">Regresar</button></a>
        <button type="submit" value="Guardar">Guardar</button>
      </form>
    </div>   
        <div class="form-r">
        <section>
            <h1>LISTA DE PROVEEDORES REGISTRADOS</h1><br><br>
            <table class="content-table">
                <thead>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                @foreach ($pro as $fila)
                    <tr>
                    <td>{{$fila->nombre_prov}}</td>
                    <td>{{$fila->telefono}}</td> 
                    <td>
                    <div class="botones">
                    <a style="float: left; margin: 0px 5px" href="{{route('pro.editar', $fila->id)}}"><button class="btn-ed">Editar</button></a>
                    <form action="{{route('pro.eliminar', $fila->id)}}" method="post">
                        @csrf 
                        @method("delete")
                    </div>
                    <button class="btn-e" type="submit" value="Eliminar">Eliminar</button>
                    </form>
                </td>
                    </tr>
                    @endforeach  
                </tbody>
            </table>
     </section>  
     </div> 
     @include('sweetalert::alert')

</body>
</html>