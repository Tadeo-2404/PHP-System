<?php
require_once '../../db.php';

if(!isset($_SESSION)) {
    session_start();
}

// Consulta SQL para obtener los productos
$sql = "SELECT id, nombre, codigo, descripcion, costo, stock FROM productos WHERE eliminado=0";
$result = mysqli_query($conn, $sql);
$numero_productos = mysqli_num_rows($result);
?>