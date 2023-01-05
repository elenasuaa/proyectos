<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
    <title>Registro</title>
</head>

<body>
<div class="form-registro">
    <h1>FORMULARIO DE REGISTRO</h1>
    <form action="{{route('hta.actualizar', $id)}}" method="post">
             @csrf
        @method("put")
    <div class="formulario">
    <h2>ACTUALIZAR PRODUCTO</h2><br><hr><br><br><br>
      <div class="form-izq">
          <label for="">Código de identificación:</label><br>
          <input type="text" name="codigo_ID" value="{{$id->codigo_ID}}" required><br>
          <label for="">Nombre de herramienta:</label><br>
          <input type="text" name="nombre_hta" value="{{$id->nombre_hta}}" required><br>
          <label for="">Estado:</label><br>
          <input type="text" name="estado" value="{{$id->estado}}" required></label><br>
        </div>
        <div class="form-der">
          <label for="">Tipo de herramienta:</label><br>
         
          <select name="fktipo_hta" id="" required><br>
          @foreach ($tipo as $item)
                <option @if ($id->fktipo_hta==$item->id)
                    selected
                @endif value="{{$item->id}}">{{$item->tipo_hta}} -- {{$item->nombre_cat}}</option>
            @endforeach
          </select><br>

          <label for="">Marca:</label><br>
          <select name="fkmarca" id="">
          @foreach ($marca as $item2)
                <option @if ($id->fkmarca==$item2->id)
                    selected
                @endif value="{{$item2->id}}">{{$item2->nombre_marca}}</option>
            @endforeach
          </select><br><br>
          <!-- <textarea name="estado" id="" cols="50" rows="2"></textarea><br><br> -->
        
        </div class="btn-form" align="center">
        <div class="btn-registro">
        <a style="float: left; margin: 0px 80px"  href="/lista_producto"><button type="button">Regresar</button></a>
        <button class="btn-guardar" type="submit">Guardar</button>
        </div>
      </div>
  </form>
</div>
@include('sweetalert::alert')

</body>

</html>
