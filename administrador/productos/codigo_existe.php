<?php
// Incluir el archivo de conexión a la base de datos
require_once '../db.php';

// Verificar si se ha enviado el codigo por POST
if(isset($_POST['codigo'])) {
    // Obtener el codigo electrónico enviado por POST y escaparlo para prevenir inyecciones SQL
    $codigo = mysqli_real_escape_string($conn, $_POST['codigo']);
    
    // Consultar si el codigo existe en la base de datos
    $result = mysqli_query($conn, "SELECT * FROM productos WHERE codigo='$codigo' AND status=1 AND eliminado=0");
    
    // Verificar si se encontraron resultados
    if(mysqli_num_rows($result) > 0) {
        // El codigo ya existe en la base de datos
        echo 'existe';
    }
} else {
    // Si no se envió el codigo por POST, devolver un mensaje de error
    echo 'error';
}
?>
