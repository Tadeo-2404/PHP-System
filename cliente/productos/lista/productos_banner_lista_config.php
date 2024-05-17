<?php
require_once './db.php';

if(!isset($_SESSION)) {
    session_start();
}

// Determine the number of products to select (either 3 or 6)
$products_to_select = rand(1, 2) == 1 ? 3 : 6;

// Consulta SQL para obtener los productos
$sql = "SELECT * FROM productos WHERE eliminado=0 ORDER BY RAND() LIMIT $products_to_select";
$result = mysqli_query($conn, $sql);
$numero_productos = mysqli_num_rows($result);
?>
