<?php
require_once '../../db.php';

var_dump($_POST);
// Verificar si se recibió el ID del promocion
if(isset($_POST['id']) && !empty($_POST['id'])) {
    // Obtener el ID del promocion a eliminar
    $id_promocion = $_POST['id'];

    // Consulta SQL para eliminar el promocion
    $sql = "UPDATE promociones SET eliminado = 1 WHERE id = $id_promocion";

    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "No se recibió el ID de la promocion.";
}

// Cerrar conexión
mysqli_close($conn);
?>
