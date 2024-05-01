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
        var usuario = button.getAttribute('data-usuarioEdit');
        var carpeta = button.getAttribute('data-carpeta');
        
        modal.querySelector('#archivoEditId').value = id;
        modal.querySelector('#archivoEditDescripcion').value = descripcion;
        modal.querySelector('#archivoEditNombre').value = nombre;
        modal.querySelector('#archivoEditTipo').value = tipo;
        modal.querySelector('#archivoEditFecha').value = fecha;
        modal.querySelector('#archivoEditUsuario').value = usuario;
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