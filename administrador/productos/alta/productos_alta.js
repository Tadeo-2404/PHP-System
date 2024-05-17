$(document).ready(function () {
    // Validación de código con AJAX
    $("#codigo").blur(function () {
        var codigo = $(this).val();
        $.ajax({
            type: "POST",
            url: "../codigo_existe.php",
            data: { codigo: codigo },
            success: function (response) {
                console.log(response);
                if(response == 'existe') {
                    $("#error-message-codigo").addClass('bg-danger text-white p-3 mt-3').text("El código " + codigo + " ya existe.").show().delay(5000).fadeOut();
                    $("#codigo").val('');
                }
            }
        });
    });

    // Función para validar el formulario antes de enviar
    $("form").submit(function (event) {
        // Validar que todos los campos estén llenos
        var isValid = true;
        $('input').each(function () {
            if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).addClass("error");
            }
            else {
                $(this).removeClass("error");
            }
        });
        if (!isValid) {
            $("#error-message").addClass('bg-danger text-white p-3 mt-3').text("Faltan campos por llenar.").show().delay(5000).fadeOut();
            event.preventDefault(); // Evitar que el formulario se envíe si no está completo
        }
    });
});