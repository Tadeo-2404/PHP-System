<?php
require_once "../check_login.php";
require_once "carrito_config.php";

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recorrer los productos del carrito
    foreach ($products as $key => $product) {
        // Obtener la nueva cantidad del producto desde el formulario
        $nueva_cantidad = $_POST['cantidad'][$key];

        // Actualizar la cantidad del producto en el array $products
        $products[$key]['cantidad'] = $nueva_cantidad;

        // Calcular el subtotal del producto
        $subtotal_producto = $nueva_cantidad * $product['costo'];

        // Actualizar el subtotal del producto en el array $products
        $products[$key]['subtotal'] = $subtotal_producto;

        // Actualizar la cantidad del producto en la base de datos
        $id_pedido = $_SESSION['id_pedido'];
        $id_producto = $product['id_producto'];
        $query_update_cantidad = "UPDATE pedidos_productos SET cantidad = $nueva_cantidad, precio = " . $product['costo'] . " WHERE id_pedido = $id_pedido AND id_producto = $id_producto";
        mysqli_query($conn, $query_update_cantidad);
    }

    // Calcular el nuevo total
    $nuevo_total = 0;
    foreach ($products as $product) {
        $nuevo_total += $product['subtotal'];
    }

    $query_update_total = "UPDATE pedidos SET status=1 WHERE id = $id_pedido";
    mysqli_query($conn, $query_update_total);

    // Redirigir de vuelta al carrito
    header("Location: carrito2.php");
    exit;
}
?>
