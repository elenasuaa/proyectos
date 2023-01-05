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
    <!-- <div class="titulo">
    </div><br><br> -->
    <div class="container-form">
    <div class="form-f">
        <h1>AGREGAR NUEVO TIPO DE HERRAMIENTA</h1><br><br>
            <form action="{{route('tipo.insertar')}}" method="post">
            @csrf
                <label>Tipo herramienta:</label>
                <input type="text" name="tipo_hta" required><br><br>
                <label>Categoría:</label>
                <select name="fkcategoria" required>
                <option value="">Seleccionar una categoría</option>
                    @foreach ($categoria as $item)
                    <option value="{{$item->id}}">{{$item->nombre_cat}}</option>
                    @endforeach
                </select><br><br>
            <a href="./dashboard"><button type="button" style="float: left; margin: 0px 20px">Regresar</button></a>
            <button type="submit"value="Guardar">Guardar</button>
        </form>
        </div>   
        <div class="form-r">
        <section>
                <h1>LISTA DE CATEGORÍAS REGISTRADAS</h1><br><br>
            <table class="content-table">
                <thead>
                    <th>Tipo de hta</th>
                    <th>Categoría</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                @foreach ($tipo as $fila)
                    <tr>
                    <td>{{$fila->tipo_hta}}</td>
                    <td>{{$fila->nombre_cat}}</td>
                    <td>
                    <div class="botones">
                    <a  href="{{route('tipo.editar', $fila->id)}}"><button class="btn-ed">Editar</button></a>
                    <br><form action="{{route('tipo.eliminar', $fila->id)}}" method="post">
                        @csrf 
                        @method("delete")
                        </div>
                        <button class="btn-e" type="submit" value="Eliminar">Eliminar</button>
                    </form>
                    </form>
                </td>
                    </tr>
                    @endforeach  
                </tbody>
            </table>
        </section>
        </div>
        </div>
        @include('sweetalert::alert')

</body>
</html>