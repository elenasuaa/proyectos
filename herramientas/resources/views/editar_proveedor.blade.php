<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
    <title>Actualizar proveedor</title>
</head>
<body class="fondo-editar">
    <div  class="form-editar">
    <form action="{{route('pro.actualizar', $id)}}" method="post">
             @csrf
        @method("put")
        <div class="contenedor-ed">
                <div class="form-info">
                    <div class="info">
                        <h2>ACTUALIZAR PROVEEDOR</h2><br><br>
                        <label class="form-label">Nombre del proveedor:</label>
                        <input type="text" name="nombre_prov" value="{{$id->nombre_prov}}" required><br><br>
                        <label class="form-label">Teléfono:</label>
                        <input type="text" name="telefono" value="{{$id->telefono}}" required><br><br>
                            <a href="/NuevoProveedor"><button type="button" style="float: center; margin-bottom: 0px 15px" class="btn btn-primary">Regresar</button></a>
                            <button class="btn-guardar" type="submit">Guardar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>