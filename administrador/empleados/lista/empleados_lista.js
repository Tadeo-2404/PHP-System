$(document).ready(function() {
    // Función para eliminar empleado
    function eliminarEmpleado(id) {
        if (confirm("¿Estás seguro de que quieres eliminar este empleado?")) {
            $.ajax({
                url: 'empleados_eliminar.php',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(response) {
                    console.log(response)
                    if (response === 'success') {
                        // Eliminar la fila del empleado eliminado
                        $('#empleado_' + id).remove();
                    } else {
                        alert('Error al eliminar empleado.');
                    }
                }
            });
        }
    }

    // Evento click para el botón de eliminar
    $('#listaEmpleados').on('click', '.eliminarEmpleado', function() {
        var id = $(this).data('id'); // Obtener el ID desde el atributo data-id
        eliminarEmpleado(id); // Pasar el ID a la función eliminarEmpleado
    });
});