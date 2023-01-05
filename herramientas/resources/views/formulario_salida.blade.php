<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
    <title>Salida</title>
</head>

<body>
    <div  class="form-editar">
    <form action="{{route('salida.insertar', $id)}}" method="post">
        @csrf
        <div class="contenedor-ed">
          <div class="form-info">
          <div class="info">
            <h2>SALIDA</h2><br><br>
            <label for="">Portador:</label>
            <h3>{{ Auth::user()->name }}</h3> <br>
            <input type="hidden" name="fkherramienta" value="{{$id->id}}">
            @foreach ($usuario as $item)
                    <input type="hidden" name="fkpersona" value="{{$item->id}}">
                    @endforeach
            <label for="inputEmail4" class="form-label">Código de identificación:</label>
            <input type="text" name="codigo_ID" value="{{$id->codigo_ID}}" class="form-control" disabled>
            <label for="inputPassword4" class="form-label">Nombre de la herramienta:</label>
            <input type="text" name="nombre_hta" value="{{$id->nombre_hta}}" class="form-control" disabled>
            <label for="inputAddress2" class="form-label">Cantidad en existencia:</label>
            <input type="number" name="stock" class="form-control" value="{{$id->stock}}" disabled>
          <label for="">Cantidad retirada:</label>
          <input type="number" name="cantidad">
          <a href="/lista_producto"><button type="button" style="float: center; margin-bottom: 0px 15px" class="btn btn-primary">Regresar</button></a>
          <button type="submit" class="btn-guardar" value="Guardar">Guardar</button>
          </div>
          </div>
        </div>
      </form>
</div>
</div>
@include('sweetalert::alert')

</body>
</html>


