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
            <div class="dropdown">
                <button
                    style="margin: 16%;margin-bottom: 10%;border-radius: 18px;width: 58%;height: 52%;color: black;background: white;border: none; padding-right: 10%; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);"
                    class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false" {{ $totalTamano >= $maximo ? 'disabled' : '' }}>
                    <span>
                        <span class="a-ec-Gd-zc-c">
                            <svg class="Q6yead QJZfhe " width="24" height="24" viewBox="0 0 24 24"
                                focusable="false">
                                <path d="M20 13h-7v7h-2v-7H4v-2h7V4h2v7h7v2z"></path>
                            </svg>
                        </span>
                    </span>
                    <span class="jYPt8c">Nuevo</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#" id="nuevoArchivo">Nuevo Archivo</a></li>
                    <li><a class="dropdown-item" href="#" id="nuevaCarpeta">Nueva Carpeta</a></li>
                    <li><a class="dropdown-item" href="#" id="nuevaComputadora">Nueva Computadora</a></li>
                    <li><a class="dropdown-item" href="#" id="nuevaGrupo">Nuevo Grupo</a></li>
                    <li><a class="dropdown-item" href="#" id="nuevaTarjeta">Nueva Tarjeta</a></li>
                </ul>
            </div>

            @if ($totalTamano >= $maximo)
                <div class="alert alert-danger" role="alert">
                    ¡Has superado el límite de almacenamiento!
                </div>
            @endif
            <div id="navMenu">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action active"
                        data-target-table="tablaArchivos"><i class="fa-solid fa-house"></i> Pagina Principal</button>
                    <button type="button" class="list-group-item list-group-item-action"
                        data-target-table="tablaComputadoras"><i class="fa-solid fa-laptop-file"></i>
                        Computadoras</button>
                    <button type="button" class="list-group-item list-group-item-action"
                        data-target-table="tablaCompartidos"><i class="fa-solid fa-users"></i> Compartidos</button>
                    <button type="button" class="list-group-item list-group-item-action"
                        data-target-table="tablaDestacados"><i class="fa-solid fa-star"></i> Destacados</button>
                    <button type="button" class="list-group-item list-group-item-action"
                        data-target-table="tablaPapelera"><i class="fa-solid fa-recycle"></i> Papelera</button>
                </div>
                <div id="almacenamiento">
                    <h6><i class="fa-solid fa-cloud"></i> Almacenamiento</h6>
                    <div class="progress" role="progressbar" aria-label="Basic example"
                        aria-valuenow="{{ $totalTamano }}" aria-valuemin="0" aria-valuemax="{{ $maximo }}">
                        <div class="progress-bar" style="width: {{ $porcentaje }}%;"
                            aria-valuenow="{{ $totalTamano }}"></div>
                    </div>
                </div>
        </section>
        <section id="seccionDos">
            <div id="usuario">
                <div class="d-inline" style="margin-right: 1.5%;">
                    <div data-bs-toggle="modal" data-bs-target="#usuarioModal" data-bs-whatever="@usuarioModal"
                        role="button" class="cursor-pointer">
                        <i class="fas fa-cog"></i>
                    </div>
                </div>
                @if (Session::get('cuentaAct')['imagen'] != null)
                    <div id="imagen">
                        <img src="{{ asset(Session::get('cuentaAct')['imagen']) }}"
                            style="width:100%; height: auto; object-fit: cover;">
                    </div>
                @else
                    <div id="imagen"><img src="{{ asset('img/default-picture.png') }}"
                            style="width:100%; height: auto; object-fit: cover;"></div>
                @endif
            </div>
            <div id="cajaMedia">
                <br>
                <header>
                    <h2>Te damos la bienvenida a Drive</h2>
                </header>
                <div id="categoria">
                    <div class="dropdown">
                        <button id="tipoArchivoDropdown" class="btn btn-secondary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Tipo
                        </button>
                        <ul class="dropdown-menu">
                            <li><button class="dropdown-item" onclick="filtrarPorTipo(null)"
                                    type="button">Todos</button></li>
                            @foreach ($tiposArchivos as $tipoArchivo)
                                <li><button class="dropdown-item"
                                        onclick="filtrarPorTipo('{{ $tipoArchivo->idTipoArchivo }}')" type="button"
                                        value="{{ $tipoArchivo->idTipoArchivo }}">{{ $tipoArchivo->tipoArchivo }}</button>
                                </li>
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
                                    <li><button class="dropdown-item" type="button"
                                            value="{{ $usuario->idUsuario }}">{{ $usuario->nombre }}</button>
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
                            <!--Tabla Archivos-->
                            <table id="tablaArchivos" class="table table-striped table-hover mt-4">
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
                                    @foreach ($archivos as $archivo)
                                        @if ($archivo->usuario->idUsuario == Session::get('cuentaAct')['idUsuario'] && $archivo->estadoArchivo->idEstado == 1)
                                            <tr data-tamano="{{ $archivo->tamano }}">
                                                <td style="display: none"></td>
                                            </tr>
                                            <tr data-idArchivo="{{ $archivo->idArchivo }}">
                                                <td style="display: none"></td>
                                            <tr data-tipo="{{ $archivo->tipoArchivo->idTipoArchivo }}">
                                                <td style="display: none"></td>
                                                @if ($archivo->tipoArchivo->idTipoArchivo == 1)
                                                    <td><i class="fa-solid fa-file-pdf"
                                                            style="margin-right: 4%"></i>{{ $archivo->nombre }}</td>
                                                @else
                                                    @if ($archivo->tipoArchivo->idTipoArchivo == 2 || $archivo->tipoArchivo->idTipoArchivo == 4)
                                                        <td><i class="fa-solid fa-file-image"
                                                                style="margin-right: 4%"></i>{{ $archivo->nombre }}
                                                        </td>
                                                    @else
                                                        @if ($archivo->tipoArchivo->idTipoArchivo == 3)
                                                            <td><i class="fa-solid fa-file-word"
                                                                    style="margin-right: 4%"></i>{{ $archivo->nombre }}
                                                            </td>
                                                        @else
                                                            @if ($archivo->tipoArchivo->idTipoArchivo == 5)
                                                                <td><i class="fa-solid fa-file-file"
                                                                        style="margin-right: 4%"></i>{{ $archivo->nombre }}
                                                                </td>
                                                            @else
                                                                @if ($archivo->tipoArchivo->idTipoArchivo == 6)
                                                                    <td><i class="fa-solid fa-file-audio"
                                                                            style="margin-right: 4%"></i>{{ $archivo->nombre }}
                                                                    </td>
                                                                @else
                                                                    @if ($archivo->tipoArchivo->idTipoArchivo == 7)
                                                                        <td><i class="fa-solid fa-file-video"
                                                                                style="margin-right: 4%"></i>{{ $archivo->nombre }}
                                                                        </td>
                                                                    @else
                                                                        <td><i class="fa-solid fa-file-lines"
                                                                                style="margin-right: 4%"></i>{{ $archivo->nombre }}
                                                                        </td>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endif
                                                <td>{{ (new DateTime($archivo->fechaCreacion))->format('d/m/y') }}</td>
                                                <td><i class="fa-solid fa-user" style="margin-right: 4%"></i>
                                                    {{ $archivo->usuario->nombre }}</td>
                                                @if ($archivo->carpeta != null)
                                                    <td>
                                                        <i class="fa-regular fa-folder" style="margin-right: 4%"></i>
                                                        {{ $archivo->carpeta->nombreCarpeta }}
                                                    </td>
                                                @else
                                                    <td>
                                                        <i class="fa-regular fa-folder" style="margin-right: 4%"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalDetallesArchivo"
                                                            data-idArchivoDetalles="{{ $archivo->idArchivo }}"
                                                            data-nombre="{{ $archivo->nombre }}"
                                                            data-descripcion="{{ $archivo->descripcion }}"></i>
                                                        {{ $archivo->carpeta }}
                                                    </td>
                                                @endif
                                                <th><i class="fa-solid fa-user-plus"></i>
                                                    <i data-bs-toggle="modal" data-bs-target="#editarArchivo"
                                                        data-bs-whatever="@editarArchivo"
                                                        data-idEdit="{{ $archivo->idArchivo }}"
                                                        data-nombreEdit="{{ $archivo->nombre }}"
                                                        data-descripcionEdit="{{ $archivo->descripcion }}"
                                                        data-tipoEdit="{{ $archivo->tipoArchivo->tipoArchivo }}"
                                                        data-fechaEdit="{{ (new DateTime($archivo->fechaCreacion))->format('d/m/y') }}"
                                                        data-usuarioEdit="yo" class="fa-solid fa-pen-to-square"></i>
                                                        @if ($archivo->favorito != null)
                                                        <i class="fa-regular fa-star" style="color: gold"></i>
                                                        @else
                                                        <i data-bs-toggle="modal" data-bs-target="#favorito"
                                                        data-bs-whatever="@favorito"
                                                        data-id="{{ $archivo->idArchivo }}"
                                                        data-nombre="{{ $archivo->nombre }}"
                                                        data-tipo="{{ $archivo->tipoArchivo->tipoArchivo }}"
                                                        data-fecha="{{ (new DateTime($archivo->fechaCreacion))->format('d/m/y') }}"
                                                        data-usuario="{{ $archivo->usuario->nombre }}"
                                                        data-carpeta="{{ $archivo->carpeta ? $archivo->carpeta->nombreCarpeta : '' }}"
                                                        class="fa-regular fa-star"></i>
                                                        @endif
                                                    <i class="fa-solid fa-trash" data-bs-toggle="modal"
                                                        data-bs-target="#moverPapelera"
                                                        data-bs-whatever="@moverPapelera"
                                                        data-archivoPapeleraId="{{ $archivo->idArchivo }}"
                                                        data-archivoPapeleraNombre="{{ $archivo->nombre }}"
                                                        data-archivoPapeleraDescripcion="{{ $archivo->descripcion }}"
                                                        data-archivoPapeleraTipo="{{ $archivo->tipoArchivo->tipoArchivo }}"
                                                        data-carpetaPapelera="{{ $archivo->carpeta ? $archivo->carpeta->nombreCarpeta : '' }}"></i>
                                                </th>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <!--Tabla Carpetas-->
                            <table id="tablaCarpetas" style="display: none;"
                                class="table table-striped table-hover mt-4">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Carpeta</th>
                                        <th>Estado</th>
                                        <th>Usuario</th>
                                        <th>Carpeta Padre</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carpetas as $carpeta)
                                        <tr class="fila-carpeta" data-tipo="{{ $carpeta->idCarpeta }}">
                                            <td style="display: none"></td>
                                            <td>
                                                <i class="fa-solid fa-folder" style="margin-right: 4%"></i>{{ $carpeta->nombreCarpeta }}
                                            </td>
                                            <td>{{ $carpeta->estadoCarpeta->estado }}</td>
                                            <td><i class="fa-solid fa-user"
                                                    style="margin-right: 4%"></i>{{ Session::get('cuentaAct')['nombre'] }}
                                            </td>
                                            <td><i class="fa-regular fa-folder"
                                                    style="margin-right: 4%"></i>{{ $carpeta->carpetaPadre }}</td>
                                            <th>
                                                <i class="fa-solid fa-user-plus"></i>
                                                <i data-bs-toggle="modal" data-bs-target="#editarcarpeta"
                                                    data-bs-whatever="@editarcarpeta"
                                                    data-idEditCarp="{{ $carpeta->idCarpeta }}"
                                                    data-nombreEditCarp="{{ $carpeta->nombreCarpeta }}"
                                                    data-usuarioEditCarp="{{ Session::get('cuentaAct')['nombre'] }}"
                                                    data-carpetaPadre="{{ $carpeta->carpetaPadre }}"
                                                    class="fa-solid fa-pen-to-square"></i>
                                                <i data-bs-toggle="modal" data-bs-target="#favoritoCarp"
                                                    data-bs-whatever="@favoritoCarp"
                                                    data-nombre="{{ $carpeta->nombreCarpeta }}"
                                                    data-usuario="{{ Session::get('cuentaAct')['nombre'] }}"
                                                    data-carpeta="{{ $carpeta->carpetaPadre }}"
                                                    class="fa-regular fa-star"></i>
                                                <i class="fa-solid fa-trash"></i>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!--Tabla Computadoras-->
                            <table id="tablaComputadoras" style="display: none;"
                                class="table table-striped table-hover mt-4">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="display: none">#Categoria</th>
                                        <th>Nombre</th>
                                        <th>Propietario</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($computadoras as $computadora)
                                        @if ($computadora->usuario->idUsuario == Session::get('cuentaAct')['idUsuario'])
                                            <tr data-idPc="{{ $computadora->idComputadora }}">
                                                <td style="display: none"></td>
                                                <td><i class="fa-solid fa-desktop"
                                                        style="margin-right: 4%"></i>{{ $computadora->nombreComputadora }}
                                                </td>
                                                <td><i class="fa-solid fa-user" style="margin-right: 4%"></i>
                                                    {{ $computadora->usuario->nombre }}</td>
                                                <td>
                                                    <i class="fa-solid fa-trash" data-bs-toggle="modal"
                                                        data-bs-target="#eliminarPC" data-bs-whatever="@eliminarPC"
                                                        data-computadoraEliminarId="{{ $computadora->idComputadora }}"
                                                        data-computadoraEliminarNombre="{{ $computadora->nombreComputadora }}"></i>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>

                            <!--Tabla Compartidos-->
                            <table id="tablaCompartidos" style="display: none;"
                                class="table table-striped table-hover mt-4">
                            </table>

                            <!--Tabla Destacados-->
                            <table id="tablaDestacados" style="display: none;"
                                class="table table-striped table-hover mt-4">
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
                                    @foreach ($favoritos as $favorito)
                                        @if (
                                            $favorito->usuario->idUsuario == Session::get('cuentaAct')['idUsuario'] &&
                                                $favorito->archivo->estadoArchivo->idEstado == 1)
                                            <tr data-tamano="{{ $favorito->archivo->tamano }}">
                                                <td style="display: none"></td>
                                            </tr>
                                            <tr data-idArchivo="{{ $favorito->archivo->idArchivo }}">
                                                <td style="display: none"></td>
                                            <tr data-tipo="{{ $favorito->archivo->tipoArchivo->idTipoArchivo }}">
                                                <td style="display: none"></td>
                                                @if ($favorito->archivo->tipoArchivo->idTipoArchivo == 1)
                                                    <td><i class="fa-solid fa-file-pdf"
                                                            style="margin-right: 4%"></i>{{ $favorito->archivo->nombre }}
                                                    </td>
                                                @else
                                                    @if ($favorito->archivo->tipoArchivo->idTipoArchivo == 2 || $favorito->archivo->tipoArchivo->idTipoArchivo == 4)
                                                        <td><i class="fa-solid fa-file-image"
                                                                style="margin-right: 4%"></i>{{ $favorito->archivo->nombre }}
                                                        </td>
                                                    @else
                                                        @if ($favorito->archivo->tipoArchivo->idTipoArchivo == 3)
                                                            <td><i class="fa-solid fa-file-word"
                                                                    style="margin-right: 4%"></i>{{ $favorito->archivo->nombre }}
                                                            </td>
                                                        @else
                                                            @if ($favorito->archivo->tipoArchivo->idTipoArchivo == 5)
                                                                <td><i class="fa-solid fa-file-file"
                                                                        style="margin-right: 4%"></i>{{ $favorito->archivo->nombre }}
                                                                </td>
                                                            @else
                                                                @if ($favorito->archivo->tipoArchivo->idTipoArchivo == 6)
                                                                    <td><i class="fa-solid fa-file-audio"
                                                                            style="margin-right: 4%"></i>{{ $favorito->archivo->nombre }}
                                                                    </td>
                                                                @else
                                                                    @if ($favorito->archivo->tipoArchivo->idTipoArchivo == 7)
                                                                        <td><i class="fa-solid fa-file-video"
                                                                                style="margin-right: 4%"></i>{{ $favorito->archivo->nombre }}
                                                                        </td>
                                                                    @else
                                                                        <td><i class="fa-solid fa-file-lines"
                                                                                style="margin-right: 4%"></i>{{ $favorito->archivo->nombre }}
                                                                        </td>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endif
                                                <td>{{ (new DateTime($favorito->archivo->fechaCreacion))->format('d/m/y') }}
                                                </td>
                                                <td><i class="fa-solid fa-user" style="margin-right: 4%"></i>
                                                    {{ $favorito->archivo->usuario->nombre }}</td>
                                                @if ($favorito->archivo->carpeta != null)
                                                    <td>
                                                        <i class="fa-regular fa-folder" style="margin-right: 4%"></i>
                                                        {{ $favorito->archivo->carpeta->nombreCarpeta }}
                                                    </td>
                                                @else
                                                    <td>
                                                        <i class="fa-regular fa-folder" style="margin-right: 4%"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalDetallesArchivo"
                                                            data-idArchivoDetalles="{{ $favorito->archivo->idArchivo }}"
                                                            data-nombre="{{ $favorito->archivo->nombre }}"
                                                            data-descripcion="{{ $favorito->archivo->descripcion }}"></i>
                                                        {{ $favorito->archivo->carpeta }}
                                                    </td>
                                                @endif
                                                <th><i class="fa-solid fa-user-plus"></i>
                                                    <i data-bs-toggle="modal" data-bs-target="#editarArchivo"
                                                        data-bs-whatever="@editarArchivo"
                                                        data-idEdit="{{ $favorito->archivo->idArchivo }}"
                                                        data-nombreEdit="{{ $favorito->archivo->nombre }}"
                                                        data-descripcionEdit="{{ $favorito->archivo->descripcion }}"
                                                        data-tipoEdit="{{ $favorito->archivo->tipoArchivo->tipoArchivo }}"
                                                        data-fechaEdit="{{ (new DateTime($favorito->archivo->fechaCreacion))->format('d/m/y') }}"
                                                        data-usuarioEdit="yo" class="fa-solid fa-pen-to-square"></i>
                                                    <i class="fa-regular fa-star" style="color: gold"></i>
                                                    <i class="fa-solid fa-trash" data-bs-toggle="modal"
                                                        data-bs-target="#moverPapelera"
                                                        data-bs-whatever="@moverPapelera"
                                                        data-archivoPapeleraId="{{ $favorito->archivo->idArchivo }}"
                                                        data-archivoPapeleraNombre="{{ $favorito->archivo->nombre }}"
                                                        data-archivoPapeleraDescripcion="{{ $favorito->archivo->descripcion }}"
                                                        data-archivoPapeleraTipo="{{ $favorito->archivo->tipoArchivo->tipoArchivo }}"
                                                        data-carpetaPapelera="{{ $favorito->archivo->carpeta ? $favorito->archivo->carpeta->nombreCarpeta : '' }}"></i>
                                                </th>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>

                            <!--Tabla Papelera-->
                            <table id="tablaPapelera" style="display: none;"
                                class="table table-striped table-hover mt-4">
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
                                    @foreach ($archivos as $archivo)
                                        @if ($archivo->estadoArchivo->idEstado == 2)
                                            <tr data-idArchivo="{{ $archivo->idArchivo }}">
                                                <td style="display: none"></td>
                                            <tr data-tipo="{{ $archivo->tipoArchivo->idTipoArchivo }}">
                                                <td style="display: none"></td>
                                                @if ($archivo->tipoArchivo->idTipoArchivo == 1)
                                                    <td><i class="fa-solid fa-file-pdf"
                                                            style="margin-right: 4%"></i>{{ $archivo->nombre }}</td>
                                                @else
                                                    @if ($archivo->tipoArchivo->idTipoArchivo == 2 || $archivo->tipoArchivo->idTipoArchivo == 4)
                                                        <td><i class="fa-solid fa-file-image"
                                                                style="margin-right: 4%"></i>{{ $archivo->nombre }}
                                                        </td>
                                                    @else
                                                        @if ($archivo->tipoArchivo->idTipoArchivo == 3)
                                                            <td><i class="fa-solid fa-file-word"
                                                                    style="margin-right: 4%"></i>{{ $archivo->nombre }}
                                                            </td>
                                                        @else
                                                            @if ($archivo->tipoArchivo->idTipoArchivo == 5)
                                                                <td><i class="fa-solid fa-file-file"
                                                                        style="margin-right: 4%"></i>{{ $archivo->nombre }}
                                                                </td>
                                                            @else
                                                                @if ($archivo->tipoArchivo->idTipoArchivo == 6)
                                                                    <td><i class="fa-solid fa-file-audio"
                                                                            style="margin-right: 4%"></i>{{ $archivo->nombre }}
                                                                    </td>
                                                                @else
                                                                    @if ($archivo->tipoArchivo->idTipoArchivo == 7)
                                                                        <td><i class="fa-solid fa-file-video"
                                                                                style="margin-right: 4%"></i>{{ $archivo->nombre }}
                                                                        </td>
                                                                    @else
                                                                        <td><i class="fa-solid fa-file-lines"
                                                                                style="margin-right: 4%"></i>{{ $archivo->nombre }}
                                                                        </td>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endif
                                                <td>{{ (new DateTime($archivo->fechaCreacion))->format('d/m/y') }}
                                                </td>
                                                <td><i class="fa-solid fa-user" style="margin-right: 4%"></i>
                                                    {{ $archivo->usuario->nombre }}</td>
                                                @if ($archivo->carpeta != null)
                                                    <td>
                                                        <i class="fa-regular fa-folder" style="margin-right: 4%"></i>
                                                        {{ $archivo->carpeta->nombreCarpeta }}
                                                    </td>
                                                @else
                                                    <td>
                                                        <i class="fa-regular fa-folder" style="margin-right: 4%"></i>
                                                        {{ $archivo->carpeta }}
                                                    </td>
                                                @endif
                                                <th>
                                                    <i data-bs-toggle="modal" data-bs-target="#editarArchivo"
                                                        data-bs-whatever="@editarArchivo"
                                                        data-idEdit="{{ $archivo->idArchivo }}"
                                                        data-nombreEdit="{{ $archivo->nombre }}"
                                                        data-descripcionEdit="{{ $archivo->descripcion }}"
                                                        data-tipoEdit="{{ $archivo->tipoArchivo->tipoArchivo }}"
                                                        data-fechaEdit="{{ (new DateTime($archivo->fechaCreacion))->format('d/m/y') }}"
                                                        data-usuarioEdit="yo" class="fa-solid fa-pen-to-square"></i>
                                                    <i class="fa-solid fa-trash" data-bs-toggle="modal"
                                                        data-bs-target="#eliminar" data-bs-whatever="@eliminar"
                                                        data-idEliminar="{{ $archivo->idArchivo }}"
                                                        data-nombreEliminar="{{ $archivo->nombre }}"
                                                        data-tipoEliminar="{{ $archivo->tipoArchivo->tipoArchivo }}"
                                                        data-fechaEliminar="{{ (new DateTime($archivo->fechaCreacion))->format('d/m/y') }}"
                                                        data-usuarioEliminar="{{ $archivo->usuario->nombre }}"
                                                        data-carpetaEliminar="{{ $archivo->carpeta ? $archivo->carpeta->nombreCarpeta : '' }}"></i>
                                                </th>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
    <!--Modal guardar archivos-->
    <div class="modal fade" id="modalArchivo" tabindex="-1" aria-labelledby="modalArchivoLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalArchivoLabel">Agregar Archivo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formulario-archivo" action="{{ route('guardar-archivo') }}" method="POST">
                        @csrf
                        <div class="mb-3" style="display: none;">
                            <label for="recipient-id" class="form-label">ID Usuario:</label>
                            <input type="text" class="form-control" id="recipient-id" name="idUsuario"
                                value="{{ Session::get('cuentaAct')['idUsuario'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="recipient-name" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-descripcion" class="form-label">Descripción:</label>
                            <input type="text" class="form-control" id="recipient-descripcion"
                                name="descripcion">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-tamanio" class="form-label">Tamaño:</label>
                            <input type="text" class="form-control" id="recipient-tamanio" name="tamano">
                        </div>
                        <div class="mb-3">
                            <label for="tipoarchivo" class="form-label">Tipo de Archivo:</label>
                            <select class="form-select" id="tipoarchivo" name="tipoarchivo" required>
                                @foreach ($tiposArchivos as $tipoArchivo)
                                    <option value="{{ $tipoArchivo->idTipoArchivo }}">
                                        {{ $tipoArchivo->tipoArchivo }}
                                    </option>
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
    <!--Modal actualizar usuario-->
    <div class="modal fade" id="usuarioModal" tabindex="-1" aria-labelledby="usuarioModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="usuarioModalLabel">{{ Session::get('cuentaAct')['nombre'] }}
                        {{ Session::get('cuentaAct')['apellido'] }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('actualizar-usuario') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="usuarioNombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="usuarioNombre"
                                value="{{ Session::get('cuentaAct')['nombre'] }}"
                                placeholder="{{ Session::get('cuentaAct')['nombre'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="usuarioApellido" class="col-form-label">Apellido:</label>
                            <input type="text" class="form-control" id="usuarioApellido"
                                value="{{ Session::get('cuentaAct')['apellido'] }}"
                                placeholder="{{ Session::get('cuentaAct')['apellido'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="usuarioContrasena" class="col-form-label">Contraseña:</label>
                            <input type="password" class="form-control" id="usuarioContrasena"
                                name="usuarioContrasena" placeholder="Ingresar nueva contraseña...">
                        </div>
                        <div class="mb-3">
                            <label for="genero">Género:</label>
                            <select class="form-control" id="genero" name="genero" required>
                                <option value="{{ Session::get('cuentaAct')['genero']['idGenero'] ?? '' }}">Seleccionar</option>
                                @foreach ($generos as $genero)
                                    <option value="{{ $genero->idGenero }}">{{ $genero->tipoGenero }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="lugar">Lugar:</label>
                            <select class="form-control" id="lugar" name="lugar" required>
                                <option value="{{ Session::get('cuentaAct')['lugar']['idLugar'] ?? '' }}">Seleccionar</option>
                                @foreach ($lugares as $lugar)
                                    <option value="{{ $lugar->idLugar }}">{{ $lugar->nombreLugar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="preferencia">Preferencia:</label>
                            <select class="form-control" id="preferencia" name="preferencia" required>
                                <option value="{{ Session::get('cuentaAct')['preferencia']['idPreferencia'] ?? '' }}">
                                    Seleccionar
                                </option>
                                @foreach ($preferencias as $preferencia)
                                    <option value="{{ $preferencia->idPreferencia }}">
                                        {{ $preferencia->preferencia }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="usuarioTelefono" class="col-form-label">Teléfono:</label>
                            <input type="text" class="form-control" id="usuarioTelefono" name="usuarioTelefono"
                                placeholder="{{ Session::get('cuentaAct')['telefono'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="usuarioImg" class="col-form-label">Foto:</label>
                            <input type="text" class="form-control" id="usuarioImg" name="usuarioImg"
                                placeholder="img/nombre.extension">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" onclick="cerrarSesion()">Cerrar
                                Sesion</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Modal editor archivo-->
    <div class="modal fade" id="editarArchivo" tabindex="-1" aria-labelledby="editarArchivoLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editarArchivoLabel">Detalles del Archivo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('archivos-actualizar') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3" style="display: none">
                            <label for="archivoEditId" class="col-form-label">ID:</label>
                            <input type="text" class="form-control" id="archivoEditId" name="archivoEditId"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label for="archivoEditNombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="archivoEditNombre"
                                name="archivoEditNombre">
                        </div>
                        <div class="mb-3">
                            <label for="archivoEditDescripcion" class="col-form-label">Descripcion:</label>
                            <input type="text" class="form-control" id="archivoEditDescripcion"
                                name="archivoEditDescripcion">
                        </div>
                        <div class="mb-3" style="display: none">
                            <label for="archivoEditTipo" class="col-form-label">Tipo:</label>
                            <input type="text" class="form-control" id="archivoEditTipo" name="archivoEditTipo"
                                readonly>
                        </div>
                        <div class="mb-3" style="display: none">
                            <label for="archivoEditFecha" class="col-form-label">Fecha de Creación:</label>
                            <input type="text" class="form-control" id="archivoEditFecha" name="archivoEditFecha"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label for="archivoEditCarpeta" class="col-form-label">Carpeta:</label>
                            <input type="text" class="form-control" id="archivoEditCarpeta"
                                name="archivoEditCarpeta" readonly>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!--Mover a papelera-->
    <div class="modal fade" id="moverPapelera" tabindex="-1" aria-labelledby="moverPapeleraLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="moverPapeleraLabel">Detalles del Archivo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('papelera') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3" style="display: none">
                            <label for="archivoPapeleraId" class="col-form-label">ID:</label>
                            <input type="text" class="form-control" id="archivoPapeleraId"
                                name="archivoPapeleraId" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="archivoPapeleraNombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="archivoPapeleraNombre"
                                name="archivoPapeleraNombre" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="archivoPapeleraDescripcion" class="col-form-label">Descripcion:</label>
                            <input type="text" class="form-control" id="archivoPapeleraDescripcion"
                                name="archivoPapeleraDescripcion" readonly>
                        </div>
                        <div class="mb-3" style="display: none">
                            <label for="archivoPapeleraTipo" class="col-form-label">Tipo:</label>
                            <input type="text" class="form-control" id="archivoPapeleraTipo"
                                name="archivoPapeleraTipo" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="carpetaPapelera" class="col-form-label">Carpeta:</label>
                            <input type="text" class="form-control" id="carpetaPapelera" name="carpetaPapelera"
                                readonly>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Eliminar</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!--Modal Favoritos-->
    <div class="modal fade" id="favorito" tabindex="-1" aria-labelledby="favoritoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="favoritoLabel">Detalles del Archivo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('agregar-favorito') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="archivoFavId" class="col-form-label"></label>
                            <input type="text" class="form-control" id="archivoFavId" name="archivoFavId"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label for="archivoFavNombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="archivoFavNombre" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="archivoFavTipo" class="col-form-label">Tipo:</label>
                            <input type="text" class="form-control" id="archivoFavTipo" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="archivoFavFecha" class="col-form-label">Fecha de Creación:</label>
                            <input type="text" class="form-control" id="archivoFavFecha" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="archivoFavUsuario" class="col-form-label">Usuario:</label>
                            <input type="text" class="form-control" id="archivoFavUsuario" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="archivoFavCarpeta" class="col-form-label">Carpeta:</label>
                            <input type="text" class="form-control" id="archivoFavCarpeta" readonly>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Añadir a Favoritos</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!--Modal eliminar-->
    <div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="eliminarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="eliminarLabel">Detalles del Archivo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-delete" action="{{ route('eliminar-archivo') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="idEliminar" name="idEliminar">
                        <div class="mb-3">
                            <label for="nombreEliminar" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombreEliminar" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="tipoEliminar" class="col-form-label">Tipo:</label>
                            <input type="text" class="form-control" id="tipoEliminar" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="fechaEliminar" class="col-form-label">Fecha de Creación:</label>
                            <input type="text" class="form-control" id="fechaEliminar" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="usuarioEliminar" class="col-form-label">Usuario:</label>
                            <input type="text" class="form-control" id="usuarioEliminar" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="carpetaEliminar" class="col-form-label">Carpeta:</label>
                            <input type="text" class="form-control" id="carpetaEliminar" readonly>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('¿Estás seguro de eliminar este elemento?')">Eliminar</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!--Modal Carpetas-->
    <div class="modal fade" id="modalCarpeta" tabindex="-1" role="dialog" aria-labelledby="modalCarpetaLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCarpetaLabel">Agregar Carpeta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formulario-carpeta" action="{{ route('guardar-carpeta') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nombreCarpeta" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombreCarpeta" name="nombreCarpeta"
                                required>
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
    <!--Modal Computadora-->
    <div class="modal fade" id="modalComputadora" tabindex="-1" role="dialog"
        aria-labelledby="modalComputadoraLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalComputadoraLabel">Agregar Computadora</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formulario-computadora" action="{{ route('guardar-computadora') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="usuarioComputadora" class="form-label"></label>
                            <input type="text" class="form-control" id="usuarioComputadora"
                                name="usuarioComputadora" hidden
                                value="{{ Session::get('cuentaAct')['idUsuario'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="nombreComputadora" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombreComputadora"
                                name="nombreComputadora" required>
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
    <!-- Modal para mostrar detalles del archivo -->
    <div class="modal fade" id="modalDetallesArchivo" tabindex="-1" aria-labelledby="modalDetallesArchivoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetallesArchivoLabel">Detalles del Archivo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('carpeta-archivo') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="idDetalleArchivo" class="form-label">ID:</label>
                            <input type="text" class="form-control" id="idDetalleArchivo" name="idDetalleArchivo"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nombreDetalleArchivo" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombreDetalleArchivo" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="descripcionDetalleArchivo" class="form-label">Descripción:</label>
                            <textarea class="form-control" id="descripcionDetalleArchivo" rows="3" readonly></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="buscarCarpeta">Carpeta:</label>
                            <select class="form-control" id="buscarCarpeta" name="buscarCarpeta" required>
                                <option value="">Seleccionar</option>
                                @foreach ($carpetas as $carpeta)
                                    <option value="{{ $carpeta->idCarpeta }}">{{ $carpeta->nombreCarpeta }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar en carpeta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

    <script src="{{ url('js/main.js') }}"></script>

</body>

</html>
