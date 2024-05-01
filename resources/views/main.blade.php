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
                @if (Session::get('cuentaAct')['imagen'] != null)
                    <div id="imagen" data-bs-toggle="modal" data-bs-target="#usuarioModal"
                        data-bs-whatever="@usuarioModal">
                        <img src="{{ asset(Session::get('cuentaAct')['imagen']) }}"
                            style="width:100%; height: auto; object-fit: cover;">
                    </div>
                @else
                    <div id="imagen" data-bs-toggle="modal" data-bs-target="#usuarioModal"
                        data-bs-whatever="@usuarioModal"><img src="{{ asset('img/default-picture.png') }}"
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
                                        <tr data-tipo="{{ $archivo->tipoArchivo->idTipoArchivo }}">
                                            <td style="display: none"></td>
                                            @if ($archivo->tipoArchivo->idTipoArchivo == 1)
                                                <td><i class="fa-solid fa-file-pdf"
                                                        style="margin-right: 4%"></i>{{ $archivo->nombre }}</td>
                                            @else
                                                @if ($archivo->tipoArchivo->idTipoArchivo == 2 || $archivo->tipoArchivo->idTipoArchivo == 4)
                                                    <td><i class="fa-solid fa-file-image"
                                                            style="margin-right: 4%"></i>{{ $archivo->nombre }}</td>
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
                                            <td><i class="fa-solid fa-user" style="margin-right: 4%"></i> {{ $archivo->usuario->nombre }}</td>
                                            <td><i class="fa-regular fa-folder" style="margin-right: 4%"></i>
                                                {{ $archivo->carpeta }}
                                            </td>
                                            <th><i class="fa-solid fa-user-plus"></i> <i  data-bs-toggle="modal" data-bs-target="#editarArchivo"
                                                data-bs-whatever="@editarArchivo"
                                                data-idEdit="{{ $archivo->idArchivo }}"
                                                data-nombreEdit="{{ $archivo->nombre }}"
                                                data-descripcionEdit="{{ $archivo->descripcion }}"
                                                data-tipoEdit="{{ $archivo->tipoArchivo->tipoArchivo }}"
                                                data-fechaEdit="{{ (new DateTime($archivo->fechaCreacion))->format('d/m/y') }}"
                                                data-usuarioEdit="yo" data-carpeta="{{ $archivo->carpeta }}"
                                                        class="fa-solid fa-pen-to-square"></i> <i
                                                        data-bs-toggle="modal" data-bs-target="#favorito"
                                                        data-bs-whatever="@favorito"
                                                        data-nombre="{{ $archivo->nombre }}"
                                                        data-tipo="{{ $archivo->tipoArchivo->tipoArchivo }}"
                                                        data-fecha="{{ (new DateTime($archivo->fechaCreacion))->format('d/m/y') }}"
                                                        data-usuario="{{ $archivo->usuario->nombre }}" data-carpeta="{{ $archivo->carpeta }}"
                                                        class="fa-regular fa-star"></i> <i
                                                        class="fa-solid fa-trash"></i></th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--Modal guardar archivos-->
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
                            <input type="text" class="form-control" id="recipient-id" name="idUsuario"
                                value="{{ Session::get('cuentaAct')['idUsuario'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="recipient-name" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-descripcion" class="col-form-label">Descripción:</label>
                            <input type="text" class="form-control" id="recipient-descripcion"
                                name="descripcion">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-tamanio" class="col-form-label">Tamaño:</label>
                            <input type="text" class="form-control" id="recipient-tamanio" name="tamano">
                        </div>
                        <div class="form-group">
                            <label for="tipoarchivo">Tipo de Archivo:</label>
                            <select class="form-control" id="tipoarchivo" name="tipoarchivo" required>
                                @foreach ($tiposArchivos as $tipoArchivo)
                                    <option value="{{ $tipoArchivo->idTipoArchivo }}">{{ $tipoArchivo->tipoArchivo }}
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
        <div class="modal-dialog">
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
                            <label for="genero">Genero:</label>
                            <select class="form-control" id="genero" name="genero" required>
                                <option value="{{ Session::get('cuentaAct')['genero']['idGenero'] }}">Seleccionar
                                </option>
                                @foreach ($generos as $genero)
                                    <option value="{{ $genero->idGenero }}">{{ $genero->tipoGenero }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="lugar">Lugar:</label>
                            <select class="form-control" id="lugar" name="lugar" required>
                                <option value="{{ Session::get('cuentaAct')['lugar']['idLugar'] }}">Seleccionar
                                </option>
                                @foreach ($lugares as $lugar)
                                    <option value="{{ $lugar->idLugar }}">{{ $lugar->nombreLugar }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="preferencia">Preferencia:</label>
                            <select class="form-control" id="preferencia" name="preferencia" required>
                                <option value="{{ Session::get('cuentaAct')['preferencia']['idPreferencia'] }}">
                                    Seleccionar</option>
                                @foreach ($preferencias as $preferencia)
                                    <option value="{{ $preferencia->idPreferencia }}">{{ $preferencia->preferencia }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="usuarioTelefono" class="col-form-label">Telefono:</label>
                            <input type="text" class="form-control" id="usuarioTelefono" name="usuarioTelefono"
                                placeholder="{{ Session::get('cuentaAct')['telefono'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="usuarioImg" class="col-form-label">Foto:</label>
                            <input type="text" class="form-control" id="usuarioImg" name="usuarioImg"
                                placeholder="img/nombre.extension">
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

<!--Modal editor archivo-->
    <div class="modal fade" id="editarArchivo" tabindex="-1" aria-labelledby="editarArchivoLabel" aria-hidden="true">
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
                            <input type="text" class="form-control" id="archivoEditId" name="archivoEditId" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="archivoEditNombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="archivoEditNombre" name="archivoEditNombre">
                        </div>
                        <div class="mb-3">
                            <label for="archivoEditDescripcion" class="col-form-label">Descripcion:</label>
                            <input type="text" class="form-control" id="archivoEditDescripcion" name="archivoEditDescripcion">
                        </div>
                        <div class="mb-3" style="display: none">
                            <label for="archivoEditTipo" class="col-form-label">Tipo:</label>
                            <input type="text" class="form-control" id="archivoEditTipo" name="archivoEditTipo" readonly>
                        </div>
                        <div class="mb-3" style="display: none">
                            <label for="archivoEditFecha" class="col-form-label">Fecha de Creación:</label>
                            <input type="text" class="form-control" id="archivoEditFecha" name="archivoEditFecha" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="archivoEditCarpeta" class="col-form-label">Carpeta:</label>
                            <input type="text" class="form-control" id="archivoEditCarpeta" name="archivoEditCarpeta" readonly>
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

    <!--Modal Favoritos-->
    <div class="modal fade" id="favorito" tabindex="-1" aria-labelledby="favoritoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="favoritoLabel">Detalles del Archivo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
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




    <script src="{{ url('js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
