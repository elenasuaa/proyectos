<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar producto</title>
    <link rel="stylesheet" type="text/css" href="../../estilo1.css">
</head>
<body>
    <form action="{{route('producto.actualizar', $producto)}}" method="post">
        @csrf
        @method("put")
        <div class="cuadro">
	        <div class="container">
            <div class="info">
                <div class="form">
                <div class="left_info">
                <br><br><br><br><br><br><h1>Actualizar producto</h1><br>
                    <div align="center"><img src="../../actualizacion.png"/></div></div>
			    </div>
                <div class="info2">
                <h2>EDITAR UN PRODUCTO</h2><br><br>
                <form>
                    <label for="">Nombre:</label><br>
                        <div class="input-group">
                            <input type="text" name="nombre" value="{{$producto->nombre}}">
                        </div>
                    <label for="">Descripción:</label><br>
                        <div class="input-group">
                            <textarea type="text" name="descripcion" id="" cols="30" rows="10">{{$producto->descripcion}}</textarea>
                        </div>
                    <label for="">Precio:</label><br>
                        <div class="input-group">
                            <input type="text" name="precio" value="{{$producto->precio}}">
                        </div>
                    <label for="">Costo:</label><br>
                        <div class="input-group">
                            <input type="text" name="costo" value="{{$producto->costo}}">
                        </div>
                    <label for="">Cantidad:</label><br>
                        <div class="input-group">
                            <input type="text" name="stock" value="{{$producto->stock}}">
                        </div>
                    <label for="">Categoría:</label><br>
                        <div class="input-group">
                            <input type="text" name="fkcategoria" value="{{$producto->fkcategoria}}"><br><br>
                        </div>
                        <button class="btn btn-danger btn-block" type="submit">Actualizar</button >
                        <p class="account">¿Deseas agregar un nuevo producto?<a href="/formulario"> Agregar</a></p>
                </form>
            </div>
        </form>
    </div>
</body>
</html>