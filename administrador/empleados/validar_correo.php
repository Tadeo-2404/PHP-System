<?php
// Incluir el archivo de conexión a la base de datos
require_once '../db.php';

// Verificar si se ha enviado el correo por POST
if(isset($_POST['correo'])) {
    // Obtener el correo electrónico enviado por POST y escaparlo para prevenir inyecciones SQL
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);
    
    // Consultar si el correo existe en la base de datos
    $result = mysqli_query($conn, "SELECT correo FROM empleados WHERE correo='$correo' AND status=1 AND eliminado=0");
    
    // Verificar si se encontraron resultados
    if(mysqli_num_rows($result) > 0) {
        // El correo ya existe en la base de datos
        echo 'existe';
    }
} else {
    // Si no se envió el correo por POST, devolver un mensaje de error
    echo 'error';
}
?>
