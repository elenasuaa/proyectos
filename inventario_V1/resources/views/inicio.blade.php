<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <div class="cuadro">
        <form action="" method="post">
        @csrf
            <div class="container">
                <div class="form-info">
                    <div class="info">
                    <h2>Login</h2>
                        <div class="input-group">
                            <input for="" type="email" name="correo" placeholder="Correo" required="">
                        </div>
                        <div class="input-group">
                            <input for="" type="password" name="contra" placeholder="Contraseña" required="">
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Iniciar Sesión</button>
                        <p class="account">¿No tienes una cuenta?<a href="registrar"> Registráte</a></p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>