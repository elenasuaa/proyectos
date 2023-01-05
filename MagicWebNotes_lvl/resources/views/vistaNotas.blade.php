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

<div class="container mt-4 shadow p-3 mb-5 bg-body rounded">
    <div class="list-group">
        @php
        use App\Models\notasModel;
        $fk_usuario = session()->get('id_usuario');
        $notas = new notasModel();
        $notas = notasModel::where('fk_usuario', '=', $fk_usuario)->orderBy('fecha_modificacion', 'DESC')->get();

        @endphp

        @foreach($notas as $nota)
        <div class="container text-center">
            <div class="row">
                <div class="alert alert-primary alert-dismissible fade show px-3" role="alert">
                    <a href="#" class="list-group-item list-group-item-action mb-1" aria-current="true">
                        <div class="d-flex w-100 justify-content-between shadow-sm p-10 mb-3  bg-body rounded">
                            <h5 class="mb-1"> <b>TITULO: {{$nota->titulo_nota}}</b> </h5>
                            <small>CREADO: {{$nota->fecha_creacion}}</small>
                        </div>
                        <p class="mt-4 mb-4">{{$nota->descripcion}}</p>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                            <!-- <button class="btn btn-danger me-md-2" type="button">Eliminar</button> -->
                            <button type="button" class="btn btn-warning" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Top popover" onclick="editarNota('{{$nota->id_nota}}')">
                                Editar
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Top popover" onclick="eliminarNota('{{$nota->id_nota}}')">
                                Eliminar
                            </button>
                        </div>
                        <hr>
                        <small> <i>ULTIMA MODIFICACION: {{$nota->fecha_modificacion}}</i> </small>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

</html>
<!-- MODAL PARA MODIFICAR NOTAS  -->
<div class="modal fade" id="modificarNotas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: black; font-weight: bold;">MODIFICACIÓN DE NOTA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formNotaM">
                    <div class="mb-3">
                        <input type="text" id="idNotaM" name="idNotaM" hidden>
                        <label for="recipient-name" class="col-form-label">Titulo:</label>
                        <input type="text" class="form-control" id="tituloNotaM" name="tituloNotaM" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Escribe aqui tu nota:</label>
                        <textarea class="form-control" id="descripcionNotaM" name="descripcionNotaM" rows="8" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" id="gnuevanotaMd">Guardar cambios</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>



<script>
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

    function eliminarNota(id_nota) {
        var id_notax = id_nota;
        $.ajax({
            type: 'POST',
            url: "{{route('eliminarNota')}}",
            data: {
                'id_nota': id_notax
            },
            headers: {

            },
            success: function(r) {
                console.log(r)

                $.ajax({
                    url: "{{route('mostrarNotas')}}",
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

    function editarNota(id_nota) {
        var idNota = id_nota;

        console.log(idNota)
        $.ajax({
            type: 'POST',
            url: "{{route('editarNota')}}",
            data: {
                'id_nota': idNota,
                "_token": $("meta[name='csrf-token']").attr("content")
            },
            success: function(respuesta) {
                console.log(respuesta)
                if (!respuesta == "") {
                    // console.log(respuesta[0]['id_nota'])
                    $("#idNotaM").val(respuesta[0]['id_nota']);
                    $("#tituloNotaM").val(respuesta[0]['titulo_nota']);
                    $("#descripcionNotaM").val(respuesta[0]['descripcion'])
                    $("#modificarNotas").modal('show');
                }
            }
        })
    }

    $("#formNotaM").on('submit', function(e) {
        e.preventDefault()
        console.log('se hizo submit')
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

        $.ajax({
            type: 'POST',
            url: "{{route('modificarNota')}}",
            data: $('#formNotaM').serialize(),
            headers: {
                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
            },
            success: function(respuesta) {
                console.log(respuesta.respuesta)

                if (respuesta.respuesta == 200) {

                    $.ajax({
                        url: "{{route('mostrarNotas')}}",
                        success: function(pagina) {
                            $("#bodyHTML").html(pagina)
                        }
                    })
                    $("#modificarNotas").modal('hide');
                    Toast.fire({
                        icon: 'success',
                        title: 'Se ha modificado con exito.'
                    })
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Error al iniciar la consulta'
                    })
                }
            }
        })
    })
</script>