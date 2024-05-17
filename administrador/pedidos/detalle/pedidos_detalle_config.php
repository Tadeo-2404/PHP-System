<?php
require_once '../../db.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pedidos WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        $fecha = $row['fecha'];
        $total = 0;

        // Fetch products associated with the order along with product details
        $products_query = "SELECT pp.*, p.nombre AS nombre_producto, p.descripcion, p.costo 
                           FROM pedidos_productos pp 
                           INNER JOIN productos p ON pp.id_producto = p.id 
                           WHERE pp.id_pedido = $id";
        $products_result = mysqli_query($conn, $products_query);
        $products = array();
        while ($product_row = mysqli_fetch_assoc($products_result)) {
            $products[] = $product_row;
            $total += $product_row['cantidad'] * $product_row['precio'];
        }
    } else {
        header("Location: ../lista/pedidos_lista.php");
        exit;
    }
} else {
    header("Location: ../lista/pedidos_lista.php");
    exit;
}
?>