<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>Registro</title>
</head>

<body>
<div class="form-registro">
    <h1>FORMULARIO DE REGISTRO</h1>
    <form action="{{route('herramienta.insertar')}}" method="post">
    @csrf
    <div class="formulario">
    <h2>REGISTRA UNA NUEVA HERRAMIENTA</h2><br><hr><br><br>
      <div class="form-izq">
          <label for="">Código de identificación:</label><br>
          <input type="text" name="codigo_ID" required><br>
          <label for="">Nombre de herramienta:</label><br>
          <input type="text" name="nombre_hta" required><br>
          <label for="">Cant. en existencia:</label><br>
          <input type="number" name="stock" required><br><br>
        </div>
        <div class="form-der">
          <label for="">Tipo de herramienta:</label><br>
          <select name="fktipo_hta" id="" required><br>
          <option value="">Selecciona un tipo de hta</option><br>
          @foreach ($tipo as $item)
          <option value="{{$item->id}}">{{$item->tipo_hta}} -- {{$item->nombre_cat}}</option>
          @endforeach
          </select><br>
          <label for="">Marca:</label><br>
          <select name="fkmarca" id="">
              <option value="">Selecciona una marca</option>
              @foreach ( $marca as $item)
              <option value="{{$item->id}}">{{$item->nombre_marca}}</option>
              @endforeach
          </select><br>
          <label for="">Estado:</label><br>
          <input type="text" name="estado" required></label><br><br>
          <!-- <textarea name="estado" id="" cols="50" rows="2"></textarea><br><br> -->
        
        </div class="btn-form" align="center">
        <div class="btn-registro">
        <a href="./dashboard"><button type="button">Regresar</button></a>
        <button class="btn-guardar" type="submit">Guardar</button>
        </div>
      </div>
  </form>
</div>
@include('sweetalert::alert')

</body>

</html>


