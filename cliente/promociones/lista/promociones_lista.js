$(document).ready(function() {
    // Función para eliminar promoción
    function eliminarPromocion(id) {
        console.log("id", id)
        if (confirm("¿Estás seguro de que quieres eliminar esta promoción?")) {
            $.ajax({
                url: '../eliminar/promociones_eliminar.php',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(response) {
                    if (response.includes("success")) {
                        // Eliminar la fila de la promoción eliminada
                        $('#promocion_' + id).remove();
                    } else {
                        alert('Error al eliminar la promoción.');
                    }
                }
            });
        }
    }

    // Evento click para el botón de eliminar
    $(document).on('click', '.eliminarPromocion', function() {
        var id = $(this).data('id'); // Obtener el ID desde el atributo data-id
        eliminarPromocion(id); // Pasar el ID a la función eliminarPromocion
    });
});
