<html>
    <head>
        <title>Regístrate</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <link rel="stylesheet" type="text/css" href="css/estilo_sesion.css">
    </head>
    <body>
        </style>
        <div align="center">
            <br><br><br><br>
            <h1>¡Te damos la bienvenida!</h1><br><br><br><br>
            <form action="" method="POST">
                <h2>Regístrate</h2><br>
                <div class="sesion">
                <input type="text" name="nombre(s)" placeholder="Nombre(s)" required="" class="registro"><br><br>
                <input type="text" name="ap" placeholder="Apellidos" required="" class="registro"><br><br>
                <input type="date" name="fec_nac" placeholder="Fecha de nacimiento" required="" class="registro"><br><br>
                <input type="text" minlength="10" maxlength="10" pattern="[0-9]+" name="num_cel" placeholder="Escribe tu número de celular a 10 dígitos" required="" class="registro"><br><br>
                <input type="email" name="email" placeholder="Correo electrónico" required="" class="registro"><br><br>
                <input type="password" name="contraseña" placeholder="Escribe una contraseña" required="" class="registro">
                </div><br><br>
                <input type="submit" value="Iniciar sesión" class="btn"><br><br>
                ¿Ya tienes una cuenta? <a href="inicio_sesion.php">Iniciar sesión</a>
            </form>
        </div>
    </body>
</html>