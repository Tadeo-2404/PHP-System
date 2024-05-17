<?php
require_once "../db.php";

if(!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['id_pedido'])) {
    $id_pedido = $_SESSION['id_pedido'];

    // Actualizar el estado del pedido a 1
    $query_update_pedido = "UPDATE pedidos SET status = 1 WHERE id = $id_pedido";
    
    if (mysqli_query($conn, $query_update_pedido)) {
        // Consulta para obtener los productos del pedido
        $query_productos_pedido = "SELECT * FROM pedidos_productos WHERE id_pedido = $id_pedido";
        $result_productos_pedido = mysqli_query($conn, $query_productos_pedido);

        // Recorrer los productos del pedido
        while ($row = mysqli_fetch_assoc($result_productos_pedido)) {
            $id_producto = $row['id_producto'];
            $cantidad_pedido = $row['cantidad'];

            // Actualizar el stock de productos
            $query_update_stock = "UPDATE productos SET stock = stock - $cantidad_pedido WHERE id = $id_producto";
            mysqli_query($conn, $query_update_stock);
        }

        // Eliminar la variable de sesión
        unset($_SESSION['id_pedido']);

        // Redirigir al usuario a la página de inicio
        header("Location: ../home.php");
        exit();
    } else {
        echo "Error al actualizar el estado del pedido: " . mysqli_error($conn);
    }
}
?>
