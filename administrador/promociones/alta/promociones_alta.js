$(document).ready(function () {
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