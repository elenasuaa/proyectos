<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir producto</title>
    <link rel="stylesheet" type="text/css" href="estilo1.css">
</head>
<body>
        <form action="{{route('producto.insertar')}}" method="post">
            @csrf
            @method("put")
            <div class="cuadro">
	            <div class="container">
                    <div class="info">
			            <div class="form">
                        <div class="left_info">
                            <h1>Inventario de herramientas</h1>
                                <p>Un sistema de inventario tiene un papel vital para funcionar acorde y coherente dentro del proceso de producción.</p><br><br>
                        <div align="center"><img src="icon.PNG"></div></div>
			        </div>
                <div class="info2">
                <h2>REGISTRA UN NUEVO PRODUCTO</h2><br><br>
                <form>
                    <label for="">Nombre:</label><br>
                        <div class="input-group">
                            <input type="text" name="nombre" placeholder="Nombre del producto" required=""> 
                        </div>
                    <label for="">Descripción:</label><br>
                        <div class="input-group">
                        <textarea type="text" name="descripcion" id="" cols="30" rows="10" placeholder="Descripción del producto"  required=""></textarea>
                        </div>
                    <label for="">Precio:</label><br>
                        <div class="input-group">
                            <input type="text" name="precio" placeholder="$ MXN" required=""> 
                        </div>
                    <label for="">Costo:</label><br>
                        <div class="input-group">
                            <input type="text" name="costo" placeholder="$ MXN" required=""> 
                        </div>
                    <label for="">Cantidad:</label><br>
                        <div class="input-group">
                            <input type="text" name="stock" placeholder="" required=""> 
                        </div>
                    <label for="">Categoría:</label><br>
                        <div class="input-group">
                            <input type="text" name="fkcategoria" placeholder="" required=""> 
                        </div>
                    <button class="btn btn-danger btn-block" type="submit">Guardar</button >
                </form>
            </div>
        </div>
    </form>
</body>
</html>