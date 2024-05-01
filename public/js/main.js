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