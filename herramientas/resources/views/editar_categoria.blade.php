<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
    <title>Actualizar categoria</title>
</head>

<body class="fondo-editar">
<div  class="form-editar">
    <form action="{{route('cat.actualizar', $id)}}" method="post">
    @csrf
    @method("put")
    <div class="contenedor-ed">
        <div class="form-info">
            <div class="info">
            <h2>ACTUALIZAR CATEGORÍA</h2><br><br>
            <label class="form-label">Nombre de la categoría:</label>
            <input type="text" name="nombre_cat" value="{{$id->nombre_cat}}" required><br><br>
            <a href="/NuevaCategoria"><button type="button" style="float: center; margin-bottom: 0px 15px" class="btn btn-primary">Regresar</button></a>
            <button class="btn-guardar" type="submit">Guardar</button>
            </div>
        </div>
    </div>
    </form>
</div>
</body>
</html>