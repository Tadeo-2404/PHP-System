<?php
include_once "../db.php";

// Iniciar la sesión si aún no está iniciada
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_GET['id'])) {
    // Obtener el ID del producto de la solicitud GET
    $producto_id = $_GET['id'];
    
    // Obtener la fecha y hora actual
    $fecha_actual = date('Y-m-d H:i:s');

    // Obtener el ID del usuario de la sesión
    $id_usuario = $_SESSION['id'];

    if (!isset($_SESSION['id_pedido'])) {
        // Si no hay un pedido en curso, crear uno nuevo
        $query_pedido = "INSERT INTO pedidos (fecha, id_usuario) VALUES ('$fecha_actual', $id_usuario)";
        
        // Ejecutar la consulta para insertar el nuevo pedido
        mysqli_query($conn, $query_pedido);
        
        // Obtener el ID del pedido recién insertado
        $id_pedido = mysqli_insert_id($conn);

        // Guardar el ID del pedido en la sesión
        $_SESSION['id_pedido'] = $id_pedido;
    } else {
        // Si ya hay un pedido en curso, obtener su ID desde la sesión
        $id_pedido = $_SESSION['id_pedido'];
    }

    // Consulta para obtener los detalles del producto
    $query_producto = "SELECT costo FROM productos WHERE id = $producto_id";
    
    // Ejecutar la consulta
    $result_producto = mysqli_query($conn, $query_producto);

    // Verificar si la consulta fue exitosa
    if ($result_producto) {
        // Obtener el costo del producto desde el resultado de la consulta
        $row_producto = mysqli_fetch_assoc($result_producto);
        $costo = $row_producto['costo'];

        // Insertar el producto en el pedido de productos
        $query_producto_pedido = "INSERT INTO pedidos_productos (id_pedido, id_producto, precio) VALUES ($id_pedido, $producto_id, $costo)";
        
        // Ejecutar la consulta para insertar el producto en el pedido de productos
        mysqli_query($conn, $query_producto_pedido);
        header("Location: ../carrito/carrito.php");
    } else {
        // Manejar el caso de error en la consulta
        echo "Error al obtener el costo del producto: " . mysqli_error($conn);
    }
}
?>
