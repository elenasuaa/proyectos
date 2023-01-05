<?php
if (session('id_usuario')) {
    echo "";
} else {
    header('Location: login'); //Aqui lo redireccionas al lugar que quieras.
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href='https://fonts.googleapis.com/css?family=News+Cycle:400,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@200&family=Poppins:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/estilo.css')}}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/ua-parser-js@0/dist/ua-parser.min.js"></script>

    <title>Dashboard | MagicWebNotes</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="{{asset('./js/moment.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.5/push.js"></script>
</head>
<style>
    .bi {
        margin: 5%;
    }

    #bodyNotas {
        width: 30%;
        margin-left: 7%;
        margin-top: 0%;
        height: 10%;
    }



    @media screen and (min-width: 650px) {
        .container {
            display: none;
        }

        .container {
            display: block;
        }
    }
    header{
        background-color: #224CA0;
        display: flex;
        height: 95px;
        /* padding: 10px; */
        justify-content: space-between;
    }
    .l-img{
        width: 30%;
    }

</style>
<input type="text" id="id_usuario" name="id_usuario" value="{{session('id_usuario')}}" hidden>

<body>
    <!-- <input type="text" value="{{session('nombre')}} {{session('apaterno')}} {{session('amaterno')}}"> -->
    <!-- <button class="w-100 btn btn-lg btn-primary" id="cerrar_sesion">CERRAR SESION</button> -->
    <!-- <h5>ESTE ES EL DASHBOARD DE PRUEBA </h5> -->
    <header>
        <h1 class="titulo">MagicWebNotes</h1>
        <img class="l-img" src="{{asset('./images/Group 10.svg')}}" alt="">
    </header>
    <nav class="nav justify-content-center navbar-fixed-top" style="background-color: #D1D6DF ; padding-right: 1%; padding-left: 1% ">
        <div class="container" style="max-width: 100%;">
            <div class="row text-center navbar">
                <div class="col order-last botonSeleccionado" id="mostrarPerfil" onclick="cambiarClase('mostrarPerfil')">
                    <label class="nav-item">

                        <h5><b>MI PERFIL </b></h5>
                    </label>
                </div>
                <div class="col botonSeleccionado" id="mostrarRecordatorio" onclick="cambiarClase('mostrarRecordatorio')">
                    <label class="nav-item ">

                        <h5> <b> RECORDATORIOS</b></h5>
                    </label>
                </div>
                <div class="col order-first botonSeleccionado btn btn-primary " id="mostrarNotas" onclick="cambiarClase('mostrarNotas')" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                    <label class="nav-item">
                        <h5><b> NOTAS</b></h5>
                    </label>
                </div>
                </li>
            </div>
        </div>
    </nav>


    <!-- AQUI MANDARE A LLAMAR LAS PAGINAS HTML DE LARAVEL -->
    <div id="bodyHTML"></div>
    <!-- <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasBottomLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body small">
            ...
        </div>
    </div> -->


</body>


</html>

<!-- MODAL PARA CREAR NOTAS  -->
<div class="modal fade" id="crearNotas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: black; font-weight: bold;">CREAR UNA NUEVA NOTA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formNota">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Titulo:</label>
                        <input type="text" class="form-control" id="tituloNota" name="tituloNota" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Escribe aqui tu nota:</label>
                        <textarea class="form-control" id="descripcionNota" name="descripcionNota" rows="8" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" id="gnuevanota">Guardar nueva nota</button>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA CREAR RECORDATORIO  -->
<div class="modal fade" id="crearRecordatorio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: black; font-weight: bold;">CREAR NUEVO RECORDATORIO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formRecordatorio">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Titulo del recordatorio:</label>
                        <input type="text" class="form-control" id="titulo_recordatorio" name="titulo_recordatorio">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Escribe alguna nota de tu recordatorio:</label>
                        <textarea class="form-control" id="descripcion_recordatorio" name="descripcion_recordatorio"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Selecciona la fecha a la que quieres que te recuerde:</label>
                        <input type="datetime-local" class="form-control" id="fecha_finalizacion_recordatorio" name="fecha_finalizacion_recordatorio"></input>
                    </div>

                    <button type="submit" class="btn btn-primary" id="gNuevoRecordatorio">Guardar nuevo recordatorio</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="noAbrirInstrucciones()">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL PARA INSTRUCCIONES DE USO  -->
<div class="modal fade" id="modalInstrucciones" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: black; font-weight: bold;">INSTRUCCIONES DE USO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="noAbrirInstrucciones('0')"></button>
            </div>
            <div class="modal-body">
                PARA CREAR UNA NUEVA NOTA/RECORDATORIO DEBERAS DAR DOBLE CLIC A LA OPCION DE TU PREFERENCIA.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="noAbrirInstrucciones()">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<div id="mi-perfilForm">
    ESTE ES UN DIV DEL FORMULARIO DE PERFIL
</div>

<div id="datos-personalesForm">
    ESTE ES UN DIV DEL FORMULARIO DE DATOS PERSONALES
</div>

<div id="acerca-deForm">
    ESTE ES UN DIV DEL FORMULARIO DE ACERCA DE
</div>


<div class="modal fade" id="opcionPerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="mi-perfil" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">MI PERFIL</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="datos-personales" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">DATOS PERSONALES</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="acerca-de" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">ACERCA DE</button>
                    </li>
                </ul>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div id="modalBodyElements">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="cerrar_sesion">Cerrar sesion</button>
                <!-- <button type="button" class="btn btn-primary">Guardar cambios</button> -->
            </div>
        </div>
    </div>
</div>


<!-- MODAL PARA ACEPTAR PERMISOS DE NOTIFICACION -->
<div class="modal fade" id="modalPermissionNotification" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">NOTIFICACIÓNES PARA LOS RECORDATORIOS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="recordatoriosAdvises('0')"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">LAS NOTIFICACIONES PUSH PARA LOS RECORDATORIOS ESTARAN HABILITADAS AUTOMATICAMENTE, ESTO PARA MEJORAR LA EXPERIENCIA DE USUARIO.</label>
                    <small> <b><i>NOTA: En los sistemas operativos Android e iOS no se encuentran disponibles las notificaciones PUSH.</i></b> </small> <br>
                        <br>
                    <br><button class="btn btn-success" onclick="recordatoriosAdvises('0')">HE LEIDO Y COMPRENDIDO Y ACEPTO QUE SE MUESTREN LAS NOTIFICACIONES</button>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- MODAL PARA ACEPTAR PERMISOS DE NOTIFICACION -->
<div class="modal fade" id="modalAlertRecordatorioBDD" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">NOTIFICACION DE RECORDATORIO</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <h4>TITULO: <div id="titulo_RecordatorioBD"></div>
                    </h4>
                </div>
                <h4>FECHA Y HORA: <div id="fecha_horaRecordatorioBD"></div>
                </h4>
                <br>
                <h4>
                    DESCRIPCION:
                </h4>
                <b>
                    <div id="descripcion_RecordatorioBD"></div>
                </b><br>
                <!-- <button class="request-button btn btn-warning">Requerir permisos</button> -->

            </div>
        </div>

    </div>
</div>
</div>




<script>
    // Push.Permission.request(onGranted, onDenied);

    // const requestButton = document.querySelector(".request-button");

    // function onGranted() {
    //     requestButton.style.background = "green";
    // }

    // function onDenied() {
    //     requestButton.style.background = "red";
    // }

    // requestButton.onclick = function() {
    //     Push.Permission.request(onGranted, onDenied);
    // }
</script>




<script>
    function recordatoriosAdvises() {
        window.localStorage.setItem('recordatorioAdvises', 'cerrada');
        $("#modalPermissionNotification").modal('hide');
    }

    function recordatoriosAdvisesNN() {
        window.localStorage.setItem('recordatorioAdvises', 'cerrada');
        $("#recordatoriosAdvisesNN").modal('hide');
    }


    // FUNCION PARA CERRAR MODAL Y NO VOLVER A ABRIRLO CUANDO LA PAGINA SE RECARGUE
    function noAbrirInstrucciones() {
        window.localStorage.setItem('ventanaInstrucciones', 'cerrada');


    }

    // function preguntarNotif() {
    //     let permission = Notification.permission;
    //     if (permission === "granted") {
    //         showNotification();
    //     } else if (permission === "default") {
    //         requestAndShowPermission();
    //     } else {
    //         alert("Use normal alert");
    //     }
    // }

    // Notification.requestPermission().then(function(result) {
    //     console.log(result);
    // });

    // AL CARGAR EL DOCUMENTO HTML SE EJECUTA POR DEFAULT LA FUNCION DARLE CLICK A LA OPCION CON ID MOSTRAR NOTAS
    $(document).ready(function() {

        // preguntarNotif()


        // function requestAndShowPermission() {
        //     Notification.requestPermission(function(permission) {
        //         if (permission === "granted") {
        //             showNotification();
        //         }
        //     });
        // }


        var recordatorioAdvises = window.localStorage.getItem('recordatorioAdvises');
        var parser = new UAParser();

        var mobil = parser.getResult()

        var SO = mobil['os']['name'];

        if (SO == 'Android') {

            if (!recordatorioAdvises) {
                $("#recordatoriosAdvises").modal('show');
            }
        }
        if (SO == "Windows") {


            if (!recordatorioAdvises) {
                $("#modalPermissionNotification").modal('show');
            }

        } else if (SO == "iOS") {

            if (!recordatorioAdvises) {
                $("#recordatoriosAdvises").modal('show');
            }

        }


        setInterval('consultarRecordatorios()', 1000);



        $("#mi-perfilForm").hide();
        $("#datos-personalesForm").hide();
        $("#acerca-deForm").hide();

        var mostrar = window.localStorage.getItem('ventanaInstrucciones');

        if (!mostrar) {
            $("#modalInstrucciones").modal('show');
        }
        if (!recordatorioAdvises) {
            $("#modalPermissionNotification").modal('show');
        }



        document.querySelector('#mostrarNotas').click();
        traerNotas()

        $("#mostrarNotas").click(function() {
            traerNotas()
        })
    });


    function consultarRecordatorios() {


        console.log("Ha pasado 1 segundo")
        $.ajax({
            type: 'POST',
            url: "{{route('ultimoRecordatorio')}}",
            data: {
                "_token": $("meta[name='csrf-token']").attr("content")
            },
            success: function(resultado) {
                console.log(resultado)
                var fechaBDRecFinal = resultado['fecha_finalizacion_recordatorio'].split(' ');
                var fechaBDRecFinal0 = fechaBDRecFinal[0];
                var fechaBDRecFinal1 = fechaBDRecFinal[1];

                var fechaPCOVFINAL = fechaBDRecFinal0 + 'T' + fechaBDRecFinal1 + ':';
                var cTime = moment().format();
                var fecha_tiempoSystem = moment(cTime, "YYYY-MM-DD HH:mm").unix();


                var fecha_UrecordatorioBDD = moment(fechaPCOVFINAL, "YYYY-MM-DD HH:mm").unix();
                console.log(cTime);
                console.log('FECHA Y HORA SYSTEM: ' + fecha_tiempoSystem)

                console.log('FECHA Y HORA BDD: ' + fecha_UrecordatorioBDD)




                if (fecha_tiempoSystem == fecha_UrecordatorioBDD) {
                    var titulo_recordatorio = resultado['titulo_recordatorio'];
                    var descripcion_recordatorio = resultado['descripcion_recordatorio'];
                    var fecha_finalizacion_recordatorio = resultado['fecha_finalizacion_recordatorio'];

                    $("#titulo_RecordatorioBD").text(resultado['titulo_recordatorio']);
                    $("#descripcion_RecordatorioBD").text(resultado['descripcion_recordatorio']);
                    $("#fecha_horaRecordatorioBD").text(resultado['fecha_finalizacion_recordatorio'])

                    alert("ALERTA DE RECORDATORIO")
                    $("#modalAlertRecordatorioBDD").modal('show');
                } 

            }
        })
    }


    $('.nav-link').click(function() {
        var option = $(this).attr('id');
        $("#modalBodyElements").html(`<div class="d-flex mt-5 mb-5 justify-content-center"> <div class="spinner-grow"  role = "status" >
                            <span class = "visually-hidden" > Loading... < /span> </div> </div>`);

        console.log(option)
        if (option == "mi-perfil") {
            $.ajax({
                url: "{{route('mi_perfilForm')}}",
                success: function(result) {

                    $("#modalBodyElements").html(result);
                }
            });
        } else if (option == "datos-personales") {

            $.ajax({
                url: "{{route('datos_personalesForm')}}",
                success: function(result) {
                    $("#modalBodyElements").html(result);
                }
            });
        } else {
            $.ajax({
                url: "{{route('acerca_deForm')}}",
                success: function(result) {
                    $("#modalBodyElements").html(result);
                }
            });
        }
    });

    $("#mostrarRecordatorio").dblclick(function() {
        $("#crearRecordatorio").modal('show');
    })

    // AL DAR DOBLE CLICK AL ELEMENTO CON ID MOSTRARNOTAS SE EJECUTA UNA FUNCION DONDE TRAE UN MODAL 
    $("#mostrarNotas").dblclick(function() {
        // console.log("se oprimio doble click")
        // $('#exampleModal').modal('show');
        $('#bodyHTML').load($("#crearNotas").modal('show'));

    })

    $('#mostrarPerfil').dblclick(function() {
        $("#modalBodyElements").html(`<div class="d-flex mt-5 mb-5 justify-content-center"> <div class="spinner-grow" role = "status" >
                            <span class = "visually-hidden" > Loading... < /span> </div> </div>`);

        $.ajax({
            url: "{{route('mi_perfilForm')}}",
            success: function(result) {
                $("#modalBodyElements").html(result);
            }
        });
        $("#bodyHTML").load($('#opcionPerfil').modal('show'));
    })


    function traerNotas() {
        $("#bodyHTML").html(`<div class="d-flex mt-5 justify-content-center"> <div class = "spinner-border" role = "status" >
                            <span class = "visually-hidden" > Loading... < /span> </div> </div>`);

        $.ajax({
            url: "{{route('mostrarNotas')}}",
            success: function(result) {
                $("#bodyHTML").html(result);
            }
        });

    }

    $("#mostrarRecordatorio").click(function() {
        $("#bodyHTML").html(`<div class="d-flex mt-5 justify-content-center"> <div class = "spinner-border" role = "status" >
                            <span class = "visually-hidden" > Loading... < /span> </div> </div>`);

        $.ajax({
            url: "{{route('mostrarRecordatorios')}}",
            success: function(result) {

                $("#bodyHTML").html(result);

            }
        });
    })

    function cambiarClase(id) {

        $(".botonSeleccionado").removeClass("btn btn-primary ");
        $("#" + id).addClass("btn btn-light ");
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $("#cerrar_sesion").on('click', function(e) {
        e.preventDefault(e);

        $.ajax({
            type: 'POST',
            url: "{{ route('cerrarSesion') }}",
            data: {
                "_token": $("meta[name='csrf-token']").attr("content")
            },
            success: function(respuesta) {
                if (respuesta == "1") {
                    console.log("Ha salido de sesion");
                    setTimeout(function() {
                        window.location.href = '{{url("login")}}';
                    }, 2000);
                } else {
                    console.log('Ocurrio un error');
                }
            }
        })

    });
</script>


<script>
    $("#formNota").on('submit', function(e) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        e.preventDefault()

        $("#gnuevanota").attr('disabled', true);
        $("#gnuevanota").html(`<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Guardando nota...`)

        // var datos = $(this).serialize().val();
        // console.log(datos)
        var id_usuario = $("#id_usuario").val();
        $.ajax({
            type: 'POST',
            url: "{{route('crearNota')}}",
            data: $("#formNota").serialize() + '&id_usuario=' + id_usuario,
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
            },
            success: function(respuesta) {
                console.log(respuesta)
                if (respuesta == "1") {
                    traerNotas()
                    $('#formNota')[0].reset();
                    $("#gnuevanota").attr('disabled', false);
                    $("#gnuevanota").text('Guardar nueva nota')
                    console.log('se guardo exitosamente');
                    // notificameGuardadoNota()
                    Toast.fire({
                        icon: 'success',
                        title: 'Se ha guardado con exito.'
                    })

                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Error al guardar o no haz ingresado nuevos datos.'
                    })
                }
            }
        })

    })
</script>

<script>
    // function notificameGuardadoNota(titulo_recordatorio, descripcion_recordatorio, fecha_finalizacion_recordatorio) {
    //     if (!("Notification" in window)) {
    //         alert("Este navegador no soporta notificaciones de escritorio");
    //         // alertiPhone(titulo_recordatorio, descripcion_recordatorio, fecha_finalizacion_recordatorio)
    //     } else if (Notification.permission === "granted") {
    //         var options = {
    //             body: titulo_recordatorio + '\n' + descripcion_recordatorio,
    //             icon: "",
    //             dir: "ltr"
    //         };
    //         var notification = new Notification("Recordatorio: " + fecha_finalizacion_recordatorio, options);
    //     } else if (Notification.permission !== 'denied') {
    //         Notification.requestPermission(function(permission) {
    //             if (!('permission' in Notification)) {
    //                 Notification.permission = permission;
    //             }
    //             if (permission === "granted") {
    //                 var options = {
    //                     body: titulo_recordatorio + '\n' + descripcion_recordatorio,
    //                     icon: "",
    //                     dir: "ltr"
    //                 };
    //                 var notification = new Notification("Recordatorio:" + fecha_finalizacion_recordatorio, options);
    //             }
    //         });
    //     }
    // }

    $("#formRecordatorio").on('submit', function(e) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        e.preventDefault();

        $("#gNuevoRecordatorio").attr('disabled', true);
        $("#gNuevoRecordatorio").html(`<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Guardando nuevo recordatorio...`)


        var cTime = moment().format();

        var fechah_actual = $("#fecha_finalizacion_recordatorio").val();
        var fechaHInput = moment(fechah_actual, "YYYY-MM-DD HH:mm");
        var fechaActual = moment(cTime, "YYYY-MM-DD HH:mm");

        // INPUTS DE RECORDATORIO
        var titulo_recordatorio = $("#titulo_recordatorio").val();
        var descripcion_recordatorio = $("#descripcion_recordatorio").val();


        if (fechaHInput < fechaActual) {
            console.log('1')
            alert('Ingresa una fecha mayor a la actual, los recordatorios no pueden configurarse con un DIA/MES/AÑO menor a la fecha actual.')

        } else if (fechaHInput > fechaActual) {
            console.log('-1')
            // return -1;   
            var fecha_horaform = moment().format(fechah_actual, moment.ISO_8601s);
            return publicarRecordatorio(titulo_recordatorio, descripcion_recordatorio, fecha_horaform, fechaHInput);

        } else {
            Toast.fire({
                icon: 'error',
                title: 'Error la fecha del recordatorio es menor a la fecha actual del sistema.'
            })
        }
    })

    function publicarRecordatorio(titulo_recordatorio, descripcion_recordatorio, fecha_horaform, fechaHInput) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })


        var titulo_recordatori = titulo_recordatorio;
        var descripcion_recordatori = descripcion_recordatorio;
        var fecha_horafor = fecha_horaform;
        var fechaHInputFor = fechaHInput;


        var formFec = fecha_horafor.split('T', 2);
        var fecha_input = formFec[0];
        var hora_input = formFec[1];

        var fecha_hora_finalizacion = fecha_input + ' ' + hora_input + ':00';
        console.log(fecha_hora_finalizacion);
        console.log('SE HA EJECUTADO LA FUNCION PUBLICAR RECORDATORIO')

        $.ajax({
            type: 'POST',
            url: "{{route('publicarRecordatorio')}}",
            data: {
                'titulo_recordatorio': titulo_recordatori,
                'descripcion_recordatorio': descripcion_recordatori,
                'fecha_finalizacion_recordatorio': fecha_hora_finalizacion

            },
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")

            },
            success: function(respuesta) {
                console.log(respuesta)

                if (respuesta == 200) {
                    $("#formRecordatorio")[0].reset();
                    $("#gNuevoRecordatorio").attr('disabled', false);
                    $("#gNuevoRecordatorio").html(`Guardar nuevo recordatorio`)

                    $.ajax({
                        url: "{{route('mostrarRecordatorios')}}",
                        success: function(result) {

                            $("#bodyHTML").html(result);

                        }
                    });
                    Toast.fire({
                        icon: 'success',
                        title: 'Se ha guardado con exito.'
                    })

                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Error al guardar o no haz ingresado nuevos datos.'
                    })
                }

            }

        })
    }
</script>
<script>

</script>


<script>
    var cTime = moment().format();
    console.log(cTime);
</script>