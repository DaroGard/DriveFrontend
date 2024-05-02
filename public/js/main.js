
document.addEventListener("DOMContentLoaded", function() {
    var myModal = new bootstrap.Modal(document.getElementById('usuarioModal'));
    var myArchivoModal = new bootstrap.Modal(document.getElementById('modalArchivo'));
    var myEditarArchivoModal = new bootstrap.Modal(document.getElementById('editarArchivo'));
    var myfavoritoModal = new bootstrap.Modal(document.getElementById('favorito'));
    var myCarpetaModal = new bootstrap.Modal(document.getElementById('modalCarpeta'));
});

$(document).ready(function(){
    $('#tablaPrincipal').show();

    $('.list-group-item').click(function(){

        $('.list-group-item').removeClass('active');

        $(this).addClass('active');

        $('table').hide();

        var targetTableId = $(this).attr('data-target-table');
        $('#' + targetTableId).show();
    });
});


function filtrarPorTipo(idTipoArchivo) {
    var filas = document.querySelectorAll('#tablaArchivos tbody tr');
    filas.forEach(function(fila) {
        var tipo = fila.getAttribute('data-tipo');
        if (idTipoArchivo === null || tipo === idTipoArchivo || idTipoArchivo === 'todos') {
            fila.style.display = 'table-row';
        } else {
            fila.style.display = 'none';
        }
    });
}

document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById('editarArchivo');
    modal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-idEdit');
        var nombre = button.getAttribute('data-nombreEdit');
        var descripcion = button.getAttribute('data-descripcionEdit');
        var tipo = button.getAttribute('data-tipoEdit');
        var fecha = button.getAttribute('data-fechaEdit');
        var carpeta = button.getAttribute('data-carpetaEdit');
        
        console.log(id);

        modal.querySelector('#archivoEditId').value = id;
        modal.querySelector('#archivoEditDescripcion').value = descripcion;
        modal.querySelector('#archivoEditNombre').value = nombre;
        modal.querySelector('#archivoEditTipo').value = tipo;
        modal.querySelector('#archivoEditFecha').value = fecha;
        modal.querySelector('#archivoEditCarpeta').value = carpeta;
    });
});

document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById('favorito');
    modal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var nombre = button.getAttribute('data-nombre');
        var tipo = button.getAttribute('data-tipo');
        var fecha = button.getAttribute('data-fecha');
        var usuario = button.getAttribute('data-usuario');
        var carpeta = button.getAttribute('data-carpeta');

        modal.querySelector('#archivoFavNombre').value = nombre;
        modal.querySelector('#archivoFavTipo').value = tipo;
        modal.querySelector('#archivoFavFecha').value = fecha;
        modal.querySelector('#archivoFavUsuario').value = usuario;
        modal.querySelector('#archivoFavCarpeta').value = carpeta;
    });
});


const btnArchivo = document.getElementById('btnradio1');
const btnCarpeta = document.getElementById('btnradio2');

const tablaArchivos = document.getElementById('tablaArchivos');
const tablaCarpetas = document.getElementById('tablaCarpetas');

const iconosCarpeta = document.querySelectorAll('#tablaArchivos tbody tr td:first-child i.fa-solid.fa-folder');

function toggleTabla() {
    if (btnArchivo.checked) {
        tablaArchivos.style.display = 'table';
        tablaCarpetas.style.display = 'none';

        const filasArchivos = document.querySelectorAll('#tablaArchivos tbody tr');
        filasArchivos.forEach((fila) => {
            fila.style.display = 'table-row';
        });
    } else {
        tablaArchivos.style.display = 'none';
        tablaCarpetas.style.display = 'table';
    }
}

function filtrarPorCarpeta(idCarpeta) {
    tablaArchivos.style.display = 'table';
    tablaCarpetas.style.display = 'none';

    const filas = document.querySelectorAll('#tablaArchivos tbody tr');
    filas.forEach((fila) => {
        const idCarpetaArchivo = fila.getAttribute('data-idArchivo');
        console.log('idCarpetaArchivo:', idCarpetaArchivo);
        console.log('idCarpeta:', idCarpeta);

        if (idCarpetaArchivo !== idCarpeta.toString()) {
            console.log('Ocultando fila:', fila);
            fila.style.display = 'none';
        } else {
            console.log('Mostrando fila:', fila);
            fila.style.display = 'table-row';
        }
    });
}

btnArchivo.addEventListener('change', toggleTabla);
btnCarpeta.addEventListener('change', toggleTabla);

iconosCarpeta.forEach((icono) => {
    icono.addEventListener('click', function() {
        const idCarpeta = this.parentNode.parentNode.getAttribute('data-tipo');
        filtrarPorCarpeta(idCarpeta);
        toggleTabla();
    });
});

document.getElementById("nuevoArchivo").addEventListener("click", function() {
    $('#modalArchivo').modal('show');
});

document.getElementById("nuevaCarpeta").addEventListener("click", function() {
    $('#modalCarpeta').modal('show');
});


document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById('modalDetallesArchivo');
    modal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-idArchivoDetalles');
        var nombre = button.getAttribute('data-nombre');
        var descripcion = button.getAttribute('data-descripcion');

        document.getElementById('idDetalleArchivo').value = id;
        document.getElementById('nombreDetalleArchivo').value = nombre;
        document.getElementById('descripcionDetalleArchivo').value = descripcion;

    });
});


