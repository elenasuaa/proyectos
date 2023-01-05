<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
    <title>Actualizar marca</title>
</head>
<body>
    <div  class="form-editar">
        <form action="{{route('marca.actualizar', $id)}}" method="post">
        @csrf
        @method("put")
        <div class="contenedor-ed">
                <div class="form-info">
                    <div class="info">
                    <h2>EDITAR UNA MARCA</h2><br><br>
                    <label class="form-label">Nombre de la marca:</label>
                    <input type="text" name="nombre_marca" value="{{$id->nombre_marca}}" required><br><br>
                        <a href="/NuevaMarca"><button type="button" style="float: center; margin-bottom: 0px 15px" class="btn btn-primary">Regresar</button></a>
                        <button class="btn-guardar" type="submit">Guardar</button>
                    </div>
                    </div>
            </div>
        </form>
    </div>
</body>
</html>