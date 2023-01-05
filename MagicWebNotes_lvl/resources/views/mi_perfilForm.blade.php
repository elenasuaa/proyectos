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
            <h3 class="text-left">MI PERFIL</h3>
            <hr />
    </div>
    <div class="form-group" id="form_perfil">
        <label for="firstName" class="control-label col-sm-3"> <b>MI NOMBRE:</b> </label>
        <div class="form-control-static col-sm-6 mb-2">
            <label style="text-transform: uppercase;">{{session('nombre')}} {{session('apaterno')}} {{session('amaterno')}}</label>
        </div>
    </div>

    <div class="d-grid gap-2 col-6 mx-auto">
        <button class="btn btn-primary me-md-2" type="button" id="btnMDatos">Modificar mis datos</button>
    </div>

    <div class="form-group mt-1.5" id="nuevos_datos" style="text-align: center;">
        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" id="nombre_personaA" value="{{session('nombre')}}" placeholder="Nombre(s)">
            <label for="floatingInput">NOMBRE(s):</label>
        </div>
        <div class="form-floating mt-2">
            <input type="text" class="form-control" id="apaternoA" placeholder="Apellido paterno" value="{{session('apaterno')}}">
            <label for="floatingInput">APELLIDO PATERNO</label>
        </div>
        <div class="form-floating mt-3">
            <input type="text" class="form-control" id="amaternoA" placeholder="Apellido materno" value="{{session('amaterno')}}">
            <label for="floatingInput">APELLIDO MATERNO</label>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="button" id="actNuevosDatos" class="btn btn-success mt-4 me-md-2">Guardar cambios</button>
        </div>
    </div>
    </form>
</div>


<script>
    $(document).ready(function() {
        $("#nuevos_datos").hide();
        $("#formNuevosDatos").hide();
    })

    // EVENTO AL CLICKEAR BOTON MODIFICAR DATOS HACE UNA ANIMACION TOGGLE HACIA ABAJO Y MUESTRA LA PARTE OCULTA DEL FORMULARIO
    $("#btnMDatos").click(function(e) {
        e.preventDefault()
        console.log('se hizo submit con prevent default')

        $("#nuevos_datos").animate({
            height: 'toggle'
        });
    });


    $("#actNuevosDatos").click(function(e) {
        e.preventDefault();

        var nombre_persona = $("#nombre_personaA").val();
        var apaterno = $("#apaternoA").val();
        var amaterno = $("#amaternoA").val();

        console.log(nombre_persona, apaterno, amaterno)

        $.ajax({
            type: 'POST',
            url: "{{route('modificar_persona')}}",
            data: {
                'nombre_persona': nombre_persona,
                'apaterno': apaterno,
                'amaterno': amaterno
            },
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
            },
            success: function(r) {
                console.log(r)

                $("#modalBodyElements").html(`<div class="d-flex mt-5 mb-5 justify-content-center"> <div class="spinner-grow" role = "status" >
                            <span class = "visually-hidden" > Loading... < /span> </div> </div>`);
                $.ajax({
                    url: "{{route('mi_perfilForm')}}",
                    success: function(result) {
                        $("#modalBodyElements").html(result);
                    }
                });
            }
        })
    })
</script>