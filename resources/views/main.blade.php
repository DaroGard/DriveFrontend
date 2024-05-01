<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ url('https://ssl.gstatic.com/images/branding/product/2x/hh_drive_36dp.png') }}"
        type="image/x-icon">
    <title>Pagina principal - Google Drive</title>
    <link rel="stylesheet" href="{{ url('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6130fb0810.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="cajaPrincipal">
        <section id="seccionUno">
            <div id="logo"><img
                    src="{{ url('https://ssl.gstatic.com/images/branding/product/2x/hh_drive_36dp.png') }}"
                    alt="logo.png" style="width: 40px; height: 40px; margin-right: 2%">Drive</div>
            <button type="button" role="button" tabindex="0" class="brbsPe Ss7qXc a-qb-d" aria-disabled="false"
                aria-expanded="false" aria-haspopup="true" guidedhelpid="new_menu_button" style="user-select: none;"
                data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"><i
                    role="presentation" class="cUCuw   upeNge KuOzJf QmyJdb vA3Shd" ssk="6:aP5GMe"></i><i
                    role="presentation" class="WNpj6b i1jHKe" ssk="6:jC5xjb"></i><span><span class="a-ec-Gd-zc-c"><svg
                            class="Q6yead QJZfhe " width="24" height="24" viewBox="0 0 24 24" focusable="false">
                            <path d="M20 13h-7v7h-2v-7H4v-2h7V4h2v7h7v2z"></path>
                        </svg></span></span><span class="jYPt8c">Nuevo</span></button>
            <div id="navMenu">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action active" aria-current="true"><i
                            class="fa-solid fa-house"></i> Pagina Principal</button>
                    <button type="button" class="list-group-item list-group-item-action"><i
                            class="fa-solid fa-laptop-file"></i> Computadoras</button>
                    <button type="button" class="list-group-item list-group-item-action"><i
                            class="fa-solid fa-users"></i> Compartidos</button>
                    <button type="button" class="list-group-item list-group-item-action"><i
                            class="fa-solid fa-star"></i> Destacados</button>
                    <button type="button" class="list-group-item list-group-item-action"><i
                            class="fa-solid fa-recycle"></i> Papelera</button>
                </div>
            </div>
            <div id="almacenamiento">
                <h6><i class="fa-solid fa-cloud"></i> Almacenamiento</h6>
                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0"
                    aria-valuemax="100">
                    <div class="progress-bar w-75"></div>
                </div>
            </div>
        </section>
        <section id="seccionDos">
            <div id="usuario">
                <div style="margin-right: 1.5%;"><i class="fa-solid fa-gear"></i></div>
                <div id="imagen"><img src="{{ asset('img/default-picture.png') }}" style="width: 100%;"></div>
            </div>
            <div id="cajaMedia">
                <br>
                <header>
                    <h2>Te damos la bienvenida a Drive</h2>
                </header>
                <div id="categoria">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Tipo
                        </button>
                        <ul class="dropdown-menu">
                            @foreach ($tiposArchivos as $tipoArchivo)
                                <li><button class="dropdown-item"
                                        type="button" value="{{ $tipoArchivo->idTipoArchivo }}">{{ $tipoArchivo->tipoArchivo }}</button></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Personas
                        </button>
                        <ul class="dropdown-menu">
                            @foreach ($usuarios as $usuario)
                                @if (Session::get('cuentaAct')['idUsuario'] != $usuario->idUsuario)
                                    <li><button class="dropdown-item" type="button" value="{{ $usuario->idUsuario }}">{{ $usuario->nombre }}</button>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Modificado
                        </button>
                        <ul class="dropdown-menu">
                            <li><button class="dropdown-item" type="button">Hoy</button></li>
                            <li><button class="dropdown-item" type="button">Ultimos 7 dias</button></li>
                            <li><button class="dropdown-item" type="button">Ultimos 30 dias</button></li>
                        </ul>
                    </div>
                </div>
                <div id="sugerido">
                    Sugerido:
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off"
                            checked>
                        <label class="btn btn-outline-primary" for="btnradio1">Archivo</label>
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btnradio2">Carpeta</label>
                    </div>
                </div>
                <div id="archivosNav">
                    <div class="col-md-8">
                        <div class="table-container">
                            <table id="tablaProductos" class="table table-striped table-hover mt-4">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="display: none">#Categoria</th>
                                        <th>Nombre</th>
                                        <th>Motivo Sugerido</th>
                                        <th>Propietario</th>
                                        <th>Ubicacion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="display: none"></td>
                                        <td><i class="fa-solid fa-file" style="margin-right: 4%"></i> Archivo1</td>
                                        <td>Subido 23 Abr 2024</td>
                                        <td><i class="fa-solid fa-user" style="margin-right: 4%"></i> yo</td>
                                        <td><i class="fa-regular fa-folder" style="margin-right: 4%"></i> Carpeta1
                                        </td>
                                        <th><i class="fa-solid fa-user-plus"> <i
                                                    class="fa-solid fa-pen-to-square"></i> <i
                                                    class="fa-regular fa-star"></i> <i
                                                    class="fa-solid fa-trash"></i></i></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Archivo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formulario-archivo" action="{{ route('guardar-archivo') }}" method="POST">
                        @csrf
                        <div class="mb-3" style="display: none">
                            <label for="recipient-id" class="col-form-label">ID Usuario:</label>
                            <input type="text" class="form-control" id="recipient-id" name="idUsuario" value="{{ Session::get('cuentaAct')['idUsuario'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="recipient-name" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-descripcion" class="col-form-label">Descripción:</label>
                            <input type="text" class="form-control" id="recipient-descripcion" name="descripcion">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-tamanio" class="col-form-label">Tamaño:</label>
                            <input type="text" class="form-control" id="recipient-tamanio" name="tamano">
                        </div>
                        <div class="form-group">
                            <label for="tipoarchivo">Tipo de Archivo:</label>
                            <select class="form-control" id="tipoarchivo" name="tipoarchivo" required>
                                @foreach ($tiposArchivos as $tipoArchivo)
                                    <option value="{{ $tipoArchivo->idTipoArchivo }}">{{ $tipoArchivo->tipoArchivo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
