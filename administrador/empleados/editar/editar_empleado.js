$(document).ready(function() {
    // Validación de correo electrónico con AJAX
    $("#correo").blur(function(){
        var correo = $(this).val();
        $.ajax({
            type: "POST",
            url: "../validar_correo.php",
            data: { correo: correo },
            success: function(response){
                if (response.indexOf('existe') !== -1) {
                    $("#correo-error").addClass('bg-danger text-white p-3 mt-3').text("El correo " + correo + " ya existe.").show().delay(5000).fadeOut();
                    $("#correo").val('');
                } 
            }
        });
    });

    $('#editarEmpleadoForm').submit(function(e) {
        e.preventDefault();
        var nombre = $('#nombre').val().trim();
        var apellidos = $('#apellidos').val().trim();
        var correo = $('#correo').val().trim();
        var rol = $('#rol').val().trim();
        var status = $('#status').val();

        if (nombre === '' || apellidos === '' || correo === '' || rol === '') {
            $('#guardarEmpleado').after('<div class="error">Faltan campos por llenar.</div>');
            setTimeout(function() {
                $('.error').remove();
            }, 5000);
            return;
        }

        $.ajax({
            url: "<?php echo $_SERVER['PHP_SELF']; ?>",
            type: 'POST',
            data: $('#editarEmpleadoForm').serialize(),
            success: function(response) {
                if (response.includes('success')) {
                    window.location.href = '../lista/empleados_lista.php';
                } else {
                    alert('Error al editar empleado.');
                }
            }
        });
    });

    $('#correo').change(function() {
        var correo = $(this).val().trim();
        $.ajax({
            url: 'validar_correo.php',
            type: 'POST',
            data: {
                correo: correo
            },
            success: function(response) {
                $('#correoError').text(response);
                setTimeout(function() {
                    $('#correoError').text('');
                }, 5000);
            }
        });
    });
});