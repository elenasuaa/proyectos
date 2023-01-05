<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>

<body class="body-fondo">
<!-- <div class="linea"></div>
    <div class="titulo">
    </div><br><br> -->
    <div class="container-form">
    <div class="form-f">
    <h1>AGREGAR NUEVA CATEGORÍA</h1><br><br>
        <form action="{{route('categoria.insertar')}}" method="post">
            @csrf
            <label>Nombre de la categoría:</label><br><br>
            <input type="text" name="nombre_cat" required><br><br><br>
        <a href="./dashboard"><button type="button" style="float: left; margin: 0px 20px">Regresar</button></a>
        <button type="submit" value="Guardar">Guardar</button>
        </form>
    </div>
        <div class="form-r">
        <section>
            <h1>LISTA DE LAS CATEGORÍAS REGISTRADAS</h1><br><br>
            <table class="content-table">
                <thead>
                    <th>Categoría</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                @foreach ($cat as $fila)
                    <tr>
                    <td>{{$fila->nombre_cat}}</td>
                    <td>
                    <div class="botones">
                    <a style="float: left; margin: 0px 5px"  href="{{route('cat.editar', $fila->id)}}"><button class="btn-ed">Editar</button></a>
                    <form  action="{{route('cat.eliminar', $fila->id)}}" method="post">
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
</div>
@include('sweetalert::alert')

</body>
</html>



<script>
    $('#eliminar').submit(function (e) {
    e.preventDefault();

    var form = $(this);
    
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!", 
        closeOnConfirm: false
    }, function (isConfirmed) {
        if (isConfirmed) {
            form.submit();
        }
    });

    return false;
});
</script>