$(document).ready(function () {
    // Validación de código con AJAX
    $("#codigo").blur(function () {
        var codigo = $(this).val();
        $.ajax({
            type: "POST",
            url: "../codigo_existe.php",
            data: { codigo: codigo },
            success: function (response) {
                if (response.indexOf('existe') !== -1) {
                    $("#error-message-codigo").addClass('bg-danger text-white p-3 mt-3 w-full').text("El código " + codigo + " ya existe.").show().delay(5000).fadeOut();
                    $("#codigo").val('');
                }
            }
        });
    });

    $('form').submit(function (e) {
        const nombre = $('#nombre');
        const codigo = $('#codigo');
        const costo = $('#costo');
        const descripcion = $('#descripcion');
        const stock = $('#stock');

        if (nombre === '' || codigo === '' || costo === '' || descripcion === '' || stock === '') {
            $("#error-message").addClass('bg-danger text-white p-3 mt-3 w-full').text("Faltan campos por llenar").show().delay(5000).fadeOut();
        }
    });
});