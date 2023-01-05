<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | MagicWebNotes</title>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/estilo.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@200&family=Poppins:wght@300;500&display=swap" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

</head>
<style>
    element.style {}

    .form-signin {
        /* max-width: 50%; */
        margin: auto;
        width: 60%;
        max-width: 500px;
    }


    .m-auto {
        margin: auto !important;
    }

    .w-100 {
        width: 100% !important;
    }

    *,
    ::after,
    ::before {
        box-sizing: border-box;
    }

    hoja de estilo del agente de usuario main {
        display: block;
    }

    .text-center {
        text-align: center !important;
    }

    body {
        margin: 0;
        font-family: var(--bs-body-font-family);
        font-size: var(--bs-body-font-size);
        font-weight: var(--bs-body-font-weight);
        line-height: var(--bs-body-line-height);
        color: var(--bs-body-color);
        text-align: var(--bs-body-text-align);
        background-color: var(--bs-body-bg);
        -webkit-text-size-adjust: 100%;
        -webkit-tap-highlight-color: transparent;
    }

    :root {
        --bs-blue: #0d6efd;
        --bs-indigo: #6610f2;
        --bs-purple: #6f42c1;
        --bs-pink: #d63384;
        --bs-red: #dc3545;
        --bs-orange: #fd7e14;
        --bs-yellow: #ffc107;
        --bs-green: #198754;
        --bs-teal: #20c997;
        --bs-cyan: #0dcaf0;
        --bs-black: #000;
        --bs-white: #fff;
        --bs-gray: #6c757d;
        --bs-gray-dark: #343a40;
        --bs-gray-100: #f8f9fa;
        --bs-gray-200: #e9ecef;
        --bs-gray-300: #dee2e6;
        --bs-gray-400: #ced4da;
        --bs-gray-500: #adb5bd;
        --bs-gray-600: #6c757d;
        --bs-gray-700: #495057;
        --bs-gray-800: #343a40;
        --bs-gray-900: #212529;
        --bs-primary: #0d6efd;
        --bs-secondary: #6c757d;
        --bs-success: #198754;
        --bs-info: #0dcaf0;
        --bs-warning: #ffc107;
        --bs-danger: #dc3545;
        --bs-light: #f8f9fa;
        --bs-dark: #212529;
        --bs-primary-rgb: 13, 110, 253;
        --bs-secondary-rgb: 108, 117, 125;
        --bs-success-rgb: 25, 135, 84;
        --bs-info-rgb: 13, 202, 240;
        --bs-warning-rgb: 255, 193, 7;
        --bs-danger-rgb: 220, 53, 69;
        --bs-light-rgb: 248, 249, 250;
        --bs-dark-rgb: 33, 37, 41;
        --bs-white-rgb: 255, 255, 255;
        --bs-black-rgb: 0, 0, 0;
        --bs-body-color-rgb: 33, 37, 41;
        --bs-body-bg-rgb: 255, 255, 255;
        --bs-font-sans-serif: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
        --bs-body-font-family: var(--bs-font-sans-serif);
        --bs-body-font-size: 1rem;
        --bs-body-font-weight: 400;
        --bs-body-line-height: 1.5;
    }

    *,
    ::after,
    ::before {
        box-sizing: border-box;
    }

    *,
    ::after,
    ::before {
        box-sizing: border-box;
    }

    .form-floating {
        margin: 2.5%;
    }

    @media (max-width:768px){
    form{
        width: 80%;
    }
}

    @media (max-width:480px){
        form{
            width: 95%;
        }
    }
    label{
        font-size: 16px;
    }
    button{
        font-size: 16px;
        padding: 22px;
    }
    .link-a{
        font-size: 14px;
        /* text-align: right; */
    }
</style>

<body class="container3">
    <div class="container" style="margin-top: 2%;">
        <main class="form-signin w-100 m-auto">


            <form class="form" id="form-registro" style="text-align: center;">
                <img class="mb-2" src="{{asset('./images/user5.png')}}" alt="" width="100" height="100">
                <!-- <i class="bi bi-person-circle"></i>
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg> -->


                <h1 style="color: black" class="h3 mb-2 fw-normal">Registro de usuario</h1>
                <div class="form-floating">
                    <input type="email" class="form-control" id="correo_electronico" placeholder="Escribe tu correo electronico">
                    <label for="floatingInput">Correo electrónico: </label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="contrasena" placeholder="Escribe tu contraseña">
                    <label for="floatingInput">Contraseña: </label>
                </div>

                <div class="form-floating">
                    <input type="text" class="form-control" id="nombre" placeholder="Escribe tu nombre">
                    <label for="floatingInput">Nombre(s): </label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="apaterno" placeholder="Escribe tu apellido paterno">
                    <label for="floatingPassword">Apellido paterno</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="amaterno" placeholder="Escribe tu apellido materno">
                    <label for="floatingPassword">Apellido materno</label>
                </div>
                <br>
                <button class="btn-i"  type="submit" id="iniciar_registro">Registrame</button><br>
                <a class="link-a"href="/login">¿Ya tienes una cuenta? Inicia sesión</a>
                <!-- <p class="mt-5 mb-3 text-muted">2022 - Sergio Ayala</p> -->
            </form>
        </main>
    </div>
</body>

</html>

<script>


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#iniciar_registro").click(function(e) {
     
        e.preventDefault();

        var correo_electronico = $("#correo_electronico").val();
        var contrasena = $("#contrasena").val();
        var nombre_usuario = $("#nombre_usuario").val();
        var nombre_persona = $("#nombre").val();
        var apaterno = $("#apaterno").val();
        var amaterno = $("#amaterno").val();

        $.ajax({
            type: 'POST',
            url: "{{ route('registrarUsuario')}}",
            data: {
                "_token": $("meta[name='csrf-token']").attr("content"),
                correo_electronico: correo_electronico,
                contrasena: contrasena,
                nombre_usuario: nombre_usuario,
                nombre_persona: nombre_persona,
                apaterno: apaterno,
                amaterno: amaterno
            },
            success: function(respuesta) {
                console.log(respuesta)
               alert('Se ha registrado correctamente.')

            }
        })
    });
</script>