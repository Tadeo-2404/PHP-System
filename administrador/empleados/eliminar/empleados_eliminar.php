<?php
require_once '../../db.php';

// Verificar si se recibió el ID del empleado
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Obtener el ID del empleado a eliminar
    $id_empleado = $_GET['id'];

    // Consulta SQL para eliminar el empleado
    $sql = "UPDATE empleados SET eliminado = 1 WHERE id = $id_empleado";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: ../lista/empleados_lista.php");
    } else {
        echo "error";
    }
} else {
    echo "No se recibió el ID del empleado.";
}

// Cerrar conexión
mysqli_close($conn);
?>
