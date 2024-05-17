<?php
require_once '../db.php';

// Verificar si se recibió el ID del producto
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Obtener el ID del producto a eliminar
    $id_producto = $_GET['id'];

    // Consulta SQL para eliminar el producto
    $sql = "DELETE FROM pedidos_productos WHERE id = $id_producto";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: carrito.php");
    } else {
        echo "error";
    }
} else {
    echo "No se recibió el ID del producto.";
}

// Cerrar conexión
mysqli_close($conn);
?>
