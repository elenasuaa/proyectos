<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar producto</title>

    <link rel="stylesheet" type="text/css" href="../../estilo3.css">
</head>
<body>
        <form action="{{route('producto.comprar', $producto)}}" method="post">
        @csrf
        <div class="cuadro">
	            <div class="container">
                    <div class="info">
			            <div class="form">
                        <div class="left_info">
                            <h1>Comprar producto</h1><br>
                        <div align="center"><img src="../../herramienta.png"></div></div>
			        </div>
                <div class="info2">
                <h2>COMPRAR {{$producto->nombre}}</h2><br><br>
                    <form>
                        <label for="">Nombre:</label><br>
                            <div class="input-group">
                                <input type="text" name="nombre" placeholder="Nombre del producto" required=""> 
                            </div>
                        <label for="">Cantidad:</label><br>
                            <div class="input-group">
                                <input type="text" name="stock" placeholder="Cantidad de productos" required=""> 
                            </div>
                        <label for="">Costo total:</label><br>
                            <div class="input-group">
                                <input type="text" name="costo" placeholder="Costo del producto" required=""> 
                            </div>
                            @php
                            use App\Models\cliente;
                            $clientes=cliente::all();
                            @endphp
                            <select name="fkcliente" id="">
                                <option value="">Seleccione una opción</option>
                                @foreach($clientes as $fila)
                                <option value="{{$fila->id}}">{{$fila->nombre}}</option>
                                @endforeach
                            </select><br><br>
                        <button class="btn btn-danger btn-block" type="submit">Comprar</button>
                        <div class="input-group">
                        <input type="hidden" name="fkproducto" id="" value="{{$producto->id}}">
                        </div>
                        <p class="account">¿Deseas agregar un nuevo producto?<a href="/formulario"> Agregar</a></p>
                </form> 
            </div>
        </div>             
    </form>
</body>
</html>