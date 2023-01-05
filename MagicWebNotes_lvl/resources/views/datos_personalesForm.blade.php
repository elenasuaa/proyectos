<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/estilo.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@200&family=Poppins:wght@300;500&display=swap" rel="stylesheet">

</head>
<input type="text" value="{{session('id_persona')}}" id="id_personaProfile" hidden>

<div class="container">
    <div class="well">
        <form class="form-horizontal">
            <h3 class="text-left">MIS DATOS PERSONALES</h3>
            <hr />
    </div>
    <div class="form-group" id="form_perfil">
        <label for="username" class="control-label col-sm-6"> <b>NOMBRE DE USUARIO:</b> </label>
        <div class="form-control-static col-sm-8 mb-2">
            <label style="text-transform: uppercase;">
                @if(session('nombre_usuario')=='')
                Sin nombre de usuario asignado
                @endif
                @if(!session('nombre_usuario')=='')
                {{session('nombre_usuario')}}
                @endif
            </label>
        </div>
        <label for="email" class="control-label col-sm-6 mb-1"> <b>CORREO:</b> </label>
        <div class="form-control-static col-sm-8 mb-2">
            <label for="" style="text-transform: uppercase;">{{session('correo')}}</label>
        </div>

        <label for="" class="control-label col-sm-6 mb-1"> <b>ESTATUS:</b></label>
        <div class="form-control-static col-sm-8 mb-2">
            @if(session('estatus_usuario')=="1")
            USUARIO ACTIVO
            @else
            USUARIO INACTIVO
            @endif
        </div>

    </div>


    <div class="d-grid gap-2 col-6 mx-auto">
        <button class="btn btn-primary me-md-2" type="button" id="btnMDatos">Modificar mis datos</button>
    </div>

    <div class="form-group mt-1.5" id="nuevos_datosPersonales" style="text-align: center;">
        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control is-valid" id="nombre_usuario" value="{{session('nombre_usuario')}}" placeholder="Nombre(s)" onkeyup="verificarUsuario(this)" disabled>
            <label for="floatingInput">Nombre de usuario:</label>
        </div>
        <div class="form-floating mt-2">
            <input type="password" class="form-control" id="contrasena1" placeholder="Ingresa tu nueva contraseña" value="{{session('contrasena')}}" onkeyup="verificarContrasena()">
            <label for="floatingInput">Ingresa tu nueva contraseña:</label>
        </div>
        <div class="form-floating mt-2">
            <input type="password" class="form-control" id="contrasena2" placeholder="Repite tu nueva contraseña" value="{{session('contrasena')}}" onkeyup="verificarContrasena()">
            <label for="floatingInput">Repite tu nueva contraseña:</label>
        </div>
        <div class="form-floating mt-3">
            <input type="text" class="form-control is-valid" id="correo_electronico" placeholder="Ingresa tu nuevo correo electronico" value="{{session('correo')}}" disabled>
            <label for="floatingInput">Nuevo correo electrónico:</label>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="button" id="actNuevosDatosP" class="btn btn-success mt-4 me-md-2">Guardar cambios</button>
        </div>
    </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $("#actNuevosDatos").addClass('disabled');
        $("#nuevos_datosPersonales").hide();
        $("#actNuevosDatosP").addClass('disabled');

    })

    $("#btnMDatos").click(function(e) {
        e.preventDefault()
        $("#nuevos_datosPersonales").animate({
            height: 'toggle'
        });
    })

    function verificarUsuario(content) {
        $("#nombre_usuario").removeClass('is-invalid');
        $("#nombre_usuario").removeClass('is-valid');


        console.log(content.value)
        var usuario = content.value;

        console.log(usuario)
        $.ajax({
            type: 'POST',
            url: "{{route('availableUser')}}",
            data: {
                'usuario': usuario
            },
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
            },
            success: function(r) {
                // console.log(r[0]['nombre_usuario']);
                console.log(r)
                if (r == 'unavailable') {
                    $("#nombre_usuario").addClass('is-invalid');
                } else {
                    $("#nombre_usuario").addClass('valid');

                }
            },
            error: function(r) {
                $("#nombre_usuario").addClass('valid');
            }
        })
    }

    function verificarContrasena() {
        $("#contrasena1").removeClass('is-invalid');
        $("#contrasena2").removeClass('is-invalid');

        var contrasena1 = $("#contrasena1").val();
        var contrasena2 = $("#contrasena2").val();

        if (contrasena1 === contrasena2) {
            $("#contrasena1").addClass('is-valid');
            $("#contrasena2").addClass('is-valid');
            $("#actNuevosDatosP").removeClass('disabled');



        } else {
            $("#actNuevosDatosP").addClass('disabled');
            $("#contrasena1").addClass('is-invalid');
            $("#contrasena2").addClass('is-invalid');
        }
    }

    $('#actNuevosDatosP').click(function() {

        $.ajax({
            type: 'POST',
            url: "{{route('act_datosP')}}",
            data: {
                'contrasena': $("#contrasena2").val()
            },
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
            },
            success: function(r) {

                console.log(r);
                if (r.respuesta == 200) {
                    $("#modalBodyElements").html(`<div class="d-flex mt-5 mb-5 justify-content-center"> <div class="spinner-grow" role = "status" >
                            <span class = "visually-hidden" > Loading... < /span> </div> </div>`);
                    $("#actNuevosDatosP").addClass('disabled');
                    console.log('Se han actualizado correctamente los datos');


                    $.ajax({
                        url: "{{route('datos_personalesForm')}}",
                        success: function(result) {

                            $("#modalBodyElements").html(result);
                        }
                    });

                } else {
                    console.log('No se han actualizado correctamente los datos');
                }
            }
        })
    })
</script>