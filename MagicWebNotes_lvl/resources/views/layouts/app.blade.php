<?php
if (session('id_usuario')) {
    header('Location: dashboard'); //Aqui lo redireccionas al lugar que quieras.
    die();
}
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>{{ config('app.name', 'MagicWebNotes') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

</head>
<style>
    .form-signin {
        margin: auto;
        width: 80%;
        max-width: 900px;
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

    @media (max-width:768px) {
        form {
            width: 80%;
        }
    }

    @media (max-width:480px) {
        form {
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



<body style="margin: 8%;">
    <main class="form-signin w-90 m-auto">
        <form class="form" id="form-login" style="text-align: center;">
            <img class="mb-2 mt-4" src="{{asset('./images/log4.png')}}" alt="" width="100" height="100">
            <h1 style="color: black"class="h3 mb-3 fw-normal">Inicio de sesión</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="correo_electronico" placeholder="usuario@ejemplo.com">
                <label for="floatingInput">Correo electrónico</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="contrasena" placeholder="Escribe tu contraseña">
                <label for="floatingPassword">Contraseña</label>
            </div>

            <div class="checkbox mb-3 mt-4">
                <div class="d-grid gap-2 col-6 mx-auto ">
        <button class="btn-i" type="submit" id="iniciar_sesion">Iniciar sesión</button>
        <a class="link-a"href="/registro">Registrarme</a>
        </div>
            </div>

         
            <!-- <p class="mt-5 mb-3 text-muted">2022 - Sergio Ayala</p> -->
        </form>
    </main>
</body>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#iniciar_sesion").click(function(e) {
        e.preventDefault();
        const Toast = Swal.mixin({
            toast: true,
            position: 'end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        var correo_electronico = $("#correo_electronico").val();
        var contrasena = $("#contrasena").val();

        console.log(correo_electronico, ' ', contrasena)

        $.ajax({
            type: 'POST',
            url: "{{ route('buscarUsuario') }}",
            data: {
                "_token": $("meta[name='csrf-token']").attr("content"),
                'correo_electronico': correo_electronico,
                'contrasena': contrasena,
            },
            success: function(respuesta) {
                console.log(respuesta)
                if (respuesta == "verificado") {
                    Toast.fire({
                        icon: 'success',
                        title: 'Verificado.\nSe te redirigira al login.'
                    })
                    setTimeout(function() {
                        window.location.href = '{{url("dashboard")}}';
                    }, 2000);
                }
                if (respuesta == "error_contrasena") {
                    console.log('error contrasena')
                    Toast.fire({
                        icon: 'error',
                        title: 'Verifica tu contraseña.'
                    })

                } else if (respuesta == "error_correo") {
                    console.log('error correo')
                    Toast.fire({
                        icon: 'error',
                        title: 'Verifica tu correo.'
                    })
                }
            },
            error: function(e) {
                console.log("No se encontro usuario");
            }
        })
    })
</script>

</html>