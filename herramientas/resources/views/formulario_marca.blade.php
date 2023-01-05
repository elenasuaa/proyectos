<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Document</title>
</head>
<body class="body-fondo">
<!-- <div class="linea"></div>
    <div class="titulo">
    </div><br><br> -->
    <div class="container-form">
    <div class="form-f">
        <h1>AGREGA UNA NUEVA MARCA</h1><br>
                <form action="{{route('marca.insertar')}}" method="post">
                    @csrf
                        <label >Nombre de la marca:</label><br>
                        <input type="text" name="nombre_marca" required > <br><br>
                            <a href="./dashboard"><button type="button" style="float: left; margin: 0px 20px">Regresar</button></a>
                            <button type="submit" value="Guardar">Guardar</button>
                </form>
            </div>
            
        <div class="form-r">
        <section>
            <h1>LISTA DE MARCAS REGISTRADAS</h1><br>
            <table class="content-table">
                <thead>
                    <th>Marca</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                @foreach ($marca as $fila)
                    <tr>
                    <td>{{$fila->nombre_marca}}</td> 
                    <td>
                    <div class="botones">
                    <a style="float: left; margin: 0px 30px"  href="{{route('marca.editar', $fila->id)}}"><button class="btn-ed">Editar</button></a>
                    <form action="{{route('marca.eliminar', $fila->id)}}" method="post">
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
        <!-- <div class="form-f">
        <h1>Agregar nueva marca</h1><br>
                <form action="{{route('marca.insertar')}}" method="post">
                    @csrf
                        <label >Nombre de la marca:</label>
                        <input type="text" name="nombre_marca" ><br>
                            <a href="./dashboard"><button type="button" style="float: left; margin: 0px 20px">Regresar</button></a>
                            <button type="submit" value="Guardar">Guardar</button>
                </form>
            </div> -->
        </div>
        @include('sweetalert::alert')

</body>

</html>