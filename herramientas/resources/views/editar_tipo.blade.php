<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
    <title>Actualizar</title>
</head>
<body class="fondo-editar">
    <div  class="form-editar">
    <form action="{{route('tipo.actualizar', $id)}}" method="post">
        @csrf
        @method("put")
        <div class="contenedor-ed">
            <div class="form-info">
                <div class="info">
                <h2>ACTUALIZAR TIPO DE HTA</h2><br><br>
                <label class="form-label">Tipo de herramienta:</label>
                <input type="text" name="tipo_hta" value="{{$id->tipo_hta}}" required><br><br>
                <label for="">Categoría:</label>
                <select name="fkcategoria" id="" required>
                <option value="">Selecciona una categoría</option>
                @foreach ($categoria as $item)
                <option value="{{$item->id}}">{{$item->nombre_cat}}</option>
                @endforeach
            </select><br><br>
            <a href="/NuevoTipo"><button type="button" style="float: center; margin-bottom: 0px 15px" class="btn btn-primary">Regresar</button></a>
            <button class="btn-guardar" type="submit">Guardar</button>
            </div>
        </div>
    </div>

    </form>
</div>
</body>
</html>