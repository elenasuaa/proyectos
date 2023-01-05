<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/estilo.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@200&family=Poppins:wght@300;500&display=swap" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <title>Document</title>
</head>

<body>
    <div class="container mt-4 shadow p-3 mb-3 bg-body rounded">
        <div class="list-group">
            @php
            use App\Models\recordatorioUsuario;
            $fk_usuario = session()->get('id_usuario');
            $recordatorios = new recordatorioUsuario();
            $recordatorios = recordatorioUsuario::join('usuario', 'recordatorio_usuario.fk_usuario', '=', 'usuario.id_usuario')->join('recordatorio', 'recordatorio_usuario.fk_recordatorio', '=', 'recordatorio.id_recordatorio')->where('recordatorio_usuario.fk_usuario','=', session()->get('id_usuario'))->orderBy('fecha_finalizacion_recordatorio', 'ASC')->get();
            @endphp

            @foreach($recordatorios as $recordatorio)

            <div class="container text-center">
                <div class="row">
                    <div class="col-12 alert alert-primary alert-dismissible fade show px-3" role="alert">
                        <a href="#" class="list-group-item list-group-item-action mb-1" aria-current="true">
                            <div class="d-flex w-100 justify-content-between shadow-sm p-10 mb-3 bg-body rounded ">
                                <h5 class="mb-1"> <b>TITULO: {{$recordatorio->titulo_recordatorio}}</b> </h5>
                                <small> <b> SE TE NOTIFICARA EL: {{$recordatorio->fecha_finalizacion_recordatorio}}</b></small>
                            </div>

                            <p class="mb-1 mb-4">{{$recordatorio->descripcion_recordatorio}}</p>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <!-- <button class="btn btn-danger me-md-2" type="button">Eliminar</button> -->
                                <button type="button" class="btn btn-warning" onclick="detallesRecordatorio('{{$recordatorio->id_recordatorio}}')">
                                    Editar
                                </button>
                                <button type="button" class="btn btn-danger" onclick="eliminarRecordatorio('{{$recordatorio->id_recordatorio}}')">
                                    Eliminar
                                </button>
                            </div>
                            <hr>

                            <small><i>ULTIMA MODIFICACION: {{$recordatorio->ultima_modificacion_recordatorio}} </i></small>
                        </a>

                    </div>

                </div>
            </div>

            @endforeach
        </div>

    </div>
</body>

<!-- MODAL PARA MODIFICAR RECORDATORIO  -->
<div class="modal fade" id="modificarRecordatorio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 " id="exampleModalLabel" style="color: black; font-weight: bold;">MODIFICACIÓN DE RECORDATORIO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formRecordatorioMod">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="id_recordatorioBD" name="id_recordatorioBD" hidden>
                        <label for="recipient-name" class="col-form-label">Titulo del recordatorio:</label>
                        <input type="text" class="form-control" id="titulo_recordatorioBD" name="titulo_recordatorioBD">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Nota de tu recordatorio:</label>
                        <textarea class="form-control" id="descripcion_recordatorioBD" name="descripcion_recordatorioBD"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Selecciona la fecha a la que quieres que te recuerde:</label>
                        <input type="datetime-local" class="form-control" id="fecha_finalizacion_recordatorioBD" name="fecha_finalizacion_recordatorioBD"></input>
                    </div>

                    <button type="submit" class="btn btn-primary" id="gModificarRecordatorio">Modificar recordatorio</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

</html>

<script>
   

    function detallesRecordatorio(e) {

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
        console.log(e)
        var idRecordatorio = e;

        $.ajax({
            type: 'POST',
            url: "{{route('detalleRecordatorio')}}",
            data: {
                'id_recordatorio': idRecordatorio,
                "_token": $("meta[name='csrf-token']").attr("content")

            },
            success: function(respuesta) {
                console.log(respuesta[0]['titulo_recordatorio'])
                $("#id_recordatorioBD").val(respuesta[0]['id_recordatorio']);
                $("#titulo_recordatorioBD").val(respuesta[0]['titulo_recordatorio']);
                $("#descripcion_recordatorioBD").val(respuesta[0]['descripcion_recordatorio']);
                $("#fecha_finalizacion_recordatorioBD").val(respuesta[0]['fecha_finalizacion_recordatorio']);
                $("#modificarRecordatorio").modal('show');
            }
        })
    }

    function eliminarRecordatorio(r) {
        console.log(r);
        var id_recordatorio = r;
        $.ajax({
            type: 'POST',
            url: "{{route('eliminarRecordatorio')}}",
            data: {
                'id_recordatorio': id_recordatorio
            },
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")

            },
            success: function(r) {
                console.log(r)

                $.ajax({
                    url: "{{route('mostrarRecordatorios')}}",
                    success: function(result) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Se ha eliminado con exito.'
                        })
                        $("#bodyHTML").html(result);

                    }
                });
            }
        })
    }

    $("#modificarRecordatorio").on("submit", function(e) {

        e.preventDefault();
        console.log('se hizo submit xdxd')
        var id_recordatorioBD = $("#id_recordatorioBD").val();
        var cTime = moment().format();
        var fecha_finalizacion_recordatorioBD = $("#fecha_finalizacion_recordatorioBD").val();
        var titulo_recordatorioRmod = $("#titulo_recordatorioBD").val();
        var descripcion_recordatorioRmod = $("#descripcion_recordatorioBD").val();

        var fechaHInput = moment(fecha_finalizacion_recordatorioBD, "YYYY-MM-DD HH:mm");
        var fechaActual = moment(cTime, "YYYY-MM-DD HH:mm");

        console.log("FECHA INPUT: " + fechaHInput + "\nFECHA SISTEMA: " + fechaActual)

        if (fechaHInput < fechaActual || fechaHInput === fechaActual) {
            alert("ERROR: LA FECHA DE TU RECORDATORIO NO DEBE SER MENOR A LA ACTUAL");
        } else {
            var fechaHinput2 = moment().format(fecha_finalizacion_recordatorioBD, moment.ISO_8601s);
            console.log(fechaHinput2)
            var fechaInput1 = fechaHinput2.split('T', 2);
            console.log(fechaInput1[0])

            var fecha_finalRmod = fechaInput1[0];
            var hora_finalRmod = fechaInput1[1];

            var fecha_finalizacion_recordatorioRmod = fecha_finalRmod + " " + hora_finalRmod;
            $.ajax({
                type: 'POST',
                url: "{{route('actualizarRecordatorio')}}",
                data: {
                    "id_recordatorio": id_recordatorioBD,
                    "titulo_recordatorio": titulo_recordatorioRmod,
                    "descripcion_recordatorio": descripcion_recordatorioRmod,
                    "fecha_finalizacion_recordatorio": fecha_finalizacion_recordatorioRmod
                },
                headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")

                },
                success: function(respuesta) {
                    if (respuesta.respuesta == 200) {
                        $("#modificarRecordatorio").modal("hide");
                        $.ajax({
                            url: "{{route('mostrarRecordatorios')}}",
                            success: function(result) {

                                $("#bodyHTML").html(result);
                            }
                        });
                        Toast.fire({
                            icon: 'success',
                            title: 'Se ha modificado con exito.'
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: 'Error al actualizar o no haz ingresado nuevos datos.'
                        })
                    }
                }
            })


            // $.ajax({
            //     type: 'POST',
            //     url: "",
            //     data: {
            //         'titulo_recordatorio': titulo_recordatori,
            //         'descripcion_recordatorio': descripcion_recordatori,
            //         'fecha_finalizacion_recordatorio': fecha_hora_finalizacion

            //     },
            //     headers: {
            //         "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")

            //     },
            //     success: function(respuesta) {
            //         console.log(respuesta)

            //         if (respuesta == 200) {
            //             alert("Se ha guardado exitosamente");
            //             $("#formRecordatorio")[0].reset();
            //             $("#gNuevoRecordatorio").attr('disabled', false);
            //             $("#gNuevoRecordatorio").html(`Guardar nuevo recordatorio`)

            //             $.ajax({
            //                 url: "{{route('mostrarRecordatorios')}}",
            //                 success: function(result) {

            //                     $("#bodyHTML").html(result);

            //                 }
            //             });

            //         } else {
            //             alert("No se ha guardado exitosamente");

            //         }

            //     }

            // })
        }
    })


    //MODIFICAR RECORDAOTIRO VERSION VIEJA
    // $("#modificarRecordatorio").on("submit", function(e) {
    //     const Toast = Swal.mixin({
    //         toast: true,
    //         position: 'top-end',
    //         showConfirmButton: false,
    //         timer: 2000,
    //         timerProgressBar: true,
    //         didOpen: (toast) => {
    //             toast.addEventListener('mouseenter', Swal.stopTimer)
    //             toast.addEventListener('mouseleave', Swal.resumeTimer)
    //         }
    //     })
    //     e.preventDefault();
    //     console.log('se hizo submit xdxd')
    //     var id_recordatorioBD = $("#id_recordatorioBD").val();
    //     var cTime = moment().format();
    //     var fecha_finalizacion_recordatorioBD = $("#fecha_finalizacion_recordatorioBD").val();
    //     var titulo_recordatorioRmod = $("#titulo_recordatorioBD").val();
    //     var descripcion_recordatorioRmod = $("#descripcion_recordatorioBD").val();

    //     var fechaHInput = moment(fecha_finalizacion_recordatorioBD, "YYYY-MM-DD HH:mm");
    //     var fechaActual = moment(cTime, "YYYY-MM-DD HH:mm");

    //     console.log("FECHA INPUT: " + fechaHInput + "\nFECHA SISTEMA: " + fechaActual)

    //     if (fechaHInput < fechaActual || fechaHInput === fechaActual) {
    //         alert("ERROR: LA FECHA DE TU RECORDATORIO NO DEBE SER MENOR A LA ACTUAL");
    //     } else {
    //         var fechaHinput2 = moment().format(fecha_finalizacion_recordatorioBD, moment.ISO_8601s);
    //         console.log(fechaHinput2)
    //         var fechaInput1 = fechaHinput2.split('T', 2);
    //         console.log(fechaInput1[0])

    //         var fecha_finalRmod = fechaInput1[0];
    //         var hora_finalRmod = fechaInput1[1];

    //         var fecha_finalizacion_recordatorioRmod = fecha_finalRmod + " " + hora_finalRmod;
    //         $.ajax({
    //             type: 'POST',
    //             url: "{{route('actualizarRecordatorio')}}",
    //             data: {
    //                 "id_recordatorio": id_recordatorioBD,
    //                 "titulo_recordatorio": titulo_recordatorioRmod,
    //                 "descripcion_recordatorio": descripcion_recordatorioRmod,
    //                 "fecha_finalizacion_recordatorio": fecha_finalizacion_recordatorioRmod
    //             },
    //             headers: {
    //                 "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")

    //             },
    //             success: function(respuesta) {
    //                 if (respuesta.respuesta == 200) {
    //                     Toast.fire({
    //                         icon: 'success',
    //                         title: 'Se ha modificado con exito.'
    //                     })
    //                 } else {
    //                     Toast.fire({
    //                         icon: 'error',
    //                         title: 'Error al actualizar o no haz ingresado nuevos datos.'
    //                     })
    //                 }
    //             }
    //         })


    //         // $.ajax({
    //         //     type: 'POST',
    //         //     url: "",
    //         //     data: {
    //         //         'titulo_recordatorio': titulo_recordatori,
    //         //         'descripcion_recordatorio': descripcion_recordatori,
    //         //         'fecha_finalizacion_recordatorio': fecha_hora_finalizacion

    //         //     },
    //         //     headers: {
    //         //         "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")

    //         //     },
    //         //     success: function(respuesta) {
    //         //         console.log(respuesta)

    //         //         if (respuesta == 200) {
    //         //             alert("Se ha guardado exitosamente");
    //         //             $("#formRecordatorio")[0].reset();
    //         //             $("#gNuevoRecordatorio").attr('disabled', false);
    //         //             $("#gNuevoRecordatorio").html(`Guardar nuevo recordatorio`)

    //         //             $.ajax({
    //         //                 url: "{{route('mostrarRecordatorios')}}",
    //         //                 success: function(result) {

    //         //                     $("#bodyHTML").html(result);

    //         //                 }
    //         //             });

    //         //         } else {
    //         //             alert("No se ha guardado exitosamente");

    //         //         }

    //         //     }

    //         // })
    //     }
    // })
</script>