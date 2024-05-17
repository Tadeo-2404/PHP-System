$(document).ready(function() {
    $('#form').submit(function(event) {
        event.preventDefault();
        validateForm();
    });
});

function validateForm() {
    var email = $('#correo').val();
    var pass = $('#pass').val();
    var mensaje = $('#mensaje');

    if (!email || !pass) {
        mensaje.addClass('error-message')
        mensaje.html('Por favor, complete todos los campos.');
        setTimeout(() => {
            mensaje.removeClass('error-message').html('')
        }, 2000);
        return;
    }

    $.ajax({
        type: 'POST',
        url: 'check_user.php',
        data: { correo: email, pass: pass },
        success: function(response) {
            console.log(response)
            if (response === 'existe') {
                window.location.href = '../bienvenido.php';
            } else {
                mensaje.addClass('error-message')
                mensaje.html('Usuario o contraseña incorrectos.');
                setTimeout(() => {
                    mensaje.removeClass('error-message').html('')
                }, 2000);
            }
        }
    });
}
