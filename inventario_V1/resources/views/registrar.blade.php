<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <div class="cuadro">
        <form action="{{route('usuario.insertar')}}" method="post">
            @csrf
            <div class="container">
                <div class="form-info">
                    <div class="info">
                        <h2>Registráte</h2><br>
                        <form action="#" method="post">
                            <div class="input-group">
                            <input for="" type="text" name="nombre_usuario" placeholder="Nombre de usuario" required="">
                            </div>
                            <div class="input-group">
                            <input for="" type="email" name="correo" placeholder="Correo" required="">
                            </div>
                            <div class="input-group">
                            <input for="" type="password" name="contra" placeholder="Contraseña" required="">
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">Registrar</button>
                            <p class="account">¿Ya tienes una cuenta?<a href="/"> Iniciar Sesión</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>