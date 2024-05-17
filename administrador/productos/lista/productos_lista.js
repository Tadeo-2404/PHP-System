$(document).ready(function() {
    // Función para eliminar producto
    function eliminarProducto(id) {
        if (confirm("¿Estás seguro de que quieres eliminar este productos?")) {
            $.ajax({
                url: 'productos_eliminar.php',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(response) {
                    if (response === 'success') {
                        // Eliminar la fila del producto eliminado
                        $('#producto_' + id).remove();
                    } else {
                        alert('Error al eliminar producto.');
                    }
                }
            });
        }
    }

    // Evento click para el botón de eliminar
    $('#listaProductos').on('click', '.eliminarProducto', function() {
        var id = $(this).data('id'); // Obtener el ID desde el atributo data-id
        eliminarProducto(id); // Pasar el ID a la función eliminarProducto
    });
});