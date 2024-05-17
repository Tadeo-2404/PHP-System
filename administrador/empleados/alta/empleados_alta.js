$(document).ready(function(){
    // Función para validar el formulario antes de enviar
    $("form").submit(function(event){
        // Validar que todos los campos estén llenos
        var isValid = true;
        $('input').each(function(){
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

    // Validación de correo electrónico con AJAX
    $("#correo").blur(function(){
        var correo = $(this).val();
        $.ajax({
            type: "POST",
            url: "../validar_correo.php",
            data: { correo: correo },
            success: function(response){
                console.log(response);
                if (response.indexOf('existe') !== -1) {
                    $("#correo-error").addClass('bg-danger text-white p-3 mt-3').text("El correo " + correo + " ya existe.").show().delay(5000).fadeOut();
                    $("#correo").val('');
                } 
            }
        });
    });
});